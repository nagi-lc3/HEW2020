<?php
session_start();

$msg = "";
// 簡易的なメール送信
if ($_SESSION['status_flg'] == 1 && !empty($_SESSION['user_name'])) {
  // 簡易的にメール送信
  mb_language("Japanese");
  mb_internal_encoding("UTF-8");
  // あて先 設定してください
  $to_admin =  "";
  // 送り主
  $name = $_SESSION['user_name'];
  // 件名
  $subject = $_POST['title'];
  // 内容
  $body = $_POST['content'];
  // 送り主
  $from = $_POST['mail_address'];
  $headers = "Content-Type: text/plain; charset=UTF-8 \n" .
    "From: " . $name . "<" . $from . "> \n" .
    "Sender: " . $from . " \n" .
    "Return-Path: " . $from . " \n" .
    "Reply-To: " . $from . " \n" .
    "Content-Transfer-Encoding: BASE64\n";

  if (mb_send_mail($to_admin, $subject, $body, $headers, "-f" . $from)) {
    require('./db_connect.php');
    try {
      $stmt = $pdo->prepare("INSERT INTO INQUIRIES VALUES(
        :inquiry_id,:inquiry_subject,:user_id,:inquiry_mail_address,:inquiry_category_id,:inquiry_content,:inquiry_status_id,:inquiry_datetime
        )");

      $null_value = null;
      $default = 1;
      // 日時を取得
      date_default_timezone_set('Asia/Tokyo');
      $inquiry_date = date("Y-m-d");

      $stmt->bindParam(':inquiry_id', $null_value);
      $stmt->bindParam(':inquiry_subject', $subject);
      $stmt->bindParam(':user_id', $_SESSION['user_id']);
      $stmt->bindParam(':inquiry_mail_address', $from);
      $stmt->bindParam(':inquiry_category_id', $_POST['category']);
      $stmt->bindParam(':inquiry_content', $body);
      $stmt->bindParam(':inquiry_status_id', $default);
      $stmt->bindParam(':inquiry_datetime', $inquiry_date);
      $stmt->execute();
    } catch (PDOException $e) {
      echo $e;
    }
    $msg = "お問い合わせ完了";
  } else {
    $msg = "メール送信失敗です";
  }

  $_SESSION['status_flg'] = 0;
}
?>

<!DOCTYPE html>
<html lang="ja">


<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="熱帯魚の通販サイトです。">
  <meta name="keywords" content="熱帯魚, 魚, 水槽, ECサイト, 通販, オンラインショップ">
  <title>Auarium | お問い合わせ完了</title>

  <?php include_once('./link.html'); ?>
</head>


<body>
  <div class="wrapper">
    <?php include_once('./header.html'); ?>


    <!-- メインコンテンツ -->
    <div class="contents">
      <!-- <h2>お問い合わせ完了</h2> -->
      <h2>
        <?php if (!empty($msg)) {
          echo $msg;
        } ?>
      </h2>
      <p><a href="index.php">TOPへ戻る</a></p>
    </div>


    <?php include_once('./footer.html'); ?>
  </div>

  <?php include_once('./script.html'); ?>
</body>

</html>