<?php

include "../../dbinfo.php";
    $servername = $xSERVERNAME;
    $username = $xUSERNAME;
    $password = $xPASSWORD;
    $dbname = $xDBNAME;


$pdo = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8mb4", $username, $password);


$article = $_POST["articleID"];
$user = $_POST["userID"];
$status = $_POST["alreadyFav"];

session_start();

if(isset($_SESSION["dummyUser"]) && $_SESSION["dummyUser"] == true ){

    $defaultTable = "user_reportdummy";
}else{
    
    $defaultTable = "user_report";
}


if ($status) {

    try {

        $sql = "DELETE FROM $defaultTable  WHERE report_id = ? AND user_id = ? ";
        $stmt = $pdo->prepare($sql);
        if ($stmt->execute([$article, $user])) {
            echo "deleted";
        }
    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }

} else {

    try {

        $sql = "INSERT INTO $defaultTable  (report_id,user_id) VALUES (?,?)";
        $stmt = $pdo->prepare($sql);
        if ($stmt->execute([$article, $user])) {
            echo "inserted";
        }
    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
}
