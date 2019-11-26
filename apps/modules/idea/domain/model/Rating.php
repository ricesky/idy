<?php

namespace Idy\Idea\Domain\Model;

class Rating
{
    private $id;
    private $email;
    private $value;
    private $ideaId;

    public function __construct(RatingId $id, $email, 
        RatingValue $value, IdeaId $ideaId) 
    {
        $this->id = $id;
        $this->email = $email;
        $this->value = $value;
        $this->ideaId = $ideaId;
    }

    public function id() : ?RatingId
    {
        return $this->id;
    }

    public function email()
    {
        return $this->email;
    }

    public function value() : RatingValue
    {
        return $this->value;
    }

    public function equals(Rating $rating)
    {
        if ($this->email == $rating->email && 
            $this->ideaId->equals($rating->ideaId)) 
        {
            return true;
        } 
        return false;
    }

}