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
                    number: true
                },
                total_items_good: {
                    required: true,
                    number: true
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
                    number: 'form harus angka'
                },
                total_items_good: {
                    required: "Form tidak boleh kosong",
                    number: 'form harus angka'
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
        e.preventDefault()
        inventoryservice.exportData()
    })

    $('#total_items, #total_items_good').on('input', function () {
        const totalItems = parseInt($('#total_items').val()) || 0;
        const totalItemsGood = parseInt($('#total_items_good').val()) || 0;

        // Hitung total item rusak
        const totalItemsCrash = totalItems - totalItemsGood;
        const crashValue = totalItemsCrash < 0 ? 0 : totalItemsCrash;

        // Set nilai pada input yang di-disable dan input hidden
        $('#total_items_crash').val(crashValue);
        $('#hidden_total_items_crash').val(crashValue);
    });
    $('#summernote').summernote({
        tabsize: 2,
        height: 180,
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['insert', ['link']],
            ['view', ['fullscreen', 'codeview', 'help']]
        ],
        callbacks: {
            onInit: function () {
                const initialContent = $('#spesification').val().trim();
                $('#summernote').summernote('code', initialContent);
            },
            onChange: function (contents) {
                $('#spesification').val(contents); // Sinkronisasi konten Summernote ke textarea
            }
        }
    });



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
