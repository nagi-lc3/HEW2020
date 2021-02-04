<?php
session_start();
require './db_connect.php';

// echo $_SESSION['user_name'];

// ログインしていない場合
if ($_SESSION['user_name'] == false) {
    header('Location: ./login.php');
}

// 第二引数はdataのところに書いたやつ
// $to_csv = filter_input(INPUT_POST, 'model_csv');
$to_csv = $_POST['model_erea'];
// var_dump($to_csv);

// 配列へ
$to_csv_array = json_decode($to_csv, true);
// var_dump($to_csv_array);
// echo json_last_error_msg();

// レコードが空かチェック
$existence_check_sql = "SELECT aquarium_id FROM my_aquariums INNER JOIN users ON my_aquariums.user_id = users.user_id WHERE users.user_id = :user_id";

if (!empty($_SESSION['user_id'])) {
}

$user_id = $_SESSION['user_id'];
try {
    $existence_check_stmt = $pdo->prepare($existence_check_sql);
    $existence_check_stmt->bindParam(':user_id', $user_id);
    $existence_check_stmt->execute();
    $existence_check = $existence_check_stmt->fetch();
} catch (PDOException $e) {
    echo $e;
}

// var_dump($existence_check);
// csvファイルへのパス
date_default_timezone_set('Asia/Tokyo');
$create_date = date("Y-m-d-H-i-s");
// $file_path = './csvs/scene_' . $user_id . '_' . $create_date . '.csv';
$file_path = './csvs/scene_' . $user_id . '.csv';

if ($existence_check == true) {
    // レコードに水槽のモデルへのパスが保存されている場合

    // aquariums
    // $aquariums_update_sql = "UPDATE aquariums SET aquarium_3D=:aquarium_3D WHERE aquarium_id=:aquarium_id";
    // $aquarium_3D = $file_path;

    // try {
    //     $aquariums_update_stmt = $pdo->prepare($aquariums_update_sql);
    //     $aquariums_update_stmt->bindParam(':aquarium_3D', $aquarium_3D);
    //     $aquariums_update_stmt->bindParam(':aquarium_id', $aquarium_id);
    //     $aquariums_check = $aquariums_update_stmt->execute();
    // } catch (PDOException $e) {
    //     echo $e;
    // }

    // my_aquariums
    // aruariumになってるところあってます
    $my_aquariums_update_sql = "UPDATE my_aquariums SET my_aruarium_updated_at=:my_aruarium_updated_at WHERE aquarium_id=:aquarium_id";

    $aquarium_id = $existence_check['aquarium_id'];
    $my_aruarium_updated_at = $create_date;

    try {
        $my_aquariums_update_stmt = $pdo->prepare($my_aquariums_update_sql);
        $my_aquariums_update_stmt->bindParam(':my_aruarium_updated_at', $my_aruarium_updated_at);
        $my_aquariums_update_stmt->bindParam(':aquarium_id', $aquarium_id);
        $my_aquariums_check = $my_aquariums_update_stmt->execute();
    } catch (PDOException $e) {
        echo $e;
    }

    // 後付け間に合わせ
    $aquariums_check = true;
} else {
    // レコードに水槽のモデルへのパスが保存されてない場合
    // aquariums
    $aquariums_insert_sql = "INSERT INTO aquariums VALUES(:aquarium_id,:aquarium_name,:aquarium_image,:aquarium_3D)";

    $aquarium_id = null;
    $aquarium_name = $_SESSION['user_name'] . '\'sAquarium';
    $aquarium_image = 'no_image';
    $aquarium_3D = $file_path;

    try {
        $aquariums_insert_stmt = $pdo->prepare($aquariums_insert_sql);
        $aquariums_insert_stmt->bindParam(':aquarium_id', $aquarium_id);
        $aquariums_insert_stmt->bindParam(':aquarium_name', $aquarium_name);
        $aquariums_insert_stmt->bindParam(':aquarium_image', $aquarium_image);
        $aquariums_insert_stmt->bindParam(':aquarium_3D', $aquarium_3D);
        $aquariums_check = $aquariums_insert_stmt->execute();
    } catch (PDOException $e) {
        echo $e;
    }

    // my_aquariums
    // aquarium_id取り出し
    $select_aquarium_id_sql = "SELECT aquarium_id FROM aquariums ORDER BY aquarium_id DESC LIMIT 1";

    try {
        $select_aquarium_id_stmt = $pdo->prepare($select_aquarium_id_sql);
        $select_aquarium_id_stmt->bindParam(':user_id', $user_id);
        $select_aquarium_id_stmt->execute();
        $select_aquarium_id = $select_aquarium_id_stmt->fetch();
    } catch (PDOException $e) {
        echo $e;
    }
    // var_dump($select_aquarium_id);
    $selected_aquarium_id = $select_aquarium_id['aquarium_id'];
    $my_aquariums_insert_sql = "INSERT INTO my_aquariums VALUES(:my_aquarium_id,:my_aquarium_name,:user_id,:aquarium_id,:my_aquarium_created_at,:my_aruarium_updated_at)";

    $update_at = null;

    try {
        $my_aquariums_insert_stmt = $pdo->prepare($my_aquariums_insert_sql);
        $my_aquariums_insert_stmt->bindParam(':my_aquarium_id', $aquarium_id);
        $my_aquariums_insert_stmt->bindParam(':my_aquarium_name', $aquarium_name);
        $my_aquariums_insert_stmt->bindParam(':user_id', $user_id);
        $my_aquariums_insert_stmt->bindParam(':aquarium_id', $selected_aquarium_id);
        $my_aquariums_insert_stmt->bindParam(':my_aquarium_created_at', $create_date);
        $my_aquariums_insert_stmt->bindParam(':my_aruarium_updated_at', $update_at);
        $my_aquariums_check = $my_aquariums_insert_stmt->execute();
    } catch (PDOException $e) {
        echo $e;
    }
}

if (($aquariums_check && $my_aquariums_check) == true) {
    // csvsフォルダにcsvを
    // echo $file_name;
    $file = fopen($file_path, "w");
    if ($file) {
        foreach ($to_csv_array as $csv) {
            fputcsv($file, $csv);
        }
        fclose($file);
        echo '成功';
    } else {
        echo 'ファイルが開けませんでした';
    }
} else {
    echo 'やり直してください';
}
