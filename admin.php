<?php

	session_start();
    define('__Dinamo__', TRUE);
    include("dbconn.php");

	echo '
		<div id="admin">';

			# Sigurnosna provjera, vrti se u svakoj situaciji
			if ($_SESSION['user']['valid'] != 'true' || $_SESSION['user']['role'] != 1) {
				echo '<h1>You are not authorized to view this page.</h1>';
				exit;
			}

			# Ako smo iz admin panela odabrali reset lozinke za korisnika izvrsava se samo ovaj mali blok
			if (isset($_GET['resetflag'])) {
				
				# Generator nasumičnog passworda
				$alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
				$pass = array();
				$alphaLength = strlen($alphabet) - 1;
				for ($i = 0; $i < 8; $i++) {
					$n = rand(0, $alphaLength);
					$pass[] = $alphabet[$n];
				}
				$newpass = implode($pass);
				$pass_hash = password_hash($newpass, PASSWORD_DEFAULT, ['cost' => 12]);

				$query = "UPDATE users SET password=\"" . $pass_hash . "\" WHERE id=" . $_GET['resetflag'];
				$result = @mysqli_query($MySQL, $query);

				echo '<h1>New password is <tt>' . $newpass . '</tt></h1>';
				exit;
			}

			# Pocetna tocka
			if (isset($_POST['_sent_'])==false) {
				
				$query  = "SELECT * FROM users";
				$result = @mysqli_query($MySQL, $query);
				$row = @mysqli_fetch_array($result, MYSQLI_ASSOC);

				echo '
					<h1>Admin menu - users directory</h1>
					<form action="" id="users_directory" name="users_directory" method="POST">
					<input type="hidden" id="_sent_" name="_sent_" value="TRUE">
						<table style="width:100%;">
							<tr>
								<th>First name</th>
								<th>Last name</th>
								<th>Username</th>
								<th>Password</th>
								<th>Role</th>
								<th>Activation</th>
							</tr>';
							
							foreach ($result as $r) {
								echo '
									
									<input type="hidden" id="_userid_" name="person['.$r['id'].'][_userid_]" value="' . $r['id'] . '">
									<tr>
										<td>
											<input type="text" id="fname" name="person['.$r['id'].'][firstname]" value="' . $r['firstname'] . '" required>
										</td>
										<td>
											<input type="text" id="lname" name="person['.$r['id'].'][lastname]" value="' . $r['lastname'] . '" required>
										</td>
										<td>
											<input type="text" id="username" name="person['.$r['id'].'][username]" pattern=".{4,20}" value="' . $r['username'] . '" required><br>
										</td>
										<td>
											<a href="index.php?menu=8&resetflag='.$r['id'].'"><div id="resetbutton">Reset</div></a>
											<!--<input type="submit" value="Reset"> -->
										</td>
										<td>
											<select name="person['.$r['id'].'][role]" id="role">';
										if ( $r['role'] == 1 )
											echo '<option value="1" selected="selected">Administrator</option>';
										else {
											echo '<option value="1">Administrator</option>';
										}

										if ( $r['role'] == 2 )
											echo '<option value="2" selected="selected">Editor</option>';
										else {
											echo '<option value="2">Editor</option>';
										}

										if ( $r['role'] == 3 )
											echo '<option value="3" selected="selected">User</option>';
										else {
											echo '<option value="3">User</option>';
										}								

									echo '
										</select>
										</td>
										<td>
										<select name="person['.$r['id'].'][activation]" id="activation">';

										if ( $r['archive'] == 'N' ) {
											echo '<option value="N" selected="selected">Active</option>';
											echo '<option value="Y">Locked-out</option>';
										}
										else {
											echo '<option value="N">Active</option>';
											echo '<option value="Y" selected="selected">Locked-out</option>';
										}	

										echo '
										</td>
									</tr>
								';
							}

					echo'
						</table>
						<input type="submit" value="Apply changes"><br>
					</form>';
			}
			else {
				
				# Neucinkovito provodjenje odvojenog SQL upita za svakog korisnika jer sam lijen
				foreach ($_POST['person'] as $r) {
					$query = "";
					$query = "UPDATE users SET firstname=\"" . $r['firstname'] . "\", lastname=\"" . $r['lastname'] . "\", username=\"" . $r['username'];
					$query .= "\", role=" . $r['role'] . ", archive='" . $r['activation'] . "' WHERE id=" . $r['_userid_'];
					$result = mysqli_query($MySQL, $query);
					header("Refresh: 0; url=index.php?menu=8");
				}

			}

		echo '</div>
	';
?>