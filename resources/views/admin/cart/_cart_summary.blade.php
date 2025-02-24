<div class="card-footer">
    <div class="row">
        <div class="col-md-6">
            <form action="{{ route('cart.clear') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-warning">
                    <i class="fas fa-trash"></i> Clear Cart
                </button>
            </form>
        </div>
        <div class="col-md-6 text-end">
            <h5>Total: ${{ number_format($total, 2) }}</h5>
            <a href="{{ route('checkout') }}" class="btn btn-success">
                <i class="fas fa-credit-card"></i> Proceed to Checkout
            </a>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        $(document).ready(function () {
            $(".update-cart").change(function (e) {
                e.preventDefault();
                var ele = $(this);
                $.ajax({
                    url: '{{ route('cart.update') }}',
                    method: "patch",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: ele.parents("tr").attr("data-id"),
                        quantity: ele.val()
                    },
                    success: function (response) {
                        window.location.reload();
                    }
                });
            });

            $(".remove-from-cart").click(function (e) {
                e.preventDefault();
                var ele = $(this);
                if (confirm("Are you sure you want to remove this item?")) {
                    $.ajax({
                        url: '{{ route('cart.remove') }}',
                        method: "DELETE",
                        data: {
                            _token: '{{ csrf_token() }}',
                            id: ele.parents("tr").attr("data-id")
                        },
                        success: function (response) {
                            window.location.reload();
                        }
                    });
                }
            });
        });
    </script>
@endpush