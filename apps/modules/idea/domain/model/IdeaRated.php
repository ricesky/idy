<?php

namespace Idy\Idea\Domain\Model;

use Idy\Common\Events\DomainEvent;

class IdeaRated implements DomainEvent 
{
    public $idea;
    public $raterEmail;

    private $occuredOn;

    public function __construct(
        Idea $idea,
        $raterEmail)
    {
        $this->idea = $idea;
        $this->raterEmail = $raterEmail;
    }

    /**
    * @return DateTimeImmutable
    */
    public function occurredOn()
    {
        return $this->occuredOn;
    }
}