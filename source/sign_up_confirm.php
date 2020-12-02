<!DOCTYPE html>
<html lang="ja">


<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="熱帯魚の通販サイトです。">
  <meta name="keywords" content="熱帯魚, 魚, 水槽, ECサイト, 通販, オンラインショップ">
  <title>Auarium | 会員登録確認</title>

  <link rel="shortcut icon" href="images/favicon.ico">
  <link type="text/css" rel="stylesheet" href="css/base.css">
  <link type="text/css" rel="stylesheet" href="css/sign_up_confirm.css">
</head>


<body>
  <div class="wrapper">
    <?php include_once('./header.html'); ?>


    <!-- メインコンテンツ -->
    <div class="contents">
      <h2>会員登録確認</h2>
      <p>アカウント名</p>
      <p>名前</p>
      <p>住所</p>
      <p>電話番号</p>
      <p>メールアドレス</p>
      <form action="sign_up_complete.php" method="post">
        <input type="submit" name="" value="登録">
      </form>
    </div>


    <?php include_once('./footer.html'); ?>
  </div>
</body>

</html>