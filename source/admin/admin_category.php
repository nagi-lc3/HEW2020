<?php
session_start();

// ログインしてない場合
if ($_SESSION['admin_login'] == false) {
    header('Location: ./admin_login.php');
}

require('../db_connect.php');

$sql = 'SELECT category_name FROM categories';
try {
    $stmt = $pdo->query($sql);
    $categories = $stmt->fetchAll();
} catch (PDOException $e) {
    echo $e;
}

?>
<!DOCTYPE html>
<html lang="ja">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aquarium | カテゴリ</title>

    <link rel="shortcut icon" href="images/favicon.ico">
    <link type="text/css" rel="stylesheet" href="../css/admin/admin_base.css">
    <link type="text/css" rel="stylesheet" href="../css/admin/admin_category.css">
</head>


<body>
    <div class="wrapper">
        <?php include_once('./admin_base.html'); ?>


        <!-- メインコンテンツ -->
        <div class="contents">
            <h2>カテゴリ</h2>
            <p><a href="admin_category_register.php">カテゴリを登録する</a></p>
            <?php if (!empty($categories)) {
                foreach ($categories as $category) {
                    echo '<p>' . $category['category_name'] . '</p>';
                }
            } ?>
            <!-- <p><a href="#">カテゴリ1</a></p>
            <p><a href="#">カテゴリ2</a></p>
            <p><a href="#">カテゴリ3</a></p>
            <p><a href="#">カテゴリ4</a></p>
            <p><a href="#">カテゴリ5</a></p>
            <p><a href="#">カテゴリ6</a></p>
            <p><a href="#">カテゴリ7</a></p> -->
        </div>

    </div>
</body>

</html>