<?php session_start(); ?>

<?php

    // 「再計算」ボタンが押されたかどうかを確認
    if (isset($_POST['reCalc'])) {

        // フォームから送られてきた商品IDを受け取る
        $id = $_POST['id'];

        // フォームから送られてきた数量を受け取り、整数に変換
        $count = max(1, (int)$_POST['count']);

        // セッションに保存されているカートの中身を1つずつ確認
        // & を付けることで、配列の中身を直接書き換えられる
        foreach ($_SESSION['cart'] as &$cart) {

            // カート内の商品IDと、再計算対象の商品IDが一致するか確認
            if ($cart['id'] == $id) {

                // 数量を「足す」のではなく「上書き」する
                // → 再計算ボタン用の処理
                $cart['count'] = $count;

                // 対象の商品は見つかったのでループを終了
                break;
            }
        }

        // 参照（&）を解除しないと後の処理に影響するため必ず書く
        unset($cart);
    } else if (!empty($_POST['id']) && !empty($_POST['count'])) {
        // 商品idと個数が空じゃない場合
        //詳細画面から送られてきたid・個数を受け取る
        $id    = $_POST['id'];
        $count = (int)$_POST['count'];  //整数に変換
        
        $productImg = [
            1 => 'ccorigin', 2 => 'chocoDonuts',  3 => 'charamelCream', 4 => 'planeDonuts', 5 => 'summerDonuts', 6 => 'stroberryDonuts',
            7 => 'fruits12Box', 8 => 'fruits14Box',  9 => 'bestBox', 10 => 'chococrushBox', 11 => 'cream4Box', 12 => 'cream9Box'
        ];

        $pdo = new PDO('mysql:host=localhost;dbname=ccdonuts;charset=utf8',
                        'ccStaff', 'ccDonuts');
        $sql = $pdo->prepare('select * from products where id=?');
        //詳細画面から送られてきたidを受け取る
        $sql->execute([$id]);

        //必要なデータを入れる箱がない場合に作る
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }
        //idを元にデータベースから取り出す
        foreach ($sql as $row) {
            $productName  = $row['name'];
            $productPrice = $row['price'];
        }

        // 同じ商品がすでにカートに入っているかどうかの判定用フラグ
        $found = false;

        // カートの中身を1つずつ確認する
        // & を付けているのは「中身を書き換えるため」
        foreach ($_SESSION['cart'] as &$cart) {

            // カート内の商品IDと、今回追加しようとしている商品IDが同じか確認
            if ($cart['id'] == $id) {
                // 同じ商品があった場合は、数量を足す
                $cart['count'] += $count;
                // 見つかったので true にする
                $found = true;
                // もう他を見る必要がないのでループを抜ける
                break;
            }
        }
        unset($cart);
        // ループが終わっても見つからなかった場合
        if (!$found) {

            // 新しい商品としてカートに追加する
            $_SESSION['cart'][] = [
                'id'    => $id,           // 商品ID
                'name'  => $productName,  // 商品名
                'price' => $productPrice,// 価格
                'count' => $count,       // 数量
                'img'   => $productImg[$id]
            ];
        };
    };

    // 商品点数
    $totalCount = 0;
    // 小計
    $subTotal = 0;

    if (!empty($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $cart) {
            $totalCount += $cart['count'];
            $subTotal += $cart['price'] * $cart['count'];
        }
    }
    
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
    <title>C.C.Donuts | カート</title>
</head>

<body>
    <?php require 'includes/header.php'; ?>

    <main>
        <div class="navName">
            <!-- パンくずナビ 後にリンク作成・機能させる -->
            <nav class="space">
                <p><a href="index.php" class="textLine">TOP</a>＞カート</p>
            </nav>
            <hr>
            <!-- ユーザー名表示 -->
            <?php require 'includes/userNameDisplay.php'; ?>
            <hr>
        </div>

        <!-- カート -->
        <div class="cartPage">
            <?php if (empty($_SESSION['cart'])): ?>
                <p class="emptyCart">カートに商品がありません。</p>
                <p class="continue">
                    <a href="products.php">買い物を続ける</a>
                </p>
            <?php else: ?>
                <div class="total">
                    <p class="totalSize">現在　商品<?= $totalCount ?>点</p>
                    <p class="totalSize">ご注文小計：税込み<span class="subtotal">￥<?= $subTotal ?></span></p>
                    <p class="cartCheck"><button>購入確認へ進む</button></p>
                </div>
            
                <?php foreach ($_SESSION['cart'] as $cart): ?>
                    <form action="cart.php" method="post">
                        <div class="cartProduct">
                            <div class="productImg">
                                <?= '<img src="images/', $cart['img'], '.png">' ?>
                            </div>
                            <div class="cartDetailWrap">
                                <p class="productName">
                                    <?= $cart['name'] ?><hr class="horizon">
                                </p>
                                <div class="cartDetail">
                                    <p class="price">税込み ￥ <?= $cart['price'] ?></p>
                                    <div class="cartCount">
                                        <input type="hidden" name="id" value="<?= $cart['id'] ?>">
                                        <p class="quantity">数量<input type="number" name="count" value="<?= $cart['count'] ?>" min="1" class="count">個</p>
                                        <p class="calculate"><button type="submit" name="reCalc">再計算</button></p>
                                        <p class="delete"><a href="delete.php?id=<?= $cart['id'] ?>">削除する</a></p>
                                    </div>
                                </div>
                                <hr class="horizon">
                            </div>
                        </div>
                    </form>
                <?php endforeach; ?>

                <div class="total">
                    <p class="totalSize">現在　商品<?= $totalCount ?>点</p>
                    <p class="totalSize">ご注文小計：税込み<span class="subtotal">￥<?= $subTotal ?></span></p>
                    <p class="cartCheck"><button>購入確認へ進む</button></p>
                </div>

                <p class="continue">
                    <a href="products.php">買い物を続ける</a>
                </p>
            <?php endif; ?>
        </div>
    </main>
    
    <?php require 'includes/footer.php'; ?> 
</body>