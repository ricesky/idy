<?php

namespace Idy\Idea\Domain\Model;

class Rating
{
    private $id;
    private $email;
    private $value;

    public function __construct(RatingId $id, $email, RatingValue $value) 
    {
        $this->id = $id;
        $this->email = $email;
        $this->value = $value;
    }

    public function value() : RatingValue
    {
        return $this->value;
    }

}