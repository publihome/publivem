    <a class="nav-link {{ Request::is('dashboard') ? 'active-link' : '' }}"  href="{{url('/dashboard')}}"><i class="fas fa-chart-line"></i> Dashboard</a>
    <a class="nav-link {{ Request::is('products_by_category') ? 'active-link' : '' }}" href="{{url('/products_by_category')}}"><i class="fab fa-product-hunt"></i> Productos</a>
    <a class="nav-link {{ Request::is('employees') ? 'active-link' : '' }}" href="{{url('/employees')}}"><i class="fas fa-users"></i> Empleados</a>
    <a class="nav-link {{ Request::is('expenses') ? 'active-link' : '' }}" href="{{url('/expenses')}}"><i class="fas fa-cart-arrow-down"></i> Gastos</a>
    <a class="nav-link {{ Request::is('sales') ? 'active-link' : '' }}" href="{{url('/sales')}}"> <i class="fas fa-cart-arrow-down"></i> Ventas</a>
    
    <a class="nav-link {{ Request::is('profile') ? 'active-link' : '' }}"" id="profile" href="{{url('/profile')}}"> <i class="fas fa-user"></i> Profile</a>
    <a class="nav-link" id="logout_button" href="{{url('/logout')}}"> <i class="fas fa-sign-out-alt"></i> Salir</a>
     