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

$_POST = json_decode(file_get_contents('php://input'), true);
// checking for blank values.
if (empty($_POST['myPassword']))
  $errors['myPassword'] = 'Password is required.';
if (empty($_POST['myEmail']))
  $errors['myEmail'] = 'Email is required.';
if (!empty($errors)) {
  $data['errors']  = $errors;
    } else {
  $data['message'] = 'Form data is going well';
// response back.
        $user = $_POST['myEmail'];
        $pass = $_POST['myPassword'];
        mysql_connect("localhost", "root", "") or die(mysql_error()); 
        mysql_select_db("friendsPlan") or die(mysql_error()); 
        mysql_query("INSERT INTO members (user,pass) VALUES ('$user','$pass');"); 
        echo "Your information has been successfully added to the database."; 
        $_SESSION['user'] = $user;
    }
    echo json_encode($data);
    
?> 


