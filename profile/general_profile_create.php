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

if (
    !isset($_POST['name']) || $_POST['name'] == '' ||
    !isset($_POST['nickname']) || $_POST['nickname'] == '' ||
    !isset($_POST['age']) || $_POST['age'] == '' ||
    !isset($_POST['gender']) || $_POST['gender'] == ''
    // !isset($_POST['my_image']) || $_POST['my_image'] == '' ||
) {
    exit('ParamError');
}


// var_dump($_POST['name']);
// var_dump($_POST['nickname']);
// var_dump($_POST['age']);
// var_dump($_POST['gender']);
// exit();

$name = $_POST['name'];
$nickname = $_POST['nickname'];
$age = $_POST['age'];
$gender = $_POST['gender'];

$_SESSION['name'] = $name;


$pdo = connect_to_db();


$sql = 'INSERT INTO general_info(id, user_id, name, nickname, age, gender,created_at, update_at)
        VALUES (NULL, :id , :name ,:nickname, :age, :gender ,now(), now())';

$stmt = $pdo->prepare($sql);

$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':nickname', $nickname, PDO::PARAM_STR);
$stmt->bindValue(':age', $age, PDO::PARAM_STR);
$stmt->bindValue(':gender', $gender, PDO::PARAM_STR);


try {
    $status = $stmt->execute();
} catch (PDOException $e) {
    echo json_encode(["sql error" => "{$e->getMessage()}"]);
    exit();
}


//画面遷移
header('Location:../top.php');
exit();
