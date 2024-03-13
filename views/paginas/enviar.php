<?php

    include("../../vendor/autoload.php");

    try {

        $emailTo = "SalmonGuardEnterprise@gmail.com";
        
        $bodyEmail = $_POST['mensaje'];
        $fromname = $_POST['nombre'];
        $SMTPAuth ="login";

        $mail = new PHPMailer\PHPMailer\PHPMailer();

        $mail->isSMTP();

        $mail->SMTPDebug = 0;
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 587;
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'tls';
        $mail->Username = $emailTo;
        $mail->Password = 'besg zgro wucx asad';

        $mail->setFrom('bastian.farfan.benavides@gmail.com', $fromname);
        $mail->addAddress('SalmonGuardEnterprise@gmail.com'); //A quien se le envia el correo

        // asunto
        $mail->isHTML(true);
        $mail->Subject = "SalmonGuard Contacto";
        // cuerpo del mensaje
        $mail->Body = $bodyEmail;

        if (!$mail->send()){
            error_log("Hubo un error al enviar el mensaje: {$mail->ErrorInfo}");
        }

    } catch (Exception $e) {
        
    }

?>
    
    <main class="contenedor seccion">
    <a href="/" class="boton boton-verde">Volver</a>
        <p class="alerta exito">El mensaje se ha enviado Correctamente</p>
        <a class="boton-naranjo" href="index.php">Volver</a>
    </main>
