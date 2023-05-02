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
        #banner {
            width: 100%;
            height: 30vh;
            /* object-fit: cover; */
        }

        .card-img-top {
            object-fit: cover;
            width: 100%;
            height: 8rem;
        }

        .prod {
            max-width: 20rem;
        }

        .general {
            max-width: 600px;
        }
    </style>

    <!-- Navbar -->
    <?php include 'layout/navbar_shop.php'; ?>


    <div class="container general my-5">
        <div class="text-center"><img id="banner" src=""></div>
        <h3 class="text-center mt-5">Productos destacados</h3>
        <div id="productos_destacados" class="mt-4container row flex-grow-1"></div>
    </div>


    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <!-- <script src="src/js/getUsername.js"></script> -->
    <script src="src/js/getUsername_cliente.js"></script>
    <script src="src/js/productos_destacados.js"></script>
    <script src="src/js/home.js"></script>
    <script src="src/js/carrito.js"></script>
</body>

</html>