<?php

namespace Idy\Idea\Domain\Model;

interface RatingRepository
{
    public function save(Rating $rating);
}