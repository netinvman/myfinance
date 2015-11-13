<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>随礼记录管理程序</title>
    </head>
    <body>
    <table border='0' cellspacing='0' align='center'>
        <caption><h2>记录列表|<a href='addinfo.html'>添加记录</a></h2></caption>
        <form action='' method='get'>
            <tr>
            <td>随礼人:<input type='text' name='sender'></td>
            <td>接收人:<input type='text' name='receiver'></td>
            <td><input type='submit' value='查询'> </td>
            </tr>
        </form>
    </table>
    <?php
    require 'includes/conn.php';

    $sender = empty($_GET['sender'])?'':$mysqli->real_escape_string($_GET['sender']);
    $receiver = empty($_GET['sender'])?'':$mysqli->real_escape_string($_GET['receiver']);

    $page = empty($_GET['page'])?1:abs($_GET['page']);
    $limitnum = 10;
    $offset = ($page - 1) * $limitnum;
    $totalrst = $mysqli->query("SELECT COUNT(*) FROM activityinfo");
    $totalarray = $totalrst->fetch_row();
    $totalpage = ceil($totalarray[0] / $limitnum);
    $prevpage = $page - 1;
    $nextpage = $page + 1;
    if ($nextpage > $totalpage) {
        $nextpage = $totalpage;
    }
    $query = "SELECT * FROM activityinfo WHERE sender LIKE '%{$sender}%' AND receiver LIKE '%{$receiver}%' ORDER BY id LIMIT $offset, $limitnum";
    if (!$result = $mysqli->query($query)) {
        printf("Error: %s\n", $mysqli->error);
    }

    /* print result table */
    echo "<table border='1' width='800' cellspacing='0' align='center'>";
    echo "<th>ID</th>";
    echo "<th>随礼人</th>";
    echo "<th>接收人</th>";
    echo "<th>随礼日期</th>";
    echo "<th>随礼地点</th>";
    echo "<th>随礼金额</th>";
    echo "<th>描述</th>";
    echo "<th>操作</th>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['sender'] . "</td>";
        echo "<td>" . $row['receiver'] . "</td>";
        echo "<td>" . $row['time'] . "</td>";
        echo "<td>" . $row['location'] . "</td>";
        echo "<td>" . $row['moneyamount'] . "</td>";
        echo "<td>" . "<a href='showdetail.php?id={$row['id']}'>" . substr($row['description'], 0, 60) . "</a>" . "</td>";
        echo "<td>" . "<a href='edit.php?id={$row['id']}'>修改</a>" . "|" . "<a href='del.php?id={$row['id']}'>删除</a>" . "</td>";
        echo "</td>";
    }
    echo "<tr>";
    echo "<td colspan='8'>" . "<a href='index.php?page={$prevpage}'>上一页</a>" . "|" . "<a href='index.php?page={$nextpage}'>下一页</a>" . "</td>";
    echo "</tr>";
    echo "</table>";

    $totalrst->free_result();
    $result->free_result();
    $mysqli->close();
    ?>
    </body>
</html>
