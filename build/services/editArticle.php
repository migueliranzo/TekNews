<?php

include "../../dbinfo.php";
    $servername = $xSERVERNAME;
    $username = $xUSERNAME;
    $password = $xPASSWORD;
    $dbname = $xDBNAME;



$pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);


$id = $_POST["articleID"];
$title = $_POST["title"];
$content = $_POST["content"];
$type = $_POST["type"];
$img = $_POST["img"];

session_start();

if(isset($_SESSION["dummyUser"]) && $_SESSION["dummyUser"] == true ){

    $defaultTable = "reportDummy";
}else{
    
    $defaultTable = "report";
}

if ( isset($_POST["delete"]) && $_POST["delete"] == 1) {

    try {

        $sql = "DELETE FROM $defaultTable WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        if ($stmt->execute([$id])) {
           echo "deleted";
        }
    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }

} else {

    if ($id == -1) {

        try {

            $sql = "INSERT INTO $defaultTable (title,description, type,imgpath) VALUES (?,?,?,?)";
            $stmt = $pdo->prepare($sql);
            if ($stmt->execute([$title, $content, $type, $img])) {
                echo $pdo->lastInsertId();
            }
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
    } else {


        try {
            echo $img;
            $sql = "UPDATE $defaultTable SET title=?, description=?, type=?, imgpath=? WHERE id=?";
            $stmt = $pdo->prepare($sql);
            if ( $stmt->execute([$title, $content, $type,$img, $id])){
                echo 'Updated';
            }
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
    }
}
