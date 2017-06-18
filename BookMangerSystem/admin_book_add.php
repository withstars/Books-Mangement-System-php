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
    <title>图书馆 || 增加图书</title>
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
<h1 style="text-align: center"><strong>增加图书</strong></h1>
<div style="padding: 10px 500px 10px;">
    <form  action="admin_book_add.php" method="POST" style="text-align: center" class="bs-example bs-example-form" role="form">
        <div id="login">
            <div class="input-group"><span class="input-group-addon">图书名</span><input name="nname" type="text" placeholder="请输入图书名" class="form-control"></div><br/>
            <div class="input-group"><span class="input-group-addon">作者</span><input name="nauthor" type="text" placeholder="请输入作者" class="form-control"></div><br/>
            <div class="input-group"><span class="input-group-addon">出版社</span><input name="npublish" type="text" placeholder="请输入出版社" class="form-control"></div><br/>
            <div class="input-group"><span class="input-group-addon">ISBN</span><input name="nISBN" type="text" placeholder="请输入ISBN" class="form-control"></div><br/>
            <div class="input-group"><span class="input-group-addon">简介</span><input name="nintroduction" type="text" placeholder="请输入简介" class="form-control"></div><br/>
            <div class="input-group"><span class="input-group-addon">语言</span><input name="nlanguage" type="text" placeholder="请输入语言" class="form-control"></div><br/>
            <div class="input-group"><span class="input-group-addon">价格</span><input name="nprice" type="text" placeholder="请输入价格" class="form-control"></div><br/>
            <div class="input-group"><span class="input-group-addon">出版日期</span><input name="npubdate" type="text" placeholder="请输入出版日期" class="form-control"></div><br/>
            <div class="input-group"><span class="input-group-addon">分类号</span><input name="nclass_id" type="text" placeholder="请输入分类号" class="form-control"></div><br/>
            <div class="input-group"><span class="input-group-addon">书架号</span><input name="npressmark" type="text" placeholder="请输入书架号" class="form-control"></div><br/>
            <div class="input-group"><span class="input-group-addon">图书状态</span><input name="nstate" type="text" placeholder="请输入图书状态" class="form-control"></div><br/>
            <label><input type="submit" value="添加" class="btn btn-default"></label>
            <label><input type="reset" value="重置" class="btn btn-default"></label>
        </div>
    </form>
</div>
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $nnam = $_POST["nname"];
    $naut = $_POST["nauthor"];
    $npubl = $_POST["npublish"];
    $nisb = $_POST["nISBN"];
    $nint = $_POST["nintroduction"];
    $nlan = $_POST["nlanguage"];
    $npri = $_POST["nprice"];
    $npubd = $_POST["npubdate"];
    $ncla = $_POST["nclass_id"];
    $npre = $_POST["npressmark"];
    $nsta= $_POST["nstate"];



    $sqla="insert into book_info VALUES (NULL ,'{$nnam}','{$naut}','{$npubl}','{$nisb}','{$nint}','{$nlan}','{$npri}','{$npubd}',{$ncla},{$npre},{$nsta} )";
    $resa=mysqli_query($dbc,$sqla);


    if($resa==1)
    {

        echo "<script>alert('添加成功！')</script>";
        echo "<script>window.location.href='admin_book.php'</script>";

    }
    else
    {
        echo "<script>alert('添加失败！请重新输入！');</script>";

    }

}

?>
</body>
</html>
