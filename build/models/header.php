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
	function showSideMenu() {
	
		$("#sideMenu").slideDown( 400, function() {
    
  });
	}

	$(document).mouseup(function(e) {
		console.log("ee");
		var container = $("sideMenu");

		if (!container.is(e.target) && container.has(e.target).length === 0) {
			$("#sideMenu").slideUp( 400, function() {
   
  });
		}
	});
</script>



	<!-- Header -->
	<header class="fixed bg-white w-full z-[9999] top-0">
		<nav class="container flex items-center ">
			<a class="z-20" href="index.php">
				<div class="py-2 z-20 flex items-center"> <i class=" text-5xl fas fa-microchip"></i>
					<p class="px-2  uppercase   text-5xl">Teknews</p> 
				</div>
			</a>
			<ul class="hidden lg:flex flex-1 justify-end items-center gap-12 text-gray-700 uppercase text-xs">
				<li class="cursor-pointer"> <?php if ($_SESSION["role"] == 1 || $_SESSION["role"] == 2) {   ?> <a href="article.php?new=1"> <button class=" shadow-fuchsia-500/50 shadow-lg rounded-md px-7 transition duration-300 py-3 uppercase bg-fuchsia-500 text-white hover:bg-fuchsia-200 ">Create article</button></a> <?php } ?> </li>
				<li><form class="mb-0" action="search.php" method="GET">
					<li> <input class="p-2 border border-black rounded-md" name="keyword" id="keyword" type="search"><button class="uppercase ml-4 btn btn-green hover:bg-green-200" type="submit"><i class="fas fa-search"></i></button> </li>
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

					echo "<a href='services/logOff.php'> <button type='button' class='bg-red-500  text-white rounded-md px-7 py-3 uppercase hover:bg-red-200 shadow-lg shadow-red-500/50  transition duration-300'>Log out</button> </a>";
				} else {
					echo "<a href='login.php'> <button type='button' class='bg-pink-500  text-white rounded-md px-7 py-3 uppercase hover:bg-pink-300 shadow-lg shadow-cyan-500/50  transition duration-300'>Login</button> </a>";
				}
				?>




			</ul>
			<div class="flex  lg:hidden flex-1 justify-end">
				<form class="searchBar  md:block hidden mb-0" action="search.php" method="GET">
					<input class=" p-2 border border-black rounded-md" name="keyword" id="keyword" type="search"><button class="mr-12 uppercase ml-4 btn btn-green hover:bg-green-200" type="submit"><i class="fas fa-search"></i></button>
				</form>
				<i onclick="showSideMenu()" class="hover:cursor-pointer fas text-4xl fa-bars"></i>

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
		<div class=" justify-center  ">
		<form class="searchBarLittle md:hidden py-2 bg-blue-500 flex justify-center  mb-0" action="search.php" method="GET">
					<input class=" p-2 border border-black rounded-md" name="keyword" id="keyword" type="search"><button class="sm:mr-12 font-bold uppercase ml-4 btn btn-green hover:bg-green-200" type="submit"><p class="hidden sm:inline">Search</p>  <i class="sm:ml-4 fas fa-search"></i></button>
				</form>
				</div>
		<div class="xl:hidden lg:hidden">
	
		<div id="sideMenu" class=" hidden bg-neutral-700 border-l-2 border-b-2 rounded-bl-full text-white right-0 top-0 md:w-[45vw] sm:w-[52vw] w-[60vw]  overflow-hidden fixed z-[999]">
	
		<div> 
				<ul>
					<li class="pt-4 bg-neutral-200 pl-4 text-black  transition flex text-xl pb-1"> <p class="text-left flex-1">Menu</p>  <i class='flex-1 pr-[30px] hover:text-pink-500 text-right hover:cursor-pointer pl-6 fas fa-times'></i>
					</li>

					<?php

					if (isset($_SESSION["name"]) && $_SESSION["role"] == 0) {

						if (strpos($_SERVER['REQUEST_URI'], "userProfile.php") !== false) {
							echo "<a href='services/logOff.php'> <li class='px-7 py-3 uppercase text-right sm:text-center  hover:text-pink-500' transition> Log out <i class='pl-6 pr-1 fas fa-times'></i> </li></a>";
						} else {
							echo "<a href='userProfile.php'> <li class='px-7 py-3 uppercase text-right sm:text-center  hover:text-pink-500' transition> Profile <i class='pl-6  fas fa-user-circle'></i>  </li></a>";
							echo "<a href='services/logOff.php'> <li class='px-7 py-3 uppercase text-right sm:text-center  hover:text-pink-500' transition> Log out <i class='pl-6 pr-1 fas fa-times'></i> </li></a>";
						}
					} else if ((isset($_SESSION["name"]) && ($_SESSION["role"] == 1) || ($_SESSION["role"] == 2))) {

						echo "<a href='services/logOff.php'> <li class='px-7 py-3 uppercase text-right sm:text-center  hover:text-pink-500' transition> Log out <i class='pl-6 pr-1 fas fa-times'></i> </li></a>";
					} else {
						echo "<a href='login.php'> <li class='px-7 py-3 uppercase text-right sm:text-center  hover:text-pink-500' transition> Login <i class='pl-6  fas fa-user-circle'></i>  </li></a>";
					}
					?>


					<?php if ($_SESSION["role"] == 1 || $_SESSION["role"] == 2) {   ?> <a href='article.php?new=1'>
							<li class='px-7 py-3 uppercase text-right sm:text-center  hover:text-pink-500' transition> Create article <i class="pl-6 pr-1 fas fa-folder-plus"></i> </li>
						</a> <?php } ?>
					
						<li class="md:hidden block">
						<form class="mb-0 flex  flex-col" action="search.php" method="GET">
							<ul class=" text-right sm:text-center  ">
						<li class="pr-6 bg-neutral-500 mt-2"> <p class="py-2   uppercase">Categories <i class="pl-6 pr-2 inline fas fa-list"></i></p>  </li>
						<li class=" py-1"><button type="submit" value="1" name="type" class="py-3 px-6  hover:text-pink-500   text-white ">Crypto World</button></li>
						<li class=" py-1"><button type="submit" value="0" name="type" class="py-3 px-6  hover:text-pink-500   text-white ">Tech News</button></li>
						<li class=" py-1"><button type="submit" value="3" name="type" class="py-3 px-6  hover:text-pink-500  text-white ">Biotechnology</button></li>
						<li class=" py-1"><button type="submit" value="2" name="type" class=" py-3 px-6 hover:text-pink-500   text-white ">VR</button></li>
						<li class="sm:mb-10"></li>
				</ul>
				</form>
						</li>

						<li class="mb-6"></li>
				</ul>
			</div>
		</div>
		</div>
	</header>
	<body class="pt-28">