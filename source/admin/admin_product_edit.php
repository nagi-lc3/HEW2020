<?php
session_start();

// ログインしてない場合
if ($_SESSION['admin_login'] == false) {
    header('Location: ./admin_login.php');
}

//
require('../db_connect.php');
