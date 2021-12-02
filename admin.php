<?php

	session_start();
    define('__Dinamo__', TRUE);
    include("dbconn.php");

	echo '<style>
	
	#admin th {
		text-align: left;
	}

	#admin table input, select {
		width: 96%;
	}

	#admin table input[type=submit] {
		width: 96%;
		display: block;
		background-color: white;
		border: 1px solid silver;
		color: black;
		padding: 12px 20px;
		border-radius: 4px;
		cursor: pointer;
		margin-bottom: 1em;
	}

	#admin table input[type=submit]:hover {
		background-color: gray;
		color: white;
	}

	</style>';


	echo '
		<div id="admin">';

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
											<input type="submit" value="Reset">
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
				
				foreach ($_POST['person'] as $r) {
					$query = "";
					$query = "UPDATE users SET firstname=\"" . $r['firstname'] . "\", lastname=\"" . $r['lastname'] . "\", username=\"" . $r['username'];
					$query .= "\", role=" . $r['role'] . ", archive='" . $r['activation'] . "' WHERE id=" . $r['_userid_'];
					$result = mysqli_query($MySQL, $query);
				}

				header("Refresh: 0; url=index.php?menu=8");

			}








		echo '</div>
	';
?>