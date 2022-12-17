<?php

// パイロット用ログイン状態のチェック関数
function check_session_id()
{
    if (!isset($_SESSION["session_id"]) || $_SESSION["session_id"] != session_id()) {
        header('Location:../login/loginTop.php');
        exit();
    } else {
        session_regenerate_id(true);
        $_SESSION["session_id"] = session_id();
    }
}


// 一般アカウントログイン状態のチェック関数
function general_check_session_id()
{
    if (!isset($_SESSION["session_id"]) || $_SESSION["session_id"] != session_id()) {
        header('Location:./sellerLogin/seller_login.php');
        exit();
    } else {
        session_regenerate_id(true);
        $_SESSION["session_id"] = session_id();
    }
}


// // aprikesyonチェック
// function apl_check_session_id()
// {
//     if (!isset($_SESSION["session_id"]) || $_SESSION["session_id"] != session_id()) {
//         return $api_result = true;
//     } else {
//         session_regenerate_id(true);
//         $_SESSION["session_id"] = session_id();
//     }
// }