<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('home') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">PIZZA</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">



    <!-- Nav Item - Pages Collapse Menu -->

    <li class="nav-item">
        <a class="nav-link" href="{{ url('/pizza-index') }}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Pizza</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ url('/topping-index') }}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Topping</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ url('/promotion-index') }}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Promotion</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ url('/order-index') }}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Order</span></a>
    </li>





    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
