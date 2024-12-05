$(document).ready(function () {

    $('#username').on('input', function () {
        $('#username-error').hide();
        $('#username').removeClass('is-invalid');
    });

    $('#password').on('input', function () {
        $('#password-error').hide();
        $('#password').removeClass('is-invalid');
    });

    $('#loginForm').on('submit', function (e) {
        e.preventDefault();

        let username = $('#username').val();
        let password = $('#password').val();
        let remember = $('#rememberMe').is(':checked') ? 'true' : 'false';

        if (!blankValidation(username, password)) {
            return;
        }
 
        $.ajax({
            url: 'assets/php/login.php',
            type: 'POST',
            data: {
                username: username,
                password: password,
                remember: remember
            },
            success: function (response) {
                $('#error-message').hide();
                switch (response) {
                    case 'Mahasiswa':
                        window.location.href = 'dashboard-mahasiswa.php';
                        break;
                    case 'Admin Jurusan':
                        window.location.href = 'dashboard-adminjurusan.php';
                        break;
                    case 'Admin Polinema':
                        window.location.href = 'dashboard-adminpolinema.php';
                        break;
                    case 'Input Salah':
                        
                        $('#error-message').text('Username Atau Password Salah !').show();
                        $('#password').val('');
                        $('#username').val('');
                        break;
                    default:
                        $('#error-message').text('Terjadi kesalahan, coba lagi').show();
                        $('#password').val('');
                        $('#username').val('');
                    }
                },
                error: function () {
                    $('#error-message').text('Terjadi kesalahan, coba lagi').show();
                    $('#password').val('');
                    $('#username').val('');
            }
        });
    });

    function blankValidation(username, password) {
        let valid = true;

        if (!username) {
            $('#username-error').text('Masukkan Username Anda').show();
            $('#username').addClass('is-invalid');
            valid = false;
        }

        if (!password) {
            $('#password-error').text('Masukkan Password Anda').show();
            $('#password').addClass('is-invalid');
            valid = false;
        }

        return valid;
    }
});

