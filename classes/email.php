<?php 
namespace Classes;
use PHPMailer\PHPMailer\PHPMailer;

class Email {

    public $email;
    public $nombre;
    public $token;

    public function __construct ($email, $nombre, $token){

        $this->email = $email;
        $this->nombre = $nombre;
        $this->token = $token;
    }

    public function enviarConfirmacion(){
        //CREAR EL OBJETO DEL EMAIL

        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'sandbox.smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Port = 2525;
        $mail->Username = '2ee2dccb2b476d';
        $mail->Password = '697d36db74ca43';

        $mail->setFrom('EmpleoSenaCME@SENA.com');
        $mail->addAddress('EmpleoSenaCME@SENA.com','EmpleoSenaCME.com');
        $mail->Subject = 'Confirma tu cuenta';

        //SET HTML
        $mail->isHTML(TRUE);
        $mail->CharSet = 'UTF-8';

        $contenido = "<html>";
        $contenido .= "<p><strong>Hola " . $this->nombre . "</strong> Has creado tu cuenta en Empleo SENA CME, solo debes confirmarla presionando el siguiente enlace</p>";
        $contenido .= "<p>Presiona aquí: <a href='http://localhost:3000/confirmar?token=" . $this->token ."'>Confirmar Cuenta</a> </p>";
        $contenido .= "<p>Si tu no solicitaste esta cuenta, puedes ignorar el menasaje</p>";
        $contenido .= "</html>";
        
        $mail->Body = $contenido;

        //ENVIAR EL EMAIL
        $mail->send();
    }
}