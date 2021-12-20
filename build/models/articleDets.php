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
<article class="prose">
<?php echo $Parsedown->text($content); ?>
</article>
<form action="articleDets.php">

  <textarea class="bg-blue-50 my-2 border-2 border-black rounded-2xl p-2" id="contentInput" rows="16" cols="70">
<?php echo ($content); ?>
</textarea>
<br>
  <button class="btn bg-blue-500 text-white hover:bg-blue-300 " type="submit">Save Changes!</button>
</form>