<?php session_start(); ?>

<?php
    // ログインしていたかの判定
    $logged = isset($_SESSION['customers']);

    //ログインしてた場合：削除
    if ($logged) {
        unset($_SESSION['customers']);
    };
?>

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
    <title>C.C.Donuts | ログアウト完了</title>
</head>

<body>
    <?php require 'includes/header.php'; ?>

    <main>
        <div class="navName">
            <!-- パンくずナビ 後にリンク作成・機能させる -->
            <nav class="space">
                <p><a href="index.php" class="textLine">TOP</a>＞ログアウト
                    <?php
                        if (isset($_SESSION['customers'])) {
                            echo '＞ログアウト完了';
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
                if ($logged) {
                    echo
                        '<div class="screenTitle">
                            <h1>
                                ログアウト完了
                            </h1>
                        </div>';
                };
            ?>
            <div class="screenLattice">
                <?php
                    if ($logged) {
                        echo
                            // ログインしていた場合
                            '<div class="loginForm">
                                <p class="center">ログアウトしました。</p>
                            </div>';
                    } else {
                        unset($_SESSION['customers']);
                        echo
                            // ログインしていなかった場合
                            '<div class="loginForm outputSpace">
                                <p class="center">すでにログアウトしています。</p>
                            </div>';
                    };
                ?>
                
                <p class="register">
                    <?php
                        if (!isset($_SESSION['customers'])) {
                            echo '<a href="loginInput.php">ログインする</a><br>';
                            echo '<a href="index.php">TOPページへもどる</a>';
                        };
                    ?>
                </p>
            </div>
        </div>
    </main>
    <?php require 'includes/footer.php'; ?> 
</body>