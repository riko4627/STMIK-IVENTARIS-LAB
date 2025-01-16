import inventoryService from "./inventory.service.js";

$(document).ready(function () {
    const inventoryservice = new inventoryService()
    inventoryservice.getAllData();

    function validation() {
        $('#formTambah').validate({
            rules: {
                item_name: {
                    required: true,
                },
                total_items: {
                    required: true,
                },
                total_items_good: {
                    required: true,
                },
                total_items_crash: {
                    required: true,
                },
                spesification: {
                    required: true,
                },
            },
            messages: {
                item_name: {
                    required: "Form tidak boleh kosong",
                },
                total_items: {
                    required: "Form tidak boleh kosong",
                },
                total_items_good: {
                    required: "Form tidak boleh kosong",
                },
                total_items_crash: {
                    required: "Form tidak boleh kosong",
                },
                spesification: {
                    required: "Form tidak boleh kosong",
                },
            },
            highlight: function (element) {
                $(element).closest('.form-control').removeClass('is-valid').addClass('is-invalid');
            },
            success: function (label, element) {
                $(label).closest('.form-control').removeClass('is-invalid').addClass('is-valid');
                $(element).removeClass('is-invalid').addClass('is-valid');
            },
            errorPlacement: function (error, element) {
                error.addClass('text-danger');
                error.addClass('text-sm');
                error.insertAfter(element);
            }
        });
    }

    validation();

    $('#name_item').on('input', function () {
        $(this).valid();
    });
    $('#total_items').on('input', function () {
        $(this).valid();
    });
    $('#total_items_good').on('input', function () {
        $(this).valid();
    });
    $('#total_items_crash').on('input', function () {
        $(this).valid();
    });
    $('#spesification').on('input', function () {
        $(this).valid();
    });

    function checkingEdit() {
        return $('#id').val() ? true : false;
    }

    $('#formTambah').submit(function (e) {
        e.preventDefault();
        inventoryservice.upsertData(e, checkingEdit);
    });

    $(document).on('click', '.edit-modal', function () {
        const id = $(this).data('id');
        inventoryservice.getDataById(id, checkingEdit);
    });

    $(document).on('click', '.delete-confirm', function () {
        const id = $(this).data('id');
        inventoryservice.deleteData(id);
    });

    $('#export').on('click', function (e) {
        console.log('Export clicked');
        e.preventDefault()
        inventoryservice.exportData()
    })

    $('#forminventoryModal').on('hidden.bs.modal', function () {
        $('#id').val('');
        $('#item_name').val('');
        $('#total_items').val('');
        $('#total_items_good').val('');
        $('#total_items_crash').val('');
        $('#spesification').val('');
        $('.form-control').removeClass('is-invalid').removeClass('is-valid');
        $('.error').remove();
    });
    $('#forminventoryModal').on('show.bs.modal', function () {
        $('#modal-title').html(`
            <i class="fas fa-box ms-2"></i>
            Form Data
        `);
    });


});