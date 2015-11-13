<?php
require 'includes/conn.php';
$id = $mysqli->real_escape_string($_GET['id']);
$sql = "SELECT sender,receiver,time,location,moneyamount,description FROM activityinfo WHERE id = $id";
if (!$result= $mysqli->query($sql)) {
    printf("Error: %s\n", $mysqli->error);
    exit();
}
$row = $result->fetch_assoc();
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>修改记录</title>
    </head>
    <body>
    <table border='0' cellspacing='0' align='center'>
        <caption><h2>修改记录</h2></caption>
        <form action='update.php' method='post'>
            <tr>
            <td>随礼人:<input type='text' name='sender' value='<?php echo $row['sender'] ?>'>
            <input type='hidden' name='id' value='<?php echo $id ?>'></td>
            </tr>
            <tr>
            <td>接收人:<input type='text' name='receiver' value='<?php echo $row['receiver'] ?>'></td>
            </tr>
            <tr>
            <td>时间:<input type='text' name='time' value='<?php echo $row['time'] ?>'></td> 
            </tr>
            <tr>
            <td>地点:<input type='text' name='location' value='<?php echo $row['location'] ?>'></td>
            </tr>
            <tr>
            <td>金额:<input type='text' name='moneyamount' value='<?php echo $row['moneyamount'] ?>'></td>
            </tr>
            <tr>
            <td>描述:<textarea name='description' rows='6' cols='21'><?php echo $row['description'] ?></textarea></td>
            </tr>
            <tr>
            <td><input type='submit' value='添加'> <input type='reset' value='重置'></td>
            </tr>
        </form>
    </table>
    </body>
</html>
