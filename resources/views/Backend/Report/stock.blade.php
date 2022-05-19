@extends('Backend.Layout.index')
@section('content')
    <div class="col-md-12 col-sm-12  ">
        <div class="x_panel">
            <div class="x_title">

                <h2>Stock Report Generate</small></h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i
                                class="fa fa-wrench"></i></a>
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

            <form action="{{ route('dashboard.report.stockFilter') }}" method="post">
                @csrf
                <div class="col-md-12 col-sm-12">
                    <div class="item form-group">
                        <div class="col-md-6 col-sm-6 ">
                            <label for="">Start Date</label>
                            <input id="birthday" class="date-picker form-control" name="startdate" @isset($startdate)
                                value="{{$startdate}}"
                            @endisset
                            placeholder=""
                                type="text" required="required" onfocus="this.type='date'" onmouseover="this.type='date'"
                                onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)">
                            <script>
                                function timeFunctionLong(input) {
                                    setTimeout(function() {
                                        input.type = 'text';
                                    }, 60000);
                                }

                            </script>
                        </div>

                        <div class="col-md-6 col-sm-6 ">
                            <label for="">End Date</label>
                            <input id="birthday" class="date-picker form-control" name="enddate" @isset($enddate)
                                value="{{$enddate}}" 
                            @endisset
                           placeholder="" type="text"
                                required="required" onfocus="this.type='date'" onmouseover="this.type='date'"
                                onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)">
                            <script>
                                function timeFunctionLong(input) {
                                    setTimeout(function() {
                                        input.type = 'text';
                                    }, 60000);
                                }

                            </script>
                        </div>
                    </div>
                    <br>
                    <br>
                    <div class="form-group row">
                        <label class="col-form-label col-md-2 col-sm-2 ">Supplier<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <select class="form-control" name="supplier">
                                <option disabled="" selected="">Select supplier</option> 
                                @foreach ($suppliers as $supplier)
                                    <option value="{{$supplier->id}}" @isset($enddate)
                                        {{ $supplier->name == $supplierd->name ? 'selected' : '' }}
                                    @endisset>{{$supplier->name}}</option>
                                @endforeach
                            </select>
                            @error('supplier')
                                    <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <button type="submit" value="filter" name="filter" class="btn btn-primary">Filter</button>
                <button type="submit" value="report" name="report" class="btn btn-primary">Download PDF</button>
            </form>
            <div class="x_content">
                <h1 class="text-center mb-3">@isset($enddate)
                    {{$supplierd->name}} Stock Report
                @endisset</h1>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Supplied Date</th>
                            <th>Product</th>
                            <th>Supplier</th>
                            <th>Quantity</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($stocks->isEmpty())
                            <tr><td class="text-center" colspan="4"> No data available for this period...</td> </tr>
                        @else
                        @foreach ($stocks as $stock)
                            <tr>
                                <th scope="row">{{ $stock->created_at->format('Y-m-d') }}</th>
                                <td>{{ $stock->product->proname }}</td>
                                <td>{{ $stock->supplier->name }}</td>
                                <td>{{ $stock->quantity }}</td>
                            </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
