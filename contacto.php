<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <link rel="shortcut icon" href="img/favicon_io_shop/favicon.ico" type="image/x-icon">
    <title>Shop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />
</head>

<body>

    <!-- Navbar -->
    <?php include 'layout/navbar_shop.php'; ?>


    <div class="container general my-5">
        <form action="php/enviar_correo.php" method="post">
            <div class="mb-3">
                <label for="name" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Correo electrónico</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="comments" class="form-label">Comentarios</label>
                <textarea class="form-control" id="comments" name="comments" rows="3" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
    </div>

    <!-- Footer -->
    <?php include 'layout/footer.php'; ?>

    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <!-- <script src="src/js/getUsername.js"></script> -->
    <script src="src/js/getUsername_cliente.js"></script>
</body>

</html>