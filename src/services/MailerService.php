<?php

namespace App\services;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class MailerService
{
    private PHPMailer $mail;

    public function __construct()
    {
        $this->mail = new PHPMailer(true);

        $this->mail->isSMTP();
        $this->mail->Host       = 'smtp.gmail.com';
        $this->mail->SMTPAuth   = true;
        $this->mail->Username   = 'brunorafamed.com@gmail.com';
        $this->mail->Password   = 'erixzfvbavlbkbjg';
        $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $this->mail->Port       = 587;
        $this->mail->CharSet    = 'UTF-8';
    }

    public function sendMail(string $fromEmail, string $fromName, string $toEmail, string $toName, string $subject, string $body): bool
    {
        $this->mail->clearAddresses();
        $this->mail->clearAttachments();

        $this->mail->setFrom('brunorafamed.com@gmail.com', 'Site - Contato');
        $this->mail->addAddress($toEmail, $toName);
        $this->mail->addReplyTo($fromEmail, $fromName);

        $this->mail->isHTML(true);
        $this->mail->Subject = $subject;
        $this->mail->Body    = $body;

        return $this->mail->send();
    }
}
