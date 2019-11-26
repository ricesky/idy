<?php

namespace Idy\Idea\Application;

use Idy\Idea\Domain\Model\IdeaRepository;
use Idy\Idea\Domain\Model\Idea;
use Idy\Idea\Domain\Model\IdeaId;
use Idy\Idea\Domain\Model\RatingId;
use Idy\Idea\Domain\Model\RatingValue;

class RateIdeaService
{
    private $ideaRepository;

    public function __construct(
        IdeaRepository $ideaRepository)
    {
        $this->ideaRepository = $ideaRepository;
    }

    public function execute(RateIdeaRequest $request)
    {
        $idea = $this->ideaRepository->byId(new IdeaId($request->ideaId));

        if ($idea) {

            $idea->addRating(
                new RatingId(),
                $request->email, 
                new RatingValue($request->rating)
            );

        } else {
            throw new IdeaNotFoundException('The idea cannot be found.');
        }
    }

}