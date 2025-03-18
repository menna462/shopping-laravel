<nav class="vertnav navbar navbar-light">
    <!-- nav bar -->
    <div class="w-100 mb-4 d-flex">
      <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="./index.html">
        <svg version="1.1" id="logo" class="navbar-brand-img brand-sm" xmlns="http://www.w3.org/2000/svg"
          xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 120 120" xml:space="preserve">
          <g>
            <polygon class="st0" points="78,105 15,105 24,87 87,87 	" />
            <polygon class="st0" points="96,69 33,69 42,51 105,51 	" />
            <polygon class="st0" points="78,33 15,33 24,15 87,15 	" />
          </g>
        </svg>
      </a>
    </div>
    <ul class="navbar-nav flex-fill w-100 mb-2">
      <li class="nav-item dropdown">
        <a href="#dashboard" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
          <i class="fe fe-home fe-16"></i>
          <span class="ml-3 item-text">Dashboard</span><span class="sr-only">(current)</span>
        </a>
      </li>
    </ul>
    <p class="text-muted nav-heading mt-4 mb-1">
      <span>Components</span>
    </p>
    <ul class="navbar-nav flex-fill w-100 mb-2">
      {{-- table --}}
      <li class="nav-item dropdown">
        <a href="#tables" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
          <i class="fe fe-grid fe-16"></i>
          <span class="ml-3 item-text">Tables</span>
        </a>
        <ul class="collapse list-unstyled pl-4 w-100" id="tables">
            <li class="nav-item">
                <a class="nav-link pl-3" href= {{ route('basicinfo') }} ><span class="ml-1 item-text">Home</span></a>
              </li>
          <li class="nav-item">
            <a class="nav-link pl-3" href= {{ route('users') }} ><span class="ml-1 item-text">User</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link pl-3" href={{ route('products') }}><span class="ml-1 item-text">Products</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link pl-3" href={{ route('locations') }}><span class="ml-1 item-text">Location
                </span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('orders.index') }}">
                <span class="ml-1 item-text">Orders</span>
            </a>
        </li>
        </ul>
      </li>
    </ul>
  </nav>
