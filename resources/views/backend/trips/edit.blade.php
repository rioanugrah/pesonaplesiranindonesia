@extends('layouts.backend.app')
@section('title')
    {{ $trip->trip_name }}
@endsection
@section('css')
        {{-- <link rel="stylesheet" href="{{ asset('backend') }}/assets/libs/quill/quill.snow.css"> --}}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box d-md-flex justify-content-md-between align-items-center">
                    <h4 class="page-title">Edit Trip</h4>
                    <div class="">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item">Trips</li>
                            <li class="breadcrumb-item active">Edit</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('components.alert')
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.trip.update', ['id' => $trip->id]) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row align-items-center">
                            <div class="col">
                                <h4 class="card-title">Edit Trip</h4>
                            </div>
                            <div class="col-auto">
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </div>
                        <nav>
                            <div class="nav nav-tabs mb-3" id="nav-tab">
                                <a class="nav-link py-2 active" id="step1-tab" data-bs-toggle="tab" href="#step1">Trip</a>
                                <a class="nav-link py-2" id="step2-tab" data-bs-toggle="tab" href="#step2">Extra</a>
                                <a class="nav-link py-2" id="step3-tab" data-bs-toggle="tab" href="#step3">Confirm
                                    Detail</a>
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane active" id="step1">
                                <div class="mb-3 row">
                                    <label for="" class="col-2 col-form-label">Upload Images</label>
                                    <div class="col-10">
                                        <input type="file" name="trip_images" class="form-control">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="" class="col-2 col-form-label">Trip Name</label>
                                    <div class="col-10">
                                        <input type="text" name="trip_name" class="form-control" placeholder="Trip Name"
                                            value="{{ $trip->trip_name }}">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="" class="col-2 col-form-label">Trip Category</label>
                                    <div class="col-10">
                                        <select name="trip_category" class="form-control" id="">
                                            <option value="">-- Pilih Category --</option>
                                            <option value="O" {{ $trip->trip_category == 'O' ? 'selected' : null }}>
                                                Open
                                                Trip</option>
                                            <option value="P" {{ $trip->trip_category == 'P' ? 'selected' : null }}>
                                                Private
                                                Trip</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="" class="col-2 col-form-label">Description</label>
                                    <div class="col-10">
                                        <textarea class="form-control" name="trip_description" placeholder="Trip Description" id="editor" rows="5">{{ $trip->trip_description }}</textarea>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="" class="col-2 col-form-label">Trip Price</label>
                                    <div class="col-10">
                                        <input type="number" name="trip_price" min="0" placeholder="Trip Price"
                                            class="form-control" value="{{ $trip->trip_price }}">
                                    </div>
                                </div>
                                <div class="mb-3 row" id="repeater_experience">
                                    <label for="" class="col-2 col-form-label">Experience</label>
                                    <div class="col-10">
                                        <div data-repeater-list="experience">
                                            @foreach (json_decode($trip->trip_experience) as $trip_experience)
                                                <div data-repeater-item>
                                                    <div class="row">
                                                        <div class="col-md-10">
                                                            <div class="mb-3">
                                                                <input type="text" name="experience" class="form-control"
                                                                    placeholder="Experience"
                                                                    value="{{ $trip_experience->experience }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="mb-3">
                                                                <button type="button" data-repeater-delete
                                                                    class="btn btn-danger">Delete</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                        <button type="button" class="btn btn-success" data-repeater-create>Tambah
                                            Baru</button>
                                    </div>
                                </div>
                                <div class="mb-3 row" id="repeater_facilities">
                                    <label for="" class="col-2 col-form-label">Facilities</label>
                                    <div class="col-10">
                                        <div data-repeater-list="facilities">
                                            @foreach (json_decode($trip->trip_facilities) as $trip_facilities)
                                                <div data-repeater-item>
                                                    <div class="row">
                                                        <div class="col-md-10">
                                                            <div class="mb-3">
                                                                <input type="text" name="facilities"
                                                                    class="form-control" placeholder="Facilities"
                                                                    value="{{ $trip_facilities->facilities }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="mb-3">
                                                                <button type="button" data-repeater-delete
                                                                    class="btn btn-danger">Delete</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                        <button type="button" class="btn btn-success" data-repeater-create>Tambah
                                            Baru</button>
                                    </div>
                                </div>
                                <div class="mb-3 row" id="repeater_tour_plan">
                                    <label for="" class="col-2 col-form-label">Tour Plan</label>
                                    <div class="col-10">
                                        <div data-repeater-list="tour_plants">
                                            @foreach (json_decode($trip->trip_tour_plan) as $trip_tour_plan)
                                                <div data-repeater-item>
                                                    <div class="row">
                                                        <div class="col-md-10">
                                                            <div class="mb-3">
                                                                <input type="text" name="tour_plan"
                                                                    class="form-control" placeholder="Tour Plan"
                                                                    value="{{ $trip_tour_plan->tour_plan }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="mb-3">
                                                                <button type="button" data-repeater-delete
                                                                    class="btn btn-danger">Delete</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                        <button type="button" class="btn btn-success" data-repeater-create>Tambah
                                            Baru</button>
                                    </div>
                                </div>
                                <div class="mb-3 row" id="repeater_trip_gallery">
                                    <label for="" class="col-2 col-form-label">Upload Gallery</label>
                                    <div class="col-10">
                                        <div class="mb-3">
                                            <label for="">Apakah anda yakin untuk update Gallery?</label>
                                            <select name="select_upload_file" class="form-control" id="select_upload_file">
                                                <option value="">-- Pilih --</option>
                                                <option value="Y">Ya</option>
                                                <option value="N">Tidak</option>
                                            </select>
                                        </div>
                                        <div style="display: none" id="display_gallery">
                                            <div data-repeater-list="trip_gallery">
                                                @foreach (json_decode($trip->trip_gallery) as $trip_gallery)
                                                    <div data-repeater-item>
                                                        <div class="row">
                                                            <div class="col-md-10">
                                                                <div class="mb-3">
                                                                    <input type="file" name="image_gallery"
                                                                        class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="mb-3">
                                                                    <button type="button" data-repeater-delete
                                                                        class="btn btn-danger">Delete</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                            <button type="button" class="btn btn-success" data-repeater-create>Tambah
                                                Baru</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="step2">
                                <div class="mb-3 row" id="repeater_trip_extra">
                                    <label for="" class="col-2 col-form-label">Trip Extra</label>
                                    <div class="col-10">
                                        <div data-repeater-list="extra">
                                            @foreach ($trip->trip_extra as $trip_extra)
                                            <div data-repeater-item>
                                                <div class="row">
                                                    <div class="col-md-10">
                                                        <div class="row">
                                                            <div class="col-md-9">
                                                                <div class="mb-3">
                                                                    <input type="hidden" name="id"
                                                                        class="form-control" value="{{ $trip_extra->id }}">
                                                                    <input type="text" name="extra"
                                                                        class="form-control" placeholder="Trip Extra" value="{{ $trip_extra->extra_name }}">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="mb-3">
                                                                    <input type="number" name="price" min="0"
                                                                        class="form-control" placeholder="Extra Price" value="{{ $trip_extra->extra_price }}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="mb-3">
                                                            <button type="button" data-repeater-delete
                                                                class="btn btn-danger">Delete</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                        <button type="button" class="btn btn-success" data-repeater-create>Tambah
                                            Baru</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')

    {{-- <script src="{{ asset('backend') }}/assets/libs/quill/quill.js"></script>
    <script src="{{ asset('backend') }}/assets/js/pages/form-editor.init.js"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/ckeditor4@4.22.1/ckeditor.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.js"
        integrity="sha512-+k1pnlgt4F1H8L7t3z95o3/KO+o78INEcXTbnoJQ/F2VqDVhWoaiVml/OEHv9HsVgxUaVW+IbiZPUJQfF/YxZw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.repeater/1.2.1/jquery.repeater.js"
        integrity="sha512-bZAXvpVfp1+9AUHQzekEZaXclsgSlAeEnMJ6LfFAvjqYUVZfcuVXeQoN5LhD7Uw0Jy4NCY9q3kbdEXbwhZUmUQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('backend') }}/assets/js/pages/form-wizard.js"></script>

    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.repeater/1.2.1/jquery.repeater.min.js" integrity="sha512-foIijUdV0fR0Zew7vmw98E6mOWd9gkGWQBWaoA1EOFAx+pY+N8FmmtIYAVj64R98KeD2wzZh1aHK0JSpKmRH8w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
    <script>
        CKEDITOR.replace('editor');

        $('#repeater_experience').repeater({
            initEmpty: false,

            defaultValues: {
                'text-input': 'foo'
            },

            show: function() {
                $(this).slideDown();
            },

            hide: function(deleteElement) {
                $(this).slideUp(deleteElement);
            }
        });

        $('#repeater_facilities').repeater({
            initEmpty: false,

            defaultValues: {
                'text-input': 'foo'
            },

            show: function() {
                $(this).slideDown();
            },

            hide: function(deleteElement) {
                $(this).slideUp(deleteElement);
            }
        });

        $('#repeater_tour_plan').repeater({
            initEmpty: false,

            defaultValues: {
                'text-input': 'foo'
            },

            show: function() {
                $(this).slideDown();
            },

            hide: function(deleteElement) {
                $(this).slideUp(deleteElement);
            }
        });

        $('#repeater_trip_gallery').repeater({
            initEmpty: false,

            defaultValues: {
                'text-input': 'foo'
            },

            show: function() {
                $(this).slideDown();
            },

            hide: function(deleteElement) {
                $(this).slideUp(deleteElement);
            }
        });

        $('#repeater_trip_extra').repeater({
            initEmpty: false,

            defaultValues: {
                'text-input': 'foo'
            },

            show: function() {
                $(this).slideDown();
            },

            hide: function(deleteElement) {
                $(this).slideUp(deleteElement);
            }
        });

        $('#select_upload_file').on('change', function(){
            // alert(this.value);
            if (this.value == 'Y') {
                document.getElementById('display_gallery').style.display = 'block';
            }else{
                document.getElementById('display_gallery').style.display = 'none';
            }
        });

        // const selectGallery = document.getElementById('select_upload_file')
    </script>
@endsection
