<?php session_start(); ?>

<!DOCTYPE html>
<html lang="ja">


<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="熱帯魚の通販サイトです。">
  <meta name="keywords" content="熱帯魚, 魚, 水槽, ECサイト, 通販, オンラインショップ">
  <title>Auarium | 退会確認</title>

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
          <h6 class="font-weight-bold text-center grey-text text-uppercase small mb-4">withdrawal_confirm</h6>
          <h3 class="font-weight-bold text-center white-text pb-2">退会確認</h3>
          <hr class="w-header my-4 white">

          <div class="container white my-5 py-5 z-depth-1 col-lg-6">

            <!--Section: Content-->
            <section class="px-md-5 mx-md-5 dark-grey-text">

              <!--Grid row-->
              <div class="row d-flex justify-content-center">

                <!--Grid column-->
                <div class="">

                  <!-- Default form register -->
                  <form action="withdrawal_done.php" method="post">

                    <!-- E-mail -->
                    <small id="defaultRegisterFormPasswordHelpBlock" class="form-text text-muted pl-1 sign_up_label">メールアドレス</small>
                    <input type="email" name="id" id="defaultRegisterFormEmail" class="form-control mb-3" placeholder="sample@sample.com">

                    <!-- パスワード -->
                    <small id="defaultRegisterFormPasswordHelpBlock" class="form-text text-muted pl-1 sign_up_label">パスワード</small>
                    <input type="password" name="pass" id="defaultRegisterFormPassword" class="form-control mb-3" placeholder="">

                    <!-- Sign up button -->
                    <button class="btn btn-primary my-4 btn-block" type="submit">退会</button>

                  </form>
                  <!-- Default form register -->
                </div>
                <!--Grid column-->
              </div>
              <!--Grid row-->
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