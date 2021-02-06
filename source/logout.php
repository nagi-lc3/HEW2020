<?php
session_start();
$_SESSION = array(); //セッションの中身をすべて削除
session_destroy(); //セッションを破壊
$msg = 'ログアウトしました。';
header('Location:./index.php?msg=' . $msg);
exit;
