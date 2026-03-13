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
    <title>C.C.Donuts</title>
</head>

<body>
    <?php require 'includes/header.php'; ?>

    <main>
        <?php require 'includes/userNameDisplay.php'; ?>

        <!-- トプ画 -->
        <div class="topImg">
            <img src="images/top.png">
        </div>


        <!-- 新商品・商品一覧へのバナー -->
        <div class="infoBanner">
            <div class="infoBannerContainer">
                <div class="info">
                    <a href="detail.php?id=5">
                        <div class="newProduct">
                                <!-- 「新商品」文字の画像 -->
                                <span></span>
                                <p>サマーシトラス</p>
                        </div>
                    </a>
                    <div class="catchphrase">
                        <p>ドーナツのある生活</p>
                    </div>
                </div>
                
                <div class="banner">
                    <a href="products.php" class="bannerBtn">
                        <!-- <span></span> <-- <img src="images/listBanner.png" alt=""> --
                        -->
                        <p>商品一覧</p> <!-- class="文字：Noto Serif JP"-->
                    </a>
                </div>
            </div>
        </div>

        <!-- ポリシー -->
        <div class="Philosophy">
            <div>
                <h1>
                    Philosophy<br>
                    <span class="transJPh1">私たちの信念</span>
                </h1>
                <h2>
                    "Creating Connections"<br>
                    <span class="transJPh2">「ドーナツでつながる」</span>
                </h2>
            </div>
        </div>

        <!-- ランキング -->
        <div class="ranking">
            <div class="rankContainer">
                <h3>人気ランキング</h3>
                <hr class="rankHr">
                
                <form action="cart.php" method="post">
                    <div class="gridContainer">
                        <div class="gridWrap">
                            <a href="detail.php?id=1">
                                <p class="rankNumber number1 spaceBottom">1</p>
                                <img src="images/ccorigin.png" alt="CCドーナツ 当店オリジナル（5個入り）">
                                <p class="spaceBottom">CCドーナツ 当店オリジナル（5個入り）</p>
                            </a>
                                <p class="price spaceBottom">税込み ￥1,500</p>
                                <p class="cartBtn"><button>カートに入れる</button></p>
                            
                        
                        <!-- <form action="cart.php" method="post"> ここをいれる
                                <input type="hidden" name="id" value="1">
                                <input type="hidden" name="count" value="1">
                                <p class="cartBtn">
                                    <button type="submit">カートに入れる</button>
                                </p>
                            </form> -->



                        </div>
                        <div class="gridWrap">
                            <a href="detail.php?id=7">
                                <p class="rankNumber number2 spaceBottom">2</p>
                                <img src="images/fruits12Box.png" alt="フルーツドーナツセット（12個入り）">
                                <p class="spaceBottom">フルーツドーナツセット（12個入り）</p>
                            </a>
                                <p class="price spaceBottom">税込み ￥3,500</p>
                                <p class="cartBtn"><button>カートに入れる</button></p>
                            
                        </div>
                        <div class="gridWrap">
                            <a href="detail.php?id=8">
                                <p class="rankNumber number3 spaceBottom">3</p>
                                <img src="images/fruits14Box.png" alt="フルーツドーナツセット（14個入り）">
                                <p class="spaceBottom">フルーツドーナツセット（14個入り）</p>
                            </a>
                                <p class="price spaceBottom">税込み ￥4,000</p>
                                <p class="cartBtn"><button>カートに入れる</button></p>
                            
                        </div>
                        <div class="gridWrap">
                            <a href="detail.php?id=2">
                                <p class="rankNumber number456 spaceBottom">4</p>
                                <img src="images/chocoDonuts.png" alt="チョコレートデライト（5個入り）">
                                <p class="spaceBottom">チョコレートデライト（5個入り）</p>
                            </a>
                                <p class="price spaceBottom">税込み ￥1,600</p>
                                <p class="cartBtn"><button>カートに入れる</button></p>
                            
                        </div>
                        <div class="gridWrap">
                            <a href="detail.php?id=9">
                                <p class="rankNumber number456 spaceBottom">5</p>
                                <img src="images/bestBox.png" alt="ベストセレクションボックス（4個入り）">
                                <p class="spaceBottom">ベストセレクションボックス（4個入り）</p>
                            </a>
                                <p class="price spaceBottom">税込み ￥1,200</p>
                                <p class="cartBtn"><button>カートに入れる</button></p>
                            
                        </div>
                        <div class="gridWrap">
                            <a href="detail.php?id=6">
                                <p class="rankNumber number456 spaceBottom">6</p>
                                <img src="images/stroberryDonuts.png" alt="ストロベリークラッシュ（5個入り）">
                                <p class="spaceBottom">ストロベリークラッシュ（5個入り）</p>
                            </a>
                                <p class="price spaceBottom">税込み ￥1,800</p>
                                <p class="cartBtn"><button>カートに入れる</button></p>
                            
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>

<?php require 'includes/footer.php'; ?> 
</body>
</html>
