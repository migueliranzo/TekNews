<?php


$newArticle = 0;

if (isset($_GET['new']) && $_GET['new'] == 1) {
  
  $newArticle = 1;
}

if (!$newArticle) {
  $articleID = $_GET['article'];
}



$title;
$content;
$type;
$image;

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "technews";


$con = new mysqli($servername, $username, $password, $dbname);

if ($con->connect_error) {
  die("Connection failed: " . $con->connect_error);
}

if (!$newArticle) {
  $query = "SELECT * FROM report WHERE id = $articleID";

  $result = mysqli_query($con, $query);

  $i = 0;
  while ($row = mysqli_fetch_array($result)) {
    $i++;

    $title = $row["title"];
    $content = $row["description"];
    $type = $row["type"];
    $image = $row["imgpath"];
  }
}

if (isset($_SESSION["name"]) && $_SESSION["role"] == 0){ 
  $userid = $_SESSION["userID"];

  $results = $con->query("SELECT * FROM user_report WHERE report_id = $articleID AND user_id = $userid");

}




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

?>
<script src="https://cdn.jsdelivr.net/remarkable/1.7.1/remarkable.min.js"></script>
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script>

<?php

if ($newArticle) { ?>
 var newArticle = true;
<?php
}

?>

  var display = false;
  var orientation = true;
  var md = new Remarkable();

  function mrkToHtml() {
    document.getElementById("contentView").innerHTML = md.render(document.getElementById("contentEdit").value);
    let attribute = document.getElementById("contentView").offsetHeight;

    //  document.getElementById("contentEdit").style.height = attribute+20;
  }

  var hidden = true;

  function editTitle() {
    var title = document.getElementById("title");
    var typeEdit = document.getElementById("typeEdit");
    $("#imgSelector").css("visibility", "hidden");

    if (hidden) {
      hidden = false;
      typeEdit.disabled = false;
      typeEdit.setAttribute("style", "appearance: auto");
    } else {
      typeEdit.disabled = true;
      typeEdit.setAttribute("style", "appearance: none");
      hidden = true;

    }

    if (hidden) {
      $("#imgSelector").css("visibility", "hidden");
      title.setAttribute("contenteditable", "false");
      document.getElementById("titleEditIcon").className = "fas fa-pencil-alt hover:bg-gray-300 p-2 rounded-full transition-all mb-2";
      //title.style.textDecoration = "none";
      title.style.border = "none";
    } else {
      $("#imgSelector").css("visibility", "visible");
      title.setAttribute("contenteditable", "true");
      title.focus();
      document.getElementById("titleEditIcon").className = "fas fa-check bg-blue-500 text-white hover:bg-blue-200 p-2 rounded-full transition-all mb-2";
      //title.style.textDecoration = "underline";
      title.style.border = " solid";
    }

  }

  function enableEdit() {

    hideMenu();

    if (display == true) {
      document.getElementById("contentPanel").setAttribute("style", "display:none");
      document.getElementById("switchBtn").setAttribute("style", "display:none");
      var element = document.getElementById("articleTitle");
      document.getElementById("editBtn").innerHTML = "<i class='far fa-edit text-left text-xl mr-3'></i> Edit article";

      element.scrollIntoView({
        behavior: "smooth"
      });
      display = false;
    } else {
      document.getElementById("contentPanel").setAttribute("style", "display:block");
      if (document.getElementById("switchBtn") != null) { document.getElementById("switchBtn").setAttribute("style", "display:block")};
      var element1 = document.getElementById("contentPanel");
      if (document.getElementById("editBtn") != null) {   document.getElementById("editBtn").innerHTML = "<i class='fas fa-times text-left text-xl ml-[6px] mr-3'></i> Close editor"};

      element1.scrollIntoView({
        behavior: "smooth"
      });

      display = true;

    }
  }

  function switchView() {

    hideMenu();

    if (orientation) {

      document.getElementById("mainContainer").style.flexDirection = "column";
      document.getElementById("mainContainer").style.alignItems = "center";
      var element1 = document.getElementById("contentPanel");
      element1.scrollIntoView({
        behavior: "smooth"
      });

      orientation = false;
    } else {
      document.getElementById("mainContainer").style.flexDirection = "";
      document.getElementById("mainContainer").style.alignItems = "";
      var element3 = document.getElementById("contentPanel");
      element3.scrollIntoView({
        behavior: "smooth"
      });



      orientation = true;
    }

  }

  function insertAtCursor(textArea, myValue) {

    if (textArea.selectionStart != textArea.selectionEnd) {
      var start = textArea.selectionStart;
      var end = textArea.selectionEnd;
      textArea.value = textArea.value.substring(0, start) + myValue + textArea.value.substring(end, textArea.value.length);
      mrkToHtml();
    }
  }

  function setSelectedText(string, end, addEnd) {

    var textarea = document.getElementById("contentEdit");
    var selection = (textarea.value).substring(textarea.selectionStart, textarea.selectionEnd).trim();
    var bold = "";
    if (end) {
      bold = " " + string + selection + string + " ";
    } else {
      if (addEnd) {
        bold = " " + string + selection + addEnd + " ";
      } else {
        bold = " " + string + selection + " ";
      }

    }

    insertAtCursor(textarea, bold);
  }

  function showMenu() {

    document.getElementById("up").style.bottom = "4.4rem";
    document.getElementById("up").style.visibility = "visible";
    document.getElementById("up").style.opacity = "1";
    document.getElementById("fire").style.transform = "rotate(180deg)";
  }


  function hideMenu() {
    document.getElementById("up").style.bottom = "2.4rem";
    document.getElementById("up").style.opacity = "0.0";
    document.getElementById("fire").style.transform = "rotate(0deg)";
    document.getElementById("up").style.visibility = "hidden";
  }
  var src = null;
  function showImg(){
    src = "img/" + $('#imgSelector').val();
    $('#newArticleImg').attr("src",src);
  }

  function deleteArticle(){
    <?php  if ($newArticle) {  $articleID = -1; }?>
    $.ajax({
        type: 'post',
        url: 'services/editArticle.php',
        data: "articleID=" + <?php echo $articleID ?> + '&delete=' + 1,
        success: function(data) {
          window.location = "index.php";
        }
      });
      <?php   ?>
  }


  <?php    if (isset($_SESSION["name"]) && $_SESSION["role"] == 0){   ?>

    <?php  if ($results) { if($results->num_rows != 0){  

        echo "  var favStatus = 1; ";

      }else{

        echo "  var favStatus = 0; ";

        } 

        } ?>

 

  <?php } ?>

    function changeFav(status){
      if(status){
        document.getElementById("saveIcon").className = "far fa-heart hover:bg-red-500  hover:text-white p-2 rounded-full transition-all mb-2";
    }else{
      document.getElementById("saveIcon").className = "fas fa-heart hover:bg-neutral-300 text-red-500 p-2 rounded-full transition-all mb-2";
    }
    }
  
  function saveArticle(){

    <?php    if (isset($_SESSION["name"]) && $_SESSION["role"] == 0){   ?>
      
    $.ajax({
        type: 'post',
        url: 'services/saveArticle.php',
        data: "articleID=" + <?php echo $articleID ?> + '&userID=' + <?php echo $_SESSION["userID"] ?> + '&alreadyFav=' + favStatus ,
        success: function(data) {  
          if(data == "deleted"){
            changeFav(favStatus);
            favStatus = 0;
          }else{
            changeFav(favStatus);
            favStatus = 1;
        }
      }
      });
      <?php } ?>
  }
  
  $(function() {

   
    var $loading = $('#spinner').hide();
    $(document)
      .ajaxStart(function() {
        $loading.show();
        $('#successToast').css("visibility", "hidden");
      })
      .ajaxStop(function() {
        $loading.hide();
        $('#successToast').css("visibility", "visible");
        var div1 = $("#successToast");
        div1.animate({
          bottom: '30px'
        }, {
          duration: 400,
          queue: false
        });
        div1.animate({
          opacity: '1'
        }, 600);
        div1.animate({
          opacity: '1'
        }, 600);
        div1.animate({
          opacity: '0'
        }, 600);
        div1.animate({
          bottom: '-10px'
        }, 100);
      });
    

    $('#editForm').on('submit', function(e) {


    <?php  if ($newArticle) {  $articleID = -1; }?>

      hidden = false;
      editTitle();
      e.preventDefault();
      var type = $('[name="type"]').find(":selected").val();
      var title =  encodeURIComponent($('[name="title"]').text());
      var content = encodeURIComponent($('[name="articleContent"]').val());
      $.ajax({
        type: 'post',
        url: 'services/editArticle.php',
        data: "type=" + type + '&title=' + title + '&content=' + content + "&articleID=" + <?php echo $articleID ?> + '&img=' + src,
        success: function(data) {
          <?php  if ($newArticle) {  ?>  window.location = "article.php?article=" + data;   <?php  } ?>
        }
      });

      <?php   ?>
    });

   

  });
