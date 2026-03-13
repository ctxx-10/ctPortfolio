<?php
    // ゲストorユーザー名表示
    if (isset($_SESSION['customers'])) {
        $logInOut = 'logoutInput.php';
        $logText = 'ログアウト';
    } else {
        $logInOut = 'loginInput.php';
        $logText = 'ログイン';
    };
?>
<header>
    <div class="header">
        <div class="headLogoIcon">
            <?php require 'menu.php'; ?>
            
            <p class="headLogo">
                <a href="index.php"><img src="images/mainLogo.png"></a>
            </p>
            <div class="headIcon">
                <a href="<?= $logInOut ?>" class="iconImg">
                    <img src="images/loginIcon.png" alt="ログイン用のアイコン">
                    <p><?= $logText ?></p>
                </a>
                <a href="cart.php" class="iconImg">
                    <img src="images/cartIcon.png" alt="カートのアイコン">
                    <p>カート</p>
                </a>
            </div>
        </div>
        <div class="seach">
            <form action="seach-output.php" method="post" class="seachBox">
                <!-- いったんボタンは反応させない。PHP実装後余裕があれば作る -->
                <button type="button" class="seachIcon"><img src="images/seachIcon.png" alt="検索アイコン"></button>
                <input type="text" name="keyword">
            </form>
        </div>
    </div>
</header>