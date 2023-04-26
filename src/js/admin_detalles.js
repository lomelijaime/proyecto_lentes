const ver_detalle = (id) => {
    $.ajax({
        url: 'php/detalles_admin.php',
        type: 'POST',
        dataType: 'json',
        data: { id: id },
        success: (response) => {
            if (response.failed == null) {
                if (response.success.nombre.length > 0) {
                    const administrador = response.success;
                    $('#nombre').text(administrador.nombre + ' ' + administrador.apellidos);
                    $('#correo').text(administrador.correo);
                    administrador.rol == 1 ? $('#rol').text('Gerente') : $('#rol').text('Ejecutivo');
                    $('#status').text(administrador.estatus == 1 ? 'Activo' : 'Inactivo');
                    if(administrador.estatus == 1){
                        $('#status').addClass('bg-success');
                    } else {
                        $('#status').addClass('bg-danger');
                    }
                    $('#foto').attr('src', `img/administradores/${administrador.archivo}`);
                } else {
                    console.error('No se encontró el administrador');
                }
            } else {
                console.error(response.failed);
            }
        },
        error: (response) => {
            console.error(response);
        }
    })
}

let searchParams = new URLSearchParams(window.location.search)

if (searchParams.has('id')) {
    let id = searchParams.get('id');
    ver_detalle(id);
}
else{
    window.location = 'admin_list';
}