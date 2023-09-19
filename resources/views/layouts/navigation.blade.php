<ul class="sidebar-nav" data-coreui="navigation" data-simplebar>
    <li class="nav-item">
        <a class="nav-link" href="{{route('admin-home')}}">
            <svg class="nav-icon">
                <use xlink:href="{{ asset('icons/coreui.svg#cil-speedometer') }}"></use>
            </svg>
            Thống kê
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{route('admin-product')}}">
            <svg class="nav-icon">
                <use xlink:href="{{ asset('icons/coreui.svg#cil-screen-smartphone') }}"></use>
            </svg>
            Quản lý sản phẩm
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">
            <svg class="nav-icon">
                <use xlink:href="{{ asset('icons/coreui.svg#cil-cart') }}"></use>
            </svg>
            Quản lý đơn hàng
        </a>
    </li>


</ul>
