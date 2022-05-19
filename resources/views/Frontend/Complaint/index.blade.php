@extends('Frontend.layout.index')
@section('content')
    <!-- Content Section --> 
    <section id="content">
      <div class="contact-info">
        <div class="container">          
          <div class="col-md-12">
            <div class="header-wrap text-center">
              <h3>Send us a message</h3>
              <p class="description">Let us know if you have any questions regarding the order</p>
            </div>
          </div>
        </div>
      </div>
      
      <div class="contact-form-wrapper">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <form action="{{route('frontend.complaint.store',$order->order_number)}}" class="contact-form" method="POST">
                  @csrf
                <div class="row">
                  <div class="col-md-6 col-xs-12">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <input disabled type="text" class="form-control" id="name" name="name" value="{{Auth::user()->fname}}" required data-error="Please enter your name">
                          <div class="help-block with-errors"></div>
                        </div>                    
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">                      
                          <input disabled type="email" class="form-control" id="email" value="{{Auth::user()->email}}" required data-error="Please enter your email">
                          <div class="help-block with-errors"></div>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group"> 
                          <input type="text" class="form-control" name="subject" placeholder="Subject">
                        </div>
                      </div> 
                    </div>                    
                  </div>    
                  <div class="col-md-6 col-xs-12">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group"> 
                          <textarea class="form-control" name="message" id="message" placeholder="Message" rows="9" data-error="Write your message" required></textarea>
                          <div class="help-block with-errors"></div>
                        </div>
                      </div>
                    </div>
                  </div> 
                  <div class="col-md-12 col-xs-12">
                    <button type="submit" class="btn btn-common">Send Message</button>
                  </div>
                </div> 
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- content Section End-->
@endsection