<?php

$name = $_POST['name'];
$furigana = $_POST['furigana'];
$email = $_POST['email'];
$tel = $_POST['tel'];
$sex = $_POST['sex'];
$item = $_POST['item'];
$content = $_POST['content'];

try {
    $pdo = new PDO('mysql:dbname=gsacf_09;charset=utf8;port=3306;host=localhost', 'root', '');
} catch (PDOException $e) {
    echo json_encode(["db error" => "{$e->getMessage()}"]);
    exit();
}
$sql = 'UPDATE contactForm2_table SET name=:name, furigana=:furigana, email=:email, tel=:tel, sex=:sex, item=:item, content=:content, created_at=sysdate(), updated_at=sysdate() WHERE id=:id';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':furigana', $furigana, PDO::PARAM_STR);
$stmt->bindValue(':email', $email, PDO::PARAM_STR);
$stmt->bindValue(':tel', $tel, PDO::PARAM_STR);
$stmt->bindValue(':sex', $sex, PDO::PARAM_STR);
$stmt->bindValue(':item', $item, PDO::PARAM_STR);
$stmt->bindValue(':content', $content, PDO::PARAM_STR);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

if ($status == false) {
    $error = $stmt->errorInfo();
    exit('QueryError:' . $error[2]);
} else {
    header("Location:select.php");
    exit;
}
