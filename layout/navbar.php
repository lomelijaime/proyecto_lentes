<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Admin system</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">INICIO</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="admin_list">ADMINISTRADORES</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="producto_list">PRODUCTOS</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="banner_list">BANNERS</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="pedidos_list">PEDIDOS</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">BIENVENIDO <span class="username"></span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="php/cerrar_sesion">CERRAR SESIÓN</a>
            </li>
        </ul>
    </div>
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
</style>