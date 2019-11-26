<?php

namespace Idy\Idea\Controllers\Web;

use Phalcon\Mvc\Controller;

use Idy\Idea\Application\GetIdeaService;
use Idy\Idea\Application\GetIdeaResponse;

use Idy\Idea\Application\RateIdeaRequest;
use Idy\Idea\Application\RateIdeaService;

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
            $ideaId = $this->request->getPost('id');
            $rating = $this->request->getPost('rating');
            $email = $this->request->getPost('email');

            $request = new RateIdeaRequest($ideaId, $rating, $email);

            $ideaRepository = $this->di->getShared('sql_idea_repository');
            $service = new RateIdeaService($ideaRepository);

            try {
                $service->execute($request);
            } catch (IdeaNotFoundException $e) {
                $this->flashSession->warning("<h4 class=\"alert-heading\">Idea not found!</h4>");
            } 

            
        }
    }

}