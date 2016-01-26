
<?php
    $connection = new mysqli("localhost", "root", null, "s184519");
    if ($connection->connect_errno){
       die('failed to connect ['.$connection->connect_error.']');
    }
    
    function createTable($name, $query){
       queryMysql("create table if not exists $name($query)");
       echo "Table '$name' created already.<br>";
    }
    
    function queryMysql($query){
       global $connection;
       $result = $connection->query($query);
       if(!$result) die('failed to connect ['.$connection->connect_error.']');
       return $result;
    }
    
    // avoid SQL injection
    function sanitizeString($var){
        global $connection;
        $var = strip_tags($var);
        $var = htmlentities($var);
        $var = stripslashes($var);
        return $connection->real_escape_string($var);
  }

  function showProfile($user)
  {
    if (file_exists("$user.jpg"))
      echo "<img src='$user.jpg' style='float:left;'>";

    $result = queryMysql("SELECT * FROM profiles WHERE user='$user'");

    if ($result->num_rows)
    {
      $row = $result->fetch_array(MYSQLI_ASSOC);
      echo stripslashes($row['text']) . "<br style='clear:left;'><br>";
    }
  }
    //$db->close();
?> 





