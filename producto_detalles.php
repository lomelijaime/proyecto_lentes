<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <title>Admin List</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />
</head>

<body>

  <!-- Navbar -->
  <?php include 'layout/navbar.php'; ?>


  <div class="container my-5">
    <h1 class="text-center">Detalles del producto</h1>
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card text-center">
          <div class="card-body">
            <img src="" id="foto" alt="Foto de producto" class="img-fluid rounded-circle w-25 mb-3">
            <h5 class="card-title" id="nombre"></h5>
            <p class="card-text"><strong>Código:</strong> <span id="codigo"></span></p>
            <p class="card-text"><strong>Descripción:</strong> <span id="descripcion"></span></p>
            <p class="card-text"><strong>Costo:</strong> <span id="costo"></span></p>
            <p class="card-text"><strong>Stock:</strong> <span id="stock"></span></p>
            <p class="card-text"><strong>Status:</strong> <span class="badge bg-success" id="status"></span></p>
          </div>
        </div>
      </div>
    </div>
    <hr>
    <a href="producto_list" class="btn btn-primary">Regresar</a>
  </div>


  <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  <script src="src/js/producto_detalles.js"></script>
  <script src="src/js/getUsername.js"></script>
</body>

</html>