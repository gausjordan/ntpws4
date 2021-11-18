<?php
    
    ini_set('display_errors', '0');
    
    echo '
    <h1>Registration form</h1>
    <h2>At EcoPick®, we really don\'t respect your privacy.</h2>
    <div id = "register">
    ';
    
    # Ako smo prvi puta ovdje odnosno _sent_ nije podesen, prikazuje se forma.
    if ($_POST['_sent_'] == FALSE) {
		echo '
            <form action="" id="registration_form" name="registration_form" method="POST">
                <input type="hidden" id="_sent_" name="_sent_" value="TRUE">
                
                <label for="fname">First Name *</label>
                <input type="text" id="fname" name="firstname" placeholder="Enter your name here" required>

                <label for="lname">Last Name *</label>
                <input type="text" id="lname" name="lastname" placeholder="Enter your last name here" required>
                    
                <label for="dob">Date of Birth *</label>
                <input type="date" id="dob" name="dob" placeholder="Pick your date of birth" required>

                <label for="email">Your E-mail *</label>
                <input type="email" id="email" name="email" placeholder="Enter yur e-mail here" required>

                <label for="addrstreet">Address line 1 (street) *</label>
                <input type="text" id="addrstreet" name="addrstreet" placeholder="Enter your street name" required>

                <label for="addrnumber">Address line 2 (number) *</label>
                <input type="number" id="addrnumber" name="addrnumber" placeholder="Enter your street number" required>
                
                <label for="username">Username:* <small>Must contain at least 4 and up to 20 characters.</small></label>
                <input type="text" id="username" name="username" pattern=".{4,20}" placeholder="Username.." required><br>
                                        
                <label for="password">Password:* <small>(Password must contain at least 3 characters and 1 number)</small></label>
                <input type="password" id="password" name="password" placeholder="Password.." pattern="(?=.*\d).{3,}" required>

                <label for="country">Country:</label>
                <select name="country" id="country" style="margin-bottom: 3em">
                    <option value="">Choose your country</option>';
                        $query  = "SELECT * FROM countries";
                        $result = @mysqli_query($MySQL, $query);
                        while($row = @mysqli_fetch_array($result)) {
                            echo '<option value="' . $row['country_code'] . '">' . $row['country_name'] . '</option>';
                        }
                echo '
                </select>

                <input type="submit" value="Register">
            
            </form>';
    }

    # Ako je forma vec poslala svoje odnosno _sent_ je postavljen, idemo na ispis.
    
    else if ($_POST['_sent_'] == TRUE) {
        $query  = "SELECT * FROM users";
		$query .= " WHERE email='" .  $_POST['email'] . "'";
		$query .= " OR username='" .  $_POST['username'] . "'";
		$result = @mysqli_query($MySQL, $query);
		$row = @mysqli_fetch_array($result, MYSQLI_ASSOC);
		
		if ($row['email'] == '' || $row['username'] == '') {
			$pass_hash = password_hash($_POST['password'], PASSWORD_DEFAULT, ['cost' => 12]);

			$query  = "INSERT INTO users (firstname, lastname, email, addrstreet, addrnumber, username, password, dateofbirth, country)";
			$query .= " VALUES ('" . $_POST['firstname'] . "', '" . $_POST['lastname'] . "', '" . $_POST['email'] . "', '";
            $query .= $_POST['addrstreet'] . "', " . ((int)$_POST['addrnumber']) . ", '" . $_POST['username'] . "', '";
            $query .= $pass_hash . "', '" . $_POST['dob'] . "', '"  . $_POST['country'] . "')";
			$result = @mysqli_query($MySQL, $query);
			
			echo '<h2>' . ucfirst(strtolower($_POST['firstname'])) . ' ' .  ucfirst(strtolower($_POST['lastname'])) . ', thank you for registration.</h2><br>';
		}

		else {
			echo '<h2>User with this username or email already exists!</h2>';
		}

	}
	echo '</div>';
    
?>