/*      Experimental
  function fixDiv() { 
    var $div = $("#testF");
    var $desiredH = $("#viewContainer").css("width")
    if ($(window).scrollTop() > $div.data("top")+ $("#editForm").height()/2 ) { 
        $('#testF').css({'position': 'fixed', 'top': '160', 'width': $desiredH}); //viewContainer
    }
    else {
        $('#testF').css({'position': 'static', 'top': 'auto', 'width': '100%'});
      }
    }
*/
  

  $( document ).ready(function() {
   
    /*   Experimental
      $("#testF").data("top", $("#testF").offset().top); 
    $(window).scroll(fixDiv);
    */

    <?php if ($_SESSION["role"] == 1  || $_SESSION["role"] == 2 ) {?> showImg(); <?php }  ?>

      <?php
      if (isset($_SESSION["name"]) && $_SESSION["role"] == 0){ 
      if ($results) { if($results->num_rows != 0){ ?>

        changeFav(0);

        <?php } } } ?>

        <?php  if ($newArticle) {  ?>
      editTitle();
      switchView();
      enableEdit();
      <?php
      }
      ?>
      

    
});

</script>



<div id="successToast" class="fixed  -bottom-3 invisible bg-green-600 opacity-0 px-6 py-2 rounded-lg text-white  w-max h-max">Changes saved!</div>

