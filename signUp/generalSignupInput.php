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

    <main class="Auth-area">
        <h1 class='Auth-title'>一般の方新規登録</h1>
        <p class="Auth-title-detail">一般の方はこちらからご登録ください</p>
        <form class="Auth-form" action="pilotUserCreate.php" method="POST">
            <label class="Auth-label" for="email">メールアドレス</label>
            <input class="Auth-input" type="email" id="email" name="email" placeholder="メールアドレスを入力してください">
            <label class="Auth-label" for="password">パスワード</label>
            <input class="Auth-input" type="password" id="password" name="password" placeholder="パスワードを入力してください">
            <label class="Auth-label" for="password">確認パスワード</label>
            <input class="Auth-input" type="password" id="conf-password" name="conf-password" placeholder="確認パスワードを入力してください">
            <input type="hidden" name="user_type" value="0">
            <button class="Auth-btn">登録</button>
        </form>
        <p><a class="auth-top-back" href="../signUp/signupTop.php">戻る</a></p>

    </main>

</body>

</html>