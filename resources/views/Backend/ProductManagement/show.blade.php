@extends('Backend.Layout.index')
@section('content')

<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Product Details</h2>
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
                <div class="col-md-7 col-sm-7 ">
                    <div class="product-image">
                        <img src="{{url('upload/product',$product->image)}}" class="img-thumbnail" alt="" width="300px">
                    </div>
                    <div class="product_gallery">
                        <a>
                            <img src="images/prod-2.jpg" alt="...">
                        </a>
                        <a>
                            <img src="images/prod-3.jpg" alt="...">
                        </a>
                        <a>
                            <img src="images/prod-4.jpg" alt="...">
                        </a>
                        <a>
                            <img src="images/prod-5.jpg" alt="...">
                        </a>
                    </div>
                </div>
                <div class="col-md-5 col-sm-5 " style="border:0px solid #e5e5e5;">
                    <h3 class="prod_title">{{$product->proname}} - {{$product->brand}}</h3>
                    <p>{!! $product->content !!}</p>
                    <p>{{ $product->weight}}</p>
                    <br>
                    <div class="">
                        <h2>Available Colors</h2>
                        <ul class="list-inline prod_color display-layout">
                            <li>
                                <p>Green</p>
                                <div class="color bg-green"></div>
                            </li>
                            <li>
                                <p>Blue</p>
                                <div class="color bg-blue"></div>
                            </li>
                            <li>
                                <p>Red</p>
                                <div class="color bg-red"></div>
                            </li>
                            <li>
                                <p>Orange</p>
                                <div class="color bg-orange"></div>
                            </li>
                        </ul>
                    </div>
                    <br>
                    <div class="">
                        <h2>Size <small>Please select one</small></h2>
                        <ul class="list-inline prod_size display-layout">
                            <li>
                                <button type="button" class="btn btn-default btn-xs">Small</button>
                            </li>
                            <li>
                                <button type="button" class="btn btn-default btn-xs">Medium</button>
                            </li>
                            <li>
                                <button type="button" class="btn btn-default btn-xs">Large</button>
                            </li>
                            <li>
                                <button type="button" class="btn btn-default btn-xs">Xtra-Large</button>
                            </li>
                        </ul>
                    </div>
                    <br>
                    <div class="">
                        <div class="product_price">
                            <h1 class="price">Rs.{{ $product->salesprice}}</h1>
                            <span class="price-tax">Reg.Price: Rs.{{ $product->regularprice}}</span>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection