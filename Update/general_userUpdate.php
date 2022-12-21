<?php

session_start();


//DB接続関数読み込み
include('../functions/check_session_id.php');
include('../functions/connect_to_db.php');

if ($_SESSION['user_type'] == 0) {
    check_session_id();
} else {
    header("Location:../login/loginTop.php");
    exit();
}

// var_dump($_POST);
// exit();

// 入力項目のチェック
if (
    !isset($_POST['name']) || $_POST['name'] == '' ||
    !isset($_POST['nickname']) || $_POST['nickname'] == '' ||
    !isset($_POST['age']) || $_POST['age'] == '' ||
    !isset($_POST['gender']) || $_POST['gender'] == ''
) {
    exit('ParamError');
}

$id = $_SESSION['id'];
// var_dump($id);
// exit();



$name = $_POST['name'];
$nickname = $_POST['nickname'];
$age = $_POST['age'];
$gender = $_POST['gender'];

// var_dump($id);
// exit();


// DB接続
$pdo = connect_to_db();


$sql = 'UPDATE general_info SET name=:name, nickname=:nickname, age=:age, gender=:gender,  update_at=now() WHERE user_id=:user_id';


$stmt = $pdo->prepare($sql);
$stmt->bindValue(':user_id', $id, PDO::PARAM_INT);
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':nickname', $nickname, PDO::PARAM_STR);
$stmt->bindValue(':age', $age, PDO::PARAM_INT);
$stmt->bindValue(':gender', $gender, PDO::PARAM_STR);


try {
    $status = $stmt->execute();
} catch (PDOException $e) {
    echo json_encode(["sql error" => "{$e->getMessage()}"]);
    exit();
}

header("Location:../profile/general_profile.php");
exit();
