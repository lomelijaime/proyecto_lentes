const agregar_carrito = (id, detalles = false) => {
    let cantidad = 0;
    if (!detalles) {
        cantidad = $(`#cantidad_${id}`).val();
    } else {
        cantidad = $('#cantidad').val();
    }
    if (cantidad > 0) {
        $.ajax({
            url: 'php/agregar_carrito.php',
            type: 'POST',
            dataType: 'json',
            async: false,
            data: { id, cantidad },
            success: (response) => {
                console.log(response);
                if (response.failed == null) {
                    if (response.success == 'Producto agregado al carrito') {
                        let carrito = confirm('Producto agregado, desea ir al carrito?');
                        if (carrito) {
                            window.location = 'carrito';
                        }
                    } else {
                        alert('No se pudo agregar el producto al carrito');
                    }
                } else {
                    if (response.failed == 'Sesion no iniciada') {
                        alert('Inicie sesión para agregar productos al carrito');
                        window.location = 'index';
                    }
                    console.error(response.failed);
                }
            },
            error: (response) => {
                console.error(response);
            }
        });
    } else {
        alert('Ingrese una cantidad válida');
    }
}