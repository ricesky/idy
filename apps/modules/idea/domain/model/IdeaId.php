<?php

namespace Idy\Idea\Domain\Model;

use Rhumsaa\Uuid\Uuid;

class IdeaId
{
    private $id;

    public function __construct($id = null)
    {
        $this->id = $id ? : Uuid::uuid4()->toString();
    }

    public function id() 
    {
        return $this->id;
    }

    public function equals(IdeaId $ideaId)
    {
        return $this->id === $ideaId->id;
    }

}