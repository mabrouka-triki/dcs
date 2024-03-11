<?php

namespace App\Exceptions;
use Exception;
use Throwable;

class MonException extends Exception{
    protected $message = 'Unknown exception';
    private $string;
    protected $code = 0;
    private $strade;

    public function __construct($message, $code = 0, Exception $previous = null)
    {
        if(!$message){
            throw new $this('Unkown' .get_class($this));
        }parent::__construct($message, $code);
    }

    public function __toString(){
        return get_class($this)."'{$this->message}' in {$this->line})\n"
            ."{$this->getTraceAsString()}";
    }
}

?>
