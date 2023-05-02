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
                    <td>${pedido.cantidad}</td>
                    <td id="sub_${pedido.id}">${pedido.precio}</td>
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

const finalizar_pedido = () => {
    let confirmar = confirm("¿Está seguro de finalizar el pedido?");
    if (!confirmar) {
        return;
    }

    $.ajax({
        url: 'php/finalizar_pedido.php',
        type: 'POST',
        dataType: 'json',
        async: false,
        success: function (data) {
            if (data.failed == null) {
                if (data.success == 'Finalizado') {
                    alert("Pedido finalizado con éxito, será redirigido a la página principal");
                    location.href = "home";
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

$("#finalizar_pedido").click(finalizar_pedido);