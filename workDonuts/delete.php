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
    <title>C.C.Donuts | 削除</title>
</head>

<body>
    <?php require 'includes/header.php'; ?>

    <main>
        <div class="navName">
            <!-- パンくずナビ 後にリンク作成・機能させる -->
            <nav class="space">
                <p>
                    <a href="index.php" class="textLine">TOP</a>
                    ＞カート
                    ＞削除
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
            <!-- <div class="screenTitle">
                <h1></h1>
            </div> -->
            <div class="screenLattice deleteComp">
                <div class="loginForm">
                    <?php
                        // 削除したい商品IDを受け取る
                        $id = $_REQUEST['id'];
                        if (isset($_SESSION['cart'])) {
                            foreach ($_SESSION['cart'] as $index => $cart) {
                                // 商品IDが一致したら削除
                                if ($cart['id'] == $id) {
                                    unset($_SESSION['cart'][$index]);
                                    echo 'カートから商品を削除しました。';
                                    break;
                                };
                            };
                        } else {
                            echo 'カートの商品は削除されています。';
                        };
                    ?>
                </div>
                <p class="register">
                    <?php
                        echo '<a href="cart.php">カートに戻る</a><br>';
                        echo '<a href="products.php">商品一覧に戻る</a>';
                    ?>
                </p>
            </div>
        </div>
    </main>
    <?php require 'includes/footer.php'; ?> 
</body>