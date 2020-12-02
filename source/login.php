<!DOCTYPE html>
<html lang="ja">


<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="熱帯魚の通販サイトです。">
  <meta name="keywords" content="熱帯魚, 魚, 水槽, ECサイト, 通販, オンラインショップ">
  <title>Auarium | ログイン</title>

  <link rel="shortcut icon" href="images/favicon.ico">
  <link type="text/css" rel="stylesheet" href="css/base.css">
  <link type="text/css" rel="stylesheet" href="css/login.css">
</head>


<body>
  <div class="wrapper">
    <?php include_once('./header.html'); ?>


    <!-- メインコンテンツ -->
    <div class="contents">
      <h2>ログイン</h2>
      <form action="my_page.php" method="post">
        <p>会員ID（メールアドレス）<input type="text" name="id" value=""></p>
        <p>パスワード<input type="text" name="pass" value=""></p>
        <input type="submit" name="login" value="ログイン">
      </form>

      <p>会員登録をしていない方はこちら</p>
      <form action="sign_up.php" method="post">
        <input type="submit" value="新規会員登録">
      </form>
    </div>


    <?php include_once('./footer.html'); ?>
  </div>
</body>

</html>