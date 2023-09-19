<!DOCTYPE html>

<html>

	<head>
		<meta charset="UTF-8">
		<title> Chat Index </title>
	</head>

	<body>
		<form style="border: 5px red dotted" action="RoomCreate.php" method="POST">
			<h1> Create New Room </h1>
			<h2> Room Name </h2> <input name="RoomName" type="text" placeholder="Room Name" />
			<h2> Room Password </h2> <input name="RoomPassword" type="password" placeholder="Room Password"/>
			<h2> Room Delete Code </h2> <input name="RoomDeleteCode" type="password" placeholder="Room Delete Code"/>
			<h2> Submit: </h2> <input type="submit" value = "Submit"/>
		</form>

		<form style="border: 5px red dotted" action="ChatRoom.php" method="POST">
			<h1> Login Into Room </h1>
			<h2> Username </h2> <input name="Username" type="text" placeholder="Username"/>
			<h2> Room Name </h2> <input name="RoomName" type="text" placeholder="Room Name" />
			<h2> Room Password </h2> <input name="RoomPassword" type="password" placeholder="Room Password"/>
			<h2> Submit: </h2> <input type="submit" value = "Submit"/>
		</form>

		<form style="border: 5px red dotted" action="RoomRemove.php" method="POST">
			<h1> Remove Existing Room </h1>
			<h2> Room Name </h2> <input name="RoomName" type="text" placeholder="Room Name" />
			<h2> Room Password </h2> <input name="RoomPassword" type="password" placeholder="Room Password"/>
			<h2> Room Delete Code </h2> <input name="RoomDeleteCode" type="password" placeholder="Room Delete Code"/>
			<h2> Submit: </h2> <input type="submit" value = "Submit"/>
		</form>
	<body>
</html>