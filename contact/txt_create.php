<?php
include('functions.php');

if (
    !isset($_POST['name']) || $_POST['name'] == '' ||
    !isset($_POST['furigana']) || $_POST['furigana'] == '' ||
    !isset($_POST['email']) || $_POST['email'] == '' ||
    !isset($_POST['tel']) || $_POST['tel'] == '' ||
    !isset($_POST['sex']) || $_POST['sex'] == '' ||
    !isset($_POST['item']) || $_POST['item'] == '' ||
    !isset($_POST['content']) || $_POST['content'] == ''
) {
    exit('Param Error');
}



$name = $_POST["name"];
$furigana = $_POST["furigana"];
$email = $_POST["email"];
$tel = $_POST["tel"];
$sex = $_POST["sex"];
$item = $_POST["item"];
$content = $_POST["content"];

// var_dump($name);
// var_dump($furigana);
// var_dump($email);
// var_dump($tel);
// var_dump($sex);
// var_dump($item);
// var_dump($content);

// DB接続
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
// exit('ok');

$sql = 'INSERT INTO contactForm2_table (id, name, furigana, email, tel, sex, item, content, created_at, updated_at)VALUES  (NULL, :name, :furigana, :email, :tel, :sex, :item, :content, sysdate(), sysdate())';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':furigana', $furigana, PDO::PARAM_STR);
$stmt->bindValue(':email', $email, PDO::PARAM_STR);
$stmt->bindValue(':tel', $tel, PDO::PARAM_STR);
$stmt->bindValue(':sex', $sex, PDO::PARAM_STR);
$stmt->bindValue(':item', $item, PDO::PARAM_STR);
$stmt->bindValue(':content', $content, PDO::PARAM_STR);
$status = $stmt->execute();

// exit('ok');

if ($status == false) {
    $error = $stmt->errorInfo();
    exit('sqlError:' . $error[2]);
} else {
    header('Location:thanks.php');
}
