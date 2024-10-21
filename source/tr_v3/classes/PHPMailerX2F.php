<?php

/*
- The PHPMailerX2F class
- Simplifies the PHPMailer class through simpler method statement calls
*/

# Use
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once PUBLIC_ROOT . 'vendor/phpmailer/Exception.php';
require_once PUBLIC_ROOT . 'vendor/phpmailer/PHPMailer.php';
require_once PUBLIC_ROOT . 'vendor/phpmailer/SMTP.php';

/* Html2Text */
use Soundasleep\Html2Text;

require_once PUBLIC_ROOT . 'vendor/html2text/Html2Text.php';
require_once PUBLIC_ROOT . 'vendor/html2text/Html2TextException.php';

class PHPMailerX2F
{
    public static $mailer;

    public static function getMailer()
    {
        if (self::$mailer === null) // Optionally checks if singleton instance already exists..
            self::$mailer = new PHPMailer(true);
        return self::$mailer;
    }

    /* 
    Sends a simple mail 
    Usage:
    $payload = [
    'to_email' => '',
    'to_name' => '',
    'subject' => '',
    'message_html' => '',
    'message_text' => ''
    ];
    send($payload);
    */
    public static function send(Array $payload)
    {
        ## Create an instance; passing `true` enables exceptions
        $m = self::getMailer();

        try {
            ## Server settings
            $m->isSMTP(); // Send using SMTP
            $m->Host       = SMTP_HOST; // Set the SMTP server to send through
            $m->SMTPAuth   = true; // Enable SMTP authentication
            $m->Username   = ELASTIC_MAIL_API_KEY; //SMTP username
            $m->Password   = ELASTIC_MAIL_API_KEY; //SMTP password
            $m->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; //Enable implicit TLS encryption
            $m->Port       = SMTP_PORT; //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            ## Recipients
            $m->setFrom(MAIL_FROM_ADDRESS, MAIL_FROM_NAME);
            $m->addAddress($payload['to_email'], $payload['to_name']); // Add a recipient

            ## Content
            $m->isHTML(true); // Set email format to HTML
            $m->Subject = $payload['subject'];
            $m->Body    = $payload['message_html'];

            if(!isset($payload['message_text'])) {
                $m->AltBody = Html2Text::convert($payload['message_html']);
            }

            $m->send();

            $res = [
                'message' => 'success' // Message has been sent
            ];

            return $res;

        } catch (Exception $e) {

            $res = [
                'error' => true,
                'message' => "Message could not be sent. Mailer Error: {$e->ErrorInfo}"
            ];

            return $res;
        }
    }
}
