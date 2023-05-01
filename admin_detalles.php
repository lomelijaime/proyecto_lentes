<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <link rel="shortcut icon" href="img/favicon_io/favicon.ico" type="image/x-icon">
  <title>Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />
</head>

<body>

  <!-- Navbar -->
  <?php include 'layout/navbar.php'; ?>


  <div class="container my-5">
    <h1 class="text-center">Detalles del administrador</h1>
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card text-center">
          <div class="card-body">
            <img src="" id="foto" alt="Foto de perfil" class="img-fluid rounded-circle w-25 mb-3">
            <h5 class="card-title" id="nombre"></h5>
            <p class="card-text"><strong>Correo:</strong> <span id="correo"></span></p>
            <p class="card-text"><strong>Rol:</strong> <span id="rol"></span></p>
            <p class="card-text"><strong>Status:</strong> <span class="badge bg-success" id="status"></span></p>
          </div>
        </div>
      </div>
    </div>
    <hr>
    <a href="admin_list" class="btn btn-primary">Regresar</a>
  </div>


  <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  <script src="src/js/admin_detalles.js"></script>
  <script src="src/js/getUsername.js"></script>
</body>

</html>