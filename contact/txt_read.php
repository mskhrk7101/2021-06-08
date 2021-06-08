<?php
include('functions.php');

// DB接続情報
$dbn = 'mysql:dbname=gsacf_09;charset=utf8;port=3306;host=localhost';
$user = 'root';
$pwd = '';

// DB接続
try {
    $pdo = new PDO($dbn, $user, $pwd);
} catch (PDOException $e) {
    echo json_encode(["db error" => "{$e->getMessage()}"]);
    exit();
}
$sql = 'SELECT * FROM contactForm2_table ORDER BY name ASC LIMIT 5';

$stmt = $pdo->prepare($sql);
$status = $stmt->execute();

// // exit('ok');

if ($status == false) {
    $error = $stmt->errorInfo();
    exit('sqlError:' . $error[2]);
} else {
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $output = '';
    foreach ($result as $record) {
        //    $output .= "<tr><td>{$record['name']}</td><td>{$record['furigana']}</td><td>{$record['email']}</td><td>{$record['tel']}</td><td><{$record['sex']}/td><td><{$record['item']}/td><td>{$record['content']}</td></tr>"
    }
}

?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>会員登録登録詳細</title>
</head>

<body>
    <fieldset>
        <legend>登録詳細</legend>
        <a href="txt_input.php">入力画面</a>
        <table>
            <thead>
                <tr>
                    <th>リスト</th>
                </tr>
            </thead>
            <tbody>
                <?= $output ?>
            </tbody>
        </table>
    </fieldset>
</body>

</html>