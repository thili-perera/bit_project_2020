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
                                Message Reviewing</h1>
                            <img src="https://cdn.iconscout.com/icon/free/png-512/customer-review-2057020-1732637.png"
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
                                <h2 align="center">Your service required message under reviewing!</h2>
                                <p><b>Hello, {{$fname}}</b></p>
                                <p>We have received a message from you asking for a service for order <b>{{$order_number}}</b>. Our agent will contact you shortly.</p>
                                <span>Thanks for joining our service.</span>

                            </p>
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