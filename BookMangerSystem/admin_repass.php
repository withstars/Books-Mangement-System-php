<?php
session_start();
include ('mysqli_connect.php');
$userid=$_SESSION['userid'];
$sql="select name from reader_card where reader_id={$userid}";
$res=mysqli_query($dbc,$sql);
$result=mysqli_fetch_array($res);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>图书馆 || 管理员密码修改</title>
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
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">读者管理<b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="admin_reader.php">全部读者</a></li>
                        <li><a href="admin_book_add.php">增加读者</a></li>
                    </ul>
                </li>
                <li><a href="admin_borrow_info.php">借还管理</a></li>
                <li class="active"><a href="admin_repass.php" >密码修改</a></li>
                <li><a href="index.php">退出</a></li>
            </ul>
        </div>
    </div>
</nav>


<h3 style="text-align: center"><?php echo $userid;  ?>号管理员，您好</h3><br/>
<h4 style="text-align: center">修改您的密码：</h4><br/><br/><br/><br/><br/>
<form action="admin_repass.php" method="post"  style="text-align: center">
    <label><input type="password" name="pass1" placeholder="请输入新的密码" class="form-control"></label><br/><br/><br/>
    <label><input type="password" name="pass2" placeholder="确认新的密码" class="form-control"></label><br/><br/>
    <input type="submit" value="提交" class="btn btn-default">
    <input type="reset" value="重置"  class="btn btn-default">
</form>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $passa = $_POST["pass1"];
    $passb = $_POST["pass2"];
    if($passa==$passb){
        $sql="update admin set password='{$passa}' where admin_id={$userid}";
        $res=mysqli_query($dbc,$sql);
        if($res==1)
        {
            echo "<script>alert('密码修改成功！请重新登陆！')</script>";
            echo "<script>window.location.href='index.php'</script>";
        }

    }
    else{
        echo "<script>alert('两次输入密码不同，请重新输入！')</script>";

    }

}


?>
</body>
</html>