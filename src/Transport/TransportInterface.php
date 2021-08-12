<?php

namespace App\Transport;


interface TransportInterface{
    
    public function send(Message $message):bool;
}
