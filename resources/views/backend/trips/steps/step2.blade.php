<div class="mb-3 row" id="repeater_trip_extra">
    <label for="" class="col-2 col-form-label">Trip Extra</label>
    <div class="col-10">
        <div data-repeater-list="extra">
            <div data-repeater-item>
                <div class="row">
                    <div class="col-md-10">
                        <div class="row">
                            <div class="col-md-9">
                                <div class="mb-3">
                                    <input type="text" name="extra" class="form-control" placeholder="Trip Extra">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <input type="number" name="price" min="0" class="form-control" placeholder="Extra Price">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="mb-3">
                            <button type="button" data-repeater-delete class="btn btn-danger">Delete</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button type="button" class="btn btn-success" data-repeater-create>Tambah Baru</button>
    </div>
</div>
