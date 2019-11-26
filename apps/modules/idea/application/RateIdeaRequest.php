<?php

namespace Idy\Idea\Application;

class RateIdeaRequest
{
    public $id;
    public $rating;

    public function __construct($id, $rating)
    {
        $this->id = $id;
        $this->rating = $rating;
    }

}