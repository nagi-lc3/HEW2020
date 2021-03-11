<?php
session_start();
$msg = '';
if (!empty($_GET['msg'])) {
  $msg = $_GET['msg'];
}
?>
<!DOCTYPE html>
<html lang="ja">


<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="熱帯魚の通販サイトです。">
  <meta name="keywords" content="熱帯魚, 魚, 水槽, ECサイト, 通販, オンラインショップ">
  <title>Auarium | index</title>

  <?php include_once('./link.html'); ?>
</head>


<body>
  <div class="wrapper">
    <?php include_once('./header.html'); ?>


    <!-- メインコンテンツ -->
    <?php if (!empty($msg)) {
      echo '<div class="row justify-content-center my-2"><ul class="messages pl-0 w-50 mb-0" style="list-style: none;"><li class="alert alert-primary mb-0">' . $msg . '</li></ul></div>'; // ログイン/ログアウトしました</li>
    } ?>

    <!-- Main navigation -->
    <header>
      <!-- Intro -->
      <section class="view">

        <div class="row">

          <img class="mainvisual" src="images/main01.png">

        </div>

      </section>
      <!-- Intro -->

    </header>
    <!-- Main navigation -->


    <?php include_once('./footer.html'); ?>
  </div>

  <?php include_once('./script.html'); ?>
</body>

</html>