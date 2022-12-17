<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AIR BASE</title>
</head>

<body>
    <header>
        <a href="../index.php">
            <h1 id="product-title">AIR BASE</h1>
        </a>
        <nav id="header-nav">
            <ul id="header-items">
                <li><a href="../notification.php">お知らせ</a></li>
                <li><a href="../login/loginTop.php">ログイン</a></li>
                <li><a href="../signUp/signupTop.php">会員登録</a></li>
            </ul>
            <ul id="sns-items">
                <li><a href="#">I</a></li>
                <li><a href="#">F</a></li>
                <li><a href="#">T</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <p><a href="../login/loginTop.php">戻る</a></p>

        <h1>パイロットログイン</h1>
        <p>パイロットに方はこちらからご登録ください</p>
        <form action="pilotUserCreate.php" method="POST">
            <label for="email">メールアドレス</label>
            <input type="email" id="email" name="email" placeholder="メールアドレスを入力してください">
            <label for="password">パスワード</label>
            <input type="password" id="password" name="password" placeholder="パスワードを入力してください">
            <button>ログイン</button>
        </form>
    </main>

</body>

</html>