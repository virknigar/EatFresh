<?php
include "connection.php";
session_start();
$email=$_REQUEST['email'];
$password=$_REQUEST['password'];

$query="select * from admin_info";
$result=mysqli_query($conn,$query);
$flag=0;
while($row=mysqli_fetch_array($result))
{
    if($email==$row[1] && $password==$row[2]) {
        $flag=1;
        break;
    }
}
if($flag==1)
{
    $_SESSION['email']=$email;
    header("location:admin_index.php");
}
else
{
    header("location:admin_login.php?q=1");
}