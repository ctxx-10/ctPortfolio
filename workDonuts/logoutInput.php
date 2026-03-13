<?php session_start(); ?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="common/reset.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100..900&family=Noto+Serif:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles/style.css">
    <title>C.C.Donuts | ログアウトページ</title>
</head>

<body>
    <?php require 'includes/header.php'; ?>

    <main>
        <div class="navName">
            <!-- パンくずナビ 後にリンク作成・機能させる -->
            <nav class="space">
                <p><a href="index.php" class="textLine">TOP</a>＞ログアウト</p>
            </nav>
            <hr>
            <?php require 'includes/userNameDisplay.php'; ?>
            <hr>
        </div>

        <!-- ログアウト画面 -->
        <div class="login">
            <!-- タイトル -->
            <div class="screenTitle">
                <h1>ログアウト</h1>
            </div>
            <div class="screenLattice">
                <div class="loginForm">
                    <p class="center">ログアウトしますか？</p>
                    <form action="logoutOutput.php" method="post">
                        <p class="nextBtn"><input type="submit" value="ログアウトする"></P>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <?php require 'includes/footer.php'; ?> 
</body>