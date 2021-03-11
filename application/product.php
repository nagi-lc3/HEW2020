<?php
session_start();

// ログインしていない場合
// if ($_SESSION['user_name'] == false) {
//   header('Location: ./login.php');
// }

require('./db_connect.php');
$c_name = '';
$c_id = '';
$search_word = '';

// ページネーション
// 最大表示件数
define('max_view', 5);


try {
  if (!empty($_GET['search'])) {
    // パラメータ用
    $search_word = $_GET['search'];

    // 検索
    // 絞り込みはないです
    $search = '%' . htmlspecialchars($_GET['search']) . '%';
    $cnt_sql = 'SELECT COUNT(*) AS cnt FROM products INNER JOIN product_images ON products.product_id = product_images.product_id WHERE product_name LIKE :product_name;';
    $cnt_stmt = $pdo->prepare($cnt_sql);
    $cnt_stmt->bindValue(':product_name', $search);

    $sql = 'SELECT products.product_id, product_name, product_price, product_image FROM products INNER JOIN product_images ON products.product_id = product_images.product_id WHERE product_name LIKE :product_name  LIMIT :start, :max;';
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':product_name', $search);

    $b_link = './product.php';
    $link = './product_detail.php';
    $link .= '?back=' . $b_link;
  } elseif (empty($_GET['c_id'])) {
    // 商品取り出し
    $cnt_sql = 'SELECT COUNT(*) AS cnt FROM products';
    $cnt_stmt = $pdo->prepare($cnt_sql);

    $sql = 'SELECT products.product_id, product_name, product_price, product_image FROM products INNER JOIN product_images ON products.product_id = product_images.product_id LIMIT :start, :max;';
    $stmt = $pdo->prepare($sql);


    $b_link = './product.php';
    $link = './product_detail.php';
    $link .= '?back=' . $b_link;
  } else {
    // カテゴリ取り出し
    $c_id = $_GET['c_id'];

    $cnt_sql = 'SELECT COUNT(*) AS cnt FROM products INNER JOIN product_images ON products.product_id = product_images.product_id WHERE products.category_id = :category_id';
    $cnt_stmt = $pdo->prepare($cnt_sql);
    $cnt_stmt->bindValue(':category_id', $c_id);


    $sql = 'SELECT products.product_id, product_name, product_price, product_image FROM products INNER JOIN product_images ON products.product_id = product_images.product_id WHERE products.category_id = :category_id LIMIT :start, :max;';
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':category_id', $c_id);

    $c_name = $_GET['category'];
    $b_link = './product.php';
    $link = './product_detail.php';
    $link .= '?back=' . $b_link;
  }

  $cnt_stmt->execute();
  $total = $cnt_stmt->fetchAll();
  $pages = ceil($total[0]['cnt'] / max_view);

  // 現在のページ取得
  if (!isset($_GET['page_id'])) {
    $now = 1;
  } else {
    $now = $_GET['page_id'];
  }


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
  <meta name="description" content="熱帯魚の通販サイトです。">
  <meta name="keywords" content="熱帯魚, 魚, 水槽, ECサイト, 通販, オンラインショップ">
  <title>Auarium | 商品</title>

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
          <h6 class="font-weight-bold text-center grey-text text-uppercase small mb-4">product</h6>
          <h3 class="font-weight-bold text-center dark-grey-text pb-2">商品一覧</h3>
          <hr class="w-header my-4">

          <?php if (!empty($products)) : ?>
              <?php
              foreach ($products as $product) {
                  // パラメータ追加
                  $link .= '&to_detail=' . $product['product_id'] . '&page_id=' . $now;
                  // カテゴリ
                  if (!empty($c_id)) {
                      $link .= '&c_id=' . $c_id . '&category=' . $c_name;
                  }
                  if (!empty($search_word)) {
                      $link .= '&search=' . $search_word;
                  }

                  // 商品一覧表示
                  echo '<h2>' . $product['product_name'] . '</h2>' . '<br>'; // 商品名
                  echo '<p><a href="' . $link . '"><img src="' . $product['product_image'] . '" alt="' . $product['product_name'] . '" weight="300" height="260"></a></p>'; // 商品画像
                  echo '<p>' . $product['product_price'] . '円</p>' . '<br>'; // 値段
                  echo '<p><a href="' . $link . '">商品詳細へ</a></p>';

                  // 初期化
                  $link = './product_detail.php?back=' . $b_link;
              }
              // 暫定戻るボタン
              if (!empty($_GET['back'])) {
                  echo '<p><a href="./category.php?category=' . $c_name . '">戻る</a></p>';
              } elseif (!empty($_GET['search'])) {
                  echo '<p><a href="./product.php">戻る</a></p>';
              }
              ?>
          <?php else : ?>
              <p>該当する商品はありません</p>
          <?php endif; ?>

          <!-- ページネーション -->
          <?php
          if (!empty($products)) {
              // 前ページへ
              if ($now != 1) {
                  $prev = $now - 1;
                  $pagination_link = $b_link . '?page_id=' . $prev . '&c_id=' . $c_id . '&category=' . $c_name . '&search=' . $search_word;
                  if (!empty($c_id)) {
                      $pagination_link .= '&back=' . $b_link;
                  }
                  echo '<span><a href=' . $pagination_link . '>＜前ページへ</a></span>';
              }


            for ($n = 1; $n <= $pages; $n++) {
              if ($n == $now) {
                echo "<span>$now</span>";
              } else {
                $now_link = $b_link . '?page_id=' . $n . '&c_id=' . $c_id . '&category=' . $c_name . '&search=' . $search_word;
                if (!empty($c_id)) {
                  $now_link .= '&back=' . $b_link;
                }
                echo '<span><a href=' . $now_link . '>' . $n . '</a></span>';
              }
            }

            // 次ページへ
            if ($now != $pages) {
              $next = $now + 1;
              $pagination_link_next = $b_link . '?page_id=' . $next . '&c_id=' . $c_id . '&category=' . $c_name . '&search=' . $search_word;
              if (!empty($c_id)) {
                $pagination_link_next .= '&back=' . $b_link;
              }
              echo '<span><a href=' . $pagination_link_next . '>次ページへ＞</a></span>';
            }
          }
          ?>
        </section>
      </div>
    </div>


    <?php include_once('./footer.html'); ?>
  </div>

  <?php include_once('./script.html'); ?>
</body>

</html>
