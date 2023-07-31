function updatePicture(idPicture) {

    $(document).ready(function() {

        swal({
            title: 'Confirmar operación',
            text: '¿Realmente desea proceder?',
            icon: 'warning',
            buttons: ['No, cancelar.', 'Si, proceder.']
        }).then((proceed) => {
            if (proceed) {
                var form = $('#editPictureForm')[0];
                var formData = new FormData(form);
                
                $.ajax({
                    url: _urlBase + '/picture/update/' + idPicture,
                    method: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        window.location.reload();
                    },
                    error: function(xhr, status, error) {
                        new PNotify({
                            title: 'Error',
                            text: 'La foto ya existe.',
                            type: 'error'
                        });
                    }
                });
            }
        });
    });
}

function showEditModal(idPicture) {
    $('#editPictureModal').data('idPicture', idPicture);
    $('#editPictureModal').modal('show');
}
