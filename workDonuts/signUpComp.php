<?php session_start(); ?>

<?php
    // 登録画面を通過した人のみ通る
    if (!isset($_SESSION['signUp'])) {
        header('Location: signUp.php');
        exit;
    }

    unset($_SESSION['customers']);
    $pdo = new PDO('mysql:host=localhost;dbname=ccdonuts;charset=utf8',
                    'ccStaff', 'ccDonuts');

    $sql = $pdo->prepare('
        INSERT INTO customers
        (name, furigana, postcode_a, postcode_b, address, mail, password)
        VALUES (?, ?, ?, ?, ?, ?, ?)
    ');

    $sql->execute([
        $_SESSION['signUp']['name'],
        $_SESSION['signUp']['furigana'],
        $_SESSION['signUp']['postcodeA'],
        $_SESSION['signUp']['postcodeB'],
        $_SESSION['signUp']['address'],
        $_SESSION['signUp']['mail'],
        $_SESSION['signUp']['password']
        // password_hash($_SESSION['signUp']['password'], PASSWORD_DEFAULT)
        // ↑適当な文字列に変更して暗号化してる
        // ログイン時は「password_verify($_POST['password'], $row['password'])」で照合
    ]);

    // 二重登録防止
    unset($_SESSION['signUp']);
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
    <title>C.C.Donuts | 登録完了</title>
</head>

<body>
    <?php require 'includes/header.php'; ?>

    <main>
        <div class="navName">
            <!-- パンくずナビ 後にリンク作成・機能させる -->
            <nav class="space">
                <p>TOP＞ログイン＞会員登録＞入力確認＞登録完了
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
            <div class="screenTitle">
                <h1>
                    <?php
                        if (isset($_SESSION['customers'])) {
                            echo '登録完了';
                        } else {
                            echo '';
                        };
                    ?>
                </h1>
            </div>
            <div class="screenLattice">
                <div class="loginForm">
                    <p class="center">登録が完了しました。<br>引き続きお楽しみください。</p>
                </div>
                <p class="register">
                    <a href="index.php">TOPページへもどる</a>
                </p>
            </div>
        </div>
    </main>
    <?php require 'includes/footer.php'; ?> 
</body>