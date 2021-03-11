<?php
session_start();
$_SESSION['status_flg'] = 0;
// 送信されてた場合
if ($_SESSION['status_flg'] == 1) {
  $_POST = array();
  $title = '';
  $mail_address = '';
  $category = '';
  $content = '';

  // 完了ページへリダイレクト
  $url = './inquiry_complete.php';
  header('Location:' . $url);
  exit();
}

function h($value)
{
  return htmlspecialchars($value, ENT_QUOTES);
}

$title = h($_POST['title']);
$mail_address = h($_POST['mail_address']);
$category = $_POST['category'];
$content = h($_POST['content']);

if (!empty($_POST)) {
  $err_msg = [];

  // title
  if (mb_strlen($title) > 25 || mb_strlen($title) < 1) {
    $err_msg[] =  "件名は１文字以上２５文字以内で入力してください" . "\n";
  }

  // mail_address
  if (!preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\?\*\[|\]%'=~^\{\}\/\+!#&\$\._-])*@([a-zA-Z0-9_-])+\.([a-zA-Z0-9\._-]+)+$/", $mail_address)) {
    // 〇〇〇@〇〇〇.〇〇〇の形でない
    $err_msg[] =  "メールアドレスの形式で入力してください" . "\n";
  }

  if (mb_strlen($content) > 500 || mb_strlen($content) < 1) {
    $err_msg[] =  "問い合わせ内容を入力してください" . "\n";
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
  <title>Auarium | お問い合わせ確認</title>

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
          <h6 class="font-weight-bold text-center grey-text text-uppercase small mb-4">inquiry_comfirm</h6>
          <h3 class="font-weight-bold text-center white-text pb-2">お問い合わせ確認</h3>
          <hr class="w-header my-4 white">

          <div class="container white my-5 py-5 z-depth-1">

            <!--Section: Content-->
            <section class="px-md-5 mx-md-5 dark-grey-text">

              <!--Grid row-->
              <div class="row d-flex justify-content-center">

                <!--Grid column-->
                <div class="w-75">

                  <form class="" action="./inquiry_complete.php" method="post">

                    <?php if (!empty($err_msg)) : ?>
                      <?php echo '<ul>'; ?>
                      <?php
                      foreach ((array)$err_msg as $error) {
                        echo '<li>' . $error . '</li>';
                      }
                      echo 'やり直してください';
                      $link =  '<p><a href="./inquiry.php">入力画面へ戻る</a></p>';
                      ?>
                      <?php echo '</ul>'; ?>

                    <?php else : ?>
                      <?php
                      $link = '<div class="row justify-content-center mb-0"><button class="btn btn-primary mt-5 btn-block w-50" type="submit">送信</button></div>';
                      // 送信済みかどうか判定するフラグ
                      $_SESSION['status_flg'] = 1;
                      ?>

                    <?php endif; ?>

                    <!-- 件名 -->
                    <small id="" class="form-text text-muted sign_up_label">件名</small>
                    <p><?php echo $title ?>
                      <input type="hidden" name="title" value="<?php echo $title; ?>">
                    </p>

                    <!-- メールアドレス -->
                    <small id="" class="form-text text-muted sign_up_label">メールアドレス</small>
                    <p><?php echo $mail_address ?>
                      <input type="hidden" name="mail_address" value="<?php echo $mail_address; ?>">
                    </p>

                    <!-- カテゴリ -->
                    <small id="" class="form-text text-muted sign_up_label">カテゴリ</small>
                    <p><?php echo $category ?>
                      <input type="hidden" name="category" value="<?php echo $category; ?>">
                    </p>

                    <!-- お問い合わせ内容 -->
                    <small id="" class="form-text text-muted sign_up_label">お問い合わせ内容</small>
                    <p class="text-break"><?php echo $content ?>
                      <input type="hidden" name="content" value="<?php echo $content; ?>">
                    </p>

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