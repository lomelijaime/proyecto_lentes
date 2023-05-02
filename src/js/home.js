const banner_aleatorio = () => {
    $.ajax({
        url: 'php/banner_home.php',
        type: 'POST',
        dataType: 'json',
        async: false,
        success: (response) => {
            console.log(response);
            if (response.failed == null) {
                if (response.success.archivo.length > 0) {
                    const banner = response.success.archivo;
                    $('#banner').attr('src', `img/banners/${banner}`);
                } else {
                    console.error('No se encontró el banner');
                }
            } else {
                console.error(response.failed);
            }
        },
        error: (response) => {
            console.error(response);
        }
    })
}

banner_aleatorio();

productos_destacados();