
<!DOCTYPE html>
<html>
  <head>
    <title>Setting up database</title>
  </head>
  <body>

    <h3>Setting up...</h3>

<?php // Example 26-3: setup.php
  require_once 'DbHandler.php';

  createTable('members',
              'user VARCHAR(16),
              pass VARCHAR(16),
              INDEX(user)');

  createTable('evens', 
              'id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
              auth VARCHAR(16),
              recip VARCHAR(16),
              time INT UNSIGNED,
              description VARCHAR(4096),
              INDEX(auth(6)),
              INDEX(recip(6))');

  createTable('friends',
              'user VARCHAR(16),
              friend VARCHAR(16),
              INDEX(user(6)),
              INDEX(friend(6))');

  createTable('profiles',
              'user VARCHAR(16),
               text VARCHAR(4096),
               aboutme VARCHAR(4096),
               INDEX(user(6))');
?>

    <br>...done.
  </body>
</html>

<?php

/* 
 * Copyright(C) 2016.  All rights reserved to Bjørnholt school. 
 * https://bjornholt.osloskolen.no/
 * @author Created by Bachelor Final Project group 18 at Oslo and Akershus University College 
 * Creating interactive web pages using the Angualr framework carried out by:
 * Martin Hansen Muren Mathisen (s189116), Waqas Liaqat (s180364), 
 * Yuanxin Huang (s184519), Thanh Nguyen Chu (s169954)
 * @version 1.01.01
 */

echo '<h3>Setting up...</h3>';

//  setup.php for ;
  
class set_up {
    
private $conn;
function __construct() {
        include_once 'db_connect.php';
        // opening db connection
        $db = new db_connect();
        $this->conn = $db->connect();
    }
    // create new table
    
  function createTable($name,$query){
      
       $db = new db_connect();
       $this->conn = $db->connect();
       $result = mysqli_query($this->conn, "create table if not exists $name($query);");
       if(!$result) die('failed to connect database ['.$this->conn->connect_error.']');
       echo "Table ".$name." created already.<br>";
    }
    
}
   $dbhd = new set_up();
   $dbhd->createTable('members',
              "user VARCHAR(16),
              pass VARCHAR(16),
              INDEX (user)");
   $dbhd = new set_up();
   $dbhd->createTable('members123123',
              "user VARCHAR(16),
              pass VARCHAR(16),
              INDEX (user)");
   $dbhd = new set_up();
   $dbhd->createTable('members3',
              "user VARCHAR(16),
              pass VARCHAR(16),
              INDEX (user)");
  
  echo '<br>Bra jobbe!...done.';
?>

    




