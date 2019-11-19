<?php

namespace Idy\Common\Events;

interface DomainEvent
{
    /**
    * @return DateTimeImmutable
    */
    public function occurredOn();
}