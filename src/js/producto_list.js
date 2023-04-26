const t_prod = $('#t_prod tbody');

$(function () {
    mostrar_prod();
});
const mostrar_prod = () => {
    t_prod.empty();
    $.ajax({
        url: 'php/lista_producto.php',
        type: 'POST',
        dataType: 'json',
        success: function (data) {
            if (data.failed == null) {
                if (data.success.length > 0) {
                    const productos = data.success;
                    productos.forEach(prod => {
                        t_prod.append(`
                <tr class="text-center" id="prod_${prod.id}">
                    <td>${prod.id}</td>
                    <td>${prod.nombre}</td>
                    <td>${prod.codigo}</td>
                    <td>${prod.costo}</td>
                    <td>${prod.stock}</td>
                    <td><button class="btn btn-danger btn-sm" onclick="eliminar_prod(${prod.id})">Eliminar</button></td>
                    <td><button class="btn btn-info btn-sm text-white" onclick="ver_detalle(${prod.id})">Ver</button></td>
                    <td><button class="btn btn-dark btn-sm text-white" onclick="editar(${prod.id})">Editar</button></td>
                </tr>
                `);
                    });
                } else {
                    t_prod.append(`
                <tr>
                    <td colspan="8">No hay productos</td>
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

const eliminar_prod = (id) => {
    if (confirmar()) {
        $.ajax({
            url: 'php/eliminar_producto.php',
            type: 'POST',
            dataType: 'json',
            data: { id: id },
            success: function (data) {
                if (data.failed == null) {
                    alert(data.success);
                    $(`#prod_${id}`).remove();
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
    let confirmacion = confirm('¿Estás seguro de eliminar este producto?');
    if (confirmacion) {
        return true;
    } else {
        return false;
    }
}

const ver_detalle = id => {
    window.location = `producto_detalles?id=${id}`;
}

const editar = id => {
    window.location = `producto_editar?id=${id}`;
}