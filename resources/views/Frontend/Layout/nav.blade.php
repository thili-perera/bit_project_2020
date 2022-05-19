<div class="container">
    <div class="row">
        <div class="navbar-header">
            <!-- Stat Toggle Nav Link For Mobiles -->
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="{{route('frontend.home.index')}}" class="mb-3"
                style="color: #f50057; font-family: 'Josefin Sans'; padding-bottom: 75px;">
                {{-- <img src="upload/Logopit_1611396135936.jpg" alt=""> --}}

                <h1 align="center"><span class="icon-bag"></span>WGC</h1>
                <h6>Wijayasiri Gift Centre</h6>
            </a>
        </div>
        <div class="navbar-collapse collapse">
            <!-- Start Navigation List -->
            <ul class="nav navbar-nav">
                <li>
                    <a class="active" href="{{route('frontend.home.index')}}">
                        Home
                    </a>
                </li>     
                <li class="drop">
                    <a href="#">Catalog <span class="caret"></span></a>
                    <div class="dropdown mega-menu megamenu1">
                        <div class="row">
                            @php
                                {{$productcategories = App\Model\Category::where('parent_id',0)->get(); }}
                                // dd($productcategories);
                            @endphp

                            @foreach ($productcategories->take(3) as $category)
                            <div class="col-sm-3 col-xs-12">
                                <ul class="menulinks">
                                    <li class="maga-menu-title">
                                        <a href="{{route('frontend.category.catpage',$category->slug)}}">{{$category->catname}}</a>
                                    </li>

                                    @foreach ($category->children as $sub)
                                    <li><a href="{{route('frontend.category.catpage',$sub->slug)}}">{{$sub->catname}}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                            @endforeach
                            <div class="col-sm-3 col-xs-12">
                            <span class="block-last">
                            <img src="assets/img/block_menu.jpg" alt="">
                            </span>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <a href="{{route('frontend.home.contact')}}">
                        Contact Us
                    </a>
                </li>
                <li>
                    <a href="{{route('frontend.home.about')}}">
                        About US
                    </a>
                </li>
            </ul>
<!-- End Navigation List -->

<div class="icon-right pull-right">
    <div class="text-right">
        <!-- account menu start -->
        <div class="account link-inline">
            <div class="dropdown text-right">
                <a href="#" aria-expanded="false" class="dropdown-toggle" data-toggle="dropdown">
                    {{-- @if (Auth::user()->hasRole('Customer'))
                                <span class="icon-user"></span> {{Auth::user()->username}} <span
                        class="icon-arrow-down"></span>
                    @else
                    <span class="icon-user"></span>Account <span class="icon-arrow-down"></span>
                    @endif --}}
                    @auth
                    <span class="icon-user"></span> {{Auth::user()->username}} <span class="icon-arrow-down"></span>
                    @endauth

                    @guest
                    <span class="icon-user"></span>Account <span class="icon-arrow-down"></span>
                    @endguest
                </a>
                <ul class="dropdown-menu">
                    <li><a href="{{route('frontend.profile.index')}}"><span class="icon icon-user"></span>My
                            Account</a></li>
                    <li><a href="{{route('frontend.wishlist.index')}}"><span class="icon icon-heart"></span>My
                            Wishlist</a></li>
                    <li><a href="{{route('frontend.order.index')}}"><span class="icon icon-handbag"></span>My Orders</a>
                    </li>
                    @guest
                    <li><a href="{{route('frontend.login')}}"><span class="icon icon-lock"></span>Log In</a>
                    </li>
                    <li><a href="{{route('frontend.signup')}}"><span class="icon icon-user-follow"></span>Create an
                        account</a></li>
                    @endguest
                    @auth
                        <li><a href="{{route('frontend.logout')}}"><span class="icon icon-close"></span>Sign
                            Out</a></li>
                    @endauth
                    
                </ul>
            </div>
        </div>
        <!-- account menu end -->
    </div>
</div>
</div>
</div>
</div>
<!-- End Header Logo & Naviagtion -->

