@extends('Backend.Layout.index')
@section('content')
<div class="col-md-12 col-sm-12 ">
    <div class="row">
       
		<div class="x_panel">
<div class="x_title">
<h2>Add New Supplier</small></h2>
<ul class="nav navbar-right panel_toolbox">
<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
</li>
<li class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
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
<form class="form-label-left input_mask" action="{{route('dashboard.supplier.update',$supplier->id)}}" method="POST">
	@csrf
    @method('PUT')
<div class="item form-group">
<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Supplier Name <span class="required">*</span>
</label>
<div class="col-md-6 col-sm-6 ">
<input type="text" id="first-name" name="name" required="required" class="form-control " value="{{$supplier->name}}">
@error('name')
    <p class="text-danger">{{$message}}</p>
@enderror
</div>
</div>

<div class="item form-group">
<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Email <span class="required">*</span>
</label>
<div class="col-md-6 col-sm-6 ">
<input type="email" class="form-control has-feedback-right" name="email" id="inputSuccess4" value="{{$supplier->email}}">
@error('email')
    <p class="text-danger">{{$message}}</p>
@enderror
<span class="fa fa-envelope form-control-feedback right" aria-hidden="true"></span>
</div>
</div>

<div class="item form-group">
<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Telephone No. <span class="required">*</span>
</label>
<div class="col-md-6 col-sm-6 ">
<input type="text" class="form-control" name="contact" placeholder="" value="{{$supplier->contact}}">
@error('contact')
    <p class="text-danger">{{$message}}</p>
@enderror
<span class="fa fa-phone form-control-feedback right" aria-hidden="true"></span>
</div>
</div>
<div class="form-group row">
<div class="col-md-9 col-sm-9  offset-md-3">
<button type="button" class="btn btn-primary">Cancel</button>
<button class="btn btn-primary" type="reset">Reset</button>
<button type="submit" class="btn btn-success">Submit</button>
</div>
</div>
</form>
</div>
</div>

    </div>
</div>
@endsection