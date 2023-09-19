<?php

	$host = ""; 					// IP Hosta
	$dbusername = ""; 				// Nazwa Uzytkownika
	$dbpassword = ""; 						// Haslo Uzytkownika
	$dbname = ""; 						// Nazwa Bazy

	$LoginTable = "login_credentials";
	$Messanger_Table = "sample_message_room";
	
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
		
		$CheckQuery = "SELECT * FROM `login_credentials` WHERE room_name = '$RoomName' AND room_password = '$RoomPassword' AND room_removal_code = '$RoomRemovalCode'"; // LogIn Query

		@$result = mysqli_query($Connect,$CheckQuery);	// Run Query
		@$LogInData = mysqli_fetch_assoc($result);		// Get Data
		@$LogInRows = mysqli_num_rows($result);			// Count how many results
		@mysqli_free_result($result);					// Free Result
		
		if ($LogInRows == 1) {
			
			$FirstDeleteQuery = "DELETE FROM `login_credentials` WHERE room_name = '$RoomName'"; // LogIn Query
			@mysqli_query($Connect,$FirstDeleteQuery);	// Run Query
			
			$SecondDeleteQuery = "DELETE FROM `sample_message_room` WHERE room_name = '$RoomName'"; // LogIn Query
			@mysqli_query($Connect,$SecondDeleteQuery);	// Run Query

		}
		else {
			print "<p> Something Went Wrong </p>";
		}
	
	}
?>