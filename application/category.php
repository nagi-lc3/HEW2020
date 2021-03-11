<?php
session_start();

// ログインしていない場合
if ($_SESSION['user_name'] == false) {
  header('Location: ./login.php');
}

require('./db_connect.php');

// カテゴリ取り出し
$selected_category = "%" . $_GET['category'] . "%";
$sql = 'SELECT category_id, category_name FROM categories WHERE category_name LIKE :category_name;';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':category_name', $selected_category);
$stmt->execute();
$categories = $stmt->fetchAll();

// パラメータ用
$c_name = $_GET['category'];
$b_link = './category.php';
$link = './product.php';
$link .= '?back=' . $b_link;
?>

<!DOCTYPE html>
<html lang="ja">


<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="熱帯魚の通販サイトです。">
  <meta name="keywords" content="熱帯魚, 魚, 水槽, ECサイト, 通販, オンラインショップ">
  <title>Auarium | カテゴリ</title>

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
          <h6 class="font-weight-bold text-center grey-text text-uppercase small mb-4">products</h6>
          <h3 class="font-weight-bold text-center dark-grey-text pb-2">商品一覧</h3>
          <hr class="w-header my-4">


          <!-- すべて魚装飾品水槽以下 -->
          <?php if (!empty($categories)) : ?>
            <?php
            // foreach ($categories as $category) {
            // // カテゴリ一覧表示
            //   echo '<p><a href="' . $link . '&c_id=' . $category['category_id'] . '&category=' . $c_name . '">' . $category['category_name'] . '</a></p>';
            // }
            ?>
          <?php else : ?>
            <!-- <p>該当する商品はありません</p> -->
          <?php endif; ?>


          <!--First row-->
          <div class="row">
            <!--First column-->
            <div class="col-12">
              <!-- タブ -->
              <ul class="nav md-pills flex-center flex-wrap mx-0" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active font-weight-bold text-uppercase" data-toggle="tab" href="#panel31" role="tab">すべて</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link font-weight-bold text-uppercase" data-toggle="tab" href="#panel32" role="tab">魚</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link font-weight-bold text-uppercase" data-toggle="tab" href="#panel33" role="tab">装飾品</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link font-weight-bold text-uppercase" data-toggle="tab" href="#panel34" role="tab">水槽</a>
                </li>
              </ul>
            </div>
            <!--First column-->
          </div>
          <!--First row-->

          <!--Tab panels-->
          <div class="tab-content mb-5">
            <!--Panel 1 -->
            <div class="tab-pane fade show in active" id="panel31" role="tabpanel">
              <!-- Grid row 1 -->
              <div class="row">

                <!-- 商品1 -->
                <div class="col-md-6 col-lg-3">
                  <!-- Card -->
                  <a href="product_detail.php" class="card hoverable mb-4">
                    <!-- Card image -->
                    <img class="card-img-top" src="images/fish1.jpg" alt="Card image cap">
                    <!-- Card content -->
                    <div class="card-body">
                      <h5 class="card-title nav justify-content-center text-dark">エンゼルフィッシュ</h5>
                      <hr>
                      <h6 class="card-subtitle nav justify-content-center text-muted">価格：￥1,011</h6>
                      <div class="container-fluid mt-2 nav justify-content-center">
                        <form>
                          <button class="btn btn-primary btn-sm w-100">カートへ</button>
                          <button class="btn btn-primary btn-sm w-100">欲しいものリストへ</button>
                        </form>
                      </div>
                    </div>
                  </a>
                  <!-- Card -->
                </div>

                <!-- 商品2 -->
                <div class="col-md-6 col-lg-3">
                  <!-- Card -->
                  <a href="product_detail.php" class="card hoverable mb-4">
                    <!-- Card image -->
                    <img class="card-img-top" src="images/fish2.jpg" alt="Card image cap">
                    <!-- Card content -->
                    <div class="card-body">
                      <h5 class="card-title nav justify-content-center text-dark">エンゼルフィッシュ</h5>
                      <hr>
                      <h6 class="card-subtitle nav justify-content-center text-muted">価格：￥1,011</h6>
                      <div class="container-fluid mt-2 nav justify-content-center">
                        <form>
                          <button class="btn btn-primary btn-sm w-100">カートへ</button>
                          <button class="btn btn-primary btn-sm w-100">欲しいものリストへ</button>
                        </form>
                      </div>
                    </div>
                  </a>
                  <!-- Card -->
                </div>

                <!-- 商品3 -->
                <div class="col-md-6 col-lg-3">
                  <!-- Card -->
                  <a href="product_detail.php" class="card hoverable mb-4">
                    <!-- Card image -->
                    <img class="card-img-top" src="images/fish3.jpg" alt="Card image cap">
                    <!-- Card content -->
                    <div class="card-body">
                      <h5 class="card-title nav justify-content-center text-dark">エンゼルフィッシュ</h5>
                      <hr>
                      <h6 class="card-subtitle nav justify-content-center text-muted">価格：￥1,011</h6>
                      <div class="container-fluid mt-2 nav justify-content-center">
                        <form>
                          <button class="btn btn-primary btn-sm w-100">カートへ</button>
                          <button class="btn btn-primary btn-sm w-100">欲しいものリストへ</button>
                        </form>
                      </div>
                    </div>
                  </a>
                  <!-- Card -->
                </div>

                <!-- 商品4 -->
                <div class="col-md-6 col-lg-3">
                  <!-- Card -->
                  <a href="product_detail.php" class="card hoverable mb-4">
                    <!-- Card image -->
                    <img class="card-img-top" src="images/fish4.jpg" alt="Card image cap">
                    <!-- Card content -->
                    <div class="card-body">
                      <h5 class="card-title nav justify-content-center text-dark">エンゼルフィッシュ</h5>
                      <hr>
                      <h6 class="card-subtitle nav justify-content-center text-muted">価格：￥1,011</h6>
                      <div class="container-fluid mt-2 nav justify-content-center">
                        <form>
                          <button class="btn btn-primary btn-sm w-100">カートへ</button>
                          <button class="btn btn-primary btn-sm w-100">欲しいものリストへ</button>
                        </form>
                      </div>
                    </div>
                  </a>
                  <!-- Card -->
                </div>
                <!-- Grid column -->
              </div>
              <!-- Grid row 1 -->


              <!-- Grid row 2 -->
              <div class="row">

                <!-- 商品1 -->
                <div class="col-md-6 col-lg-3">
                  <!-- Card -->
                  <a href="product_detail.php" class="card hoverable mb-4">
                    <!-- Card image -->
                    <img class="card-img-top" src="images/fish1.jpg" alt="Card image cap">
                    <!-- Card content -->
                    <div class="card-body">
                      <h5 class="card-title nav justify-content-center text-dark">エンゼルフィッシュ</h5>
                      <hr>
                      <h6 class="card-subtitle nav justify-content-center text-muted">価格：￥1,011</h6>
                      <div class="container-fluid mt-2 nav justify-content-center">
                        <form>
                          <button class="btn btn-primary btn-sm w-100">カートへ</button>
                          <button class="btn btn-primary btn-sm w-100">欲しいものリストへ</button>
                        </form>
                      </div>
                    </div>
                  </a>
                  <!-- Card -->
                </div>

                <!-- 商品2 -->
                <div class="col-md-6 col-lg-3">
                  <!-- Card -->
                  <a href="product_detail.php" class="card hoverable mb-4">
                    <!-- Card image -->
                    <img class="card-img-top" src="images/fish4.jpg" alt="Card image cap">
                    <!-- Card content -->
                    <div class="card-body">
                      <h5 class="card-title nav justify-content-center text-dark">エンゼルフィッシュ</h5>
                      <hr>
                      <h6 class="card-subtitle nav justify-content-center text-muted">価格：￥1,011</h6>
                      <div class="container-fluid mt-2 nav justify-content-center">
                        <form>
                          <button class="btn btn-primary btn-sm w-100">カートへ</button>
                          <button class="btn btn-primary btn-sm w-100">欲しいものリストへ</button>
                        </form>
                      </div>
                    </div>
                  </a>
                  <!-- Card -->
                </div>

                <!-- 商品3 -->
                <div class="col-md-6 col-lg-3">
                  <!-- Card -->
                  <a href="product_detail.php" class="card hoverable mb-4">
                    <!-- Card image -->
                    <img class="card-img-top" src="images/fish3.jpg" alt="Card image cap">
                    <!-- Card content -->
                    <div class="card-body">
                      <h5 class="card-title nav justify-content-center text-dark">エンゼルフィッシュ</h5>
                      <hr>
                      <h6 class="card-subtitle nav justify-content-center text-muted">価格：￥1,011</h6>
                      <div class="container-fluid mt-2 nav justify-content-center">
                        <form>
                          <button class="btn btn-primary btn-sm w-100">カートへ</button>
                          <button class="btn btn-primary btn-sm w-100">欲しいものリストへ</button>
                        </form>
                      </div>
                    </div>
                  </a>
                  <!-- Card -->
                </div>

                <!-- 商品4 -->
                <div class="col-md-6 col-lg-3">
                  <!-- Card -->
                  <a href="product_detail.php" class="card hoverable mb-4">
                    <!-- Card image -->
                    <img class="card-img-top" src="images/fish1.jpg" alt="Card image cap">
                    <!-- Card content -->
                    <div class="card-body">
                      <h5 class="card-title nav justify-content-center text-dark">エンゼルフィッシュ</h5>
                      <hr>
                      <h6 class="card-subtitle nav justify-content-center text-muted">価格：￥1,011</h6>
                      <div class="container-fluid mt-2 nav justify-content-center">
                        <form>
                          <button class="btn btn-primary btn-sm w-100">カートへ</button>
                          <button class="btn btn-primary btn-sm w-100">欲しいものリストへ</button>
                        </form>
                      </div>
                    </div>
                  </a>
                  <!-- Card -->
                </div>
                <!-- Grid column -->
              </div>
              <!-- Grid row 2 -->


              <!-- Grid row 3 -->
              <div class="row">

                <!-- 商品1 -->
                <div class="col-md-6 col-lg-3">
                  <!-- Card -->
                  <a href="product_detail.php" class="card hoverable mb-4">
                    <!-- Card image -->
                    <img class="card-img-top" src="images/fish2.jpg" alt="Card image cap">
                    <!-- Card content -->
                    <div class="card-body">
                      <h5 class="card-title nav justify-content-center text-dark">エンゼルフィッシュ</h5>
                      <hr>
                      <h6 class="card-subtitle nav justify-content-center text-muted">価格：￥1,011</h6>
                      <div class="container-fluid mt-2 nav justify-content-center">
                        <form>
                          <button class="btn btn-primary btn-sm w-100">カートへ</button>
                          <button class="btn btn-primary btn-sm w-100">欲しいものリストへ</button>
                        </form>
                      </div>
                    </div>
                  </a>
                  <!-- Card -->
                </div>

                <!-- 商品2 -->
                <div class="col-md-6 col-lg-3">
                  <!-- Card -->
                  <a href="product_detail.php" class="card hoverable mb-4">
                    <!-- Card image -->
                    <img class="card-img-top" src="images/fish1.jpg" alt="Card image cap">
                    <!-- Card content -->
                    <div class="card-body">
                      <h5 class="card-title nav justify-content-center text-dark">エンゼルフィッシュ</h5>
                      <hr>
                      <h6 class="card-subtitle nav justify-content-center text-muted">価格：￥1,011</h6>
                      <div class="container-fluid mt-2 nav justify-content-center">
                        <form>
                          <button class="btn btn-primary btn-sm w-100">カートへ</button>
                          <button class="btn btn-primary btn-sm w-100">欲しいものリストへ</button>
                        </form>
                      </div>
                    </div>
                  </a>
                  <!-- Card -->
                </div>

                <!-- 商品3 -->
                <div class="col-md-6 col-lg-3">
                  <!-- Card -->
                  <a href="product_detail.php" class="card hoverable mb-4">
                    <!-- Card image -->
                    <img class="card-img-top" src="images/fish3.jpg" alt="Card image cap">
                    <!-- Card content -->
                    <div class="card-body">
                      <h5 class="card-title nav justify-content-center text-dark">エンゼルフィッシュ</h5>
                      <hr>
                      <h6 class="card-subtitle nav justify-content-center text-muted">価格：￥1,011</h6>
                      <div class="container-fluid mt-2 nav justify-content-center">
                        <form>
                          <button class="btn btn-primary btn-sm w-100">カートへ</button>
                          <button class="btn btn-primary btn-sm w-100">欲しいものリストへ</button>
                        </form>
                      </div>
                    </div>
                  </a>
                  <!-- Card -->
                </div>

                <!-- 商品4 -->
                <div class="col-md-6 col-lg-3">
                  <!-- Card -->
                  <a href="product_detail.php" class="card hoverable mb-4">
                    <!-- Card image -->
                    <img class="card-img-top" src="images/fish4.jpg" alt="Card image cap">
                    <!-- Card content -->
                    <div class="card-body">
                      <h5 class="card-title nav justify-content-center text-dark">エンゼルフィッシュ</h5>
                      <hr>
                      <h6 class="card-subtitle nav justify-content-center text-muted">価格：￥1,011</h6>
                      <div class="container-fluid mt-2 nav justify-content-center">
                        <form>
                          <button class="btn btn-primary btn-sm w-100">カートへ</button>
                          <button class="btn btn-primary btn-sm w-100">欲しいものリストへ</button>
                        </form>
                      </div>
                    </div>
                  </a>
                  <!-- Card -->
                </div>
                <!-- Grid column -->
              </div>
              <!-- Grid row 3 -->


              <!-- Grid row 4 -->
              <div class="row">

                <!-- 商品1 -->
                <div class="col-md-6 col-lg-3">
                  <!-- Card -->
                  <a href="product_detail.php" class="card hoverable mb-4">
                    <!-- Card image -->
                    <img class="card-img-top" src="images/fish2.jpg" alt="Card image cap">
                    <!-- Card content -->
                    <div class="card-body">
                      <h5 class="card-title nav justify-content-center text-dark">エンゼルフィッシュ</h5>
                      <hr>
                      <h6 class="card-subtitle nav justify-content-center text-muted">価格：￥1,011</h6>
                      <div class="container-fluid mt-2 nav justify-content-center">
                        <form>
                          <button class="btn btn-primary btn-sm w-100">カートへ</button>
                          <button class="btn btn-primary btn-sm w-100">欲しいものリストへ</button>
                        </form>
                      </div>
                    </div>
                  </a>
                  <!-- Card -->
                </div>

                <!-- 商品2 -->
                <div class="col-md-6 col-lg-3">
                  <!-- Card -->
                  <a href="product_detail.php" class="card hoverable mb-4">
                    <!-- Card image -->
                    <img class="card-img-top" src="images/fish3.jpg" alt="Card image cap">
                    <!-- Card content -->
                    <div class="card-body">
                      <h5 class="card-title nav justify-content-center text-dark">エンゼルフィッシュ</h5>
                      <hr>
                      <h6 class="card-subtitle nav justify-content-center text-muted">価格：￥1,011</h6>
                      <div class="container-fluid mt-2 nav justify-content-center">
                        <form>
                          <button class="btn btn-primary btn-sm w-100">カートへ</button>
                          <button class="btn btn-primary btn-sm w-100">欲しいものリストへ</button>
                        </form>
                      </div>
                    </div>
                  </a>
                  <!-- Card -->
                </div>

                <!-- 商品3 -->
                <div class="col-md-6 col-lg-3">
                  <!-- Card -->
                  <a href="product_detail.php" class="card hoverable mb-4">
                    <!-- Card image -->
                    <img class="card-img-top" src="images/fish4.jpg" alt="Card image cap">
                    <!-- Card content -->
                    <div class="card-body">
                      <h5 class="card-title nav justify-content-center text-dark">エンゼルフィッシュ</h5>
                      <hr>
                      <h6 class="card-subtitle nav justify-content-center text-muted">価格：￥1,011</h6>
                      <div class="container-fluid mt-2 nav justify-content-center">
                        <form>
                          <button class="btn btn-primary btn-sm w-100">カートへ</button>
                          <button class="btn btn-primary btn-sm w-100">欲しいものリストへ</button>
                        </form>
                      </div>
                    </div>
                  </a>
                  <!-- Card -->
                </div>

                <!-- 商品4 -->
                <div class="col-md-6 col-lg-3">
                  <!-- Card -->
                  <a href="product_detail.php" class="card hoverable mb-4">
                    <!-- Card image -->
                    <img class="card-img-top" src="images/fish1.jpg" alt="Card image cap">
                    <!-- Card content -->
                    <div class="card-body">
                      <h5 class="card-title nav justify-content-center text-dark">エンゼルフィッシュ</h5>
                      <hr>
                      <h6 class="card-subtitle nav justify-content-center text-muted">価格：￥1,011</h6>
                      <div class="container-fluid mt-2 nav justify-content-center">
                        <form>
                          <button class="btn btn-primary btn-sm w-100">カートへ</button>
                          <button class="btn btn-primary btn-sm w-100">欲しいものリストへ</button>
                        </form>
                      </div>
                    </div>
                  </a>
                  <!-- Card -->
                </div>
                <!-- Grid column -->
              </div>
              <!-- Grid row 4 -->

              <nav>
                <ul class="pagination justify-content-center pagination-lg">
                  <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                  <li class="page-item active"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link" href="#">4</a></li>
                  <li class="page-item"><a class="page-link" href="#">5</a></li>
                  <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                </ul>
              </nav>
            </div>
            <!--Panel 1-->



            <!--Panel 2-->
            <div class="tab-pane fade" id="panel32" role="tabpanel">
              <!-- Grid row 1 -->
              <div class="row">

                <!-- 商品1 -->
                <div class="col-md-6 col-lg-3">
                  <!-- Card -->
                  <a href="product_detail.php" class="card hoverable mb-4">
                    <!-- Card image -->
                    <img class="card-img-top" src="images/fish1.jpg" alt="Card image cap">
                    <!-- Card content -->
                    <div class="card-body">
                      <h5 class="card-title nav justify-content-center text-dark">エンゼルフィッシュ</h5>
                      <hr>
                      <h6 class="card-subtitle nav justify-content-center text-muted">価格：￥1,011</h6>
                      <div class="container-fluid mt-2 nav justify-content-center">
                        <form>
                          <button class="btn btn-primary btn-sm w-100">カートへ</button>
                          <button class="btn btn-primary btn-sm w-100">欲しいものリストへ</button>
                        </form>
                      </div>
                    </div>
                  </a>
                  <!-- Card -->
                </div>

                <!-- 商品2 -->
                <div class="col-md-6 col-lg-3">
                  <!-- Card -->
                  <a href="product_detail.php" class="card hoverable mb-4">
                    <!-- Card image -->
                    <img class="card-img-top" src="images/fish2.jpg" alt="Card image cap">
                    <!-- Card content -->
                    <div class="card-body">
                      <h5 class="card-title nav justify-content-center text-dark">エンゼルフィッシュ</h5>
                      <hr>
                      <h6 class="card-subtitle nav justify-content-center text-muted">価格：￥1,011</h6>
                      <div class="container-fluid mt-2 nav justify-content-center">
                        <form>
                          <button class="btn btn-primary btn-sm w-100">カートへ</button>
                          <button class="btn btn-primary btn-sm w-100">欲しいものリストへ</button>
                        </form>
                      </div>
                    </div>
                  </a>
                  <!-- Card -->
                </div>

                <!-- 商品3 -->
                <div class="col-md-6 col-lg-3">
                  <!-- Card -->
                  <a href="product_detail.php" class="card hoverable mb-4">
                    <!-- Card image -->
                    <img class="card-img-top" src="images/fish3.jpg" alt="Card image cap">
                    <!-- Card content -->
                    <div class="card-body">
                      <h5 class="card-title nav justify-content-center text-dark">エンゼルフィッシュ</h5>
                      <hr>
                      <h6 class="card-subtitle nav justify-content-center text-muted">価格：￥1,011</h6>
                      <div class="container-fluid mt-2 nav justify-content-center">
                        <form>
                          <button class="btn btn-primary btn-sm w-100">カートへ</button>
                          <button class="btn btn-primary btn-sm w-100">欲しいものリストへ</button>
                        </form>
                      </div>
                    </div>
                  </a>
                  <!-- Card -->
                </div>

                <!-- 商品4 -->
                <div class="col-md-6 col-lg-3">
                  <!-- Card -->
                  <a href="product_detail.php" class="card hoverable mb-4">
                    <!-- Card image -->
                    <img class="card-img-top" src="images/fish4.jpg" alt="Card image cap">
                    <!-- Card content -->
                    <div class="card-body">
                      <h5 class="card-title nav justify-content-center text-dark">エンゼルフィッシュ</h5>
                      <hr>
                      <h6 class="card-subtitle nav justify-content-center text-muted">価格：￥1,011</h6>
                      <div class="container-fluid mt-2 nav justify-content-center">
                        <form>
                          <button class="btn btn-primary btn-sm w-100">カートへ</button>
                          <button class="btn btn-primary btn-sm w-100">欲しいものリストへ</button>
                        </form>
                      </div>
                    </div>
                  </a>
                  <!-- Card -->
                </div>
                <!-- Grid column -->
              </div>
              <!-- Grid row 1 -->
            </div>
            <!--Panel 2-->



            <!--Panel 3-->
            <div class="tab-pane fade" id="panel33" role="tabpanel">
              <!-- Grid row 1 -->
              <div class="row">

                <!-- 商品1 -->
                <div class="col-md-6 col-lg-4 col-xl-3">
                  <!-- Card -->
                  <a class="card hoverable mb-4">
                    <!-- Card image -->
                    <img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Others/img3.jpg" alt="Card image cap">
                    <!-- Card content -->
                    <div class="card-body">
                      <h5 class="my-3">Phone Bag</h5>
                      <p class="card-text text-uppercase mb-3">Bag, Box</p>
                    </div>
                  </a>
                  <!-- Card -->
                </div>

                <!-- 商品2 -->
                <div class="col-md-6 col-lg-4 col-xl-3">
                  <!-- Card -->
                  <a class="card hoverable mb-4">
                    <!-- Card image -->
                    <img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Others/img9.jpg" alt="Card image cap">
                    <!-- Card content -->
                    <div class="card-body">
                      <h5 class="my-3">Paper Bag</h5>
                      <p class="card-text text-uppercase mb-3">Bag</p>
                    </div>
                  </a>
                  <!-- Card -->
                </div>

                <!-- 商品3 -->
                <div class="col-md-6 col-lg-4 col-xl-3">
                  <!-- Card -->
                  <a class="card hoverable mb-4">
                    <!-- Card image -->
                    <img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Others/img3.jpg" alt="Card image cap">
                    <!-- Card content -->
                    <div class="card-body">
                      <h5 class="my-3">Phone Bag</h5>
                      <p class="card-text text-uppercase mb-3">Bag, Box</p>
                    </div>
                  </a>
                  <!-- Card -->
                </div>

                <!-- 商品4 -->
                <div class="col-md-6 col-lg-4 col-xl-3">
                  <!-- Card -->
                  <a class="card hoverable mb-4">
                    <!-- Card image -->
                    <img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Others/img9.jpg" alt="Card image cap">
                    <!-- Card content -->
                    <div class="card-body">
                      <h5 class="my-3">Paper Bag</h5>
                      <p class="card-text text-uppercase mb-3">Bag</p>
                    </div>
                  </a>
                  <!-- Card -->
                </div>
                <!-- Grid column -->
              </div>
              <!-- Grid row 1 -->
            </div>
            <!--Panel 3 -->


            <!--Panel 4-->
            <div class="tab-pane fade" id="panel34" role="tabpanel">
              <!-- Grid row 1 -->
              <div class="row">

                <!-- 商品1 -->
                <div class="col-md-6 col-lg-4 col-xl-3">
                  <!-- Card -->
                  <a class="card hoverable mb-4">
                    <!-- Card image -->
                    <img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Others/img3.jpg" alt="Card image cap">
                    <!-- Card content -->
                    <div class="card-body">
                      <h5 class="my-3">Phone Bag</h5>
                      <p class="card-text text-uppercase mb-3">Bag, Box</p>
                    </div>
                  </a>
                  <!-- Card -->
                </div>

                <!-- 商品2 -->
                <div class="col-md-6 col-lg-4 col-xl-3">
                  <!-- Card -->
                  <a class="card hoverable mb-4">
                    <!-- Card image -->
                    <img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Others/img9.jpg" alt="Card image cap">
                    <!-- Card content -->
                    <div class="card-body">
                      <h5 class="my-3">Paper Bag</h5>
                      <p class="card-text text-uppercase mb-3">Bag</p>
                    </div>
                  </a>
                  <!-- Card -->
                </div>

                <!-- 商品3 -->
                <div class="col-md-6 col-lg-4 col-xl-3">
                  <!-- Card -->
                  <a class="card hoverable mb-4">
                    <!-- Card image -->
                    <img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Others/img3.jpg" alt="Card image cap">
                    <!-- Card content -->
                    <div class="card-body">
                      <h5 class="my-3">Phone Bag</h5>
                      <p class="card-text text-uppercase mb-3">Bag, Box</p>
                    </div>
                  </a>
                  <!-- Card -->
                </div>

                <!-- 商品4 -->
                <div class="col-md-6 col-lg-4 col-xl-3">
                  <!-- Card -->
                  <a class="card hoverable mb-4">
                    <!-- Card image -->
                    <img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Others/img9.jpg" alt="Card image cap">
                    <!-- Card content -->
                    <div class="card-body">
                      <h5 class="my-3">Paper Bag</h5>
                      <p class="card-text text-uppercase mb-3">Bag</p>
                    </div>
                  </a>
                  <!-- Card -->
                </div>
                <!-- Grid column -->
              </div>
              <!-- Grid row 1 -->
            </div>
            <!--Panel 3-->

          </div>
          <!--Tab panels-->
        </section>
        <!-- Section -->

      </div>
    </div>


    <?php include_once('./footer.html'); ?>
  </div>

  <?php include_once('./script.html'); ?>
</body>

</html>