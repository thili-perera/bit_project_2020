{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="row">
        <div class="col-md-12">
            
            <div class="x_content" style="">
                <section class="content invoice">

                    <div class="row">
                        <div class="invoice-header">
                            <h1>
                            <i class="fa fa-globe"></i> Invoice. {{$order->order_number}}
                            <small class="pull-right">Date: {{$today}}</small>
                            </h1>
                        </div>
                    </div>

                    <div class="row invoice-info">
                        <div class="col-sm-4 invoice-col">
                            From
                            <address>
                            <strong>{{$order->user->fname}} {{$order->user->lname}}</strong>
                            <br>{{$order->user->billing_address->address_line_1}}
                            <br>{{$order->user->billing_address->address_line_2}}
                            <br>{{$order->user->billing_address->zipCode}}
                            <br>{{$order->user->mobile}}
                            </address>
                        </div>

                        <div class="col-sm-4 invoice-col">
                            To
                            <address>
                            <strong>{{$shipping_details->fname}}</strong>
                            <br>{{$shipping_details->shipping_address1}}
                            <br>{{$shipping_details->shipping_address2}}
                            <br>{{$shipping_details->shipping_zipcode}}
                            <br>{{$shipping_details->shipping_phone}}
                            </address>
                        </div>

                        <div class="col-sm-4 invoice-col">
                            <b>Order ID:</b> {{$order->order_number}}
                            <br>
                            <b>Payment Due:</b> {{$order->payment_method}}
                            <br>
                        </div>

                    </div>


                    <div class="row">
                        <div class="  table">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                <th>Product</th>
                                <th style="width: 59%">Description</th>
                                <th>Qty</th>
                                <th>Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($order->products as $item)
                                <tr>
                                    <td>{{$item->proname}}</td>
                                    <td>{{$item->description}}</td>
                                    <td>{{$item->pivot->quantity}}</td>
                                    <td>Rs. {{$item->pivot->price}}</td>
                                </tr>
                                 @endforeach
                            </tbody>
                        </table>
                        </div>

                    </div>

                    <div class="row">

                        <div class="col-md-6">
                            <p class="lead">Payment Methods:</p>
                            <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                            {{$order->payment_method}}
                            </p>
                        </div>

                        <div class="col-md-6">
                            <p class="lead">Amount</p>
                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <th style="width:50%">Subtotal:</th>
                                            <td>Rs. {{$order->grand_total}}</td>
                                        </tr>
                                        <tr>
                                            <th>Shipping:</th>
                                            <td>Free</td>
                                        </tr>
                                        <tr>
                                            <th>Total:</th>
                                            <td>Rs. {{$order->grand_total}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </section>
            </div>
        </div>
    </div>
</div>
</body>
</html> --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>
			.invoice-box {
				max-width: 800px;
				margin: auto;
				padding: 30px;
				border: 1px solid #eee;
				box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
				font-size: 16px;
				line-height: 24px;
				font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
				color: #555;
			}

			.invoice-box table {
				width: 100%;
				line-height: inherit;
				text-align: left;
			}

			.invoice-box table td {
				padding: 5px;
				vertical-align: top;
			}

			.invoice-box table tr td:nth-child(2) {
				text-align: right;
			}

			.invoice-box table tr.top table td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.top table td.title {
				font-size: 45px;
				line-height: 45px;
				color: #333;
			}

			.invoice-box table tr.information table td {
				padding-bottom: 40px;
			}

			.invoice-box table tr.heading td {
				background: #eee;
				border-bottom: 1px solid #ddd;
				font-weight: bold;
			}

			.invoice-box table tr.details td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.item td {
				border-bottom: 1px solid #eee;
			}

			.invoice-box table tr.item.last td {
				border-bottom: none;
			}

			.invoice-box table tr.total td:nth-child(2) {
				border-top: 2px solid #eee;
				font-weight: bold;
			}

			@media only screen and (max-width: 600px) {
				.invoice-box table tr.top table td {
					width: 100%;
					display: block;
					text-align: center;
				}

				.invoice-box table tr.information table td {
					width: 100%;
					display: block;
					text-align: center;
				}
			}

			/** RTL **/
			.invoice-box.rtl {
				direction: rtl;
				font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
			}

			.invoice-box.rtl table {
				text-align: right;
			}

			.invoice-box.rtl table tr td:nth-child(2) {
				text-align: left;
			}
		</style>
</head>
<body>
		<div class="invoice-box">
			<table cellpadding="0" cellspacing="0"> 
				<tr class="top">
					<td colspan="2">
						<table>
							<tr>
								<td class="title">
									{{-- <img src="https://www.sparksuite.com/images/logo.png" style="width: 100%; max-width: 300px" /> --}}
								<h3 style="color: #f50057; font-family: 'Josefin Sans';">WGC</h3>
                                </td>

								<td>
									Invoice #: {{$order->order_number}}<br />
									Created: {{$today}}<br />
								</td>
							</tr>
						</table>
					</td>
				</tr>

				<tr class="information">
					<td colspan="2">
						<table>
                            <thead>
                                <tr>
                                     <td>
                                    @if (!$order->sender_details == 'anonymous')
                                       <strong> From:</strong>
                                    @endif
                                    </td>
                                    <td><strong> To:</strong></td>
                                    
                                </tr>
                            </thead>
                            <tbody>
							<tr>
								<td>
                                    @if (!$order->sender_details == 'anonymous')
                                        <address>
                                        <strong>{{$order->user->fname}} {{$order->user->lname}}</strong>
                                        <br>{{$order->user->billing_address->address_line_1}}
                                        <br>{{$order->user->billing_address->address_line_2}}
                                        <br>{{$order->user->billing_address->zipCode}}
                                        <br>{{$order->user->mobile}}
                                    </address>
                                    @endif
								</td>

								<td>
									<address>
                                        <strong>{{$shipping_details->shipping_fname}} {{$shipping_details->shipping_lname}}</strong>
                                        <br>{{$shipping_details->shipping_address1}}
                                        <br>{{$shipping_details->shipping_address2}}
                                        <br>{{$shipping_details->shipping_zipcode}}
                                        <br>{{$shipping_details->shipping_phone}}
                                    </address>
								</td>
							</tr>
                            </tbody>
						</table>
					</td>
				</tr>

				<tr class="heading">
					<td>Payment Method</td>

					<td>{{$order->payment_method}}</td>
				</tr>

				<tr class="details">
					<td>{{$order->payment_method}}</td>

				</tr>
                
				<tr class="heading">
					<td>Item</td>

					<td>Price</td>
				</tr>

				@foreach ($order->products as $item)
                    <tr class="item">
                        <td>{{$item->proname}} (X {{$item->pivot->quantity}})</td>
                        <td>LKR {{$item->pivot->price}}</td>
                    </tr>
                @endforeach

				<tr class="item last">
					<td>Shipping</td>

					<td>LKR {{{$order->delivery_fee}}}</td>
				</tr>

				<tr class="total">
					<td></td>

					<td>Total: LKR {{$order->grand_total}}</td>
				</tr>
			</table>
		</div>
	</body>
</html>