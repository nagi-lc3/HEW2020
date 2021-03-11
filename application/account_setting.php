<?php
session_start();
require('./db_connect.php');

function h($str)
{
  return htmlentities($str, ENT_QUOTES);
}

if (!empty($_POST)) {
  // バリデーション
  $err_msg;
  // user_name
  if (mb_strlen($_POST["user_name"]) >= 50 || mb_strlen($_POST["user_name"]) < 1) {
    // 50字以上
    $err_msg[] =  "ユーザーネームは１文字以上50文字以内で入力してください" . "\n";
  }

  //last_name
  if (mb_strlen($_POST["last_name"]) >= 25 || mb_strlen($_POST["last_name"]) < 1) {
    // 20字以上
    $err_msg[] = "姓は１文字以上25文字以内で入力してください" . "\n";
  }

  //first_name
  if (mb_strlen($_POST["first_name"]) >= 25 || mb_strlen($_POST["first_name"]) < 1) {
    // 20字以上
    $err_msg[] = "名前は１文字以上25文字以内で入力してください" . "\n";
  }


  // address
  if (
    !mb_strpos($_POST["address"], "都", 0, "UTF-8")
    && !mb_strpos($_POST["address"], "道", 0, "UTF-8")
    && !mb_strpos($_POST["address"], "府", 0, "UTF-8")
    && !mb_strpos($_POST["address"], "県", 0, "UTF-8")
  ) {
    $err_msg[] =  "住所の形式で入力してください" . "\n";
  }

  // phone_number
  if (!preg_match("/^[0-9]{2,4}-[0-9]{2,4}-[0-9]{3,4}$/", $_POST["phone_number"])) {
    $err_msg[] =  "電話番号の形式で入力してください" . "\n";
  }

  // mail_address
  if (!preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\?\*\[|\]%'=~^\{\}\/\+!#&\$\._-])*@([a-zA-Z0-9_-])+\.([a-zA-Z0-9\._-]+)+$/", $_POST["mail_address"])) {
    // 〇〇〇@〇〇〇.〇〇〇の形でない
    $err_msg[] =  "メールアドレスの形式で入力してください" . "\n";
  }

  // 正しく入力されている場合のみ実行
  if (empty($err_msg)) {
    $update_sql = "UPDATE users SET mail_address = :mail_address, user_name = :user_name, last_name = :last_name, first_name = :first_name, address = :address, phone_number = :phone_number WHERE user_id = :user_id";
    $update_stmt = $pdo->prepare($update_sql);
    $update_stmt->bindValue(':mail_address', $_POST['mail_address']);
    $update_stmt->bindValue(':user_name', $_POST['user_name']);
    $update_stmt->bindValue(':last_name', $_POST['last_name']);
    $update_stmt->bindValue(':first_name', $_POST['first_name']);
    $update_stmt->bindValue(':address', $_POST['address']);
    $update_stmt->bindValue(':phone_number', $_POST['phone_number']);
    $update_stmt->bindValue(':user_id', $_SESSION['user_id']);
    $update_stmt->execute();
  }
}

// ログイン状態ならDBから情報を取得
if (!empty($_SESSION)) {

  // ユーザー情報を取り出す
  $sql = "SELECT * FROM users WHERE user_id = :user_id";
  $stmt = $pdo->prepare($sql);
  $stmt->bindValue(':user_id', $_SESSION['user_id']);
  $stmt->execute();
  $user_info = $stmt->fetch(PDO::FETCH_ASSOC);


  // それぞれを変数に代入
  $user_name = $user_info['user_name'];
  $last_name = $user_info['last_name'];
  $first_name = $user_info['first_name'];
  $address = $user_info['address'];
  $phone_number = $user_info['phone_number'];
  $mail_address = $user_info['mail_address'];
}
?>

<!DOCTYPE html>
<html lang="ja">


<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="熱帯魚の通販サイトです。">
  <meta name="keywords" content="熱帯魚, 魚, 水槽, ECサイト, 通販, オンラインショップ">
  <title>Auarium | 基本情報</title>

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
          <h6 class="font-weight-bold text-center grey-text text-uppercase small mb-4">information</h6>
          <h3 class="font-weight-bold text-center white-text pb-2">基本情報</h3>
          <hr class="w-header white my-4">

          <div class="container white my-5 py-5 z-depth-1 col-lg-8">

            <!--Section: Content-->
            <section class="px-md-5 mx-md-5 dark-grey-text">

              <!--Grid row-->
              <div class="row d-flex justify-content-center">

                <!--Grid column-->
                <div class="">

                  <?php if (!empty($err_msg)) : ?>
                    <?php echo '<ul>'; ?>
                    <?php
                    foreach ((array)$err_msg as $error) {
                      echo '<li>' . $error . '</li>';
                    }
                    echo 'やり直してください';
                    ?>
                    <?php echo '</ul>'; ?>
                  <?php endif; ?>

                  <!-- ユーザーネーム -->
                  <small id="" class="form-text text-muted sign_up_label">ユーザーネーム</small>
                  <p><?php if (!empty($_SESSION)) {
                        echo h($user_name);
                      } ?></p>

                  <div class="form-row mb-3">
                    <div class="col">
                      <!-- 姓 -->
                      <small id="" class="form-text text-muted sign_up_label">姓</small>
                      <p class=""><?php if (!empty($_SESSION)) {
                                    echo h($last_name);
                                  }  ?></p>
                    </div>
                    <div class="col">
                      <!-- 名 -->
                      <small id="" class="form-text text-muted sign_up_label">名</small>
                      <p><?php if (!empty($_SESSION)) {
                            echo h($first_name);
                          }  ?></p>
                    </div>
                  </div>

                  <!-- 住所 -->
                  <small id="" class="form-text text-muted sign_up_label">住所</small>
                  <p><?php if (!empty($_SESSION)) {
                        echo h($address);
                      }  ?></p>

                  <!-- 電話番号 -->
                  <small id="" class="form-text text-muted sign_up_label">電話番号</small>
                  <p><?php if (!empty($_SESSION)) {
                        echo h($phone_number);
                      }  ?></p>

                  <!-- E-mail -->
                  <small id="" class="form-text text-muted sign_up_label">メールアドレス</small>
                  <p><?php if (!empty($_SESSION)) {
                        echo h($mail_address);
                      }  ?></p>

                  <form action="account_setting_edit.php" method="post">
                    <?php if (!empty($_SESSION)) {
                      echo '<button name="" class="btn btn-primary my-4 btn-block" type="submit">編集する</button>';
                    }  ?>
                  </form>

                  <!-- Sign up button -->

                </div>
                <!--Grid column-->
              </div>
              <!--Grid row-->
            </section>
            <!--Section: Content-->
          </div>
        </section>
      </div>
    </div>

    <?php include_once('./footer.html'); ?>
  </div>

  <?php include_once('./script.html'); ?>
</body>

</html>