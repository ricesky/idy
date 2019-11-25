<?php

namespace Idy\Idea\Application;

use Idy\Idea\Domain\Model\IdeaRepository;
use Idy\Idea\Domain\Model\Idea;

class CreateNewIdeaService
{
    private $ideaRepository;

    public function __construct(
        IdeaRepository $ideaRepository)
    {
        $this->ideaRepository = $ideaRepository;
    }

    public function execute(CreateNewIdeaRequest $request)
    {
        $idea = Idea::makeIdea(
            $request->title, 
            $request->description,
            $request->authorName,
            $request->authorEmail);

        $this->ideaRepository->save($idea);
    }

}