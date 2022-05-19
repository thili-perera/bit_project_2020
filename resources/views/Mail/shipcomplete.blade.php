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
                                Shipping Completed</h1>
                            <img src="https://cdn3.iconfinder.com/data/icons/logistics-caramel-vol-1/256/DELIVERED-512.png"
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
                                <h2 align="center">Your order delivered successfull!</h2>
                                <p><b>Hello, {{$fname}}</b></p>
                                <p>Your order was successfully delivered to you. </p>
                                <span>Your order {{$order_number}} was successfully delivered to you. We hope you are happy with your
                                    order. Thanks for staying with us.. Order
                                    with us again.</span>

                            </p>
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
                                        <a href="{{route('frontend.home.index')}}" target="_blank"
                                            style="text-decoration: none; color:white;">
                                            Shop Again</a></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td bgcolor="#f4f4f4" style="padding: 15px 0px 0px 0px;" align="center">
                            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                                <tr align="center">
                                    <td bgcolor="#FFECD1" align="center"
                                        style="padding: 30px 30px 30px 30px; border-radius: 4px 4px 4px 4px; color: #666666; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
                                        <h2 style="font-size: 20px; font-weight: 400; color: #111111; margin: 0;">Need
                                            more help?
                                        </h2>
                                        <p style="margin: 0;"><a href="{{route('frontend.home.contact')}}" target="_blank"
                                                style="color: #FFA73B;">We&rsquo;re here
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