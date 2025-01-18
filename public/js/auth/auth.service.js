class authService {
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

    async login(e) {
        try {
            Swal.fire({
                title: 'Loading...',
                text: 'Please wait',
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });

            const formData = new formData(e.target);
            const responseData = await this.ajaxRequest(`${appUrl}/v1/login`, 'POST', formData);
            if(responseData.status === 'success') {
                successLogin().then(()=>{
                    window.location.href = `${appUrl}/cms/admin`
                })
            }
        } catch (error) {
            if (error.responseData.message == "error") {
                Swal.fire({
                    title: 'Error',
                    text: 'Login Gagal!',
                    icon: 'error',
                    showConfirmButton: false,
                    timer: 1000,
                });
            } else if (error.responseData.status == 422) {
                warningAlert()
            } else {
                errorAlert()
            }
        }
    }

}

export default authService;