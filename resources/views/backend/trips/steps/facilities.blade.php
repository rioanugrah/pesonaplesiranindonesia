<div class="mb-3 row" id="repeater_facilities">
    <label for="" class="col-2 col-form-label">Facilities</label>
    <div class="col-10">
        <div data-repeater-list="trip_facilities">
            <div data-repeater-item>
                <div class="row">
                    <div class="col-md-10">
                        <div class="mb-3">
                            <input type="text" name="facilities" class="form-control" placeholder="Facilities">
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