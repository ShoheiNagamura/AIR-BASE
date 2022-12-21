<?php
//未完成ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー
session_start();


//DB接続関数読み込み
include('../functions/connect_to_db.php');
include('../functions/check_session_id.php');




$id = $_POST['id'];
// var_dump($id);
// exit();

if (
    !isset($_POST['name']) || $_POST['name'] == '' ||
    !isset($_POST['kana']) || $_POST['kana'] == '' ||
    !isset($_POST['age']) || $_POST['age'] == '' ||
    !isset($_POST['gender']) || $_POST['gender'] == '' ||
    !isset($_FILES['my_image']) || $_FILES['my_image'] == '' ||
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
$my_image = $_FILES['my_image'];
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

// var_dump($shooting);
// exit();



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


// DB接続
$pdo = connect_to_db();

// 下記が未完成ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー

// SQL実行
$sql = 'UPDATE pailot_info SET name=:name, kana=:kana , age=:age, gender=:gender, my_image=:my_image, work_area=:work_area, status=:status, word=:word,achievement=:achievement, pr=:pr, updated_at=now() WHERE user_id=:id';

$stmt = $pdo->prepare($sql);


$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':kana', $kana, PDO::PARAM_STR);
$stmt->bindValue(':age', $age, PDO::PARAM_INT);
$stmt->bindValue(':gender', $gender, PDO::PARAM_STR);
$stmt->bindValue(':my_image', $save_path, PDO::PARAM_STR);
$stmt->bindValue(':work_area', $work_area, PDO::PARAM_STR);
$stmt->bindValue(':status', $status, PDO::PARAM_STR);
$stmt->bindValue(':word', $word, PDO::PARAM_STR);
$stmt->bindValue(':achievement', $achievement, PDO::PARAM_STR);
$stmt->bindValue(':pr', $pr, PDO::PARAM_STR);

try {
    $status = $stmt->execute();
} catch (PDOException $e) {
    echo json_encode(["sql error" => "{$e->getMessage()}"]);
    exit("OK");
}


$sql = 'UPDATE pailot_skill SET license=:license, shooting=:shooting , agrochemical_spraying=:agrochemical_spraying, measurement=:measurement, outer_wall_survey=:outer_wall_survey, disaster=:disaster, race=:race, micro_drone=:micro_drone, water=:water, updated_at=now() WHERE user_id=:id';

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



header("Location:../profile/profile.php");
exit();
