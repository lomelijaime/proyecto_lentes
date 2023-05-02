const iniciar_sesion = $('#login').click((e) => {
    e.preventDefault();
    const correo = $('#inputEmail').val();
    const password = $('#inputPassword').val();
    if (correo != '' && password != '') {
        $.ajax({
            url: 'php/login_cliente.php',
            type: 'POST',
            dataType: 'json',
            data: { correo: correo, password: password },
            success: function (data) {
                if (data.failed == null) {
                    if (data.success != null) {
                        if (data.success == 'Incorrecto') {
                            $('#InvalidUser').parent().removeClass('d-none');
                            setTimeout(() => {
                                $('#InvalidUser').parent().addClass('d-none');
                            }, 5000);
                        }
                        else {
                            window.location.href = 'home';
                        }
                    }
                }
                else {
                    console.error(data.failed);
                }
            },
            error: function (data) {
                console.error(data);
            }
        });
    } else {
        $('#emptyInputs').parent().removeClass('d-none');
        setTimeout(() => {
            $('#emptyInputs').parent().addClass('d-none');
        }, 5000);
    }
});

const get_session = () => {
    $.ajax({
        url: 'php/getUsername_cliente.php',
        type: 'POST',
        dataType: 'json',
        success: function (response) {
            console.log(response);
            if (response.success != null) {
                return true;
            } else {
                return false;
            }
        }
    });
};

if(get_session())
    window.location.href = 'home';
