<?php

	session_start();
	define('__Dinamo__', TRUE);
	include("dbconn.php");

    $query  = "SELECT news.id, title, summary, full_text, firstname, lastname, published, source, image1, image2, image3, approved";
    $query .= " FROM news INNER JOIN users ON news.author_id=users.id WHERE news.id=\"" . $_GET['newsid'] . "\"";
    $result = @mysqli_query($MySQL, $query);
	$row = @mysqli_fetch_array($result, MYSQLI_ASSOC);

    echo '<div id="newsdetails">';
    
        echo '<h1>' . $row['title'] . '</h1>';
        echo '<h3>' . $row['summary'] . '</h1>';
        echo '<div id="images">';
            for ($i=0; $i < 3; $i++) {
                $broj_slike = 'image' . $i;
                if ($row[$broj_slike] != "") {
                    echo '<img src="/newspics/' . $row[$broj_slike] . '">';
                }
            }
        echo '</div>';
        echo $row['full_text'];
        echo '<p>Author: ' . $row['firstname'] . ' ' . $row['lastname'] . '</p>';
        echo '<p>Source: ' . $row['source'] . '</p>';
        echo '<p>Date: ' . $row['published'] . '</p>';

        echo '<h4><a href="index.php?menu=2">Back to news</a></h4>';

    echo '</div>';
    

?>