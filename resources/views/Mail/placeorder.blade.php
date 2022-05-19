<body style="background-color: #f4f4f4; margin: 0 !important; padding: 0 !important;">
    <!-- HIDDEN PREHEADER TEXT -->

    <table border="0" cellpadding="0" cellspacing="0" width="100%">
        <!-- LOGO -->
        <tr>
            <td bgcolor="#f50057" align="center">
                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                    <tr>
                        <td align="center" valign="top" style="padding: 40px 10px 40px 10px;"> </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td bgcolor="#f50057" align="center" style="padding: 0px 10px 0px 10px;">
                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                    <tr>
                        <td bgcolor="#ffffff" align="center" valign="top"
                            style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 36px; font-weight: 800; line-height: 48px;">
                            <h1 style="font-size: 36px; font-weight: 800; margin-top: 30px; color: #000;">
                                Successfully Ordered</h1>
                            <img src="https://cdn0.iconfinder.com/data/icons/business-553/256/68-512.png"
                                width="125" height="120" style="display: block; border: 0px;" />
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td bgcolor="#f4f4f4" align="center" style="padding: 0px 10px 0px 10px;">
                <table border="0" cellpadding="10px" cellspacing="0" width="100%" style="max-width: 600px;">
                    <tr>
                        <td bgcolor="#ffffff" align="left"
                            style="padding: 20px 30px 40px 30px; color: #666666; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
                            <p style="margin: 0;">
                                <h2 align="center">You have successfully ordered!</h2>
                                <p><b>Hello, {{$fname}}</b></p>
                                <p>You have successfully ordered from our store.Below are the ordered items of your order <strong>{{$order_number}}</strong> .</p>
                                <p>Your order will be confirmed by our staff shortly.</p>

                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td bgcolor="#ffffff" align="left">
                            <table cellspacing="0" cellpadding="0" border="0" width="100%">
                                <tr>
                                    <td width="75%" align="left" bgcolor="#eeeeee"
                                        style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px;">
                                        Order Number # </td>
                                    <td width="25%" align="left" bgcolor="#eeeeee"
                                        style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px;">
                                        {{$order_number}} </td>
                                </tr>
                                @foreach ($products as $item)
                                <tr>
                                    <td width="75%" align="left"
                                        style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 15px 10px 5px 10px;">
                                       {{$item->proname}} (x {{$item->pivot->quantity}})</td>
                                    <td width="25%" align="left"
                                        style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 15px 10px 5px 10px;">
                                        LKR {{$item->pivot->price}} </td>
                                </tr>
                                @endforeach
                                <tr>
                                    <td width="75%" align="left"
                                        style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 5px 10px;">
                                        Shipping + Handling </td>
                                    <td width="25%" align="left"
                                        style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 5px 10px;">
                                        {{$shipping_cost}} </td>
                                </tr>
                            </table>
                        </td>
                    </tr> <!-- COPY -->
                    <tr>
                        <td align="left" style="background-color: white;">
                            <table cellspacing="0" cellpadding="0" border="0" width="100%">
                                <tr>
                                    <td width="75%" align="left"
                                        style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px; border-top: 3px solid #eeeeee; border-bottom: 3px solid #eeeeee;">
                                        TOTAL </td>
                                    <td width="25%" align="left"
                                        style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px; border-top: 3px solid #eeeeee; border-bottom: 3px solid #eeeeee;">
                                        LKR {{$grand_total}} </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td align="center" height="100%" valign="top" width="100%"
                            style="padding: 0 35px 35px 35px; background-color: #ffffff; border-bottom: 3px solid #eeeeee;"
                            bgcolor="#ffffff">
                            <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%"
                                style="max-width:660px;">
                                <tr>
                                    <td align="center" valign="top" style="font-size:0;">
                                        <div
                                            style="display:inline-block; max-width:50%; min-width:240px; vertical-align:top; width:100%;">
                                            <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%"
                                                style="max-width:300px;">
                                                    <tr>
                                                    <td align="left" valign="top"
                                                        style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px;">
                                                        <p style="font-weight: 800;">Sender Address</p>
                                                        <p>{{$fname}} {{$lname}}<br>
                                                            {{$sender_address_line_1}}<br>
                                                            {{$sender_address_line_2}} <br>
                                                            {{$sender_mobile}}
                                                        </p>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div
                                            style="display:inline-block; max-width:50%; min-width:240px; vertical-align:top; width:100%;">
                                            <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%"
                                                style="max-width:300px;">
                                                <tr>
                                                    <td align="left" valign="top"
                                                        style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px;">
                                                        <p style="font-weight: 800;">Receiver Address</p>
                                                        <p>{{$receiver_fname}} {{$receiver_lname}}<br>
                                                            {{$receiver_address1}}<br>
                                                            {{$receiver_address2}} <br>
                                                            {{$receiver_mobile}} <br>
                                                            @if ($order_type == 'gift')
                                                                Delivery on : {{$delivery_date}} <br>
                                                            @endif
                                                            @if ($sender_details == 'anonymous')
                                                                Sender : {{$sender_details}}
                                                            @endif
                                                        </p>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td bgcolor="#ffffff" align="left"
                            style="padding: 0px 30px 0px 30px; color: #666666; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
                            <br>
                            <p>Thanks for shopping with us!</p>
                            <p>Wijayasiri Gift Centre Team</p>
                    </tr>
                    <tr>
                        <td bgcolor="#ffffff" align="center" style="padding: 20px 30px 60px 30px;">
                            <table border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td align="center" onMouseOver="this.style.backgroundColor='#a81548'"
                                        onMouseOut="this.style.backgroundColor='#f50057'"
                                        style=" background-color: #f50057; font-size: large; font-family: sans-serif; padding: 15px 25px;border-radius: 7px; ">
                                        <a href="{{route('frontend.tracking.index',$order_number)}}" target="_blank"
                                            style="text-decoration: none; color:white;">
                                            Track Order</a></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td bgcolor="#f4f4f4" align="center" style="padding: 30px 10px 0px 10px;">
                            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                                <tr>
                                    <td bgcolor="#FFECD1" align="center"
                                        style="padding: 30px 30px 30px 30px; border-radius: 4px 4px 4px 4px; color: #666666; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
                                        <h2 style="font-size: 20px; font-weight: 400; color: #111111; margin: 0;">Need more help?
                                        </h2>
                                        <p style="margin: 0;"><a href="{{route('frontend.home.contact')}}" target="_blank" style="color: #FFA73B;">We&rsquo;re here
                                                to help you out</a></p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
             </td>
        </tr>
    </table>
</body>