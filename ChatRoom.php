<!DOCTYPE html>

<?php

	$Username = "Empty";
	$RoomName = "Empty";
	$RoomPassword = "Empty";

	if (isset($_POST['Username']) && isset($_POST['RoomName']) && isset($_POST['RoomPassword'])) {
		$Username = $_POST['Username'];
		$RoomName = $_POST['RoomName'];
		$RoomPassword = $_POST['RoomPassword'];
	}
	
?>

<html>

	<head>
		<meta charset="UTF-8">
		<title> Sample </title>
	</head>

	<body>
	

		<header>
			<p> Sample Messanger </p>
			<?php print "<p> $RoomName </p>"; ?>
		</header>

		
		<div>
			<div style="border: 5px red dotted" id="MessageInput" style=" display: flex; align-items: center;">
				<input id="MessageSender" type="hidden" value="<?php print "$Username" ?>">
				<textarea id="MessageContentInput" style="flex: 90%; height: 100%;resize: none;"> </textarea>
				<button onclick="SendMessage()" style="flex: 10%;"> Sample </button> 
			</div>
		
			<div style="border: 5px blue dotted" id="MessageBox"> <input id='TopIdContainer' type='hidden' value='0'/> </div>
		</div>
		


	
		<script>

			function LoadMessages(Sample) {
				
				var xhttp = new XMLHttpRequest();
				
				if (Sample == null) {
					var TopID = document.getElementById("TopIdContainer").value;
					var TopIDC = document.getElementById("TopIdContainer");
				}				
				else if (Sample == -1) {
					var TopID = -1;
				}
				
				TopIDC.remove();
				
				xhttp.onreadystatechange = function() {
					
					if (this.readyState == 4 && this.status == 200) {
						var TmpContainer = document.getElementById("MessageBox").innerHTML;
						var Output = this.responseText + TmpContainer;
						
						document.getElementById("MessageBox").innerHTML = Output;
						
					}
					
				};
			 
				<?php print ("xhttp.open('GET', 'Ajax.php?Room=" . $RoomName ."&Passwd=" . $RoomPassword . "&Index=' + TopID, true); "); ?>
				
				xhttp.send();
				
			}		
			
			function SendMessage() {
				
				var xhttp = new XMLHttpRequest();
			  
				var MessageContent = document.getElementById("MessageContentInput").value;
				
				var MessageSender = document.getElementById("MessageSender").value;
				
				<?php print "xhttp.open('GET','Ajax.php?Room=" . $RoomName ."&Passwd=" . $RoomPassword . "&Sender=" . $Username . "&Msg=' + MessageContent , true); "; ?>
				
				xhttp.send();
				
				LoadMessages(null);
				
			}
			
			LoadMessages(null);
			
			setInterval(function(){LoadMessages(null)}, 10000);
			
		</script>
	
</html>