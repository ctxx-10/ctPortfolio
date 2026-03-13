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
    <title>C.C.Donuts | ログインページ</title>
</head>

<body>
    <?php require 'includes/header.php'; ?>

    <main>
        <div class="navName">
            <!-- パンくずナビ 後にリンク作成・機能させる -->
            <nav class="space">
                <p><a href="index.php" class="textLine">TOP</a>＞ログイン</p>
            </nav>
            <hr>
            <?php require 'includes/userNameDisplay.php'; ?>
            <hr>
        </div>

        <!-- ログイン画面 -->
        <div class="login">
            <!-- タイトル -->
            <div class="screenTitle">
                <h1>ログイン</h1>
            </div>
            <div class="screenLattice">
                <form action="includes/userLogin.php" method="post" class="loginForm">
                    <div class="formWrap">
                        <p class="formName">メールアドレス</p>
                        <label>
                            <p class="textInput"><input type="email" name="mail" class="loginTxt" placeholder="123＠gmail.com"></p>
                        </label>
                    </div>
                    <div class="formWrap">
                        <p class="formName">パスワード</p>
                        <label>
                            <p class="textInput"><input type="password" name="password" class="loginTxt" placeholder="123456"></p>
                        </label>                  
                    </div>
                    <p class="nextBtn"><input type="submit" value="ログインする"></P>
                </form>
                <p class="register">
                    <a href="signUp.php">会員登録はこちら</a>
                </p>
                <!-- signUp.phpへ遷移 -->
            </div>
        </div>
    </main>
    <?php require 'includes/footer.php'; ?> 
</body>