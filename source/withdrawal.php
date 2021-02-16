<?php session_start(); ?>

<!DOCTYPE html>
<html lang="ja">


<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="熱帯魚の通販サイトです。">
  <meta name="keywords" content="熱帯魚, 魚, 水槽, ECサイト, 通販, オンラインショップ">
  <title>Auarium | 退会</title>

  <?php include_once('./link.html'); ?>
</head>


<body>
  <div class="wrapper">
    <?php include_once('./header.html'); ?>



    <!-- メインコンテンツ -->
    <div class="container my-5">
      <!--Section: Content-->
      <section>

        <h6 class="font-weight-normal text-uppercase font-small grey-text mb-4 text-center">withdrawal</h6>
        <!-- Section heading -->
        <h3 class="font-weight-bold white-text mb-4 pb-2 text-center">退会</h3>
        <hr class="w-header white">
        <!-- Section description -->
        <h4 class="lead text-danger mx-auto mt-4 pt-2 mb-5 text-center">本当に退会しますか？</h4>
        <p class="lead text-danger mx-auto mt-4 pt-2 mb-5 text-center">今までの購入履歴やアカウント情報、マイ水槽など全て削除され、利用できなくなります。</p>

        <p class="text-center"><a class="btn btn-primary btn-rounded waves-effect waves-light" href="withdrawal_confirm.php">次へ</a></p>

      </section>
    </div>


    <?php include_once('./footer.html'); ?>
  </div>

  <?php include_once('./script.html'); ?>
</body>

</html>