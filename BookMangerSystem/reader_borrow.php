<?php
session_start();
$userid=$_SESSION['userid'];
include ('mysqli_connect.php');

$sql="select name from reader_card where reader_id={$userid}";
$res=mysqli_query($dbc,$sql);
$result=mysqli_fetch_array($res);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>我的图书馆 || 我的借阅</title>
    <link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
        body{
            width: 100%;
            overflow: hidden;
            background: url("300046-106.jpg") no-repeat;
            background-size:cover;
            color: antiquewhite;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-default navbar-static-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">我的图书馆</a>
        </div>
        <div>
            <ul class="nav navbar-nav">
                <li ><a href="reader_index.php">主页</a></li>
                <li><a href="reader_querybook.php">图书查询</a></li>
                <li class="active"><a href="reader_borrow.php">我的借阅</a></li>
                <li><a href="reader_info.php">个人信息</a></li>
                <li><a href="reader_repass.php">密码修改</a></li>
                <li><a href="reader_guashi.php">证件挂失</a></li>
                <li><a href="index.php">退出</a></li>
            </ul>
        </div>
    </div>
</nav>

<h3 style="text-align: center"><?php echo $result['name'];  ?>同学，您好</h3><br/>
<h4 style="text-align: center">您已借阅的书目如下：</h4>

<table  width='100%' class="table">
    <tr>
        <th>借阅流水号</th>
        <th>图书号</th>
        <th>图书名</th>
        <th>借阅日期</th>
        <th>归还日期</th>
    </tr>
    <?php



    $sqla="select sernum,book_info.book_id,book_info.name,lend_date,back_date from lend_list,book_info where reader_id={$userid} and lend_list.book_id=book_info.book_id;";

    $resa=mysqli_query($dbc,$sqla);
    foreach ($resa as $row){
        echo "<tr>";
        echo "<td>{$row['sernum']}</td>";
        echo "<td>{$row['book_id']}</td>";
        echo "<td>{$row['name']}</td>";
        echo "<td>{$row['lend_date']}</td>";
        echo "<td>{$row['back_date']}</td>";
        echo "</tr>";
    };
    ?>
</table>
</body>
</html>