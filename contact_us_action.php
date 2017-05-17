<?php
include "connection.php";
$name=$_REQUEST['name'];
$subject=$_REQUEST['subject'];
$email=$_REQUEST['email'];
$contact_number=$_REQUEST['contact_number'];
$description=$_REQUEST['description'];

date_default_timezone_set('America/Toronto');
$date = date('M d, Y');

$query = "insert into contact_us values('','" . $name . "','" . $subject . "','" . $email . "','" . $contact_number . "','" . $description . "','".$date."')";
mysqli_query($conn, $query);
header("location:index.php?q=1");

