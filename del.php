<?php
header("Content-Type:text/html; charset=utf8");
require 'includes/conn.php';

$id = $mysqli->real_escape_string($_GET['id']);
$sql = "DELETE FROM activityinfo WHERE id = {$id}";
if (!$mysqli->query($sql)) {
    printf("Error: $s\n", $mysqli->error);
    exit();
}

echo "<script>alert('删除成功!')</script>";
echo "<script>location='index.php'</script>";
?>
