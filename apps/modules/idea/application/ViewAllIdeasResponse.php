<?php

namespace Idy\Idea\Application;

class ViewAllIdeasResponse
{
    public $ideas;

    public function __construct()
    {
        $this->ideas = array();
    }

    public function addIdeaResponse($id, $title, $description,
        $authorName, $authorEmail, $rating, $vote)
    {
        $idea = array(
            'id' => $id,
            'title' => $title,
            'description' => $description,
            'author_name' => $authorName,
            'author_email' => $authorEmail,
            'rating' => $rating,
            'vote' => $vote
        );

        array_push($this->ideas, $idea);
    }

}