<?php
require "./validation.php";
require "./db_connect.php";

$errors = validation($_POST);
// $path_to_sign_up = 'http://localhost/PHP/HEW2020_2/HEW2020/source/sign_up.php';
$path_to_sign_up = './sign_up.php';
function h($value)
{
  return htmlspecialchars($value);
}

$stmt = $pdo->prepare("SELECT question_id FROM questions WHERE question = :question");
$stmt->bindParam(':question', $_POST['question']);
$stmt->execute();
$question_id = $stmt->fetchAll();
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

      <div class="container my-5">

        <!-- Section -->
        <section>
          <!-- タイトル -->
          <h6 class="font-weight-bold text-center grey-text text-uppercase small mb-4">sign_up_confirm</h6>
          <h3 class="font-weight-bold text-center white-text pb-2">会員登録確認</h3>
          <hr class="w-header white my-4">

          <div class="container white my-5 py-5 z-depth-1 col-lg-8">

            <!--Section: Content-->
            <section class="px-md-5 mx-md-5 dark-grey-text">

              <!--Grid row-->
              <div class="row d-flex justify-content-center">

                <!--Grid column-->
                <div class="w-75">

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
                    $link = '<div class="row justify-content-center mb-0"><button class="btn btn-primary mt-5 btn-block w-50" type="submit">登録</button></div>';

                  endif; ?>

                  <form action="./insert.php" method="POST">

                    <div class="form-row">
                      <div class="col">
                        <!-- 姓 -->
                        <small id="" class="form-text text-muted sign_up_label">姓</small>
                        <p><?php echo $_POST["last_name"] ?>
                          <input type="hidden" name="last_name" value="<?php echo ($_POST["last_name"]); ?>">
                        </p>
                      </div>
                      <div class="col">
                        <!-- 名 -->
                        <small id="" class="form-text text-muted sign_up_label">名</small>
                        <p><?php echo $_POST["first_name"] ?>
                          <input type="hidden" name="first_name" value="<?php echo ($_POST["first_name"]); ?>">
                        </p>
                      </div>
                    </div>

                    <!-- ユーザネーム -->
                    <small id="" class="form-text text-muted sign_up_label">ユーザネーム</small>
                    <p><?php echo $_POST["user_name"] ?>
                      <input type="hidden" name="user_name" value="<?php echo h($_POST["user_name"]); ?>">
                    </p>

                    <!-- パスワード -->
                    <small id="" class="form-text text-muted sign_up_label">パスワード</small>
                    <p><?php echo $_POST["password"] ?>
                      <input type="hidden" name="password" value="<?php echo ($_POST["password"]); ?>">
                    </p>

                    <!-- メールアドレス -->
                    <small id="" class="form-text text-muted sign_up_label">メールアドレス</small>
                    <p><?php echo $_POST["mail_address"] ?>
                      <input type="hidden" name="mail_address" value="<?php echo h($_POST["mail_address"]); ?>">
                    </p>

                    <!-- 郵便番号 -->
                    <small id="" class="form-text text-muted sign_up_label">郵便番号</small>
                    <p><?php echo $_POST["postal_code"] ?>
                      <input type="hidden" name="postal_code" value="<?php echo ($_POST["postal_code"]); ?>">
                    </p>

                    <!-- 住所 -->
                    <small id="" class="form-text text-muted sign_up_label">住所</small>
                    <p><?php echo $_POST["address"] ?>
                      <input type="hidden" name="address" value="<?php echo ($_POST["address"]); ?>">
                    </p>

                    <!-- 電話番号 -->
                    <small id="" class="form-text text-muted sign_up_label">電話番号</small>
                    <p><?php echo $_POST["phone_number"] ?>
                      <input type="hidden" name="phone_number" value="<?php echo ($_POST["phone_number"]); ?>">
                    </p>

                    <!-- 生年月日 -->
                    <small id="" class="form-text text-muted sign_up_label">生年月日</small>
                    <p><?php echo $_POST["birthday"] ?>
                      <input type="hidden" name="birthday" value="<?php echo ($_POST["birthday"]); ?>">
                    </p>

                    <!-- 第三者質問と答え -->
                    <div class="form-row">
                      <div class="col">
                        <!-- 第三者質問 -->
                        <small id="" class="form-text text-muted sign_up_label">第三者質問</small>
                        <p><?php echo $_POST["question"] ?></p>
                        <input type="hidden" name="question" value="<?php echo $question_id[0]['question_id']; ?>">
                      </div>
                      <div class="col">
                        <!-- 答え -->
                        <small id="" class="form-text text-muted sign_up_label">答え</small>
                        <p><?php echo $_POST["answer"] ?>
                          <input type="hidden" name="answer" value="<?php echo ($_POST["answer"]); ?>">
                        </p>
                      </div>
                    </div>

                    <!-- 送信or戻る $linkに入ってるので適宜変更してください -->
                    <?php echo $link; ?>
                  </form>

                  <!-- Sign up button -->

                </div>
                <!--Grid column-->
              </div>
              <!--Grid row-->
            </section>
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