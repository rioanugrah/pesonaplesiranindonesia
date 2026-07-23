<header id="header" class="header style-1 {{ request()->is('/') ? 'position-fixed' : null }} color-1">
    <div class="container">
        <div class="header-wrap relative w-full">
            <div class="header-ct-left flex-left z-5">
                <div class="logo flex-center" id="logo">
                    <a href="{{ route('frontend.index') }}">
                        <img src="{{ asset('frontend/assets/img/logo/logo_plesiran_black.webp') }}" width="200">
                    </a>
                </div>
            </div>
            <div class="header-ct-center flex-center z-5">
                <div class="inner-center">
                    <div class="nav-wrap">
                        <nav class="list-nav">
                            @php
                                $menus = [
                                    [
                                        'title' => 'Beranda',
                                        'link' => route('frontend.index'),
                                    ],
                                    [
                                        'title' => 'Tentang Kami',
                                        'link' => route('frontend.tentang_kami'),
                                    ],
                                ];
                            @endphp
                            <ul class="menu-nav" id="menu-nav">
                                @foreach ($menus as $menu)
                                    <li class="menu-item flex-center gap-1 h-full">
                                        <a href="{{ $menu['link'] }}" class="nav-link">{{ $menu['title'] }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="header-ct-right flex-end gap-4 z-5">
                <ul class="wrap-login-menu">
                    <li class="login">
                        <span class="icon icon-user"></span>
                        <a href="#">Login</a>
                        /
                        <a href="#">Register</a>
                    </li>
                </ul>
                <div class="toggle-mobile">
                    <span class="icon icon-list"></span>
                </div>
            </div>
        </div>
        <div class="overlay"></div>
        <div class="close-btn flex-center">
            <span class="icon-X"></span>
        </div>
        <div class="mobile-menu">
            <div class="menu-box">
                <div class="logo">
                    <a href="/">
                        <img src="{{ asset('frontend/assets/img/logo/logo_plesiran_black.webp') }}" width="200">
                    </a>
                </div>
                <div class="inner-menu">
                    @foreach ($menus as $menu)
                    <div class="nav-item">
                        <a href="{{ $menu['link'] }}" class="nav-link mb-3">
                            <span class="nav-text fw-bold fs-5">{{ $menu['title'] }}</span>
                        </a>
                    </div>
                    @endforeach
                </div>
                <div class="inner-info">
                    <h4 class="title-info">Hubungi Kami</h4>
                    <div class="list-info d-flex flex-col">
                        <div class="phone d-flex">
                            <div class="icon flex-center">
                                <img src="{{ asset('fe') }}/images/icons/phone-call.svg" alt="icon">
                            </div>
                            <div class="content">
                                <p class="label">Whatsapp Office</p>
                                <a href="tel:+6285867224494">0858-6722-4494</a><br>
                                <a href="tel:+628551333072">0855-1333-072</a>
                            </div>
                        </div>
                        <div class="email d-flex">
                            <div class="icon flex-center">
                                <img src="{{ asset('fe') }}/images/icons/mail.svg" alt="Email">
                            </div>
                            <div class="content">
                                <p class="label">Email:</p>
                                <a href="mailto:marketing@plesiranindonesia.com">marketing@plesiranindonesia.com</a>
                            </div>
                        </div>
                        <div class="address d-flex">
                            <div class="icon flex-center">
                                <img src="{{ asset('fe') }}/images/icons/place.svg" alt="Address">
                            </div>
                            <div class="content">
                                <p class="label">Office</p>
                                <a href="#">Jl. Raya Tlogowaru No.3</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
