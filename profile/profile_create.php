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


// var_dump($_POST['age']);
// var_dump($_FILES['my_image']);
// exit();

$id = $_SESSION['id'];

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

$_SESSION['name'] = $name;



if (isset($_FILES['my_image']) && $_FILES['my_image']['error'] == 0) {
    $uploaded_file_name = $_FILES['my_image']['name'];
    $temp_path  = $_FILES['my_image']['tmp_name'];
    $directory_path = '../img/';
    $extension = pathinfo($uploaded_file_name, PATHINFO_EXTENSION);
    $unique_name = date('YmdHis') . md5(session_id()) . '.' . $extension;
    $save_path = $directory_path . $unique_name;
    if (is_uploaded_file($temp_path)) {
        if (move_uploaded_file($temp_path, $save_path)) {
            chmod($save_path, 0644);
            $img = '<img src="' . $save_path . '" >';
        } else {
            exit('Error:アップロードできませんでした');
        }
    } else {
        exit('Error:画像がありません');
    }
} else {
    exit('画像が送信されていません');
};



//関数定義ファイルから関数呼び出す

//パイロット情報の登録処理
$pdo = connect_to_db();

$sql = 'INSERT INTO pailot_info(id, user_id, name, kana, age, gender, my_image, work_area, status, achievement, word, pr,created_at, updated_at)
        VALUES (NULL, :id , :name ,:kana, :age, :gender, :my_image,:work_area, :status, :achievement, :word, :pr ,now(), now())';

$stmt = $pdo->prepare($sql);

$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':kana', $kana, PDO::PARAM_STR);
$stmt->bindValue(':age', $age, PDO::PARAM_STR);
$stmt->bindValue(':gender', $gender, PDO::PARAM_STR);
$stmt->bindValue(':my_image', $save_path, PDO::PARAM_STR);
$stmt->bindValue(':work_area', $work_area, PDO::PARAM_STR);
$stmt->bindValue(':status', $status, PDO::PARAM_STR);
$stmt->bindValue(':achievement', $achievement, PDO::PARAM_STR);
$stmt->bindValue(':word', $word, PDO::PARAM_STR);
$stmt->bindValue(':pr', $pr, PDO::PARAM_STR);

try {
    $status = $stmt->execute();
} catch (PDOException $e) {
    echo json_encode(["sql error" => "{$e->getMessage()}"]);
    exit();
}


//パイロットスキルの登録処理
$sql = 'INSERT INTO pailot_skill(id, user_id, license, shooting, agrochemical_spraying, measurement, outer_wall_survey, disaster, race, micro_drone, water, created_at, updated_at)
        VALUES (NULL, :id , :license ,:shooting, :agrochemical_spraying, :measurement, :outer_wall_survey, :disaster, :race, :micro_drone, :water ,now(), now())';

$stmt = $pdo->prepare($sql);

$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$stmt->bindValue(':license', $license, PDO::PARAM_STR);
$stmt->bindValue(':shooting', $shooting, PDO::PARAM_INT);
$stmt->bindValue(':agrochemical_spraying', $agrochemical_spraying, PDO::PARAM_INT);
$stmt->bindValue(':measurement', $measurement, PDO::PARAM_INT);
$stmt->bindValue(':outer_wall_survey', $outer_wall_survey, PDO::PARAM_INT);
$stmt->bindValue(':disaster', $disaster, PDO::PARAM_INT);
$stmt->bindValue(':race', $race, PDO::PARAM_INT);
$stmt->bindValue(':micro_drone', $micro_drone, PDO::PARAM_INT);
$stmt->bindValue(':water', $water, PDO::PARAM_INT);

try {
    $status = $stmt->execute();
} catch (PDOException $e) {
    echo json_encode(["sql error" => "{$e->getMessage()}"]);
    exit();
}

//画面遷移
header('Location:../top.php');
exit();
