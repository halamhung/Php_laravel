<form action="{{ route('orders.update-status', $order) }}" method="POST" class="mt-3">
    @csrf
    @method('PATCH')
    <div class="row align-items-end">
        <div class="col-md-6">
            <div class="form-group">
                <label for="status">Update Order Status</label>
                <select name="status" id="status" class="form-control">
                    <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="processing" {{ $order->status == 'processing' ? 'selected' : '' }}>Processing</option>
                    <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>Completed</option>
                    <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <button type="submit" class="btn btn-primary">Update Status</button>
        </div>
    </div>
</form>