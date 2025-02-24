<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function dashboard()
    {
        // Get statistics for dashboard
        // $totalOrders = Order::count();
        // $totalRevenue = Order::where('status', 'completed')->sum('total_amount');
        // $totalProducts = Product::count();
        // $totalUsers = User::where('role', 'customer')->count();

        // Get recent orders
        $recentOrders = Order::with(['user'])
            ->latest()
            ->take(5);
            // ->get();

        // Get monthly sales data for chart
        $monthlySales = Order::where('status', 'completed')
            ->whereBetween('created_at', [Carbon::now()->startOfYear(), Carbon::now()->endOfYear()])
            ->selectRaw('MONTH(created_at) as month, SUM(total_amount) as total')
            ->groupBy('month');
            // ->get()
            // ->pluck('total', 'month')
            // ->toArray();

        // return view('admin.dashboard.index', compact(
        //     'totalOrders',
        //     // 'totalRevenue',
        //     // 'totalProducts',
        //     // 'totalUsers',
        //     // 'recentOrders',
        //     // 'monthlySales'
        // ));
    }
}