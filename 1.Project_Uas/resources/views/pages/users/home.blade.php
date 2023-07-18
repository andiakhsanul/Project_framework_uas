@extends('Layout.appUser')

@section('content')
<div class="row pt-4">
    <div class="col">
        <div class="card mb-3">
            <div class="card-header text-center bg-primary">
                <h4 class="text-white">Catatan Harian {{ $namaUser }}</h4>
            </div>
            <div class="card-body">
                <h5 class="card-title">List Catatan :</h5>
                <hr>
                <button id="buatCatatanButton" class="btn btn-success btn-hover mb-4" type="button">
                    <i class="bx bx-plus"></i> Buat Catatan
                </button>

                {{-- harusnya pakek yang ini dibawah ini yang atas contoh tampilan --}}
                <div id="isiContentSection" style="display: none;">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title">Form Catatan Harian</h5>
                            <form action="{{ route('storeCatatan') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="hari" class="form-label">Hari:</label>
                                    <input type="date" name="hari" id="hari" class="form-control" required>
                                </div>

                                <div class="mb-3">
                                    <label for="kegiatan" class="form-label">Kegiatan:</label>
                                    <input type="text" name="kegiatan" id="kegiatan" class="form-control" required>
                                </div>

                                <button type="submit" class="btn btn-primary">Simpan</button>

                            </form>

                        </div>
                    </div>
                </div>

                {{-- @foreach ($jadwalharian as $catatan)
                        <div class="col-md-6" data-catatan-id="{{ $catatan->id }}">
                <div class="card mb-3">
                    <div class="card-body d-flex align-items-center gap-1">
                        <!-- grid -->
                        <div class="flex-grow-1">
                            <h5 class="card-text">{{ $catatan->KEGIATAN }} - {{ $catatan->HARI }}</h5>
                            <p class="card-title">{{ $catatan->created_at }}</p>
                        </div>
                        <div>
                            <button class="btn btn-primary btn-hover btn-edit" type="button" data-catatan-id="{{ $catatan->id }}">
                                <i class="bx bx-pencil"></i>
                            </button>
                        </div>
                        <div>
                            <button class="btn btn-danger btn-hover btn-delete" type="button" data-catatan-id="{{ $catatan->id }}">
                                <i class="bx bx-trash"></i>
                            </button>
                        </div>
                    </div>
                </div>
                @if ($activeFormId == $catatan->id)
                <div class="card mt-4">
                    <div class="card-body">
                        <h5 class="card-title">Form Edit Catatan Harian</h5>
                        <form action="{{ route('updateCatatan', $catatan->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="hari" class="form-label">Hari:</label>
                                <input type="date" name="hari" id="hari" class="form-control" value="{{ $catatan->HARI }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="kegiatan" class="form-label">Kegiatan:</label>
                                <input type="text" name="kegiatan" id="kegiatan" class="form-control" value="{{ $catatan->KEGIATAN }}" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <button type="button" class="btn btn-danger btn-cancel-edit">Batal</button>
                        </form>
                    </div>
                </div>
                @endif
            </div>
            @endforeach --}}

            <div class="row pt-4">
                @foreach ($jadwalharian as $catatan)
                <div class="col-md-6 mb-3" data-catatan-id="{{ $catatan->id }}">
                    <div class="card p-2 bg-primary">
                        <div class="card">
                            <div class="card-body d-flex align-items-center gap-1">
                                <!-- grid -->
                                <div class="flex-grow-1">
                                    <h5 class="card-text">{{ $catatan->KEGIATAN }} - {{ $catatan->HARI }}</h5>
                                    <p class="card-title">{{ $catatan->created_at }}</p>
                                    @foreach ($tugas as $tugass)
                                    @if ($tugass->jadwalharian_id == $catatan->id)
                                    <p>{{ $tugass->jadwalharian_id }} | {{ $tugass->DESK_TUGAS }}</p>
                                    @endif
                                    @endforeach
                                </div>
                                <div>
                                    <button class="btn btn-primary btn-hover btn-edit" type="button" data-catatan-id="{{ $catatan->id }}">
                                        <i class="bx bx-pencil"></i>
                                    </button>
                                </div>
                                <div>
                                    <button class="buatListTugasButton btn btn-success btn-hover" type="button">
                                        <i class="bx bx-plus"></i>
                                    </button>
                                </div>
                                <div>
                                    <button class="btn btn-danger btn-hover btn-delete" type="button" data-catatan-id="{{ $catatan->id }}">
                                        <i class="bx bx-trash"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="card mt-4" style="display: none;">
                            <div class="card-body">
                                <h5 class="card-title">Form Edit Catatan Harian</h5>
                                <form action="{{ route('updateCatatan', $catatan->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-3">
                                        <label for="hari" class="form-label">Hari:</label>
                                        <input type="date" name="hari" id="hari" class="form-control" value="{{ $date = explode(' ', $catatan->HARI)[0] }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="kegiatan" class="form-label">Kegiatan:</label>
                                        <input type="text" name="kegiatan" id="kegiatan" class="form-control" value="{{ $catatan->KEGIATAN }}" required>
                                    </div>

                                    <div class="row mt-4">
                                        <div class="col-md-12">
                                            <div class="d-flex justify-content-center">
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                                <button type="button" class="btn btn-danger btn-cancel-edit">Batal</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>


                            </div>
                        </div>

                        <div id="addTugas" style="display: none;">
                            <div class="card mt-4">
                                <div class="card-body">

                                    <div id="tugasRow"></div>

                                    <div class="row mt-4">
                                        <div class="col-md-12">
                                            <div class="d-flex justify-content-center">
                                                <button type="button" class="submit-button btn btn-primary" value="submit" id="submitAllForms">Simpan</button>
                                                <button type="button" class="btn btn-danger btn-cancel-edit">Batal</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
