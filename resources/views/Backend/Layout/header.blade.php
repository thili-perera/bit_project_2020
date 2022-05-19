<!-- Bootstrap -->
<link href="{{asset('Backend/gentelella-master/vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
<!-- Font Awesome -->
<link href="{{asset('Backend/gentelella-master/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
<!-- NProgress -->
<link href="{{asset('Backend/gentelella-master/vendors/nprogress/nprogress.css')}}" rel="stylesheet">
<!-- iCheck -->
<link href="{{asset('Backend/gentelella-master/vendors/iCheck/skins/flat/green.css')}}" rel="stylesheet">

<!-- bootstrap-progressbar -->
<link
    href="{{asset('Backend/gentelella-master/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css')}}"
    rel="stylesheet">
<!-- JQVMap -->
<link href="{{asset('Backend/gentelella-master/vendors/jqvmap/dist/jqvmap.min.css')}}" rel="stylesheet" />
<!-- bootstrap-daterangepicker -->
<link href="{{asset('Backend/gentelella-master/vendors/bootstrap-daterangepicker/daterangepicker.css')}}"
    rel="stylesheet">

<!-- Custom Theme Style -->
<link href="{{asset('Backend/gentelella-master/build/css/custom.min.css')}}" rel="stylesheet">

{{-- font awesome --}}

<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
    integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

<!-- Custom style css -->
<link rel="stylesheet" href="{{asset('Backend/gentelella-master/src/style.css')}}">

@yield('style')


<link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-notify/0.2.0/css/bootstrap-notify.css">

{{-- tiny mce --}}
<script src="{{ asset('node_modules/tinymce/tinymce.js') }}"></script>
<script>
    tinymce.init({
    selector: '#mytextarea'
  });
</script>

