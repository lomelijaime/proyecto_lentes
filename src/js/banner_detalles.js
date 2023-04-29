const ver_detalle = (id) => {
    $.ajax({
        url: 'php/detalles_banner.php',
        type: 'POST',
        dataType: 'json',
        data: { id: id },
        success: (response) => {
            console.log(response);
            if (response.failed == null) {
                if (response.success.nombre.length > 0) {
                    const banner = response.success;
                    $('#nombre').text(banner.nombre);
                    $('#status').text(banner.status == 1 ? 'Activo' : 'Inactivo');
                    if(banner.status == 1){
                        $('#status').addClass('bg-success');
                    } else {
                        $('#status').addClass('bg-danger');
                    }
                    $('#foto').attr('src', `img/banners/${banner.archivo}`);
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

let searchParams = new URLSearchParams(window.location.search)

if (searchParams.has('id')) {
    let id = searchParams.get('id');
    ver_detalle(id);
}
else{
    window.location = 'banner_list';
}