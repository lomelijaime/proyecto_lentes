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
        <h1>Listado de pedidos</h1>
        <div class="table-responsive">
            <table id="t_pedido" class="table table-striped">
                <thead>
                    <tr class="text-center">
                        <th>ID</th>
                        <th>Fecha</th>
                        <th>Ver detalle</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
        <hr>
    </div>


    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="src/js/pedidos_list.js"></script>
    <script src="src/js/getUsername.js"></script>
</body>

</html>