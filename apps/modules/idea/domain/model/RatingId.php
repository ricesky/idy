<?php

namespace Idy\Idea\Domain\Model;

use Ramsey\Uuid\Uuid;

class RatingId
{
    private $id;

    public function __construct($id = null)
    {
        $this->id = $id ? : Uuid::uuid4()->toString();
    }

    public function id() 
    {
        return $this->id;
    }

    public function equals(RatingId $ratingId)
    {
        return $this->id === $ratingId->id;
    }

}