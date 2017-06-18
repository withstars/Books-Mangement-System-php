<?php
session_start();
$userid=$_SESSION['userid'];
include ('mysqli_connect.php');
$xgid=$_GET['id'];

$sqlb="select name,author,publish,ISBN,introduction,language,price,pubdate,class_id,pressmark,
state from book_info where book_id={$xgid}";
$resb=mysqli_query($dbc,$sqlb);
$resultb=mysqli_fetch_array($resb);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>图书馆 || 书籍信息修改</title>
</head>
<body>
<h1 style="text-align: center"><strong>图书信息修改</strong></h1>
<div style="padding: 10px 500px 10px;">
    <form  action="admin_book_edit.php?id=<?php echo $xgid; ?>"" method="POST" style="text-align: center" class="bs-example bs-example-form" role="form">
    <div id="login">
        <div class="input-group"><span  class="input-group-addon">图书名</span><input value="<?php echo $resultb['name']; ?>" name="nname" type="text" placeholder="请输入修改的图书名" class="form-control"></div><br/>
        <div class="input-group"><span  class="input-group-addon">作者</span><input value="<?php echo $resultb['author']; ?>" name="nauthor" type="text" placeholder="请输入修改的作者" class="form-control"></div><br/>
        <div class="input-group"><span  class="input-group-addon">出版社</span><input value="<?php echo $resultb['publish']; ?>"  name="npublish" type="text" placeholder="请输入修改的出版社" class="form-control"></div><br/>
        <div class="input-group"><span  class="input-group-addon">ISBN</span><input value="<?php echo $resultb['ISBN']; ?>" name="nISBN" type="text" placeholder="请输入修改的ISBN" class="form-control"></div><br/>
        <div class="input-group"><span  class="input-group-addon">简介</span><input  value="<?php echo $resultb['introduction']; ?>" name="nintroduction" type="text" placeholder="请输入新的简介" class="form-control"></div><br/>
        <div class="input-group"><span  class="input-group-addon">语言</span><input value="<?php echo $resultb['language']; ?>" name="nlanguage" type="text" placeholder="请输入修改的语言" class="form-control"></div><br/>
        <div class="input-group"><span class="input-group-addon">价格</span><input value="<?php echo $resultb['price']; ?>" name="nprice" type="text" placeholder="请输入修改的价格" class="form-control"></div><br/>
        <div class="input-group"><span  class="input-group-addon">出版日期</span><input value="<?php echo $resultb['pubdate']; ?>" name="npubdate" type="text" placeholder="请输入修改的出版日期" class="form-control"></div><br/>
        <div class="input-group"><span class="input-group-addon">分类号</span><input  value="<?php echo $resultb['class_id']; ?>" name="nclass_id" type="text" placeholder="请输入修改的分类号" class="form-control"></div><br/>
        <div class="input-group"><span  class="input-group-addon">书架号</span><input value="<?php echo $resultb['pressmark']; ?>" name="npressmark" type="text" placeholder="请输入修改的书架号" class="form-control"></div><br/>
        <div class="input-group"><span class="input-group-addon">图书状态</span><input value="<?php echo $resultb['state']; ?>" name="nstate" type="text" placeholder="请输入修改的图书状态" class="form-control"></div><br/>
        <label><input type="submit" value="确认" class="btn btn-default"></label>
        <label><input type="reset" value="重置" class="btn btn-default"></label>
    </div>
    </form>
</div>
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST")
{

    $boid=$_GET['id'];
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



    $sqla="update book_info set name='{$nnam}',author='{$naut}',publish='{$npubl}',
ISBN='{$nisb}',introduction='{$nint}',language='{$nlan}',price='{$npri}',pubdate='{$npubd}',
class_id={$ncla},pressmark={$npre},state={$nsta} where book_id=$boid;";
    $resa=mysqli_query($dbc,$sqla);


    if($resa==1)
    {

        echo "<script>alert('修改成功！')</script>";
        echo "<script>window.location.href='admin_book.php'</script>";

    }
    else
    {
        echo "<script>alert('修改失败！请重新输入！');</script>";

    }

}


?>
</body>
</html>
