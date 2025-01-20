class dashboardService {
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
            throw {
                status: jqXHR.status,
                responseJSON: jqXHR.responseJSON
            };
        }
    }

    formatDate(dateString) {
        if (!dateString) return 'Tidak diketahui';

        const date = new Date(dateString);

        const options = {
            day: 'numeric',
            month: 'long',
            year: 'numeric',
            hour: '2-digit',
            minute: '2-digit',
            hour12: false
        };

        return date.toLocaleDateString('id-ID', options).replace(',', ' jam');
    }

    async getAllData() {
        $("#dataHistory tbody").empty();

        try {
            const responseData = await this.ajaxRequest(`${appUrl}/v1/inventory/history`, 'GET');
            console.log(responseData);

            if (responseData && responseData.data && Array.isArray(responseData.data)) {
                if (responseData.data.length === 0) {
                    $("#dataHistory tbody").html('<tr><td colspan="5" class="text-center">Belum ada history</td></tr>');
                    return;
                }

                const sortedData = responseData.data.sort((a, b) => {
                    const dateA = new Date(a.updated_at || a.created_at || a.deleted_at);
                    const dateB = new Date(b.updated_at || b.created_at || b.deleted_at);
                    return dateB - dateA;
                });

                let tableBody = '';

                sortedData.forEach((item, index) => {
                    let action = 'Tidak diketahui';

                    if (item.deleted_at) {
                        action = 'Hapus data';
                    } else if (item.created_at === item.updated_at) {
                        action = 'Buat data baru';
                    } else {
                        action = 'Pembaharuan data';
                    }

                    tableBody += `
                    <tr>
                        <td>${index + 1}</td>
                        <td>${item.item_name}</td>
                        <td>${item.created_by?.name || 'Tidak diketahui'}</td>
                        <td>${this.formatDate(item.updated_at || item.created_at || item.deleted_at)}</td>
                        <td>${action}</td>
                    </tr>
                `;
                });

                $("#dataHistory tbody").html(tableBody);

            } else {
                console.error('Response data is invalid:', responseData);
            }
        } catch (error) {
            console.error('Error fetching data:', error);
        }
    }
}

export default dashboardService;
