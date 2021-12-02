<?php

	session_start();
	define('__Dinamo__', TRUE);
	include("dbconn.php");

	if ($_SESSION['user']['role'] == 1)
		$izbornik = "Admin's menu";
	else
		$izbornik = "Editor's menu";

	if ( isset($_POST['_publishtoggle_']) ) {
		$query = "UPDATE news SET approved = 'Y' WHERE id = " . $_POST['idvijesti'];
		$result = @mysqli_query($MySQL, $query);
	}
	if ( isset($_POST['_unpublishtoggle_']) ) {
		$query = "UPDATE news SET approved = 'N' WHERE id = " . $_POST['idvijesti'];
		$result = @mysqli_query($MySQL, $query);
	}
	if ( isset($_POST['_deletenews_']) ) {
		$query = "DELETE FROM news WHERE id = " . $_POST['idvijesti'];
		$result = @mysqli_query($MySQL, $query);
	}

	$query  = "SELECT news.id, title, summary, firstname, lastname, published, source, image1, approved FROM news INNER JOIN users ON news.author_id=users.id";
    $result = @mysqli_query($MySQL, $query);
	$row = @mysqli_fetch_array($result, MYSQLI_ASSOC);
	
	echo '
		<h1>News</h1>
		<div id="news">
		';

	foreach ($result as $r) {

		if ($r['approved'] == 'N') {
			$identifikator = "_publishtoggle_";
			$tekst = "Publish";
		} else {
			$identifikator = "_unpublishtoggle_";
			$tekst = "Un-publish";
		}

			if ((isset($_SESSION['user']['role']) && $_SESSION['user']['role'] != 3) || $r['approved']=='Y') {
				echo '
					<div class="flex-container">
						<div class="flex-item">
							<img src="/newspics/' . $r['image1'] . '">
							<p>Author: ' . $r['firstname'] . ' ' . $r['lastname'] . '</p>
							<p>Date: ' . $r['published'] . '</p>
						</div>
						<div class="flex-item flex-big-item">
							<h2><a href="index.php?menu=12&newsid=' . $r['id'] . '">' . $r['title'] . '</a></h2>
							<p>' . $r['summary'] . '...
							<a href="index.php?menu=12&newsid=' . $r['id'] . '">More</a></p>
							<p>Source: ' . $r['source']. '</p>
						</div>';
						
						if (isset($_SESSION['user']['role']) && $_SESSION['user']['role'] != 3) {
						echo '
							<div class="flex-item">
								<h3>'.$izbornik.'</h3>

								<form action="index.php?menu=2" id="publishingtoggle" name="publishingtoggle" method="POST">
									<input type="hidden" id="' . $identifikator . '" name="' . $identifikator . '" value="TRUE">
									<input type="hidden" id="idvijesti" name="idvijesti" value="' . $r['id'] . '">
									<input type="submit" value="' . $tekst . '"><br>
								</form>

								<form action="index.php?menu=11" id="editnews" name="editnews" method="POST">
									<input type="hidden" id="_editnews_" name="_editnews_" value="TRUE">
									<input type="hidden" id="idvijesti" name="idvijesti" value="' . $r['id'] . '">
									<input type="submit" value="Edit"><br>
								</form>
						';

								if ($_SESSION['user']['role'] == 1)	{
									echo '
									<form action="index.php?menu=2" id="deletenews" name="deletenews" method="POST">
										<input type="hidden" id="_deletenews_" name="_deletenews_" value="TRUE">
										<input type="hidden" id="idvijesti" name="idvijesti" value="' . $r['id'] . '">
										<input type="submit" value="Delete"><br>
									</form>
									';
								}
								
							echo '</div>';
						}
					echo '</div>
				';
			}
	};
	
	echo '</div>';
	echo '</main>';
	
?>