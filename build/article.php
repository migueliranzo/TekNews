<html class="scroll-smooth">

	<head>
		<style>
			
		</style>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Index</title>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
		<link rel="stylesheet" href="styles.css">
	</head>

	<body class="font-Readex">

		<!-- Header -->
		<header>
			<nav class=" container flex items-center py-4 mt-4 sm:mt-12">
				<div class="py-1 z-20 flex items-baseline"> <img src="img/logo.png" alt="">
					<p class="px-2 uppercase underline decoration-wavy decoration-indigo-500 text-6xl">Omegalol</p>
				</div>
				<ul class="hidden md:flex flex-1 justify-end items-center gap-12 text-gray-700 uppercase text-xs">
					<li class="cursor-pointer">Items</li>
					<li class="cursor-pointer">Items</li>
					<li class="cursor-pointer">Items</li>

					<button type="button" class="bg-indigo-500  text-white rounded-md px-7 py-3 uppercase hover:bg-indigo-200 shadow-lg shadow-cyan-500/50  transition duration-300">Login</button>
				</ul>
				<div class="flex md:hidden flex-1 justify-end">
					<i class="fas text-4xl fa-bars"></i>
				</div>
				<div class="hidden md:block overflow-hidden bg-blue-600 rounded-l-full rounded-r-full absolute h-96 w-2/6 -top-48 -left-60 z-0"></div>
			</nav>
		</header>


		<!-- news grid -->
		<section class="py-20 mt-20">
            <div class="container">
				<?php
				include "../build/models/articleDets.php";
				?>
			</div>
		</section>

       

	</body>

	</html>