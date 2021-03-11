<?php
session_start();

// ログインしてない場合
if ($_SESSION['admin_login'] == false) {
    header('Location: ./admin_login.php');
}

function h($value)
{
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}
$err_msg = [];
$msg = "";
$flg = h($_GET['flg']);
$null_value = null;

if (empty($_SESSION['registered'])) {

    // products
    if (isset($_POST)) {

        require_once('../db_connect.php');
        if ($flg == 0) {
            // 値受け取り
            $category_id = h($_POST['category_id']);
            $product_name = h($_POST['product_name']);
            $product_price = h($_POST['product_price']);
            $product_description = h($_POST['product_description']);
            $img = h($_POST['product_image']);


            // バリデーション
            //product_name
            if (empty($product_name) || mb_strlen($product_name) >= 50) {
                $err_msg[] = "商品名は50文字以内で入力してください" . "\n";
            }

            // product_image
            if (empty($img)) {
                $err_msg[] = "画像を選択してください" . "\n";
            } else {
                $img_path = './images/' . $img;
            }

            //product_price
            if (empty($product_price) || $product_price < 0) {
                $err_msg[] = "値段は0円以上で入力してください" . "\n";
            }

            // product_description
            if (empty($product_description) || mb_strlen($product_description) >= 500) {
                $err_msg[] = "商品詳細は500文字以内で入力してください" . "\n";
            }

            // エラーがある場合
            if (!empty($err_msg)) {
                $path_to_register = './admin_product_register.php?msg=';
                $prams = '';
                foreach ($err_msg as $msg) {
                    $prams .= $msg . ',';
                }
                $prams = rtrim($prams, ',');
                $path_to_register = $path_to_register . urlencode($prams);
                header('Location: ' . $path_to_register);
                exit;
            }


            // INSERT文準備
            $sql = "INSERT INTO products VALUES(:product_id,:category_id,:product_name,:product_price,:product_description,:accessory_3D,:product_created_at,:product_deleted_at,:product_updated_at)";
            try {
                $stmt = $pdo->prepare($sql);

                // 登録日を取得
                date_default_timezone_set('Asia/Tokyo');
                $create_date = date("Y-m-d H:i:s");

                // productsに登録
                $stmt->bindParam(':product_id', $null_value);
                $stmt->bindParam(':category_id', $category_id);
                $stmt->bindParam(':product_name', $product_name);
                $stmt->bindParam(':product_price', $product_price);
                $stmt->bindParam(':product_description', $product_description);
                $stmt->bindParam(':accessory_3D', $null_value);
                $stmt->bindParam(':product_created_at', $create_date);
                $stmt->bindParam(':product_deleted_at', $null_value);
                $stmt->bindParam(':product_updated_at', $null_value);
                // 実行
                $stmt->execute();
            } catch (PDOException $ej) {
                $err_msg[] = "productsに登録失敗 " . "\n";
                $err_msg[] = $e . "\n";
            }

            // 登録した商品のIDを取得
            $p_id_sql = "SELECT product_id FROM products ORDER BY product_created_at DESC LIMIT 1";
            try {
                $p_id_stmt = $pdo->query($p_id_sql);
                $p_id = $p_id_stmt->fetchAll();
            } catch (PDOException $e) {
                $err_msg[] = "IDの取得失敗 " . "\n";
                $err_msg[] = $e . "\n";
            }

            $img_sql = "INSERT INTO product_images VALUES(:product_image_id,:product_image,:product_id)";
            $img_stmt = $pdo->prepare($img_sql);

            // product_imagesに画像登録
            try {
                $img_stmt->bindParam(':product_image_id', $null_value);
                $img_stmt->bindParam(':product_image', $img_path);
                $img_stmt->bindParam(':product_id', $p_id[0]['product_id']);
                $img_stmt->execute();
            } catch (PDOException $e) {
                $err_msg[] = "product_imagesに画像登録失敗 " . "\n";
                $err_msg[] = $e . "\n";
            }
            $path = './admin_product.php';
            $retry_path = './admin_product_register.php';
        } else {
            // カテゴリ
            $category_name = '';
            for ($i = 1; $i <= 10; $i++) {
                // 時数制限
                if (mb_strlen($_POST['category_name' . $i]) >= 50) {
                    $err_msg[] .= $i . '個目のカテゴリ名は50文字以内で入力してください' . "\n";
                }

                // 値受け取り
                if (!empty($_POST['category_name' . $i])) {
                    $category_name .= h($_POST['category_name' . $i]) . ',';
                }
            }

            // すべて未入力の場合
            if ($category_name == '') {
                $err_msg[] .= '最低一項目は入力してください' . "\n";
            }

            $category_name = rtrim($category_name, ',');
            $categories = explode(",", $category_name);


            // エラーがある場合
            if (!empty($err_msg)) {
                $path_to_register = './admin_category_register.php?msg=';
                $prams = '';
                foreach ($err_msg as $msg) {
                    $prams .= $msg . ',';
                }
                $prams = rtrim($prams, ',');
                $path_to_register = $path_to_register . urlencode($prams);
                header('Location: ' . $path_to_register);
                exit;
            }

            // categoriesに登録
            $category_sql = "INSERT INTO categories VALUES(:category_id,:category_name)";
            for ($i = 0; $i < count($categories); $i++) {
                $category = $categories[$i];
                try {
                    $category_stmt = $pdo->prepare($category_sql);
                    $category_stmt->bindParam(':category_id', $null_value);
                    $category_stmt->bindParam(':category_name', $category);
                    $category_stmt->execute();
                } catch (PDOException $e) {
                    $err_msg[] = "登録失敗 " . "\n";
                    $err_msg[] = $e . "\n";
                }
            }

            $path = './admin_category.php';
            $retry_path = './admin_category_register.php';
        }
    }

    $_SESSION['registered'] = 'registered';
} else {
    $path = './admin_menu.php';
    $retry_path = './admin_product_register.php';
}

// 登録できたかチェック
if (empty($err_msg)) {
    // 登録成功
    $msg = "登録成功";
} else {
    // 登録失敗
    // $msg = "登録失敗";
    $msg = "登録失敗：";
}

?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>登録確認</title>
    <link rel="shortcut icon" href="images/favicon.ico">
    <link type="text/css" rel="stylesheet" href="../css/admin/admin_base.css">
    <link type="text/css" rel="stylesheet" href="../css/admin/admin_product_register.css">
</head>

<body>
    <?php include_once('./admin_base.html'); ?>
    <?php echo $msg ?>
    <?php if (!empty($err_msg)) {
        echo $err_msg;
    } ?>
    <?php echo '<p><a href=' . $path . '>一覧へ</a></p>' ?>
    <?php echo '<p><a href=' . $retry_path . '>登録へ</a></p>' ?>
</body>

</html>