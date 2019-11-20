<?php

namespace Idy\Idea\Domain\Model;

use Ramsey\Uuid\Uuid;

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