<?php session_start(); ?>

<?php
// 登録画面遷移の処理
    if (empty($_SESSION['errs'])) {
        header('Location: ../signUpComp.php');
        exit;
    } else {
        header('Location: ../signUp.php');
        exit;
    }
?>