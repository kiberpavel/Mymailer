<?php
require_once __DIR__ . '/../vendor/autoload.php';

use App\Transport\MailTransport;
use App\Template;


$mail = new MailTransport();

$mail->send(new \App\Transport\Message('','','',''));
