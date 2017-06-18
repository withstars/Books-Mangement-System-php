<?php
session_start();
$userid=$_SESSION['userid'];
include ('mysqli_connect.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>图书馆 || 书籍管理</title>
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
                <li class="active" class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">书籍管理<b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="admin_book.php">全部书籍</a></li>
                        <li><a href="admin_book_add.php">增加图书</a></li>

                    </ul>
                </li>
                <li class="dropdown">
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
<h1 style="text-align: center"><strong>全部书籍</strong></h1>
<form  id="query" action="admin_book.php" method="POST">
    <div id="query">
        <label ><input  name="bookquery" type="text" placeholder="请输入图书名或图书号" class="form-control"></label>
        <input type="submit" value="查询" class="btn btn-default">
    </div>
</form>

<table  width='100%' class="table table-hover">
    <tr>
        <th>图书号</th>
        <th>图书名</th>
        <th>作者</th>
        <th>出版社</th>
        <th>ISBN</th>
        <th>简介</th>
        <th>语言</th>
        <th>价格</th>
        <th>出版日期</th>
        <th>分类号</th>
        <th>分类名</th>
        <th>书架号</th>
        <th>状态</th>
        <th>操作</th>
        <th>操作</th>
        <th>操作</th>
    </tr>
    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
    $gjc = $_POST["bookquery"];

        $sql="select book_id,name,author,publish,ISBN,introduction,language,price,pubdate,book_info.class_id,class_name,pressmark,state from book_info,class_info where book_info.class_id=class_info.class_id and ( name like '%{$gjc}%' or book_id like '%{$gjc}%')  ;";

    }
    else{
        $sql="select book_id,name,author,publish,ISBN,introduction,language,price,pubdate,book_info.class_id,class_name,pressmark,state from book_info,class_info where book_info.class_id=class_info.class_id ;";
    }


    $res=mysqli_query($dbc,$sql);
    foreach ($res as $row){
        echo "<tr>";
        echo "<td>{$row['book_id']}</td>";
        echo "<td>{$row['name']}</td>";
        echo "<td>{$row['author']}</td>";
        echo "<td>{$row['publish']}</td>";
        echo "<td>{$row['ISBN']}</td>";
        echo "<td>{$row['introduction']}</td>";
        echo "<td>{$row['language']}</td>";
        echo "<td>{$row['price']}</td>";
        echo "<td>{$row['pubdate']}</td>";
        echo "<td>{$row['class_id']}</td>";
        echo "<td>{$row['class_name']}</td>";
        echo "<td>{$row['pressmark']}</td>";
         if($row['state']==1) echo "<td>在馆</td>"; else if($row['state']==0) echo "<td>已借出</td>";else  echo "<td>无状态信息</td>";
        echo "<td><a href='admin_book_edit.php?id={$row['book_id']}'>修改</a></td>";
        echo "<td><a href='admin_book_del.php?id={$row['book_id']}'>删除</a></td>";
        if($row['state']==1)echo "<td><a href='admin_book_jiechu.php?id={$row['book_id']}'>借阅</a></td>";
        if($row['state']==0)echo "<td><a href='admin_book_guihuan.php?id={$row['book_id']}'>归还</a></td>";
        echo "</tr>";
    };
    ?>
</table>
</body>
</html>