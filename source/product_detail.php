<?php
session_start();
require_once('./db_connect.php');

// $link = $_GET['link'];
if (isset($_GET['page_id'])) {
  $p_id = $_GET['page_id'];
} else {
  $p_id = '';
}

$link = $_GET['back'] . '?page_id=' . $p_id;


// カテゴリから来た場合
if (!empty($_GET['c_id'])) {
  $c_id = $_GET['c_id'];
  $c_name = $_GET['category'];
  $link .= '&c_id=' . $c_id . '&category=' . $c_name . '&back=category.php';
} else if (!empty($_GET['search'])) {
  $search = $_GET['search'];
  $link .= '&search=' . $search;
}

$product_id = $_GET['to_detail'];


try {
  // 商品情報取り出し
  $p_sql = 'SELECT * FROM products INNER JOIN product_images ON products.product_id = product_images.product_id WHERE products.product_id = :product_id;';
  $p_stmt = $pdo->prepare($p_sql);
  $p_stmt->bindValue(':product_id', $product_id);
  $p_stmt->execute();
  $products = $p_stmt->fetch();

  // それぞれ変数に
  $name = $products['product_name'];
  $price = $products['product_price'];
  $description = $products['product_description'];
  $img = '<img src="' . $products['product_image'] . '" alt="' . $name . '">';
} catch (PDOException $e) {
  echo $e;
}
?>

<!DOCTYPE html>
<html lang="ja">


<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="熱帯魚の通販サイトです。">
  <meta name="keywords" content="熱帯魚, 魚, 水槽, ECサイト, 通販, オンラインショップ">
  <title>Auarium | 商品名</title>

  <?php include_once('./link.html'); ?>
</head>


<body>
  <div class="wrapper">
    <?php include_once('./header.html'); ?>


    <!-- メインコンテンツ -->
    <div class="contents">
      <!-- <h2>商品名</h2>
            <p>商品A</p> -->

      <?php
      echo '<h2>' . $name . '</h2>';
      echo '<p>' . $img . '</p>';
      echo '<p>' . $description . '</p>';
      echo '<p>' . $price . '円</p>';
      ?>
      <form action="./cart.php?product_id=<?php echo $product_id; ?>" method="post">
        <input type="submit" name="" value="カートに入れる">
      </form>
    </div>
    <!-- 暫定的にリンク -->
    <div><a href="<?php echo $link; ?>">戻る</a></div>

    <?php include_once('./footer.html'); ?>
  </div>

  <?php include_once('./script.html'); ?>
</body>

</html>