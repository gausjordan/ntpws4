<?php
	echo '
		<h1>Contact Form</h1>
		<div id="contact">
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2884.0265454195933!2d15.49589141575538!3d43.70999740677372!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1334c1567ce59113%3A0x8aeda924260c3b91!2sBabina%20Guzica!5e0!3m2!1sen!2shr!4v1635332218241!5m2!1sen!2shr" width="100%" height="400" style="border:0; padding-bottom:1em;" allowfullscreen=""; loading="lazy"></iframe>

			<form action="#" id="contact_form" name="contact_form" method="POST">
				<label for="fname">First Name *</label>
				<input type="text" id="fname" name="firstname" placeholder="Your name..." required>

				<label for="lname">Last Name *</label>
				<input type="text" id="lname" name="lastname" placeholder="Your last name..." required>
				
				<label for="lname">Your E-mail *</label>
				<input type="email" id="email" name="email" placeholder="Your e-mail..." required>

				<label for="country">Country</label>
				<select id="country" name="country">
				  <option value="">Please select</option>
				  <option value="HR" selected>Croatia</option> 
				  <option value="CD">Democratic Republic of Congo</option>
				  <option value="CX">Christmas Island</option>
				  <option value="GW">Guinea-Bissau</option>
				</select>

				<label for="subject">Subject</label>
				<textarea id="subject" name="subject" placeholder="Write something.." style="height:200px"></textarea>

				<input type="submit" value="Submit">
			</form>
		</div>
	';
?>