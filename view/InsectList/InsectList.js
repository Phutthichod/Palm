$(document).ready(function () {
$(document).on('click','.card',function(){
  alert('click')
})
    $('#addInsect').click(function () {
        console.log('fffff')
        $('.Modal').append(addModal);
        $('#addModal').modal('show');
    });

    $('#changeInsect').click(function () {
        console.log('fffff')
        //$('.ca').getElementsByClassName("example");
        $('#changeInsect').innerHTML = "hello";
    });

});

function myFunction() {
    var list = document.getElementsByClassName("example")[0];
    list.getElementsByClassName("child")[0].innerHTML = "Milk";
}

function myFunction() {
    document.getElementById("changeInsect").style.color = "blue";
}
/*
  $(".flipper").click(function() {
    var target = $( event.target );
    if ( target.is("a") ) {
      //follow that link
      return true;
    } else {
      $(this).toggleClass("flip");
    }
    return false;
  });
  */
function myFunction() {
    var x = document.getElementsByClassName("example");
    x[0].innerHTML = "Hello World!";
}
