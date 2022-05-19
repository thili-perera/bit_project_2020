@extends('Frontend.Layout.index')
@section('content')
<!-- Start Content -->
<div id="content">
    <div class="container">
        <div class="row">
            <div class="header text-center">
                <h3 class="small-title">Shopping cart</h3>
                <p>Shopping cart-Checkout-Order complete</p>
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
                        <p>Quantity</p>
                    </div>
                    <div class="col-md-2 col-sm-2">
                        <p>Total</p>
                    </div>
                    <div class="col-md-2 col-sm-2">
                        <p>Close</p>
                    </div>
                </div>
            </div>
            @if (Session::has('cart'))
            @php
            $total = 0
            @endphp
            @foreach (session('cart') as $id=> $product)
            @php
            $total += $product['quantity']*$product['salesprice']
            @endphp
            <div class="wishlist-entry clearfix">
                <div class="col-md-4 col-sm-4">
                    <div class="cart-entry">
                        <a class="image" href="{{route('frontend.product.index',$product['slug'])}}"><img
                                src="{{url('upload/product',$product['image'])}}" class="img-thumbnail"
                                alt="{{$product['image']}}" width="400px"></a>
                        <div class="cart-content">
                            <a href="{{route('frontend.product.index',$product['slug'])}}">
                                <h4 class="title">{{$product['name']}}</h4>
                            </a>

                        </div>
                    </div>
                </div>
                <div class="col-md-2 col-sm-2 entry">
                    <div class="price">
                        Rs. {{$product['salesprice']}} <del>Rs. {{$product['regularprice']}}</del>
                    </div>
                </div>
                <div class="col-md-2 col-sm-2">
                    <ul class="quantity-selector">
                        {{-- <li class="entry number-minus">10</li> --}}
                        {{-- <li class="entry number">{{$product['quantity']}}</li> --}}
                        {{-- <li class="entry number-plus">10</li> --}}
                        <form action="{{route('frontend.cart.updatequantity',$product['id'] )}}" method="post">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="productid" value="{{$product['id']}}">
                            <input type="number" name="quantity" value="{{$product['quantity']}}" min="1" max="10">
                            <button type="submit">update</button>
                        </form>
                    </ul>
                </div>
                <div class="col-md-2 col-sm-2 entry">
                    <div class="price">
                        Rs. {{$product['salesprice'] *$product['quantity']}}
                    </div>
                </div>
                <div class="col-md-2 col-sm-2 entry">
                    <form action="{{route('frontend.cart.itemdelete',$product['id'])}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="productid" value="{{$product['id']}}">
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
            <div class=" cart-buttons text-right">
                <div class="summary">
                    <div class="subtotal">
                        <h3>Sub Total</h3>
                    </div>
                    <div class="price-s">
                        <h3>Rs. @if (!empty($total))
                            {{$total}}
                            @else
                            0
                            @endif
                        </h3>
                    </div>
                </div>
                {{-- <input type="hidden" name="grand_total" value="{{$total}}"> --}}
            </div>
            <div class="text-right">
                <a href="{{route('frontend.checkout.index')}}" class="btn btn-common" style="margin-top: 20px;">Go to
                    Checkout</a>
            </div>
            @else
            <div class="row clearfix ">
                <div class="text-center ">
                    <h2 class=" " style="margin-top: 15px;">Your Cart is empty..</h2>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
<!-- End Content -->
@endsection