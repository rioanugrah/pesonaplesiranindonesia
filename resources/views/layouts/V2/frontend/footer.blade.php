<footer class="footer">
    <div class="top-footer">
        <div class="container">
            <div class="content-top-footer">
                <div class="footer-logo">
                    <a href="{{ route('frontend.index') }}">
                        <img src="{{ asset('frontend/assets/img/logo/logo_plesiran_new_white.png') }}">
                    </a>
                </div>
                <div class="footer-socials flex-center">
                    <span class="text-social">Follow Us:</span>
                    <ul class="list-social flex-center">
                        <li>
                            <a href="https://www.instagram.com/pesonaplesiranid.official" aria-label="Instgram Pesona Plesiran Indonesia"><span
                                    class="box-icon icon-instgram w-44 social"></span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="inner-footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="widget-box">
                        <div class="widget-title mb-6">
                            <div class="text-white h4">Kontak Kami</div>
                        </div>
                        <div class="widget-info">
                            <div class="widget-contact">
                                <div class="icon">
                                    <img src="{{ asset('fe') }}/images/icons/map.svg" alt="map">
                                </div>
                                <div class="content">
                                    <span>Office</span>
                                    <p>Jl. Raya Tlogowaru No.3</p>
                                </div>
                            </div>
                            <div class="widget-contact">
                                <div class="icon">
                                    <img src="{{ asset('fe') }}/images/icons/phone-call.svg" alt="phone">
                                </div>
                                <div class="content">
                                    <span>Whatsapp Office</span>
                                    <p>0858-6722-4494</p>
                                    <p>0855-1333-072</p>
                                </div>
                            </div>
                            <div class="widget-contact">
                                <div class="icon">
                                    <img src="{{ asset('fe') }}/images/icons/mail.svg" alt="mail">
                                </div>
                                <div class="content">
                                    <span>Email</span>
                                    <p>marketing@plesiranindonesia.com</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="widget-box">
                        <div class="widget-title mb-6">
                            <div class="text-white h4">Perusahaan</div>
                        </div>
                        <div class="widget-tour">
                            <ul class="tour-list tf-grid-layout tf-col-2 gap-list">
                                <li class="tour-item">
                                    <a href="{{ route('frontend.tentang_kami') }}">
                                        <span class="icon icon-CaretRight"></span>
                                        Tentang Kami
                                    </a>
                                </li>
                                <li class="tour-item">
                                    <a href="#">
                                        <span class="icon icon-CaretRight"></span>
                                        Kontak Kami
                                    </a>
                                </li>
                                <li class="tour-item">
                                    <a href="#">
                                        <span class="icon icon-CaretRight"></span>
                                        Kebijakan Privasi
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bottom-footer">
        <div class="container">
            <div class="content-bottom">
                <div class="copy-right">
                    Copyright © 2026 <a href="{{ route('frontend.index') }}" class="fw-bold">Pesona Plesiran Indonesia</a>. Powered By IT
                </div>
            </div>
        </div>
    </div>
</footer>
