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
					echo '<td><button type="button">Add as Friend</button></td>';
				} else
				{
					echo "<td>Friends</td>";
				}

			echo "</tr>";
			}
?>
		</table>
	</div>

</body>
</html>

<?php
?>