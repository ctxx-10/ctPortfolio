<?php session_start(); ?>

<?php
    // 入力チェック
    $errs = [];
    
    if (empty($_POST['name'])) {
        $errs['name'] = '名前を入力してください。';
    };
    if (empty($_POST['furigana'])) {
        $errs['furigana'] = 'フリガナをカタカナで入力してください。';
    };
    if (empty($_POST['postcodeA']) || empty($_POST['postcodeB'])) {
        $errs['postcode'] = '郵便番号を入力して下さい。';
    } else if (!preg_match('/^[0-9]{3}$/', $_POST['postcodeA'] ?? '') ||
                !preg_match('/^[0-9]{4}$/', $_POST['postcodeB'] ?? '')
    ) {
        $errs['postcode'] = '適切な郵便番号を入力してください。';
    };
    if (empty($_POST['address'])) {
        $errs['address'] = '住所を入力してください。';
    };
    if (empty($_POST['mail'])) {
        $errs['mail'] = 'メールアドレスを入力してください。';
    } else if ($_POST['mail'] !== $_POST['mailCheck']) {
        $errs['mailCheck'] = 'メールアドレスが一致しません。';
    };
    if (empty($_POST['password'])) {
        $errs['pass'] = 'パスワードを入力してください。';
    } else if (!preg_match('/^(?=.*[a-z])(?=.*[0-9])[a-zA-Z0-9]{8,20}$/', $_POST['password'] ?? '')) {
        $errs['pass'] = '適切なパスワードを入力してください。';
    } else if ($_POST['password'] !== $_POST['passCheck']) {
        $errs['passCheck'] = 'パスワードが一致しません。';
    };
    
    $_SESSION['errs'] = $errs;

    // 現在学習用としてpasswordは見えるようになっている。→ 暗号化の仕組みを追加
    if (empty($errs)) {
        $_SESSION['signUp'] = [
            'name' => $_POST['name'],
            'furigana' => $_POST['furigana'],
            'postcodeA' => $_POST['postcodeA'],
            'postcodeB' => $_POST['postcodeB'],
            'address' => $_POST['address'],
            'mail' => $_POST['mail'],
            'mailCheck' => $_POST['mailCheck'],
            'password' => $_POST['password'],
            'passCheck' => $_POST['passCheck']
        ];
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
    <title>C.C.Donuts | 入力確認</title>
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
                    ＞<a href="signUp.php" class="textLine">会員登録</a>
                    ＞入力確認
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
                <h1>入力確認</h1>
            </div>

            <form action="includes/signUpCheck.php" method="post" class="screenLattice">
                <div class="signUpForm">
                    
                    <div class="formWrap">
                        <p class="formName">お名前</p>
                        <p class="leftLine">
                            <?php
                                if (isset($errs['name'])) {
                                    echo '<span class="red">' . $errs['name'] . '</span>';
                                } else {
                                    echo htmlspecialchars($_POST['name'] ?? '', ENT_QUOTES, 'UTF-8');
                                    // ENT_QUOTES:「''」「""」や「<>」をそのまま表示可能
                                    // UTF-8：入力された内容に対しての文字コード指定。文字化け防止
                                }
                            ?>
                        </p>
                    </div>
                    <div class="formWrap">
                        <p class="formName">お名前（フリガナ）</p>
                        <p class="leftLine">
                            <?php
                                if (isset($errs['furigana'])) {
                                    echo '<span class="red">' . $errs['furigana'] . '</span>';
                                } else {
                                    echo htmlspecialchars($_POST['furigana'] ?? '', ENT_QUOTES, 'UTF-8');
                                }
                            ?>
                        </p>
                        <!-- <label>
                            <p class="textInput"><input type="text" name="furigana" placeholder="ドーナツタロウ"></p>
                        </label> -->
                    </div>
                    <div class="formWrap">
                        <p class="formName">郵便番号</p>
                        <p class="leftLine">
                            <?php
                                if (isset($errs['postcode'])) {
                                    echo '<span class="red">' . $errs['postcode'] . '</span>';
                                } else {
                                    echo htmlspecialchars(
                                        ($_POST['postcodeA'] ?? '') . ($_POST['postcodeB'] ?? ''), ENT_QUOTES, 'UTF-8'
                                    );
                                };
                            ?>
                        </p>
                    </div>
                    <div class="formWrap">
                        <p class="formName">住所</p>
                        <p class="leftLine">
                            <?php
                                if (isset($errs['address'])) {
                                    echo '<span class="red">' . $errs['address'] . '</span>';
                                } else {
                                    echo htmlspecialchars($_POST['address'] ?? '', ENT_QUOTES, 'UTF-8');
                                };
                            ?>
                        </p>                        
                        <!-- <label>
                                <p class="textInput"><input type="text" name="address" placeholder="千葉県〇〇市中央1-1-1"></p>
                        </label> -->
                    </div>
                    <div class="formWrap">
                        <p class="formName">メールアドレス</p>
                        <p class="leftLine">
                            <?php
                                if (isset($errs['mail'])) {
                                    echo '<span class="red">' . $errs['mail'] . '</span>';
                                } else {
                                    echo htmlspecialchars($_POST['mail'] ?? '', ENT_QUOTES, 'UTF-8');
                                };
                            ?>
                        </p>
                        <!-- <label>
                            <p class="textInput"><input type="text" name="login" placeholder="123＠gmail.com"></p>
                        </label> -->
                    </div>
                    <div class="formWrap">
                        <p class="formName">メールアドレス確認用</p>
                        <p class="leftLine">
                            <?php
                                if (isset($errs['mail'])) {
                                    echo '<span class="red">' . $errs['mail'] . '</span>';
                                } else if (isset($errs['mailCheck'])) {
                                    echo '<span class="red">' . $errs['mailCheck'] . '</span>';
                                } else {
                                    echo htmlspecialchars($_POST['mail'] ?? '', ENT_QUOTES, 'UTF-8');
                                };
                            ?>
                        </p>
                    </div>
                    <div class="formWrap">
                        <p class="formName">パスワード</p>
                        <p class="leftLine">
                            <?php
                                if (isset($errs['pass'])) {
                                    echo '<span class="red">' . $errs['pass'] . '</span>';
                                } else {
                                    echo htmlspecialchars($_POST['password'] ?? '', ENT_QUOTES, 'UTF-8');
                                };
                            ?>
                        </p>
                    </div>
                    <div class="formWrap">
                        <p class="formName">パスワード確認用</p>
                        <p class="leftLine">
                            <?php
                                if (isset($errs['pass'])) {
                                    echo '<span class="red">' . $errs['pass'] . '</span>';
                                } else if (isset($errs['passCheck'])) {
                                    echo '<span class="red">' . $errs['passCheck'] . '</span>';
                                } else {
                                    echo htmlspecialchars($_POST['password'] ?? '', ENT_QUOTES, 'UTF-8');
                                };
                            ?>
                        </p>
                    </div>
                    <p class="nextBtn">
                        <?php
                            if (empty($errs)) {
                                //エラーなし
                                    echo '<input type="submit" value="登録する">';
                                } else {
                                //エラーあり
                                    echo '<input type="submit" value="入力画面に戻る">';
                                };
                        ?>
                    </P>
                </form>
            </div>
        </div>
    </main>
    <?php require 'includes/footer.php'; ?> 
</body>