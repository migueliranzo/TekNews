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



          ?>
              <div class="flex flex-col col-span-2 row-span-2  duration-200 overflow-hidden group cursor-pointer">

                <div class="flex flex-1 transform group-hover:scale-110  duration-300 ease-out">
                  <img src=' <?php echo $row["imgpath"]; ?> ' alt="">
                </div>
                <div class="transform px-3 pb-1 group-hover:-translate-y-3 pt-2  text-xs font-bold text-blue-600 duration-300 ease-out bg-white ">
                  <?php echo $row["type"]; ?>
                </div>
                <div class="flex flex-1 border-solid border-b border-r rounded-b-2xl p-0 m-0 rounded-l-none bg-white
                  border-gray-400  pb-8 z-10 group-hover:border-blue-800  ">
                  <div style="--tw-scale-x: 1.006;" class="container border-gray-400 group-hover:border-blue-800 border-solid border-r transform group-hover:-translate-y-3  duration-300 ease-out bg-white ">
                    <?php echo $row["title"]; ?>
                  </div>
                </div>

              </div>

            <?php

              break;

            case 2:

            ?>
              <div class="flex flex-col  duration-200 overflow-hidden group cursor-pointer">

                <div class="flex flex-1 transform group-hover:scale-110  duration-300 ease-out">
                  <img src=' <?php echo $row["imgpath"]; ?> ' alt="">
                </div>
                <div class="transform px-3 pb-1 group-hover:-translate-y-3 pt-2  text-xs font-bold text-blue-600 duration-300 ease-out bg-white ">
                  <?php echo $row["type"]; ?>
                </div>
                <div class="flex flex-1 border-solid border-b border-r rounded-b-2xl p-0 m-0 rounded-l-none bg-white
                  border-gray-400  pb-8 z-10 group-hover:border-blue-800  ">
                  <div style="--tw-scale-x: 1.006;" class="container border-gray-400 group-hover:border-blue-800 border-solid border-r transform group-hover:-translate-y-3  duration-300 ease-out bg-white ">
                    <?php echo $row["title"]; ?>
                  </div>
                </div>

              </div>

            <?php

              break;

            case 3:
            ?>
              <div class="flex flex-col  duration-200 overflow-hidden group cursor-pointer">

                <div class="flex flex-1 transform group-hover:scale-110  duration-300 ease-out">
                  <img src=' <?php echo $row["imgpath"]; ?> ' alt="">
                </div>
                <div class="transform px-3 pb-1 group-hover:-translate-y-3 pt-2  text-xs font-bold text-blue-600 duration-300 ease-out bg-white ">
                  <?php echo $row["type"]; ?>
                </div>
                <div class="flex flex-1 border-solid border-b border-r rounded-b-2xl p-0 m-0 rounded-l-none bg-white
                  border-gray-400  pb-8 z-10 group-hover:border-blue-800  ">
                  <div style="--tw-scale-x: 1.006;" class="container border-gray-400 group-hover:border-blue-800 border-solid border-r transform group-hover:-translate-y-3  duration-300 ease-out bg-white ">
                    <?php echo $row["title"]; ?>
                  </div>
                </div>

              </div>

            <?php
              break;


            case 4:
            ?>
              <div class="flex flex-col  duration-200 overflow-hidden group cursor-pointer">

                <div class="flex flex-1 transform group-hover:scale-110  duration-300 ease-out">
                  <img src=' <?php echo $row["imgpath"]; ?> ' alt="">
                </div>
                <div class="transform px-3 pb-1 group-hover:-translate-y-3 pt-2  text-xs font-bold text-blue-600 duration-300 ease-out bg-white ">
                  <?php echo $row["type"]; ?>
                </div>
                <div class="flex flex-1 border-solid border-b border-r rounded-b-2xl p-0 m-0 rounded-l-none bg-white
                  border-gray-400  pb-8 z-10 group-hover:border-blue-800  ">
                  <div style="--tw-scale-x: 1.006;" class="container border-gray-400 group-hover:border-blue-800 border-solid border-r transform group-hover:-translate-y-3  duration-300 ease-out bg-white ">
                    <?php echo $row["title"]; ?>
                  </div>
                </div>

              </div>

            <?php
              break;


            case 5:
            ?>
              <div class="flex flex-col  duration-200 overflow-hidden group cursor-pointer">

                <div class="flex flex-1 transform group-hover:scale-110  duration-300 ease-out">
                  <img src=' <?php echo $row["imgpath"]; ?> ' alt="">
                </div>
                <div class="transform px-3 pb-1 group-hover:-translate-y-3 pt-2  text-xs font-bold text-blue-600 duration-300 ease-out bg-white ">
                  <?php echo $row["type"]; ?>
                </div>
                <div class="flex flex-1 border-solid border-b border-r rounded-b-2xl p-0 m-0 rounded-l-none bg-white
                  border-gray-400  pb-8 z-10 group-hover:border-blue-800  ">
                  <div style="--tw-scale-x: 1.006;" class="container border-gray-400 group-hover:border-blue-800 border-solid border-r transform group-hover:-translate-y-3  duration-300 ease-out bg-white ">
                    <?php echo $row["title"]; ?>
                  </div>
                </div>

              </div>

          <?php
              break;
          }

          ?>

        <?php
        };
        ?>
      </div>
    </div>



    <div class="grid pt-28 grid-flow-col grid-rows-2 grid-cols-4 gap-4">

      <div class="flex flex-col  duration-200 overflow-hidden group cursor-pointer col-span-2 row-span-2">

        <div class=" px-0 font-bold pb-1  pt-2  text-xs text-blue-600 duration-300 ease-out bg-white ">
          News
        </div>

        <div class="flex p-0 m-0 bg-white pb-8 z-10  ">

          <div class="  duration-300 ease-out font-bold bg-white text-4xl ">
            One race to go but at the end of a blockbuster season, who will be crowned champion in Abu Dhabi?
          </div>

        </div>

        <div class="flex   group-hover:scale-110  duration-300 ease-out">
          <img src="img/test4.jpg" alt="">
        </div>

      </div>

      <div class="flex flex-col  duration-200 overflow-hidden group cursor-pointer">

        <div class="flex flex-1 transform group-hover:scale-110  duration-300 ease-out">
          <img src="img/test4.jpg" alt="">
        </div>
        <div class="transform px-3 pb-1 group-hover:-translate-y-3 pt-2   text-xs font-bold text-blue-600 duration-300 ease-out bg-white ">
          News
        </div>
        <div class="flex flex-1 border-solid border-b border-r rounded-b-2xl p-0 m-0 rounded-l-none bg-white
          border-gray-400  pb-8 z-10 group-hover:border-blue-800  ">

          <div style="--tw-scale-x: 1.006;" class="container  border-gray-400 group-hover:border-blue-800 border-solid border-r transform group-hover:-translate-y-3  duration-300 ease-out bg-white ">

            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ultricies varius enim laoreet laoreet. Suspendisse at eros.
          </div>
        </div>

      </div>
      <div class="flex flex-col  duration-200 overflow-hidden group cursor-pointer">

        <div class="flex flex-1 transform group-hover:scale-110  duration-300 ease-out">
          <img src="img/test4.jpg" alt="">
        </div>
        <div class="transform px-3 pb-1 group-hover:-translate-y-3 pt-2  text-xs  font-bold text-blue-600 duration-300 ease-out bg-white ">
          News
        </div>
        <div class="flex flex-1 border-solid border-b border-r rounded-b-2xl p-0 m-0 rounded-l-none bg-white
  border-gray-400  pb-8 z-10 group-hover:border-blue-800  ">

          <div style="--tw-scale-x: 1.006;" class="container  border-gray-400 group-hover:border-blue-800 border-solid border-r transform group-hover:-translate-y-3  duration-300 ease-out bg-white ">

            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ultricies varius enim laoreet laoreet. Suspendisse at eros.
          </div>
        </div>

      </div>
      <div class="flex flex-col  duration-200 overflow-hidden group cursor-pointer">

        <div class="flex flex-1 transform group-hover:scale-110  duration-300 ease-out">
          <img src="img/test4.jpg" alt="">
        </div>
        <div class="transform px-3 pb-1 group-hover:-translate-y-3 pt-2  text-xs text-blue-600 duration-300 ease-out bg-white ">
          News
        </div>
        <div class="flex flex-1 border-solid border-b border-r rounded-b-2xl p-0 m-0 rounded-l-none bg-white
  border-gray-400  pb-8 z-10 group-hover:border-blue-800  ">

          <div style="--tw-scale-x: 1.006;" class="container  border-gray-400 group-hover:border-blue-800 border-solid border-r transform group-hover:-translate-y-3  duration-300 ease-out bg-white ">

            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ultricies varius enim laoreet laoreet. Suspendisse at eros.
          </div>
        </div>

      </div>
      <div class="flex flex-col  duration-200 overflow-hidden group cursor-pointer">

        <div class="flex flex-1 transform group-hover:scale-110  duration-300 ease-out">
          <img src="img/test4.jpg" alt="">
        </div>
        <div class="transform px-3 pb-1 group-hover:-translate-y-3 pt-2  text-xs text-blue-600 duration-300 ease-out bg-white ">
          News
        </div>
        <div class="flex flex-1 border-solid border-b border-r rounded-b-2xl p-0 m-0 rounded-l-none bg-white
  border-gray-400  pb-8 z-10 group-hover:border-blue-800  ">

          <div style="--tw-scale-x: 1.006;" class="container  border-gray-400 group-hover:border-blue-800 border-solid border-r transform group-hover:-translate-y-3  duration-300 ease-out bg-white ">

            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ultricies varius enim laoreet laoreet. Suspendisse at eros.
          </div>
        </div>

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