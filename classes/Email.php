<?php

namespace Classes;
use PHPMailer\PHPMailer\PHPMailer;

class Email {
    public $nombre;
    public $email;
    public $token;

    public function __construct($nombre, $email, $token)
    {
        $this->nombre = $nombre;
        $this->email = $email;
        $this->token = $token;
    }

    public function enviarConfirmacion(){

        // Crear el objeto de email
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'sandbox.smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Port = 2525;
        $mail->Username = '31ba52fd90a2f6';
        $mail->Password = '8c0af7835a7791';

        $mail->setFrom('cuentas@salmonguard.com');
        $mail->addAddress('cuentas@salmonguard.com', 'SalmonGuard.com');
        $mail->Subject = 'Confirma tu cuenta';

        // Set HTML
        $mail->isHTML(true);
        $mail->CharSet = 'UTF-8';

        $contenido = "<html>";
        $contenido .= "<p><strong>Hola Estimad@ </strong>, Su cuenta en SalmonGuard ha sido creada satisfactoriamente, 
        solo debes confirmarla presionando el siguiente enlace</p>";
        $contenido .= "<p>Presiona aquí: <a href='http://localhost:3000/confirmar-cuenta?token=" 
        . $this->token . "'>Confirmar Cuenta</a> </p>"; 
        $contenido .= "<p>Si tu no solicitaste esta cuenta, puedes ignorar el mensaje </p>";
        $contenido .= "</html>";
        $mail->Body = $contenido;

        // Enviar el email
        $mail->send();
    }

    public function enviarInstrucciones() {
        // Crear el objeto de email
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'sandbox.smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Port = 2525;
        $mail->Username = '31ba52fd90a2f6';
        $mail->Password = '8c0af7835a7791';

        $mail->setFrom('cuentas@salmonguard.com');
        $mail->addAddress('cuentas@salmonguard.com', 'SalmonGuard.com');
        $mail->Subject = 'Reestablece tú Password';

        // Set HTML
        $mail->isHTML(true);
        $mail->CharSet = 'UTF-8';

        $contenido = "<html>";
        $contenido .= "<p><strong>Hola " . $this->nombre . "</strong>, Has solicitado
        reestablecer tú password, sigue el siguiente enlace para hacerlo.</p>";
        $contenido .= "<p>Presiona aquí: <a href='http://localhost:3000/recuperar?token=" 
        . $this->token . "'>Reestablecer Password</a>"; 
        $contenido .= "<p>Si tu no solicitaste este cambio, puedes ignorar el mensaje </p>";
        $contenido .= "</html>";
        $mail->Body = $contenido;

        // Enviar el email
        $mail->send();
    }
}