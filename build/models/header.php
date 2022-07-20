<?php
include "../vendor/erusev/parsedown/Parsedown.php";
$Parsedown = new Parsedown();

if (session_status() != PHP_SESSION_ACTIVE) {
	session_start();
	if (!isset($_SESSION["role"])) {
		$_SESSION["role"] = 0;
	}
} ?>
<html class="font-Readex">
<head>

		<title>
		TekNews
        </title>

		<link rel = "icon" href = "img/logo.png" type = "image/x-icon">

	<style>
		::-webkit-scrollbar {
			width: 6px;
		}

		::-webkit-scrollbar-track {
			background: #f1f1f1;
		}

		::-webkit-scrollbar-thumb {
			background: rgb(52 118 227 / 70%);
			border-radius: 999px;
		}
	</style>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Index</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" href="styles.css">
	<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
</head>

<script>

	function checkMenu(){
		if($("#sideMenu").css("display") == "none"){

			$("#menuIcon").removeClass("fa-times")
			$("#menuIcon").addClass("fa-bars");
			$("#menuBtn").addClass("p-2");
			$("#menuBtn").removeClass("bg-neutral-100");
		}else{ 
			$("#menuBtn").addClass("bg-neutral-100");
			$("#menuIcon").removeClass("fa-bars")
			$("#menuIcon").addClass("fa-times");
			$("#menuIcon").removeClass("p-2")
			$("#menuBtn").addClass("py-1");
			$("#menuBtn").addClass("px-3");
			$("#menuBtn").addClass("justify-center");
			$("#menuBtn").addClass("flex");
			$("#menuBtn").addClass("min-w-[55.5px]");
		}
	}

	function toggleSideMenu(){

		$("#sideMenu").toggle();
		checkMenu();		

	}

	
	document.addEventListener('mouseup', function(e) {
    var container = document.getElementById('sideMenu');
    var container2 = document.getElementById('menuBtn');
    if (!container.contains(e.target) && !container2.contains(e.target)) {
        container.style.display = 'none';

		checkMenu();
    }
});
	
