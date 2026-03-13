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
    <title>C.C.Donuts | ログイン完了</title>
</head>

<body>
    <?php require 'includes/header.php'; ?>

    <main>
        <div class="navName">
            <!-- パンくずナビ 後にリンク作成・機能させる -->
            <nav class="space">
                <p>TOP＞ログイン
                    <?php
                        if (isset($_SESSION['customers'])) {
                            echo '＞ログイン完了';
                        } else {
                            echo '';
                        };
                    ?>
                </p>
            </nav>
            <hr>
            <!-- ユーザー名表示 -->
                <?php require 'includes/userNameDisplay.php'; ?>
                <hr>
        </div>

        <!-- ログイン画面 -->
        <div class="login">
            <!-- タイトル -->
            <?php
                if (isset($_SESSION['customers'])) {
                    echo
                        '<div class="screenTitle">
                        <h1>
                        ログイン完了
                        </h1>
                        </div>';
                } else {
                    echo '';
                };
            ?>

            <div class="screenLattice">
                <?php
                    if (isset($_SESSION['customers'])) {
                        echo
                            '<div class="loginForm">
                            <p class="center">ログインが完了しました。<br>引き続きお楽しみください。</p>
                            </div>';
                    } else {
                        echo
                            '<div class="loginForm outputSpace">
                            <p class="center">ログイン名またはパスワードが違います。</p>
                            </div>';
                    };
                ?>
                <p class="register">
                    <?php
                        if (isset($_SESSION['customers'])) {
                            echo '<a href="cart.php">購入確認ページへすすむ</a><br>';
                            echo '<a href="index.php">TOPページへもどる</a>';
                        } else {
                            echo '<a href="loginInput.php">戻る</a>';
                        };
                    ?>
                </p>
            </div>
        </div>
    </main>
    <?php require 'includes/footer.php'; ?> 
</body>