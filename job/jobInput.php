<?php
// 案件登録画面ーーーーーーーーーーーーーーーー


session_start();

include('../functions/check_session_id.php');
include('../functions/connect_to_db.php');



$email = $_SESSION['email'];
// var_dump($email);
// exit();


//関数定義ファイルからDB接続関数呼び出す
$pdo = connect_to_db();

if ($_SESSION['user_type'] == 0) {
    check_session_id();
} else {
    header("Location:../login/loginTop.php");
    exit();
}



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
            <a href='../pages/job_list.php'>
                <li>案件検索</li>
            </a>
            <a href='../pages/pilot_list.php'>
                <li>パイロット検索</li>
            </a>
            <a href=''>
                <li>気に入った案件</li>
            </a>
            <a href=''>
                <li>受注管理</li>
            </a>
            <a href='../profile/profile.php'>
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
            <a href='../pages/job_list.php'>
                <li>案件検索</li>
            </a>
            <a href='../pages/pilot_list.php'>
                <li>パイロット検索</li>
            </a>
            <a href=''>
                <li>気になるパイロット</li>
            </a>
            <a href='./job_management.php'>
                <li>案件管理</li>
            </a>
            <a href='../job/jobInput.php'>
                <li>案件登録</li>
            </a>
            <a href='../profile/general_profile.php'>
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


    <p>案件登録</p>

    <main>
        <h2 class="jobTitle">案件ご登録</h2>
        <form class="jobCreate" action="./job_create.php" method="POST">
            <div class="jobNameArea jobInputAreaItem">
                <label for="jobName">案件名（必須）</label>
                <input type="text" id="jobName" name=" jobName" placeholder="案件名をご入力ください">
            </div>
            <div class="statusArea jobInputAreaItem">
                <label for="job_status">募集状況（必須）</label>
                <select name="job_status" id="job_status">
                    <option value="募集中">募集中</option>
                    <option value="急募">急募</option>
                    <option value="募集終了">募集終了</option>
                </select>
            </div>
            <div class="placeArea jobInputAreaItem">
                <label for="place">場所（必須）</label>
                <input type="text" id="place" name="place" placeholder="お仕事の場所をご入力ください">
            </div>


            <div class="deadlineArea jobInputAreaItem">
                <label for="start_date">開始日</label>
                <input type="date" id="start_date" name="start_date">
            </div>
            <div class="deadlineArea jobInputAreaItem">
                <label for="end_date">終了日</label>
                <input type="date" id="end_date" name="end_date">
            </div>

            <div class="rewardArea jobInputAreaItem">
                <label for="reward">報酬</label>
                <input type="text" id="reward" name="reward" placeholder="報酬金額を入力してださい">
            </div>
            <div class="TransportationCostsArea jobInputAreaItem">
                <label for="transportation_expenses">交通費</label>
                <input type="text" id="transportation_expenses" name="transportation_expenses" placeholder="交通費の金額をご入力ださい">
            </div>
            <div class="deadlineArea jobInputAreaItem">
                <label for="deadline">募集期限</label>
                <input type="date" id="deadline" name="deadline">
            </div>
            <div class="contentArea jobInputAreaItem">
                <label for="detail">案件内容</label>
                <textarea name="detail" id="detail" cols="70" rows="10" placeholder="案件の内容を詳しくご記載ください"></textarea>
            </div>
            <button class="jobInputArea-btn">登録</button>
        </form>
        <a href="./index.php"><button class="return">戻る</button></a>
    </main>


</body>

</html>