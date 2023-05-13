<style>
    #styd {
        margin-right: 15px;
        font-weight: bold;
        background: #01a17f;
        color: rgb(255, 255, 255);

    }

    #loginbuttonnav {
        background: #01a17f;
        font-weight: bold;
        color: rgb(0, 0, 0);
        box-shadow: 0px 0px 4px 3px;
        border-radius: -1px;
        border-top-left-radius: 0;
        border-top-right-radius: 0;
        border-bottom-right-radius: 0;
        border-bottom-left-radius: 0;
    }

    #navheader {
        background: linear-gradient(165deg, #0060a0 0%, rgb(1, 142, 136) 40%, rgb(1, 127, 144) 53%, #01a17f), #01a17f;
    }

    #navsection {
        background: linear-gradient(167deg, #00629f, #019e81 100%), rgb(255, 255, 255);
        padding-bottom: 0px;
        padding-top: 0px;
    }

    #parentseaction {
        background: rgb(255, 255, 255);
        padding: 0px;
    }
</style>


<section class="register-photo" id="parentseaction">
    <div class="container">
        <section class="register-photo" id="navsection">

            <nav class="navbar navbar-light navbar-expand-lg navigation-clean-search" id="navheader">
                <div class="container">

                    @guest
                        @if (!request()->is('login'))
                            <div class="collapse navbar-collapse d-xl-flex justify-content-xl-start" id="navcol-1">
                                <ul class="navbar-nav">
                                    <a class="btn btn-dark action-button" href="{{ route('web.login') }}"
                                        id="loginbuttonnav">تسجيل الدخول</a>
                                </ul>
                            </div>
                        @endif
                    @endguest

                    @auth
                        <div class="collapse navbar-collapse d-xl-flex justify-content-xl-start" id="navcol-1">
                            <ul class="navbar-nav">
                                <li class="nav-item dropdown">
                                    <a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown"
                                        href="#">
                                        <img src="{{ asset('assets/img/user.png') }}" width="40" height="40"
                                            class="rounded-circle">
                                        <small class="text-white">{{ auth()->user()->name }}</small>
                                    </a>

                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{ route('web.logout') }}">تسجيل الخروج</a>
                                    </div>
                                </li>
                            </ul>
                        </div>

                        {{-- <ul class="navbar-nav">
                                <a class="btn btn-dark action-button" href="{{ route('web.logout') }}"
                                    id="loginbuttonnav">تسجيل الخروج</a>
                            </ul> --}}
                    @endauth


                    <div class="collapse navbar-collapse d-xl-flex justify-content-xl-end" id="navcol-2"
                        style="margin-right: 0;">
                        <ul class="navbar-nav ms-auto">

                            <a class="nav-link d-xl-flex" id="styd" href="{{ route('web.home') }}#contactus">تواصل
                                معنا</a>

                            <a class="nav-link d-xl-flex " id="styd" href="{{ route('web.home') }}#whoweare">من
                                نحن</a>

                            <a class="nav-link d-xl-flex " id="styd"
                                href="{{ route('web.home') }}#services">خدماتنا</a>

                            <a class="nav-link d-xl-flex " id="styd" href="{{ route('web.home') }}"
                                style="box-shadow: 0px 0px 6px;">الرئيسية
                            </a>

                        </ul>
                    </div>

                    <a class="navbar-brand" href="#">
                        <img class="img-fluid  img-thumbnail rounded" src="{{ asset('assets/img/logo.jpeg') }}" width="100" loading="lazy">
                    </a>

                    <button data-bs-target="#navcol-2" data-bs-toggle="collapse" class="navbar-toggler">
                        <span class="visually-hidden">Toggle navigation</span>
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
            </nav>
        </section>
    </div>
</section>
