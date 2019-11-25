<?php

namespace Idy\Idea\Application;

use Idy\Idea\Domain\Model\IdeaRepository;
use Idy\Idea\Domain\Model\Idea;

class ViewAllIdeasService
{
    private $ideaRepository;

    public function __construct(
        IdeaRepository $ideaRepository)
    {
        $this->ideaRepository = $ideaRepository;
    }

    public function execute()
    {
        $ideas = $this->ideaRepository->all();

        $response = new ViewAllIdeasResponse();

        if ($ideas) {
            foreach ($ideas as $row) {
                $response->addIdeaResponse(
                    $row->id()->id(),
                    $row->title(),
                    $row->description(),
                    $row->author()->name(),
                    $row->author()->email(),
                    $row->averageRating(),
                    $row->totalVotes()
                );
            }
        }

        return $response;
    }

}