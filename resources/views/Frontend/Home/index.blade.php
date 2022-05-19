@extends('Frontend.Layout.index')
@section('sidebar')
    <section class="section gray-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-4">
                    <div class="categories-wrapper white-bg">
                        <h3 class="block-title">Product Categories</h3>
                        <ul class="vertical-menu">
                            <li>
                                <a href="{{route('frontend.home.allproducts')}}">All Products</a>
                            </li>
                            @php
                                $productcategories = \App\Model\Category::where('parent_id', 0)->has('children')->get();
                                // dd($productcategories);
                            @endphp
                            @foreach ($productcategories as $category)
                                <li class="dropdown">
                                    <a class="dropdown-toggle" data-toggle="dropdown"
                                        href="{{ route('frontend.category.catpage', $category->slug) }}">
                                        {{ $category->catname }} <i class="caret-right fa fa-angle-right"></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        @foreach ($category->children as $sub)
                                            <li>
                                                <a href="{{ route('frontend.category.catpage', $sub->slug) }}">{{ $sub->catname }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                            @endforeach
                            <li class="dropdown">
                                <a href="{{ route('frontend.category.catpage', 'valentine-gifts') }}">
                                    Valentine Gifts
                                </a>
                            </li>
                            <li class="dropdown">
                                <a href="{{ route('frontend.category.catpage', 'gifts-for-her') }}">
                                    Gifts For Her
                                </a>
                            </li>
                            <li class="dropdown">
                                <a href="{{ route('frontend.category.catpage', 'gifts-for-him') }}">
                                    Gifts For Him
                                </a>
                            </li>
                            <li class="dropdown">
                                <a href="{{ route('frontend.category.catpage', 'flowers') }}">
                                    Flowers
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-9 col-sm-8">
                    <div class="touch-slider owl-carousel" data-slider-pagination="true">
                        <div class="item">
                            <a href="category.html"><img
                                    src="https://www.wallpapers4u.org/wp-content/uploads/girl_laptop_shopping_white_background_77319_1920x1080.jpg"
                                    alt=""></a>
                        </div>
                        <div class="item">
                            <a href="category.html"><img src="upload/icons8-team-CePzL5MMNpE-unsplash.jpg" alt=""></a>
                        </div>
                        <div class="item">
                            <a href="category.html"><img
                                    src="https://www.teahub.io/photos/full/331-3313901_cheerful-shopping-shopping-children.jpg"
                                    alt=""></a>
                        </div>
                        <div class="item">
                            <a href="category.html"><img src="upload/freestocks-_3Q3tsJ01nc-unsplash.jpg" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('content')
    <!-- Feature ctg Section Start -->
    <section class="feature-categories section">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="feature-item-content">
                        <img src="upload/ryan-fields-Xz7MMD5tZwA-unsplash.jpg" alt="">
                        <div class="feature-content">
                            <div class="banner-text">
                                <h4>Toys</h4>
                                <p>View Collection</p>
                            </div>
                            @php
                                $toys = \App\Model\Category::with('products')->where('catname', 'Toys & Hobbies')->first();
                            @endphp
                            <a href="{{ route('frontend.category.catpage',$toys->slug) }}" class="btn btn-common">Shop
                                Now</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="feature-item-content">
                        <img src="upload/stil-fGDEjjfrDOI-unsplash.jpg" alt="">
                        <div class="feature-content">
                            <div class="banner-text">
                                <h4>Gifts</h4>
                            </div>
                            @php
                                $gifts = \App\Model\Category::with('products')->where('catname', 'Gift')->first();
                            @endphp
                            <a href="{{ route('frontend.category.catpage',$gifts->slug) }}" class="btn btn-common">Shop Now</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="feature-item-content mb-30">
                        <img src="upload/toa-heftiba-dE8HQZClGsI-unsplash.jpg" alt="">
                        <div class="feature-content">
                            <div class="banner-text accessories">
                                <h4>Home Decoration</h4>
                                <p>View Collection</p>
                            </div>
                             @php
                                $homedeco = \App\Model\Category::with('products')->where('catname', 'Home Decoration')->first();
                            @endphp
                            <a href="{{ route('frontend.category.catpage', $homedeco->slug) }}" class="btn btn-common">Shop Now</a>
                        </div>
                    </div>
                    <div class="feature-item-content">
                        <img src="upload/ahmet-hamdi-tj7Ftdf3JQM-unsplash.jpg" alt="">
                        <div class="feature-content">
                            <div class="banner-text accessories">
                                <h4>Watches</h4>
                                <p>View Collection</p>
                            </div>
                            @php
                                $watches = \App\Model\Category::with('products')->where('catname', 'Watches')->first();
                            @endphp
                            <a href="{{ route('frontend.category.catpage', $watches->slug) }}" class="btn btn-common">Shop Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Feature ctg Section End -->

    <!-- New Arrivals Section Start -->
    <section id="shop-collection">
        <div class="container">
            <h1 class="section-title">New Arrivals</h1>
            <hr class="lines">
            <div class="row">
                @foreach ($newproducts as $product)
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="shop-product">
                            <div class="product-box">
                                <a href="{{ route('frontend.product.index', $product->slug) }}">
                                    <img src="{{ url('upload/product', $product->image) }}"
                                        alt="{{ $product->proname }}"></a>
                                <div class="cart-overlay">
                                </div>
                                {{-- <span class="sticker new"><strong>NEW</strong></span> --}}
                                <div class="actions">
                                    <div class="add-to-links" data-modal="modal-4">
                                        @auth
                                            @if ($product->quantity !=2)
                                                <a href="{{ route('frontend.cart.addTocart', $product->slug) }}"
                                                    class="btn-cart"><i class="icon-basket-loaded"></i></a>
                                            @endif
                                            <a href="{{ route('frontend.wishlist.addTowish', $product->slug) }}"
                                                class="btn-wish"><i class="icon-heart"></i></a>
                                            <a href="{{ route('frontend.product.index', $product->slug) }}"
                                                class="btn-quickview md-trigger" data-modal="modal-3"><i
                                                    class="icon-eye"></i></a> 
                                        @endauth
                                        @guest
                                            <a href="{{ route('frontend.product.index', $product->slug) }}"
                                                class="btn-quickview md-trigger" data-modal="modal-3"><i
                                                    class="icon-eye"></i></a> 
                                        @endguest
                                    </div>
                                </div>
                            </div>
                            <div class="product-info">
                                <h4 class="product-title"><a href="{{route('frontend.product.index',$product->slug)}}">{{ $product->proname }}</a></h4>
                                <div class="align-items">
                                    <div class="pull-left">
                                        <span class="price">LKR {{ $product->salesprice }}</span>
                                    </div>
                                    {{-- <div class="pull-right">
                                        <div class="reviews-icon">
                                            <i class="i-color fa fa-star"></i>
                                            <i class="i-color fa fa-star"></i>
                                            <i class="i-color fa fa-star"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- New Arrivals Section End -->

    <!--  Discount Product Start  -->
    <section class="discount-product-area">
        <div class="container">
            <div class="row">
                <div class="discount-text">
                    <h3>Shop All Products</h3>
                    <a href="{{route('frontend.home.allproducts')}}" class="btn btn-common btn-large">All Products</a>
                </div>
            </div>
        </div>
    </section>
    <!--  Discount Product End  -->

    <!--Featured Products Section Start-->
    <section class="section">
        <div class="container">
            <h1 class="section-title">Featured Products</h1>
            <hr class="lines">
            <div class="row">
                <div class="col-md-12">
                    <div id="new-products" class="owl-carousel">
                        @foreach ($feature as $product)
                            <div class="item">
                                <div class="shop-product">
                                    <div class="product-box">
                                        <a href="{{ route('frontend.product.index', $product->slug) }}"><img
                                                src="{{ url('upload/product', $product->image) }}"
                                                alt="{{ $product->proname }}"></a>
                                        <div class="cart-overlay">
                                        </div>
                                        {{-- <span class="sticker new"><strong>NEW</strong></span> --}}
                                        <div class="actions">
                                            <div class="add-to-links">
                                                @auth
                                                   @if ($product->quantity !=2)
                                                        <a href="{{ route('frontend.cart.addTocart', $product->slug) }}"
                                                            class="btn-cart"><i class="icon-basket-loaded"></i></a>
                                                    @endif
                                                    <a href="{{ route('frontend.wishlist.addTowish', $product->slug) }}"
                                                        class="btn-wish"><i class="icon-heart"></i></a>
                                                    <a href="{{ route('frontend.product.index', $product->slug) }}"
                                                        class="btn-quickview md-trigger" data-modal="modal-3"><i
                                                            class="icon-eye"></i></a> 
                                                @endauth
                                                @guest
                                                    <a href="{{ route('frontend.product.index', $product->slug) }}"
                                                        class="btn-quickview md-trigger" data-modal="modal-3"><i
                                                            class="icon-eye"></i></a> 
                                                @endguest
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <h4 class="product-title"><a
                                                href="{{route('frontend.product.index',$product->slug)}}">{{ $product->proname }}</a></h4>
                                        <div class="align-items">
                                            <div class="pull-left">
                                                <span class="price">LKR {{ $product->salesprice }}</span>
                                            </div>
                                            {{-- <div class="pull-right">
                                                <div class="reviews-icon">
                                                    <i class="i-color fa fa-star"></i>
                                                    <i class="i-color fa fa-star"></i>
                                                    <i class="i-color fa fa-star"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </div>
                                            </div> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Featured Products Section End -->

    <!-- Recommended For You Products Start -->
    <section class="listcart-products section">
        <div class="container">
            <h1 class="section-title">Recommended For You</h1>
            <hr class="lines">
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="listcartproducts">
                        @php
                            $boquets = \App\Model\Category::where('catname', 'Flower Boquet')->with('products')->first();
                        @endphp
                        <h2 class="title-cart">Flower Boquets</h2>
                        <div class="products-item-inner">
                            @foreach ($boquets->products->take(2) as $item)
                                <div class="products-item">
                                <div class="left">
                                    <a href="{{route('frontend.product.index',$item->slug)}}">
                                        <img src="{{ url('upload/product', $item->image) }}"
                                        alt="{{ $item->proname }}"></a>
                                    <a href="{{ route('frontend.product.index', $item->slug) }}" class="quick-view"><i class="icon-magnifier"></i></a>
                                </div>
                                <div class="right">
                                    <h5 class="product-name">{{$item->proname}}</h5>
                                    {{-- <div class="reviews-icon">
                                        <i class="i-color fa fa-star"></i>
                                        <i class="i-color fa fa-star"></i>
                                        <i class="i-color fa fa-star"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                    </div> --}}
                                    <div class="price">
                                        LKR {{$item->salesprice}}
                                    </div>
                                </div>
                            </div>
                            @endforeach                          
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="listcartproducts">
                         @php
                            $toys = \App\Model\Category::where('catname', 'Toys & Hobbies')->with('products')->first();
                        @endphp
                        <h2 class="title-cart">Toys</h2>
                        <div class="products-item-inner">
                            @foreach ($toys->products->take(2) as $item)
                                <div class="products-item">
                                <div class="left">
                                    <a href="{{route('frontend.product.index',$item->slug)}}">
                                        <img src="{{ url('upload/product', $item->image) }}"
                                        alt="{{ $item->proname }}"></a>
                                    <a href="{{ route('frontend.product.index', $item->slug) }}" class="quick-view"><i class="icon-magnifier"></i></a>
                                </div>
                                <div class="right">
                                    <h5 class="product-name">{{$item->proname}}</h5>
                                    {{-- <div class="reviews-icon">
                                        <i class="i-color fa fa-star"></i>
                                        <i class="i-color fa fa-star"></i>
                                        <i class="i-color fa fa-star"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                    </div> --}}
                                    <div class="price">
                                        LKR {{$item->salesprice}}
                                    </div>
                                </div>
                            </div>
                            @endforeach       
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="listcartproducts">
                         @php
                            $couplewatches = \App\Model\Category::where('catname', 'Couple Watches')->with('products')->first();
                        @endphp
                        <h2 class="title-cart">Couple Watches</h2>
                        <div class="products-item-inner">
                            @foreach ($couplewatches->products->take(2) as $item)
                                <div class="products-item">
                                <div class="left">
                                    <a href="{{route('frontend.product.index',$item->slug)}}">
                                        <img src="{{ url('upload/product', $item->image) }}"
                                        alt="{{ $item->proname }}"></a>
                                    <a href="{{ route('frontend.product.index', $item->slug) }}" class="quick-view"><i class="icon-magnifier"></i></a>
                                </div>
                                <div class="right">
                                    <h5 class="product-name">{{$item->proname}}</h5>
                                    {{-- <div class="reviews-icon">
                                        <i class="i-color fa fa-star"></i>
                                        <i class="i-color fa fa-star"></i>
                                        <i class="i-color fa fa-star"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                    </div> --}}
                                    <div class="price">
                                        LKR {{$item->salesprice}}
                                    </div>
                                </div>
                            </div>
                            @endforeach       
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Recommended For You Products End -->
@endsection
