@extends('Backend.Layout.index')
@section('content')
  <div class="col-md-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Complaints Inbox</h2>
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
        <div class="row">
          <div class="col-sm-12 mail_list_column">
            {{-- <button id="compose" class="btn btn-sm btn-success btn-block" type="button">COMPOSE</button> --}}
            @foreach ($complaints as $complaint)
              <a href="{{route('dashboard.complaint.show',$complaint->id)}}">
                <div class="mail_list">
                  <div class="left">
                    @if ($complaint->status == 'reviewing')
                      <i class="fas fa-2x fa-spinner"></i>
                    @elseif($complaint->status == 'pending') 
                      <i class="fas fa-2x fa-hourglass-end text-danger"></i>
                    @else
                        <i class="fas fa-2x fa-check-circle text-success"></i>  
                    @endif
                  </div>
                  <div class="right">
                    <h3>{{$complaint->user->fname}} {{$complaint->user->lname}}<small>{{$complaint->created_at->format('Y/m/d H:i')}}</small></h3>
                    <p>{{$complaint->message}}</p>

                    <p>View>></p>
                  </div>
                </div>
            </a>
            @endforeach
            {{-- <a href="#">
              <div class="mail_list">
                <div class="left">
                  <i class="fa fa-star"></i>
                </div>
                <div class="right">
                  <h3>Jane Nobert <small>4.09 PM</small></h3>
                  <p><span class="badge">To</span> Ut enim ad minim veniam, quis nostrud exercitation enim ad minim veniam, quis nostrud exercitation...</p>
                </div>
              </div>
            </a> --}}
            
          </div>
          <!-- /MAIL LIST -->

          
        </div>
      </div>
    </div>
  </div>
@endsection