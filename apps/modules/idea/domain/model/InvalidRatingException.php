<?php

namespace Idy\Idea\Domain\Model;

class InvalidRatingException extends \Exception
{
    public function __construct($message, $code = 0, Exception $previous = null) {
        parent::__construct($message, $code, $previous);
    }
}