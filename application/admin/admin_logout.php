<?php
session_start();
$_SESSION = array(); //セッションの中身をすべて削除
session_destroy(); //セッションを破壊
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <p>ログアウトしました。</p>
    <a href="./admin_login.php">ログインへ</a>
</body>

</html>