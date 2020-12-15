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
                    <img src="img/user-ico.jpg" class="img-circle" alt="User Image">
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
            Contact
            <small>Email</small>
        </h1>
        </section>

        <!-- Main content -->
        <section class="content">
        <div class="row">
            <div class="col-xs-12">
            <!-- /.col-xs-12 -->
            <div class="box box-success">
                <div class="box-header with-border">
                <h1 class="font-18 m-0">Timedoor Challenge</h1>
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