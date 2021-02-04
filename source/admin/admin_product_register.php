<?php
session_start();

// ログインしてない場合
if ($_SESSION['admin_login'] == false) {
    header('Location: ./admin_login.php');
}

// 送信済みステータス破棄
if (!empty($_SESSION['registered'])) {
    unset($_SESSION["registered"]);
}

// カテゴリ取り出し
require('../db_connect.php');

$sql = 'SELECT category_name, category_id FROM categories;';
try {
    $stmt = $pdo->query($sql);
    $categories = $stmt->fetchAll();
} catch (PDOException $e) {
    echo $e;
}

$p_id_sql = "SELECT product_id FROM products ORDER BY product_created_at DESC LIMIT 1";
try {
    $p_id_stmt = $pdo->query($p_id_sql);
    $p_id = $p_id_stmt->fetchAll();
} catch (PDOException $e) {
    echo $e;
}
echo '<pre>';
// var_dump($p_id[0]['product_id']);
// var_dump($_GET['msg']);
echo '</pre>';

// エラーメッセージ取り出し
if (!empty($_GET['msg'])) {
    $err_msgs = explode(",", $_GET['msg']);
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
    <link type="text/css" rel="stylesheet" href="../css/admin/admin_product_register.css">
</head>


<body>
    <div class="wrapper">
        <?php include_once('./admin_base.html'); ?>


        <!-- メインコンテンツ -->
        <div class="contents">
            <h2>商品登録</h2>
            <!-- エラーメッセージがあれば表示 -->
            <?php if (!empty($err_msgs)) {
                foreach ($err_msgs as $msg) {
                    echo '<p>・' . $msg . '</p>';
                }
            }
            ?>
            <form action="./register.php?flg=0" method="post">
                <p>商品名</p>
                <input type="text" name="product_name"><br>
                <p>商品画像</p>
                <input id="image" type="file" accept="image/*" name="product_image"><br>
                <img id="preview"><br>
                <p>カテゴリ</p>
                <select name="category_id">
                    <?php if (!empty($categories)) {
                        foreach ($categories as $category) {
                            echo '<option value="' . $category['category_id'] . '">' . $category['category_name'] . '</option><br>';
                        }
                    }
                    ?>
                </select>
                <p>値段</p>
                <input type="number" name="product_price">円<br>
                <p>商品詳細</p>
                <input type="text" name="product_description"><br>

                <input type="submit" name="register" value="登録">
            </form>
        </div>

    </div>

    <script src="../js/jquery-3.5.1.slim.min.js"></script>
    <script>
        // 画像プレビュー用
        $('#image').on('change', function() {
            var $fr = new FileReader();
            $fr.onload = function() {
                $('#preview').attr('src', $fr.result);
            }
            $fr.readAsDataURL(this.files[0]);
        });
    </script>
</body>

</html>