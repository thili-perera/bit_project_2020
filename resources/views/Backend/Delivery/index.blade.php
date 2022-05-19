@extends('Backend.Layout.index')
@section('style')
    <link href="{{ asset('Backend/gentelella-master/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css') }}"
        rel="stylesheet">
    <link href="{{ asset('Backend/gentelella-master/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css') }}"
        rel="stylesheet">
    <link
        href="{{ asset('Backend/gentelella-master/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css') }}"
        rel="stylesheet">
    <link
        href="{{ asset('Backend/gentelella-master/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css') }}"
        rel="stylesheet">
    <link
        href="{{ asset('Backend/gentelella-master/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css') }}"
        rel="stylesheet">
@endsection
@section('content')
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>All Deliveries</h2>
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
            <div class="x_content">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box table-responsive">
                            <div id="datatable-responsive_wrapper"
                                class="dataTables_wrapper container-fluid dt-bootstrap no-footer">

                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="datatable-responsive"
                                            class="table table-striped table-bordered dt-responsive nowrap dataTable no-footer dtr-inline collapsed"
                                            cellspacing="0" width="100%" role="grid"
                                            aria-describedby="datatable-responsive_info" style="width: 100%;">
                                            <thead>
                                                <tr role="row">
                                                    <th class="sorting_asc" tabindex="0"
                                                        aria-controls="datatable-responsive" rowspan="1" colspan="1"
                                                        style="width: 83px;" aria-sort="ascending"
                                                        aria-label="First name: activate to sort column descending">Order Id
                                                    </th>
                                                    <th class="sorting_asc" tabindex="0"
                                                        aria-controls="datatable-responsive" rowspan="1" colspan="1"
                                                        style="width: 83px;" aria-sort="ascending"
                                                        aria-label="First name: activate to sort column descending">Order
                                                        Status</th>
                                                    <th class="sorting" tabindex="0" aria-controls="datatable-responsive"
                                                        rowspan="1" colspan="1" style="width: 81px;"
                                                        aria-label="Last name: activate to sort column ascending">Driver
                                                        Name
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="datatable-responsive"
                                                        rowspan="1" colspan="1" style="width: 120px;"
                                                        aria-label="Last name: activate to sort column ascending">Action
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if (Auth::user()->hasRole('Delivery Officer'))
                                                    @foreach ($deliveries as $delivery)
                                                    <tr role="row" class="odd">
                                                        <td tabindex="0" class="sorting_1" style="">
                                                            {{ $delivery->order->order_number }}
                                                        </td>
                                                        <td>
                                                            <h4><span
                                                                    class="badge badge-warning">{{ $delivery->order->status }}</span>
                                                            </h4>
                                                        </td>
                                                        <td>
                                                            {{ $delivery->user->username }}
                                                        </td>
                                                        <td>
                                                            <a name="" id="" class="btn btn-secondary"
                                                                href="{{ route('dashboard.delivery.show', $delivery->order->id) }}"
                                                                role="button">View
                                                                Delivery</a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                @else
                                                @foreach ($deliveries as $delivery)
                                                    <tr role="row" class="odd">
                                                        <td tabindex="0" class="sorting_1" style="">
                                                            {{ $delivery->order_number }}
                                                        </td>
                                                        <td>
                                                            <h4><span
                                                                    class="badge badge-warning">{{ $delivery->status }}</span>
                                                            </h4>
                                                        </td>
                                                        <td>
                                                            @php
                                                                $user = \App\Model\User::where('id', $delivery->delivery->user_id)->first();
                                                            @endphp
                                                            {{ $user->username }}
                                                        </td>
                                                        <td>
                                                            <a name="" id="" class="btn btn-secondary"
                                                                href="{{ route('dashboard.delivery.show', $delivery) }}"
                                                                role="button">View
                                                                Delivery</a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                @endif
                                            </tbody>

                                        </table>
                                    </div>
                                </div>
                                <div class="row">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{ asset('Backend/gentelella-master/vendors/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('Backend/gentelella-master/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js') }}">
    </script>
    <script
        src="{{ asset('Backend/gentelella-master/vendors/datatables.net-responsive/js/dataTables.responsive.min.js') }}">
    </script>
    <script
        src="{{ asset('Backend/gentelella-master/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js') }}">
    </script>

    <script src="{{ asset('Backend/gentelella-master/vendors/datatables.net-buttons/js/dataTables.buttons.min.js') }}">
    </script>
    <script src="{{ asset('Backend/gentelella-master/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js') }}">
    </script>
    <script src="{{ asset('Backend/gentelella-master/vendors/datatables.net-buttons/js/buttons.flash.min.js') }}">
    </script>
    <script src="{{ asset('Backend/gentelella-master/vendors/datatables.net-buttons/js/buttons.html5.min.js') }}">
    </script>
    <script src="{{ asset('Backend/gentelella-master/vendors/datatables.net-buttons/js/buttons.print.min.js') }}">
    </script>
    <script
        src="{{ asset('Backend/gentelella-master/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js') }}">
    </script>
    <script src="{{ asset('Backend/gentelella-master/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js') }}">
    </script>
    <script src="{{ asset('Backend/gentelella-master/vendors/datatables.net-scroller/js/dataTables.scroller.min.js') }}">
    </script>
    <script src="{{ asset('Backend/gentelella-master/vendors/jszip/dist/jszip.min.js') }}"></script>
    <script src="{{ asset('Backend/gentelella-master/vendors/pdfmake/build/pdfmake.min.js') }}"></script>
    <script src="{{ asset('Backend/gentelella-master/vendors/pdfmake/build/vfs_fonts.js') }}"></script>
@endsection
