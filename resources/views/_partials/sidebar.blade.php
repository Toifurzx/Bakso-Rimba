 <!-- ======= Sidebar ======= -->
 <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="dashboard">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-heading">Pages</li>


      @if(Auth::user()->role === 'kasir')
      <li class="nav-item">
          <a class="nav-link collapsed" href="{{ url('kasir')}}">
          <i class="bi bi-person"></i>
          <span>Kasir</span>
        </a>
      </li>
      @endif

      @if (Auth::user()->role === 'admin')

      <li class="nav-item">
          <a class="nav-link collapsed" href="{{ url('admin')}}">
              <i class="bi bi-person"></i>
              <span>Admin</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="pages-register.html">
              <i class="bi bi-card-list"></i>
              <span>Register</span>
            </a>
          </li><!-- End Register Page Nav -->
        @endif

        @if (Auth::user()->role === 'manager')

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ url('manager')}}">
                <i class="bi bi-person"></i>
                <span>Manager</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed"  href="{{ url('manager/laporan')}}">
                <i class="bi bi-person"></i>
                <span>Laporan</span>
            </a>
        </li>
        @endif


    </ul>

  </aside><!-- End Sidebar-->
