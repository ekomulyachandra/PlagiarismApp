const flashdata = $('.flash-data').data('flashdata');
const icon = $('.flash-data').data('icon');
console.log(flashdata);
if (flashdata) {
    Swal.fire({
        title: '' + flashdata,
        icon: icon,
        text: '' + flashdata,
        showConfirmButton: false,
        timer: 1500
    });
}