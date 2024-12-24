class labService {
    // Mengambil semua data lab dan menampilkan di DataTable
    async getAllData() {
        // Hancurkan DataTable yang ada jika sudah ada
        if ($.fn.dataTable.isDataTable('#dataTable')) {
            $('#dataTable').DataTable().clear().destroy();
        }

        // Hancurkan tabel lama dan kosongkan tbody
        $("#dataTable tbody").empty();

        try {
            // Mengambil data dari API
            const response = await axios.get(`${appUrl}/v1/lab/`);
            const responseData = response.data; // Tidak perlu await lagi di sini
            console.log(responseData);

            // Mengecek apakah data valid
            if (responseData && responseData.data) {
                let tableBody = '';

                // Iterasi data dan tambahkan baris ke tabel
                responseData.data.forEach((item, index) => {
                    tableBody += `
                    <tr>
                        <td>${index + 1}</td>
                        <td>${item.name}</td>
                        <td>${item.location}</td>
                        <td class="text-center">
                            <button class="btn btn-outline-primary btn-sm edit-modal mr-1" data-toggle="modal" data-target="#formLabModal" data-id="${item.id}">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button type="button" class="delete-confirm btn btn-outline-danger btn-sm" data-id="${item.id}">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </td>
                    </tr>
                    `;
                });

                // Tambahkan baris ke tbody
                $("#dataTable tbody").html(tableBody);

                // Inisialisasi ulang DataTable setelah data dimuat
                $('#dataTable').DataTable({
                    paging: true,
                    searching: true,
                    responsive: true,
                    order: [[0, 'asc']], // Urutkan berdasarkan kolom pertama
                    pageLength: 5, // Nilai default saat pertama kali dimuat
                    lengthMenu: [ [5, 10, 25, 50, 100], [5, 10, 25, 50, 100] ] // Pilihan jumlah data yang ditampilkan
                });
            } else {
                console.error('Response data is invalid:', responseData);
            }

        } catch (error) {
            console.error('Error fetching data:', error);
        }
    }



    // Menambahkan atau memperbarui data
    async createData(e, checkingEdit) {
        let submitButton = $(e.target).find(':submit');
        try {
            const formData = new FormData(e.target);

            if (checkingEdit()) {
                const id = $('#id').val();
                const response = await axios.post(`${appUrl}/v1/lab/update/${id}`, formData);
                const responseData = response.data; // Tidak perlu await lagi di sini

                if (responseData.status === 'success') {
                    successUpdateAlert().then(() => {
                        $('#formLabModal').modal('hide');
                        this.getAllData();
                    });
                } else {
                    errorAlert();
                }
            } else {
                submitButton.attr('disabled', true);
                const response = await axios.post(`${appUrl}/v1/lab/create`, formData);
                const responseData = response.data; // Tidak perlu await lagi di sini
                console.log(responseData);

                if (responseData.status === 'success') {
                    successAlert().then(() => {
                        $('#formLabModal').modal('hide');
                    });
                    this.getAllData();
                } else {
                    errorAlert();
                }
                submitButton.attr('disabled', false);
            }
        } catch (error) {
            submitButton.attr('disabled', false);
            console.log(error);

            // Menangani error berdasarkan respons
            if (error.response && error.response.data) {
                if (error.response.data.name === 'Nama lab sudah ada') {
                    labAlert();
                } else if (error.response.data.location === 'location sudah ada') {
                    labAlert();
                } else if (error.response.status === 422) {
                    warningAlert();
                } else {
                    errorAlert();
                }
            } else {
                errorAlert(); // Tangani error jika tidak ada data respons
            }
        }
    }

    // Mengambil data berdasarkan ID untuk edit
    async getDataById(id, checkingEdit) {
        try {
            const response = await axios.get(`${appUrl}/v1/lab/get/${id}`);
            const responseData = response.data; // Tidak perlu await lagi di sini

            // Mengisi form modal dengan data yang didapat
            $('#modal-title').html("Edit Data");
            $('#id').val(responseData.data.id);
            $('#name').val(responseData.data.name);
            $('#location').val(responseData.data.location);

            // Menggenerate preview gambar jika ada
            generatePreviewImg('form-preview');
            checkingEdit();
        } catch (error) {
            console.log(error);
        }
    }

    // Menghapus data
    async deleteData(id) {
        try {
            deleteAlert().then(async (result) => {
                if (result.isConfirmed) {
                    const response = await axios.delete(`${appUrl}/v1/lab/delete/${id}`);
                    const responseData = response.data; // Tidak perlu await lagi di sini

                    if (responseData.status === 'success') {
                        successDeleteAlert().then(() => {
                            this.getAllData();
                        });
                    } else {
                        errorAlert();
                    }
                }
            });
        } catch (error) {
            errorAlert();
        }
    }
}

export default labService;
