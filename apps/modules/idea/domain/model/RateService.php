<?php

namespace Idy\Idea\Domain\Model;

use Idy\Common\Events\DomainEventSubscriber;

class RateService implements DomainEventSubscriber
{
    private $rateRepository;

    public function __construct(RateRepository $rateRepository)
    {
        $this->rateRepository = $rateRepository;
    }

    public function execute(IdeaId $id, RatingValue $rating, $email)
    {

    }

    /**
     * @param DomainEvent $aDomainEvent
     */
    public function handle($aDomainEvent)
    {
        $this->execute($aDomainEvent->email(), $aDomainEvent->name(), $aDomainEvent->verificationToken());
    }

    /**
     * @param DomainEvent $aDomainEvent
     * @return bool
     */
    public function isSubscribedTo($aDomainEvent)
    {
        return $aDomainEvent instanceof UserRegistered;
    }
}