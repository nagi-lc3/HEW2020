<?php
session_start();

// ログインしていない場合
// if ($_SESSION['user_name'] == false) {
//   header('Location: ./login.php');
// }

require('./db_connect.php');
$link = './new.php';

try {
  $sql = 'SELECT product_id, product_name, product_created_at FROM products ORDER BY product_created_at DESC LIMIT 5;';
  $stmt = $pdo->query($sql);
  $update = $stmt->fetchAll();
} catch (PDOException $e) {
  echo $e;
}

// 日付取り出し
// adminのほう作る過程で変更する可能性があります
if (!empty($update)) {
  $tmp = explode(" ", $update[0]['product_created_at']);
  $date = explode("-", $tmp[0]);
}
$b_link = './new.php';
$link = './product_detail.php';
$link .= '?back=' . $b_link;
?>

<!DOCTYPE html>
<html lang="ja">


<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="熱帯魚の通販サイトです。">
  <meta name="keywords" content="熱帯魚, 魚, 水槽, ECサイト, 通販, オンラインショップ">
  <title>Auarium | 新着商品</title>

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
          <h6 class="font-weight-bold text-center grey-text text-uppercase small mb-4">new</h6>
          <h3 class="font-weight-bold text-center white-text pb-2">新着商品</h3>
          <hr class="w-header white my-4">

          <?php if (!empty($update)) : ?>
            <?php
            // $i = 0;
            // foreach ($update as $product) {
            //   $tmp = explode(" ", $update[$i]['product_created_at']);
            //   $date = explode("-", $tmp[0]);
            //   echo '<p>' . $date[0] . "/" . $date[1] . "/" . $date[2] . '<p>';
            //   echo '<p><a href="' . $link . '&to_detail=' . $product['product_id'] . '">' . $product['product_name'] . '</a>入荷</p>';
            //   $i++;
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
                  <a class="nav-link active font-weight-bold text-uppercase white-text" data-toggle="tab" href="#panel31" role="tab">すべて</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link font-weight-bold text-uppercase white-text" data-toggle="tab" href="#panel32" role="tab">魚</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link font-weight-bold text-uppercase white-text" data-toggle="tab" href="#panel33" role="tab">装飾品</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link font-weight-bold text-uppercase white-text" data-toggle="tab" href="#panel34" role="tab">水槽</a>
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
                  <a href="#" class="card hoverable mb-4">
                    <!-- Card image -->
                    <img class="card-img-top" src="images/グッピー.jpg" alt="Card image cap">
                    <!-- Card content -->
                    <div class="card-body">
                      <h5 class="card-title nav justify-content-center text-dark">グッピー</h5>
                      <hr>
                      <h6 class="card-subtitle nav justify-content-center text-muted">価格：￥1,300</h6>
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
                  <a href="#" class="card hoverable mb-4">
                    <!-- Card image -->
                    <img class="card-img-top" src="images/カージナルテトラ.jpg" alt="Card image cap">
                    <!-- Card content -->
                    <div class="card-body">
                      <h5 class="card-title nav justify-content-center text-dark">カージナルテトラ</h5>
                      <hr>
                      <h6 class="card-subtitle nav justify-content-center text-muted">価格：￥2,700</h6>
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
                  <a href="#" class="card hoverable mb-4">
                    <!-- Card image -->
                    <img class="card-img-top" src="images/ベタ.jpg" alt="Card image cap">
                    <!-- Card content -->
                    <div class="card-body">
                      <h5 class="card-title nav justify-content-center text-dark">ベタ</h5>
                      <hr>
                      <h6 class="card-subtitle nav justify-content-center text-muted">価格：￥800</h6>
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
                  <a href="#" class="card hoverable mb-4">
                    <!-- Card image -->
                    <img class="card-img-top" src="images/ハチェット.jpg" alt="Card image cap">
                    <!-- Card content -->
                    <div class="card-body">
                      <h5 class="card-title nav justify-content-center text-dark">ハチェット</h5>
                      <hr>
                      <h6 class="card-subtitle nav justify-content-center text-muted">価格：￥1,500</h6>
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
                  <a href="#" class="card hoverable mb-4">
                    <!-- Card image -->
                    <img class="card-img-top" src="images/アフリカンランプアイ.jpg" alt="Card image cap">
                    <!-- Card content -->
                    <div class="card-body">
                      <h5 class="card-title nav justify-content-center text-dark">アフリカンランプアイ</h5>
                      <hr>
                      <h6 class="card-subtitle nav justify-content-center text-muted">価格：￥1,000</h6>
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
                  <a href="#" class="card hoverable mb-4">
                    <!-- Card image -->
                    <img class="card-img-top" src="images/カクレクマノミ.jpeg" alt="Card image cap">
                    <!-- Card content -->
                    <div class="card-body">
                      <h5 class="card-title nav justify-content-center text-dark">カクレクマノミ</h5>
                      <hr>
                      <h6 class="card-subtitle nav justify-content-center text-muted">価格：￥2,700</h6>
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
                  <a href="#" class="card hoverable mb-4">
                    <!-- Card image -->
                    <img class="card-img-top" src="images/ルリスズメダイ.jpg" alt="Card image cap">
                    <!-- Card content -->
                    <div class="card-body">
                      <h5 class="card-title nav justify-content-center text-dark">ルリスズメダイ</h5>
                      <hr>
                      <h6 class="card-subtitle nav justify-content-center text-muted">価格：￥1,700</h6>
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
                  <a href="#" class="card hoverable mb-4">
                    <!-- Card image -->
                    <img class="card-img-top" src="images/ウズマキヤッコ.jpg" alt="Card image cap">
                    <!-- Card content -->
                    <div class="card-body">
                      <h5 class="card-title nav justify-content-center text-dark">ウズマキヤッコ</h5>
                      <hr>
                      <h6 class="card-subtitle nav justify-content-center text-muted">価格：￥5,000</h6>
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
                  <a href="#" class="card hoverable mb-4">
                    <!-- Card image -->
                    <img class="card-img-top" src="images/ナンヨウハギ.jpg" alt="Card image cap">
                    <!-- Card content -->
                    <div class="card-body">
                      <h5 class="card-title nav justify-content-center text-dark">ナンヨウハギ</h5>
                      <hr>
                      <h6 class="card-subtitle nav justify-content-center text-muted">価格：￥4,000</h6>
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
                  <a href="#" class="card hoverable mb-4">
                    <!-- Card image -->
                    <img class="card-img-top" src="images/シマキンチャクフグ.jpg" alt="Card image cap">
                    <!-- Card content -->
                    <div class="card-body">
                      <h5 class="card-title nav justify-content-center text-dark">シマキンチャクフグ</h5>
                      <hr>
                      <h6 class="card-subtitle nav justify-content-center text-muted">価格：￥900</h6>
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

              <!-- ページネーション -->
              <nav>
                <ul class="pagination justify-content-center pagination-lg">
                  <li class="page-item"><a class="page-link" href="#" aria-label="前へ">
                      <span aria-hidden="true">&laquo;</span>
                      <span class="sr-only">前へ</span>
                    </a></li>
                  <li class="page-item active"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link" href="#">4</a></li>
                  <li class="page-item pr-0"><a class="page-link" href="#" aria-label="次へ">
                      <span aria-hidden="true">&raquo;</span>
                      <span class="sr-only">次へ</span>
                    </a></li>
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
                  <a href="#" class="card hoverable mb-4">
                    <!-- Card image -->
                    <img class="card-img-top" src="images/グッピー.jpg" alt="Card image cap">
                    <!-- Card content -->
                    <div class="card-body">
                      <h5 class="card-title nav justify-content-center text-dark">グッピー</h5>
                      <hr>
                      <h6 class="card-subtitle nav justify-content-center text-muted">価格：￥1,300</h6>
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
                  <a href="#" class="card hoverable mb-4">
                    <!-- Card image -->
                    <img class="card-img-top" src="images/カージナルテトラ.jpg" alt="Card image cap">
                    <!-- Card content -->
                    <div class="card-body">
                      <h5 class="card-title nav justify-content-center text-dark">カージナルテトラ</h5>
                      <hr>
                      <h6 class="card-subtitle nav justify-content-center text-muted">価格：￥2,700</h6>
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
                  <a href="#" class="card hoverable mb-4">
                    <!-- Card image -->
                    <img class="card-img-top" src="images/ベタ.jpg" alt="Card image cap">
                    <!-- Card content -->
                    <div class="card-body">
                      <h5 class="card-title nav justify-content-center text-dark">ベタ</h5>
                      <hr>
                      <h6 class="card-subtitle nav justify-content-center text-muted">価格：￥800</h6>
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
                  <a href="#" class="card hoverable mb-4">
                    <!-- Card image -->
                    <img class="card-img-top" src="images/ハチェット.jpg" alt="Card image cap">
                    <!-- Card content -->
                    <div class="card-body">
                      <h5 class="card-title nav justify-content-center text-dark">ハチェット</h5>
                      <hr>
                      <h6 class="card-subtitle nav justify-content-center text-muted">価格：￥1,500</h6>
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
                <div class="col-md-6 col-lg-3">
                  <!-- Card -->
                  <a href="#" class="card hoverable mb-4">
                    <!-- Card image -->
                    <img class="card-img-top" src="images/mizukusa.jpg" alt="Card image cap">
                    <!-- Card content -->
                    <div class="card-body">
                      <h5 class="card-title nav justify-content-center text-dark">水草</h5>
                      <hr>
                      <h6 class="card-subtitle nav justify-content-center text-muted">価格：￥1,500</h6>
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
                  <a href="#" class="card hoverable mb-4">
                    <!-- Card image -->
                    <img class="card-img-top" src="images/okiisi.jpg" alt="Card image cap">
                    <!-- Card content -->
                    <div class="card-body">
                      <h5 class="card-title nav justify-content-center text-dark">置き石</h5>
                      <hr>
                      <h6 class="card-subtitle nav justify-content-center text-muted">価格：￥500</h6>
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
