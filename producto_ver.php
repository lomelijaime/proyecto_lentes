<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <link rel="shortcut icon" href="img/favicon_io_shop/favicon.ico" type="image/x-icon">
  <title>Shop</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />
</head>

<body>
  <style>
    .card-img-top {
      object-fit: cover;
      width: 100%;
      height: 8rem;
    }

    .prod {
      max-width: 18rem;
    }
  </style>

  <!-- Navbar -->
  <?php include 'layout/navbar_shop.php'; ?>


  <div class="container my-5">
    <h1 class="text-center">Detalles del producto</h1>
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card">
          <div class="card-body">
            <div class="text-center"><img src="" id="foto" alt="Foto de producto" class="img-fluid w-75 mb-3"></div>
            <h5 class="card-title text-center" id="nombre"></h5>
            <p class="card-text"><strong>Código:</strong> <span id="codigo"></span></p>
            <p class="card-text"><strong>Descripción:</strong> <span id="descripcion"></span></p>
            <p class="card-text"><strong>Costo:</strong> $<span id="costo"></span></p>
            <p class="card-text"><strong>Stock:</strong> <span id="stock"></span></p>
            <div class="d-flex justify-content-between">
              <div class="">
                <label for="cantidad" class="col-form-label me-2">Cantidad: </label>
                <input type="number" class="form-control" id="cantidad" min="1" value="1" style="width: min-content">
              </div>
              <button class="btn btn-dark btn-block mt-2" id="agregar_carrito">Agregar al carrito</button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <h3 class="text-center mt-5">Productos relacionados</h3>
    <div id="productos_destacados" class="mt-4 container row flex-grow-1"></div>
    <hr>
    <a href="productos" class="btn btn-primary">Regresar a productos</a>
  </div>


  <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  <script src="src/js/producto_ver.js"></script>
  <script src="src/js/productos_destacados.js"></script>
  <script src="src/js/carrito.js"></script>
  <script src="src/js/getUsername_cliente.js"></script>
</body>

</html>