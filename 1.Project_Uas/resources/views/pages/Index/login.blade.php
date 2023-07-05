@extends('Layout.app')

@section('login')
    <section class="vh-100">
        <div class="container py-5 h-100">
            <div class="px-5 ms-xl-4">
                <i class="fas fa-crow fa-2x me-3 pt-5 mt-xl-4" style="color: #709085;"></i>
                <span class="h1 fw-bold mb-0">StudyBuddy</span>
            </div>

            <div class="row d-flex align-items-center justify-content-center h-100">
                <div class="col-md-8 col-lg-7 col-xl-6">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.svg"
                        class="img-fluid" alt="Phone image">
                </div>
                <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1 border rounded shadow">
                    <form>
                        <h3 class="fw-bold mb-3 pb-3 text-center pt-4 fs-2">Login Siswa</h3>

                        <!-- Email input -->
                        <div class="form-outline mb-4">
                            <label class="form-label" for="form1Example13">Email : </label>
                            <input type="email" id="form1Example13" class="form-control form-control-lg shadow-sm"
                                placeholder="Email User" />
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-4">
                            <label class="form-label" for="form1Example23">Password : </label>
                            <input type="password" id="form1Example23" class="form-control form-control-lg shadow-sm"
                                placeholder="Password User" />
                        </div>

                        <!-- Submit button -->
                        <button type="submit"
                            class="btn btn-primary btn-block form-control form-control-lg shadow btn-custom">Login</button>

                        <div class="divider d-flex align-items-center my-4">
                            <p class="text-center fw-bold mx-3 mb-0 text-muted">Atau</p>
                        </div>

                        <div class="flex-container">
                            <p>Belum Memiliki Akun?</p>
                            <p><a href="/Registrasi" class="link-info">Daftar Akun</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
