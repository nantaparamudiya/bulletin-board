@extends('layouts.app')

@section('title', 'Timedoor Challenge - Level 8 | Register')

@section('content')
  <form action="{{ route('register.validation') }}" method="post">
    @csrf
    
    <div class="box login-box">

      <div class="login-box-head">
        <h1 class="mb-5">{{ __('Register') }}</h1>
        <p class="text-lgray">Please fill the information below...</p>
      </div>

      <div class="login-box-body">

        <div class="form-group">
          <!-- <input type="text" class="form-control" placeholder="Name"> -->
          <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="{{ __('Name') }}" autofocus>

          @error('name')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
        </div>

        <div class="form-group">
          <!-- <input type="text" class="form-control" placeholder="E-mail"> -->
          <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="{{ __('E-Mail Address') }}">

          @error('email')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
        </div>

        <div class="form-group">
          <!-- <input type="password" class="form-control" placeholder="Password"> -->
          <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="{{ __('Password') }}">

          @error('password')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
        </div>

      </div>

      <div class="login-box-footer">
        <div class="text-right">
          <a href="{{ route('bulletin.index') }}" class="btn btn-default">Back</a>
          <button type="submit" class="btn btn-primary">Confirm</button>
        </div>
      </div>

    </div>

  </form>
@endsection