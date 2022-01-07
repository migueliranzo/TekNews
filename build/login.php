<?php if (session_status() != PHP_SESSION_ACTIVE) {
  session_start();
}   ?>
<html>
 <?php include "models/header.php" ?>

 <div class="container">
            <div class="relative  flex flex-col mt-44 items-center ">
                <div class="relative sm:max-w-sm w-full">
                    <div style="top: 24px;
    left: -10px;" class=" bg-blue-400 shadow-lg  w-full h-full rounded-3xl absolute  transform rotate-6"></div>
                    <div style="top: -28px;
    left: 19px;" class=" bg-green-400 shadow-lg  w-full h-full rounded-3xl absolute  transform rotate-6"></div>
                    <div class="border border-gray-300 relative w-full rounded-3xl  px-6 py-4 bg-white shadow-md">
                      
                        <form method="POST" action="" class="mt-10">
                                           
                            <div>
                                <input type="text" name="username" placeholder="Username" class="pl-2 mt-1 block w-full border-none bg-gray-100 h-11 rounded-xl shadow-lg hover:bg-blue-100 focus:bg-blue-100 focus:ring-0">
                            </div>
                
                            <div class="mt-7">                
                                <input type="password" name="password" placeholder="Password" class="pl-2 mt-1 block w-full border-none bg-gray-100 h-11 rounded-xl shadow-lg hover:bg-blue-100 focus:bg-blue-100 focus:ring-0">                           
                            </div>
                            <div class="mt-7">
                                <button class="bg-blue-500 w-full py-3 rounded-xl text-white shadow-xl transition   hover:bg-blue-300">
                                    Sign in
                                </button>
                            </div>
                             <div class="mt-7">
                                <div class="flex justify-center items-center">
                                    <label class="mr-2" >Not registered?</label>
                                    <a href="#" class=" text-blue-500 transition duration-300 ease-in-out  hover:text-blue-900">
                                        Make an account
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "technews";



$pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

if(isset($_POST["username"])){

    $user = $_POST["username"];
    $pass = $_POST["password"];

  
try {

    $sql = " SELECT * FROM `user` WHERE name = ? AND password = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(1, $user, PDO::PARAM_STR);
    $stmt->bindParam(2, $pass, PDO::PARAM_STR);
    $stmt->execute();
    $row =  $stmt->fetch();
    $total_records = $row[0];
    if($total_records != 0){
        $_SESSION["admin"] = $row["role"];
        echo "<script>window.location.href='index.php'</script>";
        exit();
    }else{
        echo " <div class='ml-7 mt-2 flex'><div class='bg-red-700 z-20  p-2 text-white rounded-md'> User not found try again</div></div>";
    }


} catch (PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}
}

?>
</div>
       
</html>





