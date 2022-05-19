@extends('Frontend.Layout.index')
@section('content')
<!-- Start Content -->
<div id="content">
    <div class=" container">
        <div class="row">
            <div class="col-md-12 col-lg-6 col-lg-offset-3">
                <div class="login">
                    <div class="login-form-container">
                        <div class="login-text">
                            <h3>Reset Password</h3>
                            <p>Enter your email and new password</p>
                        </div>
                        <!-- Login Form Start -->
                        <form action="{{route('frontend.resetpassword')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <div class="controls">
                                    <input type="email" class="form-control" placeholder="Email" name="email">
                                </div>
                            </div>
                            @error('email')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            <div class="form-group">
                                <div class="controls">
                                    <input type="password" class="form-control" placeholder="Password" name="new_password">
                                </div>
                            </div>
                            @error('new_password')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            <div class="form-group">
                                <div class="controls">
                                    <input type="password" class="form-control" placeholder="Confirm Password" name="confirm_password">
                                </div>
                            </div>
                            @error('confirm_password')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            <div class="button-box">
                                <button type="submit" class="btn btn-common log-btn">Submit</button>
                            </div>
                        </form>
                        <!-- Login Form End -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Content -->
@endsection