<div class="fix-area">
    <div class="offcanvas__info">
        <div class="offcanvas__wrapper">
            <div class="offcanvas__content">
                <div class="offcanvas__top mb-5 d-flex justify-content-between align-items-center">
                    <div class="offcanvas__logo">
                        <a href="{{ route('frontend.index') }}">
                            <img src="{{ asset('frontend/assets/') }}/img/logo/logo_plesiran_black.webp">
                        </a>
                    </div>
                    <div class="offcanvas__close">
                        <button>
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="mobile-menu fix mb-3"></div>
                <div class="offcanvas__contact">
                    <h4>Kontak Kami</h4>
                    <ul>
                        <li class="d-flex align-items-center">
                            <div class="offcanvas__contact-icon">
                                <i class="fal fa-map-marker-alt"></i>
                            </div>
                            <div class="offcanvas__contact-text">
                                <a target="_blank" href="#">Jl. Raya Tlogowaru No. 3, Tlogowaru,
                                    Kedungkandang, Malang, Jawa Timur</a>
                            </div>
                        </li>
                        <li class="d-flex align-items-center">
                            <div class="offcanvas__contact-icon mr-15">
                                <i class="fal fa-envelope"></i>
                            </div>
                            <div class="offcanvas__contact-text">
                                <a href="mailto:contact@plesiranindonesia.com"><span
                                        class="mailto:contact@plesiranindonesia.com">contact@plesiranindonesia.com</span></a>
                            </div>
                        </li>
                        <li class="d-flex align-items-center">
                            <div class="offcanvas__contact-icon mr-15">
                                <i class="fal fa-clock"></i>
                            </div>
                            <div class="offcanvas__contact-text">
                                <a target="_blank" href="#">Senin - Sabtu, 09.00 - 18.00</a>
                            </div>
                        </li>
                        <li class="d-flex align-items-center">
                            <div class="offcanvas__contact-icon mr-15">
                                <i class="far fa-phone"></i>
                            </div>
                            <div class="offcanvas__contact-text">
                                <a href="tel:+6285867224494">0858-6722-4494</a>
                            </div>
                        </li>
                    </ul>
                    <div class="header-button mt-4">
                        <a href="#" class="theme-btn"> Login / Register <i
                                class="fa-sharp fa-regular fa-arrow-right"></i></a>
                    </div>
                    <div class="social-icon d-flex align-items-center">
                        <a href="https://www.instagram.com/pesonaplesiranid.official/"><i class="fab fa-instagram"></i></a>
                        <a href="https://www.instagram.com/plesiranmalang.id/"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="offcanvas__overlay"></div>

<header class="header-section-10">
    <div class="header-top-section-new">
        <div class="container-fluid">
            <div class="header-top-wrapper-new">
                <div class="social-icon d-flex align-items-center">
                    <span>Follow Us</span>
                    <a href="https://www.instagram.com/pesonaplesiranid.official/"><i class="fab fa-instagram"></i></a>
                    <a href="https://www.instagram.com/plesiranmalang.id/"><i class="fab fa-instagram"></i></a>
                </div>
                <ul class="top-right">
                    <li>
                        <i class="fa-regular fa-envelope"></i>
                        <a href="mailto:contact@plesiranindonesia.com">
                            contact@plesiranindonesia.com</a>
                    </li>
                    <li>
                        <i class="fa-regular fa-clock"></i>
                        Senin - Sabtu, 09.00 - 18.00
                    </li>
                    <li>
                        <i class="fa-solid fa-phone"></i>
                        <a href="tel:+6285867224494">0858-6722-4494</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div id="header-sticky" class="header-11">
        <div class="container-fluid">
            <div class="mega-menu-wrapper">
                <div class="header-main">
                    <div class="logo">
                        <a href="{{ route('frontend.index') }}" class="header-logo">
                            <img src="{{ asset('frontend/') }}/assets/img/logo/logo_plesiran_new_white.png" width="250">
                        </a>
                        <div class="logo-2">
                            <a href="{{ route('frontend.index') }}">
                                <img src="{{ asset('frontend/') }}/assets/img/logo/logo_plesiran_black.webp" alt="" width="200">
                            </a>
                        </div>
                    </div>
                    <div class="header-right d-flex justify-content-end align-items-center">
                        <div class="mean__menu-wrapper">
                            <div class="main-menu">
                                <nav id="mobile-menu">
                                    @include('layouts.frontend.menu')
                                </nav>
                            </div>
                        </div>
                        <a href="{{ route('login') }}" class="theme-btn"> Login / Register <i
                                class="fa-sharp fa-regular fa-arrow-right"></i></a>
                        <div class="header__hamburger d-xl-none my-auto">
                            <div class="sidebar__toggle">
                                <i class="fas fa-bars"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
