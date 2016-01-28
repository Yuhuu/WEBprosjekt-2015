
<?php
    $connection = new mysqli("localhost", "root", null, "friendsPlan");
    if ($connection->connect_errno){
       die('failed to connect ['.$connection->connect_error.']');
    }
    
    function createTable($name, $query){
       queryMysql("create table if not exists $name($query)");
       echo "Table '$name' created already.<br>";
    }
    
    function queryMysql($query){
       global $connection;
       $result = mysqli_query($connection, $query);
       if(!$result) die('failed to connect ['.$connection->connect_error.']');
       return $result;
    }
    function destroySession() {
        $_SESSION=array();
        
        // -259200 or not
        if(session_id() != "" || isset($_COOKIE[session_name()]))
            setcookie(session_name(),'',time()-259200, '/'); // 86400 is one day
}
    
    // avoid SQL injection
    function sanitizeString($var){
        global $connection;
        $var = strip_tags($var);
        $var = htmlentities($var);
        $var = stripslashes($var);
        return mysqli_real_escape_string($connection, $var);
  }

  // can upload picture for aktivities
  function showProfile($user)
  {
    if (file_exists("$user.jpg"))
      echo "<img src='images/$user.jpg' style='float:left;'>";

    $result = queryMysql("SELECT * FROM profiles WHERE user='$user'");

    if ($result->num_rows)
    {
      $row = $result->fetch_array(MYSQLI_ASSOC);
      echo stripslashes($row['text']) . "<br style='clear:left;'>";
    }
  }
  
  
    //$db->close();
?> 





