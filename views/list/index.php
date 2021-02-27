<?php include_once ROOT . '/views/layouts/header.php' ?>

<main class="page-main">
    <div class="container">

        <div class="main-block">

            <div class="form-title">My lists</div>

            <form action="/user/lists/" method="post" autocomplete="off" class="add-record-form">
                <input type="text" name="title" value="<?= $newListTitle ?>" placeholder="Add list" required>
                <input type="submit" name="list_add_submit" value="Add">
            </form>

            <?php if ($errors): ?>
                <div class="form-error-message">
                    <?= "- " . $errors[0] ?>
                </div>
            <?php endif; ?>

            <table class="lists-table">
            <?php foreach ($lists as $item): ?>

                <tr><td><a href="/list/<?= $item['id'] ?>"><?= $item['title'] ?></a></td></tr>

            <?php endforeach; ?>
            </table>

        </div>
        
    </div>
</main>

<?php include_once ROOT . '/views/layouts/footer.php' ?>