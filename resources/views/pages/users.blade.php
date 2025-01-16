@extends('Layouts.master')
@section('content')
    <div class="card">
        <x-base-header headerTitle="Pengguna" buttonAdd="true" headerIcon="fas fa-box"  headerAddButton="Tambah Data"
        formId="#formUsersModal"
            buttonExport="false" exportId="exportUser">
        </x-base-header>
        <x-base-body>
            <x-base-table initId="dataTable">
                <x-slot name="thead">
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Aksi</th>
                    </tr>
                </x-slot>
            </x-base-table>
        </x-base-body>
    </div>
    <x-users.form-users></x-users.form-users>
    <script type="module" src="{{ asset('js/users/users.controller.js') }}"></script>
@endsection
