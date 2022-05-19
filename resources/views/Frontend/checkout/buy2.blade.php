@extends('Frontend.Layout.index')
@section('content')
    <!-- Content Section Start -->
    <div id="content">
        <form action="{{ route('frontend.checkout.store') }}" method="post"> 
            @csrf
            <input type="hidden" name="buy" value="buy">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <!--Billing Name & Address -->
                        <h2 class="title-checkout"><i class="icon-user"></i>Billing Address</h2>

                        <div class="form-group">
                            <label>First Name <sup>*</sup></label>
                            <input class="form-control" type="text" required name="fname" value="{{ Auth::user()->fname }}">
                        </div>
                        @error('fname')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                        <div class="form-group">
                            <span class="note pull-right">* Required Fields</span>
                            <label>Last Name <sup>*</sup></label>
                            <input class="form-control" type="text" name="lname" required value="{{ Auth::user()->lname }}">
                        </div>
                        @error('lname')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                        <div class="form-group">
                            <label>Address 1 <sup>*</sup></label>
                            <input class="form-control" type="text" required name="billing_address1"
                                value="{{ optional(Auth::user()->billing_address)->address_line_1 }}">
                        </div>
                        @error('billing_address1')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                        <div class="form-group">
                            <label>Address 2 <sup>*</sup></label>
                            <input class="form-control" type="text" required name="billing_address2"
                                value="{{ optional(Auth::user()->billing_address)->address_line_2 }}">
                        </div>
                        @error('billing_address2')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror

                        <!-- row-col-1 -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>City <sup>*</sup></label>
                                    <input class="form-control" type="text" required name="billing_city"
                                        value="{{ optional(Auth::user()->billing_address)->city }}">
                                </div>
                                @error('billing_city')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                                <div class="form-group">
                                    <label>Zip/Postal Code <sup>*</sup></label>
                                    <input class="form-control" type="text" required name="billing_zipcode"
                                        value="{{ optional(Auth::user()->billing_address)->zipCode }}">
                                </div>
                                @error('billing_zipcode')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>State/District <sup>*</sup></label>
                                    <input class="form-control" type="text" required name="billing_district"
                                        value="{{ optional(Auth::user()->billing_address)->district }}">
                                </div>
                                @error('billing_district')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                                <div class="form-group">
                                    <label>Telephone <sup>*</sup></label>
                                    <input class="form-control" type="text" pattern="[0-9]{10}" required name="mobile"
                                        value="{{ Auth::user()->mobile }}">
                                </div>
                                @error('mobile')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <!-- /row-col-2 -->
                        <br>
                    </div>

                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <!-- Shipping & Address -->
                        <h2 class="title-checkout"><i class="icon-home"></i>Shipping Address</h2>

                        <div class="form-group">
                            <label>First Name <sup>*</sup></label>
                            <input class="form-control" type="text" required @isset($shipping->shipping_fname)
                                value="{{$shipping->shipping_fname}}"
                            @endisset name="shipping_fname">
                        </div>
                        @error('shipping_fname')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                        <div class="form-group">
                            <span class="note pull-right">* Required Fields</span>
                            <label>Last Name <sup>*</sup></label>
                            <input class="form-control" type="text" required @isset($shipping->shipping_lname)
                                value="{{$shipping->shipping_lname}}"
                            @endisset name="shipping_lname">
                        </div>
                        @error('shipping_lname')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                        <div class="form-group">
                            <label>Address 1 <sup>*</sup></label>
                            <input class="form-control" type="text" required @isset($shipping->shipping_address1)
                                value="{{$shipping->shipping_address1}}"
                            @endisset name="shipping_address1">
                        </div>
                        @error('shipping_address1')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                        <div class="form-group">
                            <label>Address 2 <sup>*</sup></label>
                            <input class="form-control" type="text" required @isset($shipping->shipping_address2)
                                value="{{$shipping->shipping_address2}}"
                            @endisset name="shipping_address2">
                        </div>
                        @error('shipping_address2')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror

                        <!-- row-col-1 -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>City <sup>*</sup></label>
                                    <input class="form-control" type="text" required @isset($shipping->shipping_city)
                                        value="{{$shipping->shipping_city}}"
                                    @endisset name="shipping_city">
                                </div>
                                @error('shipping_city')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                                <div class="form-group">
                                    <label>Zip/Postal Code <sup>*</sup></label>
                                    <input class="form-control" type="text" required @isset($shipping->shipping_zipcode)
                                        value="{{$shipping->shipping_zipcode}}"
                                    @endisset name="shipping_zipcode">
                                </div>
                                @error('shipping_zipcode')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="validationCustom04" class="form-label">State/District <sup>*</sup></label>
                                    <select class="form-select selectpicker custom-select" name="shipping_district" id="validationCustom04" required>
                                    <option selected disabled value="">Choose...</option>
                                        @foreach ($districts as $district)
                                            <option required value="{{ $district->id }}" @isset($shipping->shipping_district_id)
                                        {{ $district->id == $shipping->shipping_district_id ? 'selected' : '' }}
                                    @endisset>{{ $district->district }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('shipping_district')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                                <div class="form-group">
                                    <label>Telephone <sup>*</sup></label>
                                    <input class="form-control" type="text" required pattern="[0-9]{10}"  @isset($shipping->shipping_phone)
                                        value="{{$shipping->shipping_phone}}"
                                    @endisset name="shipping_phone">
                                </div>
                                @error('shipping_phone')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <!-- /row-col-2 -->
                    </div>
                </div>

                <div class="mb-50"></div>


                <div class="row">
                    <div class="col-md-6 col-sm-6 col-sx-12">
                        <div class="order-details">
                            <h2 class="title-checkout"><i class="icon-basket-loaded-loaded"></i>Your Order</h2>
                            <div class="order_review margin-bottom-35">
                                <table class="table table-responsive table-review-order">
                                    <thead>
                                        <tr>
                                            <th class="product-name">Product</th>
                                            <th class="product-total">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                            @php
                                                $total = 0;
                                            @endphp
                                            @php
                                                $item_count = 0;
                                            @endphp
                                            @php
                                                $itemtotal = 0;
                                            @endphp
                                                @php
                                                    $total = $quantity * $product->salesprice;
                                                @endphp
                                                @php
                                                    $item_count = $quantity;
                                                @endphp
                                                <tr>
                                                    <td>
                                                        <p>{{ $product->proname }} x ({{ $quantity }})</p>
                                                    </td>
                                                    <td>
                                                        <p class="price">LKR {{ $total }}</p>
                                                    </td>
                                                </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Items</th>
                                            <td>
                                                <p class="price"> {{ $item_count }}</p>
                                            </td>
                                            <input type="hidden" name="item_count" value="{{ $item_count }}">
                                        </tr>
                                        <tr>
                                            <th>Subtotal</th>
                                            <td>
                                                <p class="price">LKR {{ $total }}</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Shipping</th>
                                            <td>
                                                @if (isset($shipping->shipping_fname))
                                                    @php
                                                        $shipping_cost = \App\Model\District::where('id',$shipping->shipping_district_id)->select('delivery_fee')->first();
                                                    // dd($shipping_cost);
                                                    @endphp
                                                    <div>
                                                        <p class="price">LKR {{$shipping_cost->delivery_fee}}</p>
                                                    </div>
                                                @else
                                                <form action="{{route('frontend.checkout.store')}}" method="post"></form>
                                                    @csrf
                                                <div>
                                                    <button type="submit" class="btn btn-primary">Calculate Shipping</button>
                                                    <input type="hidden" name="calship" value="calship">
                                                    <input type="hidden" name="buy_product" value="{{$product->id}}">
                                                </div>
                                                </form>
                                                @endif
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-6 col-sx-12">
                        <!-- Payment Method -->
                        <h2 class="title-checkout">
                            <i class="icon-credit-card"></i>
                            Payment Method
                        </h2>
                        <select class="selectpicker mb-50" name="payment_method">
                            <option selected="selected" value="1">Cash on Delivery</option>
                            <option selected="selected" value="2">Card</option>
                        </select>
                        <!-- /Payment Method -->
                        <br>
                        <!-- GRAND TOTAL -->
                        <div class="card card--padding fill-bg">
                            <table class="table-total-checkout">
                                <tbody>
                                    <tr>
                                        <th>GRAND TOTAL:</th>
                                        @if (isset($shipping->shipping_fname))
                                            @php
                                                $shipping_cost = \App\Model\District::where('id',$shipping->shipping_district_id)->select('delivery_fee')->first();
                                                $grand_total = $total + $shipping_cost->delivery_fee;
                                            @endphp
                                            <td class="price">LKR {{ $grand_total }}</td>
                                            <input type="hidden" name="grand_total" value="{{ $grand_total }}">
                                            <input type="hidden" name="shipping_cost" value="{{ $shipping_cost->delivery_fee }}">
                                        @endif
                                    </tr>
                                </tbody>
                            </table>
                            @if (isset($shipping->shipping_fname))
                                <button type="submit" class="btn btn-common btn-full">Place Order
                                <span class="icon-action-redo"></span></button>
                                <input type="hidden" name="placeorder" value="placeorder">
                                <input type="hidden" name="shipid" value="{{$shipping->id}}">
                                <input type="hidden" name="buy_product" value="{{$product->id}}">
                            @endif
                        </div>
                        <!-- /GRAND TOTAL -->
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!-- Content Section End -->
@endsection
