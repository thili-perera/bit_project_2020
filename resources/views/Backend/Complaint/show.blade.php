@extends('Backend.Layout.index')
@section('content')
    <!-- CONTENT MAIL -->
                      <div class="col-sm-12 mail_view">
                        <div class="inbox-body">
                          <div class="mail_heading row">
                            <div class="col-md-8">
                            </div>
                            <div class="col-md-4 text-right">
                              <p class="date"> {{$complaint->created_at->format('Y/m/d H:i')}}</p>
                            </div>
                            <div class="col-md-12">
                              <h4> {{$complaint->subject}}</h4>
                            </div>
                          </div>
                          <div class="sender-info">
                            <div class="row">
                              <div class="col-md-12 mb-3">
                                <strong>{{$complaint->user->fname}} {{$complaint->user->lname}}</strong>
                                <span>({{$complaint->user->email}})</span> 
                              </div>
                            </div>
                          </div>
                          <div class="view-mail">
                            <p>{{$complaint->message}}</p>
                          </div>
                          <form action="{{route('dashboard.complaint.update',$complaint->id)}}" method="post">
                              @csrf
                              @method('PUT')
                                <div class="form-group row w-50">
                                    <label class="control-label col-md-3 col-sm-3 "><strong>Update Status :</strong> </label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <select class="form-control" name="complaint_status">
                                                <option disabled>Choose option</option>
                                                @if ($complaint->status == "reviewing")
                                                    <option disabled value="pending" {{ $complaint->status == "pending" ? 'selected="selected"' : '' }}>Pending</option>
                                                    <option disabled value="reviewing" {{ $complaint->status == "reviewing" ? 'selected="selected"' : '' }}>Reviewing</option>
                                                    <option value="completed" {{ $complaint->status == "completed" ? 'selected="selected"' : '' }}>Completed</option> 
                                                @elseif($complaint->status == "completed")
                                                    <option disabled value="pending" {{ $complaint->status == "pending" ? 'selected="selected"' : '' }}>Pending</option>
                                                    <option disabled value="reviewing" {{ $complaint->status == "reviewing" ? 'selected="selected"' : '' }}>Reviewing</option>
                                                    <option disabled value="completed" {{ $complaint->status == "completed" ? 'selected="selected"' : '' }}>Completed</option> 

                                                @else
                                                    <option disabled value="pending" {{ $complaint->status == "pending" ? 'selected="selected"' : '' }}>Pending</option>
                                                    <option value="reviewing" {{ $complaint->status == "reviewing" ? 'selected="selected"' : '' }}>Reviewing</option>
                                                    <option value="completed" {{ $complaint->status == "completed" ? 'selected="selected"' : '' }}>Completed</option>
                                                @endif
                                                
                                            </select>
                                        </div>
                                </div>
                          <div class="btn-group">
                            <button class="btn btn-sm btn-primary" type="submit"> Update Status</button>
                          </div>
                          </form>
                        </div>

                      </div>
                      <!-- /CONTENT MAIL -->
@endsection