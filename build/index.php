<html">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" 
	integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA=="
	crossorigin="anonymous" 
	referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="styles.css"
	>
</head>
<body class="font-Readex" >
	
	<!-- Header -->
	<header>
		<nav class=" container flex items-center py-4 mt-4 sm:mt-12">
			<div class="py-1 z-20 flex items-baseline"> <img src="img/logo.png" alt=""> <p class="px-2 uppercase text-6xl">Omegalol</p></div>	
			<ul class="hidden md:flex flex-1 justify-end items-center gap-12 text-gray-700 uppercase text-xs" >
				<li class="cursor-pointer">Items</li>
				<li class="cursor-pointer">Items</li>
				<li class="cursor-pointer">Items</li>   
				<button type="button" class="bg-indigo-500 text-white rounded-md px-7 py-3 uppercase hover:bg-indigo-200  transition duration-300">Login</button>
			</ul>
			<div class="flex md:hidden flex-1 justify-end"> 
				<i class="fas text-4xl fa-bars"></i>
			</div>
		<div class="hidden md:block overflow-hidden bg-blue-600 rounded-l-full rounded-r-full absolute h-96 w-2/6 -top-48 -left-60 z-0"></div>
		</nav>
	</header>

	<!-- Landing -->
	<section class="relative">
		<div class="container flex flex-col-reverse lg:flex-row items-center gap-12 mt-14 lg:mt-28">
			<!-- Content -->
			<div class="flex flex-1 z-10 flex-col items-center lg:items-start">
				<h2 class="text-gray-800 text-3xl md:text-4 lg:text-5xl text-center lg:text-left mb-6">
					The Best News Feed
				</h2>
				<p class="text-gray-400 text-lg text-center lg:text-left mb-6">
				Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ultricies varius enim laoreet laoreet. Suspendisse at eros sit amet augue ultricies eleifend. 
				In quis ultricies magna.
				</p>
				<div class="flex justify-center flex-wrap gap-6">
				<button type="button" class="btn btn-green hover:bg-green-200">Yeeeeee</button>
					<button type="button" class="btn btn-purple hover:bg-purple-300">Yooo</button>
					
				</div>
			</div>
			<!-- IMG -->
			<div class="flex justify-center flex-1 mb-10 md:mb-16 lg:mb-0 z-10">
				<img class="w-5/6 h-5/6 sm:w-3/4 sm:h-3/4 xl:w-full xl:h-full lg:w-full lg:h-full 2xl:h-full 2xl:w-full" src="img/test.jpg" alt="">
			</div>
		</div>
		<!-- epic shape-->
		<div class="hidden md:block overflow-hidden bg-green-300 rounded-l-full absolute h-80 w-2/4 top-32 right-0 lg:top-20 lg:w-2/6 xl:w-5/12"></div>
	</section>

	<!-- news grid -->
	<section class="py-20 mt-20">
			<div class="sm:w-3/4 lg:w-5/12 mx-auto px-2">
				<h1 class="text-3xl text-center text-gray-700">Tech News!</h1>
				<p class="text-gray-400 text-center mt-4">
				Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ultricies varius enim laoreet laoreet. Suspendisse at eros sit amet augue ultricies eleifend. 
				In quis ultricies magna.
				</p>
			</div>
			<div class="container">
			<?php
			include "../build/models/test.php";	
			?>
			</div>
	</section>



</body>
</html>