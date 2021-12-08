<?php 

include "classes/report.php";

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

    if (!isset ($_GET['page']) ) {  
        $page = 1;  
    } else {  
        $page = $_GET['page'];  
    }  

    $results_per_page = 2;  
    $page_first_result = ($page-1) * $results_per_page;  
    

    $query = "select *from report";  
    $result = mysqli_query($con, $query);  
    $number_of_result = mysqli_num_rows($result);  
    
    //determine the total number of pages available  
    $number_of_page = ceil ($number_of_result / $results_per_page);  


    $query = "SELECT *FROM report LIMIT " . $page_first_result . ',' . $results_per_page;  
    $result = mysqli_query($con, $query);  
      
    //display the retrieved result on the webpage  
    while ($row = mysqli_fetch_array($result)) {  
        echo $row['id'] . ' ' . $row['title'] . '</br>';  
            }  

            for($page = 1; $page<= $number_of_page; $page++) {  
                echo '<a href = "index.php?page=' . $page . '">' . $page . ' </a>';  

            }  

?>