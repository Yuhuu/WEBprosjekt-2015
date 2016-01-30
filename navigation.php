<?php
require_once 'functions.php';
?>

<nav class="navbar-custom">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
        <a class="pull-left col-sm-3" href="#"><img src="/WEBprosjekt-2015/images/logo.png" alt="logo View">
        </a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar" style="background-color:lightgray;">
        <ul class="nav navbar-nav navbar-left col-xs-12 col-md-6">
        <li class="col-md-6" style='background-color:lightgoldenrodyellow;'><a href="" id ="flip" ><i class="fa fa-list"></i>
        <?php
        include "userProfile.php";
        ?>
            </a>
        </li>
      	</ul>
         
        <ul class="nav navbar-nav col-xs-12 col-md-5">
          <li class="col-sm-6 col-xs-6 col-md-3" style="background-color:lavender;"><a href="#section1">Norsk</a></li>
          <li class="col-sm-6 col-xs-6 col-md-3" style="background-color:lavenderblush;"><a href="#section2">section2</a></li>
          <div class="clearfix visible-sm"></div>
          <li class="col-sm-6 col-xs-6 col-md-3" style="background-color:lightgoldenrodyellow;"><a href="#section3">section3</a></li>
          <li class="col-sm-6 col-xs-6 col-md-3" style="background-color:lightcyan;"><a href="#section3">section4</a></li>
        </ul>
    </div>
  </div>
</nav>

<?php
include "login.php";
?>
<!--      <div id="main-content" ng-controller="PostCtrl" ng-init="getPosts()">
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
    
    <div ng-repeat="post in plans">
	  <input class="hidden" type="checkbox" ng-model="post.recip" />
	  <h2 ng-click="post.recip=!post.recip" ng-show="!post.recip">{{post.auth}}</h2>
	  <p ng-show="!post.recip">{{post.message}}</p>
	  <form class="postForm" ng-show="post.recip" ng-submit="updatePost(post,this);post.recip=!post.recip">
	    <input class="inputTitle" type="text" name="newPostTitle" ng-model="post.title" placeholder="tittel" /><br />
	    <textarea class="inputContent" name="newPostContent" ng-model="post.content" placeholder="innhold"></textarea><br />
	    <button class="submitButton" type="submit">Endre post</button> 
	    <button class="submitButton" ng-click="post.recip=!post.recip">Angre</button> 
	    <input class="inputPsw" placeholder="passord" type="password" name="something" ng-model="psw" />
	  </form>
    </div>-->





