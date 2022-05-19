@extends('Frontend.Layout.index')
@section('content')
<!-- Start Content -->
<div id="content">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-6 col-lg-offset-3">
                <div class="login">
                    <div class="login-form-container">
                        <div class="login-text">
                            <h3>Register</h3>
                            <p>Please Register using account detail bellow.</p>
                        </div>
                        <!-- Account Form Start -->
                        <form class="login-form" role="form" method="POST" action="{{route('frontend.store')}}">
                            @csrf
                            <div class="form-group">
                                <div class="controls">
                                    <input type="text" class="form-control" placeholder="Username" name="username">
                                </div>
                                @error('username')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <div class="controls">
                                    <input type="password" class="form-control" placeholder="Password" name="password"
                                        id="password">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="controls">
                                    <input type="password" class="form-control" placeholder="Confirm Password"
                                        name="password_confirmation" id="password">
                                </div>
                                @error('password')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <div class="controls">
                                    <input type="text" class="form-control" placeholder="Email" name="email">
                                </div>
                                @error('email')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="button-box">
                                <button type="submit" class="btn btn-common log-btn">Register</button>
                            </div>
                        </form>
                        <!-- Account Form End -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Content -->
@endsection