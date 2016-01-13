<!DOCTYPE HTML>

<html lang="no">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="style.css" type="text/css" />
<script src="angular-1.0.1.min.js"></script>
<title></title>
</head>
<body>
		<h1>Database og XML,angular</h1>
<?php
echo "Motovorgn";
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
	<div id="main-content" ng-controller="PostCtrl" ng-init="getPosts()">
      <input class="hidden" type="checkbox" ng-model="viewEditPost" />
      <a href="#" class="submitButton" ng-click="viewEditPost=!viewEditPost">+</a>
      <article ng-show="viewEditPost">
	<form class="postForm" ng-submit="newPost(this);viewEditPost=!viewEditPost">
	  <input class="inputTitle" type="text" name="title" ng-model="title" placeholder="tittel" /><br />
	  <textarea class="inputContent" name="content" ng-model="content" placeholder="innhold"></textarea><br />
	  <input class="inputPsw" type="password" name="psw" ng-model="psw" placeholder="passord" />
	  <button class="submitButton" type="submit">Legg til post</button>  <!-- translations -->
	  <button class="submitButton" ng-click="$scope.viewEditPost=false">angre</button>  <!-- translations -->
	</form>
</form>
      <!--</article><!-- the big divide between the header and the content with edit --->
      <div ng-repeat="post in posts">
	<article>
	  <input class="hidden" type="checkbox" ng-model="post.edit" />
	  <h2 ng-click="post.edit=!post.edit" ng-show="!post.edit">{{post.title}}</h2>
	  <p ng-show="!post.edit">{{post.content}}</p>
	  <form class="postForm" ng-show="post.edit" ng-submit="updatePost(post,this);post.edit=!post.edit">
	    <input class="inputTitle" type="text" name="newPostTitle" ng-model="post.title" placeholder="tittel" /><br />
	    <textarea class="inputContent" name="newPostContent" ng-model="post.content" placeholder="innhold"></textarea><br />
	    <button class="submitButton" type="submit">Endre post</button> <!-- translations -->
	    <button class="submitButton" ng-click="post.edit=!post.edit">Angre</button> <!-- translations -->
	    <input class="inputPsw" placeholder="passord" type="password" name="something" ng-model="psw" />
	  </form>
</body>
</html>




