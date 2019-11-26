<?php

namespace Idy\Idea\Application;

class GetIdeaResponse
{
    public $id;
    public $title;
    public $description;
    public $authorName;
    public $authorEmail;

    public function __construct($id, $title, $description, $authorName, $authorEmail)
    {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->authorName = $authorName;
        $this->authorEmail = $authorEmail;
    }

}