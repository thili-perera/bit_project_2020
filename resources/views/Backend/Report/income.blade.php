@extends('Backend.Layout.index')
@section('content')
<div class="col-md-12 col-sm-12  ">
    <div class="x_panel">
        <div class="x_title">

            <h2>Income Report Generate</small></h2>
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

        <form action="{{route('dashboard.report.incomeFilter')}}" method="post">
            @csrf
            <div class="col-md-12 col-sm-12">
                <div class="item form-group">
                    <div class="col-md-6 col-sm-6 ">
                        <label for="">Start Date</label>
                        <input id="birthday" class="date-picker form-control" name="startdate" placeholder=""
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
                        <input id="birthday" class="date-picker form-control" name="enddate" placeholder="" type="text"
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
            </div>

            <button type="submit" value="filter" name="filter" class="btn btn-primary">Filter</button>
            <button type="submit" value="report" name="report" class="btn btn-primary">Submit</button>
        </form>
        <div class="x_content">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Order Number</th>
                        <th>Order Date</th>
                        <th>Total Price</th>
                    </tr>
                </thead>
                <tbody>
                    
                    @php
                    $total = 0
                    @endphp
                    @if ($orders->isEmpty())
                        <tr><td class="text-center" colspan="3"> No data available for this period...</td> </tr>
                    @else
                    @foreach ($orders as $order)
                    @php
                    $total += $order->grand_total
                    @endphp
                    <tr>
                        <th scope="row">{{$order->order_number}}</th>
                        <td>{{$order->created_at->format('Y-m-d')}}</td>
                        <td>Rs. {{$order->grand_total}}</td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
            <tr>
                <div class="bg-success text-white p-2 text-right">
                    <h2>Total Income : Rs. {{$total}}</h2>
                </div>
            </tr>
        </div>
    </div>
</div>
@endsection