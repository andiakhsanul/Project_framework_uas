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

                <div class="row mt-4">
                    @foreach($jadwalharian as $catatan)
                    <div class="col-md-6">
                        <div class="card mb-3">
                            <div class="card-body d-flex align-items-center gap-1">
                                <!-- grid -->
                                <div class="flex-grow-1">
                                    <h5 class="card-text">{{ $catatan->KEGIATAN }} - {{ $catatan->HARI }}</h5>
                                    <p class="card-title">{{ $catatan->created_at }}</p>
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
            } else {
                btn.html("<i class='bx bx-minus'></i> Batal")
                btn.removeClass('btn-success')
                btn.addClass('btn-danger')
            }

            form.slideToggle();
        });
    });

    // document.addEventListener('DOMContentLoaded', function() {
    //     document.getElementById('buatCatatanButton').addEventListener('click', function() {
    //         let form = document.getElementById('isiContentSection');
    //         if (form.style.display === 'none'){
    //             form.style.display = 'block';
    //             document.getElementById('buatCatatanButton').innerHTML = "<i class='bx bx-minus'></i> Batal";
    //         } else {
    //             form.style.display = 'none';
    //             document.getElementById('buatCatatanButton').innerHTML = "<i class='bx bx-plus'></i> Buat Catatan";
    //         }
    //     });
    // });
</script>
@endsection