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

var display = true;
var md = new Remarkable();

 function mrkToHtml(){
    document.getElementById("contentView").innerHTML = md.render(document.getElementById("contentEdit").value);
  }

  function enableEdit(){

    if(display == true){
      document.getElementById("contentPanel").setAttribute("style","display:none");
      document.getElementById("switchView").setAttribute("style","display:none")
      document.getElementById("editBtn").innerHTML = "Edit";
      display = false;
    }else{
      document.getElementById("contentPanel").setAttribute("style","display:block");
      document.getElementById("editBtn").innerHTML = "<i class='fas text-xl fa-times'></i>";
      document.getElementById("switchView").setAttribute("style","display:inline-block")
 
      display = true;
      
    }
  }

  function switchView(){


  }

</script>

<div class="text-right">
<button onclick="switchView()" style="display: none;" id="switchView"  class="btn bg-pink-600 hover:bg-pink-300 text-white"><i class="fas text-lg fa-random"></i></button> 
<button onclick="enableEdit()" id="editBtn" class="btn bg-pink-600 hover:bg-pink-300 text-white">Edit</button> 


</div>

<div class="mx-auto place-content-center grid "> 

<div class="">
<article id="contentView" class="prose max-w-[75ch]">
<?php echo $Parsedown->text($content); ?>
</article>
</div>

<div id="contentPanel">
<form action="articleDets.php">

  <textarea id="contentEdit" onkeyup="mrkToHtml()" class="  my-2 border-2 border-black rounded-2xl p-2 w-[100%] h-96" id="contentInput">
<?php echo ($content); ?>
</textarea>
<br>
  <button class="btn bg-blue-500 text-white hover:bg-blue-300 " type="submit">Save Changes!</button>
</form>
</div>

</div>