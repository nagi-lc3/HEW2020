<?php
const DB_HOST = 'mysql:dbname=hew2020_91449;host=127.0.0.1;charset=utf8';
// const DB_USER = 'hew2020_91449';
const DB_USER = 'root';
const DB_PASSWORD = '';


try {
    $pdo = new PDO(DB_HOST, DB_USER, DB_PASSWORD, [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, //連想配列として取り出し
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, //例外
        PDO::ATTR_EMULATE_PREPARES => false, //sqlインジェクション対策
    ]);
} catch (PDOException $e) {
    echo '接続失敗' . $e->getMessage() . "\n";
    exit();
}
