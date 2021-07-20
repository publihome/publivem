    <a class="nav-link {{ Request::is('/') ? 'active-link' : '' }}"  href="{{url('/')}}"><i class="fas fa-chart-line"></i> Dashboard</a>
    <a class="nav-link {{ Request::is('products_by_category') ? 'active-link' : '' }}" href="{{url('/products_by_category')}}"><i class="fab fa-product-hunt"></i> Productos</a>
    <a class="nav-link {{ Request::is('employees') ? 'active-link' : '' }}" href="{{url('/employees')}}"><i class="fas fa-users"></i> Empleados</a>
    <a class="nav-link {{ Request::is('expenses') ? 'active-link' : '' }}" href="{{url('/expenses')}}"><i class="fas fa-cart-arrow-down"></i> Gastos</a>
    <a class="nav-link {{ Request::is('sales') ? 'active-link' : '' }}" href="{{url('/sales')}}"> <i class="fas fa-cart-arrow-down"></i> Ventas</a>
     