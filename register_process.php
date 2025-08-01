<?php
$pdo = new PDO('mysql:host=localhost;dbname=fund-admin;charset=utf8', 'root', '');

$sql = "INSERT INTO pipeline (startup_name, funding_stage, date_added, last_updated, evaluation_status, industry_focus)
        VALUES (:startup_name, :funding_stage, NOW(), NOW(), :evaluation_status, :industry_focus)";

$stmt = $pdo->prepare($sql);
$stmt->bindParam(':startup_name', $_POST['startup_name']);
$stmt->bindParam(':funding_stage', $_POST['funding_stage']);
$stmt->bindParam(':evaluation_status', $_POST['evaluation_status']);
$stmt->bindParam(':industry_focus', $_POST['industry_focus']);
$stmt->execute();

header("Location: index.php");
exit;