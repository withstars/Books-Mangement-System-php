<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
</head>
<body>

</body>
</html>
<?php
include ('mysqli_connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $acco = $_POST["account"];
    $pw = $_POST["pass"];
}
$adsql="select * from admin where admin_id={$acco} and password='{$pw}'";
$adres=mysqli_query($dbc,$adsql);


$resql="select * from reader_card where reader_id={$acco} and passwd='{$pw}'";
$reres=mysqli_query($dbc,$resql);


if(mysqli_num_rows($adres)==1 ){
    session_start();
    $_SESSION['userid']=$acco;
    echo "<script>window.location='admin_index.php'</script>";

}
else if(mysqli_num_rows($reres)==1){

    session_start();
    $_SESSION['userid']=$acco;

    echo "<script>window.location='reader_index.php'</script>";
}
else
{
    echo "<script>alert('用户名或密码错误，请重新输入!');window.location='index.php'
   ;</script>";

}


?>