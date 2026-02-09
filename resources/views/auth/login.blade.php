<x-auth.app>

    <x-slot:title>
        Login
    </x-slot:title>

    <div
        class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
        <div class="d-flex align-items-center justify-content-center w-100">
            <div class="row justify-content-center w-100">
                <div class="col-md-8 col-lg-6 col-xxl-3">
                    <div class="card mb-0">
                        <div class="card-body">
                            <a href="./index.html" class="text-nowrap logo-img text-center d-block py-3 w-100">
                                <img src="{{ asset('assets/images/logos/logo-psrent.svg') }}" alt="">
                            </a>
                            <p class="text-center">Sistem Rental PS</p>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="mb-3">
                                    <label for="inputEmail" class="form-label">Email</label>
                                    <input type="email" name="email" id="inputEmail" class="form-control"
                                        value="{{ old('email') }}" placeholder="example@gmail.com">
                                </div>

                                <div class="mb-4">
                                    <label for="inputPassword" class="form-label">Password</label>
                                    <input type="password" name="password" id="inputPassword" class="form-control"
                                        placeholder="*****">
                                </div>

                                <button type="submit" class="btn btn-primary w-100">
                                   Log In
                                </button>

                                <div class="d-flex align-items-center justify-content-center mt-2">
                                    <p class="fs-3 mb-0 fw-bold">Baru di PSRent?</p>
                                    <a class="text-primary fw-bold ms-2" href="./authentication-register.html">Buat Akun</a>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <x-alert></x-alert>
    </div>
</x-auth.app>
