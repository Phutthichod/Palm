// addWeed
$( document ).ready(function() {

    $('#addOrther').click(function(){
        console.log('fffff')
        $('.Modal').append(addModal);
        $('#addModal').modal('show');
    });
});