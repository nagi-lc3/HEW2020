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
  $price = '￥' . $products['product_price'];
  $description = $products['product_description'];
  $img = '<img class="card-img-top" src="' . $products['product_image'] . '" alt="' . $name . '">';
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
      <div class="container my-5">

        <!-- Section -->
        <section>
          <!-- タイトル -->
          <h6 class="font-weight-bold text-center grey-text text-uppercase small mb-4">product detail</h6>
          <h3 class="font-weight-bold text-center white-text pb-2">注文詳細</h3>
          <hr class="w-header white my-4">


          <!-- 商品1 -->
          <div class="">
            <!-- Card -->
            <div class="card hoverable mb-4 col-lg-8 px-0 mx-auto">
              <!-- Card image -->
              <?php echo $img; ?>
              <!-- Card content -->
              <div class="card-body">
                <h3 class="card-title nav justify-content-center text-dark">
                  <?php echo $name; ?>
                </h3>
                <hr>
                <h4 class="card-subtitle nav justify-content-center text-muted mb-5">
                  <?php echo $price; ?>
                </h4>
                <p class="card-subtitle nav justify-content-center text-muted mb-5">
                  <?php echo $description; ?>
                </p>
                <div class="container-fluid mt-2 nav justify-content-center">
                  <form action="./cart.php?product_id=<?php echo $product_id; ?>" method="post">
                    <button class="btn btn-primary" type="submit">カートへ</button>
                  </form>
                  <form>
                    <button class="btn btn-primary" type="submit">欲しいものリストへ</button>
                  </form>
                </div>
              </div>
            </div>
            <!-- Card -->
          </div>
        </section>
      </div>
    </div>


    <?php include_once('./footer.html'); ?>
  </div>

  <?php include_once('./script.html'); ?>
</body>

</html>