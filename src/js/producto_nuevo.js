let codigo_validado = false;
const validar_codigo = () => {
    let codigo = $('#codigo').val();
    if (codigo != '') {
        $.ajax({
            url: 'php/validar_codigo.php',
            type: 'POST',
            dataType: 'json',
            async: false,
            data: { codigo: codigo },
            success: function (data) {
                if (data.failed == null) {
                    if (data.success != null) {
                        if (data.success == 'repetido') {
                            $('#repetido').removeClass('d-none')
                            setTimeout(() => {
                                $('#repetido').addClass('d-none');
                            }, 5000);
                            codigo_validado = false;
                        }
                        else {
                            $('#repetido').addClass('d-none');
                            codigo_validado = true;
                        }
                    }
                }
                else {
                    console.error(data.failed);
                    codigo_validado = false;
                }
            },
            error: function (data) {
                console.error(data);
                codigo_validado = false;
            }
        });
    }
}

const enviar_datos = $('#enviar_datos').click((e) => {
    e.preventDefault();
    let formData = new FormData(e.target.form);
    const nombre = $('#nombre').val();
    const descripcion = $('#descripcion').val();
    const costo = $('#costo').val();
    const codigo = $('#codigo').val();
    const stock = $('#stock').val();
    if (nombre != '' && costo != '' && codigo != '' && stock != '' && descripcion != '' && codigo_validado && formData.get('foto').name != '') {
        formData.append('nombre', nombre);
        formData.append('descripcion', descripcion);
        formData.append('costo', costo);
        formData.append('codigo', codigo);
        formData.append('stock', stock);
        formData.append('foto', $('#foto')[0].files[0]);
        console.log('enviando datos');
        $.ajax({
            url: 'php/nuevo_producto.php',
            type: 'POST',
            dataType: 'json',
            data: formData,
            processData: false,
            contentType: false,
            success: function (data) {
                if (data.failed == null) {
                    alert(data.success);
                    window.location.href = 'producto_list';
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

$('#codigo').blur(() => {
    validar_codigo();
});
