<?php
session_start();

$admin_user = "admin1";
$admin_password = "password1";
// $admin_id = '';
// $admin_pass = '';
$msg = [];
$path_to_menu = "./admin_menu.php";

function h($value)
{
    return htmlspecialchars($value, ENT_QUOTES, 'utf-8');
}

if (!empty($_POST)) {
    $admin_id = h($_POST['id']);
    $admin_pass = h($_POST['pass']);

    // IDが違う
    if (($admin_id != $admin_user)) {
        $msg[] = 'IDが間違っています';
    }

    // パスワードが違う
    if ($admin_pass != $admin_password) {
        $msg[] = 'パスワードが間違っています';
    }

    // IDとパスワードが正しい場合
    if (empty($msg)) {
        $_SESSION['admin_login'] = true;
        header("Location: " . $path_to_menu);
        exit;
    } else {
        $msg[] = 'やり直してください';
    }
}
?>
<!DOCTYPE html>
<html lang="ja">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aquarium | 管理者ログイン</title>

    <link rel="shortcut icon" href="images/favicon.ico">
    <link type="text/css" rel="stylesheet" href="../css/admin/admin_login.css">
</head>


<body>
    <div class="wrapper">

        <!-- メインコンテンツ -->
        <div class="contents">
            <h2>管理者ログイン</h2>
            <?php if (!empty($msg)) {
                foreach ($msg as $message) {
                    echo '<p>・' . $message . '</p>';
                }
            } ?>
            <!-- <h2>ログイン</h2> -->
            <!-- <form action="admin_menu.php" method="post"> -->
            <form action="./admin_login.php" method="post">
                <p>ユーザ名<input type="text" name="id" value=""></p>
                <p>パスワード<input type="text" name="pass" value=""></p>
                <input type="submit" name="login" value="ログイン">
            </form>
        </div>

    </div>
</body>

</html>