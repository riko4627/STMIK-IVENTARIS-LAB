class inventoryService {
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
            const categoryResponse = await this.ajaxRequest(`${appUrl}/v1/category`, 'GET');
            const categories = categoryResponse.data;

            const labResponse = await this.ajaxRequest(`${appUrl}/v1/lab`, 'GET');
            const lab = labResponse.data;
            console.log(labResponse);

            const yearResponse = await this.ajaxRequest(`${appUrl}/v1/year`, 'GET');
            const year = yearResponse.data;

            this.populateCategoryDropdown(categories);
            this.populateLabDropdown(lab);
            this.populateYearDropdown(year);

            const responseData = await this.ajaxRequest(`${appUrl}/v1/inventory/`, 'GET');
            console.log(responseData);

            if (responseData && responseData.data) {
                let tableBody = '';
                responseData.data.forEach((item, index) => {
                    tableBody += `
                    <tr>
                        <td>${index + 1}</td>
                        <td>${item.item_name}</td>
                        <td>${item.total_items}</td>
                        <td>${item.total_items_good}</td>
                        <td>${item.total_items_crash}</td>
                        <td>${item.spesification}</td>
                        <td>${item.category.name}</td>
                        <td>${item.lab.name}</td>
                        <td>${item.year.year}</td>
                        <td class="text-center">
                            <button class="btn btn-outline-primary btn-sm edit-modal mr-1" data-toggle="modal" data-target="#forminventoryModal" data-id="${item.id}">
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
    populateCategoryDropdown(categories) {
        const categorySelect = $('#id_category');
        categorySelect.empty();
        categorySelect.append('<option value="" selected disabled hidden>- Pilih -</option>');

        $.each(categories, function (index, category) {
            categorySelect.append(`<option value="${category.id}">${category.name}</option>`);
        });
    }
    populateLabDropdown(lab) {
        const labSelect = $('#id_lab');
        labSelect.empty();
        labSelect.append('<option value="" selected disabled hidden>- Pilih -</option>');

        $.each(lab, function (index, lab) {
            labSelect.append(`<option value="${lab.id}">${lab.name}</option>`);
        });
    }
    populateYearDropdown(year) {
        const yearSelect = $('#id_year');
        yearSelect.empty();
        yearSelect.append('<option value="" selected disabled hidden>- Pilih -</option>');

        $.each(year, function (index, year) {
            yearSelect.append(`<option value="${year.id}">${year.year}</option>`);
        });
    }

    async upsertData(e, checkingEdit) {
        let submitButton = $(e.target).find(':submit');
        try {
            const formData = new FormData(e.target);

            if (checkingEdit()) {
                const id = $('#id').val();
                const responseData = await this.ajaxRequest(`${appUrl}/v1/inventory/update/${id}`, 'POST', formData);
                console.log(responseData);


                if (responseData.status === 'success') {
                    successAlert().then(() => {
                        realoadBrowser();
                        $('#forminventoryModal').modal('hide');
                    });
                } else if (responseData.code === 422) {
                    warningAlert();
                } else {
                    errorAlert();
                }
            } else {
                submitButton.attr('disabled', true);
                const responseData = await this.ajaxRequest(`${appUrl}/v1/inventory/create`, 'POST', formData);
                console.log(responseData);

                if (responseData.status === 'success') {
                    successAlert().then(() => {
                        realoadBrowser();
                        $('#forminventoryModal').modal('hide');
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
            const responseData = await this.ajaxRequest(`${appUrl}/v1/inventory/get/${id}`, 'GET');
            $('#id').val(responseData.data.id);
            $('#item_name').val(responseData.data.item_name);
            $('#total_items').val(responseData.data.total_items);
            $('#total_items_good').val(responseData.data.total_items_good);
            $('#total_items_crash').val(responseData.data.total_items_crash);
            $('#spesification').val(responseData.data.spesification);
            $('#id_category').val(responseData.data.id_category);
            $('#id_lab').val(responseData.data.id_lab);
            $('#id_year').val(responseData.data.id_year);

            const categoryResponse = await axios.get(`${appUrl}/v1/category`);
            const categories = categoryResponse.data;
            this.populateCategoryDropdown(categories); // Populate the dropdown
            $('#id_category').val(responseData.data.id_category);
            checkingEdit();
        } catch (error) {
            console.log(error);
        }
    }

    async deleteData(id) {
        try {
            const result = await confirmDeleteAlert();
            if (result.isConfirmed) {
                const responseData = await this.ajaxRequest(`${appUrl}/v1/inventory/delete/${id}`, 'DELETE');
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
    async exportData() {
        try {
            const result = await categoryAlert();
            if (result.isConfirmed) {
                window.location.href = `${appUrl}/v1/inventory/export`;
            }
        } catch (error) {
            console.error(error);
        }
    }
}

export default inventoryService;
