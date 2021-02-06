<?php session_start(); ?>

<!DOCTYPE html>
<html lang="ja">


<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="熱帯魚の通販サイトです。">
  <meta name="keywords" content="熱帯魚, 魚, 水槽, ECサイト, 通販, オンラインショップ">
  <title>Auarium | 基本情報編集</title>

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
          <h6 class="font-weight-bold text-center grey-text text-uppercase small mb-4">change_information</h6>
          <h3 class="font-weight-bold text-center dark-grey-text pb-2">基本情報変更</h3>
          <hr class="w-header my-4">

          <div class="container my-5 py-5 z-depth-1 col-lg-8">

            <!--Section: Content-->
            <section class="px-md-5 mx-md-5 dark-grey-text">

              <!--Grid row-->
              <div class="row d-flex justify-content-center">

                <!--Grid column-->
                <div class="w-75">

                  <!-- Default form register -->
                  <form action="" method="post">

                    <!-- ユーザーネーム -->
                    <small id="defaultRegisterFormPasswordHelpBlock" class="form-text text-muted pl-1 sign_up_label">ユーザーネーム</small>
                    <input type="text" name="user_name" id="defaultRegisterFormUserName" class="form-control mb-3" placeholder="haltaro123">

                    <div class="form-row mb-3">
                      <div class="col">
                        <!-- 姓 -->
                        <small id="defaultRegisterFormPasswordHelpBlock" class="form-text text-muted pl-1 sign_up_label">姓</small>
                        <input type="text" name="last_name" id="defaultRegisterFormFirstName" class="form-control" placeholder="山田">
                      </div>
                      <div class="col">
                        <!-- 名 -->
                        <small id="defaultRegisterFormPasswordHelpBlock" class="form-text text-muted pl-1 sign_up_label">名</small>
                        <input type="text" name="first_name" id="defaultRegisterFormLastName" class="form-control" placeholder="太郎">
                      </div>
                    </div>

                    <!-- 住所 -->
                    <small id="defaultRegisterFormPasswordHelpBlock" class="form-text text-muted pl-1 sign_up_label">住所</small>
                    <input type="text" name="address" id="defaultRegisterAddres" class="form-control mb-3" placeholder="東京都新宿区西新宿〇〇〇-〇">

                    <!-- 電話番号 -->
                    <small id="defaultRegisterFormPasswordHelpBlock" class="form-text text-muted pl-1 sign_up_label">電話番号</small>
                    <input type="tel" name="phone_number" id="defaultRegisterPhoneNumber" class="form-control mb-3" placeholder="000-1111-2222">

                    <!-- E-mail -->
                    <small id="defaultRegisterFormPasswordHelpBlock" class="form-text text-muted pl-1 sign_up_label">メールアドレス</small>
                    <input type="email" name="mail_address" id="defaultRegisterFormEmail" class="form-control mb-3" placeholder="sample@sample.com">

                    <!-- Sign up button -->
                    <button class="btn btn-primary my-4 btn-block" type="submit">保存</button>

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