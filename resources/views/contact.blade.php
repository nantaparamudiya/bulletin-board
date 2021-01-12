@extends('layouts.app')

@section('title', 'Timedoor Challenge')

@section('header')
  <header>

    <nav class="navbar navbar-default mb-0" role="navigation">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <h2 class="font16 text-green mt-15"><b>Timedoor 30 Challenge Programmer</b></h2>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        @guest
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
              <li><a href="{{ route('home') }}">Home</a></li>
              <li><a href="{{ route('login') }}">Login</a></li>
              <li><a href="{{ route('register') }}">Register</a></li>
            </ul>
          </div><!-- /.navbar-collapse -->
        @else
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
              <li><a href="{{ route('home') }}">Home</a></li>
              <li>
                <form action="{{ route('logout') }}" method="post">
                  @csrf
                  <button type="submit" class="logout">Logout</button>
                </form>
              </li>
            </ul>
          </div><!-- /.navbar-collapse -->
        @endguest
      </div><!-- /.container-fluid -->
    </nav>

    @if ($errors->any())
      <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
          {{ $error }}
          <br>
        @endforeach
      </div>
    @elseif (! is_null(session('success')))
      <div class="alert alert-success">
        {{ session('success') }}
      </div>
    @endif

  </header>
@endsection

@section('content')
<main>
    <div class="section">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-md-offset-3 bg-white p-30 box">
            <div class="text-center">
              <h1 class="text-green mb-30"><b>Contact Us</b></h1>
            </div>

            <form action="{{ route('send') }}" method="post" enctype="multipart/form-data">
              @csrf

              @auth
                <div class="form-group">
                  <label>Name</label>
                  <input type="text" name="name" class="form-control" value="{{ Auth::user()->name }}">
                </div>

                <div class="form-group">
                  <label>Email</label>
                  <input type="email" name="email" class="form-control" value="{{ Auth::user()->email }}">
                </div>
              @else
                <div class="form-group">
                  <label>First Name</label>
                  <input type="text" name="first_name" class="form-control" value="{{ old('first_name') }}">
                </div>

                <div class="form-group">
                  <label>Last Name</label>
                  <input type="text" name="last_name" class="form-control" value="{{ old('last_name') }}">
                </div>

                <div class="form-group">
                  <label>Email</label>
                  <input type="email" name="email" class="form-control" value="{{ old('email') }}">
                </div>
              @endauth

              <div class="form-group">
                <label>Phone</label>
                <input type="telp" name="phone" class="form-control" value="{{ old('phone') }}">
              </div>

              <div class="form-group">
                <label>Body</label>
                <textarea rows="5" name="body" class="form-control">{{ old('body') }}</textarea>
              </div>

              @if(env('GOOGLE_RECAPTCHA_KEY'))
                  <div class="g-recaptcha"
                        data-sitekey="{{env('GOOGLE_RECAPTCHA_KEY')}}">
                  </div>
              @endif

              <div class="text-center mt-30 mb-30">
                <button class="btn btn-primary">Submit</button>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </main>
@endsection

@section('footer')
  <footer>

    <p class="font12">
      Copyright &copy; {{ date('Y') }} by <a href="https://timedoor.net" class="text-green">PT. TIMEDOOR INDONESIA</a>
    </p>
    
  </footer>
@endsection