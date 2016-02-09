
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
    echo "Welcome, $user</a></li>"  .     
         "<li class='col-md-2'><a href='logout.php'>Logout</a></li>".
         "<li class='col-md-2'><a href=''>Home</a></li>" .       
         "<li class='col-md-2'><a href=''>Messages";
  }
    else {
        echo "Sign up</a></li>"            .
          "<li class='col-md-5'><a href=''>Log in";
    }
?>
