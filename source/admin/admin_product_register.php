<!DOCTYPE html>
<html lang="ja">


<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Aquarium | 管理者メニュー</title>

  <link rel="shortcut icon" href="images/favicon.ico">
  <link type="text/css" rel="stylesheet" href="../css/admin/admin_base.css">
  <link type="text/css" rel="stylesheet" href="../css/admin/admin_product_register.css">
</head>


<body>
  <div class="wrapper">
    <?php include_once('./admin_base.html'); ?>


    <!-- メインコンテンツ -->
    <div class="contents">
      <h2>商品登録</h2>
      <form action="admin_product.php" method="post">
        <input type="submit" name="register" value="登録">
      </form>
    </div>

  </div>
</body>

</html>