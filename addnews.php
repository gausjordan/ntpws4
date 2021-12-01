<?php

	# Mjesto za sve prenesene slike
	$uploaddir = 'newspics/';
	
	# Provjerava sto to korisnik uploada
	function fileCheck($uploadedFile, &$uploadFailed, &$txtlog) {
		global $uploaddir;
		$uploadfile = $uploaddir . basename($_FILES[$uploadedFile]['name']);
		$imageFileType = strtolower(pathinfo($uploadfile,PATHINFO_EXTENSION));
		$txtlog = "Image transfer completed successfully.";
		$uploadFailed = false;

		if ($imageFileType != "jpg" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
			$txtlog = "Unsupported image file format. Please provide GIF or JPG image file(s).";
			$uploadFailed = true;
		} else if ($_FILES[$uploadedFile]['size'] > 4194304) {
			$txtlog = "Uploaded image file size is too big (max size = 4 MB).";
			$uploadFailed = true;
		} else if (file_exists($uploadfile)) {
			$txtlog = "File already exists.";
			$uploadFailed = true;
		}
		else {
			if (!move_uploaded_file($_FILES[$uploadedFile]['tmp_name'], $uploadfile)) {
				$txtlog = "File transfer failed.";
				$uploadFailed = true;
			}
			if(!is_array(getimagesize($uploadfile))){
				unlink($uploadfile);
				$txtlog = "Invalid image file.";
				$uploadFailed = true;
			}
		}
	}

	if (isset($_POST['_sent_'])==false) {

		echo '
		<div id="addnews">
			<h1>Add another news article</h1>';

		echo '
			<form action="addnews.php" method="post" enctype="multipart/form-data">

				<input type="hidden" id="_sent_" name="_sent_" value="TRUE">
				<label for="newstitle">Main title <small>[Required]</small></label>
				<input name="newstitle" id="newstitle" type="text" placeholder="Title here" required></input>
				<label for="teaser">Splash teaser / tagline <small>[Required]</small></label>
				<input name="teaser" id="teaser" type="text" placeholder="Short story here" required></input>
				<label for="source">Name your source(s)</label>
				<input name="source" id="source" type="text" placeholder="Source here"></input>
				<label for="fullstory">The whole story <small>[Required]</small></label>
				<textarea name="fullstory" id="fullstory" cols="40" rows="10" placeholder="Complete full text here" required></textarea>

				<label for="image_ul1">Upload image 1 (optional)</label>
				<input name="image_ul1" id="image_ul1" type="file"></input>
				<label for="image_ul2">Upload image 2 (optional)</label>
				<input name="image_ul2" id="image_ul2" type="file"></input>
				<label for="image_ul3">Upload image 3 (optional)</label>
				<input name="image_ul3" id="image_ul3" type="file"></input>

				<input id="sendit" type="submit" value="Send" style="width: 35%; min-width: 16em;"></input>
				
			</form>
		';
	}

	else {
		
		if ($_FILES['image_ul1']['name'] != "") {
			fileCheck("image_ul1", $uploadFailed, $txtlog);
			if ($uploadFailed) {
				echo 'Error handling the 1st image: ' . $txtlog . '<br>';
				$_FILES['image_ul1']['name'] = "";
			}
		}
		if ($_FILES['image_ul2']['name'] != "") {
			fileCheck("image_ul2", $uploadFailed, $txtlog);
			if ($uploadFailed) {
				echo 'Error handling the 2nd image: ' . $txtlog . '<br>';
				$_FILES['image_ul2']['name'] = "";
			}
		}
		if ($_FILES['image_ul3']['name'] != "") {
			fileCheck("image_ul3", $uploadFailed, $txtlog);
			if ($uploadFailed) {
				echo 'Error handling the 3rd image: ' . $txtlog . '<br>';
				$_FILES['image_ul3']['name'] = "";
			}
		}

		session_start();
		define('__Dinamo__', TRUE);
		include("dbconn.php");


		$stmt = $MySQL->prepare(	"INSERT INTO news (title, summary, full_text, author_id, source,
									image1, image2, image3)	VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
		
		$stmt->bind_param(	'sssissss', $_POST['newstitle'], $_POST['teaser'], $_POST['fullstory'],
							$_SESSION['user']['id'], $_POST['source'], $_FILES['image_ul1']['name'],
							$_FILES['image_ul2']['name'], $_FILES['image_ul3']['name']);

		$stmt->execute();

	}

	echo '
		</div>
	';
	
?>