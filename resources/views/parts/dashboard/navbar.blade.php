<nav class="navbar navbar-expand-lg navbar-absolute navbar-transparent">
    <div class="container">
        <div class="navbar-wrapper">
            <div class="navbar-toggle d-inline">
                <button type="button" class="navbar-toggler">
                    <span class="navbar-toggler-bar bar1"></span>
                    <span class="navbar-toggler-bar bar2"></span>
                    <span class="navbar-toggler-bar bar3"></span>
                </button>
            </div>
            <a class="text-white" href="javascript:void(0)" style="font-size: 1.5rem;">لوحة التحكم</a>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
        </button>
        <div class="collapse navbar-collapse" id="navigation">
            <ul class="navbar-nav  mr-auto">

                {{-- <li class="dropdown nav-item">
                    <a href="javascript:void(0)" class="dropdown-toggle nav-link" data-toggle="dropdown">
                        <div class="notification d-none d-lg-block d-xl-block"></div>
                        <i class="tim-icons icon-sound-wave"></i>
                        <p class="d-lg-none">
                            Notifications
                        </p>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-right dropdown-navbar">
                        <li class="nav-link"><a href="#" class="nav-item dropdown-item">Mike John responded to
                                your email</a></li>
                        <li class="nav-link"><a href="javascript:void(0)" class="nav-item dropdown-item">You have 5 more
                                tasks</a></li>
                        <li class="nav-link"><a href="javascript:void(0)" class="nav-item dropdown-item">Your friend
                                Michael is in town</a></li>
                        <li class="nav-link"><a href="javascript:void(0)" class="nav-item dropdown-item">Another
                                notification</a></li>
                        <li class="nav-link"><a href="javascript:void(0)" class="nav-item dropdown-item">Another one</a>
                        </li>
                    </ul>
                </li> --}}
                <li class="dropdown nav-item">
                    <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                        <div class="photo">
                            <img src="{{ asset('dashboard/assets/img/anime3.png') }}" alt="Profile Photo">
                        </div>
                        <b class="caret d-none d-lg-block d-xl-block"></b>
                        <p class="d-lg-none">
                            Log out
                        </p>
                    </a>
                    <ul class="dropdown-menu dropdown-navbar">
                        <li class="nav-link">
                            <a href="javascript:void(0)" @disabled(true)
                                class="nav-item dropdown-item" style="font-size: 0.9rem; font-weight: bold;">الصفحة الشخصية</a>
                        </li>

                        <li class="nav-link">
                            <a href="javascript:void(0)" @disabled(true)
                                class="nav-item dropdown-item" style="font-size: 0.9rem; font-weight: bold;">الإعدادت</a>
                        </li>

                        <li class="dropdown-divider"></li>

                        <li class="nav-link">
                            <a href="{{ route('web.logout') }}" class="nav-item dropdown-item" style="font-size: 0.9rem; font-weight: bold;">تسجيل الخروج </a>
                        </li>
                    </ul>
                </li>
                <li class="separator d-lg-none"></li>
            </ul>
        </div>
    </div>
</nav>
