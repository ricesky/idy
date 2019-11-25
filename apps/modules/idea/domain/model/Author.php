<?php

namespace Idy\Idea\Domain\Model;

class Author
{
    private $name;
    private $email;
    
    public function name() 
    {
        return $this->name;
    }

    public function email() 
    {
        return $this->email;
    }

    public function __construct($name, $email)
    {
        $this->name = $name;
        $this->email = $email;
    }

    public function toString()
    {
        return $this->name . " - " . $this->email;
    }

}