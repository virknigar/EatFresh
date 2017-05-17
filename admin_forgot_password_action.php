<?php
session_start();
$value=$_REQUEST['value'];
$_SESSION['value']=$value;
error_reporting(0);
include "connection.php";

if(filter_var("$value", FILTER_VALIDATE_EMAIL)) {
    $query="select * from admin_info where email='$value'";
    $res=mysqli_query($conn,$query);
    $row=mysqli_fetch_array($res);
    $security_question=$row[5];
    $email=$row[1];
}
else {
    list($firstname,$lastname)=split('-',strtolower($value));
    $query="select security_question,email from admin_info where firstname='$firstname' and lastname='$lastname'";
    $res=mysqli_query($conn,$query);
    $row=mysqli_fetch_array($res);
    $security_question=$row[0];
    $email=$row[1];
}
?>
<html>
<head>
    <title>eatFresh | Inspiring healthier habits</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="bootstrap/jquery/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
<?php
if(isset($_REQUEST['q'])) {
    if ($_REQUEST['q'] == 1) {
        ?>
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <center>Wrong answer to security question!</center>
        </div>
        <?php
    }
}
if($security_question!=NULL)
{
    ?>
    <br><br><br><br>
    <div class="form-group col-md-4"></div>
    <div class="form-group col-md-4">
        <div class="well">
            <center><h3><strong>Answer this security question</strong></h3></center>
            <br>
            <form action="admin_forgot_password_action2.php" method="get">
                <br><br>
                <?php echo $security_question ?>
                <br>
                <br>
                <input type="text" class="form-control" name="security_answer" placeholder="Write answer here" required>
                <br>
                <br>
                <input type="hidden" name="email" value="<?php echo $email ?>">
                <input type="hidden" name="value" value="<?php echo $value ?>">
                <div class="row"style="padding: 20px">
                    <button type="submit"class="btn btn-block btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
<?php
}
else
{
    header("location:admin_forgot_password.php?q=1");
}

?>



</body>
</html>
