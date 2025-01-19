@extends('Layouts.master')
@section('content')
    <div class="card">
        <x-base-header headerTitle="Inventaris Barang" headerIcon="fas fa-box" buttonAdd="true" headerAddButton="Tambah Data"
        formId="#forminventoryModal" buttonExport="true" exportId="export">
        </x-base-header>
        <x-base-body>
            <x-base-table initId="dataTable">
                <x-slot name="thead">
                    <tr>
                        <th>No</th>
                        <th>Nama barang</th>
                        <th>Jumlah barang</th>
                        <th>Jumlah barang baik</th>
                        <th>Jumlah barang rusak</th>
                        <th>Spesifikasi</th>
                        <th>Kategori</th>
                        <th>Lab</th>
                        <th>Tahun</th>
                        <th>Aksi</th>
                    </tr>
                </x-slot>
            </x-base-table>
        </x-base-body>
    </div>
    <x-inventory.form-inventory></x-inventory.form-inventory>
    <script type="module" src="{{ asset('js/inventory/inventory.controller.js') }}"></script>
@endsection
