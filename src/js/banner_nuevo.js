
const enviar_datos = $('#enviar_datos').click((e) => {
    e.preventDefault();
    let formData = new FormData(e.target.form);
    const nombre = $('#nombre').val();
    if (nombre != '' && formData.get('foto').name != '') {
        formData.append('nombre', nombre);
        formData.append('foto', $('#foto')[0].files[0]);
        console.log('enviando datos');
        $.ajax({
            url: 'php/nuevo_banner.php',
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