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
      <h2>退会確認</h2>
      <p>退会されると全てのアカウント情報が削除されます。</p>
      <form action="withdrawal_done.php" method="post">
        <p>会員ID（メールアドレス）<input type="text" name="id" value=""></p>
        <p>パスワード<input type="text" name="pass" value=""></p>
        <input type="submit" name="withdrawal" value="退会">
      </form>
    </div>


    <?php include_once('./footer.html'); ?>
  </div>

  <?php include_once('./script.html'); ?>
</body>

</html>