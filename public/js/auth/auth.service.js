class authService {
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
            // Tangani error dan lempar ke `catch` di pemanggil
            throw {
                status: jqXHR.status,
                responseJSON: jqXHR.responseJSON || {}
            };
        }
    }

    async login(e) {
        try {
            // Tampilkan loading alert
            Swal.fire({
                title: 'Loading...',
                html: 'Please wait while processing...',
                allowOutsideClick: false,
                showCancelButton: false,
                showConfirmButton: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });

            const formData = new FormData(e.target);
            const responseData = await this.ajaxRequest(`${appUrl}/v1/login`, 'POST', formData);
            console.log(responseData);

            if (responseData.status === 'success') {
                Swal.close(); // Tutup loading alert
                successAlert().then(() => {
                    window.location.href = `${appUrl}/`;
                });
            }
        } catch (error) {
            Swal.close(); // Tutup loading alert dalam semua kondisi error
            console.error('Error:', error);

            // Tangani error berdasarkan kode status
            if (error.status === 401) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Login Gagal',
                    text: 'Email atau Password anda salah',
                    showConfirmButton: true,
                });
            } else if (error.status === 422) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Data Tidak Valid',
                    text: 'Harap periksa kembali data yang Anda masukkan.',
                    showConfirmButton: true,
                });
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Terjadi Kesalahan',
                    text: 'Silakan coba lagi nanti.',
                    showConfirmButton: true,
                });
            }
        }
    }
}

export default authService;
