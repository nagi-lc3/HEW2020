<?php

function validation($request)
{
    $err_msg = [];
    //未入力チェック
    if (!empty($request)) {
        //first_name
        if (mb_strlen($request["first_name"]) >= 25) {
            // 20字以上
            $err_msg[] = "名前は25文字以内で入力してください" . "\n";
        }

        //last_name
        if (mb_strlen($request["last_name"]) >= 25) {
            // 20字以上
            $err_msg[] = "姓は25文字以内で入力してください" . "\n";
        }

        // user_name
        if (mb_strlen($request["user_name"]) >= 50) {
            // 50字以上
            $err_msg[] =  "ユーザーネームは50文字以内で入力してください" . "\n";
        }

        // password
        if (!preg_match("/^[!-{}~]*$/", $request["password"])) {
            // 半角英数記号ではない
            $err_msg[] =  "パスワードは半角英数字及び記号で入力してください" . "\n";
        } else if (mb_strlen($request["password"]) < 8) {
            // 8文字以下
            $err_msg[] =  "パスワードは8文字以上で入力してください" . "\n";
        } else if (mb_strlen($request["password"]) >= 20) {
            // 20字以上
            $err_msg[] =  "パスワードは20文字以内で入力してください" . "\n";
        }

        // mail_address
        if (!preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\?\*\[|\]%'=~^\{\}\/\+!#&\$\._-])*@([a-zA-Z0-9_-])+\.([a-zA-Z0-9\._-]+)+$/", $request["mail_address"])) {
            // 〇〇〇@〇〇〇.〇〇〇の形でない
            $err_msg[] =  "メールアドレスの形式で入力してください" . "\n";
        }

        // postal_code
        // if (!preg_match("/^[0-9]-{7}$/", $request["postal_code"])) {
        if (!preg_match("/^[0-9]{3}[-]?[0-9]{4}$/", $request["postal_code"])) {
            // 〇〇〇-〇〇〇〇か〇〇〇〇〇〇〇の形でない
            $err_msg[] =  "郵便番号の形式で入力してください" . "\n";
        }

        // address
        if (
            !mb_strpos($request["address"], "都", 0, "UTF-8")
            && !mb_strpos($request["address"], "道", 0, "UTF-8")
            && !mb_strpos($request["address"], "府", 0, "UTF-8")
            && !mb_strpos($request["address"], "県", 0, "UTF-8")
        ) {
            $err_msg[] =  "住所の形式で入力してください" . "\n";
        }

        // phone_number
        if (!preg_match("/^[0-9]{2,4}-[0-9]{2,4}-[0-9]{3,4}$/", $request["phone_number"])) {
            $err_msg[] =  "電話番号の形式で入力してください" . "\n";
        }

        //birthday
        if (!preg_match('/\A[0-9]{4}-[0-9]{1,2}-[0-9]{1,2}\z/', $request["birthday"])) {
            $err_msg[] =  "日付の形式で入力してください" . "\n";
        } else {
            list($year, $month, $day) = explode('-', $request["birthday"]);

            //あり得る日付かチェック
            if (checkdate($month, $day, $year) == false) {
                $err_msg[] =  "正しい日付で入力してください" . "\n";
            }
        }
    } else {
        $err_msg[] =  "すべての項目が入力されていません";
    }

    return $err_msg;
}
