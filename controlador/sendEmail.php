<!--Sergi Sanahuja-->
<?php  

$name = "";
$email = "";
$text = "";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require ('PHPMailer/Exception.php');
require ('PHPMailer/PHPMailer.php');
require ('PHPMailer/SMTP.php');


//Funcio per enviar el email
function sendEmail($email, $mensaje){
        
    $mail = new PHPMailer(true);
        
    try {
        //Server settings
        
        $mail->SMTPDebug = 0;                                       //Deshabilita el comentari de depuracio
        //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                    //habilita el comentari de depuracio
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                       //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'sergisato70@gmail.com';                //SMTP username
        $mail->Password   = 'wumrqnjsdzwvmicc';                     //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('sergisato70@gmail.com', 'Mailer');
        $mail->addAddress($email, 'Joe User');                      //Add a recipient
        //$mail->addAddress('ellen@example.com');                   //Name is optional
        $mail->addReplyTo('sergisato70@gmail.com', 'Information');  //Per si el destinatari vol contestar
        // $mail->addCC('cc@example.com');                          //Per enviar una copia
        // $mail->addBCC('bcc@example.com');                        //Per enviar una copia oculta

        //Attachments
        //$mail->addAttachment('/var/tmp/file.tar.gz');              //Add attachments Per enviar arxius
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');        //Optional name 

        //Content
        $mail->isHTML(true);                                         //Set email format to HTML
        $mail->Subject = 'Change the password';                      //Assumpte
        $mail->Body    = $mensaje;                                     //Cos del missatge
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients'; //Per si el client no pot llegir html

        $mail->send();                                             //Enviar el missatge
        echo 'Message has been sent';
       
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}


//Recollir les dades del formulari
if (isset($_POST['submite'])) {
    $name = $_POST['nom'];
    $email = $_POST['email'];
    $text = $_POST['AreaText'];
}  






include_once '../vista/recuperarContrasenya.vista.php';

?>