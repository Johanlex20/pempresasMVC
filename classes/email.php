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
        $mail->Username = 'ac560a298d9808';
        $mail->Password = '06bb2d9ef40f9e';

        $mail->setFrom('johanlex20@hotmail.com');
        $mail->addAddress('johanlex20@hotmail.com','Pempresas.com');
        $mail->Subject = 'Confirma tu cuenta';

        //SET HTML
        $mail->isHTML(TRUE);
        $mail->CharSet = 'UTF-8';

        $contenido = "<html>";
        $contenido .= "<p><strong>Hola " . $this->nombre . "</strong> Has creado tu cuenta en Pempresas, solo debes confirmarla presionando el siguiente enlace</p>";
        $contenido .= "<p>Presiona aquí: <a href='http://localhost:3000/confirmar-cuenta?token=" . $this->token ."'>Confirmar Cuenta</a> </p>";
        $contenido .= "<p>Si tu no solicitaste esta cuenta, puedes ignorar el menasaje</p>";
        $contenido .= "</html>";
        
        $mail->Body = $contenido;

        //ENVIAR EL EMAIL
        $mail->send();
    }
}