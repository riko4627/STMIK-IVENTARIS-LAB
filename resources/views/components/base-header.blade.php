@props(['headerTitle', 'headerAddButton','headerIcon', 'buttonAdd', 'formId', 'buttonExport', 'exportId'])

<div class="px-3 py-3">
    <div class="page-header d-flex justify-content-between align-items-center">
        {{-- Title Page --}}
        <h1 class="page-title"> <i class="{{ $headerIcon }}"></i> {{ $headerTitle }} </h1>

        {{-- Add Button --}}
        <div class="ml-auto">
            @if ($buttonExport == 'true')
                <i class="fas fa fa-file-excel fa-2xl pr-3 text-success" style="cursor: pointer;" id="{{ $exportId }}"></i>
            @endif
            @if ($buttonAdd == 'true')
                <button type="button" class="btn btn-sm btn-outline-primary ml-auto" data-toggle="modal" data-target="{{ $formId }}">
                    <i class="fas fa fa-plus"></i> {{ $headerAddButton }}
                </button>
            @endif
        </div>
    </div>
</div>
