<?php 

namespace Idy\Idea\Infrastructure;

class SqlIdeaRepository implements IdeaRepository
{
    private $ideas;

    public function __construct()
    {
        $this->ideas = array();
    }

    public function byId(IdeaId $id)
    {

    }

    public function save(Idea $idea)
    {

    }

    public function allIdeas()
    {

    }
    
}