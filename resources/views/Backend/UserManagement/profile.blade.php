@extends('Backend.Layout.index')
@section('content')


    <!-- page content -->
    <div class="container rounded bg-white mt-5 mb-5">
        <div class="row">
            <div class="col-md-3 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                    @if (Auth::user()->image)
                        <img src="{{ url('upload/user', Auth::user()->image) }}" class="rounded-circle" alt="upload user image"
                        width="175px">
                    @else
                        <img src="https://upload.wikimedia.org/wikipedia/commons/7/7c/Profile_avatar_placeholder_large.png" class="rounded-circle" alt="upload user image"
                        width="175px">
                    @endif

                    <span class="font-weight-bold">{{ optional($user)->username }}</span>
                    <span class="text-black-50">{{ optional($user)->email }}</span>
                    @foreach (Auth::user()->roles as $role)
                        <div>
                            <span class="badge badge-pill badge-success">
                                {{ $role->rname }}
                            </span>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-md-7 border-right">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Profile Settings</h4>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6"><label class="labels">First Name</label><input type="text"
                                class="form-control" value="{{ Auth::user()->fname }}"></div>
                        <div class="col-md-6"><label class="labels">Last Name</label><input type="text" class="form-control"
                                value="{{ Auth::user()->lname }}" placeholder=""></div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <label class="labels">PhoneNumber</label>
                            <input type="text" class="form-control" placeholder="enter phone number"
                                value="{{ Auth::user()->mobile }}">
                        </div>
                        <div class=" col-md-12">
                            <label class="labels">Email ID</label>
                            <input type="text" class="form-control" placeholder="enter email id"
                                value="{{ Auth::user()->email }}">
                        </div>
                        <div class="col-md-12">
                            <label class="labels">Address Line 1</label>
                            <input type="text" class="form-control" placeholder="enter address line 1"
                                value="{{ optional(Auth::user()->billing_address)->address_line_1 }}">
                        </div>
                        <div class="col-md-12">
                            <label class="labels">Address Line 2</label>
                            <input type="text" class="form-control" placeholder="enter address line 2"
                                value="{{ optional(Auth::user()->billing_address)->address_line_2 }}">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label class="labels">City</label>
                            <input type="text" class="form-control" placeholder="enter city"
                                value="{{ optional(Auth::user()->billing_address)->city }}">
                        </div>
                        <div class="col-md-6"><label class="labels">Zip Code</label><input type="text" class="form-control"
                                value="{{ optional(Auth::user()->billing_address)->zipCode }}" placeholder="enter zip">
                        </div>
                        <div class="col-md-6">
                            <label class="labels">City</label>
                            <input type="text" class="form-control" placeholder="enter district"
                                value="{{ optional(Auth::user()->billing_address)->district }}">
                        </div>
                    </div>
                    {{-- <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="button">Save
                            Profile</button></div> --}}
                </div>
            </div>
        </div>
    </div>
    <!-- /page content -->
@endsection
