<?php

namespace application\controllers;

use application\core\Controller;


class MainController extends Controller{

       public function indexAction(){
            $result = $this->model->getNews();
            //debug($result);
            $vars = [
                 'news' => $result,
            ];
            //debug($vars);
            $this->view->render('Main page 123', $vars);
       }

    }