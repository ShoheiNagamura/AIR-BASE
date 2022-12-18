<?php

session_start();

include('../functions/check_session_id.php');
include('../functions/connect_to_db.php');

if ($_SESSION['user_type'] == 1) {
    check_session_id();
} else {
    header("Location:../login/loginTop.php");
    exit();
}

$id = $_SESSION['id'];

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
    <header>
        <p> LOGO</p>
        <h1>AIR BASE</h1>
        <div class="header-nav">
            <!-- <a href="#"><img src="" alt=""></a> -->
            <p>ユーザー名</p>
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
        <a href="profile.php">
            <li>プロフィール</li>
        </a>
    </ul>

    <p>パイロットプロフィール入力</p>
    <form action="./profile_create.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" value=<?= $id ?>>
        <label for="name">お名前</label>
        <input type="text" id="name" name="name" placeholder="お名前を入力してください">
        <label for="kana">ふりがな（英字）</label>
        <input type="text" id="kana" name="kana" placeholder="ふりがなを入力してください">
        <label for="age">ご年齢</label>
        <input type="text" id="age" name="age" placeholder="ご年齢を入力してください">
        <label for="gender">性別</label>
        <select name="gender" id="gender">
            <option value="男">男</option>
            <option value="女">女</option>
        </select>
        <label for="my_image">マイイメージ画像</label>
        <input type="file" id="my_image" name="my_image" accept="images/*" capture="environment" />
        <label for="work_area">活動地域</label>
        <input type="text" id="work_area" name="work_area" placeholder="活動地域を入力してください">
        <label for="status">活動状況</label>
        <select name="status" id="status">
            <option value="活動中">活動中</option>
            <option value="活動休止">活動休止</option>
        </select>
        <label for="word">一言</label>
        <input type="text" id="word" name="word" placeholder="word">
        <label for="achievement">実績</label>
        <textarea name="achievement" id="achievement" cols="30" rows="10" placeholder="実績を入力してください"></textarea>
        <label for="pr">PR</label>
        <textarea name="pr" id="pr" cols="30" rows="10" placeholder="PRしたいことを入力してください"></textarea>

        <label for="license">保有資格</label>
        <select name="license" id="license">
            <option value="一等無人機操縦士">一等無人機操縦士</option>
            <option value="二等無人機操縦士">二等無人機操縦士</option>
        </select>

        <label for="shooting">空撮</label>
        <select name="shooting" id="shooting">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>

        <label for="agrochemical_spraying">農薬散布</label>
        <select name="agrochemical_spraying" id="agrochemical_spraying">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>

        <label for="measurement">測量</label>
        <select name="measurement" id="measurement">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>

        <label for="outer_wall_survey">外壁点検</label>
        <select name="outer_wall_survey" id="outer_wall_survey">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>

        <label for="disaster">災害</label>
        <select name="disaster" id="disaster">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>

        <label for="race">レース</label>
        <select name="race" id="race">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>

        <label for="micro_drone">マイクロドローン</label>
        <select name="micro_drone" id="micro_drone">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>


        <label for="water">水中</label>
        <select name="water" id="water">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>
        <button>保存</button>
    </form>


</body>

</html>