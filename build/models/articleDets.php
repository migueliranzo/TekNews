<?php
include "../vendor/erusev/parsedown/Parsedown.php";

$articleID = $_GET['article'];
$title;
$content;
$type;

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


$query = "SELECT * FROM report WHERE id = $articleID";
$rs_result = mysqli_query($con, $query);

$i = 0;
while ($row = mysqli_fetch_array($rs_result)) {
  $i++;

  $title = $row["title"];
  $content = $row["description"];
  $type = $row["type"];
}



$Parsedown = new Parsedown();

?>
<script src="https://cdn.jsdelivr.net/remarkable/1.7.1/remarkable.min.js"></script>
<script>
  var display = false;
  var orientation = true;
  var md = new Remarkable();

  function mrkToHtml() {
    document.getElementById("contentView").innerHTML = md.render(document.getElementById("contentEdit").value);
    let attribute =  document.getElementById("contentView").offsetHeight;

  //  document.getElementById("contentEdit").style.height = attribute+20;
  }

 
  function enableEdit() {

    if (display == true) {
      document.getElementById("contentPanel").setAttribute("style", "display:none");
      document.getElementById("switchBtn").setAttribute("style", "display:none");
      var element = document.getElementById("articleTitle");
      element.scrollIntoView();
      display = false;
    } else {
      document.getElementById("contentPanel").setAttribute("style", "display:block");
      document.getElementById("switchBtn").setAttribute("style", "display:block");

      display = true;

    }
  }

  function switchView() {

    if(orientation){

     document.getElementById("mainContainer").style.flexDirection = "column";
     document.getElementById("mainContainer").style.alignItems = "center";
     
      orientation = false;
    }else{
    document.getElementById("mainContainer").style.flexDirection = "";
    document.getElementById("mainContainer").style.alignItems = "";
   
     

      orientation = true;
    }
    
  }

  function auto_grow(element) {
    element.style.height = "5px";
    element.style.height = (element.scrollHeight+10)+"px";
}


</script>



<div id="articleTitle" class="text-center">
  <h2>Epic title</h2>
</div>

<div id="mainContainer" class="flex  flex-col xl:flex-row  xl:items-start items-center mt-6  gap-8">
  <!-- Content -->
  <div class="flex flex-1 flex-col items-center" id="viewContainer">
    <article id="contentView" class=" prose max-w-[75ch] text-justify break-words">
      <?php echo $Parsedown->text($content); ?>
    </article>

  </div>
  <!-- Edit view -->
  <div id="contentPanel" class=" flex-1 font-IBMMONO  max-w-[75ch] w-[100%] flex-col hidden">
    <form action="articleDets.php" class="w-[100%]">
      <textarea id="contentEdit" oninput="auto_grow(this)" onkeyup="mrkToHtml()" class="w-[100%] h-[500px] border border-black rounded p-2">
        <?php echo ($content); ?>
      </textarea>
      <br>
      <!-- <button class="btn bg-blue-500 text-white fixed bottom-3 right-2 hover:bg-blue-300 mt-6 " type="submit">Save Changes!</button> -->
    </form>
  </div>
</div>
</div>

<script>
function showMenu(){
  
  document.getElementById("up").style.bottom = "5rem";
  
  document.getElementById("up").style.visibility = "visible";
  document.getElementById("up").style.opacity = "1";
  document.getElementById("fire").style.transform = "rotate(180deg)";
}

function testMouse(){
  up = true;
  document.getElementById("up").style.bottom = "3rem";
  document.getElementById("up").style.opacity = "0.0";
  document.getElementById("fire").style.transform = "rotate(0deg)";
  document.getElementById("up").style.visibility = "hidden";
}
  
</script>

<div id="editMenu" class=" fixed bottom-1 right-4 p-5"  onmouseleave="testMouse()">

<button id="fire" onmouseover="showMenu()" class=" transition-all duration-150 text-5xl rounded-full bg-white text-pink-600 relative  hover:text-pink-300 mt-6 " type="submit"><i class="fas fa-chevron-circle-down"></i></button>
  
<div onmouseleave="testMouse()" id="up" class="p-5  fixed bottom-2 opacity-0 right-4 transition-all  duration-300  ">
  <div class="flex flex-col">
  <button class="text-3xl p-2 border-2 transition-all duration-300 text-pink-500 relative rounded-full bg-white hover:border-pink-500  mt-6 " type="submit"><i class="far fa-save"></i></button> 
  
  <a id="goBottom" href="#contentPanel">
  <button id="editBtn" onclick="enableEdit()" class=" text-3xl p-2 border-2 hover:border-pink-500   rounded-full bg-white text-pink-500 transition-all duration-300  relative   mt-6 " type="submit"><i class="far fa-edit"></i></button>
  </a>

  <div id="switchBtn" class="hidden">
  <a id="goBottom" href="#contentPanel">
<button id="switchBtn" onclick="switchView()" class="text-3xl p-2 border-2 xl:block hover:border-pink-500   hidden stroke-1 rounded-full bg-white text-pink-500 relative transition-all duration-300    mt-6 " type="submit"><i class="fas fa-sync-alt"></i></button>
</a>
</div> 


</div>
</div>
</div>
<script>

let attribute =  document.getElementById("contentView").offsetHeight + 80;
document.getElementById("contentEdit").style.height = attribute + "px";


console.log(attribute);

</script>