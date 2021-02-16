<?php
session_start();

// ログインしていない場合
if ($_SESSION['user_name'] == false) {
  header('Location: ./login.php');
}
?>

<!DOCTYPE html>
<html lang="ja">


<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="熱帯魚の通販サイトです。">
  <meta name="keywords" content="熱帯魚, 魚, 水槽, ECサイト, 通販, オンラインショップ">
  <title>Auarium | 水槽</title>

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
          <h6 class="font-weight-bold text-center grey-text text-uppercase small mb-4">aquarium</h6>
          <h3 class="font-weight-bold text-center white-text pb-2">水槽一覧</h3>
          <hr class="w-header white my-4">

          <div class="container my-5">

            <!--Section: Content-->
            <section class="text-center dark-grey-text">

              <!-- Section heading -->
              <form action="aquarium_create.php" method="post">
                <button class="btn btn-primary btn-rounded waves-effect waves-light">水槽を作成する</button>
                <!-- Section description -->
                <p class="text-muted w-responsive mx-auto mb-5"><a href="help.php">水槽とは？</a></p>

                <!-- Grid row -->
                <div class="row">

                  <!-- Grid column -->
                  <div class="col-lg-4 col-md-12 mb-4">

                    <!-- Card -->
                    <div class="card hoverable">

                      <!-- Content -->
                      <div class="card-body">

                        <!-- Offer -->
                        <h5 class="mb-4">水槽1</h5>
                        <div class="d-flex justify-content-center">
                        </div>

                        <!--Price -->
                        <h2 class="font-weight-bold my-4">サンプル</h2>
                        <p class="grey-text">サンプルサンプル</p>
                        <a class="btn btn-primary btn-rounded" href="mysuiso.php">水槽1へ</a>

                      </div>
                      <!-- Content -->

                    </div>
                    <!-- Card -->

                  </div>
                  <!-- Grid column -->

                  <!-- Grid column -->
                  <div class="col-lg-4 col-md-6 mb-4">

                    <!-- Card -->
                    <div class="card hoverable">

                      <!-- Content -->
                      <div class="card-body">

                        <!-- Offer -->
                        <h5 class="mb-4">水槽2</h5>
                        <div class="d-flex justify-content-center">
                        </div>

                        <!--Price -->
                        <h2 class="font-weight-bold my-4">サンプル</h2>
                        <p>サンプルサンプル</p>
                        <a class="btn btn-primary btn-rounded" href="#">水槽2へ</a>

                      </div>
                      <!-- Content -->

                    </div>
                    <!-- Card -->

                  </div>
                  <!-- Grid column -->

                  <!-- Grid column -->
                  <div class="col-lg-4 col-md-6 mb-4">

                    <!-- Card -->
                    <div class="card hoverable">

                      <!-- Content -->
                      <div class="card-body">

                        <!-- Offer -->
                        <h5 class="mb-4">水槽3</h5>
                        <div class="d-flex justify-content-center">
                        </div>

                        <!--Price -->
                        <h2 class="font-weight-bold my-4">サンプル</h2>
                        <p class="grey-text">サンプルサンプル</p>
                        <a class="btn btn-primary btn-rounded" href="#">水槽3へ</a>

                      </div>
                      <!-- Content -->
                    </div>
                    <!-- Card -->
                  </div>
                  <!-- Grid column -->
                </div>
                <!-- Grid row -->
              </form>
            </section>
            <!--Section: Content-->

          </div>
        </section>
      </div>
    </div>


    <?php include_once('./footer.html'); ?>
  </div>

  <?php include_once('./script.html'); ?>
</body>

</html>