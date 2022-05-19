@extends('Frontend.Layout.index')
@section('content')

<!-- Start Content -->
    <div id="content">
      <div class="container">
        <div class="row">
          <div class="header text-center">
            <h3 class="small-title">Order Tracking</h3>
          </div>
          <div class="col-md-12">
            <div class="tracking m-bottom">
              <div>
                <p>Order ID : {{$order->order_number}}</p>
              </div>
            </div> 
            <div class="track-content m-bottom">
                <div class="col-md-4">
                    <p><b> Orderd Date: </b><span>{{$order->created_at->format('Y-m-d')}}</span></p>
                </div>
                <div class="col-md-4">
                    <p><b> Status: </b><span>{{$order->status}}</span></p>
                </div>
                @if ($order->status == 'dispatched' OR $order->status == 'delivered')
                @php
                    $delivery_person = \App\Model\Delivery::where('id',$order->delivery_id)->with('user')->first();
                @endphp
                    <div class="col-md-4">
                        <p><b> Shipping By: </b><span>{{$delivery_person->user->fname}}</span></p>
                    </div>
                @endif
                
            </div>
            
            <div class="track">
                @if ($order->status == 'pending')
                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Placed Order <p>{{$order->created_at->format('Y-m-d')}}</p></span></div>
                    <div class="step "> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order confirmed</span> </div>
                    <div class="step "> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text"> Order proccessing</span> </div>
                    <div class="step"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text"> Out for delivery </span> </div>
                    <div class="step"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">On the way</span> </div>
                    <div class="step"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Delivered</span> </div>
                @elseif($order->status == 'confirmed' OR $order->status == 'processing' OR $order->status == 'ready_dispatch')
                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Placed Order <p>{{$order->created_at->format('Y-m-d')}}</p></span> </div>
                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order confirmed</span> </div>
                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text"> Order proccessing</span> </div>
                    <div class="step"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text"> Out for delivery </span> </div>
                    <div class="step"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">On the way</span> </div>
                    <div class="step"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Delivered</span> </div>
                @elseif($order->status == 'dispatched' OR $order->status == 'on_the_way')
                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Placed Order <p>{{$order->created_at->format('Y-m-d')}}</p></span> </div>
                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order confirmed</span> </div>
                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text"> Order proccessing</span> </div>
                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text"> Out for delivery </span> </div>
                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">On the way</span> </div>
                    <div class="step"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Delivered</span> </div>
                @elseif($order->status == 'delivered' OR $order->status == 'received')
                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Placed Order <p>{{$order->created_at->format('Y-m-d')}}</p></span> </div>
                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order confirmed</span> </div>
                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text"> Order proccessing</span> </div>
                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text"> Out for delivery </span> </div>
                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">On the way</span> </div>
                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Delivered <p>{{$order->updated_at->format('Y-m-d')}}</p></span> </div>
                @endif
                
            </div>

            <div class="track-content" style="margin-top: 10rem; text-align: center; box-shadow: 2px 2px 9px 1px;">
                @if ($order->status == 'pending')
                    <h3>You have placed an order. Please wait for us to confirm your order.</h3>
                @elseif($order->status == 'confirmed' OR $order->status == 'processing' OR $order->status == 'ready_dispatch')
                    <h3>We have confirmed your order. It is being processed and will be dispatched as soon as it is finished.</h3>
                @elseif($order->status == 'dispatched' OR $order->status == 'on_the_way')
                    <h3>Your order has been dispatched. It will be delivered to you shortly by one of our staff.</h3>
                @elseif($order->status == 'delivered' OR $order->status == 'received')
                    <h3>Your order was successfully delivered.</h3>
                @endif
            </div>

          </div>           
        </div>
      </div>
    </div>
<!-- End Content -->

@endsection