<div class="sidebar" data-color="purple" data-background-color="black" data-image="../assets/img/sidebar-2.jpg">
    <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
    <div class="logo">
        <a href="{{url('/')}}" class="simple-text logo-normal">
           BXD Grocery Shop
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="nav-item {{ Request::is('dashboard') ? 'active':'' }} ">
                <a class="nav-link" href="{{ url('dashboard')}}">
                    <i class="material-icons">dashboard</i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="nav-item {{ Request::is('admin-user') ? 'active':'' }}">
                <a class="nav-link" href="{{ url('admin-user')}}">
                    <i class="material-icons">person</i>
                    <p>User Profile</p>
                </a>
            </li>
            <li class="nav-item {{ Request::is('users') ? 'active':'' }}">
                <a class="nav-link" href="{{ url('users')}}">
                    <i class="material-icons">persons</i>
                    <p>Users</p>
                </a>
            </li>
            <li class="nav-item {{ Request::is('categories')|Request::is('category-add') ? 'active':'' }}">
                <a class="nav-link" href="{{ url('categories')}}">
                    <i class="material-icons">category</i>
                    <p>Categories</p>
                </a>
            </li>

            <li class="nav-item {{ Request::is('orders') ? 'active':'' }}">
                <a class="nav-link" href="{{ url('orders') }}">
                    <i class="material-icons">content_paste</i>
                    <p>Orders</p>
                </a>
            </li>
            <li class="nav-item {{ Request::is('products') | Request::is('product-add') ? 'active':'' }}">
                <a class="nav-link" href="{{ url('products')}}">
                    <i class="material-icons">category</i>
                    <p>Products</p>
                </a>
            </li>
        </ul>
    </div>
</div>
