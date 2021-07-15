    <a class="nav-link {{ Request::is('/') ? 'active-link' : '' }}"  href="{{url('/')}}">Dashboard</a>
    <a class="nav-link {{ Request::is('products_by_category') ? 'active-link' : '' }}" href="{{url('/products_by_category')}}">Productos</a>
    <a class="nav-link {{ Request::is('employees') ? 'active-link' : '' }}" href="{{url('/employees')}}">Empleados</a>
    <a class="nav-link {{ Request::is('expenses') ? 'active-link' : '' }}" href="{{url('/expenses')}}">Gastos</a>
    <a class="nav-link {{ Request::is('sales') ? 'active-link' : '' }}" href="{{url('/sales')}}">Ventas</a>
     