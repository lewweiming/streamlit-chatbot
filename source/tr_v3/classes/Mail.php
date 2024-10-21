<?php

class Mail
{
    // Write your and extend your own classes
    public static function sendTest($email_to)
    {
        $r = PHPMailerX2F::send([
            'to_email' => $email_to,
            'to_name' => 'User',
            'subject' => 'Test Mail From ' . APP_NAME,
            'message_html' => '<h1>Test succeeded</h1>'
        ]);

        return $r;
    }

    public static function send($email_to, $subject, $html_body, $text_content = '')
    {
        $r = PHPMailerX2F::send([
            'to_email' => $email_to,
            'to_name' => 'User',
            'subject' => $subject,
            'message_html' => $html_body,
            'message_text' => $text_content
        ]);

        return $r;
    }

    // public static function sendOrderReceipt($email_to, Order $order)
    // {
    //     $twig = Twig::getTwig();

    //     $template_html = $twig->render('email-templates/order_receipt.html', [
    //         'order' => $order
    //     ]);

    //     $r = PHPMailerX2F::send([
    //         'to_email' => $email_to,
    //         'to_name' => 'Customer',
    //         'subject' => 'Receipt for your order',
    //         'message_html' => $template_html
    //     ]);

    //     return $r;
    // }
}

?>