<div class="br-logo"><a href="{{ route('admin.dashboard') }}"><span>[</span>E-<i>commerce</i><span>]</span></a></div>
    <div class="br-sideleft sideleft-scrollbar">
      <label class="sidebar-label pd-x-10 mg-t-20 op-3">Navigation</label>
      <ul class="br-sideleft-menu">
        <li class="br-menu-item">
          <a href="{{ route('admin.dashboard') }}" class="br-menu-link {{ Request::routeIs('admin.dashboard') ? 'active' : '' }} ">
            <i class="menu-item-icon icon ion-ios-home-outline tx-24"></i>
            <span class="menu-item-label">Dashboard</span>
          </a><!-- br-menu-link -->
        </li><!-- br-menu-item -->
        <li class="br-menu-item">
          <a href="{{ route('category.index') }}" class="br-menu-link {{ Request::routeIs('category.index') || Request::routeIs('category.create') || Request::routeIs('category.edit') ? 'active' : '' }}">
            <i class="menu-item-icon icon ion-ios-folder-outline tx-24"></i>
            <span class="menu-item-label">Categories</span>
          </a><!-- br-menu-link -->
        </li><!-- br-menu-item -->
        <li class="br-menu-item">
          <a href="{{ route('products.index') }}" class="br-menu-link {{ Request::routeIs('products.index') || Request::routeIs('products.create') || Request::routeIs('products.edit') ? 'active' : '' }}">
            <i class="menu-item-icon icon ion-ios-box-outline tx-24"></i>
            <span class="menu-item-label">Products</span>
          </a><!-- br-menu-link -->
        </li><!-- br-menu-item -->
        <li class="br-menu-item">
          <a href="#" class="br-menu-link with-sub {{ Request::routeIs('admin.orders') ||Request::routeIs('admin.orders.details') ? 'active' : '' }}">
            <i class="menu-item-icon icon ion-ios-photos-outline tx-20"></i>
            <span class="menu-item-label">Orders <sup class="badge badge-danger">badgh</sup></span>
          </a><!-- br-menu-link -->
          <ul class="br-menu-sub">
            <li class="sub-item"><a href="{{ route('admin.orders') }}" class="sub-link">Orders</a></li>
            <li class="sub-item"><a href="{{ route('admin.order.confirm.list') }}" class="sub-link">Confirm &amp; Order List</a></li>
            <li class="sub-item"><a href="{{ route('admin.orders.history') }}" class="sub-link">Shop &amp; Listing</a></li>
          </ul>
        </li>
      </ul><!-- br-sideleft-menu -->
      <br>
    </div>
