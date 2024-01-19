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
		<title>delete</title>
        <link rel="stylesheet"href="css/style.css">
	</head>
	<body>
<?php
    $pdo=new PDO($connect, USER, PASS);
    $sql=$pdo->prepare('delete from baseball where sen_id=?');
    if ($sql->execute([$_POST['sen_id']])){
        echo '削除に成功しました。';
    }else{
        echo '削除に失敗しました。';
    }
?>
    <br><hr><br>
	<table>
    <tr><th>商品id</th><th>チーム名</th><th>選手名</th></tr>
<?php
    foreach ($pdo->query('select * from baseball') as $row) {
        echo '<tr>';
        echo '<td>', $row['sen_id'], '</td>';
        echo '<td>', $row['team_mei'], '</td>';
        echo '<td>', $row['sen_mei'], '</td>';
        echo '</tr>';
        echo "\n";
    }
?> 
</table>
<button onclick="location.href='top.php'">トップへ戻る</button>
    </body>
</html>

