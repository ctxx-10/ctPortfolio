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
    <title>C.C.Donuts | 会員登録</title>
</head>

<body>
    <?php require 'includes/header.php'; ?>

    <main>
        <div class="navName">
            <!-- パンくずナビ 後にリンク作成・機能させる -->
            <nav class="space">
                <p>
                    <a href="index.php" class="textLine">TOP</a>
                    ＞<a href="loginInput.php" class="textLine">ログイン</a>
                    ＞会員登録
                </p>
            </nav>
            <hr>
            <?php require 'includes/userNameDisplay.php'; ?>
            <hr>
        </div>

        <!-- ログイン画面 -->
        <div class="login">
            <!-- タイトル -->
            <div class="screenTitle">
                <h1>会員登録</h1>
            </div>
            <div class="screenLattice">
                <form action="signUpDisplay.php" method="post" class="signUpForm">
                    <div class="formWrap">
                        <p class="formName">お名前<span class="red">(必須)</span></p>
                        <label>
                            <p class="textInput"><input type="text" name="name" placeholder="ドーナツ太郎"></p>
                            <!-- <入力値保持(別画面から戻ってきたときに残る)
                                value="< htmlspecialchars($_SESSION['signup']['name'] ?? '') ?>"> -->

                        </label>
                    </div>
                    <div class="formWrap">
                        <p class="formName">お名前（フリガナ）<span class="red">(必須)</span></p>
                        <label>
                            <p class="textInput"><input type="text" name="furigana" placeholder="ドーナツタロウ"></p>
                        </label>
                    </div>
                    <div class="formWrap">
                        <p class="formName">郵便番号<span class="red">(必須)</span></p>
                        <label>
                            <div class="row">
                            <p class="textInput codeA"><input type="text" name="postcodeA" placeholder="123"></p>
                            <p class="textInput codeB"><input type="text" name="postcodeB" placeholder="4567"></p>
                            </div> 
                        </label>
                    </div>
                    <div class="formWrap">
                        <p class="formName">住所<span class="red">(必須)</span></p>
                        <label>
                                <p class="textInput"><input type="text" name="address" placeholder="千葉県〇〇市中央1-1-1"></p>
                        </label>
                    </div>
                    <div class="formWrap">
                        <p class="formName">メールアドレス<span class="red">(必須)</span></p>
                        <label>
                            <p class="textInput"><input type="email" name="mail" placeholder="123＠exemple.com"></p>
                        </label>
                    </div>
                    <div class="formWrap">
                        <p class="formName">メールアドレス確認用<span class="red">(必須)</span></p>
                        <label>
                            <p class="textInput"><input type="email" name="mailCheck" placeholder="123456"></p>
                        </label>
                    </div>
                    <div class="formWrap">
                        <p class="formName">パスワード<span class="red">(必須)</span></p>
                        <p class="red small">半角英数字8文字以上20文字以内で入力してください。※記号の使用はできません</p>
                        <label>
                            <p class="textInput"><input type="password" name="password" placeholder="123456abcd"></p>
                        </label>
                    </div>
                    <div class="formWrap">
                        <p class="formName">パスワード確認用<span class="red">(必須)</span></p>
                        <label>
                            <p class="textInput"><input type="password" name="passCheck" placeholder="123456abcd"></p>
                        </label>
                    </div>
                    <p class="nextBtn"><input type="submit" value="入力確認する"></P>
                </form>
            </div>
        </div>
    </main>
    <?php require 'includes/footer.php'; ?> 
</body>