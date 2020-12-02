<!DOCTYPE html>
<html lang="ja">


<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="熱帯魚の通販サイトです。">
  <meta name="keywords" content="熱帯魚, 魚, 水槽, ECサイト, 通販, オンラインショップ">
  <title>Auarium | 水槽作成</title>

  <link rel="shortcut icon" href="images/favicon.ico">
  <link type="text/css" rel="stylesheet" href="css/base.css">
  <link type="text/css" rel="stylesheet" href="css/aquarium_create.css">
</head>


<body>
  <div class="wrapper">
    <?php include_once('./header.html'); ?>


    <!-- メインコンテンツ -->
    <div class="contents">
      <h2>水槽作成</h2>
      <form action="aquarium_1.php" method="post">
        <p>水槽を選択してください</p>
        <input type="image" src="images/.png" alt="Sサイズ水槽">
        <input type="image" src="images/.png" alt="Mサイズ水槽">
        <input type="image" src="images/.png" alt="Lサイズ水槽">
        <input type="submit" name="create" value="作成">
      </form>
    </div>


    <?php include_once('./footer.html'); ?>
  </div>
</body>

</html>