@extends('layouts.app')

@section('title', 'Timedoor Challenge - Level 8 | Register Success')

@section('content')
  <div class="box login-box text-center">

    <div class="login-box-head">
      <h1>Successfully Registered</h1>
    </div>

    <div class="login-box-body">
      <p>
        Thank you for your registration. Membership is now complete.  
      </p>
    </div>

    <div class="login-box-footer">
      <div class="text-center">
        <a href="{{ route('bulletin.index') }}" class="btn btn-primary">Back to Home</a>
      </div>
    </div>
    
  </div>
@endsection