<?php  if (!$newArticle) { ?>  

<div id="spinner" class="fixed z-10 left-0 top-0 w-[100%] h-[100%] text-center overflow-auto bg-[rgba(0,0,0,0.4)] ">
  <div class="m-auto mt-[50vh]">
    <div class="lds-ring">
      <div></div>
      <div></div>
      <div></div>
      <div></div>
    </div>
  </div>
</div>

<?php  } ?>  

<form id="editForm">
  <div id="articleTitle" class=" container p-0 max-w-[90ch] mb-10 ">

    <div class="flex">

      <div class="flex flex-1 text-2xl font-bold text-blue-500">
        <select name="type" id="typeEdit" disabled class="disabled:text-blue-700 font-bold  focus-visible:outline-none mb-3 appearance-none">

          <?php
          if (!$newArticle) {      ?>
            <option value="<?php echo $type ?>" selected hidden> <?php echo typeToText($type); ?></option>   <?php
          }  
          ?>

          <option value="0">Tech News</option>
          <option value="1">Crypto World</option>
          <option value="2">Virtual reality</option>
          <option value="3">Biotechnology</option>
        </select>
      </div>

      <?php

      if ($_SESSION["role"] == 1 || $_SESSION["role"] == 2) {
      ?>

        <div class="flex justify-end flex-1">
          <button type="button" onclick="editTitle()"><i id="titleEditIcon" class="fas fa-pencil-alt hover:bg-gray-300 p-2 rounded-full transition-all mb-2"></i></button>
        </div>

      <?php
      }else{ if (isset($_SESSION["name"]) && $_SESSION["role"] == 0){
        ?>

        <div class="flex justify-end flex-1"> 
          <button type="button" onclick="saveArticle()"><i id="saveIcon" class="far fa-heart hover:bg-red-500  hover:text-white p-2 rounded-full transition-all mb-2"></i></button>
        </div>


        <?php
      }}

      ?>


    </div>
    <p name="title" id="title" class="focus-within:outline-none font-bold text-5xl"><?php   if (!$newArticle) {  echo $title; }  ?> </p>
    <div class="bg-blue-500 h-1 m-auto mt-4"> </div>
  </div>

  <div class="max-w-[80ch] text-center container p-0 mb-4">
 
    <?php if ($_SESSION["role"] == 1 || $_SESSION["role"] == 2) { ?>    

      <select class="invisible" onchange="showImg()" id="imgSelector">
      <?php if (!$newArticle){  ?> 

      <option selected hidden> <?php echo substr($image,4); ?></option>
      <option value="null" >none</option>
      <?php  }else{ ?>
        
      <option value="null" selected>none</option>

      <?php  } ?>
      <?php
       
        $dir  = 'img/';
        $scanned_directory = array_diff(scandir($dir), array('..', '.'));
      foreach ($scanned_directory as $key) {
        echo "<option value='" . $key . "'>".$key."</option>" ;
      }
      ?>

</select> 
<?php } ?>

