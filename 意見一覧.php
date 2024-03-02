<?php
// データベース接続情報
$host = "127.0.0.1";
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
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Opinions</title>
</head>
<body>

<?php
// opinions_tableからデータを取得
$sql = "SELECT * FROM opinions_table";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // データがある場合、テーブルを作成してデータを表示
    echo "<table border='1'>
            <tr>
                <th>opinion</th>
                <th>reazon</th>
            </tr>";

    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>".$row["opinion"]."</td>
                <td>".$row["reazon"]."</td>
              </tr>";
    }

    echo "</table>";
} else {
    echo "データが見つかりませんでした";
}

// データベース接続を閉じる
$conn->close();
?>

<!-- Code injected by live-server -->
<script>
	// <![CDATA[  <-- For SVG support
	if ('WebSocket' in window) {
		(function () {
			function refreshCSS() {
				var sheets = [].slice.call(document.getElementsByTagName("link"));
				var head = document.getElementsByTagName("head")[0];
				for (var i = 0; i < sheets.length; ++i) {
					var elem = sheets[i];
					var parent = elem.parentElement || head;
					parent.removeChild(elem);
					var rel = elem.rel;
					if (elem.href && typeof rel != "string" || rel.length == 0 || rel.toLowerCase() == "stylesheet") {
						var url = elem.href.replace(/(&|\?)_cacheOverride=\d+/, '');
						elem.href = url + (url.indexOf('?') >= 0 ? '&' : '?') + '_cacheOverride=' + (new Date().valueOf());
					}
					parent.appendChild(elem);
				}
			}
			var protocol = window.location.protocol === 'http:' ? 'ws://' : 'wss://';
			var address = protocol + window.location.host + window.location.pathname + '/ws';
			var socket = new WebSocket(address);
			socket.onmessage = function (msg) {
				if (msg.data == 'reload') window.location.reload();
				else if (msg.data == 'refreshcss') refreshCSS();
			};
			if (sessionStorage && !sessionStorage.getItem('IsThisFirstTime_Log_From_LiveServer')) {
				console.log('Live reload enabled.');
				sessionStorage.setItem('IsThisFirstTime_Log_From_LiveServer', true);
			}
		})();
	}
	else {
		console.error('Upgrade your browser. This Browser is NOT supported WebSocket for Live-Reloading.');
	}
	// ]]>
</script>
</body>
</html>
