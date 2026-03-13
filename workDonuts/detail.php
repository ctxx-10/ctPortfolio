<?php session_start(); ?>
<?php
    $pdo = new PDO('mysql:host=localhost;dbname=ccdonuts;charset=utf8',
                    'ccStaff', 'ccDonuts');
    // if (!isset($_REQUEST['id'])) {
    //     $noProduct =  '商品が指定されていません。';
    // }
    $sql = $pdo->prepare('select * from products where id=?');
    $sql->execute([$_REQUEST['id']]);

    // 1件だけ取得
    $row = $sql->fetch();

    $donutsID = $row['id'];
    $donutsName = $row['name'];
    $price = $row['price'];
    $donutsDetail = $row['introduction'];

    $productImg = [
        1 => 'ccorigin', 2 => 'chocoDonuts',  3 => 'charamelCream', 4 => 'planeDonuts', 5 => 'summerDonuts', 6 => 'stroberryDonuts',
        7 => 'fruits12Box', 8 => 'fruits14Box',  9 => 'bestBox', 10 => 'chococrushBox', 11 => 'cream4Box', 12 => 'cream9Box'
    ];
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
    <title>C.C.Donuts | 商品詳細</title>
</head>

<body>
    <?php require 'includes/header.php'; ?>

    <main>
        <div class="navName">
            <!-- パンくずナビ 後にリンク作成・機能させる -->
            <nav class="space">
                <p>
                    <a href="index.php" class="textLine">TOP</a>
                    ＞<a href="products.php" class="textLine">商品一覧</a>
                    ＞<?= $donutsName ?>
                </p>
            </nav>
            <hr>
            <!-- ユーザー名表示 -->
            <?php require 'includes/userNameDisplay.php'; ?>
            <hr>
        </div>

        <!-- 詳細 -->
        <form action="cart.php" method="post" class="productsDetail">
            <div class="productImg">
                <img src="images/<?= $productImg[$donutsID] ?>.png">
            </div>
            <div class="detail">
                <p class="productName"><?= $donutsName ?></p>
                <hr>
                <p class="description"><?= $donutsDetail ?></p>
                <hr>
                <p class="price">税込み ￥<?= $price ?></p>
                <div class="productCount">
                    <input type="number" name="count" value="1" min="1" class="count">個
                    <input type="hidden" name="id" value="<?= $donutsID ?>">
                    <button>カートに入れる</button>
                    <a href="#.php?id=<?= $donutsID ?>" class="favorite"><img src="images/favoriteBtn.png"></a>
                </div>
            </div>
        </form>
    </main>
    
    <?php require 'includes/footer.php'; ?> 
</body>