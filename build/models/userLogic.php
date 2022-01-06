<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "technews";

ob_start();


$pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);



    $user = $_POST["username"];
    $pass = $_POST["password"];

    
  
try {
           
    $sql = " SELECT * FROM `user` WHERE name = ? and password = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(1, $user, PDO::PARAM_STR);
    $stmt->bindParam(2, $pass, PDO::PARAM_STR);
    $stmt->execute();
    $row =  $stmt->fetch();
    $total_records = $row[0];

    if($total_records != 0){
      
    
        
        echo "found";
       
        
    }else{
        echo " not found";
    }


} catch (PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}


?>