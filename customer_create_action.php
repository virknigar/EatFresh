<?php
include "connection.php";

$firstname=$_REQUEST['firstname'];
$lastname=$_REQUEST['lastname'];
$email=$_REQUEST['email'];
$password=$_REQUEST['password'];
$security_question=$_REQUEST['security_question'];
$security_answer=$_REQUEST['security_answer'];
$confirm_password=$_REQUEST['confirm_password'];

if($password==$confirm_password){
    $query="select * from customer_info";
    $res=mysqli_query($conn,$query);
    $flag=0;
    while($row=mysqli_fetch_array($res))
    {
        if($email==$row[1])
        {
            $flag=1;
            break;
        }
    }
    if($flag==1)
    {
        header("location:customer_login.php?q=2");
    }
    else {
		$password = password_hash($password, PASSWORD_BCRYPT);
        $query = "insert into customer_info values('','" . $email . "','" . $password . "','" . $firstname . "','".$lastname."','".$security_question."','".$security_answer."')";
//echo $query;
        mysqli_query($conn, $query);
        header("location:customer_login.php?q=3");
    }
}
else{
    header("location:customer_login.php?q=4");
}
