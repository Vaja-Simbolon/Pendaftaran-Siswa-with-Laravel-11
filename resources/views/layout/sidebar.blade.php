 <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
      <ul class="nav side-menu">
        <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            <li><a href="{{ route('home') }}">Dashboard</a></li>
          </ul>
        </li>
        <li><a><i class="fa fa-edit"></i> Forms <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            <li><a href="{{ route('pendaftaran.tampil') }}">Pendaftaran</a></li>
          </ul>
        </li>
        <li><a><i class="fa fa-table"></i> Data <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            <li><a href="{{ route('mahasiswa.tampil') }}">Mahasiswa Baru</a></li>
            <li><a href="{{ route('user.tampil') }}">User</a></li>
          </ul>
        </li>
        <li><a href="{{ route('login.keluar') }}"><i class="fa fa-sign-out pull-left"></i> Logout</a>
        </li>
      </ul>
    </div>
  </div>