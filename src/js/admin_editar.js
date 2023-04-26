let correo_validado = false;
const validar_correo = (id) => {
    let correo = $('#correo').val();
    if (correo != '') {
        $.ajax({
            url: 'php/validar_correo.php',
            type: 'POST',
            dataType: 'json',
            async: false,
            data: { correo: correo, id: id },
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

const recuperar_datos = id => {
    $.ajax({
        url: 'php/recuperar_datos_admin.php',
        type: 'POST',
        dataType: 'json',
        async: false,
        data: { id: id },
        success: function (data) {
            if (data.failed == null) {
                $('#nombre').val(data.success.nombre);
                $('#apellidos').val(data.success.apellidos);
                $('#correo').val(data.success.correo);
                $('#rol').val(data.success.rol);
            }
            else
                console.error(data.failed);
        },
        error: function (data) {
            console.error(data);
        }
    });
}



const enviar_datos = $('#enviar_datos').click(e => {
    e.preventDefault();
    let formData = new FormData(e.target.form);
    const nombre = $('#nombre').val();
    const apellidos = $('#apellidos').val();
    const correo = $('#correo').val();
    const password = $('#password').val();
    const rol = $('#rol').val();
    console.log(nombre, apellidos, correo, password, rol, id)
    if (nombre != '' && apellidos != '' && correo != '' && rol != '' && correo_validado) {
        console.log('enviando datos');
        formData.append('nombre', nombre);
        formData.append('apellidos', apellidos);
        formData.append('correo', correo);
        formData.append('password', password);
        formData.append('rol', rol);
        formData.append('foto', $('#foto')[0].files[0]);
        formData.append('id', id);
        console.log(formData);
        $.ajax({
            url: 'php/editar_admin.php',
            type: 'POST',
            dataType: 'json',
            processData: false,
            contentType: false,
            data: formData,
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
    validar_correo(id);
});

let searchParams = new URLSearchParams(window.location.search)
let id;
if (searchParams.has('id')) {
    id = searchParams.get('id');
    recuperar_datos(id);
    console.log(id)
    validar_correo(id);
}
else {
    window.location = 'admin_list';
}