class categoryService {
    async getAllData() {
        $('#dataTable').DataTable().destroy();
        $("#dataTable tbody").empty();

        let dataTable = $('#dataTable').DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
        });

        try {
            const response = await axios.get(`${appUrl}/v1/category/`)
            const responseData = await response.data
            console.log(responseData);


            if (responseData && responseData.data) {
                let tableBody = '';

                responseData.data.forEach((item, index) => {
                    tableBody += `
                    <tr>
                        <td>${index + 1}</td>
                        <td>${item.name}</td>
                        <td class="text-center">
                            <button class="btn btn-outline-primary btn-sm edit-modal mr-1" data-toggle="modal" data-target="#formCategoryModal" data-id="${item.id}">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button type="submit" class="delete-confirm btn btn-outline-danger btn-sm" data-id="${item.id}">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </td>
                    </tr>
                `;
                });

                // Tambahkan baris ke tbody
                $("#dataTable tbody").html(tableBody);

                // Reload DataTable dengan data baru
                dataTable.rows.add($('#dataTable tbody tr')).draw();
            } else {
                console.error('Response data is invalid:', responseData);
            }
        } catch (error) {
            console.error('Error fetching data:', error);
        }
    }


    async createData(e, checkingEdit) {
        let submitButton = $(e.target).find(':submit')
        try {
            const formData = new FormData(e.target)
            if (checkingEdit()) {
                const id = $('#id').val()
                const response = await axios.post(`${appUrl}/v1/category/update/${id}`, formData)
                const responseData = await response.data
                if (responseData.status === 'success') {
                    successUpdateAlert().then(() => {
                        $('#formCategoryModal').modal('hide')
                        this.getAllData()
                    })
                } else {
                    errorAlert()
                }
            } else {
                submitButton.attr('disabled', true)
                const response = await axios.post(`${appUrl}/v1/category/create`, formData)
                const responseData = await response.data
                console.log(responseData)
                if (responseData.status === 'success') {
                    successAlert().then(() => {
                        $('#formCategoryModal').modal('hide')
                    })
                    this.getAllData()
                    submitButton.attr('disabled', false)
                } else {
                    errorAlert()
                    submitButton.attr('disabled', false)
                }
            }
        } catch (error) {
            submitButton.attr('disabled', false)
            console.log(error)
            if (error.response.data.name == 'Nama kategori sudah ada') {
                categoryAlert()
            } else if (error.response.status == 422) {
                warningAlert()
            } else {
                errorAlert()
            }
        };
    }

    async getDataById(id, checkingEdit) {
        try {
            const response = await axios.get(`${appUrl}/v1/category/get/${id}`)
            const responseData = await response.data
            $('#modal-title').html("Edit Data")
            $('#id').val(responseData.data.id)
            $('#name').val(responseData.data.name)
            generatePreviewImg('form-preview')
            checkingEdit()
        } catch (error) {
            console.log(error)
        }
    }

    async deleteData(id) {
        try {
            deleteAlert().then(async (result) => {
                if (result.isConfirmed) {
                    const response = await axios.delete(`${appUrl}/v1/category/delete/${id}`)
                    const responseData = await response.data
                    if (responseData.status === 'success') {
                        successDeleteAlert().then(() => {
                            this.getAllData()
                        })
                    } else {
                        errorAlert()
                    }
                }
            })
        } catch (error) {
            errorAlert()
        }
    }
}

export default categoryService;
