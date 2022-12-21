<?php
session_start();

include('../functions/check_session_id.php');
include('../functions/connect_to_db.php');

$email = $_SESSION['email'];
// var_dump($email);
// exit();

//関数定義ファイルからDB接続関数呼び出す
$pdo = connect_to_db();

$sql = 'SELECT * FROM job_project ';
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
            <a href=''>
                <li>案件検索</li>
            </a>
            <a href='../pages/pilot_list.php'>
                <li>パイロット検索</li>
            </a>
            <a href=''>
                <li>気になるパイロット</li>
            </a>
            <a href=''>
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
            <div class='seller-items'>
                <p class='seller-item seller-name'>{$record["job_name"]}</p>
                <p class='seller-item seller-name'>{$record["job_status"]}</p>
                <p class='seller-item seller-name'>{$record["reward"]}</p>
                <p class='seller-item seller-name_kana'>{$record["place"]}</p>
                <p class='seller-item seller-update_time'>{$record["start_date"]} ~ {$record["end_date"]}</p>
                <p class='seller-item seller-update_time'>{$record["transportation_expenses"]}</p>
                <p class='seller-item seller-update_time'>{$record["deadline"]}</p>
                <p class='seller-item seller-update_time'>{$record["detail"]}</p>
                <p class='seller-item seller-update_time'>{$record["created_at"]}</p>
                <p class='seller-item seller-update_time'>{$record["update_at"]}</p>
            </div>
        ";
    }
} else if (isset($_SESSION['user_type']) && $_SESSION['user_type'] === 0) {
    foreach ($result as $record) {
        $output .= "
            <div class='seller-items'>
                <p class='seller-item seller-name'>{$record["job_name"]}</p>
                <p class='seller-item seller-name'>{$record["job_status"]}</p>
                <p class='seller-item seller-name'>{$record["reward"]}</p>
                <p class='seller-item seller-name_kana'>{$record["place"]}</p>
                <p class='seller-item seller-update_time'>{$record["start_date"]} ~ {$record["end_date"]}</p>
                <p class='seller-item seller-update_time'>{$record["transportation_expenses"]}</p>
                <p class='seller-item seller-update_time'>{$record["deadline"]}</p>
                <p class='seller-item seller-update_time'>{$record["detail"]}</p>
                <p class='seller-item seller-update_time'>{$record["created_at"]}</p>
                <p class='seller-item seller-update_time'>{$record["update_at"]}</p>
                <a href = './sellerDetail.php'><button>詳しく</button>
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

    <?= $output ?>
</body>

</html>