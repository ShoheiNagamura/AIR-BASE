<?php
//未完成ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー



//DB接続関数読み込み
include('./functions/connect_to_db.php');
include('./functions/check_session_id.php');


session_start();

if ($_SESSION['user_type'] == 1) {
    check_session_id();
} else {
    header("Location:../login/loginTop.php");
    exit();
}

if (
    !isset($_POST['name']) || $_POST['name'] == '' ||
    !isset($_POST['kana']) || $_POST['kana'] == '' ||
    !isset($_POST['age']) || $_POST['age'] == '' ||
    !isset($_POST['gender']) || $_POST['gender'] == '' ||
    // !isset($_POST['my_image']) || $_POST['my_image'] == '' ||
    !isset($_POST['work_area']) || $_POST['work_area'] == '' ||
    !isset($_POST['status']) || $_POST['status'] == '' ||
    !isset($_POST['word']) || $_POST['word'] == '' ||
    !isset($_POST['achievement']) || $_POST['achievement'] == '' ||
    !isset($_POST['pr']) || $_POST['pr'] == '' ||
    !isset($_POST['license']) || $_POST['license'] == '' ||
    !isset($_POST['shooting']) || $_POST['shooting'] == '' ||
    !isset($_POST['agrochemical_spraying']) || $_POST['agrochemical_spraying'] == '' ||
    !isset($_POST['measurement']) || $_POST['measurement'] == '' ||
    !isset($_POST['outer_wall_survey']) || $_POST['outer_wall_survey'] == '' ||
    !isset($_POST['disaster']) || $_POST['disaster'] == '' ||
    !isset($_POST['race']) || $_POST['race'] == '' ||
    !isset($_POST['micro_drone']) || $_POST['micro_drone'] == '' ||
    !isset($_POST['water']) || $_POST['water'] == ''
) {
    exit('ParamError');
}


$id = $_SESSION['id'];


$name = $_POST['name'];
$kana = $_POST['kana'];
$age = $_POST['age'];
$gender = $_POST['gender'];
// $my_image = $_POST['my_image'];
$work_area = $_POST['work_area'];
$status = $_POST['status'];
$word = $_POST['word'];
$achievement = $_POST['achievement'];
$pr = $_POST['pr'];

$license = $_POST['license'];
$shooting = $_POST['shooting'];
$agrochemical_spraying = $_POST['agrochemical_spraying'];
$measurement = $_POST['measurement'];
$outer_wall_survey = $_POST['outer_wall_survey'];
$disaster = $_POST['disaster'];
$race = $_POST['race'];
$micro_drone = $_POST['micro_drone'];
$water = $_POST['water'];


// DB接続
$pdo = connect_to_db();




// 下記が未完成ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー

// SQL実行
$sql = 'UPDATE order_users SET name=:name, email=:email , update_time=now() WHERE id=:id';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':email', $email, PDO::PARAM_STR);



try {
    $status = $stmt->execute();
} catch (PDOException $e) {
    echo json_encode(["sql error" => "{$e->getMessage()}"]);
    exit();
}

header("Location:mypageOrder.php");
exit();
