@extends('Backend.Layout.index')
@section('content')

<div class="col-md-12 col-sm-12">
    <div class="row">
        <div class="left-colom col-md-8 col-sm-8">
            <div class="row">
                <div class="col-md-12 col-sm-12 ">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Update Category</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                        aria-haspopup="true" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a class="dropdown-item" href="#">Settings 1</a>
                                        </li>
                                        <li><a class="dropdown-item" href="#">Settings 2</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <br>
                            <form action="{{route('dashboard.category.update',$category->id)}}"
                                enctype="multipart/form-data" method="POST" id="demo-form2" data-parsley-validate=""
                                class="form-horizontal form-label-left" novalidate="">
                                @csrf
                                @method('PUT')
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align"
                                        for="first-name">Category
                                        Name
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="text" id="first-name" required="required" class="form-control "
                                            name="catname" value="{{$category->catname}}">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Category
                                        Description
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="text" id="last-name" name="description"
                                            value="{{$category->description}}" required="required" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Category
                                        Image
                                        <span class="required">*</span>
                                    </label>
                                    <div class=" col-sm-6 col-md-6">
                                        <div id="msg"></div>
                                        <input type="file" name="image" class="file" accept="image/*">
                                        <div class="input-group my-3">
                                            <input type="text" name="image" class="form-control" disabled
                                                placeholder="Upload File" id="file">
                                            <div class="input-group-append">
                                                <button type="button" class="browse btn btn-primary">Browse...</button>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6">
                                            <img src="{{url('upload/category',$category->image)}}" class="img-thumbnail"
                                                alt="" width="200px">
                                        </div>
                                    </div>
                                </div>
                                <div class="ln_solid"></div>
                                <div class="item form-group">
                                    <div class="offset-md-3">
                                        <button class="btn btn-primary" type="button">Cancel</button>
                                        <button class="btn btn-primary" type="reset">Reset</button>
                                        <button type="submit" class="btn btn-success" data-toggle="modal"
                                            data-target="#myModal-s">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection