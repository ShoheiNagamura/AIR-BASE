<?php
session_start();

include('./functions/check_session_id.php');
include('./functions/connect_to_db.php');

if (isset($_SESSION['user_type']) && $_SESSION['user_type'] === 1) {
    $headerOutput = '
        <header>
            <p> LOGO</p>
            <h1>AIR BASE</h1>
            <div class="header-nav">
                <!-- <a href="#"><img src="" alt=""></a> -->
                <p>ユーザー</p>
                <a href="./logout/logout.php">
                    <p>ログアウト</p>
                </a>
            </div>
        </header>

        <ul>
            <a href="">
                <li>案件検索</li>
            </a>
            <a href="">
                <li>パイロット検索</li>
            </a>
            <a href="">
                <li>気に入った案件</li>
            </a>
            <a href="">
                <li>受注管理</li>
            </a>
            <a href="./profile/profile.php">
                <li>プロフィール</li>
            </a>
        </ul>';
} else if (isset($_SESSION['user_type']) && $_SESSION['user_type'] === 0) {
    $headerOutput = '
        <header>
            <p> LOGO</p>
            <h1>AIR BASE</h1>
            <div class="header-nav">
                <!-- <a href="#"><img src="" alt=""></a> -->
                <p>ユーザー</p>
                <a href="./logout/logout.php">
                    <p>ログアウト</p>
                </a>
            </div>
        </header>

        <ul>
            <a href="">
                <li>案件検索</li>
            </a>
            <a href="">
                <li>パイロット検索</li>
            </a>
            <a href="">
                <li>気になるパイロット</li>
            </a>
            <a href="">
                <li>案件管理</li>
            </a>
            <a href="./profile/profile.php">
                <li>プロフィール</li>
            </a>
        </ul>
        ';
}


?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/top.css">
    <title>AIR BASE</title>
</head>

<body>
    <?= $headerOutput ?>
</body>

</html>