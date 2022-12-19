<?php

session_start();

include('../functions/check_session_id.php');
include('../functions/connect_to_db.php');

if ($_SESSION['user_type'] == 0) {
    general_check_session_id();
} else {
    header("Location:../login/loginTop.php");
    exit();
}

$id = $_SESSION['id'];
// var_dump($id);
// exit();

$email = $_SESSION['email'];



// ヘッダー用
if (isset($_SESSION['user_type']) && $_SESSION['user_type'] === 1) {
    $headerOutput = "
        <header>
            <p> LOGO</p>
            <h1>AIR BASE</h1>
            <div class='header-nav'>
                <p>{$email}</p>
                <a href='../logout/logout.php'>
                    <p>ログアウト</p>
                </a>
            </div>
        </header>

        <ul>
            <a href=''>
                <li>案件検索</li>
            </a>
            <a href=''>
                <li>パイロット検索</li>
            </a>
            <a href=''>
                <li>気に入った案件</li>
            </a>
            <a href=''>
                <li>受注管理</li>
            </a>
            <a href='profile.php'>
                <li>プロフィール</li>
            </a>
        </ul>";
} else if (isset($_SESSION['user_type']) && $_SESSION['user_type'] === 0) {
    $headerOutput = "
        <header>
            <p> LOGO</p>
            <h1>AIR BASE</h1>
            <div class='header-nav'>
                <p>{$email}</p>
                <a href='../logout/logout.php'>
                    <p>ログアウト</p>
                </a>
            </div>
        </header>

        <ul>
            <a href=''>
                <li>案件検索</li>
            </a>
            <a href=''>
                <li>パイロット検索</li>
            </a>
            <a href=''>
                <li>気になるパイロット</li>
            </a>
            <a href=''>
                <li>案件管理</li>
            </a>
            <a href='general_profile.php'>
                <li>プロフィール</li>
            </a>
        </ul>
        ";
}

?>


<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/top.css">
    <title>AIR BASE</title>
</head>

<body>
    <?= $headerOutput ?>

    <p>一般ユーザープロフィール入力</p>
    <form action="./general_profile_create.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" value=<?= $id ?>>
        <label for="name">お名前</label>
        <input type="text" id="name" name="name" placeholder="お名前を入力してください">
        <label for="nickname">ニックネーム（表示ネーム)</label>
        <input type="text" id="nickname" name="nickname" placeholder="ニックネームを入力してください">
        <label for="age">ご年齢</label>
        <input type="text" id="age" name="age" placeholder="ご年齢を入力してください">
        <select name="gender" id="gender">
            <option value="男">男</option>
            <option value="女">女</option>
        </select>
        <button>保存</button>
    </form>


</body>

</html>