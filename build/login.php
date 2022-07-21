<html>
<?php include "models/header.php" ?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script>

    $( function() {
        $( "#dialog" ).dialog(
                {
                    autoOpen: false, draggable: false,
                    buttons: [{ text: "OK", click: function() {$( this ).dialog( "close" );}}]
                }
            );
        } );
  

    document.addEventListener('mouseup', function(e) {
    var container = document.getElementById('dialog');
    if (!container.contains(e.target)) {
        container.style.display = 'none';

        $( "#dialog" ).dialog("close");
    }
});

    function showFakeUsers(){

        let isOpen = $( "#dialog" ).dialog( "isOpen" );

        $( "#dialog" ).dialog("open");

        if(isOpen){
            $( "#dialog" ).dialog("close");
        }
    }

    function showNewForm() {

        $("#loginForm").slideUp();
        $("#registerForm").slideDown();
    }

    function showLogForm() {

        $("#loginForm").slideDown();
        $("#registerForm").slideUp();
    }
</script>

<div class="container">
    <div class="relative  flex flex-col mt-44 items-center ">
        <div class="relative sm:max-w-sm w-full">
            <div style="top: 24px;
    left: -10px;" class=" sm:block hidden bg-blue-400 shadow-lg  w-full h-full rounded-3xl absolute  transform rotate-6"></div>
            <div style="top: -28px;
    left: 19px;" class="sm:block hidden bg-green-400 shadow-lg  w-full h-full rounded-3xl absolute  transform rotate-6"></div>
            <div class="border border-gray-300 relative w-full rounded-3xl  px-6 py-4 bg-white shadow-md">

                <form id="loginForm" method="POST" action="" class="mt-10">

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
                            <label class="mr-2">Checking the site?</label>
                            <a href="#" onclick="showFakeUsers()" class=" text-blue-500 transition duration-300 ease-in-out  hover:text-blue-900">
                                Try dummy accounts
                            </a>
                        </div>
                    </div>
                    <div class="mt-7">
                        <div class="flex justify-center items-center">
                            <label class="mr-2">Not registered?</label>
                            <a href="#" onclick="showNewForm()" class=" text-blue-500 transition duration-300 ease-in-out  hover:text-blue-900">
                                Make an account
                            </a>
                        </div>
                    </div>
                 
                </form>
                <form id="registerForm" class="hidden" method="POST" action="" class="mt-10">
                    <div>
                        <input type="text" name="username" placeholder="Username" class="pl-2 mt-1 block w-full border-none bg-gray-100 h-11 rounded-xl shadow-lg hover:bg-blue-100 focus:bg-blue-100 focus:ring-0">
                    </div>

                    <div class="mt-7">
                        <input type="password" name="password" placeholder="Password" class="pl-2 mt-1 block w-full border-none bg-gray-100 h-11 rounded-xl shadow-lg hover:bg-blue-100 focus:bg-blue-100 focus:ring-0">
                    </div>
                    <div class="mt-7">
                        <input type="password" name="rppassword" placeholder="Repeat password" class="pl-2 mt-1 block w-full border-none bg-gray-100 h-11 rounded-xl shadow-lg hover:bg-blue-100 focus:bg-blue-100 focus:ring-0">
                    </div>
                    <div class="mt-7">
                        <button class="bg-blue-500 w-full py-3 rounded-xl text-white shadow-xl transition   hover:bg-blue-300">
                            Create account
                        </button>
                    </div>
                    <div class="mt-7">
                        <div class="flex justify-center items-center">
                            <label class="mr-2">Already registered?</label>
                            <a href="#" onclick="showLogForm()" class=" text-blue-500 transition duration-300 ease-in-out  hover:text-blue-900">
                                Log in
                            </a>
                        </div>
                    </div>
                </form>
                <div id="dialog" class="flex gap-4 font-Readex" title="Choose an account" style="font-family: Readex Pro, sans-serif;">
                    <form id="" class="flex-1 text-center cursor-pointer" method="POST" action="services/dummyUser.php" class="mt-10">
                        <button><img src="img/avatarAzul.svg">  <input value="0" class="hidden" name="type"> User  </button>
                          </form>
                    <form id="" class="flex-1 text-center cursor-pointer" method="POST" action="services/dummyUser.php" class="mt-10">
                        <button  ><img src="img/avatarROJO.svg"> <input value="1" class="hidden" name="type"> Admin  </button>
                          </form>
                    <form id="" class="flex-1 text-center cursor-pointer" method="POST" action="services/dummyUser.php" class="mt-10">
                        <button  ><img src="img/avatarVerde.svg"> <input value="2" class="hidden" name="type"> Editor  </button>
                          </form>
            </div>
            </div>
        </div>
    </div>


    <?php
    	include "../build/services/userLogic.php";
    ?>
</div>

</html>