</div>
@endsection

@section('scripts')
<script>
    // script Menampilkan Form Buat catatan
    $(document).ready(function() {
        $('#buatCatatanButton').click(function() {
            let btn = $('#buatCatatanButton');
            let form = $('#isiContentSection');
            let btnDelete = $('.btn-delete');

            if (form.is(':visible')) {
                btn.html("<i class='bx bx-plus'></i> Buat Catatan");
                btn.removeClass('btn-danger').addClass('btn-success');
                btnDelete.show(); // Menampilkan tombol hapus catatan
            } else {
                btn.html("<i class='bx bx-minus'></i> Batal");
                btn.removeClass('btn-success').addClass('btn-danger');
                btnDelete.hide(); // Menyembunyikan tombol hapus catatan
            }

            form.slideToggle();
        });
    });

    // script untuk menghapus catatan
    $(document).ready(function() {
        $(document).on('click', '.btn-delete', function() {

            let catatanId = $(this).data('catatan-id');
            let deleteUrl = "{{ route('deleteCatatan', ':id') }}".replace(':id', catatanId);

            // Konfirmasi dialog sebelum menghapus catatan
            if (confirm('Apakah Anda yakin ingin menghapus catatan ini?')) {
                $.ajax({
                    url: deleteUrl,
                    type: 'DELETE',
                    data: {
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        // Menghapus div kolom yang sesuai dengan catatan yang dihapus
                        $('.col-md-6[data-catatan-id="' + catatanId + '"]').remove();
                        showNotification(response.message, 'success');
                    },
                    error: function(xhr) {
                        showNotification('Terjadi kesalahan saat menghapus catatan.',
                            'danger');
                    }
                });
            }
        });
    });

    // script untuk edit catatan
    $(document).ready(function() {
        // Menampilkan form buat catatan
        // $('#buatCatatanButton').click(function() {
        //     let form = $('#isiContentSection');
        //     form.slideToggle();
        //     form.find('form')[0].reset(); // Mengosongkan input form
        // });

        // Menampilkan form edit catatan
        $(document).on('click', '.btn-edit', function() {
            let card = $(this).closest('.card');
            let form = card.next('.card');

            // Menyembunyikan card dan menampilkan form
            // card.hide();
            form.show();
        });

        // Menyembunyikan form edit catatan dan menampilkan card
        $(document).on('click', '.btn-cancel-edit', function() {
            let form = $(this).closest('.card');
            let card = form.prev('.card');

            form.hide();
            card.show();
        });
    });
</script>
<script>
    $(document).ready(function() {
        let formCounter = 0;

        $(document).on('click', '.buatListTugasButton', function() {
            $('#addTugas').show();

            let container = $('#addTugas').closest('.card-body');
            let tugasRow = container.find('#tugasRow');

            // Increment the formCounter for unique form ID
            formCounter++;

            // Generate unique form ID
            let formId = 'formTugas' + formCounter;

            // Buat form tugas baru
            let newTugasForm = `
      <form id="${formId}" class="dynamic-form" action="{{ route('storeTugas') }}" method="POST">
        @csrf
        <!-- Form input untuk deskripsi, tenggat_waktu, status, dll. -->

        <div class="row mt-3">
          <div class="col-md-12">
            <div class="mb-3 d-flex justify-content-between align-items-center">
              <label for="DESK_TUGAS" class="form-label">Deskripsi Tugas:</label>
              <button class="hapusTugasButton btn btn-danger ml-2" type="button">Hapus</button>
            </div>
            <textarea name="DESK_TUGAS" class="form-control" required></textarea>
          </div>
          <div class="col-md-6">
            <div class="mb-3">
              <label for="TENGGAT_WAKTU" class="form-label">Waktu Pengumpulan:</label>
              <input type="datetime-local" name="TENGGAT_WAKTU" class="form-control" required>
            </div>
          </div>
          <div class="col-md-6">
            <div class="mb-3">
              <label for="STATUS" class="form-label">Status Tugas:</label>
              <select name="STATUS" class="form-control" required>
                <option value="0">Belum Selesai</option>
                <option value="1">Selesai</option>
              </select>
            </div>
          </div>
        </div>
        @if ($jadwalharian->isEmpty())
    <p>No catatan available.</p>
@else
        <input type="hidden" name="jadwalharian_id" value="{{ $catatan->id }}">
        <input type="hidden" name="mahasiswaId" value="{{ $mahasiswaId }}">
        @endif
      </form>
    `;

            tugasRow.prepend(newTugasForm);
            tugasRow.show();
        });

        $(document).on('click', '.hapusTugasButton', function() {
            $(this).closest('form').remove();
        });

        $(document).on('click', '#submitAllForms', function() {
            let forms = $('.dynamic-form');

            // Perform form validation if needed
            // ...

            // Iterate through each form and submit via AJAX
            forms.each(function() {
                let form = $(this);

                console.log(form)

                $.ajax({
                    url: form.attr('action'),
                    type: form.attr('method'),
                    data: form.serialize(),
                    success: function(response) {
                        form.serialize()
                    },
                    error: function(xhr) {
                        xhr
                    }
                });
            });

            location.reload();
        });
    });
</script>
@endsection