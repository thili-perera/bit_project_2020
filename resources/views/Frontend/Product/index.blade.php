@extends('Frontend.Layout.index')
@section('content')
    <!-- Single-prouduct Section Start -->
    <section id="product-collection" class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="product-details-image">
                        <div class="slider-for slider">
                            <div>
                                <img src="{{ url('upload/product', $product->image) }}" class="img-thumbnail"
                                    alt="{{ $product->image }}" width="400px">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 col-sm-6 col-xs-12">
                    <div class="info-panel">
                        <h1 class="product-title">{{ $product->proname }}</h1>
                        <!-- Rattion Price -->
                        <div class="price-ratting">
                            <div class="price float-left">
                                LKR {{ $product->salesprice }}
                            </div>
                            <div class="ratting float-right">
                                <div class="product-star">
                                    <span>({{ $reviews->count() }} Customer Review)</span>
                                </div>
                            </div>
                        </div>
                        <!-- Short Description -->
                        <div class="short-desc">
                            <h5 class="sub-title">Quick Overview</h5>
                            <p>{!! $product->content !!} </p>
                        </div>
                        <form action="{{ route('frontend.product.action') }}" method="post">
                            @csrf
                            <div class="row mb-10">
                                <label for="">Quantity :</label>
                                <input type="number" name="quantity" id="" min="1" value="1">
                                <input type="hidden" value="{{ $product->id }}" name="product_id">

                                @if ($product->quantity-2 <=0)
                                    <label style="color: gray"><small> Availability : <span style="color: red"> Out Of Stock</span> </small></label>
                                @else
                                    <label style="color: gray"><small> Availability : {{ $product->quantity-2 }}</small></label>
                                @endif

                                
                            </div>
                            <div class="row">
                                <div class=" quantity-cart">
                                     @if ($product->quantity-2 <=0)
                                        <button type="submit" disabled value="cart" name="cart" class="btn btn-common">Add to
                                            cart</button>
                                            @if ($product->hasCategory('Gift'))
                                        <button type="submit" disabled value="gift" name="gift" class="btn btn-common">Add To
                                             Gift</button>
                                        @endif
                                        <button type=" submit" disabled value="buy" name="buy" class="btn btn-common">Buy Now</button>
                                    @else
                                        <button type="submit" value="cart" name="cart" class="btn btn-common">Add to
                                            cart</button>
                                            @if ($product->hasCategory('Gift'))
                                        <button type="submit" value="gift" name="gift" class="btn btn-common">Add To
                                             Gift</button>
                                        @endif
                                        <button type=" submit" value="buy" name="buy" class="btn btn-common">Buy Now</button>
                                    @endif
                                </div>
                            </div>
                        </form>
                        <!-- Usefull Link -->
                        <ul class="usefull-link">
                            <li><a href="{{ route('frontend.wishlist.addTowish', $product->slug) }}"><i
                                        class="icon-heart"></i>
                                    Wishlist</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Single-prouduct Section End -->

    <!-- Single-prouduct-tab Start -->
    <div class="single-pro-tab section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-xs-12">
                    <div class="single-pro-tab-menu">
                        <!-- Nav tabs -->
                        <ul class="">
                            <li class="active"><a href="#reviews" data-toggle="tab">Reviews</a></li>
                            <li><a href="#description" data-toggle="tab">Description</a></li>
                        </ul>
                    </div>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        {{-- customer review --}}
                        <div class="tab-pane active" id="reviews">
                            <div class="pro-tab-info pro-reviews">
                                <div class="customer-review">
                                    <h3 class="small-title">Customer review</h3> 
                                    @if ($reviews->count() == 0)
                                        <p class="text-secondary"> No reviews yet...</p>
                                    @else
                                        @foreach ($reviews->take(3) as $review)
                                            <div class="row rev1" style="margin-top: 3px;">
                                                <div class="pro-reviewer">
                                                    @if ($review->user->image)
                                                        <img src="{{ url('upload/user', $review->user->image) }}"
                                                            class="img-thumbnail" alt="{{ $review->user->image }}"
                                                            width="50px">
                                                    @else
                                                        <img src="https://upload.wikimedia.org/wikipedia/commons/7/7c/Profile_avatar_placeholder_large.png"
                                                            class="img-fluid" alt="">
                                                    @endif
                                                </div>
                                                <div class="pro-reviewer-comment">
                                                    <div class="fix">
                                                        <div class="pull-left mbl-center">
                                                            <h5><strong>{{ $review->user->fname }}
                                                                    {{ $review->user->lname }}</strong>
                                                            </h5>
                                                            <p class="reply-date">
                                                                {{ $review->created_at->format('Y/m/d') }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                    @if ($review->rate == 1)
                                                        <span>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                        </span>

                                                    @elseif($review->rate==2)
                                                        <span>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                        </span>
                                                    @elseif($review->rate==3)
                                                        <span>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                        </span>
                                                    @elseif($review->rate==4)
                                                        <span>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star-o"></i>
                                                        </span>
                                                    @elseif($review->rate==5)
                                                        <span>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                        </span>

                                                    @endif
                                                    <p>{{ $review->review_content }}</p>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>

                                @auth
                                @if ($order_product->isNotEmpty())
                                    <div class="leave-review">
                                        <h3 class="small-title">Leave your review</h3>
                                        <form class="form-horizontal"
                                            action="{{ route('frontend.review.store', $product->slug) }}" method="POST">
                                            @csrf
                                            <div class="btn-group btn-group-toggle m-bottom" data-toggle="buttons">
                                                <label class="btn btn-secondary">
                                                    
                                                    @if (optional($rate)->rate == 1)
                                                        <input type="radio" name="rate" value="1" id="option1"
                                                            autocomplete="off">
                                                        <i class="fa fa-star"></i>
                                                        <span class="separator">|</span>
                                                    @else
                                                        <input type="radio" name="rate" value="1" id="option1"
                                                            autocomplete="off">
                                                        <i class="fa fa-star-o"></i>
                                                        <span class="separator">|</span>
                                                    @endif
                                                </label>
                                                <label class="btn btn-secondary">
                                                    @if (optional($rate)->rate == 2)
                                                        <input type="radio" name="rate" value="2" id="option2"
                                                            autocomplete="off">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <span class="separator">|</span>
                                                    @else
                                                        <input type="radio" name="rate" value="2" id="option2"
                                                            autocomplete="off">
                                                        <i class="fa fa-star-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                        <span class="separator">|</span>
                                                    @endif
                                                </label>
                                                <label class="btn btn-secondary">
                                                    @if (optional($rate)->rate == 3)
                                                        <input type="radio" name="rate" value="3" id="option3"
                                                            autocomplete="off">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <span class="separator">|</span>
                                                    @else
                                                        <input type="radio" name="rate" value="3" id="option3"
                                                            autocomplete="off">
                                                        <i class="fa fa-star-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                        <span class="separator">|</span>
                                                    @endif
                                                </label>
                                                <label class="btn btn-secondary">
                                                    @if (optional($rate)->rate == 4)
                                                        <input type="radio" name="rate" value="4" id="option4"
                                                            autocomplete="off">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <span class="separator">|</span>
                                                    @else
                                                        <input type="radio" name="rate" value="4" id="option4"
                                                            autocomplete="off">
                                                        <i class="fa fa-star-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                        <span class="separator">|</span>
                                                    @endif
                                                </label>
                                                <label class="btn btn-secondary">
                                                    @if (optional($rate)->rate == 5)
                                                        <input type="radio" name="rate" value="5" id="option5"
                                                            autocomplete="off">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    @else
                                                        <input type="radio" name="rate" value="5" id="option5"
                                                            autocomplete="off">
                                                        <i class="fa fa-star-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    @endif
                                                </label>
                                                 @error('rate')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="reply-box">
                                                <div class="form-group">
                                                    <div class="col-md-6">
                                                        <input class="form-control" type="text" name="fname"
                                                            placeholder="{{ optional(Auth::user())->username }}"
                                                            value="{{ optional(Auth::user())->username }}">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <textarea class="form-control input-lg" name="review_content" rows="4"
                                                            placeholder="{{ optional(Auth::user())->review_content }}"></textarea>
                                                        @error('review_content')
                                                            <p class="text-danger">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <button class="btn btn-common" type="submit">Submit Review</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                @endif
                                   
                                @endauth
                            </div>
                        </div>
                        {{-- //customer review --}}

                        {{-- product description --}}
                        <div class="tab-pane " id="description">
                            <div class="pro-tab-info pro-description">
                                <h3 class="small-title">{{$product->proname}}</h3>
                                <p>{!! $product->content !!}</p>
                            </div>
                        </div>
                        {{-- //product description --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Single-prouduct-tab End -->

    {{-- similar products --}}
    <section class="section">
        <div class="container">
            <h1 class="section-title">Similar Products</h1>
            <hr class="lines">
            <div class="row">
                <div class="col-md-12">
                    <div id="new-products" class="owl-carousel">
                        @foreach ($categories->products as $product)
                            <div class="item">
                                <div class="shop-product">
                                    <div class="product-box">
                                        <a href="{{ route('frontend.product.index', $product->slug) }}"><img
                                                src="{{ url('upload/product', $product->image) }}"
                                                alt="{{ $product->proname }}"></a>
                                        <div class="cart-overlay">
                                        </div>
                                        <div class="actions">
                                            <div class="add-to-links">
                                                <a href="{{ route('frontend.cart.addTocart', $product->slug) }}"
                                                    class="btn-cart"><i class="icon-basket-loaded"></i></a>
                                                <a href="{{ route('frontend.wishlist.addTowish', $product->slug) }}"
                                                    class="btn-wish"><i class="icon-heart"></i></a>
                                                <a class="btn-quickview md-trigger" data-modal="modal-3"><i
                                                        class="icon-eye"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <h4 class="product-title"><a
                                                href="product-details.html">{{ $product->proname }}</a></h4>
                                        <div class="align-items">
                                            <div class="pull-left">
                                                <span class="price">LKR {{ $product->salesprice }}</span>
                                            </div>
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
    {{-- /similar products --}}

@endsection
