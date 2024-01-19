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
		<title>output</title>
        <link rel="stylesheet"href="css/style.css">
	</head>
	<body>
    <button onclick="location.href='top.php'">トップに戻る</button>
<?php
    $pdo=new PDO($connect, USER, PASS);
    $sql=$pdo->prepare('insert into baseball(team_mei,sen_mei) value(?,?)') ;
    if (empty($_POST['team_mei'])) {
        echo 'チーム名を入力してください。';
    } else if (empty($_POST['sen_mei'])){
        echo '選手名を入力してください';
    } else  if($sql->execute([htmlspecialchars($_POST['team_mei']),$_POST['sen_mei']])){
        echo '追加に成功しました。';
    }else{
        echo '追加に失敗しました。';
    }
    
?>
        <hr>
        <table>
        <tr><th>選手id</th><th>チーム名</th><th>選手名</th></tr>

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
        <form action="input.php" method="post">
        <button type="submit">編集画面に戻る</button>
        </button>
</form>
    </body>
</html>