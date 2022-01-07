<?php

session_destroy();

?>

<div class="flex justify-center">
    <div class="">
        <div class="text-4xl"> Hi <?php echo $_SESSION["name"] ?>, Here are the articles you saved for later! </div>
    </div>
</div>