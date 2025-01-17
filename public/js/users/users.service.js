class usersService {
    ajaxRequest(url, method, data = null) {
        return new Promise((resolve, reject) => {
            $.ajax({
                url,
                method,
                data,
                processData: false,
                contentType: false,
                success: (response) => resolve(response),
                error: (error) => reject(error),
            });
        });
    }

    async getAllData() {
        if ($.fn.dataTable.isDataTable('#dataTable')) {
            $('#dataTable').DataTable().clear().destroy();
        }

        $("#dataTable tbody").empty();

        try {
            const responseData = await this.ajaxRequest(`${appUrl}/v1/users/`, 'GET');
            console.log(responseData);

            if (responseData && responseData.data) {
                console.log();

                let tableBody = '';
                responseData.data.forEach((item, index) => {
                    tableBody += `
                    <tr>
                        <td>${index + 1}</td>
                        <td>${item.name}</td>
                        <td>${item.username}</td>
                        <td>${item.role}</td>
                        <td>${item.email}</td>

                        <td class="text-center">
                            <button class="btn btn-outline-primary btn-sm edit-modal mr-1" data-toggle="modal" data-target="#formUsersModal" data-id="${item.id}">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button type="button" class="delete-confirm btn btn-outline-danger btn-sm" data-id="${item.id}">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </td>
                    </tr>
                    `;
                });

                $("#dataTable tbody").html(tableBody);

                $('#dataTable').DataTable({
                    paging: true,
                    searching: true,
                    responsive: true,
                    order: [[0, 'asc']],
                    pageLength: 5,
                    lengthMenu: [[5, 10, 25, 50, 100], [5, 10, 25, 50, 100]],
                });
            } else {
                console.error('Response data is invalid:', responseData);
            }
        } catch (error) {
            console.error('Error fetching data:', error);
        }
    }

    async upsertData(e, checkingEdit) {
        let submitButton = $(e.target).find(':submit');
        try {
            const formData = new FormData(e.target);

            // Hanya tambahkan field yang diisi (tidak kosong)
            const filteredData = new FormData();
            for (const [key, value] of formData.entries()) {
                if (value) {
                    filteredData.append(key, value);
                }
            }

            if (checkingEdit()) {
                const id = $('#id').val();
                const responseData = await this.ajaxRequest(`${appUrl}/v1/users/update/${id}`, 'POST', filteredData);

                if (responseData.status === 'success') {
                    successAlert().then(() => {
                        realoadBrowser();
                        $('#formUsersModal').modal('hide');
                    });
                } else if (responseData.code === 422) {
                    warningAlert();
                } else {
                    errorAlert();
                }
            } else {
                submitButton.attr('disabled', true);
                const responseData = await this.ajaxRequest(`${appUrl}/v1/users/create`, 'POST', filteredData);
                console.log(responseData);

                if (responseData.status === 'success') {
                    successAlert().then(() => {
                        realoadBrowser();
                        $('#formUsersModal').modal('hide');
                    });
                } else if (responseData.code === 422) {
                    warningAlert();
                } else {
                    errorAlert();
                }
                submitButton.attr('disabled', false);
            }
        } catch (error) {
            submitButton.attr('disabled', false);
            console.error('Error:', error);
            errorAlert();
        }
    }


    async getDataById(id, checkingEdit) {
        try {
            const responseData = await this.ajaxRequest(`${appUrl}/v1/users/get/${id}`, 'GET');
            $('#id').val(responseData.data.id);
            $('#name').val(responseData.data.name);
            $('#username').val(responseData.data.username);
            $('#role').val(responseData.data.role);
            $('#email').val(responseData.data.email);
            $('#password').val(responseData.data.password);

            checkingEdit();
        } catch (error) {
            console.log(error);
        }
    }

    async deleteData(id) {
        try {
            const result = await confirmDeleteAlert();
            if (result.isConfirmed) {
                const responseData = await this.ajaxRequest(`${appUrl}/v1/users/delete/${id}`, 'DELETE');
                console.log(responseData);


                if (responseData.status === 'success') {
                    await successAlert().then(() => {
                        realoadBrowser();
                    });
                } else {
                    errorAlert();
                }
            }
        } catch (error) {
            errorAlert();
        }
    }

}

export default usersService;
