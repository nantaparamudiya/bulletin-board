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
    <div class="section bg-white">
      <div class="container">
        <div class="text-center">
            <h1 class="text-green mb-30"><b>Gallery</b></h1>
        </div>
        @foreach ($galleries as $gallery)
          @foreach ($gallery->images as $image)
          <!-- <img class="img-responsive" src="" alt=""> -->
          {{ dd($render($image->name)) }}
          @endforeach
        @endforeach
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