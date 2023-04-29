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

    <div class="container">
        <h1>Editar banner</h1>
        <form enctype="multipart/form-data">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>
            <div class="mb-3">
                <label for="foto" class="form-label">Foto </label>
                <input type="file" class="form-control" id="foto" name="foto">
            </div>
            <button class="btn btn-success" id="enviar_datos" type="submit">Enviar</button>
            <div id="llenar" class="d-none">
                <span class="badge bg-danger">Faltan campos por llenar</span>
            </div>
        </form>
        <hr>
        <a href="banner_list" class="btn btn-primary">Regresar</a>

        <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
        <script src="src/js/banner_editar.js"></script>
        <script src="src/js/getUsername.js"></script>
</body>

</html>