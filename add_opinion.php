<?php
// データベース接続情報
$host = "localhost";
$user = "root";
$password = "root";
$database = "opinions";

// POSTデータ取得
$opinion = $_POST['opinion'];
$reazon = $_POST['reazon'];

// データベースに接続
$conn = new mysqli($host, $user, $password, $database);

// 接続エラーがあるか確認
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// opinionsテーブルが存在しない場合は作成
$createTableQuery = "CREATE TABLE IF NOT EXISTS opinions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    opinion TEXT NOT NULL,
    reazon TEXT NOT NULL,
    likes INT NOT NULL DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
$conn->query($createTableQuery);

// データベースに値を挿入
$insertQuery = "INSERT INTO opinions (opinion, reazon) VALUES ('$opinion', '$reazon')";
$result = $conn->query($insertQuery);

if (!$result) {
    die("Error: " . $conn->error);
}

// データベース接続を閉じる
$conn->close();

// フォーム送信後、元のページにリダイレクト
header("Location: みんなの声.php");
exit();
?>
