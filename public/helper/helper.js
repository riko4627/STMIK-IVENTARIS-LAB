function succesAlert() {
    return Swal.fire({
        title: 'Success',
        text: 'Data berhasil terkirim',
        icon: 'success',
        showCancelButton: false,
        confirmButtonText: 'OK'
    })
}

function successUpdateAlert() {
    return Swal.fire({
        title: 'Success',
        text: 'Data berhasil diperbaharui',
        icon: 'success',
        showCancelButton: false,
        confirmButtonText: 'OK'
    })
}

function successDeleteAlert() {
    return Swal.fire({
        title: 'Success',
        text: 'Data berhasil dihapus',
        icon: 'success',
        showConfirmButton: true,
        timer: 5000
    })
}

function warningAlert() {
    return Swal.fire({
        title: 'Warning',
        text: 'Periksa kembali inputan anda!',
        icon: 'warning',
        showConfirmButton: true,
        timer: 5000
    })
}

function errorAlert() {
    return Swal.fire({
        title: 'Error',
        text: 'Terjad kesalahan!',
        icon: 'error',
        showConfirmButton: true,
        timer: 5000
    })
}

function deleteAlert() {
    return Swal.fire({
        title: 'Hapus ?',
        text: 'Anda yakin ingin menghapus ini? ',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Ya',
        cancelButtonText: 'Batal',
        reverseButton: true
    })
}

function categoryAlert(){
    return Swal.fire({
        title:'warning!',
        text: 'Nama kategori sudah ada',
        icon: 'warning',
        showConfirmButton: true,
        timer: 5000
    })
}

