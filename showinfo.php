<?php
header("Content-Type:text/html; charset=utf8");
require 'includes/conn.php';

/* escape $_GET variable */
$sender = $mysqli->real_escape_string($_GET['sender']);
$receiver = $mysqli->real_escape_string($_GET['receiver']);


$page = $_GET['page']?$_GET['page']:1;
$limitnum = 10;
$offset = ($page - 1) * $limitnum;
$totalrst = $mysqli->query("SELECT COUNT(*) FROM activityinfo");
$totalarr = $totalrst->fetch_row();
$totalpage = ceil($totalarr[0] / $limitnum);
$prevpage = $page -1;
$nextpage = $page + 1;
if ($nextpage > totalpage) {
    $nextpage = $totalpage;
}
$query = "SELECT * FROM activityinfo WHERE sender like '%{$sender}%' and receiver like '%{$receiver}%' order by id limit $offset, $limitnum";
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
echo "<th>操作</th>";
while($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $row['id'] . "</td>";
    echo "<td>" . $row['sender'] . "</td>";
    echo "<td>" . $row['receiver'] . "</td>";
    echo "<td>" . $row['time'] . "</td>";
    echo "<td>" . $row['location'] . "</td>";
    echo "<td>" . $row['moneyamount'] . "</td>";
    echo "<td>" . $row['description'] . "</td>";
    echo "<td>" . "<a href=''>修改</a>" . "|" . "<a href=''>删除</a>". "</td>";
    echo "</tr>";
}
echo "<tr>";
echo "<td>" . "<a href='page={$prevpage}'>上一页</a>" . "|" . "<a href='page={$nextpage}'>下一页</a>" . "</td>";
echo "</tr>";
echo "</table>";

$totalrst->free_result();
$result->free_result();
$mysqli->close();
?>
