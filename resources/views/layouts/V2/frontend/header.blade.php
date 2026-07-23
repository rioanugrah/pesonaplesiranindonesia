<header id="header" class="header style-2 position-fixed color-2">
    <div class="container-2">
        <div class="header-wrap relative w-full">
            <div class="header-ct-left flex-left z-5">
                <div class="logo flex-center" id="logo">
                    <a href="{{ route('frontend.index') }}">
                        <img src="{{ asset('frontend/assets/img/logo/logo_plesiran_new_white.png') }}" width="200">
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
                                        'title' => 'Trip',
                                        'link' => '-',
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
            <div class="header-ct-right flex-end gap-4 z-5 ">
                <ul class="wrap-login-menu color-ic">
                    <li class="search">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#modalSearch"><span
                                class="icon icon-search"></span></a>
                    </li>
                    <li class="heart">
                        <a href="./wishlist.html"><span class="icon icon-heart"></span></a>
                    </li>
                    <li class="login">
                        <span class="icon icon-user"></span>
                        <a href="#" data-bs-toggle="modal" data-bs-target="#modalLogin">Login</a>
                        /
                        <a href="#" data-bs-toggle="modal" data-bs-target="#modalRegister">Register</a>
                    </li>
                </ul>
                <div class="toggle-mobile">
                    <span class="icon icon-list text-white"></span>
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
                        <img src="{{ asset('fe/') }}/images/logo/logo.svg" alt="Logo">
                    </a>
                </div>
                <div class="inner-menu">
                    <div class="nav-item">
                        <a href="/" class="mobile-dropdown">
                            <span class="nav-text"> Home </span>
                            <span class="mb-icon icon-CaretDown"></span>
                        </a>
                        <ul class="mb-sub-menu">
                            <li>
                                <a href="/" class="sub-link"> HomePage 01 </a>
                            </li>
                            <li>
                                <a href="./homepage2.html" class="sub-link">
                                    HomePage 02
                                </a>
                            </li>
                            <li>
                                <a href="./homepage3.html" class="sub-link">
                                    HomePage 03
                                </a>
                            </li>
                            <li>
                                <a href="./homepage4.html" class="sub-link">
                                    HomePage 04
                                </a>
                            </li>
                            <li>
                                <a href="./homepage5.html" class="sub-link">
                                    HomePage 05
                                </a>
                            </li>
                            <li>
                                <a href="./home-video-background.html" class="sub-link">
                                    Home Video background
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="nav-item">
                        <a href="/" class="mobile-dropdown">
                            <span class="nav-text"> Tour List </span>
                            <span class="mb-icon icon-CaretDown"></span>
                        </a>
                        <ul class="mb-sub-menu">
                            <li class="sub-item">
                                <a href="#" class="sub-link has-sub">
                                    Layout
                                    <span class="sub-icon icon-CaretDown"></span>
                                </a>
                                <ul class="mb-sub-sub-menu">
                                    <li>
                                        <a href="./gridstylefullwidth.html">Grid Style – Full Width</a>
                                    </li>
                                    <li>
                                        <a href="./gridsidebarleft.html">Grid Style – Sidebar Left</a>
                                    </li>
                                    <li>
                                        <a href="./gridsidebarright.html">Grid Style – Sidebar Right</a>
                                    </li>
                                    <li>
                                        <a href="./liststylefullwidth.html">List Style – Full Width</a>
                                    </li>
                                    <li>
                                        <a href="./listsidebarleft.html">List Style – Sidebar Left</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="sub-item">
                                <a href="#" class="sub-link has-sub">
                                    Feature
                                    <span class="sub-icon icon-CaretDown"></span>
                                </a>
                                <ul class="mb-sub-sub-menu">
                                    <li>
                                        <a href="./listtopmap.html">List Tours - Top Map</a>
                                    </li>
                                    <li>
                                        <a href="./listtopmap01.html">List Tours - Top Map 01</a>
                                    </li>
                                    <li>
                                        <a href="./gridtourhalfmapright.html">Grid Tour - Haft Map Right</a>
                                    </li>
                                    <li>
                                        <a href="./listhalfmapright.html">List Tours - Haft Map Right</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="sub-item">
                                <a href="#" class="sub-link has-sub">
                                    Tour Styles
                                    <span class="sub-icon icon-CaretDown"></span>
                                </a>
                                <ul class="mb-sub-sub-menu">
                                    <li><a href="./liststyle.html">List Style</a></li>
                                    <li><a href="./gridstyle01.html">Grid Style 01</a></li>
                                    <li><a href="./gridstyle02.html">Grid Style 02</a></li>
                                </ul>
                            </li>
                            <li class="sub-item">
                                <a href="#" class="sub-link has-sub">
                                    Tour Details
                                    <span class="sub-icon icon-CaretDown"></span>
                                </a>
                                <ul class="mb-sub-sub-menu">
                                    <li>
                                        <a href="./toursingle1.html">Tour Detail Style 01</a>
                                    </li>
                                    <li>
                                        <a href="./toursingle2.html">Tour Detail Style 02</a>
                                    </li>
                                    <li>
                                        <a href="./toursingle3.html">Tour Detail Style 03</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="nav-item">
                        <a href="/" class="mobile-dropdown">
                            <span class="nav-text"> Destination </span>
                            <span class="mb-icon icon-CaretDown"></span>
                        </a>
                        <ul class="mb-sub-menu">
                            <li>
                                <a href="./destination1.html" class="sub-link">
                                    Destination Style 01
                                </a>
                            </li>
                            <li>
                                <a href="./destination2.html" class="sub-link">
                                    Destination Style 02
                                </a>
                            </li>
                            <li>
                                <a href="./destinationdetail.html" class="sub-link">
                                    Destination Details
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="nav-item">
                        <a href="/" class="mobile-dropdown">
                            <span class="nav-text"> Pages </span>
                            <span class="mb-icon icon-CaretDown"></span>
                        </a>
                        <ul class="mb-sub-menu">
                            <li>
                                <a href="./aboutus.html" class="sub-link"> About Us </a>
                            </li>
                            <li>
                                <a href="./teammember.html" class="sub-link">
                                    Team Member
                                </a>
                            </li>
                            <li>
                                <a href="./asqquestion.html" class="sub-link">
                                    Frequently Asked Questions
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="nav-item">
                        <a href="/" class="mobile-dropdown">
                            <span class="nav-text"> Blog </span>
                            <span class="mb-icon icon-CaretDown"></span>
                        </a>
                        <ul class="mb-sub-menu">
                            <li>
                                <a href="/bloglist.html" class="sub-link"> Blog List </a>
                            </li>
                            <li>
                                <a href="/bloggrid.html" class="sub-link"> Blog Grid </a>
                            </li>
                            <li>
                                <a href="/blogdetail.html" class="sub-link">
                                    Blog Detail
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="nav-item">
                        <a href="./contactus.html" class="mobile-dropdown">
                            <span class="nav-text"> Contact Us </span>
                        </a>
                    </div>
                </div>
                <div class="inner-info">
                    <h4 class="title-info">Need help ?</h4>
                    <div class="list-info d-flex flex-col">
                        <div class="phone d-flex">
                            <div class="icon flex-center">
                                <img src="{{ asset('fe/') }}/images/icons/phone-call.svg" alt="icon">
                            </div>
                            <div class="content">
                                <p class="label">Toll-free call</p>
                                <a href="tel:">(229) 555-0109</a>
                            </div>
                        </div>
                        <div class="email d-flex">
                            <div class="icon flex-center">
                                <img src="{{ asset('fe/') }}/images/icons/mail.svg" alt="Email">
                            </div>
                            <div class="content">
                                <p class="label">Email:</p>
                                <a href="mailto:example@gmail.com">example@gmail.com</a>
                            </div>
                        </div>
                        <div class="address d-flex">
                            <div class="icon flex-center">
                                <img src="{{ asset('fe/') }}/images/icons/place.svg" alt="Address">
                            </div>
                            <div class="content">
                                <p class="label">Shop Address:</p>
                                <a href="#">2118 Thornridge Cir. Syracuse, Connecticut 35624</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>