<!DOCTYPE html>
<html lang="ja">


<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="熱帯魚の通販サイトです。">
  <meta name="keywords" content="熱帯魚, 魚, 水槽, ECサイト, 通販, オンラインショップ">
  <title>Auarium | カート</title>

  <link rel="shortcut icon" href="images/favicon.ico">
  <link type="text/css" rel="stylesheet" href="css/base.css">
  <link type="text/css" rel="stylesheet" href="css/cart.css">
</head>


<body>
  <div class="wrapper">
    <?php include_once('./header.html'); ?>


    <!-- メインコンテンツ -->
    <div class="contents">
      <h2>カート</h2>
      <form action="order.php" method="post">
        <input type="submit" name="" value="レジに進む">
      </form>
      <form action="" method="post">
        <input type="submit" name="" value="削除する">
      </form>
    </div>


    <?php include_once('./footer.html'); ?>
  </div>
</body>

</html>