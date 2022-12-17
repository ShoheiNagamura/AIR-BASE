<?php
// ログイン処理


// セッションスタート
session_start();

// DB接続用関数読み込み
include("../functions/connect_to_db.php");

$email = $_POST["email"];
$password = $_POST["password"];

//DB設定用関数呼び出し
$pdo = connect_to_db();

// クエリを用意
$sql = 'SELECT * FROM users WHERE email=:email';

// SQLをセット
$stmt = $pdo->prepare($sql);
//SQLインジェクション対策のためにバインド変数でセット
$stmt->bindValue(':email', $email, PDO::PARAM_STR);

//トライキャッチの中でクエリ実行
try {
    $status = $stmt->execute();
} catch (PDOException $e) {
    echo json_encode(["sql error" => "{$e->getMessage()}"]);
    exit();
}

$val = $stmt->fetch(PDO::FETCH_ASSOC);

// echo "<pre>";
// var_dump($val);
// echo "</pre>";
// exit();


if ($val === false) {
    echo 'メールアドレスが登録されていません。';
    exit();
}

if (password_verify($_POST['password'], $val['password']) && $val['user_type'] === 1) {
    $_SESSION = array();
    $_SESSION['session_id'] = session_id();
    $_SESSION['id'] = $val['id'];
    $_SESSION['email'] = $val['email'];
    $_SESSION['user_type'] = $val['user_type'];
    $_SESSION['created_at'] = $val['created_at'];
    $_SESSION['updated_at'] = $val['updated_at'];
    header("Location:../index.php");
} else {
    echo "<p>ログイン情報に誤りがあります</p>";
    echo "<a href=../login/loginTop.php>ログイン</a>";
    exit();
}
