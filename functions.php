
<?php
		$connection = new mysqli("localhost","root",null,"s184519");
		if($connection->connect_errno)
		{
			die('failed to connect [' . $db->connect_error . ']');
		}

		
		$db->close();

?> 





