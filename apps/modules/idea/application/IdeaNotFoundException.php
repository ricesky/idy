<?php

namespace Idy\Idea\Application;

class IdeaNotFoundException extends \Exception
{
    public function __construct($message, $code = 0, Exception $previous = null) {
        parent::__construct($message, $code, $previous);
    }
}