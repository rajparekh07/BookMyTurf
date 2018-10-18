<?php

namespace Turfasap\Exception;


use Exception;

class BaseException extends Exception
{
    protected $state;
    public function __construct($errors)
    {
        $this->message = $errors;
    }

    public function getErrors()
    {
        return $this->message;
    }

    protected function setState($state) {
        $this->state = $state;
    }

    protected static function getInstance($class, $args, $state) {
        $instance = new $class($args);
        $instance->setState($state);
        return $instance;
    }
}