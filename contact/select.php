<?php
$dbn = 'mysql:dbname=gsacf_09;charset=utf8;port=3306;host=localhost';
$user = 'root';
$pwd = '';

try {
    $pdo = new PDO($dbn, $user, $pwd);
} catch (PDOException $e) {
    echo json_encode(["db error" => "{$e->getMessage()}"]);
    exit();
}
$stmt = $pdo->prepare('SELECT * FROM contactForm2_table');
$status = $stmt->execute();

$view = '';
if ($status == false) {
    $error = $stmt->errorInfo();
    exit('ErrorQuery:' . $error[2]);
} else {
    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
        // $view .= '<p>' . $result['id'] . '-' . $result['name'] . '</p>';
        $view .= '<p>';
        $view .= '<a href="edit.php?id=' . $result['id'] . '">';
        $view .= $result['name'];
        $view .= '</a>';
        $view .= '　';
        $view .= '<a href="delete.php?id=' . $result['id'] . '">';
        $view .= '[削除]';
        $view .= '</a>';
        $view .= '</p>';
    }
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>登録情報一覧</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div>
        <h1>株式会社 G's ACADEMY-FUKUOKA-</h1>
    </div>
    <div>
        <h2>登録情報一覧</h2>
    </div>
    <div>
        <div><?= $view ?></div>
    </div>
</body>

</html>