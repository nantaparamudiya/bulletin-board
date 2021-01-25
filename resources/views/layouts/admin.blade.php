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
      $(document).on('change', '.btn-file :file', function () {
        var input = $(this),
          numFiles = input.get(0).files ? input.get(0).files.length : 1,
          label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
        input.trigger('fileselect', [numFiles, label]);
      });

      $(document).ready(function () {
        $('.btn-file :file').on('fileselect', function (event, numFiles, label) {
          var input = $(this).parents('.input-group').find(':text'),
            log = numFiles > 1 ? numFiles + ' files selected' : label;

          if (input.length) {
            input.val(log);
          } else {
            if (log) alert(log);
          }
        });
      });
    </script>
  </body>
</html>