</script>



	<!-- Header -->
	<header class="fixed bg-white w-full z-[9999] top-0">
		<nav class="container flex items-center ">
			<a class="z-20" href="index.php">
				<div class="py-2 z-20 flex items-center"> <i class=" text-5xl fas fa-microchip"></i>
					<p class="px-2  sm:uppercase   text-5xl">Teknews</p> 
				</div>
			</a>
			<ul class="hidden lg:flex flex-1 justify-end items-center gap-12 text-gray-700 uppercase text-xs">
				<li class="cursor-pointer"> <?php if ($_SESSION["role"] == 1 || $_SESSION["role"] == 2) {   ?> <a href="article.php?new=1"> <button class=" shadow-fuchsia-500/50 shadow-lg rounded-md px-7 transition duration-300 py-3 uppercase bg-fuchsia-500 text-white hover:bg-fuchsia-200 ">Create article</button></a> <?php } ?> </li>
				<li><form class="mb-0" action="search.php" method="GET">
					<li> <input class="p-2 border border-black rounded-md" name="keyword"  placeholder="Search..." type="search"><button class="uppercase ml-4 btn btn-green hover:bg-green-200" type="submit"><i class="fas fa-search"></i></button> </li>
				</form>
				</li>


				<?php


				if (isset($_SESSION["name"]) && $_SESSION["role"] == 0) {

					if (strpos($_SERVER['REQUEST_URI'], "userProfile.php") !== false) {
						echo "<a href='services/logOff.php'> <button type='button' class='bg-red-500  text-white rounded-md px-7 py-3 uppercase hover:bg-red-200 shadow-lg shadow-red-500/50  transition duration-300'>Log out</button> </a>";
					} else {
						echo "<a href='userProfile.php'> <button type='button' class='bg-pink-500 max-w-[200px] text-ellipsis overflow-hidden text-white rounded-md px-7 py-3 uppercase hover:bg-pink-200 shadow-lg shadow-pink-500/50  transition duration-300'>Logged as " . $_SESSION['name'] . " </button> </a>";
					}
				} else if ((isset($_SESSION["name"]) && ($_SESSION["role"] == 1) || ($_SESSION["role"] == 2))) {

					echo "<a href='services/logOff.php'> <button type='button' class='bg-red-500  text-white rounded-md px-7 py-3 uppercase hover:bg-red-200 shadow-lg shadow-red-500/50   transition duration-300'>Log out</button> </a>";
				} else {
					echo "<a href='login.php'> <button type='button' class='bg-pink-500  text-white rounded-md px-7 py-3 uppercase hover:bg-pink-300 shadow-lg shadow-cyan-500/50  transition duration-300'>Login</button> </a>";
				}
				?>




			</ul>
			<div class="flex  lg:hidden flex-1 justify-end items-center">
				<form class="searchBar  md:block hidden mb-0" action="search.php" method="GET">
					<input class=" p-2 border border-black rounded-md" name="keyword" id="keyword"  placeholder="Search..." type="search"><button class="mr-12 uppercase ml-4 btn btn-green hover:bg-green-200" type="submit"><i class="fas fa-search"></i></button>
				</form>
				<div onclick="toggleSideMenu()" id="menuBtn" class="p-3 transition hover:bg-neutral-100">
				<i  id="menuIcon" class="hover:cursor-pointer  text-4xl fas fa-bars"></i>
				</div>
			</div>
			</nav>
			<nav class="items-center md:flex bg-blue-500 hidden ">
			<form class="mb-0 flex items-center m-auto" action="search.php" method="GET">
				<ul class="flex flex-row">
						<li class="hover:bg-pink-500"><button type="submit" value="1" name="type" class="py-3 px-6 text-white ">Crypto World</button></li>
						<li class="hover:bg-pink-500"><button type="submit" value="0" name="type" class="py-3 px-6  text-white ">Tech News</button></li>
						<li class="hover:bg-pink-500"><button type="submit" value="2" name="type" class=" py-3 px-6 text-white ">VR</button></li>
						<li class="hover:bg-pink-500"><button type="submit" value="3" name="type" class="py-3 px-6 text-white ">Biotechnology</button></li>
				</ul>
				</form>
			</nav>
		<div class=" justify-center">
		<form class="searchBarLittle md:hidden py-2 bg-blue-500 flex justify-center h-[100%]  mb-0" action="search.php" method="GET">
					<input class=" p-2 border border-black rounded-md" name="keyword" placeholder="Search..." id="keyword" type="search"><button class="sm:mr-12 font-bold uppercase ml-4 rounded-xl px-2 btn-green hover:bg-green-200" type="submit"><p class="hidden sm:inline">Search</p>  <i class="sm:ml-4 fas fa-search"></i></button>
				</form>
				</div>
		<div class="xl:hidden lg:hidden">
	
		<div id="sideMenu" style="box-shadow: rgb(188 188 188) 0px 4px 5px 0px;" class="bg-stone-50 shadow-t-xl pt-6 shadow-black hidden  right-0 top-[64px] md:w-[35vw] sm:w-[39vw] w-[100%]  overflow-hidden fixed z-[999]">
	
		<div class="flex"> 
			<div class="flex-grow">
				<ul class="text-left">
					

					<?php

					if (isset($_SESSION["name"]) && $_SESSION["role"] == 0) {

						if (strpos($_SERVER['REQUEST_URI'], "userProfile.php") !== false) {
							echo "<a href='services/logOff.php'> <li class='px-7 hover:bg-stone-200 transition border-b-2 py-3 uppercase  sm:  hover:text-pink-500 font-bold'  transition> Log out <i class=' pl-6 hidden sm:inline   pr-1 fas fa-times'></i> </li></a>";
						} else { 
							echo "<a href='userProfile.php'> <li class='px-7 hover:bg-stone-200 transition py-3  uppercase  sm:  hover:text-pink-500' transition> Profile <i class=' pl-6 hidden sm:inline   fas fa-user-circle'></i>  </li></a>";
							echo "<a href='services/logOff.php'> <li class='px-7 hover:bg-stone-200 transition md:mb-2 border-b-2 py-3 uppercase  sm:  hover:text-pink-500' transition> Log out <i class=' pl-6 hidden sm:inline   pr-1 fas fa-times'></i> </li></a>";
						}
					} else if ((isset($_SESSION["name"]) && ($_SESSION["role"] == 1) || ($_SESSION["role"] == 2))) {

						echo "<a href='services/logOff.php'> <li class='px-7 hover:bg-stone-200 transition border-b-2 py-3 uppercase  sm:  hover:text-pink-500 font-bold' transition> Log out <i class=' pl-6 hidden sm:inline   pr-1 fas fa-times'></i> </li></a>";
					} else {
						echo "<a href='login.php'> <li class='px-7 hover:bg-stone-200 transition py-3 uppercase  sm:  hover:text-pink-500' transition> Login <i class=' pl-6 hidden sm:inline   fas fa-user-circle'></i>  </li></a>";
					}
					?>


					<?php if ($_SESSION["role"] == 1 || $_SESSION["role"] == 2) {   ?> <a href='article.php?new=1'>
							<li class='px-7 py-3 uppercase  hover:bg-stone-200 sm:  hover:text-pink-500 font-bold' transition> Create article <i class="pl-6 pr-1 sm:inline hidden fas fa-folder-plus"></i> </li>
						</a> <?php } ?>
					
						<li class="md:hidden block">
						<form class="mb-0 flex  flex-col" action="search.php" method="GET">
							<ul class="  sm:  ">
						<li class=" border-t-2 hover:bg-stone-200 transition py-1"><button type="submit" value="1" name="type" class="w-[100%] text-left py-3 px-6  hover:text-pink-500    ">Crypto World</button></li>
						<li class=" hover:bg-stone-200 transition py-1"><button type="submit" value="0" name="type" class="w-[100%] text-left py-3 px-6  hover:text-pink-500    ">Tech News</button></li>
						<li class=" hover:bg-stone-200 transition py-1"><button type="submit" value="3" name="type" class="w-[100%] text-left py-3 px-6  hover:text-pink-500   ">Biotechnology</button></li>
						<li class=" hover:bg-stone-200 transition py-1"><button type="submit" value="2" name="type" class="w-[100%] text-left  py-3 px-6 hover:text-pink-500    ">VR</button></li>
						
				</ul>
				</form>
						</li>

						
				</ul>
			</div>
			</div>
		</div>
		</div>
	</header>
	<body class="pt-28">