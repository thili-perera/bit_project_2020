<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Gentelella Alela! | </title>

    <!-- Bootstrap -->
    <link href="{{asset('Backend/gentelella-master/vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{asset('Backend/gentelella-master/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{asset('Backend/gentelella-master/vendors/nprogress/nprogress.css')}}" rel="stylesheet">
    <!-- Animate.css -->
    <link href="{{asset('Backend/gentelella-master/vendors/animate.css/animate.min.css')}}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{asset('Backend/gentelella-master/build/css/custom.min.css')}}" rel="stylesheet">
</head>

<body class="login">
    @include('sweetalert::alert')
    <div>
        <div class="login_wrapper">
            <div class="animate form login_form">
                <section class="login_content">
                    <form action="{{route('dashboard.login.verify')}}" method="POST">
                        @csrf
                        <h1>WGC Login Form</h1>
                        @if (Session::has('logerror'))
                        <p class="text-danger">{{ Session::get('logerror') }}</p>
                        @endif
                        <div>
                            <input type="email" name="email" class="form-control" placeholder="Email" required="" />
                        </div>
                        <div>
                            <input type="password" name="password" class="form-control" placeholder="Password"
                                required="" />
                        </div>
                        <div>
                            <button class="btn btn-default submit" type="submit">Log in</button>
                            <a class="reset_pass" href="{{route('dashboard.forgotpassword')}}">Lost your password?</a>
                        </div>


                        <div class="separator">

                            <br />

                            <div>
                                <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>
                                <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and
                                    Terms</p>
                            </div>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>
</body>

</html>