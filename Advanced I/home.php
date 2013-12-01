<?php

	include_once("connection.php");
	include_once ("userClass.php");

	$user = new User(
		$_SESSION['user']['id'],
		$_SESSION['user']['first_name'],
		$_SESSION['user']['last_name'],
		$_SESSION['user']['email'],
		$_SESSION['user']['password'],
		$_SESSION['user']['created_at'],
		$_SESSION['user']['updated_at']
	);

?>

<html>
<head>
	<title>Home</title>
	<script type="text/javascript" src="jquery/jquery-1.10.2.js"></script>
	<script type="text/javascript">
		 $(document).ready(function(){

		 	$('button').click(function() {
		 		console.log("Friend button clicked");
		 		console.log($(this).val());
		 		console.log($('#hiddenUserID').val());
		 		var $userID = $('#hiddenUserID').val();
		 		var $friendID = $(this).val();
		 		$('#userID').attr("value", $userID);
		 		$('#friendID').val($friendID);
		 		$('#addFriend').submit();
		 	});

		 });
	</script>
</head>
<body>
	<div id="wrapper">
		<?php
		echo "<br>Welcome, " . $user->first_name . "!<br>";
		echo $user->email;
		?>
	</div>
	<div id="friends_list">
		<br>List of Friends
		<table border="1">
			<tr>
				<th>Name</th>
				<th>Email</th>
			</tr>
<?php
			$query = "SELECT * FROM friends
					LEFT JOIN users ON friends.friend_id = users.id
					WHERE friends.users_id = " . $user->id . ";";
			$rows = $user->connection->fetch_all($query);
			foreach ($rows as $row) {

			echo "<tr>";

				echo "<td>" . $row['first_name'] . " " . $row['last_name'] . "</td>";
				echo "<td>" . $row['email'] . "</td>";

			echo "</tr>";
			}
?>
		</table>
	</div>

	<div id="subscribedFriends">
		<br>List of Users who subscribed to Friend Finder:
		<table border="1">
			<tr>
				<th>Name</th>
				<th>Email</th>
				<th>Action</th>
			</tr>
<?php
			$query = "SELECT id, first_name, last_name, email FROM users
					WHERE users.id != " . $user->id . ";";
			$rows = $user->connection->fetch_all($query);
			foreach ($rows as $row) {
				$query = "SELECT * FROM friends 
				WHERE users_id = ". $user->id . " AND friend_id = ". $row['id'] . ";";
				$friends = $user->connection->fetch_all($query);

			echo "<tr>";

				echo "<td>" . $row['first_name'] . " " . $row['last_name'] . "</td>";
				echo "<td>" . $row['email'] . "</td>";
				if (count($friends) == 0 )
				{
					$rowID = $row['id'];
					echo "<td><button type='button' value=" . $rowID . ">Add as Friend</button></td>";
					//echo "<input id='hiddenRowID' type='hidden' name='friend_id' value=" . $rowID . ">";
				} else
				{
					echo "<td>Friends</td>";
				}
				echo "<input id='hiddenUserID' type='hidden' name='user_id' value='" . $user->id . "'>";
			echo "</tr>";
			}
?>
		</table>
	</div>
	<form id="addFriend" action="process.php" method="post">
		<input type="hidden" name="action" value="addFriend">
		<input type="hidden" id="userID" name="userID" value="">
		<input type="hidden" id="friendID" name="friendID" value="">
	</form>

</body>
</html>

<?php
?>