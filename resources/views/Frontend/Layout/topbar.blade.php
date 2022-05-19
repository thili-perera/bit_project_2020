<div class="top-bar">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-4">
                <div class="clear"></div>
            </div>
            <div class="col-md-6 col-sm-8">
                <!-- shopping cart end -->
                <div class="search-area">
                    <form action="{{route('frontend.home.search')}}" method="POST">
                        @csrf
                        <div class="control-group">
                            {{-- <ul class="categories-filter animate-dropdown">
                                <li class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown"
                                        href="category.html">Categories <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li class="menu-header">Clothing</li>
                                        <li><a tabindex="-1" href="#">- Men</a></li>
                                        <li><a tabindex="-1" href="#">- Women</a></li>
                                        <li><a tabindex="-1" href="#">- Boys</a></li>
                                        <li><a tabindex="-1" href="#">- Girls</a></li>
                                        <li class="menu-header">Electronics</li>
                                        <li><a tabindex="-1" href="#">- Laptops</a></li>
                                        <li><a tabindex="-1" href="#">- Desktops</a></li>
                                        <li><a tabindex="-1" href="#">- Cameras</a></li>
                                        <li><a tabindex="-1" href="#">- Mobile Phones</a></li>
                                    </ul>
                                </li>
                            </ul> --}}
                            <input type="text" name="search" class="search-field" placeholder="Search here...">
                            <button type="submit" class="search-button"><i class="icon-magnifier"></i></button>
                        </div>
                    </form>
                </div>
                <!-- shopping cart start -->
                <div class="shop-cart">
                    <ul>
                         
                        <li style="margin-right: 12px;"><a class="cart-icon cart-btn" href="{{route('frontend.wishlist.index')}}"><i
                                    class="icon-heart"></i><span class="cart-label">
                                        @auth
                                            @php
                                            {{
                                                $user= Auth::user()->id;
                                                $wishcollection = App\Model\Wishlist::where('user_id',$user)->count();

                                                // $collection=count($wishcollection);
                                            }}
                                            @endphp
                                            {{$wishcollection}}
                                        @endauth

                                        @guest
                                            0
                                        @endguest
                                        
                            </span></a></li>
                        {{-- cart start --}}
                        <li style="margin-right: 12px;">
                            <a href="{{route('frontend.cart.index')}}" class="cart-icon cart-btn"><i
                                    class="icon-basket-loaded"></i><span class="cart-label">
                                    @if (Session::has('cart'))
                                    {{count((array) session('cart'))}}
                                    @else
                                    0
                                    @endif
                                </span></a>
 
                            <div class="cart-box">
                                <div class="popup-container">
                                    @if (Session::has('cart'))
                                    @php
                                    $total = 0
                                    @endphp
                                    @foreach (session('cart') as $id=> $product)
                                    @php
                                    $total += $product['salesprice']*$product['quantity']
                                    @endphp
                                    <div class="cart-entry">
                                        <a href="#" class="image">
                                            <a class="image" href="{{route('frontend.product.index',$product['slug'])}}"><img
                                                    src="{{url('upload/product',$product['image'])}}"
                                                    class="img-thumbnail" alt="{{$product['image']}}" width="50px"></a>
                                        </a>
                                        <div class="content">
                                            <a href="{{route('frontend.product.index',$product['slug'])}}" class="title">{{$product['name']}}</a>
                                            <p class="quantity">Quantity: {{$product['quantity']}}</p> 
                                            <span class="price">LKR
                                                {{$product['salesprice'] *$product['quantity']}}</span>
                                        </div>
                                        <form action="{{route('frontend.cart.itemdelete',$product['id'])}}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <input type="hidden" name="productid" value="{{$product['id']}}">
                                            <button type="submit" class="button-x">
                                                <a name="" id="" class="" href="#" role="button">
                                                    <i class="icon-close"></i>
                                                </a>
                                            </button>
                                            <input type="hidden" name="topbar_cart_delete" value="topbar_cart_delete">
                                        </form>
                                    </div>
                                    @endforeach
                                    @else
                                    <div class="row clearfix ">
                                        <div class="text-center ">
                                            <h4 class="">Your Cart is empty..</h4>
                                        </div>
                                    </div>

                                    @endif
                                    <div class="summary">
                                        @if (!empty(Session::has('cart')))
                                        <div class="subtotal">Sub Total</div>
                                        <div class="price-s">LKR
                                            {{$total}}
                                        </div>
                                        @endif

                                    </div>
                                    <div class="cart-buttons">
                                        @if (!empty(Session::has('cart')))
                                        <a href="{{route('frontend.cart.index')}}" class="btn btn-border-2">View
                                            Cart</a>
                                        <a href="{{route('frontend.checkout.index')}}"
                                            class="btn btn-common">Checkout</a>
                                        @endif 
                                    </div>
                                </div>
                            </div>
                        </li>
                        {{-- //cart start --}}

                        {{-- gift start --}}
                        <li>
                            <a href="{{route('frontend.gift.index')}}" class="cart-icon cart-btn"><i
                                    class="icon-bag"></i><span class="cart-label">
                                    @if (Session::has('gift'))
                                    {{count((array) session('gift'))}}
                                    @else
                                    0
                                    @endif
                                </span></a>

                            <div class="cart-box">
                                <div class="popup-container">
                                    @if (Session::has('gift'))
                                    @php
                                    $total = 0
                                    @endphp
                                    @foreach (session('gift') as $id=> $product)
                                    @php
                                    $total += $product['salesprice']*$product['quantity']
                                    @endphp
                                    <div class="cart-entry">
                                        <a href="#" class="image">
                                            <a class="image" href="#"><img
                                                    src="{{url('upload/product',$product['image'])}}"
                                                    class="img-thumbnail" alt="{{$product['image']}}" width="50px"></a>
                                        </a>
                                        <div class="content">
                                            <a href="#" class="title">{{$product['name']}}</a>
                                            <p class="quantity">Quantity: {{$product['quantity']}}</p>
                                            <span class="price">LKR
                                                {{$product['salesprice'] *$product['quantity']}}</span>
                                        </div>
                                        <form action="{{route('frontend.gift.itemdelete',$product['id'])}}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <input type="hidden" name="productid" value="{{$product['id']}}">
                                            <button type="submit" class="button-x">
                                                <a name="" id="" class="" href="#" role="button">
                                                    <i class="icon-close"></i>
                                                </a>
                                            </button>
                                            <input type="hidden" name="topbar_gift_delete" value="topbar_gift_delete">
                                        </form>
                                    </div>
                                    @endforeach
                                    @else 
                                    <div class="row clearfix ">
                                        <div class="text-center ">
                                            <h4 class="">Your Cart is empty..</h4>
                                        </div>
                                    </div>

                                    @endif
                                    <div class="summary">
                                        @if (!empty(Session::has('gift')))
                                        <div class="subtotal">Sub Total</div>
                                        <div class="price-s">LKR
                                            {{$total}}
                                        </div>
                                        @endif

                                    </div>
                                    <div class="cart-buttons">
                                        @if (!empty(Session::has('gift')))
                                        <a href="{{route('frontend.gift.index')}}" class="btn btn-border-2">View
                                            Gift</a>
                                        <a href="{{route('frontend.checkout.giftcheckout')}}"
                                            class="btn btn-common">Checkout</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </li>
                        {{-- //gift start --}}
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>