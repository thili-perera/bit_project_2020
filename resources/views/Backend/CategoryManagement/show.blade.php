@extends('Backend.Layout.index')
@section('content')

<div class="col-md-12 col-sm-12">
    <div class="row">
        {{-- left colom --}}
        <div class="left-colom image colom col-md-5 ">
            <div>
                <h2 class="x_title"> Category Image</h2>
            </div>
            <img src="{{url('upload/category',$category->image)}}" alt="upload category image" width="400px">
        </div>
        {{-- //left colom --}}

        {{-- right colom --}}
        <div class="right-colom image colom col-md-7">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Category Details</small></h2>
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
                    {{-- category form --}}
                    <div class="form-group">
                        <label for="exampleInputEmail1">Category Name</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                            placeholder="Enter category name" value="{{$category->catname}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Category Description</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                            placeholder="Enter category description" value="{{$category->description}}">
                    </div>
                    {{-- //category form --}}
                </div>
            </div>
        </div>
        {{-- //right colom --}}
    </div>
</div>
@endsection