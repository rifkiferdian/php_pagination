<?php
//define database connection
define("DATABASE_HOST", "localhost"); //database host
define("DATABASE_NAME", "onest817_jogjasite15"); //nama database
define("DATABASE_USER", "root"); //user database 
define("DATABASE_PASSWORD", "12"); // password 
//connect it!
mysql_connect(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD) or die("<p>Connection Filed! chek your connection:<br />" .mysql_error(). "</p>");
	//echo "<p>Koneksi server suskes!</p>";  // uncomment for displaying success connection test message.
mysql_select_db(DATABASE_NAME) or die ("Database <strong>".DATABASE_NAME."</strong> Can not Open! <big><strong>".DATABASE_NAME."</strong></big>");
?>