const t_admin = $('#t_admin tbody');

$(function () {
    mostrar_admin();
});
const mostrar_admin = () => {
    t_admin.empty();
    $.ajax({
        url: 'php/lista_admin.php',
        type: 'POST',
        dataType: 'json',
        success: function (data) {
            if (data.failed == null) {
                if (data.success.length > 0) {
                    const administradores = data.success;
                    administradores.forEach(admin => {
                        let rol = '';
                        admin.rol == 1 ? rol = 'Gerente' : rol = 'Ejecutivo';

                        t_admin.append(`
                <tr id="adm_${admin.id}">
                    <td>${admin.id}</td>
                    <td>${admin.nombre} ${admin.apellidos}</td>
                    <td>${admin.correo}</td>
                    <td>${rol}</td>
                    <td class='text-center'><button class="btn btn-danger btn-sm" onclick="eliminar_admin(${admin.id})">Eliminar</button></td>
                    <td class='text-center'><button class="btn btn-info btn-sm text-white" onclick="ver_detalle(${admin.id})">Ver</button></td>
                    <td class='text-center'><button class="btn btn-dark btn-sm text-white" onclick="editar(${admin.id})">Editar</button></td>
                </tr>
                `);
                    });
                } else {
                    t_admin.append(`
                <tr>
                    <td colspan="5">No hay administradores</td>
                </tr>
                `);
                }
            } else {
                console.error(data.failed);
            }
        },
        error: function (data) {
            console.error(data);
        }
    });
}

const eliminar_admin = (id) => {
    if (confirmar()) {
        $.ajax({
            url: 'php/eliminar_admin.php',
            type: 'POST',
            dataType: 'json',
            data: { id: id },
            success: function (data) {
                if (data.failed == null) {
                    alert(data.success);
                    $(`#adm_${id}`).remove();
                }
                else
                    console.error(data.failed);
            },
            error: function (data) {
                console.error(data);
            }
        });
    }
}

const confirmar = () => {
    let confirmacion = confirm('¿Estás seguro de eliminar este administrador?');
    if (confirmacion) {
        return true;
    } else {
        return false;
    }
}

const ver_detalle = id => {
    window.location = `admin_detalles?id=${id}`;
}

const editar = id => {
    window.location = `admin_editar?id=${id}`;
}