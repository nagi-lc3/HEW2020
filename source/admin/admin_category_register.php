<?php
session_start();

// ログインしてない場合
if ($_SESSION['admin_login'] == false) {
    header('Location: ./admin_login.php');
}

// 送信済みステータス破棄
if (!empty($_SESSION['registered'])) {
    unset($_SESSION["registered"]);
}

// エラーメッセージ取り出し
if (!empty($_GET['msg'])) {
    $err_msgs = explode(",", $_GET['msg']);
}
?>
<!DOCTYPE html>
<html lang="ja">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aquarium | カテゴリ登録</title>

    <link rel="shortcut icon" href="images/favicon.ico">
    <link type="text/css" rel="stylesheet" href="../css/admin/admin_base.css">
    <link type="text/css" rel="stylesheet" href="../css/admin/admin_category_register.css">
</head>


<body>
    <div class="wrapper">
        <?php include_once('./admin_base.html'); ?>


        <!-- メインコンテンツ -->
        <div class="contents">
            <h2>カテゴリ登録</h2>
            <!-- エラーメッセージがあれば表示 -->
            <?php if (!empty($err_msgs)) {
                foreach ($err_msgs as $msg) {
                    echo '<p>・' . $msg . '</p>';
                }
            }
            ?>
            <form action="./register.php?flg=1" method="post">
                カテゴリ名
                <input type="text" name="category_name1"><br>
                カテゴリ名
                <input type="text" name="category_name2"><br>
                カテゴリ名
                <input type="text" name="category_name3"><br>
                カテゴリ名
                <input type="text" name="category_name4"><br>
                カテゴリ名
                <input type="text" name="category_name5"><br>
                カテゴリ名
                <input type="text" name="category_name6"><br>
                カテゴリ名
                <input type="text" name="category_name7"><br>
                カテゴリ名
                <input type="text" name="category_name8"><br>
                カテゴリ名
                <input type="text" name="category_name9"><br>
                カテゴリ名
                <input type="text" name="category_name10"><br>

                <input type="submit" name="register" value="登録">
            </form>
        </div>

    </div>
</body>

</html>