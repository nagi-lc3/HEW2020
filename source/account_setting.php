<!DOCTYPE html>
<html lang="ja">


<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="熱帯魚の通販サイトです。">
  <meta name="keywords" content="熱帯魚, 魚, 水槽, ECサイト, 通販, オンラインショップ">
  <title>Auarium | 基本情報</title>

  <?php include_once('./link.html'); ?>
</head>


<body>
  <div class="wrapper">
    <?php include_once('./header.html'); ?>


    <!-- メインコンテンツ -->
    <div class="contents">
      <h2>アカウント情報</h2>
      <p>アカウント名</p>
      <p>名前</p>
      <p>住所</p>
      <p>電話番号</p>
      <p>メールアドレス</p>
      <form action="account_setting_edit.php" method="post">
        <input type="submit" name="" value="編集する">
      </form>
    </div>


    <?php include_once('./footer.html'); ?>
  </div>

  <?php include_once('./script.html'); ?>
</body>

</html>