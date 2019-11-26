<?php

namespace Idy\Idea\Application;

use Idy\Common\Events\DomainEventSubscriber;
use Idy\Idea\Domain\Model\IdeaRated;
use Idy\Idea\Domain\Model\Idea;

class SendRatingNotificationEmailService implements DomainEventSubscriber
{
    public function __construct()
    {
    }

    public function execute(Idea $idea)
    {
        //send email
        $ideaTitle = $idea->title();
        $ideaAuthorName = $idea->author()->name();
        $ideaAuthorEmail = $idea->author()->email();

    }

    /**
     * @param DomainEvent $aDomainEvent
     */
    public function handle($aDomainEvent)
    {
        $this->execute($aDomainEvent->idea);
    }

    /**
     * @param DomainEvent $aDomainEvent
     * @return bool
     */
    public function isSubscribedTo($aDomainEvent)
    {
        return $aDomainEvent instanceof IdeaRated;
    }
}