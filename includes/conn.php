<?php
/*
 * database connection
 * version: 0.1
 * date: 2015/11/11
 */

 $mysqli= @new mysqli('localhost', 'myfinance', 'myfinance', 'myfinance');
 if (mysqli_connect_errno()) {
     printf("Connect failed: %s\n", mysqli_connect_error());
     exit();
 }

?>
