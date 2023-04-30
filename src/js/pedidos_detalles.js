const t_pedido = $('#t_pedido tbody');

const mostrar_pedido = id => {
    t_pedido.empty();
    $.ajax({
        url: 'php/detalles_pedidos.php',
        type: 'POST',
        dataType: 'json',
        async: false,
        data: { id: id },
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

let searchParams = new URLSearchParams(window.location.search)

if (searchParams.has('id')) {
    const id = searchParams.get('id');
    mostrar_pedido(id);
}
else {
    window.location = 'pedidos_list';
}
let total = 0;
$("#t_pedido tbody tr").each(function () {
    let subtotal = parseFloat($(this).find("td:eq(4)").text());
    console.log("Subtotal: " + subtotal);
    total += subtotal;
});
$("#total_pedido").text("$" + total.toFixed(2));
