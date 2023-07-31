function deletePicture(idImage, imageType) {
    swal({
        title: 'Confirmar operación',
        text: '¿Realmente desea eliminar la imagen?',
        icon: 'warning',
        buttons: ['No, cancelar.', 'Sí, eliminar.']
    }).then((proceed) => {
        if (proceed) {
            // Redirigir a la página de eliminación con la ID y el tipo de imagen en la URL
            window.location.href = _urlBase + '/picture/delete/' + idImage + '?imageType=' + imageType;
        }
    });
}
