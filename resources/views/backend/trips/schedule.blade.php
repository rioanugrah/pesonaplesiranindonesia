@extends('layouts.backend.app')
@section('title')
    Trip Schedule
@endsection
@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/themes/airbnb.css">
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box d-md-flex justify-content-md-between align-items-center">
                    <h4 class="page-title">Trip Schedule</h4>
                    <div class="">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item">Trips</li>
                            <li class="breadcrumb-item active">Trip Schedule</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h4 class="card-title">Trip Schedule</h4>
                            </div>
                            <div class="col-auto">
                                <a href="{{ route('admin.trip') }}" class="btn bt btn-primary">
                                    <i class="icofont-plus-circle fs-5 me-1"></i> Back
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <form id="form-simpan" method="post">
                            @csrf
                            <div id="filterForm">
                                <div class="mb-3">
                                    <label for="dateRange" class="form-label text-muted small fw-bold">Buat Jadwal
                                        Trip</label>
                                    <div class="input-group">
                                        <span class="input-group-text text-primary"><i
                                                class="fa-solid fa-calendar-days"></i></span>
                                        <input type="text" class="form-control date-picker" id="dateRange"
                                            placeholder="Pilih tanggal..." readonly>
                                    </div>
                                    <div class="form-text mt-2 text-info" id="selectedRangeInfo" style="display: none;">
                                        <i class="fa-solid fa-circle-info me-1"></i>Trip ini berdurasi 3 Hari 2 Malam.
                                    </div>
                                </div>

                                <div id="dynamicScheduleContainer" class="mb-3 border-top pt-3 mt-3" style="display: none;">
                                    <h6 class="mb-3 text-primary"><i class="fa-solid fa-list-check me-2"></i>Rencana
                                        Perjalanan
                                        Harian</h6>
                                    <div id="scheduleInputsList">
                                        <!-- Input fields will be generated here -->
                                    </div>
                                </div>

                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                    <button class="btn btn-outline-secondary me-md-2" type="button"
                                        id="resetBtn">Reset</button>
                                    <button class="btn btn-primary" type="submit" id="searchBtn"><i
                                            class="fa-solid fa-magnifying-glass me-1"></i> Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Flatpickr JS -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <!-- Flatpickr Indonesian Locale (Optional for localization) -->
    <script src="https://npmcdn.com/flatpickr/dist/l10n/id.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const dateInput = document.getElementById('dateRange');
            const selectedRangeInfo = document.getElementById('selectedRangeInfo');
            const searchBtn = document.getElementById('searchBtn');
            const resetBtn = document.getElementById('resetBtn');
            const tripCards = document.querySelectorAll('.trip-card');
            const noResults = document.getElementById('noResults');

            const dynamicScheduleContainer = document.getElementById('dynamicScheduleContainer');
            const scheduleInputsList = document.getElementById('scheduleInputsList');

            // Konfigurasi durasi trip (misal 3 hari 2 malam)
            // Range = Tgl Mulai sampai Tgl Mulai + 2 hari
            const tripDurationDays = 14;

            // Initialize Flatpickr
            const fp = flatpickr(dateInput, {
                mode: "range", // Set mode ke range
                dateFormat: "Y-m-d", // Format internal yang mudah diproses
                altInput: true,
                altFormat: "j F Y", // Format yang ditampilkan ke user (e.g., 10 Agustus 2026)
                locale: "id", // Menggunakan bahasa Indonesia
                minDate: "today", // Tidak bisa pilih tanggal lampau

                // Event listener ketika tanggal dipilih
                onChange: function(selectedDates, dateStr, instance) {
                    // Logika untuk otomatis membuat range ketika hanya 1 tanggal yang dipilih
                    if (selectedDates.length === 1) {
                        const startDate = selectedDates[0];

                        // Hitung tanggal akhir berdasarkan durasi
                        const endDate = new Date(startDate);
                        endDate.setDate(startDate.getDate() + (tripDurationDays - 1));

                        // Setel rentang tanggal secara programatik tanpa memicu onChange lagi
                        instance.setDate([startDate, endDate], false);

                        // Tampilkan info durasi
                        selectedRangeInfo.style.display = 'block';

                        generateScheduleInputs(startDate, tripDurationDays);

                    } else if (selectedDates.length === 2) {
                        // Jika user mencoba mengubah range, paksa kembali ke durasi yang ditentukan
                        const startDate = selectedDates[0];
                        const expectedEndDate = new Date(startDate);
                        expectedEndDate.setDate(startDate.getDate() + (tripDurationDays - 1));

                        // Bandingkan apakah tanggal akhir yang dipilih user sama dengan yang diharapkan
                        if (selectedDates[1].getTime() !== expectedEndDate.getTime()) {
                            instance.setDate([startDate, expectedEndDate], false);
                        }

                        generateScheduleInputs(startDate, tripDurationDays);
                    } else {
                        // Sembunyikan info jika input kosong
                        selectedRangeInfo.style.display = 'none';
                        dynamicScheduleContainer.style.display = 'none';
                        scheduleInputsList.innerHTML = '';
                    }
                }
            });

            function generateScheduleInputs(startDate, days) {
                scheduleInputsList.innerHTML = ''; // Clear previous inputs

                const options = {
                    weekday: 'long',
                    year: 'numeric',
                    month: 'long',
                    day: 'numeric'
                };
                const optionsNew = {
                    year: 'numeric',
                    month: 'numeric',
                    day: 'numeric'
                };

                for (let i = 0; i < days; i++) {
                    const currentDate = new Date(startDate);
                    currentDate.setDate(startDate.getDate() + i);

                    // Format date to readable string (e.g., "Senin, 10 Agustus 2026")
                    const formattedDate = currentDate.toLocaleDateString('id-ID', options);
                    const formattedDateNew = currentDate.toLocaleDateString('id-ID', optionsNew);

                    const inputGroup = document.createElement('div');
                    inputGroup.className = 'mb-3 pb-2 border-bottom';
                    inputGroup.innerHTML = `
                        <label class="form-label fw-bold small text-dark">Hari ${i + 1} - ${formattedDate}</label>
                        <div class="row g-2">
                            <div class="col-md-12">
                                <input type="text" name='dates[]' class="form-control form-control-sm" value=${formattedDateNew} placeholder="Waktu" aria-label="Waktu">
                            </div>
                            <div class="col-md-4">
                                <input type="time" name='times_one[]' class="form-control form-control-sm" placeholder="Waktu" aria-label="Waktu">
                            </div>
                            <div class="col-md-4">
                                <input type="time" name='times_two[]' class="form-control form-control-sm" placeholder="Waktu" aria-label="Waktu">
                            </div>
                            <div class="col-md-4">
                                <input type="time" name='times_three[]' class="form-control form-control-sm" placeholder="Waktu" aria-label="Waktu">
                            </div>
                            <div class="col-md-6">
                                <input type="text" name='price_adult[]' class="form-control form-control-sm" placeholder="Adult" aria-label="Adult">
                            </div>
                            <div class="col-md-6">
                                <input type="text" name='price_child[]' class="form-control form-control-sm" placeholder="Child" aria-label="Child">
                            </div>
                        </div>
                    `;
                    scheduleInputsList.appendChild(inputGroup);
                }

                // Show the container
                dynamicScheduleContainer.style.display = 'block';
            }

            // Logic Filter/Cari Trip
            searchBtn.addEventListener('click', function() {
                const selectedRange = fp.selectedDates;

                if (selectedRange.length === 0) {
                    // Tampilkan pesan peringatan ringan (bukan alert native)
                    showToast("Silakan pilih tanggal keberangkatan terlebih dahulu.");
                    return;
                }

                const startDate = selectedRange[0];
                const endDate = selectedRange[1] || startDate; // Fallback jika somehow enddate undefined

                // Normalisasi jam ke 00:00:00 untuk perbandingan yang akurat
                startDate.setHours(0, 0, 0, 0);
                endDate.setHours(23, 59, 59, 999);

                let visibleCount = 0;

                tripCards.forEach(card => {
                    const tripDateStr = card.getAttribute('data-date');
                    const tripDate = new Date(tripDateStr);
                    tripDate.setHours(0, 0, 0, 0);

                    // Logika Pencarian: Tampilkan trip jika tanggalnya masuk dalam rentang pilihan
                    if (tripDate >= startDate && tripDate <= endDate) {
                        card.style.display = 'block';
                        visibleCount++;
                    } else {
                        card.style.display = 'none';
                    }
                });

                // Tampilkan pesan tidak ada hasil jika kosong
                if (visibleCount === 0) {
                    noResults.style.display = 'block';
                } else {
                    noResults.style.display = 'none';
                }
            });

            // Logic Reset
            resetBtn.addEventListener('click', function() {
                fp.clear(); // Bersihkan input tanggal
                selectedRangeInfo.style.display = 'none';

                dynamicScheduleContainer.style.display = 'none';
                scheduleInputsList.innerHTML = '';

                // Tampilkan semua card kembali
                tripCards.forEach(card => {
                    card.style.display = 'block';
                });

                noResults.style.display = 'none';
            });

            // Simple Custom Toast Function (menggantikan alert)
            function showToast(message) {
                // Buat elemen div untuk toast
                const toastDiv = document.createElement('div');
                toastDiv.className = 'position-fixed bottom-0 end-0 p-3';
                toastDiv.style.zIndex = '11';

                toastDiv.innerHTML = `
                    <div class="toast align-items-center text-bg-warning border-0 show" role="alert" aria-live="assertive" aria-atomic="true">
                        <div class="d-flex">
                            <div class="toast-body fw-bold">
                                <i class="fa-solid fa-triangle-exclamation me-2"></i>${message}
                            </div>
                            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                        </div>
                    </div>
                `;

                document.body.appendChild(toastDiv);

                // Auto hide setelah 3 detik
                setTimeout(() => {
                    toastDiv.remove();
                }, 3000);

                // Event listener untuk tombol close manual
                const closeBtn = toastDiv.querySelector('.btn-close');
                closeBtn.addEventListener('click', () => {
                    toastDiv.remove();
                });
            }
        });
    </script>
    <script>
        $('#form-simpan').submit(function(e) {
            e.preventDefault();
            let formData = new FormData(this);

            // Swal.fire({
            //     title: "Apakah Sudah Yakin?",
            //     text: "Anda tidak dapat mengubah setelah submit",
            //     icon: "warning",
            //     showCancelButton: true,
            //     customClass: {
            //         confirmButton: 'btn btn-primary me-2 mt-2',
            //         cancelButton: 'btn btn-danger mt-2',
            //     },
            //     confirmButtonText: "Ya, Submit",
            //     buttonsStyling: false,
            //     showCloseButton: true
            // }).then(function(result) {
            //     if (result.value) {
            //         $.ajax({
            //             type: 'POST',
            //             url: "{{ route('admin.trip.schedule.simpan', ['id' => $id]) }}",
            //             data: formData,
            //             contentType: false,
            //             processData: false,
            //             beforeSend: () => {
            //                 Swal.fire({
            //                     title: 'Loading...',
            //                     html: 'Please wait while we process your request',
            //                     allowOutsideClick: false,
            //                     didOpen: () => {
            //                         Swal.showLoading();
            //                     }
            //                 });
            //             },
            //             success: (result) => {
            //                 if (result.success == true) {
            //                     Swal.close();

            //                     Swal.fire({
            //                         title: result.message_title,
            //                         text: result.message_content,
            //                         icon: 'success',
            //                         customClass: {
            //                             confirmButton: 'btn btn-primary mt-2',
            //                         },
            //                         buttonsStyling: false
            //                     })

            //                     table.ajax.reload(null, false);

            //                     this.reset;

            //                     $('.modalBuat').modal('hide');
            //                 } else {
            //                     Swal.close();
            //                     Swal.fire({
            //                         title: 'Gagal',
            //                         text: result.error,
            //                         icon: 'error',
            //                         customClass: {
            //                             confirmButton: 'btn btn-danger mt-2',
            //                         },
            //                         buttonsStyling: false
            //                     })
            //                 }
            //             },
            //             error: function(request, status, error) {
            //                 Swal.close();
            //                 Swal.fire({
            //                     title: 'Error',
            //                     text: error,
            //                     icon: 'error',
            //                     customClass: {
            //                         confirmButton: 'btn btn-danger mt-2',
            //                     },
            //                     buttonsStyling: false
            //                 })
            //             }
            //         });
            //     }
            // });
            $.ajax({
                type: 'POST',
                url: "{{ route('admin.trip.schedule.simpan', ['id' => $id]) }}",
                data: formData,
                contentType: false,
                processData: false,
                beforeSend: () => {
                    // Swal.fire({
                    //     title: 'Loading...',
                    //     html: 'Please wait while we process your request',
                    //     allowOutsideClick: false,
                    //     didOpen: () => {
                    //         Swal.showLoading();
                    //     }
                    // });
                },
                success: (result) => {
                    if (result.success == true) {
                        // Swal.close();

                        // Swal.fire({
                        //     title: result.message_title,
                        //     text: result.message_content,
                        //     icon: 'success',
                        //     customClass: {
                        //         confirmButton: 'btn btn-primary mt-2',
                        //     },
                        //     buttonsStyling: false
                        // })

                        // table.ajax.reload(null, false);

                        this.reset;

                        // $('.modalBuat').modal('hide');
                    } else {
                        // Swal.close();
                        // Swal.fire({
                        //     title: 'Gagal',
                        //     text: result.error,
                        //     icon: 'error',
                        //     customClass: {
                        //         confirmButton: 'btn btn-danger mt-2',
                        //     },
                        //     buttonsStyling: false
                        // })
                    }
                },
                error: function(request, status, error) {
                    // Swal.close();
                    // Swal.fire({
                    //     title: 'Error',
                    //     text: error,
                    //     icon: 'error',
                    //     customClass: {
                    //         confirmButton: 'btn btn-danger mt-2',
                    //     },
                    //     buttonsStyling: false
                    // })
                }
            });
        });
    </script>
@endsection
