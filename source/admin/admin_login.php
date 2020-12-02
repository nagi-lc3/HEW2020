<!DOCTYPE html>
<html lang="ja">


<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Aquarium | 管理者ログイン</title>

  <link rel="shortcut icon" href="images/favicon.ico">
  <link type="text/css" rel="stylesheet" href="../css/admin/admin_login.css">
</head>


<body>
  <div class="wrapper">

    <!-- メインコンテンツ -->
    <div class="contents">
      <h2>管理者ログイン</h2>
      <h2>ログイン</h2>
      <form action="admin_menu.php" method="post">
        <p>ユーザ名<input type="text" name="id" value=""></p>
        <p>パスワード<input type="text" name="pass" value=""></p>
        <input type="submit" name="login" value="ログイン">
      </form>
    </div>

  </div>
</body>

</html>