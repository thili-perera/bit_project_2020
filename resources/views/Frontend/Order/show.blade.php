@extends('Frontend.Layout.index')
@section('content')
<div id="content">
    <div class="container">
        <div class="row mb-50">
            <div class="col-md-6 col-sm-6 col-xs-12"> 
                <!--Billing Name & Address -->
                <h2 class="title-checkout"><i class="icon-user"></i>From :</h2>
                <span>{{$billing_details->fname}} {{$billing_details->lname}}</span><br>
                <span>{{$billing_details->billing_address->address_line_1}},</span><br>
                <span>{{$billing_details->billing_address->address_line_2}}</span><br>
                <span>{{$billing_details->billing_address->zipCode}}</span><br>
                @if ($order->sender_details == 'anonymous')
                    <span>Sender Details : {{$order->sender_details}}</span>
                @endif

            </div>
            <div class="col-md-6 col-sm-6 col-xs-12" style="text-align: right;">
                <!-- Shipping & Address -->
                <h2 class="title-checkout"><i class="icon-home"></i>To :</h2>
                <span>{{$shipping_details->shipping_fname}} {{$shipping_details->shipping_lname}}</span><br>
                <span>{{$shipping_details->shipping_address1}},</span><br>
                <spanp>{{$shipping_details->shipping_address2}}</spanp><br>
                <span>{{$shipping_details->shipping_zipcode}}</span><br>
                @if ($order->type == 'gift')
                    <span>Deliver on : {{$order->delivery_date}}</span>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-sx-12">
                <div class="order-details">
                    <div style="display: flex; justify-content: space-between;">
                    <div><h2 class="title-checkout"><i class="icon-basket-loaded-loaded"></i>Your Order : {{$order->order_number}}</h2>
                    </div>
                    <div><h2 class="title-checkout">Ordered at : {{$order->created_at->format('Y-m-d')}}</h2>
                    </div>
                    </div>
                    <div class="order_review margin-bottom-35">
                        <table class="table table-responsive table-review-order">
                            <thead>
                                <tr>
                                    <th class="product-name">Product</th>
                                    <th class="product-total">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($order->products as $item)
                                <tr>
                                    <td>
                                    <p>{{ $item->proname }} ( x {{ $item->pivot->quantity }})</p>
                                    </td>
                                    <td>
                                        <p class="price">LKR {{ $item->pivot->price }}</p>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                @if (!empty($order->notes))
                                   <tr>
                                    <th>Special Notes</th>
                                    <td>
                                        <p>{{ $order->notes }}</p>
                                    </td>
                                </tr> 
                                @endif
                                <tr>
                                    <th>Items</th>
                                    <td>
                                        <p class="price"> {{ $order->item_count }}</p>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Shipping</th>
                                    <td>
                                        <p class="price">LKR {{$order->delivery_fee}}</p>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Grand total</th>
                                    <td>
                                        <p class="price">LKR {{ $order->grand_total }}</p>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection