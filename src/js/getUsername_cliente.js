const getUsername_cliente = () => {
    $.ajax({
        url: 'php/getUsername_cliente.php',
        type: 'POST',
        dataType: 'json',
        async: false,
        success: function (response) {
            if (response.failed == 'No hay sesión iniciada') {
                $('.username').text('invitado');
            } 
            else if (response.success !== null) {
                $('.username').text(response.success);
            }
        }
    });
}

getUsername_cliente();