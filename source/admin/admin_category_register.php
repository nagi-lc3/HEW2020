<!DOCTYPE html>
<html lang="ja">


<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Aquarium | カテゴリ登録</title>

  <link rel="shortcut icon" href="images/favicon.ico">
  <link type="text/css" rel="stylesheet" href="../css/admin/admin_base.css">
  <link type="text/css" rel="stylesheet" href="../css/admin/admin_category_register.css">
</head>


<body>
  <div class="wrapper">
    <?php include_once('./admin_base.html'); ?>


    <!-- メインコンテンツ -->
    <div class="contents">
      <h2>カテゴリ登録</h2>
      <form action="admin_category.php" method="post">
        <input type="submit" name="register" value="登録">
      </form>
    </div>

  </div>
</body>

</html>