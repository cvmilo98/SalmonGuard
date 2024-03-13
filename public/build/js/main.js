$(document).ready(function () {
    // Init
    $('.image-section').hide();
    $('.loader').hide();
    $('#result').hide();

    $(document).ready(function () {
        // Upload Preview
        function showPreview(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
    
                reader.onload = function (e) {
                    // Verificar si el archivo es una imagen
                    if (input.files[0].type && input.files[0].type.startsWith('image')) {
                        // Mostrar la vista previa de la imagen
                        $('#previewContainer').html('<img src="' + e.target.result + '" alt="Vista previa">');
                    }
                    // Verificar si el archivo es un video
                    else if (input.files[0].type && input.files[0].type.startsWith('video')) {
                        // Mostrar la vista previa del video
                        showVideoPreview(input.files[0]);
                    }
    
                    $('#previewContainer').hide();
                    $('#previewContainer').fadeIn(650);
                };
    
                reader.readAsDataURL(input.files[0]);
            }
        }
    
        function showVideoPreview(videoFile) {
            const video = $('<video controls width="640" height="650"></video>');
            video.attr('src', URL.createObjectURL(videoFile));
    
            // Agregar el video al contenedor de previsualización
            $('#previewContainer').empty().append(video);
        }
    
        $("#imageUpload").change(function () {
            $('.image-section').show();
            $('#btn-predict').show();
            $('#result').text('');
            $('#result').hide();
            showPreview(this);
        });
    });
    

    // Predict
    $('#btn-predict').click(function () {
        var form_data = new FormData($('#upload-file')[0]);

        // Show loading animation
        $(this).hide();
        $('.loader').show();

        // Make prediction by calling api /predict
        $.ajax({
            type: 'POST',
            url: '/predict',
            data: form_data,
            contentType: false,
            cache: false,
            processData: false,
            async: true,
            success: function (data) {
                // Get and display the result
                $('.loader').hide();
                $('#result').fadeIn(600);
                $('#result').text(' Resultado:  ' + data);
                console.log('Success!');
            },
        });
    });

    $(document).ready(function() {
        // Ejemplo: Convertir un menú de navegación en un menú de hamburguesa para pantallas pequeñas
        if ($(window).width() < 768) {
            // Código para pantallas pequeñas
        } else {
            // Código para pantallas más grandes
        }
        
        // Actualizar cuando la ventana cambie de tamaño
        $(window).resize(function() {
            if ($(window).width() < 768) {
                // Código para pantallas pequeñas
            } else {
                // Código para pantallas más grandes
            }
        });
    });

    
    

});
