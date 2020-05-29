<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title')</title>

  <style type="text/css">
    button.logout {
      color: #777;
      border: none;
      display: block;
      border-radius: none;
      margin-top: 15px;
      background: transparent;
    }

    button.logout:focus, button.logout:hover {
      color: #6DDA5F;
    }
  </style>

  <!-- CSS -->
  <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/tmdrPreset.css') }}">
  <style type="text/css">textarea { resize: none; }</style>
  <!-- CSS End -->

  <!-- Javascript -->
  <script type="text/javascript" src="{{ asset('js/jquery.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
  <!-- Javascript End -->
</head>

@if (Route::is('bulletin.index'))
  <body class="bg-lgray">
@else
  <body id="login">
@endif

  @yield('header')

  @yield('content')

  @yield('footer')

  <script>
    // INPUT TYPE FILE
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

    $(window).on('load', () => {
      $("{{ session('modal') }}").modal('show');
    });
  </script>  

</body>
</html>