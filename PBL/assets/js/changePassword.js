$(document).ready(function () {

    $('#oldPassword, #newPassword, #renewPassword').on('input', function () {
        $(this).removeClass('is-invalid is-valid');
        $(this).siblings('.invalid-feedback').hide();
        $('#success-message').hide();
        $('#error-message').hide();
    });

    $('#formChangePassword').on('submit', function (e) {
        e.preventDefault();

        let oldPassword = $('#oldPassword').val();
        let newPassword = $('#newPassword').val();
        let renewPassword = $('#renewPassword').val();

        if (!blankValidation(oldPassword, newPassword, renewPassword)) {
            return;
        }
        if (!samePasswordValidation(newPassword, renewPassword)) {
            return;
        }

        $.ajax({
            url: 'assets/php/changePassword.php',
            type: 'POST',
            data: {
                oldPassword: oldPassword,
                newPassword: newPassword,
                renewPassword: renewPassword
            },
            success: function (response) {
                $('#error-message').hide();
                switch (response) {
                    case 'Success':
                        $('#success-message').text('Password Berhasil Diganti!').show();
                        $('#oldPassword, #newPassword, #renewPassword')
                            .val('')
                        break;
                    case 'Password Salah':
                        $('#error-message').text('Password Yang Anda Masukkan Salah!').show();
                        $('#oldPassword, #newPassword, #renewPassword')
                            .val('')
                            .removeClass('is-valid')
                            .addClass('is-invalid');
                        break;
                    case 'Password Sama':
                        $('#error-message').text('Masukkan Password Yang Baru!').show();
                        $('#oldPassword, #newPassword, #renewPassword')
                            .val('')
                            .removeClass('is-valid')
                            .addClass('is-invalid');
                        break;
                    default:
                        $('#error-message').text('Terjadi kesalahan, coba lagi').show();
                        $('#oldPassword, #newPassword, #renewPassword')
                            .val('')
                            .removeClass('is-valid')
                            .addClass('is-invalid');
                }
            },
            error: function () {
                $('#error-message').text('Terjadi kesalahan, coba lagi').show();
                $('#oldPassword, #newPassword, #renewPassword')
                    .val('')
                    .removeClass('is-valid')
                    .addClass('is-invalid');
            }
        });
    });
});

function blankValidation(oldPassword, newPassword, renewPassword) {
    let valid = true;

    if (!oldPassword) {
        $('#oldPassword-error').text('Masukkan Password Lama Anda!').show();
        $('#oldPassword').addClass('is-invalid').removeClass('is-valid');
        valid = false;
    }

    if (!newPassword) {
        $('#newPassword-error').text('Masukkan Password Baru Anda!').show();
        $('#newPassword').addClass('is-invalid').removeClass('is-valid');
        valid = false;
    }

    if (!renewPassword) {
        $('#renewPassword-error').text('Masukkan Ulang Password Baru Anda!').show();
        $('#renewPassword').addClass('is-invalid').removeClass('is-valid');
        valid = false;
    }

    return valid;
}

function samePasswordValidation(newPassword, renewPassword) {
    let valid = true;

    if (newPassword !== renewPassword) {
        $('#error-message').text('Password Tidak Sesuai!').show();
        $('#newPassword, #renewPassword').addClass('is-invalid').removeClass('is-valid');
        $('#renewPassword, #newPassword').val('');
        valid = false;
    } else {
        $('#newPassword, #renewPassword').removeClass('is-invalid').addClass('is-valid');
        $('#error-message').hide();
    }

    return valid;
}
