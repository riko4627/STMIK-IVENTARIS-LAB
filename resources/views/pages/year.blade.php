@extends('Layouts.master')
@section('content')
    <div class="card">
        <x-base-header headerTitle="Tahun" buttonAdd="true" headerIcon="fas fa-box"  headerAddButton="Tambah Data"
        formId="#formYearModal"
            buttonExport="false" exportId="exportLab">
        </x-base-header>
        <x-base-body>
            <x-base-table initId="dataTable">
                <x-slot name="thead">
                    <tr>
                        <th>No</th>
                        <th>Tahun</th>
                        <th>Aksi</th>
                    </tr>
                </x-slot>
            </x-base-table>
        </x-base-body>
    </div>
    <x-year.form-year></x-year.form-year>
    <script type="module" src="{{ asset('js/year/year.controller.js') }}"></script>
@endsection
