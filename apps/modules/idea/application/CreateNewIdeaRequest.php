<?php

namespace Idy\Idea\Application;

class CreateNewIdeaRequest
{
    public $ideaTitle;
    public $authorName;
    public $authorEmail;

    public function __construct($ideaTitle, $authorName, $authorEmail)
    {
        $this->ideaTitle = $ideaTitle;
        $this->authorName = $authorName;
        $this->authorEmail = $authorEmail;
    }

}