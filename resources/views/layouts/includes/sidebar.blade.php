<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link " href="{{ route('home') }}">
                <i class="bi bi-grid"></i>
                <span>Home</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item">
            <a href="{{ route('dashboard.category.index') }}" class="nav-link collapsed">
                <i class="bi bi-handbag-fill"></i>
                Category
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('dashboard.product.index') }}" class="nav-link collapsed">
                <i class="bi bi-newspaper"></i>
                Product
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('dashboard.transaction.index') }}" class="nav-link collapsed">
                <i class="bi bi-currency-dollar"></i>
                Transaction
            </a>
        </li>
    </ul>

</aside>
