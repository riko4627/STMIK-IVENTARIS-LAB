@extends('Layout.master')
@section('content')
    <div class="card">
        <x-base-header headerTitle="Example Title" buttonAdd="true" headerAddButton="Tambah Data"
        formId="#exampleForm" buttonExport="false" exportId="exportExample">
        </x-base-header>
        <x-base-body>
            <x-base-table initId="dataTable">
                <x-slot name="thead">
                    <tr>
                        <th>No</th>
                        <th>Field Example</th>
                        <th>Aksi</th>
                    </tr>
                </x-slot>
            </x-base-table>
        </x-base-body>
    </div>

    {{-- Menghubungkan ke from component --}}
    <x-example.example-form></x-example.example-form>
    
    {{-- Menghubungkan ke file controller --}}
    {{-- <script type="module" src="{{ asset('js/category/category.controller.js') }}"></script> --}}
@endsection