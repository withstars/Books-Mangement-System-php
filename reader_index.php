<?php
session_start();
$userid=$_SESSION['userid'];
include ('mysqli_connect.php');

$sql="select name from reader_card where reader_id={$userid}";
$res=mysqli_query($dbc,$sql);
$result=mysqli_fetch_array($res);
date_default_timezone_set("PRC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>我的图书馆</title>
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
        #gonggao{
            position: absolute;
            left: 40%;
            top: 50%;
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
                <li class="active"><a href="reader_index.php">主页</a></li>
                <li><a href="reader_querybook.php">图书查询</a></li>
                <li><a href="reader_borrow.php">我的借阅</a></li>
                <li><a href="reader_info.php">个人信息</a></li>
                <li><a href="reader_repass.php">密码修改</a></li>
                <li><a href="reader_guashi.php">证件挂失</a></li>
                <li><a href="index.php">退出</a></li>
            </ul>
        </div>
    </div>
</nav>
<br/><br/><h3 style="text-align: center"><?php echo $result['name'];  ?>同学，您好</h3><br/>
<h4 style="text-align: center"><?php
    $sqla="select count(*) a from lend_list where reader_id={$userid} and back_date is NULL;";

    $resa=mysqli_query($dbc,$sqla);
    $resulta=mysqli_fetch_array($resa);
    echo "您目前共借阅{$resulta['a']}本书。";
    ?>
</h4>
<h4 style="text-align: center">
    <?php
    $sqlb="select DATE_ADD(lend_date,INTERVAL 1 MONTH) AS yhrq from lend_list where reader_id={$userid} and back_date is NULL;";
    $counta=0;
    $resb=mysqli_query($dbc,$sqlb);

    foreach ($resb as $row){
        if(strtotime(date("y-m-d"))>strtotime($row['yhrq'])) $counta++;
    };

    if($counta==0) echo "您当前没有超期且未归还的书。";
    else echo "有{$counta}本书已超期，请您及时归还";


    ?>
</h4>
<div id="gonggao">
    <a href="a.html" style="font-style: italic;color: white;text-decoration:replace-underline">馆内资讯：扬中华之美德 行传统毕业礼</a><br>
    <a href="a.html" style="font-style: italic;color: white">通知公告：读者借阅规则</a><br>
    <a href="a.html" style="font-style: italic;color: white">书单推荐：《朗读者》第一期、第二期最全书单：你读过几本？</a><br>
    <a href="a.html" style="font-style: italic;color: white">书单推荐：5年内经得起时间考验的经典好书榜</a><br>
    <a href="a.html" style="font-style: italic;color: white">书单推荐：第十一届文津图书奖获奖图书</a><br>

</div>

</body>
</html>
