const getUsername = () => {
    $.ajax({
        url: 'php/getUsername.php',
        type: 'POST',
        dataType: 'json',
        success: function (response) {
            if (response.failed == 'No hay sesión iniciada') {
                console.error(response.failed);
                window.location.href = 'index';
            }
            else if (response.success !== null) {
                $('.username').text(response.success);
            }
        }
    });
}
getUsername();