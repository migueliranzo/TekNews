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

    hideMenu();

    if (display == true) {
      document.getElementById("contentPanel").setAttribute("style", "display:none");
      document.getElementById("switchBtn").setAttribute("style", "display:none");
      var element = document.getElementById("articleTitle");
      document.getElementById("editBtn").innerHTML = "<i class='far fa-edit text-left text-xl mr-3'></i> Edit article";
     
      element.scrollIntoView({behavior: "smooth"});
      display = false; 
    } else {
      document.getElementById("contentPanel").setAttribute("style", "display:block");
      document.getElementById("switchBtn").setAttribute("style", "display:block");
       var element1 = document.getElementById("contentPanel");
      document.getElementById("editBtn").innerHTML = "<i class='fas fa-times text-left text-xl ml-[6px] mr-3'></i> Close editor";
     
      element1.scrollIntoView({behavior: "smooth"});

      display = true;

    }
  }

  function switchView() {

    hideMenu();

    if(orientation){

     document.getElementById("mainContainer").style.flexDirection = "column";
     document.getElementById("mainContainer").style.alignItems = "center";
     var element1 = document.getElementById("contentPanel");
      element1.scrollIntoView({behavior: "smooth"});
     
      orientation = false;
    }else{
    document.getElementById("mainContainer").style.flexDirection = "";
    document.getElementById("mainContainer").style.alignItems = "";
    var element3 = document.getElementById("contentPanel");
      element3.scrollIntoView({behavior: "smooth"});
   
     

      orientation = true;
    }
    
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
      <textarea id="contentEdit"  onkeyup="mrkToHtml()" class="w-[100%] h-[500px] border border-black rounded p-2">
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


function hideMenu(){
  document.getElementById("up").style.bottom = "3rem";
  document.getElementById("up").style.opacity = "0.0";
  document.getElementById("fire").style.transform = "rotate(0deg)";
  document.getElementById("up").style.visibility = "hidden";
}
  
</script>

<div id="editMenu" class=" fixed bottom-1 right-[-1px] p-4 rounded-full "  onmouseleave="hideMenu()">

<button id="fire" onmouseover="showMenu()"   class=" p-4 transition-all duration-200 text-5xl rounded-full  text-blue-600 relative  hover:text-blue-300" type="submit"><i class="fas fa-chevron-circle-down"></i></button>
  
<div   id="up" class="p-5 fixed bottom-8 invisible opacity-0 right-2 transition-all duration-300    ">
  <div class="flex flex-col">
  <button class="py-1 px-4 border-2 transition-all text-left duration-300 text-white relative rounded-full  bg-blue-500 hover:border-blue-500  mt-3 " type="submit"><i class="far text-xl  text-left fa-save mr-3"> </i>Save changes</button> 
  
  
  <button id="editBtn" onclick="enableEdit()" class=" text-left py-1 px-4 border-2 hover:border-blue-500    rounded-full  bg-blue-500 text-white transition-all duration-300  relative   mt-3 " type="submit"><i class="far fa-edit text-left text-xl mr-3"></i>Edit article</button>
  

  <div id="switchBtn" class="hidden">
<button id="switchBtn" onclick="switchView()" class="min-w-[180px] text-left py-1 px-4 border-2 xl:block hover:border-blue-500   hidden stroke-1 rounded-full bg-blue-500 text-white relative transition-all duration-300    mt-3 " type="submit"><i class="fas fa-random text-xl mr-3"></i>Change view</button>

</div> 


</div>
</div>
</div>
<script>

let attribute =  document.getElementById("contentView").offsetHeight + 80;
document.getElementById("contentEdit").style.height = attribute + "px";


console.log(attribute);

</script>