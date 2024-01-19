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
    <meta http-equiv="Cache-Control" content="no-cache">
    <meta charset="UTF-8">
    <title>top</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>選手一覧</h1>
    <table>
        <tr><th>選手id</th><th>チーム名</th><th>選手名</th></tr>
        <button onclick="location.href='input.php'">選手登録</button>
        <?php
        $pdo=new PDO($connect, USER, PASS);
        foreach ($pdo->query('select * from baseball') as $row) {
            echo '<tr>';
            echo '<td>', $row['sen_id'], '</td>';
            echo '<td>', $row['team_mei'], '</td>';
            echo '<td>', $row['sen_mei'], '</td>';
            echo '<td>';
            echo '<form action="edit.php" method="post">';
            echo '<input type="hidden" name="sen_id" value="', $row['sen_id'], '">';
            echo '<button type="submit">更新</button>';
            echo '</form>';
            echo '</td>';
            echo '<td>';
            echo '<form action="delete.php" method="post">';
            echo '<input type="hidden" name="sen_id" value="', $row['sen_id'], '">';
            echo '<button type="submit">削除</button>';
            echo '</form>';
            echo '</td>';
            echo '</tr>';
            echo "\n";
        }
        ?>
    </table>
</body>
</html>
