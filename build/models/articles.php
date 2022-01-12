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


  $per_page_record = 14;         
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

    <div id="news" name="news" class="grid pt-12 auto-cols-max m-0  lg:grid-cols-4 gap-4  grid-cols-2  sm:grid-cols-2 lg:m-0 sm:mx-8  md:mx-16 ">

        <?php

        function typeToText($arg_1)
        {

          switch ($arg_1) {
            case 0:
              return "Tech News";
              break;
            case 1:
              return "Crypto World";
              break;
            case 2:
              return "Virtual reality";
              break;
            case 3:
              return "Biotechnology";
              break;
          }

        }

        $i = 0;
        while ($row = mysqli_fetch_array($rs_result)) {
          $i++;
          // Display each field of the records.    
          include "paginationGrid.php";
        };
        ?>
      </div>
    </div>


    <div class=" text-center  pt-6">

      <br>
      <div class="bg-blue-500 shadow-lg text-white shadow-cyan-500/50 inline-block pt-2 pb-3 px-4 rounded-2xl overflow-hidden">

        <?php 
        $query = "SELECT COUNT(*) FROM report";
        $rs_result = mysqli_query($con, $query);
        $row = mysqli_fetch_row($rs_result);
        $total_records = $row[0];

        $total_pages = ceil($total_records / $per_page_record);  
        $pagLink = "";


        echo "<a class='px-3 z-20 after:-z-10 after:w-[150px] hover: transition duration-300 after:h-[150px]  
        after:bg-blue-600 after:`` relative after:absolute after:block inline-block after:hover:top-[0.20] after:duration-300
        after:rotate-45 after:top-20 after:-left-16' href='index.php?page=";

        if ($page >= 2) {
          echo ($page - 1) . '#news';
        } else {
          echo 1 . '#news';
        }

        echo "'>  Prev </a>";


        for ($i = 1; $i <= $total_pages; $i++) {
          if ($i == $page) {
            $pagLink .= "<a class='px-3 z-20 after:-z-10 after:w-[150px] hover: transition duration-300 after:h-[150px]  
            after:bg-pink-500 after:`` relative after:absolute after:block inline-block after:-top-[178px] after:duration-300
            after:rotate-45 after:hover:-top-[178px] after:-left-[58px]' href='index.php?page="
              . $i . '#news' . "'>" . $i . " </a>";
          } else {
            $pagLink .= "<a class='px-3 z-20 after:-z-10 after:w-[150px] hover: transition duration-300 after:h-[150px]  
            after:bg-blue-700 after:`` relative after:absolute after:block inline-block after:top-20 after:duration-300
            after:rotate-45 after:hover:top-7 after:-left-[58px]' href='index.php?page=" . $i . '#news' . "'>" . $i . " </a>";
          }
        };
        echo $pagLink;


        echo "<a class='px-3 z-20 after:-z-10 after:w-[150px] hover: transition duration-300 after:h-[150px]  
          after:bg-blue-700 after:`` relative after:absolute after:block inline-block after:hover:top-[0.20] after:duration-300
          after:rotate-45 after:top-20 after:-left-7' href='index.php?page=";

        if ($page < $total_pages) {

          echo ($page + 1) . '#news';
        } else {
          echo $total_pages . '#news';
        }

        echo "'>  Next </a>";


        ?>
      </div>
    </div>

  </div>
  </div>
  </div>
</body>

</html>