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

      <div class="grid pt-28 auto-cols-max m-0 bg-white  lg:grid-cols-4 gap-4  grid-cols-2  sm:grid-cols-2 lg:m-0 sm:m-8 md:m-16">


        <?php

        function typeToText($arg_1)
        {

          switch ($arg_1) {
            case 0:
              return "Tech News";
              break;
            case 1:
              return "Cryto World";
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
        ?>

          <?php

          switch ($i) {
            case 1:



          ?>
              <div class=" container  flex flex-col duration-200 overflow-hidden group cursor-pointer border-l-4 rounded-l-2xl lg:rounded-l-none 
      lg:border-l-0 border-r-4 border-t-4 border-b-4 rounded-r-2xl border-dotted  border-blue-600 col-span-2 lg:row-span-2 sm:row-span-1">

                <div class=" uppercase px-0  md:text-center lg:text-left font-bold pb-1  pt-4  text-xs text-blue-600 duration-300 ease-out bg-white ">
                  <?php echo typeToText($row["type"]); ?>
                </div>

                <div class="flex p-0 m-0 bg-white">

                  <div class="group-hover:not-italic italic md:text-center lg:text-left duration-300 ease-out font-bold bg-white text-4xl  ">
                    <?php echo $row["title"]; ?>
                  </div>

                </div>
                <div class="overflow-hidden  my-4">
                  <div class="flex flex-1 justify-center pb-1 group-hover:-skew-y-2  group-hover:scale-110  duration-300 ease-out">
                    <img src=' <?php echo $row["imgpath"]; ?> ' alt="">
                  </div>
                </div>
              </div>

            <?php

              break;

            case 2:

            ?>
              <div class="  flex flex-col   duration-200 group cursor-pointer border-gray-400 border-solid border-b border-r rounded-b-2xl rounded-l-none hover:border-blue-800
      news-card-effect after:ease-out">
                <div class="overflow-hidden">
                  <div class="flex flex-1  transform group-hover:scale-110 ease-out  duration-300">
                    <img src=' <?php echo $row["imgpath"]; ?> ' alt="">
                  </div>
                  <div class="transform uppercase px-3 pb-1 group-hover:-translate-y-3 pt-3  text-xs  font-bold text-blue-600 duration-300 ease-out bg-white ">
                    <?php echo typeToText($row["type"]); ?>
                  </div>
                  <div class="flex flex-1 border-solid  m-0 pb-8 ">

                    <div class="container h-24 px-[1.12rem] border-gray-400 group-hover:border-blue-800 border-solid  transform group-hover:-translate-y-3  duration-300 ease-out bg-white ">
                      <?php echo $row["title"]; ?>
                    </div>
                  </div>
                </div>
              </div>

            <?php

              break;

            case 3:
            ?>
              <div class="  flex flex-col   duration-200 group cursor-pointer border-gray-400 border-solid border-b border-r rounded-b-2xl rounded-l-none hover:border-blue-800
      news-card-effect after:ease-out">
                <div class="overflow-hidden">
                  <div class="flex flex-1  transform group-hover:scale-110 ease-out  duration-300">
                    <img src=' <?php echo $row["imgpath"]; ?> ' alt="">
                  </div>
                  <div class="transform uppercase px-3 pb-1 group-hover:-translate-y-3 pt-3  text-xs  font-bold text-blue-600 duration-300 ease-out bg-white ">
                    <?php echo typeToText($row["type"]); ?>
                  </div>
                  <div class="flex flex-1 border-solid  m-0 pb-8 ">

                    <div class="container h-24 px-[1.12rem] border-gray-400 group-hover:border-blue-800 border-solid  transform group-hover:-translate-y-3  duration-300 ease-out bg-white ">
                      <?php echo $row["title"]; ?>
                    </div>
                  </div>
                </div>
              </div>

            <?php
              break;


            case 4:
            ?>
              <div class="  flex flex-col   duration-200 group cursor-pointer border-gray-400 border-solid border-b border-r rounded-b-2xl rounded-l-none hover:border-blue-800
      news-card-effect after:ease-out">
                <div class="overflow-hidden">
                  <div class="flex flex-1  transform group-hover:scale-110 ease-out  duration-300">
                    <img src=' <?php echo $row["imgpath"]; ?> ' alt="">
                  </div>
                  <div class="transform uppercase px-3 pb-1 group-hover:-translate-y-3 pt-3  text-xs  font-bold text-blue-600 duration-300 ease-out bg-white ">
                    <?php echo typeToText($row["type"]); ?>
                  </div>
                  <div class="flex flex-1 border-solid  m-0 pb-8 ">

                    <div class="container h-24 px-[1.12rem] border-gray-400 group-hover:border-blue-800 border-solid  transform group-hover:-translate-y-3  duration-300 ease-out bg-white ">
                      <?php echo $row["title"]; ?>
                    </div>
                  </div>
                </div>
              </div>

            <?php
              break;


            case 5:
            ?>
              <div class="  flex flex-col   duration-200 group cursor-pointer border-gray-400 border-solid border-b border-r rounded-b-2xl rounded-l-none hover:border-blue-800
      news-card-effect after:ease-out">
                <div class="overflow-hidden">
                  <div class="flex flex-1  transform group-hover:scale-110 ease-out  duration-300">
                    <img src=' <?php echo $row["imgpath"]; ?> ' alt="">
                  </div>
                  <div class="transform uppercase px-3 pb-1 group-hover:-translate-y-3 pt-3  text-xs  font-bold text-blue-600 duration-300 ease-out bg-white ">
                    <?php echo typeToText($row["type"]); ?>
                  </div>
                  <div class="flex flex-1 border-solid  m-0 pb-8 ">

                    <div class="container h-24 px-[1.12rem] border-gray-400 group-hover:border-blue-800 border-solid  transform group-hover:-translate-y-3  duration-300 ease-out bg-white ">
                      <?php echo $row["title"]; ?>
                    </div>
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

    <!-- 

    <div class="grid pt-28 auto-cols-max m-0 bg-white  lg:grid-cols-4 gap-4  grid-cols-2  sm:grid-cols-2 lg:m-0 sm:m-8 md:m-16">

      <div class=" container  flex flex-col duration-200 overflow-hidden group cursor-pointer border-l-4 rounded-l-2xl lg:rounded-l-none 
      lg:border-l-0 border-r-4 border-t-4 border-b-4 rounded-r-2xl border-dashed  border-blue-600 col-span-2 lg:row-span-2 sm:row-span-1">

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
    </div>
top: 36px;
    width: 46px;
    left: 3px;
    background: #ff0b0b;
    height: 47px;
    transform: rotate(
45deg);
-->

    <div class=" text-center  pt-6">
      <!-- 
    <div class="bg-indigo-500 shadow-lg text-white shadow-cyan-500/50 inline-block pt-2 pb-3 px-4 rounded-2xl overflow-hidden"> 

        <a  class="px-2 inline-block z-20 after:-z-10 after:w-[150px] hover: transition duration-300 after:h-[150px]  
        after:bg-blue-500 after:'' relative after:absolute after:block inline-block after:hover:top-[0.20] after:duration-300
        after:rotate-45 after:top-20 after:-left-16" href="">Prev</a>

        <a  class="px-2 z-20 after:-z-10 after:w-[150px] hover: transition duration-300 after:h-[150px]  
        after:bg-blue-500 after:'' relative after:absolute after:block inline-block after:-top-[200px] after:duration-300
        after:rotate-45 after:hover:-top-[154px] after:-left-[62px]" href="">1</a>
        
        <a  class="px-2 z-20 after:-z-10 after:w-[150px] hover: transition duration-300 after:h-[150px]  
        after:bg-blue-500 after:'' relative after:absolute after:block inline-block after:top-20 after:duration-300
        after:rotate-45 after:hover:top-7 after:-left-[62px]" href="">2</a>
        </div>
        px-3 z-20 after:-z-10 after:w-[150px] hover: transition duration-300 after:h-[150px]  
            after:bg-blue-500 after:`` relative after:absolute after:block inline-block after:-top-[200px] after:duration-300
            after:rotate-45 after:hover:-top-[154px] after:-left-[58px]
        -->

      <br>
      <div class="bg-blue-500 shadow-lg text-white shadow-cyan-500/50 inline-block pt-2 pb-3 px-4 rounded-2xl overflow-hidden">

        <?php //Calculation of pages needed to paginate and display of page numbers
        $query = "SELECT COUNT(*) FROM report";
        $rs_result = mysqli_query($con, $query);
        $row = mysqli_fetch_row($rs_result);
        $total_records = $row[0];

        $total_pages = ceil($total_records / $per_page_record);  // Number of pages required.
        $pagLink = "";


        echo "<a class='px-3 z-20 after:-z-10 after:w-[150px] hover: transition duration-300 after:h-[150px]  
        after:bg-blue-600 after:`` relative after:absolute after:block inline-block after:hover:top-[0.20] after:duration-300
        after:rotate-45 after:top-20 after:-left-16' href='index.php?page=";

        if ($page >= 2) {
          echo ($page - 1);
        } else {
          echo 1;
        }

        echo "'>  Prev </a>";


        for ($i = 1; $i <= $total_pages; $i++) {
          if ($i == $page) {
            $pagLink .= "<a class='px-3 z-20 after:-z-10 after:w-[150px] hover: transition duration-300 after:h-[150px]  
            after:bg-pink-500 after:`` relative after:absolute after:block inline-block after:-top-[178px] after:duration-300
            after:rotate-45 after:hover:-top-[178px] after:-left-[58px]' href='index.php?page="
              . $i . "'>" . $i . " </a>";
          } else {
            $pagLink .= "<a class='px-3 z-20 after:-z-10 after:w-[150px] hover: transition duration-300 after:h-[150px]  
            after:bg-blue-700 after:`` relative after:absolute after:block inline-block after:top-20 after:duration-300
            after:rotate-45 after:hover:top-7 after:-left-[58px]' href='index.php?page=" . $i . "'>" . $i . " </a>";
          }
        };
        echo $pagLink;


        echo "<a class='px-3 z-20 after:-z-10 after:w-[150px] hover: transition duration-300 after:h-[150px]  
          after:bg-blue-700 after:`` relative after:absolute after:block inline-block after:hover:top-[0.20] after:duration-300
          after:rotate-45 after:top-20 after:-left-7' href='index.php?page=";

        if ($page < $total_pages) {

          echo ($page + 1);
        } else {
          echo $total_pages;
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