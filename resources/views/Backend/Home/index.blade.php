@extends('Backend.Layout.index')
@section('content')
{{-- <h1>Hi {{Auth::user()->username}}!!</h1> --}}
<div class="col-md-3 widget widget_tally_box">
    <div class="x_panel fixed_height_390">
        <div class="x_content">
            <div class="flex">
                <div class="list-inline widget_profile_box ">
                    <li>
                        @if (Auth::user()->image)
                            <img src="{{url('upload/user',Auth::user()->image)}}" alt="..." class="img-circle profile_img" >
                        @else
                            <img src="https://upload.wikimedia.org/wikipedia/commons/7/7c/Profile_avatar_placeholder_large.png" alt="..." class="img-circle profile_img" >
                        @endif
                    </li>
                </div>
            </div>
            <h3 class="name">Hi {{Auth::user()->username}}!!</h3>
        </div>
    </div>
</div>
@cannot('delivery')
<div class="animated flipInY col-lg-3 col-md-3 col-sm-6  ">
    <div class="tile-stats">
        <div class="icon"><i class="fas fa-bags-shopping"></i>
        </div>
        <div class="count">{{ count($standardOrders) }}</div>
        <a href="{{route('dashboard.order.standard')}}"><h3 class="m-3">Standard Orders</h3></a>
        <p>Pending new standard orders</p>
    </div>

    <div class="tile-stats">
        <div class="icon mr-05"><i class="far fa-gifts"></i></div>
        <div class="count">{{ count($giftOrders) }}</div>
        <a href="{{route('dashboard.order.gift')}}"><h3 class="m-3"> Gift Orders</h3></a>
        <p>Pending new gift orders</p>
    </div>
</div>
@endcannot
<div class="animated flipInY col-lg-3 col-md-3 col-sm-6  ">
    <div class="tile-stats">
        <div class="icon"><i class="fad fa-truck-loading"></i>
        </div>
        @if (Auth::user()->hasRole('Delivery Officer'))
            <div class="count">{{count($driver_orders)}}</div>
        @else
            <div class="count">{{count($deliveries)}}</div>
        @endif
        
        <a href="{{route('dashboard.delivery.index')}}"><h3 class="m-3">New Deliveries</h3></a>
        <p>New deliveries for dispatch</p>
    </div>
</div>
@cannot('delivery')

<div class="animated flipInY col-lg-3 col-md-3 col-sm-6  ">
    <div class="tile-stats">
        <div class="icon"><i class="fad fa-comments"></i>
        </div>
        <div class="count">{{ count($messages) }}</div>
        <a href="{{route('dashboard.complaint.pending')}}"><h3 class="m-3">New Messages</h3></a> 
        <p>New messages from user orders</p>
    </div>
</div>
    
@endcannot

@endsection