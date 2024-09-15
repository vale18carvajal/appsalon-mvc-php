<?php

namespace Classes;

use PHPMailer\PHPMailer\PHPMailer;

class Email
{

    public $email;
    public $nombre;
    public $token;


    public function __construct($email, $nombre, $token)
    {
        $this->email = $email;
        $this->nombre = $nombre;
        $this->token = $token;
    }

    public function enviarConfirmacion()
    {
        //Crear el objeto del email
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = $_ENV['EMAIL_HOST'];
        $mail->SMTPAuth = true;
        $mail->Port = $_ENV['EMAIL_PORT'];
        $mail->Username = $_ENV['EMAIL_USER'];
        $mail->Password = $_ENV['EMAIL_PASS'];

        $mail->setFrom('valu18carvajal@gmail.com', 'AppSalon.com');
        $mail->addAddress($this->email, 'AppSalon.com');
        $mail->Subject = 'Confirmar tu Cuenta';

        //Set HTML
        $mail->isHTML(true);
        $mail->CharSet = 'UTF-8';
        $contenido = "<html>";
        $contenido ="
        <style>
        * {
  font-family:'Poppins', sans-serif ;
}
div {
  background-color: #cb0000;
  width: 100%;
  height: 35px;
}

h1 {
  text-align: center;
}

p {
  margin-bottom: 10px;
}

a {
  background-color: #0da6f3;
  padding: 10px;
  text-decoration: none;
  color: white;
  margin-top:10px;
}

a:hover {
  
}
        </style>
        ";
        $contenido .= "<div></div><p><strong>Hola " . $this->nombre . "</strong>. Has creado
        tu cuenta en App Salón, solo debes continuar presionando el siguiente
        enlace</p>";
        $contenido .= "<p>Presiona aquí: <a href='" . $_ENV['APP_URL'] ."/confirmar-cuenta?token="
            . $this->token . "'>Confirmar Cuenta</a> </p>";
        $contenido .= "<p>Si tu no solicitaste esta cuenta, puedes ignorar el mensaje</p>";
        $contenido .= "</html>";

        $mail->Body = $contenido;

        //Enviar el Email
        $mail->send();
    }

    public function enviarInstrucciones()
    {
        //Crear el objeto del email
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = $_ENV['EMAIL_HOST'];
        $mail->SMTPAuth = true;
        $mail->Port = $_ENV['EMAIL_PORT'];
        $mail->Username = $_ENV['EMAIL_USER'];
        $mail->Password = $_ENV['EMAIL_PASS'];

        $mail->setFrom('cuentas@appsalon.com', 'AppSalon.com');
        $mail->addAddress($this->email, 'AppSalon.com');
        $mail->Subject = 'Restablece tu contraseña';

        //Set HTML
        $mail->isHTML(true);
        $mail->CharSet = 'UTF-8';
        $contenido = "<html>";
        $contenido = "
        * {
  font-family:'Poppins', sans-serif ;
}
div {
  background-color: #cb0000;
  width: 100%;
  height: 35px;
}

h1 {
  text-align: center;
}

p {
  margin-bottom: 10px;
}

a {
  background-color: #0da6f3;
  padding: 10px;
  text-decoration: none;
  color: white;
  margin-top:10px;
}

a:hover {
  
}
        
        ";
        $contenido .= "<div></div><p><strong>Hola " . $this->nombre . "</strong>. Has solicitado restablecer tu contraseña.
        Sigue el siguiente enlace para hacerlo.</p>";
        $contenido .= "<p>Presiona aquí: <a href='" . $_ENV['APP_URL'] . "/recuperar?token="
            . $this->token . "'>Restablecer contraseña</a> </p>";
        $contenido .= "<p>Si tu no solicitaste esta cuenta, puedes ignorar el mensaje</p>";
        $contenido .= "</html>";

        $mail->Body = $contenido;

        //Enviar el Email
        $mail->send();
    }
}
