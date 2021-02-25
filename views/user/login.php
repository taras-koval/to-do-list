<?php include_once ROOT . '/views/layouts/header.php' ?>

<main class="page-main">
    <div class="container">

        <div class="auth-block">

            <div class="form-title">Login</div>
            
            <form action="/login/" method="post" class="auth-form">
                <input type="text" name="username" value="<?= $username ?>" placeholder="Username" required>
                <input type="password" name="password" value="<?= $password ?>" placeholder="Password" required>

                <?php if ($errors): ?>
                    <div class="form-error-message">
                        <?= "- " . $errors[0] ?>
                    </div>
                <?php endif; ?>

                <input type="submit" name="login_submit" value="Login">
            </form>

            <div class="form-help-message">
                <span>Don't have an account yet? </span><a href="/register/">Register</a>
            </div>

        </div>
        
    </div>
</main>

<?php include_once ROOT . '/views/layouts/footer.php' ?>