<?php

require "./validation.php";

$errors = validation($_POST);
// $path_to_sign_up = 'http://localhost/PHP/HEW2020_2/HEW2020/source/sign_up.php';
$path_to_sign_up = './sign_up.php';
function h($value)
{
  return htmlspecialchars($value);
}
?>

<!DOCTYPE html>
<html lang="ja">


<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="熱帯魚の通販サイトです。">
  <meta name="keywords" content="熱帯魚, 魚, 水槽, ECサイト, 通販, オンラインショップ">
  <title>Auarium | 会員登録確認</title>

  <?php include_once('./link.html'); ?>
</head>


<body>
  <div class="wrapper">
    <?php include_once('./header.html'); ?>


    <!-- メインコンテンツ -->
    <div class="contents">
      <h2>会員登録確認</h2>
      <!-- <p>アカウント名</p>
      <p>名前</p>
      <p>住所</p>
      <p>電話番号</p>
      <p>メールアドレス</p>
      <form action="sign_up_complete.php" method="post">
        <input type="submit" name="" value="登録">
      </form> -->

      <!-- エラーメッセージがある場合は表示 -->
      <?php if (!empty($errors)) : ?>
        <?php echo '<ul>'; ?>
        <?php
        foreach ((array)$errors as $error) {
          echo '<li>' . $error . '</li>';
        }

        // 入力やり直し
        $link = '<a href=' . $path_to_sign_up . '>もどる</a>';
        ?>
        <?php echo '</ul>'; ?>
      <?php else :
        $link = '<input type="submit" value="登録">';
      endif; ?>

      <form action="./insert.php" method="POST">
        姓
        <input type="text" name="last_name" value="<?php echo h($_POST["last_name"]); ?>">
        名
        <input type="text" name="first_name" value="<?php echo h($_POST["first_name"]); ?>"><br>
        ユーザネーム
        <input type="text" name="user_name" value="<?php echo h($_POST["user_name"]); ?>"><br>
        パスワード
        <input type="password" name="password" value="<?php echo h($_POST["password"]); ?>"><br>
        メールアドレス
        <input type="mail_address" name="mail_address" value="<?php echo h($_POST["mail_address"]); ?>"><br>
        郵便番号
        <input type="email" name="postal_code" value="<?php echo h($_POST["postal_code"]); ?>"><br>
        住所
        <input type="text" name="address" value="<?php echo h($_POST["address"]); ?>"><br>
        電話番号
        <input type="tel" name="phone_number" value="<?php echo h($_POST["phone_number"]); ?>"><br>
        生年月日
        <input type="text" name="birthday" value="<?php echo h($_POST["birthday"]); ?>"><br>

        第三者質問と答え
        <select name="question"><br>
          <option value="1" <?php if ($_POST["question"] == "1") {
                              echo "selected";
                            } ?>>1、母の旧姓</option>
          <option value="2" <?php if ($_POST["question"] == "2") {
                              echo "selected";
                            } ?>>2、好きな食べ物</option>
          <option value="3" <?php if ($_POST["question"] == "3") {
                              echo "selected";
                            } ?>>3、自分の母校</option>
        </select>
        <input type="text" name="answer" value="<?php echo h($_POST["answer"]); ?>"><br>

        <!-- 入力ミスがある場合もどる / ない場合登録ボタン  -->
        <?php echo $link; ?>
      </form>
    </div>


    <?php include_once('./footer.html'); ?>
  </div>

  <?php include_once('./script.html'); ?>
</body>

</html>