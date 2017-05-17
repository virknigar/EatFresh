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
if(isset($_REQUEST['q']))   {
    if ($_REQUEST['q'] == 1) {
    ?>
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <center>No account with the provided email or name exists!</center>
    </div>
    <?php
    }
}
?>
<br><br><br><br>
<div class="form-group col-md-4"></div>
<div class="form-group col-md-4">
    <div class="well">
        <center><h3>Let's get you into your account</h3></center>
        <br>
        <h5>Tell us one of the following to get started:</h5>
        <ul>
            <li>Sign-in email address</li>
            <li>Firstname-Lastname(same format)</li>
        </ul>
        <form action="admin_forgot_password_action.php" method="get">
            <br>
            <input type="text" class="form-control" name="value" placeholder="Email or name" required>
            <br>
            <div class="row"style="padding: 20px">
                <button type="submit"class="btn btn-block btn-primary">Continue</button>
            </div>
        </form>
    </div>
</div>

</body>
</html>