<?php
session_start();
$userid=$_SESSION['userid'];
include ('mysqli_connect.php');

$bookid=$_GET['id'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>图书馆 || 借出图书</title>
    <link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>

    </style>

</head>
<body>
<div style="padding: 180px 550px 10px;text-align: center">
<form  action="admin_book_jiechu.php?tsid=<?php echo $bookid; ?>" method="POST" class="bs-example bs-example-form" role="form">
    <div id="login">
        <div class="input-group"><span class="input-group-addon">借阅人</span><input  name="borrower" type="text" placeholder="请输入借阅人读者证号" class="form-control"></div><br><br>
        <input type="submit" value="借阅" class="btn btn-default">
    </div>
</form>
</div>
</body>
</html>
<?php

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $jctsid=$_GET['tsid'];
        $reid=$_POST['borrower'];
        $sqlc="select card_state from reader_card where reader_id={$reid}";
        $resc=mysqli_query($dbc,$sqlc);
        $resultc=mysqli_fetch_array($resc);
        if($resultc['card_state']==1){

            $sqla="insert into lend_list(book_id,reader_id,lend_date) values ({$jctsid},{$reid},NOW());";
            $sqlb="UPDATE book_info set state=0 where book_id={$jctsid};";
            $resa=mysqli_query($dbc,$sqla);
            $resb=mysqli_query($dbc,$sqlb);
            if($resa==1 && $resb==1)
                echo"<script>alert('借阅成功！');window.location.href='admin_book.php'; </script>";
            else echo"<script>alert('借阅失败！');window.location.href='admin_book.php'; </script>";
        }
       else echo"<script>alert('该读者证已挂失，无法借阅！');window.location.href='admin_book.php'; </script>";

    };

?>