<?php
session_start();
require_once('./db_connect.php');

function h($str)
{
  return htmlspecialchars($str);
}

$path_to_withdrawal_confirm = './withdrawal_confirm.php';
$path_to_top = './index.php';
$mail_address = h($_POST['id']);
$password = h($_POST['pass']);



$check_sql = "SELECT * FROM users WHERE mail_address = :mail_address";
try {
  $check_stmt = $pdo->prepare($check_sql);
  $check_stmt->bindValue(':mail_address', $mail_address);
  $check_stmt->execute();
  $member = $check_stmt->fetch();
} catch (PDOException $e) {
  echo $e;
  exit;
}

// 入力されたメールアドレスがDBに存在するかチェック
if ($member) {
  // セッションのユーザーIDと打ち込まれたメアドのユーザーのIDが同じかチェック
  if ($_SESSION['user_id'] != $member['user_id']) {
    $msg = '入力されたメールアドレスは、このユーザに登録されたものではありません。';
    $link = '<a href=' . $path_to_withdrawal_confirm . '>やり直す</a>';
  } else if (password_verify($password, $member['password'])) {
    //指定したハッシュがパスワードにマッチしているかチェック
    date_default_timezone_set('Asia/Tokyo');
    $delete_date = date("Y-m-d");
    $sql = "UPDATE users SET user_deleted_at=:delete_date WHERE mail_address = :mail_address;";
    try {
      $stmt = $pdo->prepare($sql);
      $stmt->bindValue(':delete_date', $delete_date);
      $stmt->bindValue(':mail_address', $mail_address);
      $stmt->execute();
    } catch (PDOException $e) {
      echo $e;
      exit;
    }
    $msg = '退会手続きが完了しました。<br>またのご利用を心よりお待ちしております。';
    $link = '<a href=' . $path_to_top . '>TOPページに戻る</a>';
    $_SESSION = array(); //セッションの中身をすべて削除
    session_destroy(); //セッションを破壊
  } else {
    $msg = 'パスワードが間違っています。';
    $link = '<a href=' . $path_to_withdrawal_confirm . '>やり直す</a>';
  }
} else {
  $msg = '入力されたメールアドレスが間違っています。';
  $link = '<a href=' . $path_to_withdrawal_confirm . '>やり直す</a>';
}
?>

<!DOCTYPE html>
<html lang="ja">


<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="熱帯魚の通販サイトです。">
  <meta name="keywords" content="熱帯魚, 魚, 水槽, ECサイト, 通販, オンラインショップ">
  <title>Auarium | 退会完了</title>

  <?php include_once('./link.html'); ?>
</head>


<body>
  <div class="wrapper">
    <?php include_once('./header.html'); ?>


    <!-- メインコンテンツ -->
    <div class="contents">
      <!-- <h2>退会完了</h2>
      <p>退会手続きが完了しました。<br>またのご利用を心よりお待ちしております。</p> -->
      <p><?php echo $msg; ?></p>
      <p><?php echo $link; ?></p>
      <!-- <p><a href="index.php">TOPページに戻る</a></p> -->
    </div>


    <?php include_once('./footer.html'); ?>
  </div>

  <?php include_once('./script.html'); ?>
</body>

</html>