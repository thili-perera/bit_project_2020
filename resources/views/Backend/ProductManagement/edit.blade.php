@extends('Backend.Layout.index')
@section('content')

    <div class="col-md-12 col-sm-12">
        <div class="row">
            <div class="left-colom col-md-8 col-sm-8">
                <div class="row">
                    <div class="col-md-12 col-sm-12 ">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Update Product</h2>
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
                                <form action="{{ route('dashboard.product.update', $product->id) }}"
                                    enctype="multipart/form-data" method="POST" id="demo-form2" data-parsley-validate=""
                                    class="form-horizontal form-label-left" novalidate="">
                                    @csrf
                                    @method('PUT')
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Product
                                            Name
                                            <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input type="text" id="first-name" required="required" class="form-control "
                                                name="proname" value="{{ $product->proname }}">
                                        </div>
                                         @error('proname')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Product
                                            Brand
                                            <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <select class="select2_single form-control" tabindex="-1" name="brand_id">
                                                <option disabled selected>-- select brand --</option>
                                                @foreach ($brands as $item)
                                                    <option value="{{$item->id}}" {{ $item->id == $brand->id ? 'selected' : '' }}>{{$item->brandname}}</option>
                                                @endforeach
                                            </select>
                                            @error('brand_id')
                                                <p class="text-danger">{{ $message }}</p>
                                             @enderror
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Product
                                            Description
                                            <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input type="text" id="last-name" name="description" required="required"
                                                class="form-control" value="{{ $product->description }}">
                                        </div>
                                         @error('description')
                                                <p class="text-danger">{{ $message }}</p>
                                             @enderror
                                    </div>
                                    <div class="item form-group">
                                        <label for="middle-name"
                                            class="col-form-label col-md-3 col-sm-3 label-align">Regular
                                            Price<span class="required">*</span></label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input id="middle-name" class="form-control" type="text" name="regularprice"
                                                value="{{ $product->regularprice }}">
                                        </div>
                                        @error('regularprice')
                                                <p class="text-danger">{{ $message }}</p>
                                             @enderror
                                    </div>
                                    <div class="item form-group">
                                        <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Sales
                                            Price<span class="required">*</span></label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input id="middle-name" class="form-control" type="text" name="salesprice"
                                                value="{{ $product->salesprice }}">
                                        </div>
                                         @error('salesprice')
                                                <p class="text-danger">{{ $message }}</p>
                                             @enderror
                                    </div>
                                    <div class="item form-group">
                                        <label for="middle-name"
                                            class="col-form-label col-md-3 col-sm-3 label-align">Product
                                            Weight<span class="required">*</span></label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input id="middle-name" class="form-control" type="text" name="weight"
                                                value="{{ $product->weight }}">
                                        </div>
                                         @error('weight')
                                                <p class="text-danger">{{ $message }}</p>
                                             @enderror
                                    </div>
                                    <div class="item form-group">
                                        <div class="col-md-12 col-sm-12 ">
                                            <textarea id="mytextarea" name="content">{!! $product->content !!}</textarea>
                                        </div>
                                         @error('content')
                                                <p class="text-danger">{{ $message }}</p>
                                             @enderror
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="right-colom col-md-4 col-sm-4">
                <div class="row">
                    <div class="col-md-12 col-sm-12 ">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Publish</h2>
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
                            <form class="x_content">
                                <br>
                                <div class="form-group row">
                                    {{-- multilavel category --}}
                                    <label class="control-label col-md-3 col-sm-3 ">Category*</label>
                                    <div class="col-md-9 col-sm-9 ">
                                        @foreach ($productcategories as $category)
                                            <div class="col-md-12 col-sm-12">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox"
                                                        value="{{ $category->id }}" name="cat_id[]" id="defaultCheck1" @if ($product->categories->pluck('id')->contains($category->id)) checked @endif>

                                                    <label class="form-check-label" for="defaultCheck1">
                                                        {{ $category->catname }}
                                                    </label>
                                                </div>
                                            </div>
                                            @foreach ($category->children as $sub)
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-check">
                                                        {!! '&nbsp;' !!} {!! '&nbsp;' !!}
                                                        {!! '&nbsp;' !!}
                                                        <input class="form-check-input" type="checkbox" name="cat_id[]"
                                                            value="{{ $sub->id }}" id="defaultCheck1" @if ($product->categories->pluck('id')->contains($sub->id)) checked @endif>
                                                        <label class="form-check-label" for="defaultCheck1">
                                                            {{ $sub->catname }}
                                                        </label>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endforeach
                                        @error('cat_id')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3 col-sm-3 ">Product Image*</label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <div class="form-group">
                                            <input type="file" name="image" class="form-control-file"
                                                id="exampleFormControlFile1">
                                        </div>
                                        <img src="{{ url('upload/product', $product->image) }}" class="img-thumbnail"
                                            alt="" width="150px">
                                    @error('image')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                    </div>
                                </div>
                                <div class="ln_solid"></div>
                                <div class="item form-group">
                                    <div>
                                        <button class="btn btn-primary" type="button">Cancel</button>
                                        <button class="btn btn-primary" type="reset">Reset</button>
                                        <button type="submit" class="btn btn-success" data-toggle="modal"
                                            data-target="#myModal-s">Submit</button>
                                    </div>
                                </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

@endsection
