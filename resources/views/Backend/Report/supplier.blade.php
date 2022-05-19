@extends('Backend.Layout.index')
@section('content')
    <div class="col-md-12 col-sm-12  ">
        <div class="x_panel">
            <div class="x_title">

                <h2>Supplier Report Generate</small></h2>
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

            <form action="{{ route('dashboard.report.supplierFilter') }}" method="post">
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
                </div>

                <button type="submit" value="filter" name="filter" class="btn btn-primary">Filter</button>
                <button type="submit" value="report" name="report" class="btn btn-primary">Download PDF</button>
            </form>
            <div class="x_content">
                <h1 class="text-center mb-3"> Supplier Report
                </h1>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Added Date</th>
                            <th>Supplier Name</th>
                            <th>Supplier Email</th>
                            <th>Supplier Contact</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($suppliers->isEmpty())
                            <tr><td class="text-center" colspan="4"> No data available for this period...</td> </tr>
                        @else
                        @foreach ($suppliers as $supplier)
                            <tr>
                                <th scope="row">{{ $supplier->created_at->format('Y-m-d') }}</th>
                                <td>{{ $supplier->name }}</td>
                                <td>{{ $supplier->email }}</td>
                                <td>{{ $supplier->contact }}</td>
                            </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
