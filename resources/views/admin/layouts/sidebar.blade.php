<div class="bg-dark text-white" style="width: 250px; min-height: 100vh;">
    <div class="p-3">
        <h4 class="text-center">Admin Panel</h4>
        <hr>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a href="{{ route('admin.dashboard') }}" class="nav-link text-white">
                    <i class="fas fa-tachometer-alt me-2"></i> Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.categories.index') }}" class="nav-link text-white">
                    <i class="fas fa-list me-2"></i> Categories
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.products.index') }}" class="nav-link text-white">
                    <i class="fas fa-box me-2"></i> Products
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.orders.index') }}" class="nav-link text-white">
                    <i class="fas fa-shopping-cart me-2"></i> Orders
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.users.index') }}" class="nav-link text-white">
                    <i class="fas fa-users me-2"></i> Users
                </a>
            </li>
        </ul>
    </div>
</div>