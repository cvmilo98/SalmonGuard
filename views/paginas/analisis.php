<main class="contenedor seccion">
    <table class="usuarios">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Video</th>
                    <th>Estado</th>
                    <th>Resultado Enfermedad %</th>
                    <th>Resultado Salubridad %</th>
                </tr>
            </thead>

            <tbody> <!-- Mostrar los resultados -->
            <?php foreach( $usuario as $usuarios ): ?> 
            <tr>
                <td class="TD1"><?php echo $usuarios->id; ?></td>
                <td class="TD1"><?php echo $usuarios->VideoSubido; ?></td>
                <td class="TD1"><?php echo $usuarios->Estado; ?></td>
            </tr>
            <?php endforeach;  ?>
            </tbody>
    </table>
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