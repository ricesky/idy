<?php

namespace Idy\Idea\Domain\Model;

use Idy\Common\Events\DomainEvent;

class IdeaRated implements DomainEvent 
{
    public $ideaId;
    public $rating;
    public $email;

    private $occuredOn;

    public function __construct(
        IdeaId $id, RatingValue $rating, $email)
    {
        $this->ideaId = $id;
        $this->rating = $rating;
        $this->email = $email;
    }

    /**
    * @return DateTimeImmutable
    */
    public function occurredOn()
    {
        return $this->occuredOn;
    }
}