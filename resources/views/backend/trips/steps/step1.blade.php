<div class="mb-3 row">
    <label for="" class="col-2 col-form-label">Trip Name</label>
    <div class="col-10">
        <input type="text" name="trip_name" class="form-control" placeholder="Trip Name"
            value="{{ old('trip_name') }}">
    </div>
</div>
<div class="mb-3 row">
    <label for="" class="col-2 col-form-label">Trip Meeting Poin</label>
    <div class="col-10">
        <input type="text" name="trip_meeting_poin" class="form-control" placeholder="Trip Meeting Poin"
            value="{{ old('trip_meeting_poin') }}">
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
    <label for="" class="col-2 col-form-label">Trip Type</label>
    <div class="col-10">
        <select name="trip_type" class="form-control" id="">
            <option value="">-- Pilih Tipe --</option>
            <option value="Adventure" {{ old('trip_type') == 'Adventure' ? 'selected' : null }}>Adventure</option>
            <option value="Beach" {{ old('trip_type') == 'Beach' ? 'selected' : null }}>Beach</option>
            <option value="Camping" {{ old('trip_type') == 'Camping' ? 'selected' : null }}>Camping</option>
        </select>
    </div>
</div>
<div class="mb-3 row">
    <label for="" class="col-2 col-form-label">Negara</label>
    <div class="col-10">
        <select name="trip_country" class="form-control" id="edit_country">
            <option value="">-- Pilih Negara --</option>
            @foreach ($countries as $item)
                <option value="{{ $item['name'] }}" {{ old('trip_country') == $item['name'] ? 'selected' : null }}>{{ $item['name'] }}</option>
            @endforeach
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
    <label for="" class="col-2 col-form-label">Trip Max Guest</label>
    <div class="col-10">
        <input type="number" name="trip_maxGuest" class="form-control" placeholder="Trip Max Guest"
            value="{{ old('trip_maxGuest') }}">
    </div>
</div>
<div class="mb-3 row">
    <label for="" class="col-2 col-form-label">Trip Min Age</label>
    <div class="col-10">
        <input type="number" name="trip_minAge" class="form-control" placeholder="Trip Min Age"
            value="{{ old('trip_minAge') }}">
    </div>
</div>
<div class="mb-3 row">
    <label for="" class="col-2 col-form-label">Trip Duration</label>
    <div class="col-10">
        <input type="text" name="trip_duration" class="form-control" placeholder="Trip Duration"
            value="{{ old('trip_duration') }}">
    </div>
</div>
<div class="mb-3 row">
    <label for="" class="col-2 col-form-label">Trip Location</label>
    <div class="col-10">
        <select name="trip_location" class="form-control" id="">
            <option value="">-- Pilih Location --</option>
            <option value="Bromo Mountain" {{ old('trip_location') == 'Bromo Mountain' ? 'selected' : null }}>Bromo Mountain</option>
        </select>
    </div>
</div>
<div class="mb-3 row">
    <label for="" class="col-2 col-form-label">Trip Price</label>
    <div class="col-10">
        <input type="number" name="trip_price" min="0" placeholder="Trip Price" class="form-control"
            value="{{ old('trip_price') }}">
    </div>
</div>
<div class="mb-3 row">
    <label for="" class="col-2 col-form-label">Upload Images</label>
    <div class="col-10">
        <input type="file" name="trip_images" class="form-control">
    </div>
</div>