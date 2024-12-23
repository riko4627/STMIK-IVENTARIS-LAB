import labService from './lab.service.js';

$(document).ready(function () {
    const labservice = new labService()
    labservice.getAllData();

    function validation() {
        $('#formTambah').validate({
            rules: {
                name: {
                    required: true
                },
                location: { 
                    required: true
                }
            },
            messages: {
                name: {
                    required: "Kategori tidak boleh kosong"
                },
                location: { // Tambahkan pesan validasi untuk lokasi
                    required: "Lokasi tidak boleh kosong"
                }
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

    $('#name, #location').on('input', function () {
        $(this).valid();
    });

    function checkingEdit() {
        return $('#id').val() ? true : false;
    }

    $('#formTambah').submit(function (e) {
        e.preventDefault();
        labservice.createData(e, checkingEdit); // Proses penyimpanan data
    });

    $(document).on('click', '.edit-modal', function () {
        const id = $(this).data('id');
        labservice.getDataById(id, checkingEdit); // Ambil data untuk mode edit
    });

    $(document).on('click', '.delete-confirm', function () {
        const id = $(this).data('id');
        labservice.deleteData(id); // Hapus data berdasarkan ID
    });

    $('#formLabModal').on('hidden.bs.modal', function () {
        // Reset field dan status form setelah modal ditutup
        $('#id').val('');
        $('#name').val('');
        $('#location').val('');
        $('#modal-title').text('Tambah Data');
        $('.form-control').removeClass('is-invalid').removeClass('is-valid');
        $('.error').remove();
        $('#preview').remove();
    });

});
