const productos = () => {
    $.ajax({
        url: 'php/productos_todos.php',
        type: 'POST',
        dataType: 'json',
        async: false,
        success: (response) => {
            console.log(response);
            if (response.failed == null) {
                if (response.success.length > 0) {
                    const productos = response.success;
                    let html = '';
                    productos.forEach(producto => {
                        html += `
                        <div class="col-12 col-md-4 d-flex justify-content-center">
                            <div class="card mb-4 flex-fill prod">
                                <a href="producto_ver?id=${producto.id}"><img src="img/productos/${producto.archivo}" class="card-img-top" alt="producto"></a>
                                <div class="card-body d-flex flex-column justify-content-between">
                                    <h5 class="card-title text-center">${producto.nombre}</h5>
                                    <p class="card-text text-center">$${producto.costo}</p>
                                    <div class="d-flex justify-content-center">
                                        <label for="cantidad_${producto.id}" class="col-form-label me-2">Cantidad: </label>
                                        <input type="number" class="form-control" id="cantidad_${producto.id}" min="1" max="${producto.stock}" value="1" style="width: min-content">
                                    </div>
                                    <button class="btn btn-dark btn-block mt-2" onclick="agregar_carrito(${producto.id})">Agregar al carrito</button>
                                </div>
                            </div>
                        </div>
                        `;
                    });
                    $('#productos').html(html);
                } else {
                    console.error('No se encontraron productos');
                }
            } else {
                console.error(response.failed);
            }
        },
        error: (response) => {
            console.error(response);
        }
    });
}

productos();