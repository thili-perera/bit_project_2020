@extends('Frontend.Layout.index')
@section('content')
    <!-- Start Content -->
    <div id="content">
      <div class="container">
        <div class="row">
          <div class="header text-center">
            <h3 class="small-title">My Orders</h3>
          </div>
          <div class="col-md-12 mb-20">
            <div class="wishlist">
              <div class="col-md-4 col-sm-4 text-center">
                <p>Product</p>
              </div>
              <div class="col-md-2 col-sm-2">
                <p>Order amount</p>
              </div>
              <div class="col-md-2 col-sm-2">
                <p>Order Status</p>
              </div>
              <div class="col-md-4 col-sm-4">
                <p>Order Action</p>
              </div>
            </div>
          </div> 

            @if ($orders->isEmpty())
            <div>
              <h4 class="text-center"><b> No orders yet...</b></h4>
            </div>
            @else
               @foreach ($orders as $order)
            <div class="wishlist-entry clearfix">
                <div class="order-content col-md-12 col-sm-12 m-bottom">
                    <p><b>Order Id : </b>{{$order->order_number}}</p>
                    <p><b>Order Date : </b>{{$order->created_at->format('Y-m-d')}}</p>
                </div>
                <div class="col-md-4 col-sm-4">
                    <div class="cart-entry">
                    {{-- <a class="image" href="#"><img src="{{url('upload/product',$order->image)}}"  alt=""></a> --}}
                    <div class="cart-content">
                      @foreach ($order->products as $product)
                          <p class=""><b>{{$product->proname}}</b></p>
                          <span>(LKR {{$product->pivot->price}} x {{$product->pivot->quantity}})</span>
                      @endforeach
                    </div>
                    </div>
                </div>
                <div class="col-md-2 col-sm-2 entry">
                    <p>LKR {{$order->grand_total}}</p>
                </div>
                <div class="col-md-2 col-sm-2 entry">
                    <p class="instock">{{$order->status}}</p>
                </div>
                @if ($order->status != 'cancelled')
                <div class="col-md-4 col-sm-4" style="text-align: center;">
                    <a href="{{route('frontend.order.show',$order->order_number)}}" class="btn btn-common m-bottom">View Order</a>
                    <a href="{{route('frontend.tracking.index',$order->order_number)}}" class="btn btn-common m-bottom">Track Order</a>
                    <br> 
                    @if ($order->status == 'pending')
                    <form action="{{route('dashboard.order.update',$order->id)}}" method="post">
                      @csrf
                      @method('PUT')
                      @if ($order->payment_method != 'card')
                        <button type="submit" name="status" value="cancelled" class="btn btn-common">Cancel Order</button>
                      @endif
                    </form>
                  @endif
                    @if ($order->status == 'dispatched' OR $order->status == 'on_the_way' OR $order->status == 'delivered')
                    <form action="{{route('dashboard.order.update',$order->id)}}" method="post">
                      @csrf
                      @method('PUT')
                      <button type="submit" name="status" value="received" class="btn btn-common">Confirm Order Recieved</button><br><br>
                    </form>
                  @endif
                  @if ($order->status == 'delivered' OR $order->status == 'received' )
                      <a href="{{route('frontend.complaint.index',$order->order_number)}}" class="btn btn-common">Leave a message</a>
                  @endif
                </div> 
                 @endif
            </div>
            @endforeach 
            @endif
          </div>           
        </div>
      </div>
    <!-- End Content -->
@endsection