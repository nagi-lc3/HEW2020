<!DOCTYPE html>
<html lang="ja">


<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="熱帯魚の通販サイトです。">
  <meta name="keywords" content="熱帯魚, 魚, 水槽, ECサイト, 通販, オンラインショップ">
  <title>Auarium | マイページ</title>

  <?php include_once('./link.html'); ?>
</head>


<body>
  <div class="wrapper">
    <?php include_once('./header.html'); ?>


    <!-- メインコンテンツ -->
    <div class="contents">
      <h2>マイページ</h2>
      <p>aaaaaaaaさん</p>
      <h3 class="first">商品情報</h3>
      <p class="#"><a href="order_history.php">注文履歴</a></p>
      <p class="#"><a href="wish_list.php">欲しいものリスト</a></p>
      <p class="#"><a href="aquarium_menu.php">水槽</a></p>
      <h3>アカウント情報</h3>
      <p class="#"><a href="account_setting.php">基本情報</a></p>
      <p class="#"><a href="account_payment.php">お支払方法</a></p>
      <p class="#"><a href="account_password_edit.php">パスワード変更</a></p>
      <h3>その他</h3>
      <p class="#"><a href="help.php">ヘルプ</a></p>
      <p class="#"><a href="index.php">ログアウト</a></p>
      <p class="#"><a href="withdrawal.php">退会</a></p>
      <p class="#"><a href="login.php">ログイン（後で削除）</a></p>
    </div>


    <?php include_once('./footer.html'); ?>
  </div>

  <?php include_once('./script.html'); ?>
</body>

</html>