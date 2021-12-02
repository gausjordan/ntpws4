<?php

    session_start();
    define('__Dinamo__', TRUE);
    include("dbconn.php");

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

        $query  = "SELECT id, title, summary, full_text, source, image1, image2, image3, approved FROM news WHERE id=\"" . $_POST['idvijesti'] . "\"";
        $result = @mysqli_query($MySQL, $query);
        $row = @mysqli_fetch_array($result, MYSQLI_ASSOC);

		echo '
		<div id="editnews">
			<h1>Article editor</h1>';

		echo '
			<form action="index.php?menu=11" method="post" enctype="multipart/form-data">

				<input type="hidden" id="_sent_" name="_sent_" value="TRUE">
                <input type="hidden" id="_id_" name="_id_" value="' . $row['id'] . '">
				<label for="newstitle">Main title <small>[Required]</small></label>
				<input name="newstitle" id="newstitle" type="text" value="' . $row['title'] . '" required></input>
				<label for="teaser">Splash teaser / tagline <small>[Required]</small></label>
				<input name="teaser" id="teaser" type="text" value="' . $row['summary'] . '" required></input>
				<label for="source">Name your source(s)</label>
				<input name="source" id="source" type="text" value="' . $row['source'] . '"></input>
				<label for="fullstory">The whole story <small>[Required]</small></label>
				<textarea name="fullstory" id="fullstory" cols="40" rows="10" required>' . $row['full_text'] . '</textarea>';

                if ($row['image1'] != "") {
                    echo '<img src="newspics/' . $row['image1'] . '">';
                }
                echo '
                <label for="image_ul1">Change image 1 (optional)</label>
				<input name="image_ul1" id="image_ul1" type="file"></input>';

                if ($row['image2'] != "") {
                    echo '<img src="newspics/' . $row['image2'] . '">';
                }
                echo '
				<label for="image_ul2">Change image 2 (optional)</label>
				<input name="image_ul2" id="image_ul2" type="file"></input>';

                if ($row['image3'] != "") {
                    echo '<img src="newspics/' . $row['image3'] . '">';
                }
                echo '
				<label for="image_ul3">Change image 3 (optional)</label>
				<input name="image_ul3" id="image_ul3" type="file"></input>

				<input id="sendit" type="submit" value="Update news story" style="width: 35%; min-width: 16em;"></input>
				
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

        $query = "UPDATE news SET title='" . $_POST['newstitle'] . "', ";
        $query .= "summary='" . $_POST['teaser'] . "', ";
        $query .= "full_text='" . $_POST['fullstory'] . "', ";
        if ($_FILES['image_ul1']['name'] != "" || $_FILES['image_ul2']['name'] != "" || $_FILES['image_ul3']['name'] != "") {
            $query .= "image1 = '" . $_FILES['image_ul1']['name'] . "', ";
            $query .= "image2 = '" . $_FILES['image_ul2']['name'] . "', ";
            $query .= "image3 = '" . $_FILES['image_ul3']['name'] . "', ";
        }
        $query .= "source = '" . $_POST['source'] . "'";
        $query .= " WHERE news.id=" . $_POST['_id_'];
        $result = mysqli_query($MySQL, $query);

		header("Refresh: 0; url=index.php?menu=2");

        /* Debug
		echo 'Query: <br>';
        echo $query;
        echo '<br>';
        echo 'Vijest ID: ' . $_POST['_id_'];
		*/
        
	}

	echo '
		</div>
	';
	
?>