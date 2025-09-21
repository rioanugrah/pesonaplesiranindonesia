<footer class="footer-section fix bg-cover"
    style="background-image: url({{ asset('frontend/') }}/assets/img/footer/footer-bg.jpg);">
    <div class="container">
        <div class="footer-widget-wrapper-new">
            <div class="row">
                <div class="col-xl-4 col-lg-5 col-md-8 col-sm-6 wow fadeInUp wow" data-wow-delay=".2s">
                    <div class="single-widget-items text-center">
                        <div class="widget-head">
                            <a href="{{ route('frontend.index') }}">
                                <img src="{{ asset('frontend/assets/img/logo/logo_plesiran_new_white.png') }}" alt="Logo Pesona Plesiran Indonesia">
                            </a>
                        </div>
                        <div class="footer-content">
                            <h3>Berlangganan Buletin</h3>
                            <p>Dapatkan Penawaran dan Pembaruan Terbaru Kami</p>
                            <div class="footer-input">
                                <input type="email" id="email2" placeholder="Your email address">
                                <button class="newsletter-btn theme-btn" type="submit">
                                    Langganan <i class="fa-sharp fa-regular fa-arrow-right"></i>
                                </button>
                            </div>
                            <div class="social-icon d-flex align-items-center justify-content-center">
                                <a href="https://www.instagram.com/plesiranmalang.id/"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 ps-lg-5 wow fadeInUp wow" data-wow-delay=".4s">
                    <div class="single-widget-items">
                        <div class="widget-head">
                            <h4>Tautan Cepat</h4>
                        </div>
                        <ul class="list-items">
                            <li>
                                <a href="#">
                                    Beranda
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Tentang Kami
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Trip Wisata
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Blog
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Kontak Kami
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 ps-xl-5 wow fadeInUp wow" data-wow-delay=".6s">
                    <div class="single-widget-items">
                        <div class="widget-head">
                            <h4>Kontak Kami</h4>
                        </div>
                        <div class="contact-info">
                            <div class="contact-items">
                                <div class="icon">
                                    <i class="fa-regular fa-location-dot"></i>
                                </div>
                                <div class="content">
                                    <h6>Jl. Raya Tlogowaru No. 3, Tlogowaru, <br> Kedungkandang, Malang, Jawa Timur
                                    </h6>
                                </div>
                            </div>
                            <div class="contact-items">
                                <div class="icon">
                                    <i class="fa-regular fa-envelope"></i>
                                </div>
                                <div class="content">
                                    <h6>
                                        <a href="mailto:contact@plesiranindonesia.com">contact@plesiranindonesia.com</a>
                                    </h6>
                                </div>
                            </div>
                            <div class="contact-items">
                                <div class="icon">
                                    <i class="fa-solid fa-phone"></i>
                                </div>
                                <div class="content">
                                    <h6>
                                        <a href="tel:+6285867224494">0858-6722-4494</a>
                                    </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="footer-wrapper">
                <p class="wow fadeInUp" data-wow-delay=".3s">
                    Copyright ©{{ '2020 - ' . date('Y') }} <span>Pesona Plesiran Indonesia,</span> All Rights
                    Reserved.
                </p>
                <ul class="bottom-list wow fadeInUp" data-wow-delay=".5s">
                    <li><a href="{{ route('frontend.kebijakanprivasi') }}" class="text-white">Kebijakan Privasi</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
