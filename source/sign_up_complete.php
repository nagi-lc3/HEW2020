<?php session_start(); ?>

<!DOCTYPE html>
<html lang="ja">


<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="熱帯魚の通販サイトです。">
  <meta name="keywords" content="熱帯魚, 魚, 水槽, ECサイト, 通販, オンラインショップ">
  <title>Auarium | 会員登録完了</title>

  <?php include_once('./link.html'); ?>
</head>


<body>
  <div class="wrapper">
    <?php include_once('./header.html'); ?>


    <!-- メインコンテンツ -->
    <div class="contents">
      <!-- <h2>会員登録完了</h2> -->
      <h2>
        <?php
        // 受け取ったメッセージを表示
        echo $_GET['msg'];

        if ($_GET['flg']) {
          // 登録に成功した場合
          // header('Location: http://localhost/PHP/HEW2020_2/HEW2020/source/my_page.php');
          header('Location: ./my_page.php');
          exit;
        } else {
          // 失敗した場合
          // $path = 'http://localhost/PHP/HEW2020_2/HEW2020/source/sign_up.php';
          $path = './sign_up.php';
        }

        ?>
      </h2>
      <!-- <p><a href="index.php">TOPへ戻る</a></p> -->
      <p>
        <?php echo '<a href="' . $path . '">こちらから登録し直してください </a>'; ?>
      </p>
    </div>


    <?php include_once('./footer.html'); ?>
  </div>

  <?php include_once('./script.html'); ?>
</body>

</html>