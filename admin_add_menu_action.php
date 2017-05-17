<?php
include "connection.php";

$food_item=$_REQUEST['food_item'];
$food_type=$_REQUEST['food_type'];
$calories=$_REQUEST['calories'];
$description=$_REQUEST['description'];
$price=$_REQUEST['price'];

$query="select * from menu";
$res=mysqli_query($conn,$query);
$flag=0;
while($row=mysqli_fetch_array($res))
{
    if($food_item==$row[1])
    {
        $flag=1;
        break;
    }
}
if($flag==1)
{
    header("location:admin_view_menu.php?q=4");
}
else {
    $query2 = "insert into menu values('','" . $food_item . "','" . $food_type . "','" . $calories . "','" . $description . "','" . $price . "')";
    mysqli_query($conn, $query2);
    header("location:admin_view_menu.php?q=2");
}