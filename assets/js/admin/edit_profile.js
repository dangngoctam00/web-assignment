$(document).ready(function () {
    var modal = $('#profileModal')
    var confirmProfileBtn = modal.find('.modal-footer #confirmProfileBtn')
    confirmProfileBtn.click(function () {
        modal.find('.warning_error').remove();
        $.post("./post/profile_edit.php",
            {
                userName: $('#inputUserName').val(),
                firstName: $('#inputFirstName').val(),
                lastName: $('#inputLastName').val(),
                email: $('#inputEmail').val(),
                phone: $('#inputPhone').val(),
                birthday: $('#inputBirthday').val(),

            },
            function (data, status) {
                data = JSON.parse(data);
                if (data.success) {
                    console.log("Profile has been changed.");
                    $("#topLeftName").text($('#inputFirstName').val());
                    $("#tableProfile").load(window.location.href + " #tableProfile > *");
                    modal.modal('hide');

                }
                else {
                    if (data.systemError) {
                        console.log(data.systemError);
                        modal.find('.modal-content').append('<small class="warning_error"><i class="fas fa-exclamation-triangle"></i>' + ' ' +
                            "Error from server, operation cancelled" +
                            '</small>');

                    }
                    else {
                        if (data.userName) {
                            modal.find('#formUserName').append('<small class="warning_error"><i class="fas fa-exclamation-triangle"></i>' + ' ' +
                                data.userName +
                                '</small>');
                        }
                        if (data.firstName) {
                            console.log('first name');
                            modal.find('#formFirstName').append('<small class="warning_error"><i class="fas fa-exclamation-triangle"></i>' + ' ' +
                                data.firstName +
                                '</small>');
                        }
                        if (data.lastName) {
                            modal.find('#formLastName').append('<small class="warning_error"><i class="fas fa-exclamation-triangle"></i>' + ' ' +
                                data.lastName +
                                '</small>');
                        }
                        if (data.email) {
                            modal.find('#formEmail').append('<small class="warning_error"><i class="fas fa-exclamation-triangle"></i>' + ' ' +
                                data.email +
                                '</small>');
                        }
                        if (data.phone) {
                            modal.find('#formPhone').append('<small class="warning_error"><i class="fas fa-exclamation-triangle"></i>' + ' ' +
                                data.phone +
                                '</small>');
                        }
                        if (data.birthday) {
                            modal.find('#formBirthday').append('<small class="warning_error"><i class="fas fa-exclamation-triangle"></i>' + ' ' +
                                data.birthday +
                                '</small>');
                        }
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