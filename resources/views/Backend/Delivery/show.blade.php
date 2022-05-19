@extends('Backend.Layout.index')
@section('content')
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
                            {{$user->shipping_fname}} {{$user->shipping_lname}}
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-md-4 col-sm-4" for="first-name">Receiver Address :</label>
                        <div class="col-md-8 col-sm-8">
                            {{$user->shipping_address1}}, {{$user->shipping_address2}}
                        </div>
                    </div>
                </div>
                {{-- //reciever details --}}
                <div class="right-colom col-md-6 col-sm-6">
                    <div class="item form-group">
                        <label class="col-md-4 col-sm-4" for="first-name">Order Number :</label>
                        <div class="col-md-8 col-sm-8">
                            {{$order->order_number}}
                        </div>
                    </div>
                    <form action="{{route('dashboard.order.update',$order->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="item form-group">
                            <label class="col-md-4 col-sm-4" for="first-name">Order Status :</label>
                            <div class="col-md-8 col-sm-8">
                                <div class="form-group">
                                    <select class="form-control" id="exampleFormControlSelect1" name="status">
                                        <option value="ready_dispatch" disabled {{ $order->status == 'ready_dispatch' ? 'selected="selected"' : '' }}>Ready for dispatch</option>
                                        @if ($order->status == 'dispatched')
                                            <option disabled value="dispatched" {{ $order->status == 'dispatched' ? 'selected="selected"' : '' }}>Dispatched</option>
                                            <option value="delivered" {{ $order->status == 'delivered' ? 'selected="selected"' : '' }}>Delivered</option>

                                        @elseif ($order->status == 'delivered')
                                            <option disabled value="dispatched" {{ $order->status == 'dispatched' ? 'selected="selected"' : '' }}>Dispatched</option>
                                            <option disabled value="delivered" {{ $order->status == 'delivered' ? 'selected="selected"' : '' }}>Delivered</option>

                                         @elseif ($order->status == 'received')
                                            <option disabled value="dispatched" {{ $order->status == 'received' ? 'selected="selected"' : '' }}>Received</option>

                                        @else 
                                            <option value="dispatched" {{ $order->status == 'dispatched' ? 'selected="selected"' : '' }}>Dispatched</option>
                                            <option value="delivered" {{ $order->status == 'delivered' ? 'selected="selected"' : '' }}>Delivered</option>
                                        @endif
                                    </select>
                                </div>

                                 @if ($order->status == 'delivered' || $order->status == 'received')
                                    <button disabled type="submit" class="btn btn-primary">Save Delivery Status</button>
                                @else
                                <button type="submit" class="btn btn-primary">Save Delivery Status</button>
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