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
		<title>kosin.php</title>
        <link rel="stylesheet"href="css/style.css">
	</head>
	<body>
<?php
    $pdo=new PDO($connect, USER, PASS);
    $sql=$pdo->prepare('update goods set team_mei=?,sen_mei=? where sen_id=?');
    if (empty($_POST['sen_mei'])) {
        echo 'チーム名を入力してください。';
    }else if (empty($_POST['shohin_ex'])) {
        echo '選手名を入力してください。';
    } else if($sql->execute([htmlspecialchars($_POST['team_mei']),$_POST['sen_mei'],$_POST['sen_id']])){
        echo '更新に成功しました。';
    }else{
        echo '更新に失敗しました。';
    }
    
?>
        <hr>
        <table>
        <tr><th>選手id</th><th>チーム名</th><th>選手名</tr>

<?php
foreach ($pdo->query('select * from goods') as $row) {
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

