<?php include_once ROOT . '/views/layouts/header.php' ?>

<main class="page-main">
    <div class="container">

        <div class="main-block">

            <div class="form-title">My tasks (<?= $listInfo['title'] ?>)</div>

            <form action="/list/<?= $listId ?>" method="post" autocomplete="off" class="add-record-form">
                <input type="text" name="title" value="" placeholder="Add task" required>
                <input type="submit" name="task_add_submit" value="Add">
            </form>

            <form action="/list/<?= $listId ?>" method="post" autocomplete="off" class="tasks-form">
                <table class="tasks-table">
                <?php foreach ($tasks as $item): ?>

                    <tr>
                        <?php if ($item['is_done']): ?>
                            <td colspan="1" class="td-center">
                                <input type="checkbox" value="1" name="is_done[<?= $item['id'] ?>]" checked>
                            </td>
                            <td colspan="4" class="done"> <?= $item['title'] ?>
                        <?php else: ?>
                            <td colspan="1" class="td-center">
                                <input type="checkbox" value="0" name="is_done[<?= $item['id'] ?>]">
                            </td>
                            <td colspan="4"> <?= $item['title'] ?>
                        <?php endif; ?>

                        <td colspan="1" class="td-center"> 
                            <a href="/list/del/<?= $listInfo['id'] ?>/<?= $item['id'] ?>">&#10060;</a>
                        </td>
                    </tr>

                <?php endforeach; ?>
                </table>

                <input type="submit" name="save_tasks_submit" value="Save" class="save-btn">
            </form>

        </div>
        
    </div>
</main>

<?php include_once ROOT . '/views/layouts/footer.php' ?>