<?php
    
	ini_set('display_errors', '0');

	$sleep_seconds = 3;

	
    echo '
        <h1>Sign-in</h1>
        <div id = "signin">
    ';

    if ( isset($_POST['_sent_']) == FALSE && !isset($_SESSION['success'])) {
		
		echo '
			<h2>We don\'t have any cybersec specialists... Good luck.</h2>
            <form action="" name="loginForm" id="loginForm" method="POST">
                <input type="hidden" id="_sent_" name="_sent_" value="TRUE">

                <label for="username">Username:*</label>
                <input type="text" id="username" name="username" value="" required>
                                        
                <label for="password">Password:*</label>
                <!-- Nije potrebno sugerirati korisniku kakav password mora biti, on to vec zna -->
				<!-- <input type="password" id="password" name="password" value="" pattern="(?=.*\d).{3,}" required> -->
				<input type="password" id="password" name="password" value="" required>
                                        
                <input type="submit" value="Sign in"><br>
            </form>';
	}
	else if (isset($_POST['_sent_']) == TRUE && !isset($_SESSION['success'])) {
		$query  = "SELECT * FROM users";
		$query .= " WHERE username='" .  $_POST['username'] . "'";
        $result = @mysqli_query($MySQL, $query);
		$row = @mysqli_fetch_array($result, MYSQLI_ASSOC);
		
		if (password_verify($_POST['password'], $row['password'])) {
			$_SESSION['user']['valid'] = 'true';
			$_SESSION['user']['id'] = $row['id'];
			$_SESSION['user']['firstname'] = $row['firstname'];
			$_SESSION['user']['lastname'] = $row['lastname'];
			$_SESSION['message'] = '<p>Welcome, ' . $_SESSION['user']['firstname'] . ' ' . $_SESSION['user']['lastname'] . '</p>';
            
			# Redirect to admin website
			$_SESSION['success'] = True;
			# Vracamo se na signin.php, s tim da ce iz druge zbog postavljenog flag-a propasti dalje
			header("Location: index.php?menu=7");
		}
		
		# Failure
		else {
			unset($_SESSION['user']['lastname']);
			$_SESSION['success'] = False;
			# Vracamo se na signin.php, s tim da ce iz druge zbog postavljenog flag-a propasti dalje
			# echo '<h1>Welcome, ' . $_SESSION['user']['firstname'] . ' ' . $_SESSION['user']['lastname'];
			
			echo '<h2>Wrong username or password. Please try again in <span id="vrijednost">' . $sleep_seconds . '</span> seconds.</h2>';
			echo '
			<script>
				var t = ' . $sleep_seconds . ';
				function countDown() {
					document.getElementById("vrijednost").innerHTML = t.toFixed(1);
				t -= 0.1;
				if (t === -1) { clearInterval(funkcija); }
				};
				let funkcija = setInterval(countDown, 100);
			</script>
			';

			header("Refresh:" . $sleep_seconds . "; url=index.php?menu=7");
			# $_SESSION['message'] = '<p>You\'ve entered wrong email or password!</p>';
		}
	}

	else {
		if ($_SESSION['success'] == TRUE) {
			unset($_SESSION['success']);
			header("Location: index.php?menu=1");
		}
	
	
		else {
			unset($_SESSION['success']);
			header("Location: index.php?menu=1");
		}
	}

    echo '</div>';
    
?>