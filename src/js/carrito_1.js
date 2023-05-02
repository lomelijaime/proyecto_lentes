const t_pedido = $('#t_pedido tbody');

const mostrar_carrito = () => {
    t_pedido.empty();
    $.ajax({
        url: 'php/detalles_carrito.php',
        type: 'POST',
        dataType: 'json',
        async: false,
        success: function (data) {
            if (data.failed == null) {
                if (data.success.length > 0) {
                    const pedidos = data.success;
                    pedidos.forEach(pedido => {
                        t_pedido.append(`
                <tr class="text-center" id="pedido_${pedido.id}">
                    <td>${pedido.id}</td>
                    <td>${pedido.nombre}</td>
                    <td>${pedido.codigo}</td>
                    <td><input type="number" id="cantidad_${pedido.id}" onchange="actualizar_pedido(${pedido.id}, ${pedido.costo})" min="1" max="${pedido.stock}" value="${pedido.cantidad}"></td>
                    <td id="sub_${pedido.id}">${pedido.precio}</td>
                    <td><button class="btn btn-danger" onclick="eliminar_producto_carrito(${pedido.id})">Eliminar</button></td>
                </tr>
                `);
                    });

                    let total = 0;
                    $("#t_pedido tbody tr").each(function () {
                        let subtotal = parseFloat($(this).find("td:eq(4)").text());
                        console.log("Subtotal: " + subtotal);
                        total += subtotal;
                    });
                    $("#total_pedido").text("$" + total.toFixed(2));

                } else {
                    t_pedido.append(`
                <tr>
                    <td colspan="5">No hay productos en el pedido</td>
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

mostrar_carrito();

const eliminar_producto_carrito = (id) => {

    //Confirmación de eliminación
    let confirmar = confirm("¿Está seguro de eliminar el producto del carrito?");
    if (!confirmar) {
        return;
    }

    $.ajax({
        url: 'php/eliminar_producto_carrito.php',
        type: 'POST',
        dataType: 'json',
        data: {
            id: id
        },
        success: function (data) {
            if (data.failed == null) {
                if (data.success == 'Producto eliminado correctamente') {
                    mostrar_carrito();
                } else {
                    console.error(data.success);
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

const actualizar_pedido = (id, costo) => {
    let cantidad = $(`#cantidad_${id}`).val();
    $.ajax({
        url: 'php/actualizar_producto_carrito.php',
        type: 'POST',
        dataType: 'json',
        data: {
            id: id,
            cantidad: cantidad,
            costo: costo
        },
        success: function (data) {
            if (data.failed == null) {
                if (data.success == 'Producto actualizado correctamente') {
                    mostrar_carrito();
                } else {
                    console.error(data.success);
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