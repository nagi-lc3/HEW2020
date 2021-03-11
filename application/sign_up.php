<?php
$err='';
if (isset($_GET['msg'])) {
    $err = $_GET['msg'];
}
?>
<!DOCTYPE html>
<html lang="ja">


<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="熱帯魚の通販サイトです。">
  <meta name="keywords" content="熱帯魚, 魚, 水槽, ECサイト, 通販, オンラインショップ">
  <title>Auarium | 会員登録</title>

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
          <h6 class="font-weight-bold text-center grey-text text-uppercase small mb-4">sign_up</h6>
          <h3 class="font-weight-bold text-center white-text pb-2">新規会員登録</h3>
          <hr class="w-header white my-4">

          <div class="container white my-5 py-5 z-depth-1 col-lg-8">

            <!--Section: Content-->
            <section class="px-md-5 mx-md-5 dark-grey-text">
                <?php if(isset($err)){ echo $err;} ?>
              <!--Grid row-->
              <div class="row d-flex justify-content-center">

                <!--Grid column-->
                <div class="w-75">

                  <!-- Default form register -->
                  <form action="./sign_up_confirm.php" method="POST">

                    <div class="form-row mb-3">
                      <div class="col">
                        <!-- 姓 -->
                        <small id="defaultRegisterFormPasswordHelpBlock" class="form-text text-muted pl-1 sign_up_label">姓<span class="badge badge-danger ml-1 ">必須</span></small>
                        <input type="text" name="last_name" id="defaultRegisterFormFirstName" class="form-control" placeholder="山田">
                      </div>
                      <div class="col">
                        <!-- 名 -->
                        <small id="defaultRegisterFormPasswordHelpBlock" class="form-text text-muted pl-1 sign_up_label">名<span class="badge badge-danger ml-1 ">必須</span></small>
                        <input type="text" name="first_name" id="defaultRegisterFormLastName" class="form-control" placeholder="太郎">
                      </div>
                    </div>

                    <!-- ユーザーネーム -->
                    <small id="defaultRegisterFormPasswordHelpBlock" class="form-text text-muted pl-1 sign_up_label">ユーザーネーム<span class="badge badge-danger ml-1 ">必須</span></small>
                    <input type="text" name="user_name" id="defaultRegisterFormUserName" class="form-control mb-3" placeholder="haltaro123">

                    <!-- パスワード -->
                    <small id="defaultRegisterFormPasswordHelpBlock" class="form-text text-muted pl-1 sign_up_label">パスワード（半角英数記号8文字以上）<span class="badge badge-danger ml-1 ">必須</span></small>
                    <input type="password" name="password" id="defaultRegisterFormPassword" class="form-control mb-3" placeholder="password">

                    <!-- E-mail -->
                    <small id="defaultRegisterFormPasswordHelpBlock" class="form-text text-muted pl-1 sign_up_label">メールアドレス<span class="badge badge-danger ml-1 ">必須</span></small>
                    <input type="email" name="mail_address" id="defaultRegisterFormEmail" class="form-control mb-3" placeholder="sample@sample.com">

                    <!-- 郵便番号 -->
                    <small id="defaultRegisterFormPasswordHelpBlock" class="form-text text-muted pl-1 sign_up_label">郵便番号<span class="badge badge-danger ml-1 ">必須</span></small>
                    <input type="text" name="postal_code" id="defaultRegisterPostalCode" class="form-control mb-3" placeholder="000-1234">

                    <!-- 住所 -->
                    <small id="defaultRegisterFormPasswordHelpBlock" class="form-text text-muted pl-1 sign_up_label">住所<span class="badge badge-danger ml-1 ">必須</span></small>
                    <input type="text" name="address" id="defaultRegisterAddres" class="form-control mb-3" placeholder="東京都新宿区西新宿〇〇〇-〇">

                    <!-- 電話番号 -->
                    <small id="defaultRegisterFormPasswordHelpBlock" class="form-text text-muted pl-1 sign_up_label">電話番号<span class="badge badge-danger ml-1 ">必須</span></small>
                    <input type="tel" name="phone_number" id="defaultRegisterPhoneNumber" class="form-control mb-3" placeholder="000-1111-2222">

                    <!-- 生年月日 -->
                    <small id="defaultRegisterFormPasswordHelpBlock" class="form-text text-muted pl-1 sign_up_label">生年月日<span class="badge badge-danger ml-1 ">必須</span></small>
                    <input type="text" name="birthday" id="defaultRegisterBirthday" class="form-control mb-3" placeholder="2020-01-11">

                    <div class="form-row mb-3">
                      <div class="col">
                        <!-- 第3者質問 -->
                        <small id="defaultRegisterFormPasswordHelpBlock" class="form-text text-muted pl-1 sign_up_label">第3者質問<span class="badge badge-danger ml-1 ">必須</span></small>
                        <select class="browser-default custom-select mb-3" name="question">
                          <option value="" selected="">選択ください</option>
                          <option value="母の旧姓">母の旧姓</option>
                          <option value="好きな食べ物">好きな食べ物</option>
                          <option value="自分の母校">自分の母校</option>
                        </select>
                      </div>
                      <div class="col">
                        <!-- 答え -->
                        <small id="defaultRegisterFormPasswordHelpBlock" class="form-text text-muted pl-1 sign_up_label">答え<span class="badge badge-danger ml-1 ">必須</span></small>
                        <input type="text" name="answer" id="defaultRegisterFormLastName" class="form-control" placeholder="清水">
                      </div>
                    </div>

                    <!-- Sign up button -->
                    <button class="btn btn-primary my-4 btn-block" type="submit">確認画面へ</button>

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