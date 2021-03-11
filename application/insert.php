<?php

//use phpDocumentor\Reflection\PseudoTypes\False_;
session_start();
require './db_connect.php';

// $path_to_thanks = 'http://localhost/PHP/HEW2020_2/HEW2020/source/sign_up_complete.php';
$path_to_thanks = './sign_up_complete.php';
$msg = "";
$flg;
$success_txt = "登録に成功しました";
$failed_txt = "登録に失敗しました";


// 同じメールアドレスが登録されていないかチェック
$check_sql = "SELECT * FROM users WHERE mail_address = :mail_address";
$check_stmt = $pdo->prepare($check_sql);
$check_stmt->bindValue(':mail_address', $_POST['mail_address']);
$check_stmt->execute();
$member = $check_stmt->fetch();
if ($member['mail_address'] === $_POST['mail_address']) {
    header('Location: ./sign_up.php?msg=・このアドレスは登録済みです。別のアドレスで登録してください。');
    exit;
}

// 登録処理
if (isset($_POST)) {

    // INSERT文準備
    $stmt = $pdo->prepare("INSERT INTO users VALUES(
        :user_id,:mail_address,:user_name,:password,:last_name,:first_name,:postal_code,:address,:birthday,:phone_number,:question,:answer,:user_created_at,:user_deleted_at
        )");

    $null_value = null;
    // 登録日を取得
    date_default_timezone_set('Asia/Tokyo');
    $create_date = date("Y-m-d");
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);


    // 上の変数にそれぞれ値をセット
    $stmt->bindParam(':user_id', $null_value);
    $stmt->bindParam(':mail_address', $_POST['mail_address']);
    $stmt->bindParam(':user_name', $_POST['user_name']);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':last_name', $_POST['last_name']);
    $stmt->bindParam(':first_name', $_POST['first_name']);
    $stmt->bindParam(':postal_code', $_POST['postal_code']);
    $stmt->bindParam(':address', $_POST['address']);
    $stmt->bindParam(':birthday', $_POST['birthday']);
    $stmt->bindParam(':phone_number', $_POST['phone_number']);
    $stmt->bindParam(':question', $_POST['question']);
    $stmt->bindParam(':answer', $_POST['answer']);
    $stmt->bindParam(':user_created_at', $create_date);
    $stmt->bindParam(':user_deleted_at', $null_value);
    // 実行
    $check = $stmt->execute();

    // 登録できたかチェック
    if ($check) {
        // 登録成功
        $msg = urlencode($success_txt);
        $flg = true;
        $sql = "SELECT * FROM users WHERE mail_address = :mail_address";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':mail_address', $_POST['mail_address']);
        $stmt->execute();
        $user_id = $stmt->fetch();
        $_SESSION['user_id'] = $user_id['user_id'];
        $_SESSION['user_name'] = $_POST['user_name'];
    } else {
        // 登録失敗
        $msg = urlencode($failed_txt);
        $flg = false;
    }
    header('Location:' . $path_to_thanks . '?msg=' . $msg . '&flg=' .  $flg);
}
