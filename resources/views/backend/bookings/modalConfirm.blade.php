<div class="modal fade modalConfirm" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title m-0" id="exampleModalCenterTitle">Konfirmasi Booking</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="form-confirm" method="post">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        {{-- <div class="col-lg-3 text-center align-self-center">
                            <img src="assets/images/extra/card/btc.png" alt="" class="img-fluid">
                        </div>
                        <div class="col-lg-9">
                            <h5>Crypto Market Services</h5>
                            <span class="badge bg-light text-dark">Disable Services</span>
                            <small class="text-muted ms-2">07 Oct 2024</small>
                            <ul class="mt-2 mb-0">
                                <li>Lorem Ipsum is dummy text.</li>
                                <li>It is a long established reader.</li>
                                <li>Contrary to popular belief, Lorem simply.</li>
                            </ul>
                        </div> --}}
                        <div class="mb-3 row">
                            <label class="col-sm-4">Kode Booking</label>
                            <div class="col-sm-8" id="confirm-booking-code">
                            </div>
                            <input type="hidden" name="confirm_booking_code" id="confirm-code">
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-4">Nama Booking</label>
                            <div class="col-sm-8" id="confirm-booking-name">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-4">Nama Pemesan</label>
                            <div class="col-sm-8" id="confirm-booking-user">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-4">Email Booking</label>
                            <div class="col-sm-8" id="confirm-booking-email">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-4">Email Booking</label>
                            <div class="col-sm-8" id="confirm-booking-phone">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-4">Total Pemesan</label>
                            <div class="col-sm-8">
                                <div>Dewasa : <span id="confirm-booking-adult"></span> pax</div>
                                <div>Anak - Anak : <span id="confirm-booking-child"></span> pax</div>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-4">Total Harga</label>
                            <div class="col-sm-8" id="confirm-booking-total-price">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-4">Status Pembayaran</label>
                            <div class="col-sm-8" id="confirm-booking-status-payment">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-4">Status Konfirmasi</label>
                            <div class="col-sm-8">
                                <select name="konfirmasi" class="form-control" id="">
                                    <option value="">-- Pilih Konfirmasi --</option>
                                    <option value="Confirm">Diterima</option>
                                    <option value="Denied">Tolak</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
