@extends('Layouts.master')
@section('title')
    Penngguna
@endsection
@section('content')
    <div class="page-inner">
        <div class="page-header ">
            <h4 class="page-title"><i class="fas fa-list-alt pr-2"></i>Pengguna</h4>
        </div>



        {{-- modal --}}
        {{-- <div class="modal fade" id="upsertDataModal" role="dialog" aria-labelledby="upsertDataModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-xl center" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="upsertDataModalLabel"><i class="fas fa-tasks pr-2"></i>Form Data</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="upsertDataForm" method="POST">
                            @csrf
                            <input type="hidden" name="id" id="id">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Nama</label>
                                        <input type="text" class="form-control" name="name" id="name"
                                            placeholder="nama anda">
                                        <small id="name-error" class="text-danger"></small>
                                    </div>
                                    <div class="form-group">
                                        <label for="nip">NIP</label>
                                        <input type="text" class="form-control" name="nip" id="nip"
                                            placeholder="nip anda">
                                        <small id="nip-error" class="text-danger"></small>
                                    </div>
                                    <div class="form-group">
                                        <label for="position">Jabatan</label>
                                        <input type="text" class="form-control" name="position" id="position"
                                            placeholder="jabatan">
                                        <small id="position-error" class="text-danger"></small>
                                    </div>
                                    <div class="form-group">
                                        <label for="phone">Nomor Telepon</label>
                                        <input type="text" class="form-control" name="phone" id="phone"
                                            placeholder="nomor telepon">
                                        <small id="phone-error" class="text-danger"></small>
                                    </div>
                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input type="text" class="form-control" name="username" id="username"
                                            placeholder="username">
                                        <small id="username-error" class="text-danger"></small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="text" class="form-control" name="email" id="email"
                                            placeholder="email@gmail.com">
                                        <small id="email-error" class="text-danger"></small>
                                    </div>
                                    <div class="form-group">
                                        <label for="agency">Instansi</label>
                                        <input type="text" class="form-control" name="agency" id="agency"
                                            placeholder="instansi">
                                        <small id="agency-error" class="text-danger"></small>
                                    </div>
                                    <div class="form-group">
                                        <label for="role">Level</label>
                                        <select class="form-control" name="role" id="role">
                                            <option value="">Pilih Level</option>
                                            <option value="admin">Admin</option>
                                            <option value="user">User</option>
                                        </select>
                                        <small id="role-error" class="text-danger"></small>
                                    </div>
                                    <div class="form-group">
                                        <label for="password" id="passwordLabel">Password</label>
                                        <input type="password" class="form-control passwordLabel" name="password"
                                            id="password" placeholder="*******">
                                        <small id="password-error" class="text-danger"></small>
                                    </div>
                                    <div class="form-group">
                                        <label for="password_confirmation" id="passwordConfirmLabel">Konfirmasi
                                            Password</label>
                                        <input type="password" class="form-control" name="password_confirmation"
                                            id="password_confirmation">
                                        <small id="password_confirmation-error" class="text-danger"></small>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="button" class="btn btn-primary" id="simpanData">Simpan</button>
                    </div>
                </div>
            </div>
        </div> --}}

    </div>
@endsection
@section('script')
@endsection
