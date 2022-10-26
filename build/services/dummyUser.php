<?php

include "../../dbinfo.php";
    $servername = $xSERVERNAME;
    $username = $xUSERNAME;
    $password = $xPASSWORD;
    $dbname = $xDBNAME;
$type = $_POST["type"];
echo $type;
session_start();
$_SESSION["role"] =  $type;
$_SESSION["name"] = "testUser";
$_SESSION["userID"] = 999;
$_SESSION["dummyUser"] = true;

$pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

$currentReports = 'report';
$newReports = 'reportDummy';

$pdo->query("DROP TABLE IF EXISTS $newReports");
$pdo->query("CREATE TABLE $newReports LIKE $currentReports");
$pdo->query("INSERT $newReports SELECT * FROM $currentReports");

$currentUserFavs = 'user_report';
$newUserFavs = 'user_reportDummy';
$pdo->query("DROP TABLE IF EXISTS $newUserFavs");
$pdo->query("CREATE TABLE $newUserFavs LIKE $currentUserFavs");


header("Location: ../index.php");
?>