<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>hopo-みんなの声を届けるアプリ-</title>
    <!-- CSS -->
    <link rel="stylesheet" href="home.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Kosugi&family=Noto+Sans+JP:wght@100..900&family=Sawarabi+Gothic&display=swap" rel="stylesheet">
</head>
<body>
    <div class="wrapper">
    <header class="header-container">
        <img src="logo.png" alt="Logo" class="logo">
        hopo
      </header> 

        <div class="kokuban-t2">
            <div class="container">

                <div class="side">
                      <nav>
                        <a href="home.html">教室</a>
                        <br>
                        <a href="意見を書く.html">意見を書く</a>
                        <br>
                        <a href="みんなの声.php">みんなの声</a>
                      </nav>
                </div>

                <div class="main">
                    <div class="keiziban">
                        <div class="midasi2">
                          みんなの声掲示板
                          <br>
                        </div>
                        <?php
                        // データベース接続情報
                        $host = "localhost";
                        $user = "root";
                        $password = "root";
                        $database = "opinions";

                        // データベースに接続
                        $conn = new mysqli($host, $user, $password, $database);

                        // 接続エラーがあるか確認
                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }

                        // いいねボタンがクリックされた場合の処理
                        if(isset($_POST['like_comment_id'])) {
                            $comment_id = $_POST['like_comment_id'];

                            // いいね数を更新
                            $updateLikeQuery = "UPDATE opinions SET likes = likes + 1 WHERE id = '$comment_id'";
                            $conn->query($updateLikeQuery);
                        }

                        // データベースの内容を表示
                        $selectQuery = "SELECT id, opinion, reazon, likes FROM opinions";
                        $result = $conn->query($selectQuery);



                        if ($result->num_rows > 0) {
                            echo "<div class='keiziban'>"; // コメントを横に並べるためのブロック開始
                            while ($row = $result->fetch_assoc()) {
                                echo "<div class='opinion'>"; // コメントブロック開始
                                echo "<div class='loose-leaf'>";
                                echo "<ul>";
                                echo "<p>";
                                echo "<c>意見：</c><br>" . wordwrap($row["opinion"], 30, "<br>") . "<br>"; // 折り返し
                                echo "<c>詳しい説明・理由：</c><br>" . wordwrap($row["reazon"], 28, "<br>"); // 折り返し
                                echo "<form method='post'>";
                                echo "<input type='hidden' name='like_comment_id' value='" . $row["id"] . "'>";
                                echo "<input type='image' src='heart.png' alt='いいね' class='like-button' onmouseover='this.src=\"heart2.png\"' onmouseout='this.src=\"heart.png\"'>";
                                echo "<span class='like-count'>" . $row["likes"] . "</span>"; // いいね数を表示
                                echo "</form>";
                                echo "</p>";
                                echo "</ul>";
                                echo "</div>";
                                echo "</div>"; // コメントブロック終了
                            }
                            echo "</div>"; // コメントを横に並べるためのブロック終了
                        } else {
                            echo "<p>No opinions found.</p>";
                        }
                        
                        
                        // データベース接続を閉じる
                        $conn->close();
                        ?>
                    </div>
                </div>
            </div>
        </div>


    </div>
</body>
</html>