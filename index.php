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
            <h2>FUNCTION</h2>
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



        <!-- 案件一覧を10件ほど表示 ------------------------------------- -->
        <section id="top-job-list">
            <h2>PROJECT LIST</h2>
            <p class="top-job-sub-title">一部案件例</p>
            <ul class="top-job-list-items">
                <div class="top-job-list-item">
                    <table>
                        <p class="top-job-status">募集中</p>
                        <tr class="top-job-title">
                            <th>案件</th>
                            <td>福岡市上空の撮影</td>
                        </tr>
                        <tr class="top-job-place">
                            <th>場所</th>
                            <td>福岡県福岡市</td>
                        </tr>
                        <tr class="top-job-reward">
                            <th>報酬金額</th>
                            <td>50,000円</td>
                        </tr>
                        <tr class="top-job-date">
                            <th>応募期限</th>
                            <td>2022年12月06日〜2022年12月06日</td>
                        </tr>
                        <tr>
                            <th>募集締切日</th>
                            <td>2023年3月15日</td>
                        </tr>
                    </table>
                </div>

                <div class="top-job-list-item">
                    <table>
                        <p class="top-job-status">募集中</p>
                        <tr class="top-job-title">
                            <th>案件</th>
                            <td>屋根の点検</td>
                        </tr>
                        <tr class="top-job-place">
                            <th>場所</th>
                            <td>宮崎県宮崎市</td>
                        </tr>
                        <tr class="top-job-reward">
                            <th>報酬金額</th>
                            <td>12,000円</td>
                        </tr>
                        <tr class="top-job-date">
                            <th>応募期限</th>
                            <td>2022年12月06日〜2022年12月06日</td>
                        </tr>
                        <tr>
                            <th>募集締切日</th>
                            <td>2023年3月15日</td>
                        </tr>
                    </table>
                </div>

                <div class="top-job-list-item">
                    <table>
                        <p class="top-job-status">募集中</p>
                        <tr class="top-job-title">
                            <th>案件</th>
                            <td>制作会社案件への撮影同行</td>
                        </tr>
                        <tr class="top-job-place">
                            <th>場所</th>
                            <td>長崎県長崎市</td>
                        </tr>
                        <tr class="top-job-reward">
                            <th>報酬金額</th>
                            <td>82,000円</td>
                        </tr>
                        <tr class="top-job-date">
                            <th>応募期限</th>
                            <td>2022年12月06日〜2022年12月06日</td>
                        </tr>
                        <tr>
                            <th>募集締切日</th>
                            <td> 2023年3月15日</td>
                        </tr>
                    </table>
                </div>
            </ul>

            <a href="./login/loginTop.php">もっと見る</a>

        </section>

        <!-- パイロットリストを１０件ほど表示 ----------------------------------------------------------->
        <section id="top-pilot-list">
            <h2>PILOT LIST</h2>
            <p class="top-pilot-sub-title">パイロットリスト</p>
            <ul class="top-pilot-items">
                <li class="top-pilot-item">
                    <img class="top-pilot-image" src="./image/shohei.png" alt="">
                    <p class="top-pilot-kana">Nagamura Shohei</p>
                    <p class="top-pilot-name">永村 奨平</p>
                    <p class="top-pilot-text">空撮が得意です</p>
                </li>
                <li class="top-pilot-item">
                    <img class="top-pilot-image" src="./image/oni.png" alt="">
                    <p class="top-pilot-kana">Onizuka Ryohei</p>
                    <p class="top-pilot-name">鬼さん</p>
                    <p class="top-pilot-text">空撮が得意です</p>
                </li>
                <li class="top-pilot-item">
                    <img class="top-pilot-image" src="./image/hunayama.png" alt="">
                    <p class="top-pilot-kana">Funayama Teppei</p>
                    <p class="top-pilot-name">船山 哲平</p>
                    <p class="top-pilot-text">空撮が得意です</p>
                </li>
                <li class="top-pilot-item">
                    <img class="top-pilot-image" src="./image/uekari.png" alt="">
                    <p class="top-pilot-kana">Uekariya Haruka</p>
                    <p class="top-pilot-name">上仮屋</p>
                    <p class="top-pilot-text">空撮が得意です</p>
                </li>
                <li class="top-pilot-item">
                    <img class="top-pilot-image" src="./image/hirae.png" alt="">
                    <p class="top-pilot-kana">Hirae mizuki</p>
                    <p class="top-pilot-name">平江 瑞樹</p>
                    <p class="top-pilot-text">空撮が得意です</p>
                </li>
            </ul>

            <a href="./login/loginTop.php">もっと見る</a>
        </section>

        <!-- 利用の流れを解説ーーーーーーーーーーーー -->
        <section id="top-flow-list">
            <h2>FLOW</h2>
            <p class="top-flow-sub-title">ご利用方法</p>
            <div class="top-flow">
                <div class="top-pilot-flow">
                    <ul class="top-pilot-flow-items">
                        <h3>パイロットの方</h3>
                        <li class="top-pilot-flow-item">
                            <p class="top-pilot-step-num">STEP 1</p>
                            <div class="top-pilot-flow-detal">
                                <p class="top-pilot-flow-title">新規登録 / ログイン</p>
                                <p class="top-pilot-flow-text">まずは会員登録をお願いします。</p>
                                <a class="top-pilot-flow-btn" href="./signUp/signupTop.php"><button>新規会員登録</button></a>
                            </div>
                        </li>
                        <li class="top-pilot-flow-item">
                            <p class="top-pilot-step-num">STEP 2</p>
                            <div class="top-pilot-flow-detal">
                                <p class="top-pilot-flow-title">パイロットスキルを登録</p>
                                <p class="top-pilot-flow-text">活動する上で大事なパイロットスキルを<br>ご登録ください</p>
                            </div>
                        </li>
                        <li class="top-pilot-flow-item">
                            <p class="top-pilot-step-num">STEP 3</p>
                            <div class="top-pilot-flow-detal">
                                <p class="top-pilot-flow-title">案件を探す</p>
                                <p class="top-pilot-flow-text">ご登録いただくことで案件の検索ことが<br>可能となります。</p>
                            </div>
                        </li>
                        <li class="top-pilot-flow-item">
                            <p class="top-pilot-step-num">STEP 4</p>
                            <div class="top-pilot-flow-detal">
                                <p class="top-pilot-flow-title">案件へ応募</p>
                                <p class="top-pilot-flow-text">ご登録いただくことで案件への応募が<br>可能となります。</p>
                            </div>
                        </li>
                        <li class="top-pilot-flow-item">
                            <p class="top-pilot-step-num">STEP 5</p>
                            <div class="top-pilot-flow-detal">
                                <p class="top-pilot-flow-title">契約</p>
                                <p class="top-pilot-flow-text">案件内容についてご依頼者様と<br>しっかりとしたヒアリングを<br>行った上でご契約ください</p>
                            </div>
                        </li>
                        <li class="top-pilot-flow-item">
                            <p class="top-pilot-step-num">STEP 6</p>
                            <div class="top-pilot-flow-detal">
                                <p class="top-pilot-flow-title">飛行を実施</p>
                                <p class="top-pilot-flow-text">案件内容に応じて安全に飛行を<br>おこなってください</p>
                            </div>
                        </li>
                        <li class="top-pilot-flow-item">
                            <p class="top-pilot-step-num">STEP 7</p>
                            <div class="top-pilot-flow-detal">
                                <p class="top-pilot-flow-title">パイロットの評価</p>
                                <p class="top-pilot-flow-text">依頼者様に評価をしていただきます。<br>評価いただくことにより<br>パイロットとしての信頼につながります。</p>
                            </div>
                        </li>
                    </ul>
                </div>

                <!-- ーーーーーーーーーーーーーーーーーーーーーー -->

                <div class="top-general-flow">
                    <ul class="top-pilot-flow-items">
                        <h3>ご依頼者の方</h3>
                        <li class="top-pilot-flow-item">
                            <p class="top-pilot-step-num">STEP 1</p>
                            <div class="top-pilot-flow-detal">
                                <p class="top-pilot-flow-title">新規登録 / ログイン</p>
                                <p class="top-pilot-flow-text">まずは会員登録をお願いします。</p>
                                <a class="top-pilot-flow-btn" href="./signUp/signupTop.php"><button>新規会員登録</button></a>
                            </div>
                        </li>
                        <li class="top-pilot-flow-item">
                            <p class="top-pilot-step-num">STEP 2</p>
                            <div class="top-pilot-flow-detal">
                                <p class="top-pilot-flow-title">プロフィール情報を登録</p>
                                <p class="top-pilot-flow-text">プロフィール情報を<br>ご登録ください</p>
                            </div>
                        </li>
                        <li class="top-pilot-flow-item">
                            <p class="top-pilot-step-num">STEP 3</p>
                            <div class="top-pilot-flow-detal">
                                <p class="top-pilot-flow-title">案件を登録・パイロットを検索</p>
                                <p class="top-pilot-flow-text">案件登録、パイロットを検索し、<br>パイロットをお探しください</p>
                            </div>
                        </li>
                        <li class="top-pilot-flow-item">
                            <p class="top-pilot-step-num">STEP 4</p>
                            <div class="top-pilot-flow-detal">
                                <p class="top-pilot-flow-title">パイロットからの応募又はご依頼</p>
                                <p class="top-pilot-flow-text">登録された案件への依頼、パイロットへ直接の<br>ご依頼も可能となります</p>
                            </div>
                        </li>
                        <li class="top-pilot-flow-item">
                            <p class="top-pilot-step-num">STEP 5</p>
                            <div class="top-pilot-flow-detal">
                                <p class="top-pilot-flow-title">契約</p>
                                <p class="top-pilot-flow-text">パイロットと案件内容のしっかりとした<br>すり合わせをおこなった上で<br>ご契約ください</p>
                            </div>
                        </li>
                        <li class="top-pilot-flow-item">
                            <p class="top-pilot-step-num">STEP 6</p>
                            <div class="top-pilot-flow-detal">
                                <p class="top-pilot-flow-title">飛行を実施</p>
                                <p class="top-pilot-flow-text">実施日にパイロットが飛行を実施</p>
                            </div>
                        </li>
                        <li class="top-pilot-flow-item">
                            <p class="top-pilot-step-num">STEP 7</p>
                            <div class="top-pilot-flow-detal">
                                <p class="top-pilot-flow-title">パイロットの評価</p>
                                <p class="top-pilot-flow-text">パイロット評価をしていただきます。<br>評価いただくことにより<br>パイロットの技術向上につながります。</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </section>

    </main>


    <footer>
        <small>© 2022 shohei nagamura.</small>
    </footer>
</body>

</html>