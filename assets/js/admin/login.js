$(document).ready(function () {
    $('#loginBtn').click(function () {
        $('.warning_email').remove();
        $.post('./post/valid_login.php',
            {
                user_name: $('#user_name').val(),
                password: $('#password').val(),
            },
            function (data, status) {
                if (data) {
                    $('#loginForm').append('<small class="warning_email"><i class="fas fa-exclamation-triangle"></i>' + ' ' +
                        data +
                        '</small>');
                }
                else {
                    alert("Welcome Admin " + $('#user_name').val());
                    location.reload();
                }
            });
        return false;
    });
});