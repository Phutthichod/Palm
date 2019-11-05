$( document ).ready(function() {

    $('#addWeed').click(function(){
        console.log('fffff')
        $('.Modal').append(addModal);
        $('#addModal').modal('show');
    });
});