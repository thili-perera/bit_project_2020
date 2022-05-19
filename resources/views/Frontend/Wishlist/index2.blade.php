@extends('Frontend.Layout.index')
@section('content')
<!-- Start Content -->
    <div id="content">
      <div class="container">
        <div class="row">
          <div class="header text-center">
            <h3 class="small-title">Wishlist</h3>
          </div>
          <div class="col-md-12">
            <div class="wishlist">
              <div class="col-md-4 col-sm-4 text-center">
                <p>Product</p>
              </div>
              <div class="col-md-2 col-sm-2">
                <p>Price</p>
              </div>
              <div class="col-md-2 col-sm-2">
                <p>Stock status</p>
              </div>
              <div class="col-md-2 col-sm-2">
                <p>Add to cart</p>
              </div>
              <div class="col-md-2 col-sm-2">
                <p>Close</p>
              </div>
            </div> 
            @foreach ($products as $item)
            <div class="wishlist-entry clearfix">
              <div class="col-md-4 col-sm-4">
                <div class="cart-entry">
                  <a class="image" href="#"><img src="{{url('upload/product',$item->image)}}"
                                class="img-thumbnail" alt="{{$item->image}}" width="400px"></a>
                  <div class="cart-content">
                    <a href="{{route('frontend.product.index',$item->slug)}}">
                                <h3 class="title">{{$item->proname}}</h3>
                            </a>
                    <p>{{$item->description}}</p>
                  </div>
                </div>
              </div>
              <div class="col-md-2 col-sm-2 entry">
                <div class="price">
                  Rs. {{$item->salesprice}}
                </div>
              </div>
              <div class="col-md-2 col-sm-2 entry">
                @if ($item->quantity-2 <=0)
                    <a class="instock" href="#">Out Of Stock</a>
                @else
                    <a class="instock" href="#">{{$item->status}}</a>
                @endif
                
              </div>
              <div class="col-md-2 col-sm-2 entry">
                @if ($item->quantity-2 <=0)
                    <button disabled class="btn btn-common">
                   <i class="icon-basket-loaded"></i> add to Cart
                </button>
                @else
                    <a class="btn btn-common " href="{{route('frontend.cart.addTocart',$item->slug)}}">
                   <i class="icon-basket-loaded"></i> add to Cart
                </a>
                @endif
                
              </div>
              <div class="col-md-2 col-sm-2 entry">
                <form action="{{route('frontend.wishlist.wishdelete',$item->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-close">
                            <a name="" id="" class="" href=" #" role="button">
                                <div>
                                    <i class="icon-close"></i>
                                </div>
                            </a>
                        </button>
                    </form>  
              </div>
            </div>
            @endforeach
            <br>
          </div>           
        </div>
      </div>
    </div>
    <!-- End Content -->
@endsection