<?php session_start(); ?>

<!DOCTYPE html>
<html lang="ja">


<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="熱帯魚の通販サイトです。">
  <meta name="keywords" content="熱帯魚, 魚, 水槽, ECサイト, 通販, オンラインショップ">
  <title>Auarium | お問い合わせ</title>

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
          <h6 class="font-weight-bold text-center grey-text text-uppercase small mb-4">inquiry</h6>
          <h3 class="font-weight-bold text-center white-text pb-2">お問い合わせ</h3>
          <hr class="w-header my-4 white">

          <div class="container white my-5 py-5 z-depth-1">

            <!--Section: Content-->
            <section class="px-md-5 mx-md-5 dark-grey-text">

              <!--Grid row-->
              <div class="row d-flex justify-content-center">

                <!--Grid column-->
                <div class="w-75">

                  <!-- Default form register -->
                  <form action="inquiry_confirm.php" method="post">

                    <!-- 件名 -->
                    <small id="defaultRegisterFormPasswordHelpBlock" class="form-text text-muted pl-1 sign_up_label">件名<span class="badge badge-danger ml-1">必須</span></small>
                    <input type="text" name="title" id="" class="form-control mb-3" placeholder="">

                    <!-- E-mail -->
                    <small id="defaultRegisterFormPasswordHelpBlock" class="form-text text-muted pl-1 sign_up_label">メールアドレス<span class="badge badge-danger ml-1">必須</span></small>
                    <input type="email" name="mail_address" id="" class="form-control mb-3" placeholder="sample@sample.com">

                    <!-- カテゴリ -->
                    <small id="defaultRegisterFormPasswordHelpBlock" class="form-text text-muted pl-1 sign_up_label">カテゴリ<span class="badge badge-danger ml-1">必須</span></small>
                    <select class="browser-default custom-select mb-3" name="category" id="">
                      <option value="" selected="">選択ください</option>
                      <option value="カテゴリ1">カテゴリ1</option>
                      <option value="カテゴリ2">カテゴリ2</option>
                      <option value="カテゴリ3">カテゴリ3</option>
                    </select>

                    <!-- お問い合わせ内容 -->
                    <small id="defaultRegisterFormPasswordHelpBlock" class="form-text text-muted pl-1 sign_up_label">お問い合わせ内容<span class="badge badge-danger ml-1 ">必須</span></small>
                    <textarea class="form-control mb-3 w-100" name="content" rows="20" placeholder=""></textarea>

                    <!-- 確認画面へ -->
                    <div class="row justify-content-center mb-0">
                      <button class="btn btn-primary mt-5 btn-block w-50" type="submit">確認画面へ</button>
                    </div>

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