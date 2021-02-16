<?php
session_start();
if (!empty($_POST)) {
  require('./db_connect.php');
  $user_id = $_SESSION['user_id'];

  // 現在のパスワードに入力された値が正しいかチェック
  $sql = "SELECT * FROM users WHERE user_id = :user_id";
  $stmt = $pdo->prepare($sql);
  $stmt->bindValue(':user_id', $user_id);
  $stmt->execute();
  $member = $stmt->fetch();
  //指定したハッシュがパスワードにマッチしているかチェック
  if (!password_verify($_POST['now_password'], $member['password'])) {
    $err_msg[] =  "現在のパスワードに入力された値が間違っています" . "\n";
  }

  // パスワードチェック
  if (mb_strlen($_POST["new_password"]) <= 8) {
    // 8文字以下
    $err_msg[] =  "パスワードは8文字以上で入力してください" . "\n";
  } else if (mb_strlen($_POST["new_password"]) >= 20) {
    // 20字以上
    $err_msg[] =  "パスワードは20文字以内で入力してください" . "\n";
  }

  if (!preg_match('/\A(?=.*?[a-z])(?=.*?\d)(?=.*?[!-\/:-@[-`{-~])[!-~]+\z/i', $_POST["new_password"])) {
    // 半角英数記号ではない
    $err_msg[] =  "パスワードは半角英数字及び記号で入力してください" . "\n";
  }

  if ($_POST["new_password"] != $_POST["password2"]) {
    $err_msg[] =  "一つ目のパスワードと二つ目のパスワードが一致していません" . "\n";
  }

  // 登録
  if (empty($err_msg)) {
    $password = password_hash($_POST['new_password'], PASSWORD_DEFAULT);
    try {
      $update_sql = "UPDATE users SET password = :password WHERE user_id = :user_id";
      $update_stmt = $pdo->prepare($update_sql);
      $update_stmt->bindValue(':user_id', $user_id);
      $update_stmt->bindValue(':password', $password);
      $update_stmt->execute();

      // header('Location: http://localhost/PHP/HEW2020_2/HEW2020/source/my_page.php');
      header('Location: ./my_page.php');
    } catch (PDOException $e) {
      echo $e;
    }
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
  <title>Auarium | パスワード</title>

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
          <h6 class="font-weight-bold text-center grey-text text-uppercase small mb-4">change_password</h6>
          <h3 class="font-weight-bold text-center white-text pb-2">パスワード変更</h3>
          <hr class="w-header white my-4">

          <div class="container white my-5 py-5 z-depth-1 col-lg-6">

            <!--Section: Content-->
            <section class="px-md-5 mx-md-5 dark-grey-text">

              <!--Grid row-->
              <div class="row d-flex justify-content-center">

                <!--Grid column-->
                <div class="">

                  <!-- Default form register -->
                  <form action="" method="post">
                    <!-- エラーメッセージがある場合は表示 -->
                    <?php if (!empty($err_msg)) : ?>
                      <?php echo '<ul>'; ?>
                      <?php
                      foreach ((array)$err_msg as $error) {
                        echo '<li>' . $error . '</li>';
                      }
                      ?>
                      <?php echo '</ul>'; ?>
                    <?php endif ?>

                    <!-- 現在のパスワード -->
                    <small id="defaultRegisterFormPasswordHelpBlock" class="form-text text-muted pl-1 sign_up_label">現在のパスワード</small>
                    <input type="password" name="now_password" id="defaultRegisterFormUserName" class="form-control mb-3" placeholder="">

                    <!-- 新しいパスワード -->
                    <small id="defaultRegisterFormPasswordHelpBlock" class="form-text text-muted pl-1 sign_up_label">新しいパスワード</small>
                    <input type="password" name="new_password" id="defaultRegisterFormPassword" class="form-control mb-3" placeholder="">

                    <!-- 新しいパスワード（2回目） -->
                    <small id="defaultRegisterFormPasswordHelpBlock" class="form-text text-muted pl-1 sign_up_label">新しいパスワード（2回目）</small>
                    <input type="password" name="password2" id="defaultRegisterFormPassword" class="form-control mb-3" placeholder="">

                    <!-- Sign up button -->
                    <button class="btn btn-primary my-4 btn-block" type="submit">保存</button>

                  </form>
                  <!-- Default form register -->
                </div>
                <!--Grid column-->
              </div>
              <!--Grid row-->
          </div>
          <!--Section-->
        </section>
      </div>
    </div>


    <?php include_once('./footer.html'); ?>
  </div>

  <?php include_once('./script.html'); ?>
</body>

</html>