<?php
header("Content-Type:text/html; charset=utf8");
require 'includes/conn.php';

$id = $mysqli->real_escape_string($_GET['id']);
$sql = "SELECT description FROM activityinfo WHERE id = $id";
if (!$result = $mysqli->query($sql)) {
    printf("Error: %s\n", $mysqli->error);
    exit();
}
$row = $result->fetch_row();
echo "$row[0]";

$result->free_result();
$mysqli->close();
?>
