const ver_detalle = (id) => {
    $.ajax({
        url: 'php/detalles_producto.php',
        type: 'POST',
        dataType: 'json',
        data: { id: id },
        success: (response) => {
            console.log(response);
            if (response.failed == null) {
                if (response.success.nombre.length > 0) {
                    const producto = response.success;
                    $('#nombre').text(producto.nombre);
                    $('#codigo').text(producto.codigo);
                    $('#descripcion').text(producto.descripcion);
                    $('#costo').text(producto.costo);
                    $('#stock').text(producto.stock);
                    $('#cantidad').attr('max', producto.stock);
                    $('#agregar_carrito').attr('onclick', `agregar_carrito(${producto.id}, true)`);
                    $('#foto').attr('src', `img/productos/${producto.archivo}`);
                } else {
                    console.error('No se encontró el producto');
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
else {
    window.location = 'productos_list';
}