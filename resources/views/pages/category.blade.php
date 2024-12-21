@extends('Layouts.master')
@section('content')
    <div class="card">
        <x-base-header headerTitle="Kategori Barang" buttonAdd="true" headerAddButton="Tambah Data"
        formId="#formCategoryModal" buttonExport="false" exportId="exportCategory">
        </x-base-header>
        <x-base-body>
            <x-base-table initId="dataTable">
                <x-slot name="thead">
                    <tr>
                        <th>No</th>
                        <th>Nama Kategori</th>
                        <th>Aksi</th>
                    </tr>
                </x-slot>
            </x-base-table>
        </x-base-body>
    </div>
    <x-category.form-category></x-category.form-category>
@endsection