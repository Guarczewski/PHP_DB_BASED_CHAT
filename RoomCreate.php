<?php

	$host = ""; 					// IP Hosta
	$dbusername = ""; 				// Nazwa Uzytkownika
	$dbpassword = ""; 						// Haslo Uzytkownika
	$dbname = ""; 						// Nazwa Bazy

	$LoginTable = "login_credentials";

	$Connect = new mysqli($host, $dbusername, $dbpassword, $dbname);

	function SecureString($String){
		global $Connect;
		$Output = $String;
		$Output = strip_tags($Output);							// Remove all weird characters
		$Output = stripslashes($Output);						// Remove all weird characters
		$Output = mysqli_real_escape_string($Connect,$Output);	// Remove all weird characters
		return $Output;											// Return safe String
	}

	if (isset($_POST['RoomName']) && isset($_POST['RoomPassword']) && isset($_POST['RoomDeleteCode'])) {

		$RoomName = SecureString($_POST['RoomName']);		// Get value using URL and pass him threw secure function
		
		$RoomPassword = SecureString($_POST['RoomPassword']);	// Get value using URL and pass him threw secure function
		$RoomPassword = hash('sha512', $RoomPassword);		// Hash Password
		
		$RoomRemovalCode = SecureString($_POST['RoomDeleteCode']);	// Get value using URL and pass him threw secure function
		$RoomRemovalCode = hash('sha512', $RoomRemovalCode);		// Hash Password
		
		$LogInQuery = "SELECT * FROM `$LoginTable` WHERE room_name = '$RoomName'"; // LogIn Query

		@$result = mysqli_query($Connect,$LogInQuery);	// Run Query
		@$LogInData = mysqli_fetch_assoc($result);		// Get Data
		@$LogInRows = mysqli_num_rows($result);			// Count how many results
		@mysqli_free_result($result);					// Free Result
		
		if ($LogInRows < 1) {
			$Creation_Query = "INSERT INTO `$LoginTable` VALUES ('','$RoomName','$RoomPassword','$RoomRemovalCode');";
			mysqli_query($Connect,$Creation_Query);
		}
		else {
			print "<p> Room with this name already exists, please try diffrent one </p>";
		}
	
	}
?>