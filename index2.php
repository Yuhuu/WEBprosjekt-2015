<!DOCTYPE HTML>

<html lang="no">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="angular-1.0.1.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<link rel="stylesheet" href="style.css" type="text/css"/>

<title></title>
</head>
<script> 
$(document).ready(function(){
    $("#flip").click(function(){
        $("#panel").slideToggle("slow");
    });
});
</script>
<body>

<nav class="navbar-custom navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
       <a class="pull-left" href="#"><img src="/WEBprosjekt-2015/images/logo.png" alt="logo View">
      	</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav navbar-right">
          <li><a href="#section1">Chinese</a></li>
          <li><a href="#section2">section2</a></li>
          <li><a href="#section3">section3</a></li>
          <li><a href="#section3">section4</a></li>
        </ul>
      	<ul class="nav navbar-nav navbar-right">
        <li><a href="#" id ="flip" ><i class="fa fa-user"></i><i class="fa fa-list"></i>
Min side</a></li>
      	</ul>
    </div>
  </div>
</nav>

<?php
include "login.php";
?>
<!-- ?php
		$db = new mysqli("student.cs.hioa.no", "s184519",null,"s184519");
		$iUser = NULL;
		$iMessage = NULL;
		if($db->connect_errno > 0){
			die('failed to connect [' . $db->connect_error . ']');
		}
		$sql = "SELECT * FROM Forum";
		if(!$result = $db->query($sql)){
			//die('You done wrong [' . $db->error . ']');
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
	?> -->
	<div id="main-content" ng-controller="PostCtrl" ng-init="getPosts()">
      <input class="hidden" type="checkbox" ng-model="viewEditPost" />
      <a href="#" class="submitButton" ng-click="viewEditPost=!viewEditPost"></a>
	<form class="postForm" ng-submit="newPost(this);viewEditPost=!viewEditPost">
	  <input class="inputTitle" type="text" name="title" ng-model="title" placeholder="tittel" /><br />
	  <textarea class="inputContent" name="content" ng-model="content" placeholder="innhold"></textarea><br />
	  <input class="inputPsw" type="password" name="psw" ng-model="psw" placeholder="passord" />
	  <button class="submitButton" type="submit">Legg til post</button> 
	  <button class="submitButton" ng-click="$scope.viewEditPost=false">angre</button>  
	</form>
	</div>
    
    <div ng-repeat="post in posts">
	  <input class="hidden" type="checkbox" ng-model="post.edit" />
	  <h2 ng-click="post.edit=!post.edit" ng-show="!post.edit">{{post.title}}</h2>
	  <p ng-show="!post.edit">{{post.content}}</p>
	  <form class="postForm" ng-show="post.edit" ng-submit="updatePost(post,this);post.edit=!post.edit">
	    <input class="inputTitle" type="text" name="newPostTitle" ng-model="post.title" placeholder="tittel" /><br />
	    <textarea class="inputContent" name="newPostContent" ng-model="post.content" placeholder="innhold"></textarea><br />
	    <button class="submitButton" type="submit">Endre post</button> 
	    <button class="submitButton" ng-click="post.edit=!post.edit">Angre</button> 
	    <input class="inputPsw" placeholder="passord" type="password" name="something" ng-model="psw" />
	  </form>
	 </div>
</body>
</html>




