<!DOCTYPE html>
<html lang="ja">


<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="熱帯魚の通販サイトです。">
  <meta name="keywords" content="熱帯魚, 魚, 水槽, ECサイト, 通販, オンラインショップ">
  <title>Auarium | 注文</title>

  <link rel="shortcut icon" href="images/favicon.ico">
  <link type="text/css" rel="stylesheet" href="css/base.css">
  <link type="text/css" rel="stylesheet" href="css/order.css">
</head>


<body>
  <div class="wrapper">
    <?php include_once('./header.html'); ?>


    <!-- メインコンテンツ -->
    <div class="contents">
      <h2>注文</h2>
      <form action="order_complete.php" method="post">
        <input type="submit" name="" value="注文を確定する">
      </form>
    </div>


    <?php include_once('./footer.html'); ?>
  </div>
</body>

</html>