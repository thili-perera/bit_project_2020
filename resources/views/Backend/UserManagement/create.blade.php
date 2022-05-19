@extends('Backend.Layout.index')
@section('content')

    <div class="col-md-12 col-sm-12">
        <form action="{{ route('dashboard.user.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">

                {{-- left colom --}}
                <div class="left-colom image colom col-md-5 ">
                    <div class="container">
                        <h2 class="text-center">User Image Upload
                        </h2>
                        <hr>

                        @csrf
                        <div class="avatar-upload">
                            <div class="avatar-edit">
                                <input type='file' id="imageUpload" name="image" accept=".png, .jpg, .jpeg" />
                                <label for="imageUpload"></label>
                            </div>
                            <div class="avatar-preview">
                                <div id="imagePreview"
                                    style="background-image: url(https://upload.wikimedia.org/wikipedia/commons/7/7c/Profile_avatar_placeholder_large.png);">
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                {{-- //left colom --}}

                {{-- right colom --}}
                <div class="right-colom image colom col-md-7">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Add User</small></h2>
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
                                <input type="text" name="fname" class="form-control has-feedback-left" id="inputSuccess2"
                                    placeholder="First Name">
                                <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                @error('fname')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-6 col-sm-6  form-group has-feedback">
                                <input type="text" name="lname" class="form-control has-feedback-left" id="inputSuccess3"
                                    placeholder="Last Name">
                                <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                @error('lname')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-6 col-sm-6  form-group has-feedback">
                                <input type="email" name="email" class="form-control has-feedback-left" id="inputSuccess4"
                                    placeholder="Email">
                                <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
                                @error('email')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-6 col-sm-6  form-group has-feedback">
                                <input type="password" name="password" class="form-control has-feedback-left"
                                    id="inputSuccess5" placeholder="Password">
                                <span class="fa fa-unlock form-control-feedback left" aria-hidden="true"></span>
                                @error('password')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-6 col-sm-6  form-group has-feedback">
                                <input type="text" name="username" class="form-control has-feedback-left" id="inputSuccess2"
                                    placeholder="User Name">
                                <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                @error('username')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-6 col-sm-6  form-group has-feedback">
                                <input type="tel" name="mobile" class="form-control has-feedback-left" id="inputSuccess5"
                                    placeholder="Telephone">
                                <span class="fa fa-phone form-control-feedback left" aria-hidden="true"></span>
                                @error('mobile')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 ">Role*</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <div class="form-check">
                                        @error('role')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                        @foreach ($roles as $role)
                                            <div class="mt-1">
                                                <input type="checkbox" name="role[]" value="{{ $role->id }}"
                                                    id="myCheck" onclick="myFunction()">
                                                <label class="form-check-label">
                                                    {{ $role->rname }}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mt-3">
                                <label class="col-form-label col-md-3 col-sm-3 ">Address Line 1*</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <input type="text" name="address_line_1" class="form-control"
                                        placeholder="Address Line 1*">
                                    @error('address_line_1')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 ">Address Line 2</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <input type="text" name="address_line_2" class="form-control"
                                        placeholder="Address Line 2">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputCity">City*</label>
                                    <input type="text" name="city" class="form-control" id="inputCity">
                                    @error('city')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputState">District*</label>
                                    <input type="text" name="district" class="form-control">
                                    @error('district')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="inputZip">Zip*</label>
                                    <input type="text" name="zipCode" class="form-control" id="inputZip">
                                    @error('zipCode')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="form-group row">
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
