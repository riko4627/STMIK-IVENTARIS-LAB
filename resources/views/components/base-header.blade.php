@props(['headerTitle', 'headerAddButton', 'buttonAdd', 'formId', 'buttonExport', 'exportId'])

<div class="py-3 px-3">
    <div class="page-header d-flex align-items-center justify-content-between">
        <h3 class="m-0 font-weight-bold">{{ $headerTitle }}</h3>
        <div class="ml-auto">
            @if ($buttonExport == 'true')
                  <i class="fas fa fa-file-excel fa-2xl pr-3 text-success" style="cursor: pointer;" id="{{ $exportId }}"></i>
            @endif
            @if ($buttonAdd == 'true')
                <button type="button" class="btn btn-outline-primary ml-auto" data-toggle="modal" data-target="{{ $formId }}">
                    <i class="fas fa fa-plus"></i> {{ $headerAddButton }}
                </button>
            @endif
        </div>
    </div>
</div>