<!-- Mobile Menu Start -->
<ul class="mobile-menu">
    <li>
        <a class="active" href="index.html">
            Home
        </a>
        <ul class="dropdown">
            <li>
                <a href="index.html">Home V1</a>
            </li>
            <li>
                <a class="active" href="index-2.html">Home V2</a>
            </li>
        </ul>
    </li>
    <li>
        <a href="about.html">About</a>
    </li>
    <li>
        <a href="#">Catalog</a>
        <ul class="dropdown menulinks">
            <li class="maga-menu-title">
                <a href="#">Men</a>
            </li>
            <li><a href="category.html">Clothing</a></li>
            <li><a href="category.html">Handbags</a></li>
            <li><a href="category.html">Maternity</a></li>
            <li><a href="category.html">Jewelry</a></li>
            <li><a href="category.html">Scarves</a></li>
            <li class="maga-menu-title">
                <a href="#">Women</a>
            </li>
            <li><a href="category.html">Handbags</a></li>
            <li><a href="category.html">Jewelry</a></li>
            <li><a href="category.html">Clothing</a></li>
            <li><a href="category.html">Watches</a></li>
            <li><a href="category.html">Hats</a></li>
            <li class="maga-menu-title">
                <a href="#">Accessories</a>
            </li>
            <li><a href="category.html">Belts</a></li>
            <li><a href="category.html">Scarves</a></li>
            <li><a href="category.html">Hats</a></li>
            <li><a href="category.html">Ties</a></li>
            <li><a href="category.html">Handbags</a></li>
        </ul>
    </li>
    <li>
        <a href="#">Shop</a>
        <ul class="menulinks">
            <li class="maga-menu-title">
                <a href="#">Shop Types</a>
            </li>
            <li><a href="shop.html">Shop</a></li>
            <li><a href="shop-grid.html">Shop Grid Sidebar</a></li>
            <li><a href="shop-list.html">Shop List Sidebar</a></li>
            <li><a href="shop-right-sidebar.html">Shop Right Sidebar</a></li>
            <li><a href="product-details.html">Product Details</a></li>
            <li class="maga-menu-title">
                <a href="#">Shop Pages</a>
            </li>
            <li><a href="shopping-cart.html">Cart Page</a></li>
            <li><a href="checkout.html">Checkout Page</a></li>
            <li><a href="wishlist.html">Wishlist</a></li>
            <li><a href="order.html">Your Order</a></li>
            <li><a href="login.html">Login</a></li>
            <li><a href="login-form.html">My Account</a></li>
        </ul>
    </li>
    <li>
        <a href="#">Pages</a>
        <ul class="dropdown">
            <li>
                <a href="about.html">About Us</a>
            </li>
            <li>
                <a href="services.html">Services</a>
            </li>
            <li>
                <a href="contact.html">Contact Us</a>
            </li>
            <li>
                <a href="product-details.html">Product Details</a>
            </li>
            <li>
                <a href="team.html">Team Member</a>
            </li>
            <li>
                <a href="checkout.html">Checkout</a>
            </li>
            <li>
                <a href="shopping-cart.html">Shopping cart</a>
            </li>
            <li>
                <a href="faq.html">FAQs</a>
            </li>
            <li>
                <a href="wishlist.html">Wishlist</a>
            </li>
            <li>
                <a href="404.html">404 Error</a>
            </li>
        </ul>
    </li>
    <li>
        <a href="#">Blog</a>
        <ul class="dropdown">
            <li>
                <a href="blog.html">Blog Right Sidebar</a>
            </li>
            <li>
                <a href="blog-left-sidebar.html">Blog Left Sidebar</a>
            </li>
            <li>
                <a href="blog-full-width.html">Blog Full Width</a>
            </li>
            <li>
                <a href="blog-details.html">Blog Details</a>
            </li>
        </ul>
    </li>
    <li>
        <a href="contact.html">Contact</a>
    </li>
    <li><a href="#">Account</a>
        <ul class="dropdown">
            <li><a href="login-form.html">My Account</a></li>
            <li><a href="wishlist.html">My Wishlist</a></li>
            <li><a href="compare.html">Compare</a></li>
            <li><a href="checkout.html">Checkout</a></li>
            <li><a href="login.html">Log In</a></li>
            <li><a href="register.html">Create an account</a></li>
            <li><a href="#">close</a></li>
        </ul>
    </li>
</ul>
<!-- Mobile Menu End -->