<?php

?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>AIR BASE</title>
</head>

<body>
    <header>
        <a id="product-title" href="./index.php">
            <h1>AIR BASE</h1>
        </a>
        <nav id="header-nav">
            <ul id="header-items">
                <li class="nav-item"><a href="./notification.php">お知らせ</a></li>
                <li class="nav-item"><a href="./login/loginTop.php">ログイン</a></li>
                <li class="nav-item"><a href="./signUp/signupTop.php">会員登録</a></li>
                <li class="nav-item"><a href="">マイページ</a></li>
            </ul>
            <ul id="sns-items">
                <li class="sns-item"><a href="#">I</a></li>
                <li class="sns-item"><a href="#">F</a></li>
                <li class="sns-item"><a href="#">T</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section class="main-image">
            <img src="./image/main.jpeg" alt="">
        </section>

        <!-- 主な機能を表示。丸型で -->

        <!-- プロダクト紹介ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー -->


        <section class="product-introduction">
            <h2>ドローンパイロットと依頼者を繋ぐ<br>マッチンサービス</h2>
            <p class="text1">AIR BASEは操縦士資格を持ち、信頼のおけるドローンパイロットとドローンで<br>問題解決をしたい方を繋ぐ
                マッチングプラットフォームです。</p>
            <p class="text2">※サービスを利用するには国家資格・民間資格問わず操縦士資格の所有が必要となります。</p>

            <h4>まずは下記よりご登録ください</h4>
            <div class="product-signup-btn">
                <a href="./signUp/signupTop.php">新規会員登録</a>
            </div>
        </section>




        <!-- 機能紹介ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー -->


        <section class="function-introduction">
            <h2>function</h2>
            <p class="function-sub-title">主な機能一覧</p>
            <ul class="function-items">
                <li class="function-item">
                    <img class="func-image" src="./image/ドローンの無料アイコン5.png" alt="">
                    <p class="func-title">パイロット検索</p>
                    <p class="func-text">多くのパイロットの中から<br>技術のあるパイロットを<br>探すことができます。</p>
                </li>
                <li class="function-item">
                    <img class="func-image" src="./image/検索アイコン1.png" alt="">
                    <p class="func-title">案件検索</p>
                    <p class="func-text">得意な案件、興味のある案件を<br>検索できることで案件の<br>受注の早さにつながります。</p>
                </li>
                <li class="function-item">
                    <img class="func-image" src="./image/星アイコン8.png" alt="">
                    <p class="func-title">お気に入り機能</p>
                    <p class="func-text">依頼したことのある<br>パイロットをお気に入り<br>することで
                        時間の案件依頼を<br>スムーズに行うことができます。
                    </p>
                </li>
                <li class="function-item">
                    <img class="func-image" src="./image/履歴書アイコン1.png" alt="">
                    <p class="func-title">プロフィール閲覧</p>
                    <p class="func-text">閲覧できることで、パイロットの<br>得意なスキルや飛行時間、<br>把握した上で依頼すること<br>ができます。</p>
                </li>
                <li class="function-item">
                    <img class="func-image" src="./image/イイネの手のフリーアイコン.png" alt="">
                    <p class="func-title">パイロット評価機能</p>
                    <p class="func-text">評価機能を活用することで<br>パイロットのサービス向上に<br>役立ちます。</p>
                </li>
            </ul>
        </section>

        <!-- 案件一覧を10件ほど表示 -->
        <h2>function</h2>
        <!-- もっと見るを押すとログイン画面に遷移 -->

        <!-- パイロットリストを１０件ほど表示 -->
        <h2>パイロットリスト</h2>
        <!-- もっと見るを押すとログイン画面に遷移 -->

        <!-- 利用の流れを解説ーーーーーーーーーーーー -->

    </main>


</body>

</html>