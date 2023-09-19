<?php

	$host = ""; 					// IP Hosta
	$dbusername = ""; 				// Nazwa Uzytkownika
	$dbpassword = ""; 						// Haslo Uzytkownika
	$dbname = ""; 						// Nazwa Bazy

	$LoginTable = "login_credentials";
	$Messanger_Table = "sample_message_room";

	$Connect = new mysqli($host, $dbusername, $dbpassword, $dbname);

	$RoomName = "Empty";		// Set Default Values
	$RoomPassword = "Empty";	// Set Default Values
	$MessageSender = "Empty";	// Set Default Values
	$MessageContents = "Empty";	// Set Default Values
	$MessageContents = "Empty";	// Set Default Values

	function SecureString($String){
		global $Connect;
		$Output = $String;
		$Output = strip_tags($Output);							// Remove all weird characters
		$Output = stripslashes($Output);						// Remove all weird characters
		$Output = mysqli_real_escape_string($Connect,$Output);	// Remove all weird characters
		return $Output;											// Return safe String
	}
	
	if (isset($_REQUEST['Room']) && isset($_REQUEST['Passwd'])){
		
		if (isset($_REQUEST['Index'])) {
			$LatestMessageId = SecureString($_REQUEST['Index']);	// Get value using URL and pass him threw secure function
		}
		
		$RoomName = SecureString($_REQUEST['Room']);		// Get value using URL and pass him threw secure function
		//$RoomName = hash('sha512', $RoomName);				// Hash Password
		
		$RoomPassword = SecureString($_REQUEST['Passwd']);	// Get value using URL and pass him threw secure function
		$RoomPassword = hash('sha512', $RoomPassword);		// Hash Password
	
		$LogInQuery = "SELECT * FROM `$LoginTable` WHERE room_name = '$RoomName' AND room_password = '$RoomPassword'"; // LogIn Query

		@$result = mysqli_query($Connect,$LogInQuery);	// Run Query
		@$LogInData = mysqli_fetch_assoc($result);		// Get Data
		@$LogInRows = mysqli_num_rows($result);			// Count how many results
		
		@mysqli_free_result($result);					// Free Result
		
		if ($LogInRows == 1) {
			
			if (isset($_REQUEST['Sender']) && isset($_REQUEST['Msg'])) {			

				$MessageSender = SecureString($_REQUEST['Sender']);	// Get value using URL and pass him threw secure function
				$MessageContents = SecureString($_REQUEST['Msg']);	// Get value using URL and pass him threw secure function
				
				$SendMessageQuery = "INSERT INTO `$Messanger_Table` VALUES ('','$RoomName','$MessageSender','$MessageContents ',now())"; // Send Message Query
				
				@mysqli_query($Connect,$SendMessageQuery); // Run Query
				
			}
			
			else {

				if ($LatestMessageId == -1) { $Get_Messanger_Query = "SELECT * FROM `$Messanger_Table` WHERE message_room  = '$RoomName' ORDER BY message_id DESC"; } // Load All Messages
				else if ($LatestMessageId == 0) { $Get_Messanger_Query = "SELECT * FROM `$Messanger_Table` WHERE message_room  = '$RoomName' ORDER BY message_id DESC LIMIT 30"; } // Load only 30 latest messages
				else { $Get_Messanger_Query = "SELECT * FROM `$Messanger_Table` WHERE  message_id > $LatestMessageId AND message_room  = '$RoomName' ORDER BY message_id DESC"; } // Load latest messages
				
				@$result = mysqli_query($Connect,$Get_Messanger_Query);
				
				$NewTopID = null;
				
				while ($row = @mysqli_fetch_assoc($result)){		
				
					if ($NewTopID == null) { $NewTopID = $row["message_id"]; } // Asign New Top ID
					
					print (" <p class='Message_Username' id=". $row["message_id"] ." > Sender: " . $row["message_sender"] . " </p> <p class='Message_Contents'> Message: " . $row["message_contents"] . "</p> <p class='Message_Time'> Time: " .$row["message_time"]. "</p> ");
				}
				
				if($NewTopID < $LatestMessageId){ $NewTopID = $LatestMessageId; }
				
				print "<input id='TopIdContainer' type='hidden' value='$NewTopID'/>";
				
			}
			
		}

	}
	
	mysqli_close($Connect); // Kill Connection
	
?>