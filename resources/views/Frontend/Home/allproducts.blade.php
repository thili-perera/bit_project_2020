@extends('Frontend.Layout.index')
@section('sidebar')
    <section class="section gray-bg mb-50">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-4">
                    <div class="categories-wrapper white-bg">
                        <h3 class="block-title">Product Categories</h3>
                        <ul class="vertical-menu">
                            {{-- <li>
                                <a href="#">New Arrivals</a>
                            </li>
                            <li>
                                <a href="#">All Products</a>
                            </li> --}}
                            @php
                                $productcategories = \App\Model\Category::where('parent_id', 0)->has('children')->get();
                                // dd($productcategories);
                            @endphp
                            @foreach ($productcategories as $category)
                                <li class="dropdown">
                                    <a class="dropdown-toggle" data-toggle="dropdown"
                                        href="{{ route('frontend.category.catpage', $category->slug) }}" role="button">
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
    <!-- New Arrivals Section Start -->
    <section id="shop-collection">
        <div class="container">
            <h1 class="section-title">All Products</h1>
            <hr class="lines">
            <div class="row">
                @foreach ($products as $product)
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

@endsection
