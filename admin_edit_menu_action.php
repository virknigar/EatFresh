<?php
include "connection.php";

$food_item=$_REQUEST['food_item'];
$food_type=$_REQUEST['food_type'];
$calories=$_REQUEST['calories'];
$description=$_REQUEST['description'];
$price=$_REQUEST['price'];

$query="update menu set food_type='$food_type',calories='$calories',description='$description',price='$price' where food_item='$food_item'";
mysqli_query($conn, $query);

header("location:admin_view_menu.php?q=3");
