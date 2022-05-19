@extends('Backend.Layout.index')
@section('content')

    <div class="col-md-12 col-sm-12">
        <form class="form-label-left input_mask" action="{{ route('dashboard.user.update', $user->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                {{-- left colom --}}
                <div class="left-colom image colom col-md-5 ">
                    <div>
                        <h2 class="x_title text-center"> User Photo</h2>
                    </div>
                    <div class="avatar-upload">
                        <div class="avatar-edit">
                            <input type='file' id="imageUpload" name="image" accept=".png, .jpg, .jpeg" />
                            <label for="imageUpload"></label>
                        </div>
                        <div class="avatar-preview">
                            @if ($user->image)
                                <img src="{{ url('upload/user', $user->image) }}" class="mx-auto img-fluid img-circle d-block"
                                id="preview" width="200px">

                            @else
                                <div id="imagePreview"
                                    style="background-image: url(https://upload.wikimedia.org/wikipedia/commons/7/7c/Profile_avatar_placeholder_large.png);">
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                {{-- //left colom --}}

                {{-- right colom --}}
                <div class="right-colom image colom col-md-7">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Update User</small></h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                        aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#">Settings 1</a>
                                        <a class="dropdown-item" href="#">Settings 2</a>
                                    </div>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <br>
                            {{-- add user form --}}
                            <div class="col-md-6 col-sm-6  form-group has-feedback">
                                <input type="text" name="fname" value="{{ $user->fname }}"
                                    class="form-control has-feedback-left" id="inputSuccess2" placeholder="First Name*">
                                <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                @error('fname')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-6 col-sm-6  form-group has-feedback">
                                <input type="text" name="lname" value="{{ $user->lname }}"
                                    class="form-control has-feedback-left" id="inputSuccess3" placeholder="Last Name">
                                <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                @error('lname')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-6 col-sm-6  form-group has-feedback">
                                <input type="email" name="email" value="{{ $user->email }}"
                                    class="form-control has-feedback-left" id="inputSuccess4" placeholder="Email*">
                                <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
                                @error('email')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            {{-- <div class="col-md-6 col-sm-6  form-group has-feedback">
                                <input type="password" name="cpassword" class="form-control has-feedback-left"
                                    id="inputSuccess4" placeholder="Current Password*">
                                <span class="fas fa-unlock-alt form-control-feedback left" aria-hidden="true"></span>
                                @error('fname')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                            </div> --}}
                            <div class="col-md-6 col-sm-6  form-group has-feedback">
                                <input type="password" name="new_password" class="form-control has-feedback-left"
                                    id="inputSuccess4" placeholder="New Password*">
                                <span class="fas fa-unlock-alt form-control-feedback left" aria-hidden="true"></span>
                            </div>
                            <div class="col-md-6 col-sm-6  form-group has-feedback float-right mb-3">
                                <input type="password" name="confirm_password" class="form-control has-feedback-left"
                                    id="inputSuccess4" placeholder="Confirm Password*">
                                <span class="fas fa-unlock-alt form-control-feedback left" aria-hidden="true"></span>
                                @error('confirm_password')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <div class="form-group row col-md-12">
                                <label class="col-form-label col-md-3 col-sm-3 ">Username*</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <input type="text" name="username" value="{{ $user->username }}" class="form-control"
                                        placeholder="Username*">
                                    @error('username')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row col-md-12">
                                <label class="col-form-label col-md-3 col-sm-3 ">Telephone*</label>
                                <div class="col-md-9 col-sm-9 form-group has-feedback">
                                    <input type="tel" name="mobile" value="{{ $user->mobile }}"
                                        class="form-control has-feedback-left" placeholder="Telephone">
                                    <span class="fa fa-phone form-control-feedback left" aria-hidden="true"></span>
                                    @error('mobile')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row col-md-12">
                                <label class="col-form-label col-md-3 col-sm-3 ">Address Line 1*</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <input type="text" name="address_line_1"
                                        value="{{ optional($user->billing_address)->address_line_1 }}"
                                        class="form-control" placeholder="Address Line 1*">
                                    @error('address_line_1')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row col-md-12">
                                <label class="col-form-label col-md-3 col-sm-3 ">Address Line 2</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <input type="text" name="address_line_2"
                                        value="{{ optional($user->billing_address)->address_line_2 }}"
                                        class="form-control" placeholder="Address Line 2">
                                    {{-- @error('address_line_2')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror --}}
                                </div>
                            </div>
                            <div class="form-group row col-md-12">
                                <label class="col-form-label col-md-3 col-sm-3 ">City*</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <input type="text" name="city" value="{{ optional($user->billing_address)->city }}"
                                        class="form-control" placeholder="City*">
                                    @error('city')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row col-md-12">
                                <label class="col-form-label col-md-3 col-sm-3 ">Zip-Code*</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <input type="text" name="zipCode"
                                        value="{{ optional($user->billing_address)->zipCode }}" class="form-control"
                                        placeholder="Zip-Code*">
                                    @error('zipCode')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row col-md-12">
                                <label class="col-form-label col-md-3 col-sm-3 ">District*</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <input type="text" name="district"
                                        value="{{ optional($user->billing_address)->district }}" class="form-control"
                                        placeholder="District*">
                                    @error('district')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mt-3 col-md-12">
                                <label class="col-form-label col-md-3 col-sm-3 ">Role*</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <div class="form-check">
                                        @error('role')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                        @foreach ($roles as $role)
                                            <div>
                                                <input type="checkbox" name="role[]" value="{{ $role->id }}" @if ($user->roles->pluck('id')->contains($role->id)) checked @endif>
                                                <label class="form-check-label">
                                                    {{ $role->rname }}
                                                </label>
                                            </div>

                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="form-group row col-md-12">
                                <div class="col-md-9 col-sm-9  offset-md-3">
                                    <button type="button" class="btn btn-primary">Cancel</button>
                                    <button class="btn btn-primary" type="reset">Reset</button>
                                    <button type="submit" class="btn btn-success">Submit</button>
                                </div>
                            </div>
                            {{-- //add user form --}}
                        </div>
                    </div>
                </div>
                {{-- //right colom --}}
            </div>
        </form>
    </div>
@endsection
