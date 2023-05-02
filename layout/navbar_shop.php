<nav class="navbar navbar-expand navbar-dark bg-dark">
    <div class="navbar-brand ms-3 logo"></div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mx-auto">
            <li class="nav-item active">
                <a class="nav-link" href="home">HOME</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="productos">PRODUCTOS</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="contacto">CONTACTO</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="php/cerrar_sesion_cliente">BIENVENIDO <span class="username"></span></a>
            </li>
        </ul>
    </div>
    <a href="carrito">
        <div class="bg-white me-3 carrito"><img src="layout/img/carrito-de-compras.png"></div>
    </a>
</nav>

<style>
    @media (max-width: 768px) {
        .navbar-nav {
            flex-direction: column;
            text-align: center;
        }

        .navbar-nav .nav-item {
            margin: 5px 0;
        }
    }

    .logo {
        background-image: url(layout/img/logo.jpg);
        background-size: contain;
        background-repeat: no-repeat;
        background-position: center;
        width: 65px;
        height: 65px;
        border-radius: 15px;
    }

    .carrito {
        width: 35px;
        height: 35px;
        border-radius: 15px;
        float: right;
        cursor: pointer;
        padding: 0.35rem;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .carrito img{
        width: 100%;
        height: 100%;
    }
</style>