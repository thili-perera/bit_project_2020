@extends('Frontend.Layout.index')
@section('content')
<div class="container mt-20">
    <div class="row my-2">
        <form method="POST" action="{{route('dashboard.user.update',Auth::user()->id)}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            {{-- customer profile photo --}}
            <div class="col-lg-4 order-lg-1 text-center user">
                <div class="avatar-upload">
                        <div class="avatar-preview">
                            @if (Auth::user()->image)
                                <img src="{{ url('upload/user', Auth::user()->image) }}" class="mx-auto img-fluid img-circle d-block"
                                id="preview" width="200px">

                            @else
                                <div id="imagePreview"
                                    style="background-image: url(https://upload.wikimedia.org/wikipedia/commons/7/7c/Profile_avatar_placeholder_large.png);">
                                </div>
                            @endif
                        </div>
                        <div class="avatar-edit">
                            <input type='file' id="imageUpload" name="image" accept=".png, .jpg, .jpeg" />
                            <label for="imageUpload"></label>
                        </div>
                    </div>
            </div>
            {{-- //customer profile photo --}}

            {{-- customer profile details --}}
            <div class="col-lg-8 order-lg-2">
                <ul class="nav nav-tabs m-bottom ">
                    <li class="nav-item active">
                        <a href="" data-target="#profile" data-toggle="tab" class="nav-link active">User Profile</a>
                    </li>
                    <li class="nav-item">
                        <a href="" data-target="#edit" data-toggle="tab" class="nav-link">Update Profile</a>
                    </li>
                </ul>
                <div class="tab-content py-4 mt-10">
                    <div class="tab-pane active" id="profile">
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">First name</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="text" value="{{optional(Auth::user())->fname}}"
                                    name="fname" disabled>
                                @error('fname')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Last name</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="text" name="lname"
                                    value="{{optional(Auth::user())->lname}}" disabled>
                                @error('lname')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Address Line 1</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="text" name="address_line_1" disabled
                                    value="{{optional(Auth::user()->billing_address)->address_line_1}}"
                                    placeholder="Street">
                                @error('address_line_1')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Address Line 2</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="text" name="address_line_2" disabled
                                    value="{{optional(Auth::user()->billing_address)->address_line_2}}"
                                    placeholder="Street">
                                @error('address_line_2')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label"></label>
                            <div class="col-lg-3">
                                <input class="form-control" type="text"
                                    value="{{optional(Auth::user()->billing_address)->city}}" name="city" disabled
                                    placeholder="City">
                                @error('city')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-lg-3">
                                <input class="form-control" type="text"
                                    value="{{optional(Auth::user()->billing_address)->district}}" name="district" disabled
                                    placeholder="District">
                                @error('district')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-lg-3">
                                <input class="form-control" type="text"
                                    value="{{optional(Auth::user()->billing_address)->zipCode}}" name="zipCode" disabled
                                    placeholder="Zip Code">
                                @error('zipCode')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Mobile</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="text" name="mobile" disabled
                                    value="{{optional(Auth::user())->mobile}}">
                                @error('mobile')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Username</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="text" name="username" disabled
                                    value="{{optional(Auth::user())->username}}">
                                @error('username')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Email</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="email" name="email" disabled
                                    value="{{optional(Auth::user())->email}}">
                                @error('email')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <!--/row-->
                    </div>

                    {{-- profile edit --}}
                    <div class="tab-pane" id="edit">
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">First name</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="text" value="{{optional(Auth::user())->fname}}"
                                    name="fname">
                                @error('fname')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Last name</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="text" name="lname"
                                    value="{{optional(Auth::user())->lname}}">
                                @error('lname')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Address Line 1</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="text" name="address_line_1"
                                    value="{{optional(Auth::user()->billing_address)->address_line_1}}"
                                    placeholder="Street">
                                @error('address_line_1')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Address Line 2</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="text" name="address_line_2"
                                    value="{{optional(Auth::user()->billing_address)->address_line_2}}"
                                    placeholder="Street">
                                @error('address_line_2')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label"></label>
                            <div class="col-lg-3">
                                <input class="form-control" type="text"
                                    value="{{optional(Auth::user()->billing_address)->city}}" name="city"
                                    placeholder="City">
                                @error('city')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-lg-3">
                                <input class="form-control" type="text"
                                    value="{{optional(Auth::user()->billing_address)->district}}" name="district"
                                    placeholder="District">
                                @error('district')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-lg-3">
                                <input class="form-control" type="text"
                                    value="{{optional(Auth::user()->billing_address)->zipCode}}" name="zipCode"
                                    placeholder="Zip Code">
                                @error('zipCode')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Mobile</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="text" name="mobile"
                                    value="{{optional(Auth::user())->mobile}}">
                                @error('mobile')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Username</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="text" name="username"
                                    value="{{optional(Auth::user())->username}}">
                                @error('username')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label"></label>
                    <div class="col-lg-9">
                        <input type="submit" class="btn btn-common" value="Save Changes">
                        <input type="hidden" name="frontend" value="frontend">
                    </div>
                </div>
            </div>
            {{-- profile edit --}}
    </div>
</div>
</form>
</div>
</div>
</div>
{{-- //customer profile details --}}
</div>
</div>
@endsection