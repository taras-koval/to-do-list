<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">

    <meta name="description" content="Individual task">
    <meta name="keywords" content="to do list">
    <meta name="author" content="Taras Koval">

    <title><?= $this->title ?></title>
    
    <link rel="stylesheet" href="/template/styles/fonts.css">
    <link rel="stylesheet" href="/template/styles/common.css">
    <link rel="stylesheet" href="/template/styles/main.css">

</head>
<body>

<header class="page-header">
    <div class="container">
        
        <a href="/" class="logo">To Do List</a>

        <nav class="page-nav">
            <?php if (isset($_SESSION['user'])): ?>

            <span class="username"><?= $_SESSION['user']['username'] ?></span>

            <a href="/lists/">My lists</a>
            <a href="/logout/">Logout</a>

            <?php else: ?>

            <a href="/login/">Login</a>
            <a href="/register/">Register</a>

            <?php endif; ?>
        </nav>

    </div>
</header>