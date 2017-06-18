<?php
session_start();
$userid=$_SESSION['userid'];
include ('mysqli_connect.php');


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>图书馆 || 增加读者</title>
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
                <li  class="active"  class="dropdown">
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
<h1 style="text-align: center"><strong>增加读者</strong></h1>
<div style="padding: 10px 500px 10px;">
    <form  action="admin_reader_add.php" method="POST" style="text-align: center" class="bs-example bs-example-form" role="form">
        <div id="login">
            <div class="input-group"><span class="input-group-addon">读者证号</span><input name="nid" type="text" placeholder="请输入读者证号" class="form-control"></div><br/>
            <div class="input-group"><span class="input-group-addon">读者姓名</span><input name="nname" type="text" placeholder="请输入读者姓名" class="form-control"></div><br/>
            <div class="input-group"><span class="input-group-addon">性别</span><input name="nsex" type="text" placeholder="请输入读者性别" class="form-control"></div><br/>
            <div class="input-group"><span class="input-group-addon">读者生日</span><input name="nbirth" type="text" placeholder="请输入读者生日" class="form-control"></div><br/>
            <div class="input-group"><span class="input-group-addon">读者地址</span><input name="naddress" type="text" placeholder="请输入读者地址" class="form-control"></div><br/>
            <div class="input-group"><span class="input-group-addon">读者电话</span><input name="ntel" type="text" placeholder="请输入读者电话" class="form-control"></div><br/>
            <input type="submit" value="添加" class="btn btn-default">
            <input type="reset" value="重置" class="btn btn-default">
        </div>
    </form>
</div>
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $nnid = $_POST["nid"];
    $nnam= $_POST["nname"];
    $nsex = $_POST["nsex"];
    $nbir= $_POST["nbirth"];
    $nadd= $_POST["naddress"];
    $nnte = $_POST["ntel"];


    $sqla="insert into reader_info VALUES ($nnid ,'{$nnam}','{$nsex}','{$nbir}','{$nadd}','{$nnte}')";
    $sqlb="insert into reader_card (reader_id,name) VALUES($nnid ,'{$nnam}');";
    $resa=mysqli_query($dbc,$sqla);
    $resb=mysqli_query($dbc,$sqlb);


    if($resa==1&&$resb==1)
    {

        echo "<script>alert('读者添加成功！初始密码为111111')</script>";
        echo "<script>window.location.href='admin_reader.php'</script>";

    }
    else
    {
        echo "<script>alert('添加失败！请重新输入！');</script>";

    }

}


?>
</body>
</html>
