<div class="row mb-4">
    <div class="col-md-6">
        <h6>Customer Information</h6>
        <p><strong>Name:</strong> {{ $order->user->name }}</p>
        <p><strong>Email:</strong> {{ $order->user->email }}</p>
        <p><strong>Phone:</strong> {{ $order->user->phone }}</p>
    </div>
    <div class="col-md-6">
        <h6>Order Information</h6>
        <p><strong>Order Date:</strong> {{ $order->created_at->format('Y-m-d H:i') }}</p>
        <p><strong>Status:</strong> {{ $order->status }}</p>
        <p><strong>Shipping Address:</strong> {{ $order->shipping_address }}</p>
    </div>
</div>