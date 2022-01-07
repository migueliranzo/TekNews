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

//session_destroy();

?>

<div class="flex justify-center">
    <div class="">
        <div class="text-4xl"> Hi <?php echo $_SESSION["name"] ?>, take a look at your <p  class="inline-block font-bold text-red-500"> favourite </p> articles! </div>
    </div>
</div>


<?php

    
   

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "technews";

    $per_page_record = 5;  // Number of entries to show in a page.   
    // Look for a GET variable page if not found default is 1.        
    if (isset($_GET["page"])) {
        $page  = $_GET["page"];
    } else {
        $page = 1;
    }

    $start_from = ($page - 1) * $per_page_record;

    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

   
    $keyword = $_SESSION["userID"];

    $sql = " SELECT COUNT(*) FROM `user_report` WHERE user_id LIKE ?";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(1, $keyword, PDO::PARAM_STR);
    $stmt->execute();
    $row =  $stmt->fetch();
    $total_records = $row[0];
    echo " <div class='mt-12 text-center text-2xl'>You have liked a total of <p  class='inline-block font-bold text-blue-500'> $total_records  articles </p> </div>";

if ($total_records == 0) {
    echo " <div class='mt-12 text-center text-2xl'>Ooops, it seems you haven't liked any article yet!</div>";
} else {

    try {
      
      $sql = "SELECT * FROM `report` WHERE id IN (SELECT report_id FROM `user_report` WHERE  user_id = ?)  LIMIT $start_from, $per_page_record;";
      $stmt = $pdo->prepare($sql);
      $stmt->bindParam(1, $keyword, PDO::PARAM_STR);
      $stmt->execute();
    $total_records = $row[0];
      
?>

        <div id="news" name="news" class="grid pt-28 auto-cols-max m-0 bg-white  lg:grid-cols-4 gap-4  grid-cols-2  sm:grid-cols-2 lg:m-0 sm:m-8 md:m-16">
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
            while ($row =  $stmt->fetch()) {

                $i++;
                // Display each field of the records.    
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

        <?php if ($total_records != 0) { ?>

        <div class=" text-center  pt-6">

            <br>
            <div class="bg-blue-500 shadow-lg text-white shadow-cyan-500/50 inline-block pt-2 pb-3 px-4 rounded-2xl overflow-hidden">
                <?php 
 
                $total_pages = ceil($total_records / $per_page_record);  
                $pagLink = "";


                echo "<a class='px-3 z-20 after:-z-10 after:w-[150px] hover: transition duration-300 after:h-[150px]  
                after:bg-blue-600 after:`` relative after:absolute after:block inline-block after:hover:top-[0.20] after:duration-300
                after:rotate-45 after:top-20 after:-left-16' href='userProfile.php?page=";

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
            after:rotate-45 after:hover:-top-[178px] after:-left-[58px]' href='userProfile.php?page="
                            . $i . '#news' . "'>" . $i . " </a>";
                    } else {
                        $pagLink .= "<a class='px-3 z-20 after:-z-10 after:w-[150px] hover: transition duration-300 after:h-[150px]  
            after:bg-blue-700 after:`` relative after:absolute after:block inline-block after:top-20 after:duration-300
            after:rotate-45 after:hover:top-7 after:-left-[58px]' href='userProfile.php?page=" . $i . '#news' . "'>" . $i . " </a>";
                    }
                };
                echo $pagLink;


                echo "<a class='px-3 z-20 after:-z-10 after:w-[150px] hover: transition duration-300 after:h-[150px]  
          after:bg-blue-700 after:`` relative after:absolute after:block inline-block after:hover:top-[0.20] after:duration-300
          after:rotate-45 after:top-20 after:-left-7' href='userProfile.php?page=";

                if ($page < $total_pages) {

                    echo ($page + 1) . '#news';
                } else {
                    echo $total_pages . '#news';
                }

                echo "'>  Next </a>";


                ?>
            </div>
        </div>
        <?php } ?>
    </div>
    </div>
    </div>
</body>

</html>