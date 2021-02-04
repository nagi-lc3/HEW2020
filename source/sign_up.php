<!DOCTYPE html>
<html lang="ja">


<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="熱帯魚の通販サイトです。">
  <meta name="keywords" content="熱帯魚, 魚, 水槽, ECサイト, 通販, オンラインショップ">
  <title>Auarium | 会員登録</title>

  <?php include_once('./link.html'); ?>
</head>


<body>
  <div class="wrapper">
    <?php include_once('./header.html'); ?>


    <!-- メインコンテンツ -->
    <div class="contents">
      <h2>会員登録</h2>
      <!-- <p>アカウント名<input type="text"></p>
            <p>名前<input type="text"></p>
            <p>住所<input type="text"></p>
            <p>電話番号<input type="text"></p>
            <p>メールアドレス<input type="mail"></p>
            <form action="sign_up_confirm.php" method="post">
                <input type="submit" name="" value="確認画面へ">
            </form> -->

      <form action="./sign_up_confirm.php" method="POST">
        <p>姓<input type="text" name="last_name" placeholder="春"></p>
        <p>名<input type="text" name="first_name" placeholder="太郎"></p>
        <p>ユーザネーム<input type="text" name="user_name" placeholder="haltaro123"></p>
        <p>パスワード<input type="password" name="password" placeholder="半角英数字及び記号で入力してください"></p>
        <p>メールアド<input type="mail_address" name="mail_address" placeholder="hal@hal.com"></p>
        <p>郵便番号<input type="text" name="postal_code" placeholder="0001111"></p>
        <p>住所<input type="text" name="address" placeholder="東京都新宿区西新宿〇〇〇-〇"></p>
        <p>電話番号<input type="tel" name="phone_number" placeholder="000-0000-0000"></p>
        <p>生年月日<input type="text" name="birthday" placeholder="2020-01-01"></p>
        <p>第三者質問と答え
          <select name="question">
            <option value="1">1、母の旧姓</option>
            <option value="2">2、好きな食べ物</option>
            <option value="3">3、自分の母校</option>
          </select>
          <input type="text" name="answer">
        </p>
        <input type="submit" value="確認画面へ">
      </form>
    </div>


    <?php include_once('./footer.html'); ?>
  </div>

  <?php include_once('./script.html'); ?>
</body>

</html>