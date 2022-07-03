<?php

use PHPMailer\PHPMailer\PHPMailer;

class Mailer
{
    public $mailer;

    public function __construct()
    {
        $this->mailer = new PHPMailer();
        $this->mailer->isSMTP();
        $this->mailer->Host = 'smtp.mailtrap.io';
        $this->mailer->SMTPAuth = true;
        $this->mailer->Username = '29041ef92c7d65';
        $this->mailer->Password = 'f3a4ae05de8916';
        $this->mailer->SMTPSecure = 'tls';
        $this->mailer->Port = 465;

        $this->mailer->setFrom('mountkuma@framework', 'Mountkuma-Framework');
    }

    public function send_mail($to, $subject, $body)
    {
        $this->mailer->addAddress($to);
        $this->mailer->Subject = $subject;
        $this->mailer->Body = $body;

        return $this->mailer->send();
    }
}