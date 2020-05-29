@extends('layouts.admin')

@section('title', 'Timedoor Challenge - Level 8 | Login')

@section('content')

  @if (! is_null(session('error')) )
  	<span class="invalid-feedback" role="alert">
  		{{ session('error') }}
  	</span>
  @endif

  <div class="login-box">
    <div class="login-box-head">
      <h1>Login</h1>
      <p>Please login to continue...</p>
    </div>
    
    <form action="{{ route('admin.login') }}" method="post">
    @csrf
    
    <div class="login-box-body">
      <div class="form-group">
        <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" placeholder="Username">
        @error('username')
        	<span class="invalid-feedback" role="alert">
        		{{ $message }}
        	</span>
        @enderror
      </div>
      <div class="form-group">
        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password">
        @error('password')
        	<span class="invalid-feedback" role="alert">
        		{{ $message }}
        	</span>
        @enderror
      </div>
    </div>
    <div class="login-box-footer">
      <div class="text-right">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>
    
    </form>
  </div>

  <!-- Javascript -->
  <script type="text/javascript" src="{{ asset('js/admin/jquery.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/admin/bootstrap.min.js') }}"></script>
  <!-- Javascript End -->
@endsection