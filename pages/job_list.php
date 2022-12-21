<?php
session_start();

include('../functions/check_session_id.php');
include('../functions/connect_to_db.php');

$email = $_SESSION['email'];
// var_dump($email);
// exit();

//関数定義ファイルからDB接続関数呼び出す
$pdo = connect_to_db();

$sql = 'SELECT * FROM job_project order by update_at DESC ';
$stmt = $pdo->prepare($sql);


//SQL実行するがまだデータの取得はできていない
try {
    $status = $stmt->execute();
} catch (PDOException $e) {
    echo json_encode(["sql error" => "{$e->getMessage()}"]);
    exit();
}

//fectchAllでデータの取得
if ($status == false) {
    $error = $stmt->errorInfo();
    exit('sqlError:' . $error[2]);
} else {
    // PHPではデータを取得するところまで実施
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// echo '<pre>';
// var_dump($result);
// echo '</pre>';

$count = count($result);



// ヘッダー用
$headerOutput = "";

// メイン用
$output = "";


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
            <a href='./job_list.php'>
                <li>案件検索</li>
            </a>
            <a href='./pilot_list.php'>
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
            <a href='../job/job_management.php'>
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


if (isset($_SESSION['user_type']) && $_SESSION['user_type'] === 1) {
    foreach ($result as $record) {
        $output .= "
            <div class='job-item'>
                <div class='job-header'>
                    <p class='job-name'>{$record["job_name"]}</p>
                    <div class='job-date'>
                        <p class='job-created_at'>{$record["created_at"]}</p>
                        <p class='job-update_at'>{$record["update_at"]}</p>
                    </div>
                </div>
                <p class='job-status'>{$record["job_status"]}</p>
                <div class='job-box'>
                    <div class='place-reward'>
                        <p class='job-place'>場所：{$record["place"]}</p>
                        <p class='job-reward'>報酬：{$record["reward"]}</p>
                        <p class='job-transportation_expenses'>交通費：{$record["transportation_expenses"]}</p>
                    </div>
                    <div class='word-date'>
                        <p class='job-work-date'>期間：{$record["start_date"]} ~ {$record["end_date"]}</p>
                        <p class='job-deadline'>締切日：{$record["deadline"]}</p>
                    </div>
                </div>
                <p class='job-detail'>案件詳細<br>{$record["detail"]}</p>
            </div>
            <a href = './sellerDetail.php'><button>応募</button>
        ";
    }
} else if (isset($_SESSION['user_type']) && $_SESSION['user_type'] === 0) {
    foreach ($result as $record) {
        $output .= "
            <div class='job-item'>
                <div class='job-header'>
                    <p class='job-name'>{$record["job_name"]}</p>
                    <div class='job-date'>
                        <p class='job-created_at'>掲載日：{$record["created_at"]}</p>
                        <p class='job-update_at'>更新日：{$record["update_at"]}</p>
                    </div>
                </div>
                <p class='job-status'>{$record["job_status"]}</p>
                <div class='job-box'>
                    <div class='place-reward'>
                        <p class='job-place'>場所：{$record["place"]}</p>
                        <p class='job-reward'>報酬：{$record["reward"]}</p>
                        <p class='job-transportation_expenses'>交通費：{$record["transportation_expenses"]}</p>
                    </div>
                    <div class='word-date'>
                        <p class='job-work-date'>期間：{$record["start_date"]} ~ {$record["end_date"]}</p>
                        <p class='job-deadline'>締切日：{$record["deadline"]}</p>
                    </div>
                </div>
                <p class='job-detail'>案件詳細<br>{$record["detail"]}</p>
            </div>
        ";
    }
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
    <main class="job-list">
        <h2 class="pilot-list-title">お仕事一覧</h2>
        <div class="job-items">
            <p class="count-job"><?= $count ?> 件の検索結果</p>
            <?= $output ?>
        </div>
    </main>
</body>

</html>