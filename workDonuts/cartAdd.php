<?php session_start(); ?>

<?php
    // POSTで送られてきた商品IDと数量を取得
    $id = $_POST['id'] ?? null;
    $count = (int)($_POST['count'] ?? 1);

    // 不正アクセス防止
    if (!$id || $count <= 0) {
        header('Location: index.php');
        exit;
    }

    // DB接続
    $pdo = new PDO(
        'mysql:host=localhost;dbname=ccdonuts;charset=utf8',
        'ccStaff',
        'ccDonuts'
    );

    // 商品情報取得
    $sql = $pdo->prepare('SELECT * FROM products WHERE id=?');
    $sql->execute([$id]);
    $product = $sql->fetch();

    if (!$product) {
        header('Location: index.php');
        exit;
    }

    // セッション初期化
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    // 既存商品チェック
    $found = false;

    foreach ($_SESSION['cart'] as &$cart) {
        if ($cart['id'] == $id) {
            $cart['count'] += $count;
            $found = true;
            break;
        }
    }
    unset($cart);

    // なければ追加
    if (!$found) {
        $_SESSION['cart'][] = [
            'id'    => $product['id'],
            'name'  => $product['name'],
            'price' => $product['price'],
            'count' => $count
        ];
    }

    // カートページへ移動
    header('Location: cart.php');
    exit;
?>