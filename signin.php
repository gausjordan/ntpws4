<?php
    
    ini_set('display_errors', '0');
    
    echo '
        <h1>Sign-in</h1>
        <div id = "signin">
    ';

    if (isset($_POST['_sent_']) == FALSE || $_POST['_sent_'] == FALSE) {
		
		echo '
			<h2>We don\'t have any cybersec specialists... Good luck.</h2>
            <form action="" name="loginForm" id="loginForm" method="POST">
                <input type="hidden" id="_sent_" name="_sent_" value="TRUE">

                <label for="username">Username:*</label>
                <input type="text" id="username" name="username" value="" pattern=".{4,20}" required>
                                        
                <label for="password">Password:*</label>
                <input type="password" id="password" name="password" value="" pattern="(?=.*\d).{3,}" required>
                                        
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
			$_SESSION['success'] = 'true';
			# Vracamo se na signin.php, s tim da ce iz druge zbog postavljenog flag-a propasti dalje
			# header("Location: index.php?menu=7");
			
		}
		
		# Failure
		else {
			unset($_SESSION['user']['lastname']);
			$_SESSION['success'] = 'false';
			# Vracamo se na signin.php, s tim da ce iz druge zbog postavljenog flag-a propasti dalje
			# header("Location: index.php?menu=7");

			# $_SESSION['message'] = '<p>You\'ve entered wrong email or password!</p>';
			# header("Location: index.php?menu=7");
		}
	}

	if ($_SESSION['success'] == FALSE) {
		unset($_SESSION['success']);
		echo '<h1>Sases.<h1>';
		#sleep(1);
		#header("Location: index.php?menu=2");
		

	}
	else {
		unset($_SESSION['success']);
		echo '<h1>Fail<h1>';
		#sleep(1);
		#header("Location: index.php?menu=3");
	}
	
    echo '</div>';
    
?>