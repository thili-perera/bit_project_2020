<div class="left_col scroll-view">
    <div class="navbar nav_title" style="border: 0;">
        <a href="#" class="site_title"><i class="fa fa-paw"></i> <span>Wijayasiri Gift Centre</span></a>
    </div>

    <div class="clearfix"></div> 

    <!-- menu profile quick info -->
    <div class="profile clearfix">
        <div class="profile_pic">
            @if (Auth::user()->image)
                <img src="{{ url('upload/user', Auth::user()->image) }}" alt="..." class="img-circle profile_img">
            @else
            <img src="https://upload.wikimedia.org/wikipedia/commons/7/7c/Profile_avatar_placeholder_large.png" alt="..." class="img-circle profile_img">
            @endif
            
        </div>
        <div class="profile_info">
            <span>Welcome,</span>
            <h2>{{ Auth::user()->fname . ' ' . Auth::user()->lname }}</h2>
        </div>
    </div>
    <!-- /menu profile quick info -->

    <br />

    <!-- sidebar menu -->
    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
        <div class="menu_section">
            <h3>General</h3>
            <ul class="nav side-menu">
                <li><a href="{{ route('dashboard.home') }}"><i class="fas fa-home"></i> Home</a>
                </li>
                <li><a><i class="fas fa-users"></i> Users <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        @cannot('delivery')
                        {{-- customer --}}
                        <li><a href="{{ route('dashboard.customer.index') }}"><i class="fas fa-users-crown"></i> Customer <span class="fa fa-chevron-down"></span></a>
                        </li>
                        {{-- //customer --}}

                        {{-- driver --}}
                        <li><a href="{{ route('dashboard.driver.index') }}"><i class="fas fa-steering-wheel"></i> Driver <span class="fa fa-chevron-down"></span></a>
                        </li>
                        {{-- //driver --}}
                        <li><a href="{{ route('dashboard.user.index') }}"><i class="fas fa-clipboard-user"></i> Staff</a></li>
                        <li><a href="{{ route('dashboard.user.create') }}">Add User</a></li>
                        @endcannot
                        <li><a href="{{ route('dashboard.user.userprofile', Auth::user()) }}">User Profile</a></li>
                    </ul>
                </li>
                @cannot('delivery')
                <li><a><i class="fab fa-product-hunt"></i> Products <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="{{ route('dashboard.product.index') }}">All Products</a></li>
                        <li><a href="{{ route('dashboard.product.create') }}">Add Product</a></li>
                    </ul>
                </li>
                <li><a><i class="fas fa-band-aid"></i> Brand <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="{{ route('dashboard.brand.index') }}">All Brands</a></li>
                        <li><a href="{{ route('dashboard.brand.create') }}">Add Brand</a></li>
                    </ul>
                </li>
                <li><a><i class="fas fa-tasks"></i> Category <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="{{ route('dashboard.category.index') }}">All Categories</a></li>
                        <li><a href="{{ route('dashboard.category.create') }}">Add Category</a></li>
                    </ul>
                </li>
                <li><a><i class="fad fa-car-alt"></i> Vehicle <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="{{ route('dashboard.vehicle.index') }}">All Vehicle</a></li>
                        <li><a href="{{ route('dashboard.vehicle.create') }}">Add Vehicle</a></li>
                    </ul>
                </li>
                <li><a><i class="fas fa-bags-shopping"></i> Order <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="{{ route('dashboard.order.index') }}">All Orders</a></li>
                        <li><a href="{{ route('dashboard.order.standard') }}">Standard Orders</a></li>
                        <li><a href="{{ route('dashboard.order.gift') }}">Gift Orders</a></li>
                    </ul>
                </li>
                 @endcannot
                <li><a><i class="fas fa-bags-shopping"></i> Delivery <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="{{ route('dashboard.delivery.index') }}">All Deliveries</a></li>
                    </ul>
                </li>
                @cannot('delivery')
                <li><a><i class="fas fa-location-circle"></i> Delivery Area<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="{{ route('dashboard.deliveryarea.index') }}">All Delivery Areas</a></li>
                        <li><a href="{{ route('dashboard.deliveryarea.create') }}">Add Delivery Area</a></li>
                    </ul>
                </li>
                <li><a><i class="fas fa-parachute-box"></i> Supplier <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="{{ route('dashboard.supplier.index') }}">All Suppliers</a></li>
                        <li><a href="{{ route('dashboard.supplier.create') }}">Add Supplier</a></li>
                        <li><a href="{{ route('dashboard.supplier.supplierproduct') }}">Supplier product</a></li>
                    </ul>
                </li>
                <li><a><i class="fas fa-chalkboard-teacher"></i> Complaint <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="{{ route('dashboard.complaint.index') }}">All Complaints</a></li>
                        <li><a href="{{ route('dashboard.complaint.pending') }}">New Complaints</a></li>
                        <li><a href="{{ route('dashboard.complaint.reviewing') }}">Reviewing Complaints</a></li>
                    </ul>
                </li>
                <li><a><i class="fas fa-chalkboard-teacher"></i> Inventory <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="{{ route('dashboard.inventory.index') }}">Stocked Products</a></li>
                        <li><a href="{{ route('dashboard.inventory.create') }}">Add new stock</a></li>
                    </ul>
                </li>
                <li><a><span class="glyphicon glyphicon-stats"></span> Report <span
                            class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="{{ route('dashboard.report.stock') }}">Stock Report</a></li>
                        <li><a href="{{ route('dashboard.report.order') }}">Order Report</a></li>
                        <li><a href="{{ route('dashboard.report.income') }}">Income Report</a></li>
                        <li><a href="{{ route('dashboard.report.user') }}">User Report</a></li>
                        <li><a href="{{ route('dashboard.report.customer') }}">Customer Report</a></li>
                        <li><a href="{{ route('dashboard.report.supplier') }}">Supplier Report</a></li>
                        <li><a href="{{ route('dashboard.report.saledproduct') }}">Saled Products Report</a></li>
                        <li><a href="{{ route('dashboard.report.delivery') }}">Delivery Report</a></li>
                        <li><a href="{{ route('dashboard.report.payment') }}">Payment Report</a></li>
                        <li><a href="{{ route('dashboard.report.tracking') }}">Tracking Report</a></li>
                    </ul>
                </li>
                 @endcannot
            </ul>
        </div>
    </div>
    <!-- /sidebar menu -->

    <!-- /menu footer buttons -->
    <div class="sidebar-footer hidden-small">
        <a data-toggle="tooltip" data-placement="top" title="Settings">
            <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
        </a>
        <a data-toggle="tooltip" data-placement="top" title="FullScreen">
            <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
        </a>
        <a data-toggle="tooltip" data-placement="top" title="Lock">
            <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
        </a>
        <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
            <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
        </a>
    </div>
    <!-- /menu footer buttons -->
</div>
