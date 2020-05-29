@extends('layouts.app')

@section('title', 'Timedoor Challenge - Level 8 | Register Confirm')

@section('content')
  <form action="{{ route('register.create') }}" method="post">
    @csrf

    <input type="hidden" name="name" value="{{ old('name') }}">
    <input type="hidden" name="email" value="{{ old('email') }}">
    <input type="hidden" name="password" value="{{ old('password') }}">

    <div class="box login-box">

      <div class="login-box-head">
        <h1>{{ __('Register') }}</h1>
      </div>

      <div class="login-box-body">

        <table class="table table-no-border">
          <tbody>

            <tr>
              <th>{{ __('Name') }}</th>
              <td>{{ old('name') }}</td>
            </tr>

            <tr>
              <th>{{ __('E-Mail Address') }}</th>
              <td>{{ old('email') }}</td>
            </tr>

            <tr>
              <th>{{ __('Password') }}</th>
              <td>{{ old('password') }}</td>
            </tr>

          </tbody>
        </table>

      </div>

      <div class="login-box-footer">
        <div class="text-right">
          <button type="submit" name="button" value="back" class="btn btn-default">Back</button>
          <button type="submit" name="button" value="store" class="btn btn-primary">Submit</button>
        </div>
      </div>

    </div>

  </form>  
@endsection