<?php

require_once 'Controller.php';

class MainController extends Controller
{
    public function actionIndex()
    {
        if (isset($_SESSION['user'])) {
            header("Location: /user/lists/");
        } else {
            header("Location: /login/");
        }

        return true;
    }

    public function actionNotFound()
    {
        http_response_code(404);
        require_once(ROOT . '/views/main/404.php');
        return true;
    }

}

?>