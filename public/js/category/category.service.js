class categoryService {
    async ajaxRequest(url, method, formData) {
        try {
            const response = await $.ajax({
                url: url,
                type: method,
                data: formData,
                processData: false,
                contentType: false
            });
            return response;
        } catch (jqXHR) {
            // Memastikan error ditangkap dengan benar
            throw {
                status: jqXHR.status,
                responseJSON: jqXHR.responseJSON
            };
        }
    }

    async getAllData() {
        if ($.fn.dataTable.isDataTable('#dataTable')) {
            $('#dataTable').DataTable().clear().destroy();
        }

        $("#dataTable tbody").empty();

        try {
            const responseData = await this.ajaxRequest(`${appUrl}/v1/category/`, 'GET');
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

                $('#dataTable').DataTable({
                    paging: true,
                    responsive: true,
                    pageLength: 5,
                    order: [[0, 'asc']],
                    lengthMenu: [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]]
                });

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
            const name = formData.get('name');

            if (checkingEdit()) {
                const id = $('#id').val()
                const responseData = await this.ajaxRequest(`${appUrl}/v1/category/update/${id}`, 'POST', formData);
                console.log(responseData);
                if (responseData.status === 'success') {
                    successAlert().then(() => {
                        $('#formCategoryModal').modal('hide')
                        realoadBrowser();
                    })
                } else {
                    errorAlert()
                }
            } else {
                submitButton.attr('disabled', true)
                const responseData = await this.ajaxRequest(`${appUrl}/v1/category/create`, 'POST', formData);
                console.log(responseData);

                if (responseData.status === 'success') {
                    successAlert().then(() => {
                        realoadBrowser();
                        $('#formCategoryModal').modal('hide');
                    });
                    submitButton.attr('disabled', false)
                } else {
                    errorAlert();
                }
                submitButton.attr('disabled', false)
            }
        } catch (error) {
            submitButton.attr('disabled', false)
            console.log('error: ', error);

            // Membaca respon dari error
            const responseData = error.responseJSON || error.responseData || null;

            if (responseData?.status === 'not validate') {
                warningAlert('Form tidak boleh kosong!');
                return;
            } else if (responseData?.message === 'Nama kategori sudah ada') {
                categoryAlert();
            } else {
                errorAlert();
            }
        };
    }

    async getDataById(id, checkingEdit) {
        try {
            const responseData = await this.ajaxRequest(`${appUrl}/v1/category/get/${id}`, 'GET');
            console.log(responseData);
            $('#modal-title').html("Edit Data")
            $('#id').val(responseData.data.id)
            $('#name').val(responseData.data.name)
            checkingEdit()
        } catch (error) {
            console.log(error)
        }
    }

    async deleteData(id) {
        try {
            confirmDeleteAlert().then(async (result) => {
                if (result.isConfirmed) {
                    const responseData = await this.ajaxRequest(`${appUrl}/v1/category/delete/${id}`, 'DELETE');
                    console.log(responseData);
                    if (responseData.status === 'success') {
                        successAlert().then(() => {
                            realoadBrowser();
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
