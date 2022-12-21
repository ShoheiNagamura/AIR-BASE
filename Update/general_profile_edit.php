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

$email = $_SESSION['email'];


// DB接続
$pdo = connect_to_db();
// $sql = 'SELECT * FROM pailot_info WHERE user_id=:id';
$sql = 'SELECT * FROM users INNER JOIN general_info ON users.id = general_info.user_id  where users.id=:id ;';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);

try {
    $status = $stmt->execute();
} catch (PDOException $e) {
    echo json_encode(["sql error" => "{$e->getMessage()}"]);
    exit();
}

$result = $stmt->fetch(PDO::FETCH_ASSOC);

// echo '<pre>';
// var_dump($result);
// echo '</pre>';
// exit();

$json_result = json_encode(($result));


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
            <a href='./general_profile.php'>
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

    <form action="../Update/general_userUpdate.php" method="POST" class="general_profile-area">
        <h2 class="profile-title">一般ユーザープロフィール</h2>
        <h4>お名前</h4>
        <input type="text" id="name" name="name" placeholder="お名前を入力してください" value="<?= $result['name'] ?>">
        <h4>ニックネーム</h4>
        <input type="text" id="nickname" name="nickname" placeholder="ニックネームを入力してください" value="<?= $result['nickname'] ?>">
        <h4>ご年齢</h4>
        <input type="text" id="age" name="age" placeholder="ご年齢を入力してください" value="<?= $result['age'] ?>">
        <h4>性別</h4>
        <select name="gender" id="gender">
            <option value="男">男性</option>
            <option value="女">女性</option>
        </select>
        <button class="profile-edit-btn">保存</button>
    </form>
    <a href="../profile/general_profile.php" class="profile-edit-return">戻る</a>



</body>

</html>