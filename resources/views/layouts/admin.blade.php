<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{ asset('plugin/bootstrap/bootstrap.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('plugin/font-awesome/font-awesome.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('plugins/Ionicons/ionicons.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('css/admin/admin.css') }}">
    <!-- TMDR Preset -->
    <link rel="stylesheet" href="{{ asset('css/admin/tmdrPreset.css') }}">
    <!-- Custom css -->
    <link rel="stylesheet" href="{{ asset('css/admin/custom.css') }}">
    <!-- Skin -->
    <link rel="stylesheet" href="{{ asset('css/admin/skin.css') }}">
    <!-- Date Picker -->
    <link rel="stylesheet" href="{{ asset('plugin/bootstrap-datepicker/bootstrap-datetimepicker.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('plugin/daterangepicker/daterangepicker.css') }}">
    <!-- DataTable -->
    <link rel="stylesheet" href="{{ asset('plugin/datatable/datatables.min.css') }}">
    <!-- DataTable -->
    <link rel="stylesheet" href="{{ asset('plugin/selectpicker/bootstrap-select.css') }}">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  </head>

  @if (Route::is('admin'))
    <body class="hold-transition skin sidebar-mini">
  @elseif (Route::is('admin.login'))
    <body id="login">
  @endif  
    
    @yield('content')

    <!-- jQuery 3 -->
    <script src="{{ asset('plugin/jquery/jquery.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('plugin/jquery/jquery-ui.min.js') }}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.7 -->
    <script src="{{ asset('plugin/bootstrap/bootstrap.min.js') }}"></script>
    <!-- daterangepicker -->
    <script src="{{ asset('plugin/moment/moment.min.js') }}"></script>
    <script src="{{ asset('plugin/daterangepicker/daterangepicker.js') }}"></script>
    <!-- datepicker -->
    <script src="{{ asset('plugin/bootstrap-datepicker/bootstrap-datetimepicker.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('js/admin/adminlte.min.js') }}"></script>
    <!-- DataTable -->
    <script src="{{ asset('plugin/datatable/datatables.min.js') }}"></script>
    <!-- CKEditor -->
    <script src="{{ asset('plugin/ckeditor/ckeditor.js') }}"></script>
    <!-- Selectpicker -->
    <script src="{{ asset('plugin/selectpicker/bootstrap-select.js') }}"></script>

    <script>
      // BOOTSTRAP TOOLTIPS
      if ($(window).width() > 767) {
        $(function () {
          $('[rel="tooltip"]').tooltip()
        });
      };

      const checkAll = document.querySelector('#check-all');
      const checkbox = document.querySelectorAll('input[type=checkbox]');

      checkAll.addEventListener('change', () =>{
        if (checkAll.checked === true) {
          checkbox.forEach((e) =>{
            e.checked = true;
          });
        } else {
          checkbox.forEach((e) =>{
            e.checked = false;
          });
        }
      });
    </script>
  </body>
</html>
