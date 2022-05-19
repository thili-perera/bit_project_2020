<!DOCTYPE html>
<html lang="en">

<head>
    @include('Backend.Layout.head')

    @include('Backend.Layout.header')
</head>

<body class="nav-md">
    @include('sweetalert::alert')
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                @include('Backend.Layout.sidebar')
            </div>

            <!-- top navigation -->
            <div class="top_nav">
                @include('Backend.Layout.nav')
            </div>
            <!-- /top navigation -->

            <!-- page content -->
            <div class="right_col" role="main">
                <!-- top tiles -->
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        @include('Backend.Partial.index')
                    </div>
                    @yield('content')
                </div>
            </div>
            <!-- /page content -->

            <!-- footer content -->
            @include('Backend.Layout.footer')
            <!-- /footer content -->
        </div>
    </div>

    @include('Backend.Layout.foot')

</body>

</html>