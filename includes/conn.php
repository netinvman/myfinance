<?php
/*
 * database connection
 * version: 0.1
 * date: 2015/11/11
 */

 $msyqli = @new mysqli('localhost', 'myfinance', 'myfinance', 'myfinance');
 if ($mysqli->errno) {
     printf("Connection failed: " . $mysqli->connect_error);
     exit();
 }

?>
