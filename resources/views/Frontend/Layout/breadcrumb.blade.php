<!-- Start Page Header -->
<div class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb">
                    <a href="{{route('frontend.home.index')}}"><i class="icon-home"></i> Home /</a>
                    <?php $segments = ''; ?>
                    @foreach(Request::segments() as $segment)
                    <li>
                        <a href="{{ $segments }}">{{$segment}}</a>
                    </li>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Page Header -->