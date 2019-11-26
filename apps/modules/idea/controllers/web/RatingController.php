<?php

namespace Idy\Idea\Controllers\Web;

use Phalcon\Mvc\Controller;

use Idy\Idea\Application\GetIdeaService;
use Idy\Idea\Application\GetIdeaResponse;

class RatingController extends Controller
{
    public function rateAction($param)
    {
        $ideaId = $param;

        //execute application service
        $ideaRepository = $this->di->getShared('sql_idea_repository');
        $service = new GetIdeaService($ideaRepository);
        $response = $service->execute($ideaId);
        
        $this->view->setVar('id', $response->id);
        $this->view->setVar('title', $response->title);
        $this->view->setVar('description', $response->description);
        $this->view->setVar('author_name', $response->authorName);
        $this->view->setVar('author_email', $response->authorEmail);
        return $this->view->pick('rate');
        
    }

    public function saveAction()
    {
        if ($this->request->isPost()) {
            
        }
    }

}