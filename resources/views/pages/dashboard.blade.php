@extends('Layouts.master')
@section('content')
    <div class="card">
        <x-base-header headerTitle="Dashboard" headerIcon="fas fa-box" buttonAdd="false" headerAddButton="Tambah Data"
        formId="#formCategoryModal" buttonExport="false" exportId="exportCategory">
        </x-base-header>
        <x-base-body>
            <x-base-table initId="dataHistory">
                <x-slot name="thead">
                    <tr>
                        <th>#</th>
                        <th>Nama Barang</th>
                        <th>Diperbaharui Oleh</th>
                        <th>Tanggal Pembaharuan</th>
                        <th>Keterangan</th>
                    </tr>
                </x-slot>
            </x-base-table>
        </x-base-body>
    </div>
     <script type="module" src="{{ asset('js/dashboard/dashboard.controller.js') }}"></script>
@endsection
