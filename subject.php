<?php
require __DIR__ . "\bd.php";

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if(!$id || $id <= 0) {
    http_response_code(400);
    die("Некорректное id");
}

$sql = "select id, name, email from user where id = :id";
$result = $pdo->prepare($sql);
$result->bindParam( ':id', $id, PDO::PARAM_INT);
$result->execute();
$row = $result->fetch(PDO::FETCH_ASSOC);
var_dump($row);
