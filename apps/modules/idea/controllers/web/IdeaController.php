<?php

namespace Idy\Idea\Controllers\Web;

use Phalcon\Mvc\Controller;

use Idy\Idea\Application\CreateNewIdeaRequest;
use Idy\Idea\Application\CreateNewIdeaService;
use Idy\Idea\Application\ViewAllIdeasService;

class IdeaController extends Controller
{
    public function indexAction()
    {
        //execute application service
        $ideaRepository = $this->di->getShared('sql_idea_repository');
        $service = new ViewAllIdeasService($ideaRepository);

        $response = $service->execute();

        //return response/view
        $this->view->setVar('ideas', $response->ideas);
        return $this->view->pick('home');
    }

    public function addAction()
    {
        if ($this->request->isPost()) {

            $title = $this->request->getPost('title');
            $description = $this->request->getPost('description');
            $authorName = $this->request->getPost('author_name');
            $authorEmail = $this->request->getPost('author_email');

            //TODO: validate request

            //execute application service
            $request = new CreateNewIdeaRequest(
                $title,
                $description,
                $authorName,
                $authorEmail
            );

            $ideaRepository = $this->di->getShared('sql_idea_repository');
            $service = new CreateNewIdeaService($ideaRepository);
            $service->execute($request);

            $this->flashSession->success("<h4 class=\"alert-heading\">Your idea has been posted!</h4><a href=\"" . $this->url->get('') . "\">Back to see your awesome ideas</a>.");

            $this->view->setVar('title', $title);
            $this->view->setVar('description', $description);
            $this->view->setVar('author_name', $authorName);
            $this->view->setVar('author_email', $authorEmail);  
            return $this->view->pick('add');

        } else {

            $this->view->setVar('title', '');
            $this->view->setVar('description', '');
            $this->view->setVar('author_name', '');
            $this->view->setVar('author_email', '');    
            return $this->view->pick('add');
        }
    }

    public function voteAction()
    {

    }

    public function rateAction()
    {
        
    }

}