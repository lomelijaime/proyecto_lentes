const t_pedido = $('#t_pedido tbody');

$(function () {
    mostrar_pedido();
});
const mostrar_pedido = () => {
    t_pedido.empty();
    $.ajax({
        url: 'php/lista_pedidos.php',
        type: 'POST',
        dataType: 'json',
        success: function (data) {
            if (data.failed == null) {
                if (data.success.length > 0) {
                    const pedidos = data.success;
                    pedidos.forEach(pedido => {
                        t_pedido.append(`
                <tr class="text-center" id="pedido_${pedido.id}">
                    <td>${pedido.id}</td>
                    <td>${pedido.fecha}</td>
                    <td><button class="btn btn-info btn-sm text-white" onclick="ver_detalle(${pedido.id})">Ver</button></td>
                </tr>
                `);
                    });
                } else {
                    t_pedido.append(`
                <tr>
                    <td colspan="3">No hay pedidos</td>
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

const ver_detalle = id => {
    window.location = `pedidos_detalles?id=${id}`;
}
