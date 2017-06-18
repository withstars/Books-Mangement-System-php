<?php
session_start();
$userid=$_SESSION['userid'];
include ('mysqli_connect.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>图书馆 || 读者管理</title>
    <link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
        body{
            width: 100%;
            height:auto;

        }
        #query{
            text-align: center;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-default navbar-static-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">图书馆管理系统</a>
        </div>
        <div>
            <ul class="nav navbar-nav">
                <li ><a href="admin_index.php">主页</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">书籍管理<b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="admin_book.php">全部书籍</a></li>
                        <li><a href="admin_book_add.php">增加图书</a></li>
                    </ul>
                </li>
                <li class="active" class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">读者管理<b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="admin_reader.php">全部读者</a></li>
                        <li><a href="admin_reader_add.php">增加读者</a></li>
                    </ul>
                </li>
                <li><a href="admin_borrow_info.php">借还管理</a></li>
                <li><a href="admin_repass.php">密码修改</a></li>
                <li><a href="index.php">退出</a></li>
            </ul>
        </div>
    </div>
</nav>
<h1 style="text-align: center"><strong>全部读者</strong></h1>
<form  id="query" action="admin_reader.php" method="POST">
    <div id="query">
        <label ><input  name="readerquery" type="text" placeholder="请输入读者姓名或读者证号" class="form-control"></label>
        <input type="submit" value="查询" class="btn btn-default">
    </div>
</form>
<table  width='100%' class="table table-hover">
    <tr>
        <th>读者证号</th>
        <th>姓名</th>
        <th>性别</th>
        <th>生日</th>
        <th>居住地</th>
        <th>电话</th>
        <th>读者状态</th>
        <th>操作</th>
        <th>操作</th>
    </tr>
    <?php



    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $gjc = $_POST["readerquery"];

        $sql="select reader_info.reader_id, reader_info.name,sex,birth,address,telcode,card_state from reader_info,reader_card where reader_info.reader_id=reader_card.reader_id and (name like '%{$gjc}%' or reader_id like '%{$gjc}%') ;";

    }
    else{
        $sql="select reader_info.reader_id, reader_info.name, sex, birth, address, telcode, card_state
from reader_info, reader_card where reader_info.reader_id = reader_card.reader_id";
    }


    $res=mysqli_query($dbc,$sql);
    foreach ($res as $row){
        echo "<tr>";
        echo "<td>{$row['reader_id']}</td>";
        echo "<td>{$row['name']}</td>";
        echo "<td>{$row['sex']}</td>";
        echo "<td>{$row['birth']}</td>";
        echo "<td>{$row['address']}</td>";
        echo "<td>{$row['telcode']}</td>";
        if($row['card_state']==1) echo "<td>正常</td>"; else echo "<td>挂失</td>";
        echo "<td><a href='admin_reader_edit.php?id={$row['reader_id']}'>修改</a></td>";
        echo "<td><a href='admin_reader_del.php?id={$row['reader_id']}'>删除</a></td>";
        echo "</tr>";
    };
    ?>
</table>
</body>
</html>