<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "technews";



$pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

if (isset($_POST["rppassword"])) {

    $user = $_POST["username"];
    $pass = $_POST["password"];
    $rppass = $_POST["rppassword"];

    if ($pass !== $rppass) {
        echo " <div class='ml-7 mt-2 flex'><div class='bg-red-700 z-20  p-2 text-white rounded-md'> Passwords not matching</div></div>";

        exit();
    }

    try {

        $sql = " SELECT COUNT(*) FROM `user` WHERE name = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(1, $user, PDO::PARAM_STR);
        $stmt->execute();
        $row =  $stmt->fetch();
        $records = $row[0];

        if ($records == 0) {

            $sql = " INSERT INTO `user` (name, password ,role) VALUES (?,?,0)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(1, $user, PDO::PARAM_STR);
            $stmt->bindParam(2, $pass, PDO::PARAM_STR);
            $stmt->execute();
            $row =  $stmt->fetch();
          
                $_SESSION["role"] = 0;
                $_SESSION["name"] = $user;
                $_SESSION["userID"] = $pdo->lastInsertId();
        
                echo "<script>window.location.href='index.php'</script>";
                exit();
           
        } else {
            echo " <div class='ml-7 mt-2 flex'><div class='bg-red-700 z-20  p-2 text-white rounded-md'>Username already in use</div></div>";
        }
    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
} else {

    if (isset($_POST["username"])) {

        $user = $_POST["username"];
        $pass = $_POST["password"];


        try {

            $sql = " SELECT * FROM `user` WHERE name = ? AND password = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(1, $user, PDO::PARAM_STR);
            $stmt->bindParam(2, $pass, PDO::PARAM_STR);
            $stmt->execute();
            $row =  $stmt->fetch();
            $records = $row[0];
            if ($records != 0) {
                $_SESSION["role"] = $row["role"];
                $_SESSION["name"] = $row["name"];
                $_SESSION["userID"] = $row["id"];
                echo "<script>window.location.href='index.php'</script>";
                exit();
            } else {
                echo " <div class='ml-7 mt-2 flex'><div class='bg-red-700 z-20  p-2 text-white rounded-md'> User not found try again</div></div>";
            }
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
    }
}

?>