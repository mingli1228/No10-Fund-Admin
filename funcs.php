<?php
// エラー表示の設定
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// DB接続関数
function db_connect() {
    try {
        return new PDO('mysql:host=localhost;dbname=fund-admin;charset=utf8', 'root', '');
    } catch (PDOException $e) {
        exit('DB接続エラー: ' . $e->getMessage());
    }
}

function get_all_startups($pdo) {
    $sql = "SELECT * FROM pipeline ORDER BY date_added DESC";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}