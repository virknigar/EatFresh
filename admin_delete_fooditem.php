<?php
include "header.php";
include "connection.php";

$food_item=$_REQUEST['food_item'];

$query="delete from menu where food_item='$food_item'";
mysqli_query($conn,$query);
header("location:admin_view_menu.php?q=1");


