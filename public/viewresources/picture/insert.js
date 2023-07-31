// insert.js
$(document).ready(function() {
    // Manejo del evento de envío del formulario de inserción de imágenes
    $('#insertForm').submit(function(event) {
        event.preventDefault(); // Evita el envío del formulario por defecto

        // Obtener el formulario y los datos del formulario
        var form = $(this);
        var formData = new FormData(form[0]);

        // Realizar la solicitud AJAX para enviar los datos del formulario
        $.ajax({
            url: form.attr('action'), // URL a la que enviar los datos del formulario
            type: form.attr('method'), // Tipo de solicitud (POST en este caso)
            data: formData, // Datos del formulario en formato FormData
            processData: false, // Evitar el procesamiento automático de los datos
            contentType: false, // Evitar el encabezado "Content-Type" automático
            success: function(response) {
                // Manejar la respuesta del servidor en caso de éxito
                // Por ejemplo, mostrar un mensaje de éxito y recargar la página
                alert('Imagen agregada correctamente.');
                location.reload(); // Recargar la página para mostrar la nueva imagen en la lista
            },
            error: function(error) {
                // Manejar errores en caso de que la inserción no se realice correctamente
                // Por ejemplo, mostrar un mensaje de error con los detalles del error
                alert('Error al agregar la imagen: ' + error.responseText);
            }
        });
    });
});
