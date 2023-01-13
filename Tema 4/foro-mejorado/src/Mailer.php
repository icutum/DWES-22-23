<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    class Mailer {
        public static function sendEmail($correo, $asunto, $cuerpo) {
            $mail = new PHPMailer(true);

            try {
                //Server settings
                $mail->isSMTP();                                            // Send using SMTP
                $mail->Host       = $_ENV["MAIL_HOST"];                     // Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                $mail->Username   = $_ENV["MAIL_USER"];                     // SMTP username
                $mail->Password   = $_ENV["MAIL_PASS"];                     // SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            // Enable implicit TLS encryption
                $mail->Port       = $_ENV["MAIL_PORT"];                     // TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
                $mail->CharSet = 'UTF-8';                                   // UTF-8 encoding

                //Recipients
                $mail->setFrom($_ENV["MAIL_ADDRESS"], 'Linkenin');
                $mail->addAddress($correo);                                 //Add a recipient

                //Content
                $mail->isHTML(true);                                        //Set email format to HTML
                $mail->Subject = $asunto;
                $mail->Body    = $cuerpo;
                // $mail->AltBody = $cuerpo;

                $mail->send();
            } catch (Exception $e) {
                echo "No se ha podido enviar el correo. Mailer Error: {$mail->ErrorInfo}";
            }
        }
    }
?>