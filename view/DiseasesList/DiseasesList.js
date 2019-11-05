$(document).ready(function () {

    $('#addDiseases').click(function () {
        console.log('fffff')
        $('.Modal').append(addModal);
        $('#addModal').modal('show');
    });
});