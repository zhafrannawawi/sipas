<!-- Modal Bootstrap untuk form tambah peminjam -->
<div class="modal fade" id="createAdministratorModal" tabindex="-1" role="dialog" aria-labelledby="modalTitleId"
    aria-hidden="true">

    <!-- Wrapper ukuran & posisi modal -->
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <!-- Header modal: judul + tombol close -->
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitleId">
                    Tambah Administrator
                </h5>
                <!-- Menutup modal tanpa submit form -->
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- Form dikirim ke route administrator.store -->
            <form action="{{ route('admin.administrator.store') }}" method="POST">
                @csrf <!-- Proteksi CSRF Laravel -->

                <div class="modal-body">

                    <!-- Input Email: identitas utama peminjam -->
                    <label for="create_email" class="form-label">Email</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="addon-email">
                            <i class="fas fa-envelope"></i>
                        </span>
                        <input type="email" class="form-control" name="email" id="create_email"
                            aria-describedby="addon-email" placeholder="example@gmail.com" required />
                    </div>

                    <!-- Input Nama Lengkap -->
                    {{-- Digunakan sebagai nama tampilan peminjam --}}
                    <div class="mb-3">
                        <label for="create_name" class="form-label">Nama Lengkap</label>
                        <div class="input-group">
                            <span class="input-group-text" id="name-addon">
                                <i class="fas fa-user"></i>
                            </span>
                            <input type="text" class="form-control" name="name" id="create_name"
                                aria-describedby="name-addon" placeholder="Ahmad Fauzi" required />
                        </div>
                    </div>

                    <!-- Baris dua kolom: password & konfirmasi -->
                    <div class="row justify-content-center g-2">
                        <div class="col">

                            <!-- Input Password -->
                            {{-- Digunakan untuk autentikasi peminjam --}}
                            <div class="mb-3">
                                <label for="create_password" class="form-label">Password</label>
                                <div class="input-group">
                                    <span class="input-group-text" id="password-addon">
                                        <i class="fas fa-lock"></i>
                                    </span>
                                    <input type="password" class="form-control" name="password" id="create_password"
                                        aria-describedby="password-addon password-help" placeholder="********"
                                        minlength="8" required />
                                </div>
                                <!-- Informasi aturan password -->
                                <small id="password-help" class="form-text text-muted">
                                    Minimal 8 karakter
                                </small>
                            </div>
                        </div>

                        <div class="col">

                            <!-- Konfirmasi Password -->
                            {{-- Memastikan password diketik dengan benar --}}
                            <div class="mb-3">
                                <label for="confirmation_password" class="form-label">
                                    Konfirmasi Password
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text" id="confirm-password-addon">
                                        <i class="fas fa-lock"></i>
                                    </span>
                                    <input type="password" class="form-control" name="password_confirmation"
                                        id="confirmation_password" aria-describedby="confirm-password-addon"
                                        placeholder="********" required />
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Input Nomor Handphone -->
                    <div class="mb-3">
                        <label for="create_phone_number" class="form-label">
                            Nomor Handphone
                        </label>
                        <div class="input-group">
                            <span class="input-group-text" id="phone-addon">
                                <i class="fas fa-phone"></i>
                            </span>
                            <input type="text" class="form-control" name="phone_number" id="create_phone_number"
                                aria-describedby="phone-addon" placeholder="081234567890" minlength="10"
                                maxlength="13" />
                        </div>
                    </div>

                    <!-- Footer modal: aksi pengguna -->
                    <div class="modal-footer">

                        <!-- Menutup modal tanpa menyimpan -->
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            <i class="fas fa-door-closed-closed me-1"></i> Kembali
                        </button>

                        <!-- Submit form ke server -->
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-1"></i> Simpan Data
                        </button>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>
