const t_banner = $('#t_banner tbody');

$(function () {
    mostrar_banner();
});
const mostrar_banner = () => {
    t_banner.empty();
    $.ajax({
        url: 'php/lista_banner.php',
        type: 'POST',
        dataType: 'json',
        success: function (data) {
            if (data.failed == null) {
                if (data.success.length > 0) {
                    const banners = data.success;
                    banners.forEach(banner => {
                        t_banner.append(`
                <tr class="text-center" id="banner_${banner.id}">
                    <td>${banner.id}</td>
                    <td>${banner.nombre}</td>
                    <td>${banner.status}</td>
                    <td><button class="btn btn-danger btn-sm" onclick="eliminar_banner(${banner.id})">Eliminar</button></td>
                    <td><button class="btn btn-info btn-sm text-white" onclick="ver_detalle(${banner.id})">Ver</button></td>
                    <td><button class="btn btn-dark btn-sm text-white" onclick="editar(${banner.id})">Editar</button></td>
                </tr>
                `);
                    });
                } else {
                    t_banner.append(`
                <tr>
                    <td colspan="6">No hay banners</td>
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

const eliminar_banner = (id) => {
    if (confirmar()) {
        $.ajax({
            url: 'php/eliminar_banner.php',
            type: 'POST',
            dataType: 'json',
            data: { id: id },
            success: function (data) {
                if (data.failed == null) {
                    alert(data.success);
                    $(`#banner_${id}`).remove();
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
    let confirmacion = confirm('¿Estás seguro de eliminar este banner?');
    if (confirmacion) {
        return true;
    } else {
        return false;
    }
}

const ver_detalle = id => {
    window.location = `banner_detalles?id=${id}`;
}

const editar = id => {
    window.location = `banner_editar?id=${id}`;
}