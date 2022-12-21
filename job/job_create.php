<?php
// 案件登録画面ーーーーーーーーーーーーーーーー


session_start();

include('../functions/check_session_id.php');
include('../functions/connect_to_db.php');


$id = $_SESSION['id'];
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


if (
    !isset($_POST['jobName']) || $_POST['jobName'] == '' ||
    !isset($_POST['job_status']) || $_POST['job_status'] == '' ||
    !isset($_POST['reward']) || $_POST['reward'] == '' ||
    !isset($_POST['place']) || $_POST['place'] == '' ||
    !isset($_POST['start_date']) || $_POST['start_date'] == '' ||
    !isset($_POST['end_date']) || $_POST['end_date'] == '' ||
    !isset($_POST['transportation_expenses']) || $_POST['transportation_expenses'] == '' ||
    !isset($_POST['deadline']) || $_POST['deadline'] == '' ||
    !isset($_POST['detail']) || $_POST['detail'] == ''
) {
    exit('ParamError');
}


//消費税
$tax = 1.1;

$job_name = $_POST['jobName'];
$job_status = $_POST['job_status'];
$reward = $_POST['reward'] * $tax;
$place = $_POST['place'];
$start_date = $_POST['start_date'];
$end_date = $_POST['end_date'];
$transportation_expenses = $_POST['transportation_expenses'];
$deadline = $_POST['deadline'];
$detail = $_POST['detail'];


//関数定義ファイルから関数呼び出す
$pdo = connect_to_db();



$sql = 'INSERT INTO job_project(id, job_name,user_id, job_status, reward, place, start_date, end_date, transportation_expenses, deadline, detail,created_at, update_at)
        VALUES (NULL, :job_name ,:user_id, :job_status, :reward, :place, :start_date,:end_date, :transportation_expenses, :deadline, :detail,now(), now())';

$stmt = $pdo->prepare($sql);



$stmt->bindValue(':job_name', $job_name, PDO::PARAM_STR);
$stmt->bindValue(':user_id', $id, PDO::PARAM_INT);
$stmt->bindValue(':job_status', $job_status, PDO::PARAM_STR);
$stmt->bindValue(':reward', $reward, PDO::PARAM_INT);
$stmt->bindValue(':place', $place, PDO::PARAM_STR);
$stmt->bindValue(':start_date', $start_date, PDO::PARAM_STR);
$stmt->bindValue(':end_date', $end_date, PDO::PARAM_STR);
$stmt->bindValue(':transportation_expenses', $transportation_expenses, PDO::PARAM_STR);
$stmt->bindValue(':deadline', $deadline, PDO::PARAM_STR);
$stmt->bindValue(':detail', $detail, PDO::PARAM_STR);

try {
    $status = $stmt->execute();
} catch (PDOException $e) {
    echo json_encode(["sql error" => "{$e->getMessage()}"]);
    exit();
}

//画面遷移
header('Location:../top.php');
exit();
