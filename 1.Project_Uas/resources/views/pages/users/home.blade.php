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

                    <div id="isiContentSection" style="display: none;">
                        <div class="card mt-4">
                            <div class="card-body">
                                <h5 class="card-title">Form Catatan Harian</h5>
                                <form action="{{ route('storeCatatan') }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="hari" class="form-label">Hari:</label>
                                                <input type="date" name="hari" id="hari" class="form-control"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="kegiatan" class="form-label">Kegiatan:</label>
                                                <input type="text" name="kegiatan" id="kegiatan" class="form-control"
                                                    required>
                                            </div>
                                        </div>
                                    </div>

                                    <button class="buatListTugasButton btn btn-success btn-hover" type="button">
                                        <i class="bx bx-plus"></i> List Tugas
                                    </button>

                                    <div class="row mt-4">
                                        <div class="col-md-12">
                                            <div class="d-flex justify-content-center">
                                                <button type="submit" class="btn btn-primary">Simpan Catatan</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="card mt-4">
                            <div class="card-body">
                                <h5 class="card-title">Form Tugas</h5>
                                <form action="{{ route('storeTugas') }}" method="POST">
                                    @csrf
                                    <!-- Form input untuk deskripsi, tenggat_waktu, status, dll. -->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="deskripsi" class="form-label">Deskripsi Tugas:</label>
                                                <textarea name="deskripsi" id="deskripsi" class="form-control" required></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="tenggat_waktu" class="form-label">Waktu Pengumpulan:</label>
                                                <input type="datetime-local" name="tenggat_waktu" id="tenggat_waktu"
                                                    class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="status" class="form-label">Status Tugas:</label>
                                                <select name="status" id="status" class="form-control" required>
                                                    <option value="0">Belum Selesai</option>
                                                    <option value="1">Selesai</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <input type="hidden" name="jadwalHarianId" value="{{ $catatan->id }}">
                                    <input type="hidden" name="mahasiswaId" value="{{ $mahasiswaId }}">

                                    <div class="row mt-4">
                                        <div class="col-md-12">
                                            <div class="d-flex justify-content-center">
                                                <button type="submit" class="btn btn-primary">Simpan Tugas</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        @foreach ($jadwalharian as $catatan)
                            <div class="col-md-6">
                                <div class="card mb-3">
                                    <div class="card-body d-flex align-items-center gap-1">
                                        <div class="flex-grow-1">
                                            <h5 class="card-text">{{ $catatan->kegiatan }} - {{ $catatan->hari }}</h5>
                                            <p class="card-title">{{ $catatan->created_at }}</p>

                                            @foreach ($catatan->tugas as $tugas)
                                                <p class="card-text">Deskripsi Tugas: {{ $tugas->DESK_TUGAS }}</p>
                                                <p class="card-text">Waktu Pengumpulan: {{ $tugas->TENGGAT_WAKTU }}</p>
                                                <p class="card-text">Status Tugas:
                                                    {{ $tugas->STATUS == 1 ? 'Selesai' : 'Belum Selesai' }}</p>
                                            @endforeach
                                        </div>
                                        <div>
                                            <button class="btn btn-primary btn-hover" type="button">
                                                <i class="bx bx-pencil"></i>
                                            </button>
                                        </div>
                                        <div>
                                            <button class="btn btn-danger btn-hover" type="button">
                                                <i class="bx bx-trash"></i>
                                            </button>
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
        $(document).ready(function() {
            $('#buatCatatanButton').click(function() {
                let btn = $('#buatCatatanButton')
                let form = $('#isiContentSection')
                if (form.is(':visible')) {
                    btn.html("<i class='bx bx-plus'></i> Buat Catatan")
                    btn.removeClass('btn-danger')
                    btn.addClass('btn-success')
                    $('#tugasRow').hide();
                } else {
                    btn.html("<i class='bx bx-minus'></i> Batal")
                    btn.removeClass('btn-success')
                    btn.addClass('btn-danger')
                }

                form.slideToggle();
            });

            $(document).on('click', '.buatListTugasButton', function() {
                let container = $(this).closest('.card-body');
                let tugasRow = container.find('#tugasRow');
                let newTugasRow = tugasRow.clone();

                newTugasRow.insertBefore($(this));
                newTugasRow.slideDown();
            });
        });
    </script>
@endsection
