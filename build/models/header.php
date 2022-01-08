<?php if (session_status() != PHP_SESSION_ACTIVE) {
	session_start();
	if (!isset($_SESSION["role"])) {
		$_SESSION["role"] = 0;
	}
} ?>

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
	
		$("#sideMenu").animate({width:'toggle'},350);
	}

	$(document).mouseup(function(e) {
		console.log("ee");
		var container = $("sideMenu");

		if (!container.is(e.target) && container.has(e.target).length === 0) {
			$("#sideMenu").animate({width:'hide'},350);
		}
	});
</script>

<body class="font-Readex">

	<!-- Header -->
	<header>
		<nav class=" container flex items-center py-4 mt-4 sm:mt-12">
			<a class="z-20" href="index.php">
				<div class="py-1 z-20 flex items-baseline"> <i class="text-7xl fas fa-microchip"></i>
					<p class="px-2 uppercase underline decoration-wavy decoration-indigo-500 text-6xl">Teknews</p> 
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
					echo "<a href='login.php'> <button type='button' class='bg-indigo-500  text-white rounded-md px-7 py-3 uppercase hover:bg-indigo-200 shadow-lg shadow-cyan-500/50  transition duration-300'>Login</button> </a>";
				}
				?>




			</ul>
			<div class="flex  lg:hidden flex-1 justify-end">
				<form class="searchBar mb-0" action="search.php" method="GET">
					<input class=" p-2 border border-black rounded-md" name="keyword" id="keyword" type="search"><button class="mr-12 uppercase ml-4 btn btn-green hover:bg-green-200" type="submit"><i class="fas fa-search"></i></button>
				</form>
				<i onclick="showSideMenu()" class="hover:cursor-pointer fas text-4xl fa-bars"></i>

			</div>
			<div class="hidden lg:block overflow-hidden bg-blue-600 rounded-l-full rounded-r-full absolute h-96 w-2/6 -top-48 -left-60 z-0"></div>
		</nav>
		<div class="flex justify-center mt-12 container">
		<form class="searchBarLittle hidden mb-0" action="search.php" method="GET">
					<input class=" p-2 border border-black rounded-md" name="keyword" id="keyword" type="search"><button class="mr-12 font-bold uppercase ml-4 btn btn-green hover:bg-green-200" type="submit">Search <i class="ml-4 fas fa-search"></i></button>
				</form>
				</div>
		<div class="xl:hidden lg:hidden">
		<div id="sideMenu" class=" hidden bg-black/70 text-white right-0 top-0 w-[40vw] h-[100%] fixed z-[999]">
			<div>
				<ul>
					<li class="mt-12 ml-4">
					</li>

					<?php

					if (isset($_SESSION["name"]) && $_SESSION["role"] == 0) {

						if (strpos($_SERVER['REQUEST_URI'], "userProfile.php") !== false) {
							echo "<a href='services/logOff.php'> <li class='px-7 py-3 uppercase text-center hover:bg-slate-400' transition> Log out </li></a>";
						} else {
							echo "<a href='userProfile.php'> <li class='px-7 py-3 uppercase text-center hover:bg-slate-400' transition> Profile </li></a>";
						}
					} else if ((isset($_SESSION["name"]) && ($_SESSION["role"] == 1) || ($_SESSION["role"] == 2))) {

						echo "<a href='services/logOff.php'> <li class='px-7 py-3 uppercase text-center hover:bg-slate-400' transition> Log out </li></a>";
					} else {
						echo "<a href='login.php'> <li class='px-7 py-3 uppercase text-center hover:bg-slate-400' transition> Login </li></a>";
					}
					?>


					<?php if ($_SESSION["role"] == 1 || $_SESSION["role"] == 2) {   ?> <a href='article.php?new=1'>
							<li class='px-7 py-3 uppercase text-center hover:bg-slate-400' transition> Create article </li>
						</a> <?php } ?>


				</ul>
			</div>
		</div>
		</div>
	</header>