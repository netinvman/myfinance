<?php
header("Content-Type:text/html; charset=utf8");
require 'includes/conn.php';

$sender = $mysqli->real_escape_string($_POST['sender']);
$receiver = $mysqli->real_escape_string($_POST['receiver']);
$time = $mysqli->real_escape_string($_POST['time']);
$location = $mysqli->real_escape_string($_POST['location']);
$moneyamount = $mysqli->real_escape_string($_POST['moneyamount']);
$description = $mysqli->real_escape_string($_POST['description']);

$sql = "INSERT INTO activityinfo(sender,receiver,time,location,moneyamount,description) VALUES('$sender','$receiver','$time','$location','$moneyamount','$description')";

if (!$mysqli->query($sql)) {
    printf("Error: %s\n", $mysqli->error);
    exit();
}

echo "<script>alert('添加成功！')</script>";
echo "<script>location='index.html'</script>";

$mysqli->close();
?>
