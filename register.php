<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>新規登録</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<header>
    <nav>
        <ul><li><b>Reactで作る</b></li>
            <li><a href="index.php">パイプラインリスト</a></li>
            <li><a href="register.php">新規登録</a></li>
            <li><a href="#">ログイン</a></li>
        </ul>
    </nav>
</header>

<main>
    <h1>新規登録</h1>

    <div style="background-color: white; padding: 32px; border-radius: 12px; box-shadow: 0 2px 6px rgba(0,0,0,0.05); max-width: 600px; margin: auto;">
        <form action="register_process.php" method="post">
            <div style="margin-bottom: 20px;">
                <label for="startup_name">会社名</label>
                <input type="text" id="startup_name" name="startup_name" required>
            </div>

            <div style="margin-bottom: 20px;">
                <label for="funding_stage">ステージ</label>
                <select id="funding_stage" name="funding_stage" required>
                    <option value="">選択してください</option>
                    <option value="Seed">Seed</option>
                    <option value="Series A">Series A</option>
                    <option value="Series B">Series B</option>
                </select>
            </div>

            <div style="margin-bottom: 20px;">
                <label for="evaluation_status">検討ステータス</label>
                <select id="evaluation_status" name="evaluation_status" required>
                    <option value="">選択してください</option>
                    <option value="初回面談">初回面談</option>
                    <option value="DD中">DD中</option>
                    <option value="出資見送り">出資見送り</option>
                </select>
            </div>

            <div style="margin-bottom: 24px;">
                <label for="industry_focus">分野</label>
                <input type="text" id="industry_focus" name="industry_focus" required>
            </div>

            <div style="text-align: right;">
                <button type="submit">登録する</button>
            </div>
        </form>
    </div>
</main>
</body>
</html>