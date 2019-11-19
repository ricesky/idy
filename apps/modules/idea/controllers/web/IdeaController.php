<?php

namespace Idy\Idea\Controllers\Web;

use Phalcon\Mvc\Controller;

class IdeaController extends Controller
{
    public function indexAction()
    {
        return $this->view->pick('home');
    }

    public function addAction()
    {

    }

    public function voteAction()
    {

    }

    public function rateAction()
    {
        
    }

}