<?php

require_once 'Controller.php';

class MainController extends Controller
{

    public function actionIndex()
    {
        $this->title = "Test";
        
        require_once(ROOT.'/views/main/index.php');
        return true;
    }

    public function actionNotFound()
    {
        http_response_code(404);

        require_once(ROOT.'/views/main/404.php');
        return true;
    }

}

?>