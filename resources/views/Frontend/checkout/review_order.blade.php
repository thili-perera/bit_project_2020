@extends('Frontend.Layout.index')
@section('content')
    <!-- Content Section Start -->
    <div class="checkout">
        <div class="step active"> <span class="icon"> 1 </span> <span class="text">Billing &
                Shipping</p></span></div>
        <div class="step active"> <span class="icon"> 2 </span> <span class="text">Review Order</span>
        </div>
        <div class="step "> <span class="icon"> 3 </span> <span class="text"> Complete</span>
        </div>
    </div>
    <div id="content">
        <form action="{{ route('frontend.checkout.store') }}" method="post">
            @csrf
            <div class="container">

                <div class="row">
                    <div class="col-md-8 col-sm-8 col-sx-12">
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
                                        @if (Session::has('cart'))
                                            @php
                                                $total = 0;
                                            @endphp
                                            @php
                                                $item_count = 0;
                                            @endphp
                                            @php
                                                $itemtotal = 0;
                                            @endphp
                                            @foreach (session('cart') as $id => $product)
                                                @php
                                                    $itemtotal = $product['quantity'] * $product['salesprice'];
                                                @endphp
                                                @php
                                                    $item_count = $product['quantity'] + $item_count;
                                                @endphp
                                                @php
                                                    $total += $product['quantity'] * $product['salesprice'];
                                                @endphp
                                                <tr>
                                                    <td>
                                                        <p>{{ $product['name'] }} x ({{ $product['quantity'] }})</p>
                                                    </td>
                                                    <td>
                                                        <p class="price">Rs. {{ $itemtotal }}</p>
                                                    </td>
                                                </tr>
                                            @endforeach

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
                                                <p class="price">Rs. {{ $total }}</p>
                                            </td>
                                            <input type="hidden" name="grand_total" value="{{ $total }}">
                                        </tr>
                                        <tr>
                                            <th>Shipping</th>
                                            <td>
                                                <div>
                                                    <p class="price">advsdv</p>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Total</th>
                                            <td>
                                                <p class="price">Rs. {{ $total }}</p>
                                            </td>
                                        </tr>
                                    </tfoot>
                                    @endif
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-4 col-sx-12">
                        <!-- Payment Method -->
                        <h2 class="title-checkout">
                            <i class="icon-credit-card"></i>
                            Payment Method
                        </h2>
                        <select class="selectpicker" name="payment_method">
                            <option selected="selected" value="1">Cash on Delivery</option>
                            <option selected="selected" value="2">Card</option>
                        </select>
                        <!-- /Payment Method -->
                        <div class="mb-50"></div>
                        <!-- GRAND TOTAL -->
                        <div class="card card--padding fill-bg">
                            <table class="table-total-checkout">
                                <tbody>
                                    <tr>
                                        <th>GRAND TOTAL:</th>
                                        <td>Rs. {{ $total }}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <button type="submit" class="btn btn-common btn-full">Place Order Now
                                <span class="icon-action-redo"></span></button>
                            <input type="hidden" name="placeorder" value="placeorder">
                        </div>
                        <!-- /GRAND TOTAL -->
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!-- Content Section End -->
@endsection
