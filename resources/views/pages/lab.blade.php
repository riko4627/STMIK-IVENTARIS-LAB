@extends('Layouts.master')
@section('content')
    <div class="card">
        <x-base-header headerTitle="Daftar Ruangan Lab" buttonAdd="true" headerAddButton="Tambah Data" formId="#formLabModal"
            buttonExport="false" exportId="exportLab">
        </x-base-header>
        <x-base-body>
            <x-base-table initId="dataTable">
                <x-slot name="thead">
                    <tr>
                        <th>No</th>
                        <th>Nama Ruangan</th>
                        <th>Lantai</th>
                        <th>Aksi</th>
                    </tr>
                </x-slot>
            </x-base-table>
        </x-base-body>
    </div>
    <x-lab.form-lab></x-lab.form-lab>
    <script type="module" src="{{ asset('js/lab/lab.controller.js') }}"></script>
@endsection
