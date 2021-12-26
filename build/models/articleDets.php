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
      document.getElementById("switchView").setAttribute("style", "display:none");
      document.getElementById("editBtn").innerHTML = "Edit";
      
    // document.getElementById("viewContainer").setAttribute("style", " align-items: center ");
      display = false;
    } else {
      document.getElementById("contentPanel").setAttribute("style", "display:block");
      document.getElementById("editBtn").innerHTML = "<i class='fas text-xl fa-times'></i>";
      document.getElementById("switchView").setAttribute("style", "display:inline-block");

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

<div class="text-right">
  <div id="switchView" class="hidden">
  <button onclick="switchView()"    class="btn bg-pink-600 hover:bg-pink-300 text-white hidden xl:block"><i class="fas text-lg fa-random"></i></button>
  </div>
  <button onclick="enableEdit()" id="editBtn" class="btn bg-pink-600 hover:bg-pink-300 text-white">Edit</button>


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
      <button class="btn bg-blue-500 text-white hover:bg-blue-300 mt-6 " type="submit">Save Changes!</button>
    </form>
  </div>
</div>
</div>

<script>

let attribute =  document.getElementById("contentView").offsetHeight + 80;
document.getElementById("contentEdit").style.height = attribute + "px";


console.log(attribute);

</script>