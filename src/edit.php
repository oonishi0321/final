<?php
const SERVER = 'mysql220.phy.lolipop.lan';
const DBNAME = 'LAA1517476-final';
const USER = 'LAA1517476';
const PASS = 'Pass0321';

$connect = 'mysql:host='.SERVER.';dbname='.DBNAME.';charset=utf8';
?>
<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="UTF-8">
		<title>edit</title>
		<link rel="stylesheet"href="css/style.css">
	</head>
	<body>
    <table>
    <tr><th>選手id</th><th>チーム名</th><th>選手名</th></tr>
<?php
    $pdo=new PDO($connect, USER, PASS);  
    $sql=$pdo->prepare('select * from baseball where sen_id=?');
    $sql->execute([$_POST['sen_id']]);
	foreach ($sql as $row) {
        echo '<tr>';
		echo '<form action="kosin.php" method="post">';
        echo '<td> ';
		echo '<input type="text" name="sen_id" value="', $row['sen_id'], '">';
		echo '</td> ';
		echo '<td>';
		echo '<input type="text" name="sen_mei" value="', $row['team_mei'], '">';
		echo '</td> ';
		echo '<td>';
		echo '<input type="text" name="sen_mei" value="', $row['sen_mei'], '">';
		echo '</td> ';
		echo '<td><input type="submit" value="更新"></td>';
		echo '</form>';
        echo '</tr>';
		echo "\n";
	}
?>
</table>
<button onclick="location.href='top.php'">トップへ戻る</button>
    </body>
</html>

