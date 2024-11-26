<div class="top_nav">
    <div class="nav_menu">
        <div class="nav toggle">
            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
        </div>
        <nav class="nav navbar-nav">
            <ul class=" navbar-right">
                <li class="nav-item dropdown open" style="padding-left: 15px;">
                    <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown"
                        data-toggle="dropdown" aria-expanded="false">
                        @if (auth()->check())
                            @if (auth()->user()->photo)
                                <img src="{{ asset('storage/photos/' . auth()->user()->photo) }}">
                                {{ auth()->user()->name }}
                            @else
                            <img src="{{ asset('assets/images/user.jpg') }}"> {{ 'Guest User' }}
                            @endif
                        @else
                            <img src="{{ asset('img/profile.png') }}">
                            {{ 'User Not Empty' }}

                        @endif
                    </a>
                    <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('profile.index') }}">Profil</a>
                        <a class="dropdown-item" href="javascript:;">
                            <span>Settings</span>
                        </a>
                        <a class="dropdown-item" href="javascript:;">Help</a>
                        <a class="dropdown-item" href="{{ route('login.keluar') }}"><i
                                class="fa fa-sign-out pull-right"></i> Log Out</a>
                    </div>
                </li>
                <li role="presentation" class="nav-item dropdown open">
                    <a href="javascript:;" class="dropdown-toggle info-number" id="navbarDropdown1"
                        data-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-envelope-o"></i>
                        <span class="badge bg-red">1</span>
                    </a>
                    <ul class="dropdown-menu list-unstyled msg_list" role="menu" aria-labelledby="navbarDropdown1">
                        <li class="nav-item">
                            <a class="dropdown-item">
                                <span class="image"><img src="{{ asset('assets/images/user.jpg') }}"
                                        alt="Profile Image" /></span>
                                <span>
                                    <span>{{ auth()->user()->name }}</span>
                                    <span class="time">3 mins ago</span>
                                </span>
                                <span class="message">
                                    Universitas Methodist Indonesia adalah salah 1 kampus terbaik di Kota Medan terutama
                                    di Fakultas Ilmu Komputer
                                </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <div class="text-center">
                                <a class="dropdown-item">
                                    <strong>See All Alerts</strong>
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</div>
