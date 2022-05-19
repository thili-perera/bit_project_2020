@extends('Backend.Layout.index')
@section('content')

<div class="col-md-12 col-sm-12 ">
    <div class="row">
        <div class="x_panel">
            <div class="x_title">
                <h2>Add New Vehicle</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                            aria-expanded="false"><i class="fa fa-wrench"></i></a>
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
                <form id="demo-form2" action="{{route('dashboard.vehicle.store')}}" method="POST"
                    data-parsley-validate="" class="form-horizontal form-label-left" novalidate="">
                    @csrf
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Vehicle Number
                            <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" id="first-name" required="required" name="vehicle_number"
                                class="form-control ">
                                @error('vehicle_number')
                                    <p class="text-danger">{{$message}}</p>
                                @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3 label-align">Select Vehicle Type *</label>
                        <div class="col-md-6 col-sm-6 ">
                            <select class="form-control" name="type">
                                <option disabled selected>Choose Vehicle</option>
                                <option value="threewheel">Three Wheel</option>
                                <option value="bike">Bike</option>
                            </select>
                            @error('type')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3 label-align">Select Driver *</label>
                        <div class="col-md-6 col-sm-6 ">
                            <select class="form-control" name="driver">
                                <option selected disabled>Choose Driver</option>
                                @foreach ($drivers as $driver)
                                @foreach ($driver->users as $item)
                                <option value="{{$item->id}}">{{$item->fname}}</option>
                                @endforeach
                                @endforeach
                            </select>
                             @error('driver')
                                <p class="text-danger">{{$message}}</p>
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
                </form>
            </div>
        </div>
    </div>
</div>
@endsection