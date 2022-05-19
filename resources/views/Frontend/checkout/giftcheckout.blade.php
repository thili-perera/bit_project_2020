@extends('Frontend.Layout.index')
@section('content')
    <!-- Content Section Start -->
    <div id="content">
        <form action="{{ route('frontend.checkout.store') }}" method="post">
            @csrf
            <input type="hidden" name="gift" value="gift">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <!--Billing Name & Address -->
                        <h2 class="title-checkout"><i class="icon-user"></i>Billing Address</h2>

                        <div class="form-group">
                            <label>First Name <sup>*</sup></label>
                            <input class="form-control" type="text" required name="fname" value="{{ Auth::user()->fname }}">
                        </div>
                        <div class="form-group">
                            <span class="note pull-right">* Required Fields</span>
                            <label>Last Name <sup>*</sup></label>
                            <input class="form-control" type="text" required name="lname" value="{{ Auth::user()->lname }}">
                        </div>
                        <div class="form-group">
                            <label>Address 1 <sup>*</sup></label>
                            <input class="form-control" type="text" required name="billing_address1"
                                value="{{ optional(Auth::user()->billing_address)->address_line_1 }}">
                        </div>
                        <div class="form-group">
                            <label>Address 2 <sup>*</sup></label>
                            <input class="form-control" type="text" required name="billing_address2"
                                value="{{ optional(Auth::user()->billing_address)->address_line_2 }}">
                        </div>

                        <!-- row-col-1 -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>City <sup>*</sup></label>
                                    <input class="form-control" required type="text" name="billing_city"
                                        value="{{ optional(Auth::user()->billing_address)->city }}">
                                </div>
                                <div class="form-group">
                                    <label>Zip/Postal Code <sup>*</sup></label>
                                    <input class="form-control" required type="text" name="billing_zipcode"
                                        value="{{ optional(Auth::user()->billing_address)->zipCode }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>State/District <sup>*</sup></label>
                                    <input class="form-control" required type="text" name="billing_district"
                                        value="{{ optional(Auth::user()->billing_address)->district }}">
                                </div>
                                <div class="form-group">
                                    <label>Telephone <sup>*</sup></label>
                                    <input class="form-control" required type="text" pattern="[0-9]{10}" name="mobile"
                                        value="{{ Auth::user()->mobile }}">
                                </div>
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
                                            <option value="{{ $district->id }}" @isset($shipping->shipping_district_id)
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
                                    <input class="form-control" type="text" required pattern="[0-9]{10}" @isset($shipping->shipping_phone)
                                        value="{{$shipping->shipping_phone}}"
                                    @endisset name="shipping_phone">
                                </div>
                                @error('shipping_phone')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <!-- /row-col-2 -->

                        {{-- sender anonymous --}}
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" name="sender" value="anonymous"
                                id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Sender Details Anonymous</label>
                            <p>Select this if you want to hide the sender information</p>
                        </div>
                        {{-- //sender anonymous --}}
                    </div>
                </div>

                <div class="item form-group">
                    <h2 class="title-checkout"><i class="icon-calendar"></i>Delivery Date *</h2>
                    @error('delivery_date')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                    <div class="col-md-6 col-sm-6 ">
                        <input id="birthday" name="delivery_date" required class="date-picker form-control" placeholder="dd-mm-yyyy" @isset($delivery_date)
                            value="{{$delivery_date}}"
                        @endisset
                            type="date" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'"
                            onblur="this.type='text'" onmouseout="timeFunctionLong(this)">
                        <script>
                            function timeFunctionLong(input) {
                                setTimeout(function() {
                                    input.type = 'text';
                                }, 60000);
                            }

                        </script>
                    </div>
                </div>

                <div class="mb-50 row">
                    <div class="col-md-6 col-sm-6 col-sx-12">
                        <div class="order-details">
                            <h2 class="title-checkout"><i class="icon-notebook"></i>Special Notes *</h2>
                            <div class="form-group">
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                                    name="notes"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
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

                                        @if (Session::has('gift'))
                                            @php
                                                // $total = 0
                                                $itemtotal = 0;
                                            @endphp
                                            @php
                                                $item_count = 0;
                                            @endphp
                                            @foreach (session('gift') as $id => $product)
                                                @php
                                                    $itemtotal += $product['salesprice'];
                                                @endphp
                                                @php
                                                    $item_count = $product['quantity'] + $item_count;
                                                @endphp
                                                <tr>
                                                    <td>
                                                        <p>{{ $product['name'] }} ( x {{ $product['quantity'] }})</p>
                                                    </td>
                                                    <td>
                                                        <p class="price">LKR {{ $product['salesprice'] }}</p>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
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
                                                <p class="price">LKR {{ $itemtotal }}</p>
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
                                                <form action="{{route('frontend.checkout.store')}}" method="post">
                                                    @csrf
                                                <div>
                                                    <button type="submit" class="btn btn-primary">Calculate Shipping</button>
                                                    <input type="hidden" name="calship" value="calship">
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

                    <div class="col-md-6 col-sm-6 col-sx-12 mb-50">
                        <!-- Payment Method -->
                        <h2 class="title-checkout">
                            <i class="icon-credit-card"></i>
                            Payment Method
                        </h2>
                        <select class="selectpicker mb-50" name="payment_method">
                            <option selected="selected" value="2">Card</option>
                        </select>
                        <!-- /Payment Method -->
                        
                        <!-- GRAND TOTAL -->
                        <div class="card card--padding fill-bg">
                            <table class="table-total-checkout">
                                <tbody>
                                    <tr>
                                        <th>GRAND TOTAL:</th>
                                        @if (isset($shipping->shipping_fname))
                                            @php
                                                $shipping_cost = \App\Model\District::where('id',$shipping->shipping_district_id)->select('delivery_fee')->first();
                                                $grand_total = $itemtotal + $shipping_cost->delivery_fee;
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
