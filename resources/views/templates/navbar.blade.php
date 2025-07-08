<header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

        <a href="/" class="logo d-flex align-items-center">
            <!-- Uncomment the line below if you also wish to use an image logo -->
            <!-- <img src="assets/img/logo.png" alt=""> -->
            <h1 class="sitename">
                @php
                    $setting = App\Models\Setting\Setting::first();
                @endphp

                {{ $setting->site_name ?? ''}}
            </h1> <span></span>
        </a>

        <nav id="navmenu" class="navmenu">
            <ul>
                <li>
                    <a href="{{ route('index') }}" class="{{ Request::routeIs('index') ? 'active' : '' }}"
                        id="home-link">Home</a>
                </li>
                <li>
                    <a href="{{ route('aboutUs.index') }}"
                        class="{{ Request::routeIs('aboutUs.index') ? 'active' : '' }}">About</a>
                </li>

                <li>
                    <a href="{{ Request::is('/') ? '#services' : route('index', '#services') }}"
                        class="{{ Request::is('/') ? 'active' : '' }}" id="services-link">Services</a>
                </li>

                <li class="dropdown"><a href="#">Konstruksi dan Pengelolaan<span></span> <i
                            class="bi bi-chevron-down toggle-dropdown"></i></a>
                    <ul>
                        <li><a href="{{ route('calculator') }}">Perhitungan</a></li>
                        @if (Auth::user() != null)

                            <li class="dropdown"><a href="#"><span>Proyek</span> <i
                                        class="bi bi-chevron-down toggle-dropdown"></i></a>
                                <ul>
                                    <li><a href="{{ route('project.notStarted') }}">Belum berjalan</a></li>
                                    <li><a href="{{ route('project.ongoing') }}">Sedang Berjalan</a></li>
                                    <li><a href="{{ route('project.finish') }}">Selesai</a></li>
                                </ul>
                            </li>

                        @endif
                    </ul>
                </li>

                <li><a href="{{route('contactUs.index')}}">Contact</a></li>
                @if (Auth::user() == null)
                    <li class="p-2 btn btn-warning"><a href="{{ route('login-area.index') }}" style="color:white;">Masuk Kustomer Area</a></li>

                @else
                    <li>
                        <form action="{{ route('login-area.logout') }}" method="post" style="display: inline;">
                            @csrf
                            <button type="submit" class="btn btn-warning text-start text-decoration-none"
                                style="color:white;margin-left:7px;">
                                Logout
                            </button>
                        </form>
                    </li>
                @endif
            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>

    </div>
</header>