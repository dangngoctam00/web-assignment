$(document).ready(function () {
    $('#spinnerEmail').hide();
    $('#btn_send_email').click(function () {
        $('#spinnerEmail').show();
        $('.warning_email').remove();
        $.post("send_email.php",
            {
                firstName: $('#inputFirstname').val(),
                lastName: $('#inputLastName').val(),
                email: $('#inputEmail').val(),
                website: $('#inputWebsite').val(),
                subject: $('#inputSubject').val(),
                message: $('#inputMessage').val()
            },
            function (data, status) {
                data = JSON.parse(data);
                if (data.success) {
                    alert("Mail has been sent.\nThank you for your contribution.");
                }
                else {
                    if (data.firstName) {
                        $('#formFirstName').append('<small class="warning_email"><i class="fas fa-exclamation-triangle"></i>' + ' ' +
                            data.firstName +
                            '</small>');
                    }
                    if (data.lastName) {
                        $('#formLastName').append('<small class="warning_email"><i class="fas fa-exclamation-triangle"></i>' + ' ' +
                            data.lastName +
                            '</small>');
                    }
                    if (data.email) {
                        $('#formEmail').append('<small class="warning_email"><i class="fas fa-exclamation-triangle"></i>' + ' ' +
                            data.email +
                            '</small>');
                    }
                    if (data.website) {
                        $('#formWebsite').append('<small class="warning_email"><i class="fas fa-exclamation-triangle"></i>' + ' ' +
                            data.website +
                            '</small>');
                    }
                    if (data.subject) {
                        $('#formSubject').append('<small class="warning_email"><i class="fas fa-exclamation-triangle"></i>' + ' ' +
                            data.subject +
                            '</small>');
                    }
                    if (data.message) {
                        $('#formMessage').append('<small class="warning_email"><i class="fas fa-exclamation-triangle"></i>' + ' ' +
                            data.message +
                            '</small>');
                    }
                }
                $('#spinnerEmail').hide();
            });
        return false;
    });
});

