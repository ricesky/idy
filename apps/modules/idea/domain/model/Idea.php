<?php

namespace Idy\Idea\Domain\Model;

class Idea
{
    private $id;
    private $title;
    private $description;
    private $author;
    private $averageRating;
    private $totalVotes;

    public function id() 
    {
        return $this->id;
    }

    public function title()
    {
        return $this->title;
    }

    public function description()
    {
        return $this->description;
    }

    public function author()
    {
        return $this->author;
    }

    public function totalVotes()
    {
        return $this->totalVotes;
    }

    public function averageRating()
    {
        return $this->averageRating;
    }

    public function __construct(
        IdeaId $id, $title, $description, 
        Author $author, $averageRating, $totalVotes)
    {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->author = $author;
        $this->averageRating = $averageRating;
        $this->totalVotes = $totalVotes;
    }

    public function addRating($raterEmail, RatingValue $ratingValue)
    {
        $newRating = new Rating(new RatingId(), $raterEmail, $ratingValue);

        if ($newRating->isValid()) {
            $exist = false;
            foreach ($this->ratings as $existingRating) {
                if ($existingRating->equals($newRating)) {
                    $exist = true;
                }
            }

            if (!$exist) {
                array_push($this->ratings, $newRating);
            } else {
                throw new Exception('Author ' . $newRating->author() . ' has given a rating.');
            }

            DomainEventPublisher::instance()->publish(
                new IdeaRated($this->author->name(), $this->author->email(), 
                    $this->title, $ratingValue)
            );

        }
    }

    public function vote()
    {   
        $this->votes = $this->votes + 1;
    }

    public static function makeIdea($title, $description, $authorName, $authorEmail)
    {
        $author = new Author($authorName, $authorEmail);
        
        $newIdea = new Idea(new IdeaId(), $title, $description, $author, 0, 0);
        
        return $newIdea;
    }

}