<?php

namespace Idy\Idea\Application;

class CreateNewIdeaRequest
{
    public $title;
    public $description;
    public $authorName;
    public $authorEmail;

    public function __construct($title, $description, $authorName, $authorEmail)
    {
        $this->title = $title;
        $this->description = $description;
        $this->authorName = $authorName;
        $this->authorEmail = $authorEmail;
    }

}