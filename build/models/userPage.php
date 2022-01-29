<?php

?>

<html>

<head>
    <title>Pagination</title>
    <style>

    </style>
</head>

<body>
<?php


?>

<div id='news' class="flex justify-center text-center">
    <div class="">
        <div class="text-4xl"> Hi <?php echo $_SESSION["name"] ?>, take a look at your <p  class="inline-block font-bold text-red-500"> favourite </p> articles! </div>
    </div>
</div>


<?php

    
   

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "technews";

    $maxResults = 5;          
    if (isset($_GET["page"])) {
        $page  = $_GET["page"];
    } else {
        $page = 1;
    }

    $start = ($page - 1) * $maxResults;

    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

   
    $keyword = $_SESSION["userID"];

    $sql = " SELECT COUNT(*) FROM `user_report` WHERE user_id LIKE ?";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(1, $keyword, PDO::PARAM_STR);
    $stmt->execute();
    $row =  $stmt->fetch();
    $records = $row[0];
    echo " <div class='mt-12 text-center text-2xl'>You have liked a total of <p  class='inline-block font-bold text-blue-500'> $records  articles </p> </div>";

if ($records == 0) {
    echo " <div  class='mt-12 text-center text-2xl'>Ooops, it seems you haven't liked any article yet!</div>";
} else {

    try {
      
      $sql = "SELECT * FROM `report` WHERE id IN (SELECT report_id FROM `user_report` WHERE  user_id = ?)  LIMIT $start, $maxResults;";
      $stmt = $pdo->prepare($sql);
      $stmt->bindParam(1, $keyword, PDO::PARAM_STR);
      $stmt->execute();
    $records = $row[0];
    $numResults = $stmt->rowCount();
?>
        
        <div  name="news" class="grid pt-12 auto-cols-max m-0 bg-white  lg:grid-cols-4 gap-4  grid-cols-2  sm:grid-cols-2 lg:m-0 sm:mx-8  md:mx-16 ">
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
            while ($row =  $stmt->fetch()) {

                $i++;
                  
                include "paginationGrid.php";
            };
            ?>
        </div>

<?php
    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
}
?>

<div>
        <br>

        

        <?php if ($records != 0) { ?>

            <?php if ( $records > $maxResults ) { ?>

        <div class=" text-center  pt-3">

      
            <div class="bg-blue-500 shadow-lg text-white shadow-cyan-500/50 inline-block pt-2 pb-3 px-4 rounded-2xl overflow-hidden">
                <?php 
 
                $pages = ceil($records / $maxResults);  
                $index = "";


                echo "<a class='px-3 z-20 after:-z-10 after:w-[150px] hover: transition duration-300 after:h-[150px]  
                after:bg-blue-600 after:`` relative after:absolute after:block inline-block after:hover:top-[0.20] after:duration-300
                after:rotate-45 after:top-20 after:-left-16' href='userProfile.php?page=";

                if ($page >= 2) {
                    echo ($page - 1) . '#news';
                } else {
                    echo 1 . '#news';
                }

                echo "'>  Prev </a>";


                for ($i = 1; $i <= $pages; $i++) {
                    if ($i == $page) {
                        $index .= "<a class='px-3 z-20 after:-z-10 after:w-[150px] hover: transition duration-300 after:h-[150px]  
            after:bg-pink-500 after:`` relative after:absolute after:block inline-block after:-top-[178px] after:duration-300
            after:rotate-45 after:hover:-top-[178px] after:-left-[58px]' href='userProfile.php?page="
                            . $i . '#news' . "'>" . $i . " </a>";
                    } else {
                        $index .= "<a class='px-3 z-20 after:-z-10 after:w-[150px] hover: transition duration-300 after:h-[150px]  
            after:bg-blue-700 after:`` relative after:absolute after:block inline-block after:top-20 after:duration-300
            after:rotate-45 after:hover:top-7 after:-left-[58px]' href='userProfile.php?page=" . $i . '#news' . "'>" . $i . " </a>";
                    }
                };
                echo $index;


                echo "<a class='px-3 z-20 after:-z-10 after:w-[150px] hover: transition duration-300 after:h-[150px]  
          after:bg-blue-700 after:`` relative after:absolute after:block inline-block after:hover:top-[0.20] after:duration-300
          after:rotate-45 after:top-20 after:-left-7' href='userProfile.php?page=";

                if ($page < $pages) {

                    echo ($page + 1) . '#news';
                } else {
                    echo $pages . '#news';
                }

                echo "'>  Next </a>";


                ?>
            </div>
        </div>
        <?php } ?>
        <?php } ?>
    </div>
    </div>
    </div>
</body>

</html>