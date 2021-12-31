<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "technews";



$pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);


$id = $_POST["articleID"];
$title = $_POST["title"];
$content = $_POST["content"];
$type = $_POST["type"];



try {

   $sql = "UPDATE report SET title=?, description=?, type=? WHERE id=?";
   $stmt= $pdo->prepare($sql);
   $stmt->execute([$title, $content, $type, $id]);

    if ($stmt->execute([$title, $content, $type, $id])) {
        echo 'Updated';
    }


} catch (PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}
