<?php

class PredictView {
    public function renderResult($result) {
        // Lógica de presentación (HTML, etc.)
        // ...

        // Mostrar el resultado
        echo $result;
    }
}

?>



<html>

    <body>
    <main class="contenedor seccion">
    <div>
    <form id="upload-file" method="post" enctype="multipart/form-data">
        <label for="imageUpload" class="upload-label">
            Elige un video
        </label>
        <input style="justify-content: center; justify-items: center;" type="file" name="file" id="imageUpload" accept="video/*" onchange="showVideoThumbnail()">
    </form>

    <div class="image-section">
        <div class="img-preview">
            <div id="previewContainer">
            </div>
        </div>
        <div>
            <button style="display: inline-block;" type="button" class="boton-verde" id="btn-predict">Analisar</button>
        </div>
    </div>

    <div class="loader" style="display:none;"></div>

    <h3 style="color: white; font-weight: bold; font-family: 'Lato', sans-serif;" id="result">
        <span style="color: white; font-weight: bold; font-family: 'Lato', sans-serif;"></span>
    </h3>

</div>
    </main>
    </body>
    <script src="../build/js/main.js" type="text/javascript"></script>
</html>
