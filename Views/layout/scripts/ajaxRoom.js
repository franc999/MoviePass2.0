
$(document).ready(function(){

    $.ajax({

        type: 'POST',
        url: 'Controllers/readAvailableRoom.php',

    }).done(function(getRooms){ // cachea la funcion getRooms de readAvailableRoom

        $('#id_room').html(getRooms)
    }).fail(function(){

        alert('Hubo un error')
    })
})