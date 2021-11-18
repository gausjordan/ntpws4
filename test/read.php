<?php
	$url = 'http://localhost/test/cars.json';
	$data = file_get_contents($url);
	$cars = json_decode($data, true);
	print '
	<!DOCTYPE html>
	<html>
		<head>
		<meta charset="utf-8">
		<title>Test</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		</head>
		<body>
			<h1>Auti</h1>';

			foreach ($cars as $car) {
				echo $car['Name'] . '&emsp;' . $car['Cylinders'] . '&emsp;' . $car['Horsepower'] . '&emsp;' . $car['Year'] . '&emsp;<br>';
			}
		echo '
		</body>
	</html>';
?>