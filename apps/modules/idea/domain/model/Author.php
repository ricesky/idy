<?php

namespace Idy\Idea\Domain\Model;

class Author
{
    private $name;
    private $email;
    
    public function __construct($name, $email)
    {
        $this->name = $name;
        $this->email = $email;
    }

}