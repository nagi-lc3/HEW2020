<?php session_start();

// ログインしていない場合
if ($_SESSION['user_name'] == false) {
  header('Location: ./login.php');
}

function h($str)
{
  return htmlentities($str, ENT_QUOTES);
}
?>

<!DOCTYPE html>
<html lang="ja">


<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="熱帯魚の通販サイトです。">
  <meta name="keywords" content="熱帯魚, 魚, 水槽, ECサイト, 通販, オンラインショップ">
  <title>Auarium | マイページ</title>

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
          <h6 class="font-weight-bold text-center grey-text text-uppercase small mb-4">my page</h6>
          <h3 class="font-weight-bold text-center white-text pb-2">マイページ</h3>
          <hr class="w-header white my-4">

          <div class="card px-3">
            <div class="row">
              <div class="col-md-12 col-lg-10 mx-auto mb-5 nav justify-content-center">
                <h4 class="py-2 mt-5 text-white nav justify-content-center w-50" style="background-color: #4285f4;"><?php if (!empty($_SESSION['user_name'])) {
                    echo h($_SESSION['user_name']);
                } ?><span class="small mt-1 ml-1">さん</span></h4>
              </div>
            </div>

            <!-- 商品情報 -->
            <div class="row">
              <div class="col-md-12 col-lg-10 mx-auto mb-5">
                <h3 class="first">商品情報</h3>

                <!-- card 1 -->
                <div class="card border-top border-bottom-0 border-left border-right border-light">
                  <!-- Card header -->
                  <a href="order_history.php">
                    <div class="card-header border-bottom border-light">
                      <h5 class="black-text font-weight-normal mb-0">
                        注文履歴 <i class="fas fa-angle-right rotate-icon mypage_rotate_icon"></i>
                      </h5>
                    </div>
                  </a>
                </div>
                <!-- card 1 -->

                <!-- card 2 -->
                <div class="card border-top border-bottom-0 border-left border-right border-light">
                  <!-- Card header -->
                  <a href="wish_list.php">
                    <div class="card-header border-bottom border-light">
                      <h5 class="black-text font-weight-normal mb-0">
                        欲しいものリスト <i class="fas fa-angle-right rotate-icon mypage_rotate_icon"></i>
                      </h5>
                    </div>
                  </a>
                </div>
                <!-- card 2 -->

                <!-- card 3 -->
                <div class="card border-top border-bottom-0 border-left border-right border-light">
                  <!-- Card header -->
                  <a href="aquarium_menu.php">
                    <div class="card-header border-bottom border-light">
                      <h5 class="black-text font-weight-normal mb-0">
                        水槽 <i class="fas fa-angle-right rotate-icon mypage_rotate_icon"></i>
                      </h5>
                    </div>
                  </a>
                </div>
                <!-- card 3 -->
              </div>
            </div>


            <!-- アカウント設定 -->
            <div class="row">
              <div class="col-md-12 col-lg-10 mx-auto mb-5">
                <h3 class="first">アカウント設定</h3>

                <!-- card 1 -->
                <div class="card border-top border-bottom-0 border-left border-right border-light">
                  <!-- Card header -->
                  <a href="account_setting.php">
                    <div class="card-header border-bottom border-light">
                      <h5 class="black-text font-weight-normal mb-0">
                        基本情報 <i class="fas fa-angle-right rotate-icon mypage_rotate_icon"></i>
                      </h5>
                    </div>
                  </a>
                </div>
                <!-- card 1 -->

                <!-- card 2 -->
                <div class="card border-top border-bottom-0 border-left border-right border-light">
                  <!-- Card header -->
                  <a href="account_payment.php">
                    <div class="card-header border-bottom border-light">
                      <h5 class="black-text font-weight-normal mb-0">
                        お支払方法 <i class="fas fa-angle-right rotate-icon mypage_rotate_icon"></i>
                      </h5>
                    </div>
                  </a>
                </div>
                <!-- card 2 -->

                <!-- card 3 -->
                <div class="card border-top border-bottom-0 border-left border-right border-light">
                  <!-- Card header -->
                  <a href="account_password_edit.php">
                    <div class="card-header border-bottom border-light">
                      <h5 class="black-text font-weight-normal mb-0">
                        パスワード変更 <i class="fas fa-angle-right rotate-icon mypage_rotate_icon"></i>
                      </h5>
                    </div>
                  </a>
                </div>
                <!-- card 3 -->
              </div>
            </div>


            <!-- その他 -->
            <div class="row">
              <div class="col-md-12 col-lg-10 mx-auto mb-5">
                <h3 class="first">その他</h3>

                <!-- card 1 -->
                <div class="card border-top border-bottom-0 border-left border-right border-light">
                  <!-- Card header -->
                  <a href="help.php">
                    <div class="card-header border-bottom border-light">
                      <h5 class="black-text font-weight-normal mb-0">
                        ヘルプ <i class="fas fa-angle-right rotate-icon mypage_rotate_icon"></i>
                      </h5>
                    </div>
                  </a>
                </div>
                <!-- card 1 -->

                <!-- card 2 -->
                <div class="card border-top border-bottom-0 border-left border-right border-light">
                  <!-- Card header -->
                  <a href="logout.php">
                    <div class="card-header border-bottom border-light">
                      <h5 class="black-text font-weight-normal mb-0">
                        ログアウト <i class="fas fa-angle-right rotate-icon mypage_rotate_icon"></i>
                      </h5>
                    </div>
                  </a>
                </div>
                <!-- card 2 -->

                <!-- card 3 -->
                <div class="card border-top border-bottom-0 border-left border-right border-light">
                  <!-- Card header -->
                  <a href="withdrawal.php">
                    <div class="card-header border-bottom border-light">
                      <h5 class="black-text font-weight-normal mb-0">
                        退会 <i class="fas fa-angle-right rotate-icon mypage_rotate_icon"></i>
                      </h5>
                    </div>
                  </a>
                </div>
                <!-- card 3 -->

              </div>
            </div>
          </div>

        </section>
      </div>


    </div>

    <?php include_once('./footer.html'); ?>
  </div>

  <?php include_once('./script.html'); ?>
</body>

</html>