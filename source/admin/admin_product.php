<?php
session_start();

// ログインしてない場合
if ($_SESSION['admin_login'] == false) {
    header('Location: ./admin_login.php');
}

require('../db_connect.php');
// 最大表示件数
define('max_view', 5);

$cnt_sql = 'SELECT COUNT(*) AS cnt FROM products';
$sql = 'SELECT products.product_id, product_name, product_price, product_image, product_description FROM products INNER JOIN product_images ON products.product_id = product_images.product_id LIMIT :start, :max;';

try {
    // ページ総数取得
    $cnt_stmt = $pdo->prepare($cnt_sql);
    $cnt_stmt->execute();
    $total = $cnt_stmt->fetchAll();
    $pages = ceil($total[0]['cnt'] / max_view);

    // 現在のページ取得
    if (!isset($_GET['page_id'])) {
        $now = 1;
    } else {
        $now = $_GET['page_id'];
    }

    // 商品取得
    $stmt = $pdo->prepare($sql);
    if ($now == 1) {
        $stmt->bindValue(':start', $now - 1);
        $stmt->bindValue(':max', max_view);
    } else {
        $stmt->bindValue(':start', ($now - 1) * max_view);
        $stmt->bindValue(':max', max_view);
    }
    $stmt->execute();
    $products = $stmt->fetchAll();
} catch (PDOException $e) {
    echo $e;
}
?>
<!DOCTYPE html>
<html lang="ja">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aquarium | 商品</title>

    <link rel="shortcut icon" href="images/favicon.ico">
    <link type="text/css" rel="stylesheet" href="../css/admin/admin_base.css">
    <link type="text/css" rel="stylesheet" href="../css/admin/admin_product.css">
</head>


<body>
    <div class="wrapper">
        <?php include_once('./admin_base.html'); ?>


        <!-- メインコンテンツ -->
        <div class="contents">
            <h2>商品</h2>
            <p><a href="admin_product_register.php">商品を登録する</a></p>
            <?php if (!empty($products)) {
                foreach ($products as $product) {
                    echo '<p>' . $product['product_name'] . '</p>';
                    echo '<p><img src=".' . $product['product_image'] . '" alt="' . $product['product_name'] . '"></p>';
                    echo '<p>' . $product['product_description'] . '</p>';
                    echo '<p>' . $product['product_price'] . '円</p>';
                    // echo '<p><a href="./admin_product_edit.php?p_id=' . $product['product_id'] . '">編集する</a></p>';
                }
            } ?>
            <!-- <p><a href="#">商品1</a></p>
            <p><a href="#">商品2</a></p>
            <p><a href="#">商品3</a></p>
            <p><a href="#">商品4</a></p>
            <p><a href="#">商品5</a></p>
            <p><a href="#">商品6</a></p>
            <p><a href="#">商品7</a></p> -->

            <!-- ページネーション -->
            <?php if (!empty($products)) {
                // 前ページへ
                if ($now != 1) {
                    $prev = $now - 1;
                    echo '<span><a href="./admin_product.php?page_id=' . $prev . '">＜前ページへ</a></span>';
                }

                for ($n = 1; $n <= $pages; $n++) {
                    if ($n == $now) {
                        // 現在ページ
                        echo "<span>$now</span>";
                    } else {
                        echo '<span><a href="./admin_product.php?page_id=' . $n . '">' . $n . '</a></span>';
                    }
                }

                // 次ページへ
                if ($now != $pages) {
                    $next = $now + 1;
                    echo '<span><a href="./admin_product.php?page_id=' . $next . '">次ページへ＞</a></span>';
                }
            } ?>
        </div>

    </div>
</body>

</html>