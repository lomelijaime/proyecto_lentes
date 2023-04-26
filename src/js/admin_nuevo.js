let correo_validado = false;
const validar_correo = () => {
    let correo = $('#correo').val();
    if (correo != '') {
        $.ajax({
            url: 'php/validar_correo.php',
            type: 'POST',
            dataType: 'json',
            async: false,
            data: { correo: correo },
            success: function (data) {
                if (data.failed == null) {
                    if (data.success != null) {
                        if (data.success == 'repetido') {
                            $('#repetido').removeClass('d-none')
                            setTimeout(() => {
                                $('#repetido').addClass('d-none');
                            }, 5000);
                            correo_validado = false;
                        }
                        else {
                            $('#repetido').addClass('d-none');
                            correo_validado = true;
                        }
                    }
                }
                else {
                    console.error(data.failed);
                    correo_validado = false;
                }
            },
            error: function (data) {
                console.error(data);
                correo_validado = false;
            }
        });
    }
}

const enviar_datos = $('#enviar_datos').click((e) => {
    e.preventDefault();
    let formData = new FormData(e.target.form);
    const nombre = $('#nombre').val();
    const apellidos = $('#apellidos').val();
    const correo = $('#correo').val();
    const password = $('#password').val();
    const rol = $('#rol').val();
    if (nombre != '' && apellidos != '' && correo != '' && password != '' && rol != '' && correo_validado && formData.get('foto').name != '') {
        formData.append('nombre', nombre);
        formData.append('apellidos', apellidos);
        formData.append('correo', correo);
        formData.append('password', password);
        formData.append('rol', rol);
        formData.append('foto', $('#foto')[0].files[0]);
        console.log('enviando datos');
        $.ajax({
            url: 'php/nuevo_admin.php',
            type: 'POST',
            dataType: 'json',
            data: formData,
            processData: false,
            contentType: false,
            success: function (data) {
                if (data.failed == null) {
                    alert(data.success);
                    window.location.href = 'admin_list';
                }
                else
                    console.error(data.failed);
            },
            error: function (data) {
                console.error(data);
            }
        });
    } else {
        $('#llenar').removeClass('d-none')
        setTimeout(() => {
            $('#llenar').addClass('d-none');
        }, 5000);
    }
});

$('#correo').blur(() => {
    validar_correo();
});
