<html>

 <?php include "models/header.php" ?>

		<!-- Landing -->
		<section class="relative">
			<div class="container flex  flex-col-reverse lg:flex-row items-center gap-12 mt-14 lg:mt-28">
				<!-- Content -->
				<div class="flex flex-1 z-10 flex-col items-center lg:items-start">
					<h2 class="text-gray-800 text-3xl md:text-4 lg:text-5xl text-center  lg:text-left mb-6">
						The Best News Feed
					</h2>
					<p class="text-gray-400 text-lg text-center lg:text-left mb-6">
						Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ultricies varius enim laoreet laoreet. Suspendisse at eros sit amet augue ultricies eleifend.
						In quis ultricies magna.
					</p> 
					
				</div>
				<!-- IMG -->
				<div class="flex justify-center flex-1 mb-10 md:mb-16 lg:mb-0 z-10  ">
					<img class="w-5/6 h-5/6 sm:w-3/4 sm:h-3/4 xl:w-full xl:h-full lg:w-full lg:h-full 2xl:h-full 2xl:w-full" src="img/test.jpg" alt="">
				</div>
			</div>
			<!-- epic shape-->
			<div class="hidden md:block overflow-hidden bg-green-300 rounded-l-full absolute h-80 w-2/4 top-32 right-0 lg:top-20 lg:w-2/6 xl:w-5/12"></div>
		</section>
		<!-- news grid bg-[#f8f9fa] -->
		<section class="py-20 mt-20 min-h-full">
			<div class="sm:w-3/4 lg:w-5/12 mx-auto px-2">
				<h1 class="text-3xl text-center text-gray-700">Tech News!</h1>
				<p class="text-gray-400 text-center mt-4">
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ultricies varius enim laoreet laoreet. Suspendisse at eros sit amet augue ultricies eleifend.
					In quis ultricies magna.
				</p>
			</div>
			<div name="news" id="news" class="container" >
				<?php
				include "../build/models/articles.php";
				?>
			</div>
		</section>

	<?php include "../build/models/footer.php" ?>

	</body>

	</html>