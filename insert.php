<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.echo
 */
require_once 'functions.php';
session_start();
$errors = array();
$data = array();

// put all the value from the input value, here we can see the value of key['myEmail']
$_POST = json_decode(file_get_contents('php://input'), true);
// checking for blank values.
if (empty($_POST['myPassword']))
  $errors['myPassword'] = 'Password is required.';
if (empty($_POST['myEmail']))
  $errors['myEmail'] = 'Email is required.';
if (!empty($errors)) {
    // put the errors array in data array
  $data['errors']  = $errors;
    } else {
  $data['message'] = 'Form data is going well';
// response back. and put the value out of json_decoded array
        $userEmail = $_POST['myEmail'];
        $pass = $_POST['myPassword'];
        mysql_connect("localhost", "root", "") or die(mysql_error()); 
        mysql_select_db("friendsPlan") or die(mysql_error()); 
        mysql_query("INSERT INTO members (user,pass) VALUES ('$userEmail','$pass');"); 
        echo "<p>Your information has been successfully added to the database.<p>"; 
        
        $_SESSION['user'] = $userEmail;
    }
    // put this in json fomat again
    echo json_encode($data);
?> 


