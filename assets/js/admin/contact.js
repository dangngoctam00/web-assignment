$(document).ready(function () {
    $('#deleteConfirm').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var id = button.data('rowid') // Extract info from data-* attributes
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        var confirmDeleteBtn = modal.find('.modal-footer #confirmDeleteBtn')
        confirmDeleteBtn.click(function () {
            $('#' + id).remove();
            $('#' + id + "collapse").remove();
            $.post('./post/contact_delete.php',
                {
                    id: id
                },
                function (data, status) {
                    console.log("Message: " + data + "\nStatus: " + status);
                });
            modal.modal('hide')
            return false;
        });
    })
});