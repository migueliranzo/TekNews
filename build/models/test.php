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


      <table>
        <tbody>

          <?php
          while ($row = mysqli_fetch_array($rs_result)) {
            // Display each field of the records.    
          ?>

            <tr>
              <td><?php echo $row["id"]; ?></td>
              <td><?php echo $row["title"]; ?></td>
              <td><?php echo $row["description"]; ?></td>
              <td><?php echo $row["author"]; ?></td>
            </tr>

          <?php
          };
          ?>

        </tbody>
      </table>

      <div>

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
            $pagLink .= "<a href='index.php?page=" . $i . "'>   
                                                " . $i . " </a>";
          }
        };
        echo $pagLink;

        if ($page < $total_pages) {
          echo "<a href='index.php?page=" . ($page + 1) . "'>  Next </a>";
        }

        ?>

        <div class=" grid grid-flow-col grid-rows-2 grid-cols-3 gap-4">
          <div>
            1
          </div>
          <div class="col-start-3">
            2
          </div>
          <div>
            3
          </div>
          <div>
            4
          </div>
          <div class="row-start-1 col-start-2 col-span-2">
            5
          </div>
        </div>

      </div>
    </div>
  </div>
</body>

</html>