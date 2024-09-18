// Función para mostrar una imagen seleccionada en un elemento <img> específico.
function displayImg(input, imgId) {
    // Verifica si hay archivos seleccionados.
    if (input.files && input.files[0]) {
        var reader = new FileReader(); // Crea un nuevo objeto FileReader.
        var _this = $(input); // Almacena la referencia del input.

        // Evento que se dispara cuando la lectura del archivo se completa.
        reader.onload = function (e) {
            // Actualiza el atributo 'src' del elemento de imagen con el resultado de la lectura.
            $('#' + imgId).attr('src', e.target.result);
            // Muestra el nombre del archivo en la etiqueta correspondiente.
            _this.siblings('.custom-file-label').html(input.files[0].name);
        }

        // Inicia la lectura del archivo como URL de datos.
        reader.readAsDataURL(input.files[0]);
    }
}

// Código que se ejecuta cuando el documento está listo.
$(document).ready(function() {
    // Inicializa un objeto para almacenar los valores por defecto del sistema.
    let initialValues = {
        name: '',
        short_name: '',
        logo: '',
        cover: ''
    }

    // Realiza una solicitud AJAX para cargar la información del sistema.
    $.ajax({
        method: 'POST',
        url: _base_url_ + 'app/ajax/system.ajax.php',
        data: { opcion: 'loadSystem' },
        success: function (respuesta) {
            try {
                // Intenta analizar la respuesta JSON.
                let data = JSON.parse(respuesta);
                console.log("Datos del sistema: ", data);

                // Valida y carga la imagen del logo.
                validateImage(data['logo'], _base_url_, _base_app_).then(url => {
                    $('#ic').attr('href', url); // Actualiza el enlace del logo.
                    $('#cimg').attr('src', url); // Muestra la imagen del logo.
                    $('#logo').attr('src', url); // Actualiza el atributo 'src' del logo.
                    initialValues.logo = data['logo'] || ''; // Almacena el logo inicial.
                });

                // Actualiza el título y el nombre corto del sistema.
                $('#title').text(data['name'] || 'Nombre de Sistema');
                $('#title2').text(data['short_name'] || 'Nombre corto de sistema');

                // Completa los campos del formulario con los datos cargados.
                $('#name').val(data['name'] || '');
                $('#short_name').val(data['short_name'] || '');

                // Valida y carga la imagen de la portada.
                validateImage(data['cover'], _base_url_, _base_app_).then(url => {
                    $('#cimg2').attr('src', url); // Muestra la imagen de la portada.
                    initialValues.cover = data['cover'] || ''; // Almacena la portada inicial.
                });

                // Almacena los valores iniciales de nombre y nombre corto.
                initialValues.name = data['name'] || '';
                initialValues.short_name = data['short_name'] || '';

                // Verifica los campos del formulario.
                checkFields();

            } catch (e) {
                // Maneja cualquier error al procesar la respuesta.
                console.error("Error al procesar la respuesta:", e);
            }
        },
        error: function (xhr, status, error) {
            // Maneja errores en la solicitud AJAX.
            console.error("Error en la solicitud AJAX:", status, error);
        }
    });

    // Función para verificar si los campos del formulario han cambiado o están vacíos.
    function checkFields() {
        const name = $('#name').val().trim(); // Obtiene el valor del campo de nombre.
        const shortName = $('#short_name').val().trim(); // Obtiene el valor del campo de nombre corto.
        const logo = $('#logo').val(); // Obtiene el valor del campo de logo.
        const cover = $('#cover').val(); // Obtiene el valor del campo de portada.

        // Verifica si todos los campos están vacíos.
        const isEmpty = !name && !shortName && !logo && !cover;

        // Verifica si algún campo ha cambiado desde los valores iniciales.
        const hasChanged = name !== initialValues.name ||
                           shortName !== initialValues.short_name ||
                           logo !== initialValues.logo ||
                           cover !== initialValues.cover;

        // Habilita o deshabilita el botón según si los campos están vacíos o no han cambiado.
        $('#btnSystem').prop('disabled', isEmpty || !hasChanged);
    }

    // Evento para verificar campos al cambiar los valores de nombre y nombre corto.
    $('#name, #short_name').on('input', checkFields);
    // Evento para verificar campos al cambiar los archivos de logo y portada.
    $('#logo, #cover').on('change', checkFields);

    // Evento para manejar el clic en el botón de sistema.
    $('#btnSystem').on('click', function (event) {
        event.preventDefault(); // Previene el comportamiento por defecto del botón.
    
        let formData = new FormData($('#system-frm')[0]); // Crea un objeto FormData con los datos del formulario.
        formData.append('opcion', 'insertUpdateSystem'); // Añade una opción para identificar la acción.

        // Verifica si la información del sistema está vacía antes de proceder.
        $.ajax({
            method: 'POST',
            url: _base_url_ + 'app/ajax/system.ajax.php',
            data: { opcion: 'checkIfEmpty' },
            success: function (isEmpty) {
                console.log('isEmpty:', isEmpty);

                isEmpty = JSON.parse(isEmpty); // Convierte la respuesta JSON.

                let isUpdate = false; // Variable para determinar si se va a actualizar.
                formData.forEach((value, key) => {
                    if (key !== 'opcion' && value !== '') {
                        isUpdate = true; // Marca como actualización si hay valores.
                    }
                });
                console.log('isUpdate:', isUpdate);

                // Si hay cambios y no están vacíos, confirma la acción de actualización.
                if (isUpdate && !isEmpty) {       
                    Swal.fire({
                        title: '¿Estás seguro?',
                        text: "Esta acción actualizará la información del sistema",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Sí, actualizar',
                        cancelButtonText: 'Cancelar'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Realiza la solicitud AJAX para actualizar la información del sistema.
                            $.ajax({
                                method: 'POST',
                                url: _base_url_ + 'app/ajax/system.ajax.php',
                                data: formData,
                                contentType: false,
                                processData: false,
                                success: function (respuesta) {
                                    // Recarga la página si la respuesta es exitosa.
                                    if (respuesta) {
                                        location.reload();
                                    } else {
                                        $('#msg').html('<div class="alert alert-danger err_msg">Ocurrió un error</div>');                                
                                    }
                                }
                            });
                        }
                    });
                    console.log('Actualizar');
                } else {
                    // Si no se va a actualizar, registra la nueva información.
                    $.ajax({
                        method: 'POST',
                        url: _base_url_ + 'app/ajax/system.ajax.php',
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function (respuesta) {
                            // Recarga la página si la respuesta es exitosa.
                            if (respuesta) {
                                location.reload();
                            } else {
                                $('#msg').html('<div class="alert alert-danger err_msg">Ocurrió un error</div>');
                            }
                        }
                    });
                    console.log('Registrar');
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                // Maneja errores en la solicitud AJAX de verificación.
                console.error('Error en AJAX:', textStatus, errorThrown);
                console.log('Respuesta del servidor:', jqXHR.responseText);
                $('#msg').html('<div class="alert alert-danger err_msg">Error al verificar la base de datos: ' + jqXHR.responseText + '</div>');
            }
        });
    });
});