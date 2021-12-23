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

  function mrkToHtml() {
    document.getElementById("contentView").innerHTML = md.render(document.getElementById("contentEdit").value);
    let attribute =  document.getElementById("contentView").offsetHeight;

    document.getElementById("contentEdit").style.height = attribute+20;
  }

  function enableEdit() {

    if (display == true) {
      document.getElementById("contentPanel").setAttribute("style", "display:none");
      document.getElementById("switchView").setAttribute("style", "display:none")
      document.getElementById("editBtn").innerHTML = "Edit";
      display = false;
    } else {
      document.getElementById("contentPanel").setAttribute("style", "display:block");
      document.getElementById("editBtn").innerHTML = "<i class='fas text-xl fa-times'></i>";
      document.getElementById("switchView").setAttribute("style", "display:inline-block")

      display = true;

    }
  }

  function switchView() {


  }



</script>

<div class="text-right">
  <button onclick="switchView()" style="display: none;" id="switchView" class="btn bg-pink-600 hover:bg-pink-300 text-white"><i class="fas text-lg fa-random"></i></button>
  <button onclick="enableEdit()" id="editBtn" class="btn bg-pink-600 hover:bg-pink-300 text-white">Edit</button>


</div>




<div class="flex  flex-col xl:flex-row  xl:items-start items-center mt-6  gap-8">
  <!-- Content -->
  <div class="flex flex-1 flex-col">
    <article id="contentView" class=" prose max-w-[75ch] text-justify break-all">
      <?php echo $Parsedown->text($content); ?>
    </article>

  </div>
  <!-- IMG -->
  <div id="contentPanel" class="flex flex-1  max-w-[75ch] w-[100%] flex-col">
    <form action="articleDets.php" class="w-[100%]">
      <textarea id="contentEdit" onkeyup="mrkToHtml()" class="w-[100%] h-[500px] border border-black rounded p-2">
        <?php echo ($content); ?>
      </textarea>
      <br>
      <button class="btn bg-blue-500 text-white hover:bg-blue-300 mt-6 " type="submit">Save Changes!</button>
    </form>
  </div>
</div>

<!-- 
<div class="mx-auto place-content-center grid ">

  <div class="">
    <article id="contentView" class="prose max-w-[75ch]">
      <?php echo $Parsedown->text($content); ?>
    </article>
  </div>

  <div id="contentPanel" class="class="flex justify-center flex-1 mb-10 md:mb-16 lg:mb-0 z-10 >
    <form action="articleDets.php">

      <textarea id="contentEdit" onkeyup="mrkToHtml()" class="  my-2 border-2 border-black rounded-2xl p-2 w-[100%] h-96" id="contentInput">
<?php echo ($content); ?>
</textarea>
      <br>
      <button class="btn bg-blue-500 text-white hover:bg-blue-300 " type="submit">Save Changes!</button>
    </form>
  </div>
-->
</div>

<script>

let attribute =  document.getElementById("contentView").offsetHeight;

document.getElementById("contentEdit").style.height = attribute+20;

console.log(attribute);

</script>