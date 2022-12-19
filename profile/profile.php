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

$id = $_SESSION['id'];




// DB接続
$pdo = connect_to_db();
// $sql = 'SELECT * FROM pailot_info WHERE user_id=:id';
$sql = 'SELECT * FROM users INNER JOIN pailot_info ON users.id = pailot_info.user_id INNER JOIN pailot_skill ON pailot_info.user_id = pailot_skill.user_id where users.id=:id ;';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);

try {
    $status = $stmt->execute();
} catch (PDOException $e) {
    echo json_encode(["sql error" => "{$e->getMessage()}"]);
    exit();
}

$result = $stmt->fetch(PDO::FETCH_ASSOC);

// echo '<pre>';
// var_dump($result);
// echo '</pre>'

$json_result = json_encode(($result));


// ヘッダー用
if (isset($_SESSION['user_type']) && $_SESSION['user_type'] === 1) {
    $headerOutput = '
        <header>
            <p> LOGO</p>
            <h1>AIR BASE</h1>
            <div class="header-nav">
                <!-- <a href="#"><img src="" alt=""></a> -->
                <p>ユーザー</p>
                <a href="../logout/logout.php">
                    <p>ログアウト</p>
                </a>
            </div>
        </header>

        <ul>
            <a href="">
                <li>案件検索</li>
            </a>
            <a href="">
                <li>パイロット検索</li>
            </a>
            <a href="">
                <li>気に入った案件</li>
            </a>
            <a href="">
                <li>受注管理</li>
            </a>
            <a href="profile.php">
                <li>プロフィール</li>
            </a>
        </ul>';
} else if (isset($_SESSION['user_type']) && $_SESSION['user_type'] === 0) {
    $headerOutput = '
        <header>
            <p> LOGO</p>
            <h1>AIR BASE</h1>
            <div class="header-nav">
                <!-- <a href="#"><img src="" alt=""></a> -->
                <p>ユーザー</p>
                <a href="../logout/logout.php">
                    <p>ログアウト</p>
                </a>
            </div>
        </header>

        <ul>
            <a href="">
                <li>案件検索</li>
            </a>
            <a href="">
                <li>パイロット検索</li>
            </a>
            <a href="">
                <li>気になるパイロット</li>
            </a>
            <a href="">
                <li>案件管理</li>
            </a>
            <a href="profile.php">
                <li>プロフィール</li>
            </a>
        </ul>
        ';
}


?>



<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/top.css">
    <title>AIR BASE</title>
</head>

<body>

    <?= $headerOutput ?>


    <p>パイロットプロフィール</p>

    <canvas id="myChart"></canvas>



    <img src='{$result["my_image"]}' height='150px'>
    <p><?= $result['kana'] ?></p>
    <p><?= $result['name'] ?></p>
    <p><?= $result['age'] ?></p>
    <p><?= $result['word'] ?></p>
    <p><?= $result['gender'] ?></p>
    <p><?= $result['work_area'] ?></p>
    <p><?= $result['status'] ?></p>
    <p><?= $result['achievement'] ?></p>
    <p><?= $result['pr'] ?></p>

    <a href="../Update/userEdit.php">
        <p>プロフィール更新</p>
    </a>


    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.1/chart.js"></script>
    <script>
        let obj_data = JSON.parse('<?= $json_result ?>');
        console.log(obj_data);


        var ctx = document.getElementById("myChart");
        var myChart = new Chart(ctx, {
            type: 'radar',
            data: {
                labels: ["空撮", "農薬散布", "測量・点検", "外壁調査", "災害", "レース", "マイクロドローン", "水中"],
                datasets: [{
                    label: "技術スキル",
                    data: [obj_data['shooting'], obj_data['agrochemical_spraying'], obj_data['measurement'], obj_data['outer_wall_survey'], obj_data['disaster'], obj_data['race'], obj_data['micro_drone'], obj_data['water']],
                    backgroundColor: "rgba(67, 133, 215, 0.5)",
                    borderColor: "rgb(0,0,128)",
                    pointBorderColor: "rgb(0,0,128)",
                    pointBackgroundColor: "rgb(0,0,128)",
                    pointRadius: 5,
                    pointHoverRadius: 15,
                    borderWidth: "50px"
                }]
            },
            options: {
                scales: {
                    r: {
                        max: 5, //グラフの最大値
                        min: 0, //グラフの最小値
                        ticks: {
                            stepSize: 1 //目盛間隔
                        },
                        pointLabels: {
                            color: "rgb(0,0,128)",
                            fontSize: 16, // 文字の大きさ
                            fontColor: "green" // 文字の色
                        }
                    }
                },
            }
        });
    </script>

</body>

</html>