@extends('Backend.Layout.index')
@section('content')


<!-- page content -->
<div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-4 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                <div class="avatar-preview">
                    @if ($user->image)
                        <img src="{{ url('upload/user', $user->image) }}" class="mx-auto img-fluid img-circle d-block"
                        id="preview" width="200px">

                    @else
                        <div id="imagePreview" width="200px"
                            style="background-image: url(https://upload.wikimedia.org/wikipedia/commons/7/7c/Profile_avatar_placeholder_large.png);">
                        </div>
                    @endif
                </div>

                <span class="font-weight-bold">{{$user->username}}</span>
                <span class="text-black-50">{{$user->email}}</span>
                @foreach ($user->roles as $role)
                <div>
                    <span class="badge badge-pill badge-success">
                        {{$role->rname}}
                    </span>
                </div>
                @endforeach
            </div>
        </div>
        <div class="col-md-8 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Profile Settings</h4>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6"><label class="labels">First Name</label><input type="text"
                            class="form-control" value="{{$user->fname}}"></div>
                    <div class="col-md-6"><label class="labels">Last Name</label><input type="text" class="form-control"
                            value="{{$user->lname}}" placeholder=""></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12">
                        <label class="labels">PhoneNumber</label>
                        <input type="text" class="form-control" placeholder="enter phone number"
                            value="{{$user->mobile}}">
                    </div>
                    <div class=" col-md-12">
                        <label class="labels">Email ID</label>
                        <input type="text" class="form-control" placeholder="enter email id" value="{{$user->email}}">
                    </div>
                    <div class="col-md-12">
                        <label class="labels">Address Line 1</label>
                        <input type="text" class="form-control" placeholder="enter address line 1"
                            value="{{optional($user->billing_address)->address_line_1}}">
                    </div>
                    <div class="col-md-12">
                        <label class="labels">Address Line 2</label>
                        <input type="text" class="form-control" placeholder="enter address line 2"
                            value="{{optional($user->billing_address)->address_line_2}}">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6">
                        <label class="labels">City</label>
                        <input type="text" class="form-control" placeholder="enter city"
                            value="{{optional($user->billing_address)->city}}"></div>
                    <div class="col-md-6"><label class="labels">Zip Code</label><input type="text" class="form-control"
                            value="{{optional($user->billing_address)->zipCode}}" placeholder="enter zip">
                    </div>
                    <div class="col-md-6"><label class="labels">District</label><input type="text" class="form-control"
                            value="{{optional($user->billing_address)->district}}" placeholder="enter district">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<!-- /page content -->
@endsection