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
              <li><a href="{{ route('login') }}">Login</a></li>
              <li><a href="{{ route('register') }}">Register</a></li>
            </ul>
          </div><!-- /.navbar-collapse -->
        @else
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
              <li>
                <form action="{{ route('logout') }}" method="post">
                  @csrf
                  <button type="submit" class="logout">Logout</button>
                </form>
              </li>
              <li><a href="{{ route('register') }}">Register</a></li>
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
    @elseif (! is_null(session('scissor')))
      <div class="alert alert-danger">
        {{ session('scissor') }}
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
              <h1 class="text-green mb-30"><b>Level 1 - 8 Challenge</b></h1>
            </div>

            <form action="{{ route('bulletin.index') }}" method="post" enctype="multipart/form-data">
              @csrf

              @auth
                <input type="hidden" name="user" value="{{ Auth::user()->id }}">
              @endauth

              <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" class="form-control" value="{{ old('name') }}">
              </div>

              <div class="form-group">
                <label>Title</label>
                <input type="text" name="title" class="form-control" value="{{ old('title') }}">
              </div>

              <div class="form-group">
                <label>Body</label>
                <textarea rows="5" name="message" class="form-control">{{ old('message') }}</textarea>
              </div>

              <div class="form-group">
                <label>Choose image from your computer :</label>
                <div class="input-group">
                  <input type="text" class="form-control upload-form" value="No file chosen" readonly>
                  <span class="input-group-btn">
                    <span class="btn btn-default btn-file">
                      <i class="fa fa-folder-open"></i>&nbsp;Browse <input type="file" name="image">
                    </span>
                  </span>
                </div>
              </div>
              
              @guest
                <div class="form-group">
                  <label>Password</label>
                  <input type="password" name="password" class="form-control">
                </div>
              @endguest

              <div class="text-center mt-30 mb-30">
                <button class="btn btn-primary">Submit</button>
              </div>

            </form>

            <hr>
            
            @include('bulletin-board.components.post')

            <div class="text-center mt-30">
              <nav>
                {{ $bulletins->links() }}
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  
  @if (! is_null(session('modal')))
    @include('bulletin-board.components.modals')
  @endif
@endsection

@section('footer')
  <footer>

    <p class="font12">
      Copyright &copy; {{ date('Y') }} by <a href="https://timedoor.net" class="text-green">PT. TIMEDOOR INDONESIA</a>
    </p>
    
  </footer>
@endsection