@extends('layouts.app')

@section('title', 'Timedoor Challenge - Level 8 | Login')

@section('content')
  <form  action="{{ route('login') }}" method="POST">
    @csrf

	@if (! is_null(session('error')))
 	  <p class="alert alert-danger">
   	    {{ session('error') }}
 	  </p>
 	@endif

    <div class="box login-box">
      
      <div class="login-box-head">
        <h1 class="mb-5">{{ __('Login') }}</h1>
        <p class="text-lgray">Please login to continue...</p>
      </div>

      <div class="login-box-body">

        <div class="form-group">
          <!-- <input type="text" class="form-control" name="username" placeholder="Username"> -->
          <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email" autofocus>

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
          <!-- <input type="password" class="form-control" name="password" placeholder="Password"> -->
          <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">

          @error('password')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
        </div>

      </div>

      <div class="login-box-footer">
        <div class="text-right">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </div>

    </div>

  </form>
@endsection