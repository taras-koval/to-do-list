<?php include_once ROOT . '/views/layouts/header.php' ?>

<main class="page-main">
    <div class="container">

        <div class="auth-block">

            <div class="form-title">Registration</div>
            
            <form action="/register/" method="post" autocomplete="off" class="auth-form">        
                <input type="text" name="username" value="<?= $username ?>" placeholder="Username" required>
                <input type="password" name="password" value="<?= $password ?>" placeholder="Password" required>
                <input type="password" name="confirm" value="<?= $confirm ?>" placeholder="Confirm password" required>

                <?php if ($errors): ?>
                    <div class="form-error-message">
                        <?= "- " . $errors[0] ?>
                    </div>
                <?php endif; ?>

                <input type="submit" name="register_submit" value="Register">
            </form>

            <div class="form-help-message">
                <span>Already have an account? </span><a href="/login/">Login</a>
            </div>

        </div>
        
    </div>
</main>

<?php include_once ROOT . '/views/layouts/footer.php' ?>