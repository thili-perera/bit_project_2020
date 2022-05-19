{{-- Success Message --}}
<div class="modal fade" id="myModal-s" role="dialog" tabindex="-1">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Success</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <p>Added to cart successfully..</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

{{-- danger Message --}}
<div class="modal fade" id="myModal-d" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Success</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <p>Item removed successfully..</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>

@if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
    <div>{{ $message }}</div>
</div>
@endif

@if ($message = Session::get('warning'))
<div class="alert alert-warning alert-block">
    <div>{{ $message }}</div>
</div>
@endif




{{-- @if ($message = Session::get('register'))
<div class="alert alert-warning alert-block">
    <div>{{ $message }}</div>
</div>
@endif --}}

@if ($message = Session::get('danger'))
<div class="alert alert-danger alert-block">
    <div>{{ $message }}</div>
</div>
@endif


<script>
    var msg = '{{Session::get('register')}}';
    var exist = '{{Session::has('register')}}';
    if(exist){
    alert(msg);
    }
</script>


{{-- @if(session()->has('register'))
<script>
    alert({{ session()->get('register') }});
</script>
@endif --}}