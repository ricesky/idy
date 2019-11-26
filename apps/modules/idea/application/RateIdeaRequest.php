<?php

namespace Idy\Idea\Application;

class RateIdeaRequest
{
    public $ideaId;
    public $rating;
    public $email;

    public function __construct($ideaId, $rating, $email)
    {
        $this->ideaId = $ideaId;
        $this->rating = $rating;
        $this->email = $email;
    }

}