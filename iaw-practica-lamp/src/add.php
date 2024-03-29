<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Add Data</title>
</head>

<body>

<?php

include_once("config.php");

if(isset($_POST['Submit'])) {
	$name = mysqli_real_escape_string($mysqli, $_POST['name']);
	$age = mysqli_real_escape_string($mysqli, $_POST['age']);
	$email = mysqli_real_escape_string($mysqli, $_POST['email']);

	
	if(empty($name) || empty($age) || empty($email)) {
		if(empty($name)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}

		if(empty($age)) {
			echo "<font color='red'>Age field is empty.</font><br/>";
		}

		if(empty($email)) {
			echo "<font color='red'>Email field is empty.</font><br/>";
		}

	
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else {
		
		$stmt = mysqli_prepare($mysqli, "INSERT INTO users(name,age,email) VALUES(?,?,?)");
		mysqli_stmt_bind_param($stmt, "sis", $name, $age, $email);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_free_result($stmt);
		mysqli_stmt_close($stmt);

		echo "<font color='green'>Data added successfully.";
		echo "<br/><a href='index.php'>View Result</a>";
	}
}

mysqli_close($mysqli);

?>

</body>
</html>
