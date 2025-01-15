<div class="modal fade" id="formUsersModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-title">Form Data User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formTambah" method="POST">
                <div class="modal-body">
                    @csrf
                    <input type="hidden" name="id" id="id" value="">
                    <!-- Field ID untuk edit data -->

                    <!-- Baris pertama dengan 2 kolom -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group fill modal-show-validation">
                                <label for="name">Nama</label>
                                <input id="name" name="name" type="text" class="form-control"
                                    placeholder="Nama Pengguna" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group fill modal-show-validation">
                                <label for="username">Username</label>
                                <input id="username" name="username" type="text" class="form-control"
                                    placeholder="Username" autocomplete="off">
                            </div>
                        </div>
                    </div>

                    <!-- Baris kedua dengan 2 kolom -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group fill modal-show-validation">
                                <label for="email">Email</label>
                                <input id="email" name="email" type="email" class="form-control"
                                    placeholder="Alamat Email" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group fill modal-show-validation">
                                <label for="password">Password</label>
                                <input id="password" name="password" type="password" class="form-control"
                                    placeholder="Kata Sandi" autocomplete="off">
                            </div>
                        </div>
                    </div>

                    <!-- Baris ketiga dengan 1 kolom penuh -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group fill modal-show-validation">
                                <label for="password_confirmation">Konfirmasi Password</label>
                                <input id="password_confirmation" name="password_confirmation" type="password"
                                    class="form-control" placeholder="Ulangi Kata Sandi" autocomplete="off">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-outline-danger" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-sm btn-outline-primary">Simpan Data</button>
                </div>
            </form>
        </div>
    </div>
</div>
