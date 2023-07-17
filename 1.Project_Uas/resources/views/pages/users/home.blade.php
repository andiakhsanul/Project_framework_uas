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
                    <button id="buatCatatanButton" class="btn btn-success btn-hover" type="button">
                        <i class="bx bx-plus"></i> Buat Catatan
                    </button>

                    {{-- harusnya pakek yang ini dibawah ini yang atas contoh tampilan --}}
                    <div id="isiContentSection" style="display: none;">
                        <div class="card mt-4">
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

                    @foreach ($jadwalharian as $catatan)
                        <div class="col-md-6" data-catatan-id="{{ $catatan->id }}">
                            <div class="card mb-3">
                                <div class="card-body d-flex align-items-center gap-1">
                                    <!-- grid -->
                                    <div class="flex-grow-1">
                                        <h5 class="card-text">{{ $catatan->KEGIATAN }} - {{ $catatan->HARI }}</h5>
                                        <p class="card-title">{{ $catatan->created_at }}</p>
                                    </div>
                                    <div>
                                        <button class="btn btn-primary btn-hover btn-edit" type="button"
                                            data-catatan-id="{{ $catatan->id }}">
                                            <i class="bx bx-pencil"></i>
                                        </button>
                                    </div>
                                    <div>
                                        <button class="btn btn-danger btn-hover btn-delete" type="button"
                                            data-catatan-id="{{ $catatan->id }}">
                                            <i class="bx bx-trash"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            @if ($activeFormId === $catatan->id)
                                <div class="card mt-4">
                                    <div class="card-body">
                                        <h5 class="card-title">Form Edit Catatan Harian</h5>
                                        <form action="{{ route('updateCatatan', $catatan->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="mb-3">
                                                <label for="hari" class="form-label">Hari:</label>
                                                <input type="date" name="hari" id="hari" class="form-control"
                                                    value="{{ $catatan->HARI }}" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="kegiatan" class="form-label">Kegiatan:</label>
                                                <input type="text" name="kegiatan" id="kegiatan" class="form-control"
                                                    value="{{ $catatan->KEGIATAN }}" required>
                                            </div>

                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                            <button type="button" class="btn btn-danger btn-cancel-edit">Batal</button>
                                        </form>
                                    </div>
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
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
        $(document).ready(function() {
            $(document).on('click', '.btn-edit', function() {
                let catatanId = $(this).data('catatan-id');
                let form = $('.col-md-6[data-catatan-id="' + catatanId + '"]').find('.card.mt-4');

                // Menampilkan form edit dan menyembunyikan tombol edit
                form.show();
                $(this).hide();
            });

            $(document).on('click', '.btn-cancel-edit', function() {
                let form = $(this).closest('.card.mt-4');
                let catatanId = form.parent().data('catatan-id');
                let btnEdit = $('.col-md-6[data-catatan-id="' + catatanId + '"]').find('.btn-edit');

                // Menyembunyikan form edit dan menampilkan tombol edit
                form.hide();
                btnEdit.show();
            });
        });
    </script>
@endsection
