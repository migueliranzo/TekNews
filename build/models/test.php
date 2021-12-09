<html>

<head>
  <title>Pagination</title>
  <style>

  </style>
</head>

<body>
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


  $per_page_record = 5;  // Number of entries to show in a page.   
  // Look for a GET variable page if not found default is 1.        
  if (isset($_GET["page"])) {
    $page  = $_GET["page"];
  } else {
    $page = 1;
  }

  $start_from = ($page - 1) * $per_page_record;

  $query = "SELECT * FROM report LIMIT $start_from, $per_page_record"; //query que coje los resultados exactos, de 0 a 5, de 5 a 10....
  $rs_result = mysqli_query($con, $query);
  ?>

  <div>
    <br>
    <div>





      <div class="grid grid-flow-col grid-rows-2 grid-cols-4 gap-4">


        <?php
        $i = 0;
        while ($row = mysqli_fetch_array($rs_result)) {
          $i++;
          // Display each field of the records.    
        ?>

          <?php

          switch ($i) {
            case 1:

              echo "<div class='col-span-2 row-span-2'>";
              echo " <div class='flex bg-yellow-50 flex-col'>";
              echo "<div class='flex flex-1'>
              <img src=";
              echo $row["imgpath"];
              echo " ></div>";

              echo "  <div class='flex flex-1'>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ultricies varius enim laoreet laoreet. Suspendisse at eros sit amet augue ultricies eleifend. 
            In quis ultricies magna.
              </div>";
              echo "</div>";
              echo "</div>";
              break;

            case 2:
              echo "<div>";
              echo " <div class='flex bg-yellow-50 flex-col'>";
              echo "<div class='flex flex-1'>
              <img src=";
              echo $row["imgpath"];
              echo " ></div>";

              echo "  <div class='flex flex-1'>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ultricies varius enim laoreet laoreet. Suspendisse at eros sit amet augue ultricies eleifend. 
            In quis ultricies magna.
              </div>";
              echo "</div>";
              echo "</div>";
              break;

            case 3:
              echo "<div>";
              echo " <div class='flex bg-yellow-50 flex-col'>";
              echo "<div class='flex flex-1'>
              <img src=";
              echo $row["imgpath"];
              echo " ></div>";

              echo "  <div class='flex flex-1'>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ultricies varius enim laoreet laoreet. Suspendisse at eros sit amet augue ultricies eleifend. 
            In quis ultricies magna.
              </div>";
              echo "</div>";
              echo "</div>";
              break;


            case 4:
              echo "<div>";
              echo " <div class='flex bg-yellow-50 flex-col'>";
              echo "<div class='flex flex-1'>
              <img src=";
              echo $row["imgpath"];
              echo " ></div>";

              echo "  <div class='flex flex-1'>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ultricies varius enim laoreet laoreet. Suspendisse at eros sit amet augue ultricies eleifend. 
            In quis ultricies magna.
              </div>";
              echo "</div>";
              echo "</div>";
              break;


            case 5:
              echo "<div>";
              echo " <div class='flex bg-yellow-50 flex-col'>";
              echo "<div class='flex flex-1'>
              <img src=";
              echo $row["imgpath"];
              echo " ></div>";

              echo "  <div class='flex flex-1'>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ultricies varius enim laoreet laoreet. Suspendisse at eros sit amet augue ultricies eleifend. 
            In quis ultricies magna.
              </div>";
              echo "</div>";
              echo "</div>";
              break;
          }

          ?>

        <?php
        };
        ?>
      </div>
    </div>



    <div class="grid grid-flow-col grid-rows-2 grid-cols-3 gap-4  ">

      <div class="flex flex-col transition duration-200 overflow-hidden group">

        <div class="flex flex-1 transform group-hover:scale-110 transition duration-300 ease">
          <img src="img/test.jpg" alt="">
        </div>
        <div class="transform group-hover:-translate-y-5 transition duration-300 ease bg-white " >
          &spac\
        </div>
        <div class=" flex flex-1 border-solid border-b-2 border-r-2 rounded-b-2xl p-0 m-0 rounded-l-none bg-white
          border-red-600  pb-3 z-10 ">
     
          <div  style="--tw-scale-x: 1.012;" class="container pt-2 border-red-600 border-solid border-r-2  transform group-hover:-translate-y-5 transition duration-300 ease bg-white ">
        
          Lorem ipsum dolor sit amet,  consectetur adipiscing elit. Curabitur ultricies varius enim laoreet laoreet. Suspendisse at eros sit amet augue ultricies eleifend.
          In quis ultricies magna.
          </div>
        </div>

      </div>

      <div>
       
      </div>
      <div>
        3
      </div>
      <div>
        4
      </div>
      <div class="col-span-2">
        5
      </div>
    </div>



    <?php //Calculation of pages needed to paginate and display of page numbers
    $query = "SELECT COUNT(*) FROM report";
    $rs_result = mysqli_query($con, $query);
    $row = mysqli_fetch_row($rs_result);
    $total_records = $row[0];

    echo "</br>";

    $total_pages = ceil($total_records / $per_page_record);  // Number of pages required.
    $pagLink = "";

    if ($page >= 2) {
      echo "<a href='index.php?page=" . ($page - 1) . "'>  Prev </a>";
    }

    for ($i = 1; $i <= $total_pages; $i++) {
      if ($i == $page) {
        $pagLink .= "<a href='index.php?page="
          . $i . "'>" . $i . " </a>";
      } else {
        $pagLink .= "<a href='index.php?page=" . $i . "'>" . $i . " </a>";
      }
    };
    echo $pagLink;

    if ($page < $total_pages) {
      echo "<a href='index.php?page=" . ($page + 1) . "'>  Next </a>";
    }

    ?>



  </div>
  </div>
  </div>
</body>

</html>