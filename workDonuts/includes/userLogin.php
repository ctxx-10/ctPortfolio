<?php session_start(); ?>
<?php
    // ログイン確認処理
    unset($_SESSION['customers']);
    $pdo = new PDO('mysql:host=localhost;dbname=ccdonuts;charset=utf8',
                    'ccStaff', 'ccDonuts');
    $sql = $pdo -> prepare('select * from customers where mail=? and password=?');
    $sql -> execute([$_POST['mail'], $_POST['password']]);
    foreach ($sql as $row) {
        $_SESSION['customers'] = [
            'id' => $row['id'],
            'name' => $row['name'],
            'furigana' => $row['furigana'],
            'postcode_a' => $row['postcode_a'],
            'postcode_b' => $row['postcode_b'],
            'address' => $row['address'],
            'mail' => $row['mail'],
            'password' => $row['password']
        ];
    };
    // if (isset($_SESSION['customers'])) {
    //     header('Location: ../loginOutput.php');
    //     exit;
    // } else {
    //     header('Location: ../loginOutput.php');
    //     exit;
    // };
        header('Location: ../loginOutput.php');
        exit;
?>