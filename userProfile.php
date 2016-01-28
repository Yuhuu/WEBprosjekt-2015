<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
$destroySession = destroySession();
$userstr = "Guest";
$_SESSION["user"] = "Yuanxin";
if (isset($_SESSION['user']))
  {
    $user     = $_SESSION['user'];
    $loggedin = TRUE;
    $userstr  = "$user";
  }
  else $loggedin = FALSE;
  
if ($loggedin)
  {
    echo "Welcome, $user !</a></li>"  .     
         "<li><a href='logout.php'>Log out</a></li>";
    echo "<li><a href='members.php?view=$user'>Home</a></li>" .       
         "<li><a href='messages.php'>Messages";
  }
    else {
        echo "Sign up</a></li>"            .
          "<li><a href='login.php'>Log in";
       }
?>
