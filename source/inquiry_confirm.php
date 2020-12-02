<!DOCTYPE html>
<html lang="ja">


<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="熱帯魚の通販サイトです。">
  <meta name="keywords" content="熱帯魚, 魚, 水槽, ECサイト, 通販, オンラインショップ">
  <title>Auarium | お問い合わせ確認</title>

  <link rel="shortcut icon" href="images/favicon.ico">
  <link type="text/css" rel="stylesheet" href="css/base.css">
  <link type="text/css" rel="stylesheet" href="css/inquiry_confirm.css">
</head>


<body>
  <div class="wrapper">
    <?php include_once('./header.html'); ?>


    <!-- メインコンテンツ -->
    <div class="contents">
      <h2>お問い合わせ確認</h2>
      <p>件名</p>
      <p>メールアドレス</p>
      <p>カテゴリ</p>
      <p>お問い合わせ内容</p>
      <form action="inquiry_complete.php" method="post">
        <input type="submit" name="" value="送信">
      </form>
    </div>


    <?php include_once('./footer.html'); ?>
  </div>
</body>

</html>