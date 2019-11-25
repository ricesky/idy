<?php

namespace Idy\Idea\Domain\Model;

class RatingValue
{
    private $value;

    public function __construct($value)
    {
        if ($value >= 0 && $value <= 5) {
            $this->value = $value;
        } else {
            throw new \InvalidArgumentException();
        }
    }

    public function value() 
    {
        return $this->value;
    }

}