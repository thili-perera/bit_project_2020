@extends('Frontend.Layout.index')
@section('content')


    <!-- Product Categories Section Start -->
    <div id="content" class="product-area">
      <div class="container">
        <div class="row">
          <div class="col-md-3 col-sm-3 col-xs-12">
            <div class="widget-search md-30">
              <form action="{{route('frontend.home.search')}}" method="POST">
                @csrf
                <input name="search" class="form-control" placeholder="Search here..." type="text">
                <button type="submit">
                  <i class="fa fa-search"></i>
                </button>
              </form>
            </div>
            <div class="widget-ct widget-categories mb-30">
              <div class="widget-s-title">
                <h4>Categories</h4>
              </div>
              @php
                $productcategories = \App\Model\Category::where('parent_id', 0)->has('children')->get();
                // dd($productcategories);
            @endphp
              <ul id="accordion-category" class="product-cat">
                @foreach ($productcategories as $category)
                  <li class="dropdown mb-20">
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
                <li class="mb-20">
                  <a href="{{ route('frontend.category.catpage', 'valentine-gifts') }}">
                      Valentine Gifts
                  </a>
                </li>
                <li class="mb-20">
                  <a href="{{ route('frontend.category.catpage', 'gifts-for-her') }}">
                      Gifts For Her
                  </a>
                </li>
                <li class="mb-20">
                  <a href="{{ route('frontend.category.catpage', 'gifts-for-him') }}">
                    Gifts For Him
                  </a>
                </li>
                <li class="mb-20">
                   <a href="{{ route('frontend.category.catpage', 'flowers') }}">
                    Flowers
                  </a>
                </li>
              </ul>
            </div>
          </div>
          
          <div class="col-md-9 col-sm-9 col-xs-12">
            <div class="shop-content">
              <div class="col-md-12">
                <div class="product-option mb-30 clearfix">
                  <ul class="shop-tab">
                    <li class="active"><a aria-expanded="true" href="#grid-view" data-toggle="tab">{{$categories->catname}}</a></li>
                    {{-- <li><a aria-expanded="false" href="#list-view" data-toggle="tab"><i class="icon-list"></i></a></li> --}}
                  </ul>
                  <!-- Size end -->               
                </div>            
              </div>

              <div class="tab-content">
                <div id="grid-view" class="tab-pane active">
                    @foreach ($categories->products as $product)
                        <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="shop-product">
                      <div class="product-box">
                        <a href="#"><img src="{{url('upload/product',$product->image)}}"  alt="{{$product->image}}"></a>
                        <div class="cart-overlay">
                        </div>
                        <div class="actions">
                          <div class="add-to-links">                     
                              <a href="{{route('frontend.cart.addTocart',$product->slug)}}" class="btn-cart"><i class="icon-basket-loaded"></i></a>
                              <a href="{{route('frontend.wishlist.addTowish',$product->slug)}}" class="btn-wish"><i class="icon-heart"></i></a>
                              <a href="{{route('frontend.product.index',$product->slug)}}" class="btn-quickview md-trigger" data-modal="modal-3"><i class="icon-eye"></i></a>
                          </div>
                        </div>
                      </div>
                      <div class="product-info">
                        <h4 class="product-title"><a href="{{route('frontend.product.index',$product->slug)}}">{{$product->proname}}</a></h4>  
                        <div class="align-items">
                          <div class="pull-left">
                            <span class="price">LKR {{$product->salesprice}}</span>
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
        </div>
      </div>
    </div>
    <!-- Product Categories Section End -->  


@endsection