<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with(['user', 'orderItems.product'])->paginate(10);
        return view('admin.orders.index', compact('orders'));
    }

    public function show(Order $order)
    {
        $order->load(['user', 'orderItems.product']);
        return view('admin.orders.show', compact('order'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'shipping_address' => 'required|string',
            'note' => 'nullable|string'
        ]);

        try {
            DB::beginTransaction();

            $order = Order::create([
                'user_id' => Auth::id(),
                'shipping_address' => $request->shipping_address,
                'note' => $request->note,
                'status' => 'pending',
                'total_amount' => 0
            ]);

            $cart = session()->get('cart', []);
            $total = 0;

            foreach($cart as $id => $details) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $id,
                    'quantity' => $details['quantity'],
                    'price' => $details['price']
                ]);
                $total += $details['price'] * $details['quantity'];
            }

            $order->update(['total_amount' => $total]);
            
            session()->forget('cart');
            DB::commit();

            return redirect()->route('orders.show', $order)
                ->with('success', 'Order placed successfully');

        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()
                ->with('error', 'Something went wrong while processing your order');
        }
    }

    public function updateStatus(Request $request, Order $order)
    {
        $request->validate([
            'status' => 'required|in:pending,processing,completed,cancelled'
        ]);

        $order->update(['status' => $request->status]);
        return redirect()->back()->with('success', 'Order status updated successfully');
    }
}