<?php
require 'includes/conn.php';

/* escape $_GET variable */
$sender = $mysqli->real_escape_string($_GET['sender']);
$receiver = $mysqli->real_escape_string($_GET['receiver']);

$query = "SELECT * FROM activityinfo WHERE sender='$sender' and receiver='$receiver'";
if (!$result = $mysqli->query($query)) {
    printf("Error: %s\n", $mysqli->error);
}

/* print result table*/
echo "<table border='1' width='800' cellspacing='0' align='center'>";
echo "<caption>查询结果表</caption>";
echo "<th>id</th>";
echo "<th>随礼人</th>";
echo "<th>接收人</th>";
echo "<th>随礼日期</th>";
echo "<th>随礼地点</th>";
echo "<th>随礼金额</th>";
echo "<th>描述</th>";
while($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $row['id'] . "</td>";
    echo "<td>" . $row['sender'] . "</td>";
    echo "<td>" . $row['receiver'] . "</td>";
    echo "<td>" . $row['time'] . "</td>";
    echo "<td>" . $row['location'] . "</td>";
    echo "<td>" . $row['moneyQuantity'] . "</td>";
    echo "<td>" . $row['description'] . "</td>";
    echo "</tr>";
}
echo "</table>";
$mysqli->close();
?>
