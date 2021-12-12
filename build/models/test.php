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

      <div class="grid grid-flow-col grid-rows-2 grid-cols-4 gap-4 lg:m-0 sm:m-16 sm:bg-red-400 md:bg-amber-400 lg:bg-emerald-400 xl:to-blue-500 2xl:bg-fuchsia-400"">


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
             <div class=" container flex flex-col duration-200 overflow-hidden group cursor-pointer border-r-4 border-t-4 border-b-4 rounded-r-2xl border-dashed  border-blue-600 col-span-2 row-span-2">
        <div class="overflow-hidden pb-4">
        <div class=" uppercase px-0 font-bold pb-1  pt-4  text-xs text-blue-600 duration-300 ease-out bg-white ">
        <?php echo $row["type"]; ?>
        </div>

        <div class="flex flex-1 p-0 m-0 bg-white pb-8   ">

          <div class="   group-hover:not-italic italic duration-300 ease-out font-bold bg-white text-4xl  ">
          <?php echo $row["title"]; ?>
          
          </div>

        </div>

        <div class="flex flex-1 pb-1 group-hover:-skew-y-2  group-hover:scale-110  duration-300 ease-out">
        <img src=' <?php echo $row["imgpath"]; ?> ' alt="">
        </div>
        </div>
      </div>

            <?php

              break;

            case 2:

            ?>
             <div class="  flex flex-col  duration-200 group cursor-pointer border-gray-400 border-solid border-b border-r rounded-b-2xl rounded-l-none hover:border-blue-800
      news-card-effect after:ease-out">
        <div class="overflow-hidden">
          <div class="flex flex-1  transform group-hover:scale-110 ease-out  duration-300">
          <img src=' <?php echo $row["imgpath"]; ?> ' alt="">
          </div>
          <div class="transform uppercase px-3 pb-1 group-hover:-translate-y-3 pt-3  text-xs  font-bold text-blue-600 duration-300 ease-out bg-white ">
          <?php echo $row["type"]; ?>
          </div>
          <div class="flex flex-1 border-solid  m-0 pb-8 ">

            <div class="container h-24  px-[1.12rem] border-gray-400 group-hover:border-blue-800 border-solid  transform group-hover:-translate-y-3  duration-300 ease-out bg-white ">

            <?php echo $row["title"]; ?></div>
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


    <div class="grid pt-28 auto-cols-max m-0 bg-white  lg:grid-cols-4 gap-4  grid-cols-2  sm:grid-cols-2 lg:m-0 sm:m-8 md:m-16">

      <div class=" container  flex flex-col duration-200 overflow-hidden group cursor-pointer sm:border-l-4 sm:rounded-l-2xl lg:rounded-l-none lg:border-l-0 border-r-4 border-t-4 border-b-4 rounded-r-2xl border-dashed  border-blue-600 col-span-2 lg:row-span-2 sm:row-span-1">
        
        <div class=" uppercase px-0  md:text-center lg:text-left font-bold pb-1  pt-4  text-xs text-blue-600 duration-300 ease-out bg-white ">
          Newss
        </div>

        <div class="flex p-0 m-0 bg-white">

          <div class="group-hover:not-italic italic md:text-center lg:text-left duration-300 ease-out font-bold bg-white text-4xl  ">
            One race to go but at the end of a blockbuster season, who will be crowned champion in Abu Dhabi?
          
          </div>

        </div>
        <div class="overflow-hidden  my-4">
        <div class="flex flex-1 justify-center pb-1 group-hover:-skew-y-2  group-hover:scale-110  duration-300 ease-out">
          <img src="img/test4.jpg" alt="">
        </div>
        </div>
      </div>


      <div class="  flex flex-col   duration-200 group cursor-pointer border-gray-400 border-solid border-b border-r rounded-b-2xl rounded-l-none hover:border-blue-800
      news-card-effect after:ease-out">
        <div class="overflow-hidden">
          <div class="flex flex-1  transform group-hover:scale-110 ease-out  duration-300">
            <img src="img/test5.jpg" alt="">
          </div>
          <div class="transform uppercase px-3 pb-1 group-hover:-translate-y-3 pt-3  text-xs  font-bold text-blue-600 duration-300 ease-out bg-white ">
            News
          </div>
          <div class="flex flex-1 border-solid  m-0 pb-8 ">

            <div class="container h-24 px-[1.12rem] border-gray-400 group-hover:border-blue-800 border-solid  transform group-hover:-translate-y-3  duration-300 ease-out bg-white ">
            Defending champion Hamilton says he 'feels great' after dominating FP2 in Abu Dhabi ahead of title showdown
           </div>
          </div>
        </div>
      </div>
      <div class="  flex flex-col  duration-200 group cursor-pointer border-gray-400 border-solid border-b border-r rounded-b-2xl rounded-l-none hover:border-blue-800
      news-card-effect after:ease-out">
        <div class="overflow-hidden">
          <div class="flex flex-1  transform group-hover:scale-110 ease-out  duration-300">
            <img src="img/test5.jpg" alt="">
          </div>
          <div class="transform uppercase px-3 pb-1 group-hover:-translate-y-3 pt-3  text-xs  font-bold text-blue-600 duration-300 ease-out bg-white ">
            News
          </div>
          <div class="flex flex-1 border-solid  m-0 pb-8 ">

            <div class="container  px-[1.12rem] border-gray-400 group-hover:border-blue-800 border-solid  transform group-hover:-translate-y-3  duration-300 ease-out bg-white ">
            Defending champion Hamilton says he 'feels great' after dominating FP2 in Abu Dhabi ahead of title showdown
          </div>
          </div>
        </div>
      </div>
      <div class="  flex flex-col  duration-200 group cursor-pointer border-gray-400 border-solid border-b border-r rounded-b-2xl rounded-l-none hover:border-blue-800
      news-card-effect after:ease-out">
        <div class="overflow-hidden">
          <div class="flex flex-1  transform group-hover:scale-110 ease-out  duration-300">
            <img src="img/test5.jpg" alt="">
          </div>
          <div class="transform uppercase px-3 pb-1 group-hover:-translate-y-3 pt-3  text-xs  font-bold text-blue-600 duration-300 ease-out bg-white ">
            News
          </div>
          <div class="flex flex-1 border-solid  m-0 pb-8 ">

            <div class="container  px-[1.12rem] border-gray-400 group-hover:border-blue-800 border-solid  transform group-hover:-translate-y-3  duration-300 ease-out bg-white ">
            Defending champion Hamilton says he 'feels great' after dominating FP2 in Abu Dhabi ahead of title showdown
            </div>
          </div>
        </div>
      </div>
      <div class="  flex flex-col  duration-200 group cursor-pointer border-gray-400 border-solid border-b border-r rounded-b-2xl rounded-l-none hover:border-blue-800
      news-card-effect after:ease-out">
        <div class="overflow-hidden">
          <div class="flex flex-1  transform group-hover:scale-110 ease-out  duration-300">
            <img src="img/test5.jpg" alt="">
          </div>
          <div class="transform uppercase px-3 group-hover:-translate-y-3 pt-3  text-xs  font-bold text-blue-600 duration-300 ease-out bg-white ">
            News
          </div>
          <div class="flex flex-1 border-solid  m-0 pb-8 ">

            <div class="container  px-[1.12rem] border-gray-400 group-hover:border-blue-800 border-solid  transform group-hover:-translate-y-3  duration-300 ease-out bg-white ">
            Defending champion Hamilton says he 'feels great' after dominating FP2 in Abu Dhabi ahead of title showdown
          </div>
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