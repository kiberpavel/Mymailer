<?php

namespace App\Transport;

class Message{
    
    private $subject;
    private $body;
    private $to;
    private $from;
    
    public function __construct(string $subject, string $body, string $to, string $from)
    {
        $this->subject = $subject;
        $this ->body = $body;
        $this -> to = $to;
        $this -> from = $from;
        
    }
    
//    public function setSubject(): string{
//        return $this->subject;
//    }
//    public function setBody(): string{
//        return $this->subject;
//    }
//    public function setTo(): string{
//        return $this->subject;
//    }
//    public function setFrom(): string{
//        return $this->subject;
//    }
    
    public function getSubject(): string{
        return $this->subject;
    }
    
     public function getBody(): string{
         return $this->body;
     }
     
      public function getTo(): string{
          return $this->to;
      }
      
       public function getFrom(): string{
           return $this->from;
       }
    
}
