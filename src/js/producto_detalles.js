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
                    $('#status').text(producto.status == 1 ? 'Activo' : 'Inactivo');
                    if(producto.status == 1){
                        $('#status').addClass('bg-success');
                    } else {
                        $('#status').addClass('bg-danger');
                    }
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
else{
    window.location = 'producto_list';
}