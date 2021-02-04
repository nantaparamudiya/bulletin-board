@extends('layouts.admin')

@section('title', 'Timedoor Admin | Dashboard')

@section('content')
<div class="wrapper">
    <header class="main-header">
        <!-- Logo -->
        <a href="index2.html" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>T</b>D</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Timedoor</b> Admin</span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
            <!-- User Account: style can be found in dropdown.less -->
            <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <span class="hidden-xs">Hello, Admin </span>
                </a>
                <ul class="dropdown-menu">
                <!-- User image -->
                <li class="user-header">
                    <p>
                    Administrator
                    </p>
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                    <div class="text-right">
                    <a href="login.php" class="btn btn-danger btn-flat">Sign out</a>
                    </div>
                </li>
                </ul>
            </li>
            </ul>
        </div>
        </nav>
    </header>

    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        @include('admin.components.sidebar')
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1>
            Gallery
        </h1>
        </section>

        <!-- Main content -->
        <section class="content">
        <div class="row">
            <div class="col-xs-12">
            <!-- /.col-xs-12 -->
                @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                    {{ $error }}
                    <br>
                    @endforeach
                </div>
                @endif
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h1 class="font-18 m-0">Timedoor Challenge</h1>
                    </div>
                    <div class="box-body">
                        <div class="bordered-box mb-20">
                            <form action="{{ route('gallery.index') }}" method="post" enctype="multipart/form-data">
                                @csrf

                                {{--
                                <ul class="nav navbar-nav navbar-right">
                                    <li>
                                        <a href="{{ url('locale/en') }}" ><i class="fa fa-language"></i> EN</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('locale/id') }}" ><i class="fa fa-language"></i> ID</a>
                                    </li>
                                </ul>
                                --}}

                                <table class="table table-no-border mb-0">
                                <tbody>
                                    <tr>
                                    <td width="150">
                                        <b>Title</b>
                                    </td>
                                    <td>
                                        <div class="form-group mb-0">
                                        <input type="text" name="title" class="form-control" value="{{ old('title') }}">
                                        </div>
                                    </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="form-group">
                                                <label>Choose image from your computer :</label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <input type="text" class="form-control upload-form" value="No file chosen" readonly>
                                                    <span class="input-group-btn">
                                                        <span class="btn btn-default btn-file">
                                                        <i class="fa fa-folder-open"></i>&nbsp;Browse <input type="file" name="image">
                                                        </span>
                                                    </span>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                    <td>
                                        <b>Alt Description</b>
                                    </td>
                                    <td>
                                        <div class="form-group mb-0">
                                        <input type="text" name="alt_desc" class="form-control" value="{{ old('alt_desc') }}">
                                        </div>
                                    </td>
                                    </tr>
                                    <tr>
                                    <td><b>Image Description</b>
                                    </td>
                                    <td>
                                        <div class="form-group mb-0">
                                        <input type="text" name="desc" class="form-control" value="{{ old('desc') }}">
                                        </div>
                                    </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="form-group mb-0">
                                                <button class="btn btn-primary">Submit</button>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                                </table>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.col-xs-12 -->
        </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> 0.1.0
        </div>
        <strong>Copyright &copy; {{ date('Y') }} <a href="https://timedoor.net" class="text-green">Timedoor Indonesia</a>.</strong> All rights reserved.
    </footer>
</div>
@endsection