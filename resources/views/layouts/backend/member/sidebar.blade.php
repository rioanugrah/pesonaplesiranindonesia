<div class="startbar d-print-none">

    <div class="brand">
        <a class="logo">
            <span>
                <img src="{{ asset('backend') }}/assets/images/logo-sm.png" class="logo-sm">
            </span>
            <span class="">
                <img src="{{ asset('backend') }}/assets/logo/logo_plesiran_new_white.png" class="logo-lg logo-light" width="150" style="height: 5%">
                <img src="{{ asset('backend') }}/assets/logo/logo_plesiran_black.webp" class="logo-lg logo-dark">
                {{-- <img src="{{ asset('backend') }}/assets/logo/logo_plesiran_black.webp" class="logo-lg logo-dark" width="150" style="height: 5%"> --}}
            </span>
        </a>
    </div>


    <div class="startbar-menu">
        <div class="startbar-collapse" id="startbarCollapse" data-simplebar>
            <div class="d-flex align-items-start flex-column w-100">

                <ul class="navbar-nav mb-auto w-100">
                    <li class="menu-label mt-2">
                        <span>Main</span>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('member.dashboard') }}">
                            <i class="iconoir-home-alt menu-icon"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('member.trip') }}">
                            <i class="iconoir-home-alt menu-icon"></i>
                            <span>Trip</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="iconoir-home-alt menu-icon"></i>
                            <span>Komisi</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="iconoir-home-alt menu-icon"></i>
                            <span>Verifikasi Akun</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
