<?php

namespace App\Transport;

use Monolog\Formatter\JsonFormatter;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Swift_Mailer;
use Swift_Message;
use Swift_SmtpTransport;

class MailTransport implements TransportInterface{
    
    public function send(Message $message): bool
    {
        $log = new Logger('name');
        $formatter = new JsonFormatter();
        $stream = new StreamHandler(__DIR__ . '/../../logs/log.log', Logger::DEBUG);
        $stream->setFormatter($formatter);
        $log->pushHandler($stream);
        $result = false;
        
        $config = include  __DIR__ . '/../../config/config.php';
    
        $transport = (new Swift_SmtpTransport($config['services']['gmail']['smtp'], $config['services']['gmail']['port'], $config['services']['gmail']['encryption']))
            ->setUsername($config['services']['gmail']['username'])
            ->setPassword($config['services']['gmail']['password']);
    
        $mailer = new Swift_Mailer($transport);

        $message = (new Swift_Message('Wonderful Subject'))
            ->setFrom(['john@doe.com' => 'John Doe'])
            ->setTo(['testtexnik7@gmail.com', 'other@domain.org' => 'A name'])
            ->setBody('Here is the message itself');
    
        try {
            (bool)$result = $mailer->send($message);
        } catch (\Exception $exception) {
            $log->error('Error',[$exception]);
        }
        return $result;
    }
}