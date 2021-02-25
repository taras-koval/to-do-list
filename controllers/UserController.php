<?php

require_once 'Controller.php';

class UserController extends Controller
{
    public function __construct()
    {
        $this->title = 'To Do List - User';
    }

    public function actionRegister()
    {
        if (isset($_SESSION['user'])) {
            header("Location: /");
            return true;
        }

        $this->title = 'User Register';

        $username = '';
        $password = '';
        $confirm = '';

        $errors = false;
        $result = false;

        if (isset($_POST['register_submit'])) {

            // TO DO - Data validation
            $username = $_POST['username'];
            $password = $_POST['password'];
            $confirm = $_POST['confirm'];


            if (User::findUsername($username)) {
                $errors[] = "$username already exists";
            }

            if ($password !== $confirm) {
                $errors[] = 'Passwords do not match';
            }

            // Registration new user
            if ($errors === false) {
                $result = User::create($username, $password);
            }

            if ($result) {
                $userId = User::login($username, $password);
                $_SESSION['user'] = User::read($userId);
                header("Location: /");

            } else {
                $errors[] = "Registration error";
            }
        }

        require_once(ROOT . '/views/user/register.php');
        return true;
    }

    public function actionLogin()
    {
        if (isset($_SESSION['user'])) {
            header("Location: /");
            return true;
        }

        $this->title = 'User Login';

        $username = '';
        $password = '';

        $errors = false;

        if (isset($_POST['login_submit'])) {

            // TO DO - Data validation
            $username = $_POST['username'];
            $password = $_POST['password'];

            $userId = User::login($username, $password);

            if ($userId) {
                $_SESSION['user'] = User::read($userId);
                header("Location: /");

            } else {
                $errors[] = 'Invalid login or password';
            }
        }

        require_once(ROOT . '/views/user/login.php');
        return true;
    }

    public function actionLogout()
    {
        unset($_SESSION['user']);

        header("Location: /login/");
        return true;
    }
}

?>