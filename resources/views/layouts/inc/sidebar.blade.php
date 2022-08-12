<div class="sidebar" data-color="purple" data-background-color="black" data-image="../assets/img/sidebar-2.jpg">
    <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
    <div class="logo">
        <a href="#" class="simple-text logo-normal">
            Grocery Shop
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
            <li class="nav-item {{ Request::is('categories')|Request::is('category-add') ? 'active':'' }}">
                <a class="nav-link" href="{{ url('categories')}}">
                    <i class="material-icons">category</i>
                    <p>Categories</p>
                </a>
            </li>
            <!-- <li class="nav-item {{ Request::is('category-add') ? 'active':'' }}">
        <a class="nav-link" href="{{ url('category-add')}}">
          <i class="material-icons">add</i>
          <p>Add Category</p>
        </a>
      </li> -->

            <li class="nav-item {{ Request::is('tables') ? 'active':'' }}">
                <a class="nav-link" href="{{ url('tables') }}">
                    <i class="material-icons">content_paste</i>
                    <p>Table List</p>
                </a>
            </li>
            <li class="nav-item {{ Request::is('products') |Request::is('product-add') ? 'active':'' }}">
                <a class="nav-link" href="{{ url('products')}}">
                    <i class="material-icons">category</i>
                    <p>Products</p>
                </a>
            </li>
            <!-- <li class="nav-item {{ Request::is('product-add') ? 'active':'' }}">
        <a class="nav-link" href="{{ url('product-add')}}">
          <i class="material-icons">add</i>
          <p>Add Product</p>
        </a>
      </li> -->
            <!-- <li class="nav-item ">
            <a class="nav-link" href="./map.html">
              <i class="material-icons">location_ons</i>
              <p>Maps</p>
            </a>
          </li> -->
            <!-- <li class="nav-item ">
            <a class="nav-link" href="./notifications.html">
              <i class="material-icons">notifications</i>
              <p>Notifications</p>
            </a>
          </li> -->
            <!-- <li class="nav-item active-pro ">
                <a class="nav-link" href="./upgrade.html">
                    <i class="material-icons">unarchive</i>
                    <p>Upgrade to PRO</p>
                </a>
            </li> -->
        </ul>
    </div>
</div>