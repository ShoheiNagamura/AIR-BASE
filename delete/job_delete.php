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

// データ受け取り
$id = $_GET['id'];

// var_dump($id);
// exit();
$pdo = connect_to_db();

$sql = 'DELETE FROM job_project WHERE id=:id';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);


try {
    $status = $stmt->execute();
} catch (PDOException $e) {
    echo json_encode(["sql error" => "{$e->getMessage()}"]);
    exit();
}

header("Location:../job/job_management.php");
exit();
