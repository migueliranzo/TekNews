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

	<body class="font-Readex">

		<!-- Header -->
		<header>
			<nav class=" container flex items-center py-4 mt-4 sm:mt-12">
                <a class="z-20" href="index.php">
				<div class="py-1 z-20 flex items-baseline"> <i class="text-7xl fas fa-microchip"></i>
					<p class="px-2 uppercase underline decoration-wavy decoration-indigo-500 text-6xl">TechyNews</p>
				</div>
                </a>
				<ul class="hidden md:flex flex-1 justify-end items-center gap-12 text-gray-700 uppercase text-xs">
					<li class="cursor-pointer">Items</li>
					<form class="mb-0" action="search.php" method="GET">
					<li> <input class="p-2 border border-black rounded-md" name="keyword" id="keyword" type="search"><button class="uppercase ml-4 btn btn-green" type="submit">Search news</button> </li>
					</form>
                    <a href="login.php">
					<button type="button"  class="bg-indigo-500  text-white rounded-md px-7 py-3 uppercase hover:bg-indigo-200 shadow-lg shadow-cyan-500/50  transition duration-300">Login</button>
                    </a>
                </ul>
				<div class="flex md:hidden flex-1 justify-end">
					<i class="fas text-4xl fa-bars"></i>
				</div>
				<div class="hidden md:block overflow-hidden bg-blue-600 rounded-l-full rounded-r-full absolute h-96 w-2/6 -top-48 -left-60 z-0"></div>
			</nav>
		</header>