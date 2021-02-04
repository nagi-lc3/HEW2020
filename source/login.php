<?php
session_start();
$flg = 0;
$path_to_login = './login.php';
$path_to_index = './index.php';

if (!empty($_SESSION['user_name'])) {
  $flg = 1;
  $msg = 'すでにログインしています。';
  $link = '<a href=' . $path_to_index . '>トップページへ</a>';
}
if (!empty($_POST)) {
  $flg = 1;
  require_once('./db_connect.php');
  $mail_address = $_POST['id'];

  $sql = "SELECT * FROM users WHERE mail_address = :mail_address";
  $stmt = $pdo->prepare($sql);
  $stmt->bindValue(':mail_address', $mail_address);
  $stmt->execute();
  $member = $stmt->fetch();

  // 削除日が設定されている場合
  if (!empty($member["user_deleted_at"])) {
    $msg = 'このユーザーはすでに退会済みです。';
    $link = '<a href=' . $path_to_login . '>やり直す</a>';
  } else if ($member &&  password_verify($_POST['pass'], $member['password'])) {
    //指定したハッシュがパスワードにマッチしているかチェック
    //DBのユーザー情報をセッションに保存
    $_SESSION['user_id'] = $member['user_id'];
    $_SESSION['user_name'] = $member['user_name'];
    $msg = 'ログインしました。';
    $link = '<a href=' . $path_to_index . '>トップページへ</a>';
  } else {
    $msg = 'メールアドレスもしくはパスワードが間違っています。';
    $link = '<a href=' . $path_to_login . '>やり直す</a>';
  }
}
?>

<!DOCTYPE html>
<html lang="ja">


<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="熱帯魚の通販サイトです。">
  <meta name="keywords" content="熱帯魚, 魚, 水槽, ECサイト, 通販, オンラインショップ">
  <title>Auarium | ログイン</title>

  <?php include_once('./link.html'); ?>
</head>


<body>
  <div class="wrapper">
    <?php include_once('./header.html'); ?>


    <!-- メインコンテンツ -->
    <div class="contents">
      <h2>ログイン</h2>
      <?php if ($flg == 0) : ?>
        <form action="login.php" method="post">
          <p>会員ID（メールアドレス）<input type="email" name="id" value=""></p>
          <p>パスワード<input type="password" name="pass" value=""></p>
          <input type="submit" name="login" value="ログイン">
        </form>

        <p>会員登録をしていない方はこちら</p>
        <form action="sign_up.php" method="post">
          <input type="submit" value="新規会員登録">
        </form>
      <?php elseif ($flg == 1) : ?>
        <h2><?php echo $msg; ?>
        </h2>
        <p><?php echo $link; ?>
        </p>
      <?php endif; ?>
    </div>


    <?php include_once('./footer.html'); ?>
  </div>

  <?php include_once('./script.html'); ?>
</body>

</html>