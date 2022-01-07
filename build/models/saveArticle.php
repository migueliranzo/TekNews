<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "technews";



$pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);


$article = $_POST["articleID"];
$user = $_POST["userID"];
$status = $_POST["alreadyFav"];

if ($status) {

    try {

        $sql = "DELETE FROM user_report WHERE report_id = ? AND user_id = ? ";
        $stmt = $pdo->prepare($sql);
        if ($stmt->execute([$article, $user])) {
            echo "deleted";
        }
    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }

} else {

    try {

        $sql = "INSERT INTO user_report (report_id,user_id) VALUES (?,?)";
        $stmt = $pdo->prepare($sql);
        if ($stmt->execute([$article, $user])) {
            echo "inserted";
        }
    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
}
