<?php
// パイロット登録機能

include("../functions/connect_to_db.php");
// include("./functions/check_session_id.php");

// var_dump($_POST);
// exit();

if (
    !isset($_POST['email']) || $_POST['email'] == '' ||
    !isset($_POST['password']) || $_POST['password'] == ''
) {
    exit('ParamError');
}

$email = $_POST['email'];
$password = $_POST['password'];
$user_type = $_POST['user_type'];

// パスワードのはハッシュ化
$pass_hash = password_hash($password, PASSWORD_DEFAULT);

//関数定義ファイルからDB接続関数呼び出す
$pdo = connect_to_db();

// クエリを生成
$sql = 'INSERT INTO users (id, email, password, user_type,created_at, updated_at) VALUES (NULL, :email, :password,:user_type, now(), now())';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':email', $email, PDO::PARAM_STR);
$stmt->bindValue(':password', $pass_hash, PDO::PARAM_STR);
$stmt->bindValue(':user_type', $user_type, PDO::PARAM_INT);

try {
    $status = $stmt->execute();
} catch (PDOException $e) {
    echo json_encode(["sql error" => "{$e->getMessage()}"]);
    exit();
}

//画面遷移
header('Location:../login/pilot_login.php');
exit();
