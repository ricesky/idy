<?php

namespace Idy\Idea\Controllers\Web;

use Phalcon\Mvc\Controller;

class IndexController extends Controller
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