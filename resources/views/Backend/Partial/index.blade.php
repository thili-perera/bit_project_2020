@if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
    <div>{{ $message }}</div>
</div>
@endif

@if ($message = Session::get('danger'))
<div class="alert alert-danger alert-block">
    <div>{{ $message }}</div>
</div>
@endif

@if ($message = Session::get('warning'))
<div class="alert alert-warning alert-block">
    <div>{{ $message }}</div>
</div>
@endif


{{-- @if (session('logerror'))
<div class="text-danger">
    <p>{{ $message }}</p>
</div>
@endif --}}

@if ($error = $errors->first('is_verified'))
<div class="alert alert-danger">
    {{ $error }}
</div>
@endif

@if ($error = $errors->first('credentials_error'))
<div class="alert alert-danger">
    {{ $error }}
</div>
@endif