
<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function checkUser(){
session_start();
global $user;
//$destroySession = destroySession();
$userstr = "Guest";
//$_SESSION["user"] = "Yuanxin";
if (isset($_SESSION['user']))
  {
    $user     = $_SESSION['user'];
    $userstr  = "$user";
    return TRUE;
  }
  else return FALSE;
}

if(checkUser())
  {
    global $user;
    echo "Welcome, $user !</a></li>"  .     
         "<li><a href='logout.php'>Log out</a></li>";
    echo "<li><a href='members.php?view=$user'>Home</a></li>" .       
         "<li><a href='messages.php'>Messages";
  }
    else {
        echo "Sign up</a></li>"            .
          "<li><a href=''>Log in";
    }
?>
