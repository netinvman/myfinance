<?php
require 'includes/conn.php';

$id = $_POST['id'];
$sender = $_POST['sender'];
$receiver = $_POST['receiver'];
$time = $_POST['time'];
$location = $_POST['location'];
$moneyamount = $_POST['moneyamount'];
$description = $_POST['description'];
$sql = "UPDATE activityinfo SET sender='$sender',receiver='$receiver',time='$time',location='$location',moneyamount='$moneyamount',description='$description' WHERE id={$id}";
if (!$mysqli->query($sql)) {
    printf("Error: %s\n", $mysqli->error);
    exit();
}
echo "<script>alert('修改成功!')</script>";
echo "<script>location='index.php'</script>";

$mysqli->close();
?>
