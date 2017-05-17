<?php
session_start();
if(isset($_SESSION['email']))
{}
else
{
    header("location:customer_login.php");
}
$email=$_SESSION['email'];
include "connection.php";
$query="select * from customer_info where email='$email'";
$result=mysqli_query($conn,$query);
$row=mysqli_fetch_array($result);
?>
<!doctype html>
<html lang="en">
<head>
    <title>eatFresh | Inspiring healthier habits</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="A front-end template that helps you build fast, modern mobile web apps.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.2.1/material.cyan-light_blue.min.css">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<script src="bootstrap/jquery/jquery.min.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
    <style>
        #view-source {
            position: fixed;
            display: block;
            right: 0;
            bottom: 0;
            margin-right: 40px;
            margin-bottom: 40px;
            z-index: 900;
        }
        a {
            text-decoration: none;
        }
        img {
            float: left;
            width: 90px;
            height: 90px;


        }
        h4 {
            position: relative;
            left: 15px;
        }
    </style>
</head>
<body>
    <div class="demo-layout mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">
        <header class="demo-header mdl-layout__header mdl-color--grey-100 mdl-color-text--grey-600">
            <div class="mdl-layout__header-row">
                <span class="mdl-layout-title">eatFresh | Inspiring healthier habits</span>
                <div class="mdl-layout-spacer"></div>
            </div>
        </header>
        <div class="demo-drawer mdl-layout__drawer mdl-color--blue-grey-900 mdl-color-text--blue-grey-50">
            <header class="demo-drawer-header">
                <img src="pictures/admin_logo.png" class="demo-avatar">
                <br>
                <div class="demo-avatar-dropdown">
                    <span><?php echo $_SESSION['email']?></span>
                </div>
            </header>
            <nav class="demo-navigation mdl-navigation mdl-color--blue-grey-800">
                <a class="mdl-navigation__link" href="customer_previous_orders.php">My previous Orders</a>
                <a class="mdl-navigation__link" href="customer_logout.php">Logout</a>
            </nav>
        </div>
    </div>
	<div class="container" style="padding-top:100px;">
		<div class="row">
			<div class="col-md-3">
			</div>
			<div class="col-md-6">
				<div class="well">
					<div class="row">
						<div class="form-group">
							<div class="panel panel-primary">
								<div class="panel-heading"><h2><center>Your details</center></h2></div>
							</div>
						</div>
					</div>
					<form action="order_checkout_action.php" method="get">
						<div class="row">
							<div class="form-group col-md-6">
								<label>First name</label>
								<input type="text"class="form-control"name="first_name" value="<?php echo $row[3]?>" readonly>
							</div>
							<div class="form-group col-md-6">
								<label>Last name</label>
								<input type="text"class="form-control"name="last_name" value="<?php echo $row[4]?>" readonly>
							</div>
						</div>
						<div class="row">
							<div class="form-group col-md-12">
								<label>Street address</label>
								<input type="text"class="form-control"name="street_address"required>
							</div>
						</div>
						<div class="row">
							<div class="form-group col-md-6">
								<label>City</label>
								<select class="form-control" name="city">
									<option>new york</option>
									<option>new jersey</option>
									<option>norwalk</option>
									<option>bridgeport</option>
								</select>
							</div>
							<div class="form-group col-md-6">
								<label>Postal code</label>
								<input type="text"class="form-control"name="postal_code"required>
							</div>
						</div>
						<div class="row">
							<div class="form-group col-md-12">
								<label>Country</label>
								<input type="text"class="form-control"name="country" value="usa"readonly>
							</div>
						</div>
						<div class="row">
							<div class="form-group col-md-6">
								<label>Contact Number</label>
								<input type="text"class="form-control"name="contact_number"required minlength="10" maxlength="10">
							</div>
							<div class="form-group col-md-6">
								<label>Email</label>
								<input type="email"class="form-control"name="email" value="<?php echo $row[1]?>" readonly>
							</div>
						</div>
						<div class="row">
							<div class="btn pull-right">
							<button type="submit"  class="btn btn-primary btn-lg">Place an order</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
    </div>
    <script src="https://code.getmdl.io/1.2.1/material.min.js"></script>
</body>
</html>
