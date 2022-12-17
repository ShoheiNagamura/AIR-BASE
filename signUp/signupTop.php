<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>AIR BASE</title>
</head>

<body>
    <header>
        <a id="product-title" href="../index.php">
            <h1>AIR BASE</h1>
        </a>
        <nav id="header-nav">
            <ul id="header-items">
                <li class="nav-item"><a href="../notification.php">お知らせ</a></li>
                <li class="nav-item"><a href="../login/loginTop.php">ログイン</a></li>
                <li class="nav-item"><a href="../signUp/signupTop.php">会員登録</a></li>
                <li class="nav-item"><a href="">マイページ</a></li>
            </ul>
            <ul id="sns-items">
                <li class="sns-item"><a href="#">I</a></li>
                <li class="sns-item"><a href="#">F</a></li>
                <li class="sns-item"><a href="#">T</a></li>
            </ul>
        </nav>
    </header>

    <main id="top-main">
        <p><a href="../index.php">戻る</a></p>

        <div id="login-area">
            <div class="pilotAuth">
                <h2>パイロット登録</h2>
                <button id="top-sign-btn">
                    <a href="./pilotSignupInput.php">
                        <p>新規登録</p>
                    </a>
                </button>
                <!-- <button id="top-login-btn">
                    <p>ログイン</p>
                </button> -->
                <p class="choiceGeneral-SignUp">パイロットの方はこちらから<br>パイロットとしてお仕事をお探しの方は<br>上記からご登録ください</p>
            </div>

            <div class="generalAuth">
                <h2>一般の方登録</h2>
                <button id="top-sign-btn">
                    <a href="./generalSignupInput.php">
                        <p>新規登録</p>
                    </a>
                </button>
                <!-- <button id="top-login-btn">
                    <p>ログイン</p>
                </button> -->
                <p class="choicePilot-SignUp">一般の方はこちらから<br>案件一覧をご覧になりたい方、ご依頼を掲載したい方は<br>上記からご登録ください</p>
            </div>
        </div>
    </main>

</body>

</html>