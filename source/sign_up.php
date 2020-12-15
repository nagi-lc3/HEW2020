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
      <h2>会員登録</h2>
      <p>アカウント名<input type="text"></p>
      <p>名前<input type="text"></p>
      <p>住所<input type="text"></p>
      <p>電話番号<input type="text"></p>
      <p>メールアドレス<input type="mail"></p>
      <form action="sign_up_confirm.php" method="post">
        <input type="submit" name="" value="確認画面へ">
      </form>
    </div>


    <?php include_once('./footer.html'); ?>
  </div>

  <?php include_once('./script.html'); ?>
</body>

</html>