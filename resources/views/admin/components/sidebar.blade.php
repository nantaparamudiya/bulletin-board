<section class="sidebar">
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li>
          <a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> 
            <span>Dashboard</span>
          </a>
        </li>
        <li>
          <a href="{{ route('gallery.create') }}"><i class="fa fa-photo"></i>
            <span>Gallery</span>
          </a>
        </li>
        <li>
          <a href="{{ route('admin.contact') }}"><i class="fa fa-envelope"></i>
            <span>Contact</span>
          </a>
        </li>
      </ul>
</section>

@if (Route::is('admin'))
  <script type="text/javascript" defer>
    
    document.querySelector('section.sidebar ul.sidebar-menu li').classList.toggle('active');

  </script>
@endif