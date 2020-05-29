<section class="sidebar">
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li>
          <a href="index.php"><i class="fa fa-dashboard"></i> 
            <span>Dashboard</span>
          </a>
        </li>
      </ul>
</section>

@if (Route::is('admin'))
  <script type="text/javascript" defer>
    
    document.querySelector('section.sidebar ul.sidebar-menu li').classList.toggle('active');

  </script>
@endif