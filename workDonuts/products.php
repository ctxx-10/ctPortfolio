<?php session_start(); ?>
<?php
    $pdo = new PDO('mysql:host=localhost;dbname=ccdonuts;charset=utf8',
                    'ccStaff', 'ccDonuts');
    if (isset($_REQUEST['keyword'])) {
        $sql = $pdo->prepare('select * from products where name like ?');
        $sql->execute(['%'.$_REQUEST['keyword'].'%']);
    } else {
        $sql = $pdo->query('select * from products');
    }
    // foreach($sql as $row) {
    //     $donutsID = $row['id'];
    // }
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
    <title>C.C.Donuts | 商品一覧</title>
</head>

<body>
    <?php require 'includes/header.php'; ?>

    <main>
        <div class="navName">
            <!-- パンくずナビ 後にリンク作成・機能させる -->
            <nav class="space">
                <p><a href="index.php" class="textLine">TOP</a>＞商品一覧</p>
            </nav>
            <hr>
            <!-- ユーザー名表示 -->
            <?php require 'includes/userNameDisplay.php'; ?>
            <hr>
        </div>
        

        <div class="products">
            <!-- タイトル -->
            <div class="screenTitle">
                <h1>商品一覧</h1>
            </div>
            
            <!-- メインメニュー -->
            <div class="productsMenu">
                <div class="mainMenu">
                    <h2>メインメニュー</h2>
                    <!--gridが楽そう-->
                    <div class="gridContainer">
                        <div class="gridWrap">
                            <a href="detail.php?id=1">
                                <img src="images/ccorigin.png" alt="CCドーナツ 当店オリジナル（5個入り）">
                                <p class="spaceBottom">CCドーナツ 当店オリジナル（5個入り）</p>
                            </a>
                            <p class="price spaceBottom">税込み ￥1,500</p>
                            <p class="cartBtn"><button>カートに入れる</button></p>
                        </div>
                        <div class="gridWrap">
                            <a href="detail.php?id=2">
                                <img src="images/chocoDonuts.png" alt="チョコレートデライト（5個入り）">
                                <p class="spaceBottom">チョコレートデライト（5個入り）</p>
                            </a>
                            <p class="price spaceBottom">税込み ￥1,600</p>
                            <p class="cartBtn"><button>カートに入れる</button></p>
                        </div>
                        <div class="gridWrap">
                            <a href="detail.php?id=3">
                                <img src="images/charamelCream.png" alt="キャラメルクリーム（5個入り）">
                                <p class="spaceBottom">キャラメルクリーム（5個入り）</p>
                            </a>
                            <p class="price spaceBottom">税込み ￥1,600</p>
                            <p class="cartBtn"><button>カートに入れる</button></p>
                        </div>
                        <div class="gridWrap">
                            <a href="detail.php?id=4">
                                <img src="images/planeDonuts.png" alt="プレーンクラシック（5個入り）">
                                <p class="spaceBottom">プレーンクラシック（5個入り）</p>
                            </a>
                            <p class="price spaceBottom">税込み ￥1,500</p>
                            <p class="cartBtn"><button>カートに入れる</button></p>
                        </div>
                        <div class="gridWrap">
                            <a href="detail.php?id=5">
                                <img src="images/summerDonuts.png" alt="【新作】サマーシトラス（5個入り）">
                                <p class="spaceBottom">【新作】サマーシトラス（5個入り）</p>
                            </a>
                            <p class="price spaceBottom">税込み ￥1,600</p>
                            <p class="cartBtn"><button>カートに入れる</button></p>
                        </div>
                        <div class="gridWrap">
                            <a href="detail.php?id=6">
                                <img src="images/stroberryDonuts.png" alt="ストロベリークラッシュ（5個入り）">
                                <p class="spaceBottom">ストロベリークラッシュ（5個入り）</p>
                            </a>
                            <p class="price spaceBottom">税込み ￥1,800</p>
                            <p class="cartBtn"><button>カートに入れる</button></p>
                        </div>
                    </div>
                </div>


                <!-- バラエティセット -->
                <div class="varietySet">
                    <h2>バラエティセット</h2>
                    <div class="gridContainer">
                        <div class="gridWrap">
                            <a href="detail.php?id=7">
                                <img src="images/fruits12Box.png" alt="フルーツドーナツセット（12個入り）">
                                <p class="spaceBottom">フルーツドーナツセット（12個入り）</p>
                            </a>
                            <p class="price spaceBottom">税込み ￥3,500</p>
                            <p class="cartBtn"><button>カートに入れる</button></p>
                        </div>
                        <div class="gridWrap">
                            <a href="detail.php?id=8">
                                <img src="images/fruits14Box.png" alt="フルーツドーナツセット（14個入り）">
                                <p class="spaceBottom">フルーツドーナツセット（14個入り）</p>
                            </a>
                            <p class="price spaceBottom">税込み ￥4,000</p>
                            <p class="cartBtn"><button>カートに入れる</button></p>
                        </div>
                        <div class="gridWrap">
                            <a href="detail.php?id=9">
                                <img src="images/bestBox.png" alt="ベストセレクションボックス（4個入り）">
                                <p class="spaceBottom">ベストセレクションボックス（4個入り）</p>
                            </a>
                            <p class="price spaceBottom">税込み ￥1,200</p>
                            <p class="cartBtn"><button>カートに入れる</button></p>
                        </div>
                        <div class="gridWrap">
                            <a href="detail.php?id=10">
                                <img src="images/chococrushBox.png" alt="クラッシュボックス（7個入り）">
                                <p class="spaceBottom">クラッシュボックス（7個入り）</p>
                            </a>
                            <p class="price spaceBottom">税込み ￥2,400</p>
                            <p class="cartBtn"><button>カートに入れる</button></p>
                        </div>
                        <div class="gridWrap">
                            <a href="detail.php?id=11">
                                <img src="images/cream4Box.png" alt="クリームボックス（4個入り）">
                                <p class="spaceBottom">クリームボックス（4個入り）</p>
                            </a>
                            <p class="price spaceBottom">税込み ￥1,400</p>
                            <p class="cartBtn"><button>カートに入れる</button></p>
                        </div>
                        <div class="gridWrap">
                            <a href="detail.php?id=12">
                                <img src="images/cream9Box.png" alt="クリームボックス（9個入り）">
                                <p class="spaceBottom">クリームボックス（9個入り）</p>
                            </a>
                            <p class="price spaceBottom">税込み ￥2,800</p>
                            <p class="cartBtn"><button>カートに入れる</button></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <?php require 'includes/footer.php'; ?> 
</body>