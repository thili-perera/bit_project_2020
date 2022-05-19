@extends('Frontend.Layout.index')
@section('content')
    <!-- Content Section Start -->
    <section id="content">
      <div class="contact-info">
        <div class="container">          
          <div class="col-md-12">
            <div class="header-wrap text-center">
              <h3>You have successfully placed an order..</h3>
            </div>
          </div>
        </div>
      </div>
      
      <div class="contact-form-wrapper text-center">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <a name="" id="" class="btn btn-common" href="{{route('frontend.order.show',$order_number)}}" role="button">View Order</a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Content Section End -->
@endsection
