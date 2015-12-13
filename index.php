<!DOCTYPE HTML>

<html lang="no">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title></title>
</head>
<body>
		<h1>dette er en test: vwxyz 1234567890</h1>
<?php
echo "billet";
?>
<?php
		$db = new mysqli("student.cs.hioa.no", "s184519",null,"s184519");
		$iUser = NULL;
		$iMessage = NULL;
		if($db->connect_errno > 0){
			die('failed to connect [' . $db->connect_error . ']');
		}
		$sql = "SELECT * FROM Forum";
		if(!$result = $db->query($sql)){
			die('You done wrong [' . $db->error . ']');
		}	
		echo "<table border='1'>";
		while($row = $result->fetch_assoc()){
			echo "<tr><td>" . $row['User'] . "</td><td>" . $row['Title'].
			"</td><td>" . $row['msg']. "</td><td>" . $row['pic']."</td><td>" . $row['time'] . "</td></tr>";
		}
		echo "<p>Enter here:</p>";
		echo "<form action='database.php' method='post'>
			<tr><td>
			User: <input type='text' name='user'>
			</td>
			<td>
			title: <input type='text' name='title'>
			</td>
			<td>
			<p>your Picture:</p> <input type='text' name='pic'>
			</td>
			<td>
			Message:<br />
			<input type='text' name='message'><br />
			<input type='submit'>
			</td></tr>
			</form>";
		echo "</table>";
		if($_POST['user'] != NULL)
		{
			$iUser = mysqli_real_escape_string($db, $_POST['user']);
			$iMessage = mysqli_real_escape_string($db, $_POST['message']);
			$iTitle = mysqli_real_escape_string($db, $_POST['title']);
			$iPic = mysqli_real_escape_string($db, $_POST['pic']);
		}
		if($iUser != NULL && $iMessage != NULL)
		{
			mysqli_query($db, "INSERT INTO `s184519`.`Forum` (`ID`, `User`,'Title','msg','pic','time') VALUES (NULL,'$iUser','$iTitle', '$iMessage', '$iPic','NULL')");
		}
		echo mysqli_error($db);
		$db->close();
	?>

</body>
</html>
