<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require_once 'funcs.php';
$pdo = db_connect();
$results = get_all_startups($pdo);
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>パイプライン一覧</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<header>
    <nav><h1 class="fund_name">ここにファンド名とロゴが入る</h1>
        <ul> 
            <li><a href="index.php">パイプラインリスト</a></li>
            <li><a href="register.php">新規登録</a></li>
            <li>|→これより先ダミー</li>
            <li><a href="#">ポートフォリオ管理</a></li>
            <li><a href="#">ファンド管理</a></li>
            <li><a href="#">ログイン</a></li>
        </ul>
    </nav>
</header>
<main>
    <h1>パイプライン一覧</h1>
    <table>
        <thead>
        <tr>
            <th>会社名</th>
            <th>ステージ</th>
            <th>登録日</th>
            <th>最終更新</th>
            <th>検討ステータス</th>
            <th>分野</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($results as $row): ?>
            <tr>
<td><a href="detail.php?id=<?= htmlspecialchars($row['id']) ?>">
    <?= htmlspecialchars($row['startup_name']) ?>
</a></td>
                <td><?= htmlspecialchars($row['funding_stage']) ?></td>
                <td><?= htmlspecialchars($row['date_added']) ?></td>
                <td><?= htmlspecialchars($row['last_updated']) ?></td>
                <td><?= htmlspecialchars($row['evaluation_status']) ?></td>
                <td><?= htmlspecialchars($row['industry_focus']) ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</main>
</body>
</html>