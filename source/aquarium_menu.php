<!DOCTYPE html>
<html lang="ja">


<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="熱帯魚の通販サイトです。">
  <meta name="keywords" content="熱帯魚, 魚, 水槽, ECサイト, 通販, オンラインショップ">
  <title>Auarium | 水槽</title>

  <?php include_once('./link.html'); ?>
</head>


<body>
  <div class="wrapper">
    <?php include_once('./header.html'); ?>


    <!-- メインコンテンツ -->
    <div class="contents">
      <div class="container my-5">

        <!-- Section -->
        <section>
          <!-- タイトル -->
          <h6 class="font-weight-bold text-center grey-text text-uppercase small mb-4">aquarium</h6>
          <h3 class="font-weight-bold text-center dark-grey-text pb-2">水槽一覧</h3>
          <hr class="w-header my-4">

          <p><a href="aquarium_1.php">水槽1</a></p>
          <p><a href="#">水槽2</a></p>
          <p><a href="#">水槽3</a></p>
          <form action="aquarium_create.php" method="post">
            <input type="submit" name="" value="水槽を作成する">
          </form>
          <p><a href="help.php">水槽とは？</a></p>

        </section>
      </div>

    </div>


    <?php include_once('./footer.html'); ?>
  </div>

  <?php include_once('./script.html'); ?>
</body>

</html>