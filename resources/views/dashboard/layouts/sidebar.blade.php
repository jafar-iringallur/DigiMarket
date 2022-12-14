<ul class="sidebar-nav" id="sidebar-nav">
  @php
    $route_name = request()->route()->getName();
  @endphp
    <li class="nav-item">
      <a class="nav-link {{ $route_name == "home" ? '' : 'collapsed' }}" href="{{route('home')}}">
        <i class="bi bi-grid"></i>
        <span>Dashboard</span>
      </a>
    </li><!-- End Dashboard Nav -->

    


    <li class="nav-item">
      <a class="nav-link {{ $route_name == "products.index" ? '' : 'collapsed' }}" href="{{route('products.index')}}">
        <i class="bi bi-basket2"></i>
        <span>Products</span>
      </a>
    </li>

    
    <li class="nav-item">
      <a class="nav-link {{ $route_name == "orders.index" ? '' : 'collapsed' }}" href="{{route('orders.index')}}">
        <i class="bi bi-cart3"></i>
        <span>Orders</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link collapsed" href="pages-error-404.html">
        <i class="bi bi-people-fill"></i>
        <span>Customers</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link collapsed" href="pages-error-404.html">
        <i class="bi bi-graph-up"></i>
        <span>Reports</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link collapsed" href="pages-error-404.html">
        <i class="bi bi-tags"></i>
        <span>Discounts</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link collapsed" href="pages-error-404.html">
        <i class="bi bi-gear"></i>
        <span>Tools</span>
      </a>
    </li>
 

    <li class="nav-item">
      <a class="nav-link collapsed" href="users-profile.html">
        <i class="bi bi-person"></i>
        <span>Profile</span>
      </a>
    </li><!-- End Profile Page Nav -->

  

    <li class="nav-item">
      <a class="nav-link collapsed" href="pages-contact.html">
        <i class="bi bi-envelope"></i>
        <span>Contact</span>
      </a>
    </li><!-- End Contact Page Nav -->

 
    <li class="nav-item">
      <a class="nav-link collapsed" href="pages-login.html">
        <i class="bi bi-box-arrow-in-right"></i>
        <span>Logout</span>
      </a>
    </li><!-- End Login Page Nav -->

   

  </ul>