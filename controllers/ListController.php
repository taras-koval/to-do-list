<?php

require_once 'Controller.php';

class ListController extends Controller
{
    public function __construct()
    {
        $this->title = 'Lists';
    }

    public function actionIndex()
    {
        if (!isset($_SESSION['user'])) {
            header("Location: /login/");
            return true;
        }

        $userId = $_SESSION['user']['id'];

        $lists = ToDoList::read($userId);

        $newListTitle = '';
        $errors = false;

        if (isset($_POST['list_add_submit'])) {
            $newListTitle = $_POST['title'];

            foreach ($lists as $item) {
                if ($item['title'] == $newListTitle) {
                    $errors[] = 'List \'' . $newListTitle . '\' already exists';
                }
            }

            if (!$errors) {
                $result = ToDoList::create($newListTitle, $userId);
                $lists = ToDoList::read($userId);
            }
        }

        require_once(ROOT . '/views/list/index.php');
        return true;
    }

    public function actionView($listId)
    {
        if (!isset($_SESSION['user'])) {
            header("Location: /login/");
            return true;
        }

        $listInfo = ToDoList::readByListId($listId);

        if (!$listInfo) {
            http_response_code(404);
            require_once(ROOT . '/views/main/404.php');
            return true;
        }

        if ($listInfo['user_id'] !== $_SESSION['user']['id']) {
            http_response_code(403);
            require_once(ROOT . '/views/main/403.php');
            return true;
        }


        if (isset($_POST['task_add_submit'])) {
            $newTaskTitle = $_POST['title'];
            $result = Task::create($newTaskTitle, $listId);
        }

        $tasks = Task::read($listId);

        if (isset($_POST['save_tasks_submit'])) {

            foreach ($tasks as $task) {
                Task::updateStatus($task['id'], 0);
            }

            if (isset($_POST['is_done'])) {
                foreach ($_POST['is_done'] as $id => $val) {
                    Task::updateStatus($id, 1);
                }
            }

        }

        $tasks = Task::read($listId);

        require_once(ROOT . '/views/list/view.php');
        return true;
    }

    public function actionDel($listId, $taskId)
    {
        if (!isset($_SESSION['user'])) {
            header("Location: /login/");
            return true;
        }

        $taskInfo = Task::readByTaskId($taskId);

        if (!$taskInfo) {
            http_response_code(404);
            require_once(ROOT . '/views/main/404.php');
            return true;
        }

        Task::delete($taskId);

        header("Location: /list/$listId");
        return true;
    }

}

?>