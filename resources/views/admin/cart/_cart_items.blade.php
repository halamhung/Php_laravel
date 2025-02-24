<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Subtotal</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @php $total = 0 @endphp
            @foreach(session('cart') as $id => $details)
                @php $total += $details['price'] * $details['quantity'] @endphp
                <tr data-id="{{ $id }}">
                    <td>
                        <div class="d-flex align-items-center">
                            <img src="{{ Storage::url($details['image']) }}" alt="{{ $details['name'] }}"
                                class="img-thumbnail me-3" style="width: 60px">
                            <span>{{ $details['name'] }}</span>
                        </div>
                    </td>
                    <td>${{ number_format($details['price'], 2) }}</td>
                    <td>
                        <input type="number" class="form-control quantity update-cart" value="{{ $details['quantity'] }}"
                            min="1" style="width: 100px">
                    </td>
                    <td>${{ number_format($details['price'] * $details['quantity'], 2) }}</td>
                    <td>
                        <button class="btn btn-danger btn-sm remove-from-cart">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>