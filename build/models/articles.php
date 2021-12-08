<?php 

include "../classes/report.php";

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "technews";

// Creamos conexion
$con = new mysqli($servername, $username, $password, $dbname);
// Verificamos conexion
if ($con->connect_error) {
  die("Connection failed: " . $con->connect_error);
}

$sql = "SELECT * from report";


    $result = $con->query($sql);
    $array = [];

    if ($result->num_rows > 0) {

       
           while($row = $result->fetch_assoc()) {
             
               $report = new Report($row["id"],$row["title"],$row["description"],$row["author"],$row["imgpath"],$row["date"]);
              
           array_push($array,$report);
        }
      } else {
        echo "0";
      }
      foreach ($array as $report) {
        echo  $report->get_id();
    }
    

?>