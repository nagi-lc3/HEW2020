<!DOCTYPE html>
<html lang="ja">


<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="熱帯魚の通販サイトです。">
  <meta name="keywords" content="熱帯魚, 魚, 水槽, ECサイト, 通販, オンラインショップ">
  <title>Auarium | パスワード</title>

  <link rel="shortcut icon" href="images/favicon.ico">
  <link type="text/css" rel="stylesheet" href="css/base.css">
  <link type="text/css" rel="stylesheet" href="css/account_password.css">
</head>


<body>
  <div class="wrapper">
    <?php include_once('./header.html'); ?>


    <!-- メインコンテンツ -->
    <div class="contents">
      <h2>アカウント情報</h2>
      <form action="account_setting.php" method="post">
        <p>現在のパスワード<input type="text"></p>
        <p>新しいパスワード<input type="text"></p>
        <p>新しいパスワード（2回目）<input type="text"></p>
        <input type="submit" name="" value="保存">
      </form>
      <form action="account_setting.php" method="post">
        <input type="submit" name="" value="戻る">
      </form>
    </div>


    <?php include_once('./footer.html'); ?>
  </div>
</body>

</html>