<?php
// DB接続
$pdo = new PDO('mysql:host=localhost;dbname=fund-admin;charset=utf8', 'root', '');

// IDを取得
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// pipelineテーブルから会社情報取得
$stmt = $pdo->prepare("SELECT * FROM pipeline WHERE id = :id");
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->execute();
$startup = $stmt->fetch(PDO::FETCH_ASSOC);

// 面談記録（まだinterviewsテーブルは未作成、仮の構造）
// $interview_sql = "SELECT * FROM interviews WHERE startup_id = :id ORDER BY updated_at DESC";
// $interview_stmt = $pdo->prepare($interview_sql);
// $interview_stmt->bindParam(':id', $id, PDO::PARAM_INT);
// $interview_stmt->execute();
// $interviews = $interview_stmt->fetchAll(PDO::FETCH_ASSOC);
$interviews = []; // ← 仮の空配列
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($startup['startup_name']) ?> - 詳細</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<header>
    <nav>
        <ul>
            <li><a href="index.php">パイプラインリスト</a></li>
            <li><a href="register.php">新規登録</a></li>
            <li><a href="#">ログイン</a></li>
        </ul>
    </nav>
</header>

<main>
    <h1><?= htmlspecialchars($startup['startup_name']) ?> の詳細</h1>

    <div style="background:white; padding:24px; border-radius:12px; box-shadow: 0 2px 6px rgba(0,0,0,0.05); margin-bottom:40px; max-width: 800px;">
        <p><strong>ステージ：</strong><?= htmlspecialchars($startup['funding_stage']) ?></p>
        <p><strong>登録日：</strong><?= htmlspecialchars($startup['date_added']) ?></p>
        <p><strong>最終更新日：</strong><?= htmlspecialchars($startup['last_updated']) ?></p>
        <p><strong>検討ステータス：</strong><?= htmlspecialchars($startup['evaluation_status']) ?></p>
        <p><strong>分野：</strong><?= htmlspecialchars($startup['industry_focus']) ?></p>
    </div>

    <h2>面談記録</h2>

    <?php if (count($interviews) === 0): ?>
        <p>面談記録用のボタンをつける</p>
        <p>この下に歴代の面談記録を表示する予定。</p>
        <p>「まだ面談記録はありません。」</p>
    <?php else: ?>
        <div style="max-width:800px;">
            <?php foreach ($interviews as $log): ?>
                <div style="background:white; padding:16px; margin-bottom:16px; border-radius:8px; box-shadow: 0 1px 4px rgba(0,0,0,0.04);">
                    <p style="font-size: 13px; color: #888;">更新日：<?= htmlspecialchars($log['updated_at']) ?></p>
                    <p><?= nl2br(htmlspecialchars($log['content'])) ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</main>
</body>
</html>