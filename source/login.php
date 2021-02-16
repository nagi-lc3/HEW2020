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
    // $link = '<a href=' . $path_to_index . '>トップページへ</a>';
    header('Location:' . $path_to_index . '?msg=' . $msg);
    exit;
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
      <div class="container my-5">

        <!-- Section -->
        <section>
          <!-- タイトル -->
          <h6 class="font-weight-bold text-center grey-text text-uppercase small mb-4">login</h6>
          <h3 class="font-weight-bold text-center white-text pb-2">ログイン</h3>
          <hr class="w-header white my-4">


          <!-- Main navigation -->
          <div class="container-fluid mt-3 mb-5">

            <!-- Full Page Intro -->
            <section>
              <!-- Mask & flexbox options-->
              <div class="mask d-flex justify-content-center align-items-center">
                <!-- Content -->
                <div class="container">

                  <!--Grid row-->
                  <div class="row d-flex align-items-center justify-content-center">
                    <!--Grid column-->
                    <div class="col-md-6 col-xl-5">


                      <!--Form-->
                      <?php if ($flg == 0) : ?>
                        <div class="card">
                          <div class="card-body z-depth-2 px-4">
                            <form action="login.php" method="post">
                              <div class="md-form">
                                <i class="fa fa-envelope prefix grey-text"></i>
                                <input type="email" id="form2" name="id" value="" class="form-control">
                                <label for="form2">メールアドレス</label>
                              </div>
                              <div class="md-form">
                                <i class="fas fa-key prefix grey-text"></i>
                                <input type="password" id="form4" name="pass" value="" class="form-control">
                                <label for="form4">パスワード</label>
                              </div>
                              <div class="md-form">
                                <p><a href="#">パスワードを忘れましたか？</a></p>
                              </div>
                              <div class="text-center my-3">
                                <button class="btn btn-primary btn-block">ログイン</button>
                              </div>
                            </form>
                            <div class="text-center my-3">
                              <a href="sign_up.php"><button class="btn btn-primary btn-block">新規会員登録</button></a>
                            </div>
                          </div>
                        </div>
                      <?php elseif ($flg == 1) : ?>
                        <h2><?php echo $msg; ?>
                        </h2>
                        <p><?php echo $link; ?>
                        </p>
                      <?php endif; ?>
                      <!--/.Form-->


                    </div>
                    <!--Grid column-->
                  </div>
                  <!--Grid row-->
                </div>
                <!-- Content -->
              </div>
              <!-- Mask & flexbox options-->
            </section>
            <!-- Full Page Intro -->

          </div>
          <!-- Main navigation -->

        </section>
      </div>
    </div>


    <?php include_once('./footer.html'); ?>
  </div>

  <?php include_once('./script.html'); ?>
</body>

</html>