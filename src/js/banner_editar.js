
const enviar_datos = $('#enviar_datos').click((e) => {
    e.preventDefault();
    let formData = new FormData(e.target.form);
    const nombre = $('#nombre').val();
    if (nombre != '') {
        formData.append('nombre', nombre);
        formData.append('foto', $('#foto')[0].files[0]);
        formData.append('id', id);
        console.log('enviando datos');
        $.ajax({
            url: 'php/editar_banner.php',
            type: 'POST',
            dataType: 'json',
            data: formData,
            processData: false,
            contentType: false,
            success: function (data) {
                if (data.failed == null) {
                    alert(data.success);
                    window.location.href = 'banner_list';
                }
                else
                    console.error(data.failed);
            },
            error: function (data) {
                console.error(data);
            }
        });
    } else {
        $('#llenar').removeClass('d-none')
        setTimeout(() => {
            $('#llenar').addClass('d-none');
        }, 5000);
    }
});

const recuperar_datos = id => {
    $.ajax({
        url: 'php/recuperar_datos_banner.php',
        type: 'POST',
        dataType: 'json',
        async: false,
        data: { id: id },
        success: function (data) {
            if (data.failed == null) {
                $('#nombre').val(data.success.nombre);
            }
            else
                console.error(data.failed);
        },
        error: function (data) {
            console.error(data);
        }
    });
}



let searchParams = new URLSearchParams(window.location.search)
let id;
if (searchParams.has('id')) {
    id = searchParams.get('id');
    recuperar_datos(id);
    console.log(id)
}