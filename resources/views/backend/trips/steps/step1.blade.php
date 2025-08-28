<div class="mb-3 row">
    <label for="" class="col-2 col-form-label">Upload Images</label>
    <div class="col-10">
        <input type="file" name="trip_images" class="form-control">
    </div>
</div>
<div class="mb-3 row">
    <label for="" class="col-2 col-form-label">Trip Name</label>
    <div class="col-10">
        <input type="text" name="trip_name" class="form-control" placeholder="Trip Name" value="{{ old('trip_name') }}">
    </div>
</div>
<div class="mb-3 row">
    <label for="" class="col-2 col-form-label">Trip Category</label>
    <div class="col-10">
        <select name="trip_category" class="form-control" id="">
            <option value="">-- Pilih Category --</option>
            <option value="O" {{ old('trip_category') == 'O' ? 'selected' : null }}>Open Trip</option>
            <option value="P" {{ old('trip_category') == 'P' ? 'selected' : null }}>Private Trip</option>
        </select>
    </div>
</div>
<div class="mb-3 row">
    <label for="" class="col-2 col-form-label">Description</label>
    <div class="col-10">
        <textarea class="form-control" name="trip_description" placeholder="Trip Description" id="editor">{{ old('trip_description') }}</textarea>
    </div>
</div>
<div class="mb-3 row">
    <label for="" class="col-2 col-form-label">Trip Price</label>
    <div class="col-10">
        <input type="number" name="trip_price" min="0" placeholder="Trip Price" class="form-control" value="{{ old('trip_price') }}">
    </div>
</div>
<div class="mb-3 row" id="repeater_experience">
    <label for="" class="col-2 col-form-label">Experience</label>
    <div class="col-10">
        <div data-repeater-list="experience">
            <div data-repeater-item>
                <div class="row">
                    <div class="col-md-10">
                        <div class="mb-3">
                            <input type="text" name="experience" class="form-control" placeholder="Experience">
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
<div class="mb-3 row" id="repeater_facilities">
    <label for="" class="col-2 col-form-label">Facilities</label>
    <div class="col-10">
        <div data-repeater-list="facilities">
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
<div class="mb-3 row" id="repeater_tour_plan">
    <label for="" class="col-2 col-form-label">Tour Plan</label>
    <div class="col-10">
        <div data-repeater-list="tour_plants">
            <div data-repeater-item>
                <div class="row">
                    <div class="col-md-10">
                        <div class="mb-3">
                            <input type="text" name="tour_plan" class="form-control" placeholder="Tour Plan">
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
<div class="mb-3 row" id="repeater_trip_gallery">
    <label for="" class="col-2 col-form-label">Upload Gallery</label>
    <div class="col-10">
        <div data-repeater-list="trip_gallery">
            <div data-repeater-item>
                <div class="row">
                    <div class="col-md-10">
                        <div class="mb-3">
                            <input type="file" name="image_gallery" class="form-control">
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
