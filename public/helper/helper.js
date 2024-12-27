// alert succes message
function successAlert(message) {
    return Swal.fire({
        title: 'Success',
        text: message,
        icon: 'success',
        showCancelButton: false,
        confirmButtonText: 'OK'
    });
}

function errorAlert() {
    return Swal.fire({
        title: 'Error',
        text: 'Terjad kesalahan!',
        icon: 'error',
        showConfirmButton: true,
        timer: 1000
    });
}
function warningAlert(message) {
    Swal.fire({
        title: 'Peringatan !',
        text: message,
        icon: 'warning',
        timer: 5000,
        showConfirmButton: true,
        confirmButtonText: 'Ok',
        confirmButtonColor: '#FFAD46',
    });
}

// reload browser
function realoadBrowser() {
    window.location.reload();
}

// alert confirm message
function confirmDeleteAlert(message) {
    return Swal.fire({
        title: '<span style="font-size: 22px"> Konfirmasi</span>',
        text: "Apakah anda yakin?",
        showCancelButton: true,
        showConfirmButton: true,
        cancelButtonText: 'Tidak',
        confirmButtonText: 'Ya',
        reverseButtons: true,
        confirmButtonColor: '#48ABF7',
        cancelButtonColor: '#EFEFEF',
        customClass: {
            cancelButton: 'text-dark'
        }
    });
}

function successUpdateAlert() {
    return Swal.fire({
        title: 'Success',
        text: 'Data berhasil diperbaharui',
        icon: 'success',
        showConfirmButton: true,
        confirmButtonText: 'Ok',
        timer: 3000
    });
}

function successDeleteAlert() {
    return Swal.fire({
        title: 'Success',
        text: 'Data berhasil dihapus',
        icon: 'success',
        showConfirmButton: true,
        confirmButtonText: 'Ok',
        timer: 3000
    });
}

function categoryAlert() {
    Swal.fire({
        title:'Peringatan !',
        text: 'Nama kategori sudah ada !',
        icon: 'warning',
        showConfirmButton: true,
        timer: 3000,
    });
}

