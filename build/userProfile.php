<html>

<?php include "models/header.php" ?>

<?php   
if (!isset($_SESSION["name"]) || !$_SESSION["role"] == 0){ 
		
		echo "<script>window.location.href = 'index.php';</script>	";
 } ?>
	
		<!-- news grid -->
		<section class="py-20 min-h-full">
            <div class="container">
				<?php
				include "../build/models/userPage.php";
				?>
			</div>
		</section>

		<?php include "../build/models/footer.php" ?>

	</body>

	</html>