<!DOCTYPE html>
<html lang="en">

<head>
    @include('Frontend.Layout.head')
    @include('Frontend.Layout.header')
</head>

<body>
    <!-- Header Section Start -->
    <div class="header">

        <!-- Start Top Bar -->
        @include('Frontend.Layout.topbar')
        <!-- End Top Bar -->

        <!-- Start  Logo & Naviagtion  -->
        <nav class="navbar navbar-default" data-spy="affix" data-offset-top="50">
            @include('Frontend.Layout.nav')
        </nav>
    </div>
    <!-- Header Section End -->

    <!--breadcrumb start-->
    @include('Frontend.Layout.breadcrumb')
    @include('Frontend.Partial.index')

    <!--breadcrumb end-->

    <!-- Side Content Start -->
    @yield('sidebar')
    <!-- Side Content End -->

    {{-- mid content start --}}

    @yield('content')

    {{-- mid content end --}}

    <!-- Footer Start -->
    <footer class="section">
        @include('Frontend.Layout.footer')
    </footer>
    <!-- Footer End -->

    <!-- Copyright Start -->
    <div id="copyright">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <p>All copyrights reserved &copy; 2017 - Designed by & <a rel="nofollow"
                            href="https://uideck.com">UIdeck</a> Developed by Thilini</p>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="payment pull-right">
                        <img src="assets/img/payment.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Copyright End -->

    <!-- Go To Top Link -->
    <a href="#" class="back-to-top">
        <i class="icon-arrow-up"></i>
    </a>

    <!-- All modals added here for the demo -->

    <!-- the overlay element -->

    <!-- Preloader -->
    <div id="preloader">
        <div id="status">
            <div class="spinner">
                Loading...
            </div>
        </div>
    </div>
    <!-- End Preloader -->

    <!-- All js here -->
    @include('Frontend.Layout.foot')

</body>

</html>