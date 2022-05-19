@extends('Backend.Layout.index')
@section('content')
<div class="col-md-12 col-sm-12">
    <div class="row">
        {{-- left colom --}}
        <div class="left-colom image colom col-md-6">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Order Summary</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                aria-expanded="false"><i class="fa fa-wrench"></i></a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#">Settings 1</a>
                                <a class="dropdown-item" href="#">Settings 2</a>
                            </div>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br>
                    <div class="item form-group">
                        <label class="col-md-4 col-sm-4" for="first-name">Order Status :</label>
                        <div class="col-md-8 col-sm-8">
                            {{$order->status}}
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-md-4 col-sm-4" for="first-name">Order Date :</label>
                        <div class="col-md-8 col-sm-8">
                            {{$order->created_at}}
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-md-4 col-sm-4" for="first-name">Order Type :</label>
                        <div class="col-md-8 col-sm-8">
                             @if ($order->type == 'standard')
                                <span class="badge badge-pill badge-standard px-3 py-1">{{$order->type}}</span>
                            @else
                                <span class="badge badge-pill badge-gift px-3 py-1">{{$order->type}}</span>
                            @endif
                        </div>
                    </div>
                     @if ($order->type == 'gift')
                        <div class="item form-group">
                        <label class="col-md-4 col-sm-4" for="first-name">Delivery Date :</label>
                        <div class="col-md-8 col-sm-8">
                            {{$order->delivery_date}}
                        </div>
                    </div>
                     @endif
                    <div class="item form-group">
                        <label class="col-md-4 col-sm-4" for="first-name">Customer Name :</label>
                        <div class="col-md-8 col-sm-8">
                            {{$order->user->fname}} {{$order->user->lname}}
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-md-4 col-sm-4" for="first-name">Customer Email :</label>
                        <div class="col-md-8 col-sm-8">
                            {{$order->user->email}}
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-md-4 col-sm-4" for="first-name">Customer Tel :</label>
                        <div class="col-md-8 col-sm-8">
                            {{$order->user->mobile}}
                        </div>
                    </div>
                    @if ($order->type == 'gift' &&  $order->sender_details == 'anonymous')
                        <div class="item form-group">
                        <label class="col-md-4 col-sm-4" for="first-name">Sender Details :</label>
                        <div class="col-md-8 col-sm-8">
                            {{$order->sender_details}}
                        </div>
                    </div>
                    @endif
                    <form action="{{route('dashboard.order.invoice',$order->id)}}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-primary" name="invoice" value="invoice">Invoice Download</button>
                    </form>
                </div>
            </div>
        </div>
        {{-- //left colom --}}

        {{-- right colom --}}
        <div class="right-colom image colom col-md-6">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Payment Information</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                aria-expanded="false"><i class="fa fa-wrench"></i></a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#">Settings 1</a>
                                <a class="dropdown-item" href="#">Settings 2</a>
                            </div>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br>
                    <div class="item form-group">
                        <label class="col-md-4 col-sm-4" for="first-name">Payment Method :</label>
                        <div class="col-md-8 col-sm-8">
                            {{$order->payment_method}}
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-md-4 col-sm-4" for="first-name">Shipping Cost :</label>
                        <div class="col-md-8 col-sm-8">
                            LKR {{$order->delivery_fee}}
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-md-4 col-sm-4" for="first-name">Total Amount :</label>
                        <div class="col-md-8 col-sm-8">
                            LKR {{$order->grand_total}}
                        </div>
                    </div>
                </div>
            </div>

            <div class="x_panel">
                <div class="x_title">
                    <h2>Delivery Person</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                aria-expanded="false"><i class="fa fa-wrench"></i></a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#">Settings 1</a>
                                <a class="dropdown-item" href="#">Settings 2</a>
                            </div>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br>
                    <form action="{{route('dashboard.order.delperson',$order->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="item form-group">
                            <label class="col-md-4 col-sm-4" for="first-name">Select Delivery Person :</label>
                            <div class="col-md-8 col-sm-8">
                                <div class="form-group">
                                    <select class="form-control" id="exampleFormControlSelect1" name="deliveryperson">
                                        @php
                                            $delivery_person = \App\Model\Delivery::where('id', $order->delivery_id)->with('user')->first();
                                                if ($order->delivery_id) {
                                                    $selecteddriver = $delivery_person->user->id;

                                                }
                                        @endphp     
                                        <option disabled selected>Select a driver </option>
                                        @foreach ($drivers as $driver)
                                        @foreach ($driver->users as $user)
                                        <option value="{{$user->id}}" @isset($order->delivery_id)
                                            {{ $user->id == $selecteddriver ? 'selected="selected"' : '' }}
                                        @endisset>{{$user->fname}}</option>
                                        @endforeach
                                        @endforeach
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary">Assign Driver</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        {{-- //right colom --}}
    </div>
</div>

{{-- order items --}}
<div class="col-md-12 col-sm-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>Ordered Items : {{$order->order_number}}</h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i
                            class="fa fa-wrench"></i></a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#">Settings 1</a>
                        <a class="dropdown-item" href="#">Settings 2</a>
                    </div>
                </li>
                <li><a class="close-link"><i class="fa fa-close"></i></a>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <div class="row">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Order Items</th>
                            <th>Quantity</th>
                            <th>Sale Price</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $total=0
                        @endphp
                        @foreach ($order->products as $item)
                        @php
                        $total= $item->pivot->price * $item->pivot->quantity
                        @endphp
                        <tr>
                            <td scope="row">{{$item->proname}}</td>
                            <td>{{$item->pivot->quantity}}</td>
                            <td>LKR {{$item->pivot->price}}</td>
                            <td>LKR {{$total}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
{{-- //order items --}}

{{-- shipping details --}}
<div class="col-md-12 col-sm-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>Shipments</small></h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i
                            class="fa fa-wrench"></i></a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#">Settings 1</a>
                        <a class="dropdown-item" href="#">Settings 2</a>
                    </div>
                </li>
                <li><a class="close-link"><i class="fa fa-close"></i></a>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <br>
            <div class="row">
                {{-- reciever details --}}
                <div class="left-colom col-md-6 col-sm-6">
                    <div class="item form-group">
                        <label class="col-md-4 col-sm-4" for="first-name">Receiver name :</label>
                        <div class="col-md-8 col-sm-8">
                            {{$shipping->shipping_fname}}
                            {{$shipping->shipping_lname}}
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-md-4 col-sm-4" for="first-name">Receiver Address :</label>
                        <div class="col-md-8 col-sm-8">
                            {{$shipping->shipping_address1}} ,
                            {{$shipping->shipping_address2}},{{$shipping->shipping_city}}
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-md-4 col-sm-4" for="first-name">Receiver Zipcode :</label>
                        <div class="col-md-8 col-sm-8">
                            {{$shipping->shipping_zipcode}}
                        </div>
                    </div>
                </div>
                {{-- //reciever details --}}
                <div class="right-colom col-md-6 col-sm-6">
                    <form action="{{route('dashboard.order.update',$order->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="item form-group">
                            <label class="col-md-4 col-sm-4" for="first-name">Order Status :</label>
                            <div class="col-md-8 col-sm-8">
                                <div class="form-group">
                                    <select class="form-control" id="exampleFormControlSelect1" name="status">
                                        @if ($order->status == 'pending')
                                            <option disabled value="pending" {{ $order->status == 'pending' ? 'selected="selected"' : '' }}>Pending</option>
                                            <option value="confirmed" {{ $order->status == 'confirmed' ? 'selected="selected"' : '' }}>Confirmed</option>
                                            <option value="ready_dispatch" {{ $order->status == 'ready_dispatch' ? 'selected="selected"' : '' }}>Ready for dispatch</option>
                                        
                                        @elseif ($order->status == 'confirmed')
                                            <option disabled value="pending" {{ $order->status == 'pending' ? 'selected="selected"' : '' }}>Pending</option>
                                            <option disabled value="confirmed" {{ $order->status == 'confirmed' ? 'selected="selected"' : '' }}>Confirmed</option>
                                            <option value="ready_dispatch" {{ $order->status == 'ready_dispatch' ? 'selected="selected"' : '' }}>Ready for dispatch</option>
                                        
                                        @else
                                            <option disabled value="pending" {{ $order->status == 'pending' ? 'selected="selected"' : '' }}>Pending</option>
                                            <option disabled value="confirmed" {{ $order->status == 'confirmed' ? 'selected="selected"' : '' }}>Confirmed</option>
                                            <option disabled selected value="ready_dispatch" {{ $order->status == 'ready_dispatch' ? 'selected="selected"' : '' }}>Ready for dispatch</option>
                                        @endif
                                        
                                    </select>
                                </div>
                                @if ($order->status == 'ready_dispatch' || $order->status == 'dispatched' || $order->status == 'delivered' || $order->status == 'received')
                                    <button disabled type="submit" class="btn btn-primary">Save Order Status</button>
                                @else
                                <button type="submit" class="btn btn-primary">Save Order Status</button>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- //shipping details --}}
@endsection