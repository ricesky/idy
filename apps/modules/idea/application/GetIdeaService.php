<?php

namespace Idy\Idea\Application;

use Idy\Idea\Domain\Model\IdeaRepository;
use Idy\Idea\Domain\Model\Idea;
use Idy\Idea\Domain\Model\IdeaId;

class GetIdeaService
{
    private $ideaRepository;

    public function __construct(
        IdeaRepository $ideaRepository)
    {
        $this->ideaRepository = $ideaRepository;
    }

    public function execute($ideaId)
    {
        $idea = $this->ideaRepository->byId(new IdeaId($ideaId));

        return new GetIdeaResponse(
            $idea->id()->id(),
            $idea->title(),
            $idea->description(),
            $idea->author()->name(),
            $idea->author()->email());
    }

}