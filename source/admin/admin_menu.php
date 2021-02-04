<?php
session_start();

// ログインしてない場合
if ($_SESSION['admin_login'] == false) {
    header('Location: ./admin_login.php');
}
?>
<!DOCTYPE html>
<html lang="ja">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aquarium | 管理者メニュー</title>

    <link rel="shortcut icon" href="images/favicon.ico">
    <link type="text/css" rel="stylesheet" href="../css/admin/admin_base.css">
    <link type="text/css" rel="stylesheet" href="../css/admin/admin_menu.css">
</head>


<body>
    <div class="wrapper">
        <?php include_once('./admin_base.html'); ?>


        <!-- メインコンテンツ -->
        <div class="contents">
            <h2>管理者メニュー</h2>
            <p><a href="admin_product.php">商品</a></p>
            <p><a href="admin_category.php">カテゴリ</a></p>
        </div>

    </div>
</body>

</html>