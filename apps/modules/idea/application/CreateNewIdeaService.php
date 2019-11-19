<?php

namespace Idy\Idea\Application;

use Idy\Idea\Domain\Model\IdeaRepository;

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
        //$idea = new Idea();

        //$this->ideaRepository->save($idea);
    }

}