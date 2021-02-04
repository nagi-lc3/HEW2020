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
      <h2>お問い合わせ</h2>
      <form action="inquiry_confirm.php" method="post">
        <!-- <p>件名<input type="text"></p>
        <p>メールアドレス<input type="text"></p>
        <p>カテゴリ<input type="text"></p>
        <p>お問い合わせ内容<input type="text"></p>
         -->
        <p>件名<input type="text" name="title"></p>
        <p>メールアドレス<input type="email" name="mail_address"></p>
        <p>カテゴリ</p>
        <select name="category" id="">
          <option value="1" selected>category1</option>
          <option value="2">category2</option>
          <option value="3">category3</option>
        </select>
        <p>お問い合わせ内容<input type="text" name="content"></p>
        <input type="submit" name="" value="確認画面へ">
      </form>
    </div>


    <?php include_once('./footer.html'); ?>
  </div>

  <?php include_once('./script.html'); ?>
</body>

</html>