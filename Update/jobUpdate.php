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

if (
    !isset($_POST['job_name']) || $_POST['job_name'] == '' ||
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

// $id = $_SESSION['id'];
$id = $_POST['id'];
$job_name = $_POST['job_name'];
$job_status = $_POST['job_status'];
$place = $_POST['place'];
$reward = $_POST['reward'];
$start_date = $_POST['start_date'];
$end_date = $_POST['end_date'];
$transportation_expenses = $_POST['transportation_expenses'];
$deadline = $_POST['deadline'];
$detail = $_POST['detail'];

// DB接続
$pdo = connect_to_db();

$sql = 'UPDATE job_project SET job_name=:job_name, job_status=:job_status, reward=:reward, place=:place, start_date=:start_date, end_date=:end_date, transportation_expenses=:transportation_expenses,deadline=:deadline,detail=:detail,update_at=now() WHERE id=:id';

$stmt = $pdo->prepare($sql);

$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$stmt->bindValue(':job_name', $job_name, PDO::PARAM_STR);
$stmt->bindValue(':job_status', $job_status, PDO::PARAM_STR);
$stmt->bindValue(':reward', $reward, PDO::PARAM_STR);
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

header("Location:../pages/job_list.php");
exit();
