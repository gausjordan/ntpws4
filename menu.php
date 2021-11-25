<?php 
	
	ini_set('display_errors', '0');

	echo '
			<ul>
				<li><a href="index.php?menu=1">Home</a></li>
				<li><a href="index.php?menu=2">News</a></li>
				<li><a href="index.php?menu=3">Contact</a></li>
				<li><a href="index.php?menu=4">About</a></li>
				<li><a href="index.php?menu=5">Gallery</a></li>';
				
			if ( isset($_SESSION['user']['valid']) && $_SESSION['user']['valid'] == TRUE ) {

				echo '<li><a href="index.php?menu=10">Add News</a></li>';

					switch($_SESSION['user']['role']) {
						case 1:
							echo '<li><a href="index.php?menu=8">Admin</a></li>';
							break;
					}

				echo '<li><a href="index.php?menu=9">Sign Out</a></li>';


			} else {
				echo '
					<li><a href="index.php?menu=6">Register</a></li>
					<li><a href="index.php?menu=7">Sign in</a></li>';
			}
	echo 	'</ul>';
?>