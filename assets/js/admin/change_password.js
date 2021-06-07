$(document).ready(function () {

    var modal = $('#passwordModal');
    var confirmChangePassword = modal.find('.modal-footer #confirmChangePassword')
    confirmChangePassword.click(function () {
        modal.find('.warning_error').remove();
        $.post("./post/change_password.php",
            {
                oldPassword: $('#inputOldPassword').val(),
                newPassword: $('#inputNewPassword').val(),
                confirmNewPassword: $('#inputConfirmNewPassword').val(),

            },
            function (data, status) {
                data = JSON.parse(data);
                if (data.success) {
                    console.log("Password has been changed.");
                    modal.find('form').trigger('reset');
                    modal.modal('hide');


                }
                else {
                    if (data.oldPassword) {
                        modal.find('#formOldPassword').append('<small class="warning_error"><i class="fas fa-exclamation-triangle"></i>' + ' ' +
                            data.oldPassword +
                            '</small>');
                    }
                    else if (data.newPassword) {
                        modal.find('#formNewPassword').append('<small class="warning_error"><i class="fas fa-exclamation-triangle"></i>' + ' ' +
                            data.newPassword +
                            '</small>');
                    }
                    else if (data.confirmNewPassword) {
                        modal.find('#formConfirmNewPassword').append('<small class="warning_error"><i class="fas fa-exclamation-triangle"></i>' + ' ' +
                            data.confirmNewPassword +
                            '</small>');
                    }
                    else {
                        modal.find('#passwordModalFooter').append('<small class="warning_error"><i class="fas fa-exclamation-triangle"></i>' + ' ' +
                            "Error from server, operation cancelled" +
                            '</small>');
                    }
                    modal.modal('handleUpdate');
                }
            });

        return false;
    });
    modal.on('show.bs.modal', function (event) {
        modal.find('.warning_error').remove();
    })

});