<img id="newArticleImg" class="m-auto max-w-[80ch] " src=" <?php echo $image ?> "; alt="">

       
  </div>

  <div id="mainContainer" class="flex  flex-col xl:flex-row  xl:items-start items-center mt-14  gap-8">
    <!-- Content -->
    <div class="flex flex-1 flex-col items-center" id="viewContainer">
      <article id="contentView" class=" prose max-w-[75ch]  break-words">
        <?php  if (!$newArticle) { echo $Parsedown->text($content); } ?>
      </article>

    </div>
    <!-- Edit view -->
    <div id="contentPanel" class=" flex-1  max-w-[75ch] w-[100%] flex-col hidden">
  <!--     <div id="testF">  -->
      <div class="flex flex-row border  rounded-sm rounded-bl-none rounded-br-none border-black">
        <button type="button" class="p-2 hover:bg-slate-200 bg-white text-gray-500" onclick="setSelectedText('**',true)"><i class="fas fa-bold"></i></button>
        <button type="button" class="p-2 hover:bg-slate-200 bg-white text-gray-500" onclick="setSelectedText('\n ## ',false, '\n')"><i class="fas fa-heading"></i></button>
        <button type="button" class="p-2 hover:bg-slate-200 bg-white text-gray-500" onclick="setSelectedText('*',true)"><i class="fas fa-italic"></i></button>
        <button type="button" class="p-2 hover:bg-slate-200 bg-white text-gray-500" onclick="setSelectedText('\n >',false, '\n\n')"><i class="fas fa-quote-left"></i></button>
      </div>
      <div class="w-[100%]">
        <textarea name="articleContent" id="contentEdit" onkeyup="mrkToHtml()" class="w-[100%] h-[500px] border border-black rounded rounded-tr-none rounded-tl-none p-2"><?php if (!$newArticle){ echo $content;} ?></textarea>

      </div>

    </div>
   <!-- </div> -->
  </div>
  </div>

  <?php

  if ($_SESSION["role"] == 1 || $_SESSION["role"] == 2) {
  ?>

    <div id="editMenu" class=" fixed bottom-1 right-[1px] p-1 rounded-full " onmouseleave="hideMenu()">

      <button id="fire" onmouseover="showMenu()" style="-webkit-text-stroke-width: 3px;" class=" p-4 right-3 transition-all duration-200 text-5xl rounded-full  text-blue-600 relative  hover:text-blue-300" type="button"><i class="fas fa-chevron-circle-down rounded-full bg-white"></i></button>

      <div id="up" class="p-5 fixed bottom-8 invisible opacity-0 right-2 transition-all duration-300    ">
        <div class="flex flex-col">
        <?php   if (!$newArticle ) { if($_SESSION["role"] != 2){ ?> 
        <button onclick="deleteArticle()" class="py-1 px-4 border-2 transition-all text-left duration-300 text-white relative rounded-full  bg-red-500 hover:border-red-500  mt-3 " type="submit"><i class=" fas text-xl  text-left fa-times  mr-3"> </i>Delete article</button>
        <?php }} ?>
          <button class="py-1 px-4 border-2 transition-all text-left duration-300 text-white relative rounded-full  bg-blue-500 hover:border-blue-500  mt-3 " type="submit"><i class="far text-xl  text-left fa-save mr-3"> </i>Save changes</button>

          <?php   if (!$newArticle) {  ?> 
         
          <div id="switchBtn" class="hidden">
           <button id="switchBtn" onclick="switchView()" class="min-w-[180px] text-left py-1 px-4 border-2 xl:block hover:border-blue-500   hidden stroke-1 rounded-full bg-blue-500 text-white relative transition-all duration-300    mt-3 " type="button"><i class="fas fa-random text-xl mr-3"></i>Change view</button>  

          </div>

          <button id="editBtn" onclick="enableEdit()" class=" text-left py-1 px-4 border-2 hover:border-blue-500    rounded-full  bg-blue-500 text-white transition-all duration-300  relative   mt-3 " type="button"><i class="far fa-edit text-left text-xl mr-3"></i>Edit article</button>
            
          <?php } ?>
</form>

</div>
</div>
</div>

<?php
  }

?>
