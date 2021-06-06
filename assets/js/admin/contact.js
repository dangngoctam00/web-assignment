$(document).ready(function () {
    $('.btn_delete').click(function () {
        $('#' + $(this).val()).remove();
        $('#' + $(this).val() + "collapse").remove();
        $.post('./post/contact_functionals.php',
            {
                id: $(this).val()
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