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

$query="SELECT * FROM `order_info` WHERE order_id IN (SELECT order_id FROM `customer_details` WHERE email='$email')";
$result=mysqli_query($conn,$query);




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
            </header>
            <nav class="demo-navigation mdl-navigation mdl-color--blue-grey-800">
                <a class="mdl-navigation__link" href="customer_previous_orders.php">My previous Orders</a>
                <a class="mdl-navigation__link" href="customer_logout.php">Logout</a>
            </nav>
        </div>
    </div>
	<div class="container" style="padding-top:100px;">
		<div class="row">
			<div class="col-md-2">
			</div>
			<div class="col-md-8">
				<div class="well">
					<div class="row">
						<div class="form-group">
							<div class="panel panel-primary">
								<div class="panel-heading"><h2><center>Your orders</center></h2></div>
							</div>
						</div>
						<table class="table table-striped" style="font-size: small">
							<thead>
							<tr>

								<th>Order ID</th>
								<th>Order details</th>
								<th>Order total</th>
							</tr>
							</thead>
							<tbody>
							<?php

							while($row=mysqli_fetch_array($result))
							{
								$query2="select * from order_details where order_id=$row[1]";
								$result2=mysqli_query($conn,$query2);
								$order_details="";
								while($row2=mysqli_fetch_array($result2)){
									$order_details .= $row2[3]." ".$row2[1].", ";
								}

								$query3="select * from customer_details where order_id=$row[1]";
								$result3=mysqli_query($conn,$query3);
								$row3=mysqli_fetch_array($result3);

								$name=ucfirst($row3[2])." ".ucfirst($row3[3]);
								$address=$row3[4].", ".ucfirst($row3[5]).", ".strtoupper($row3[6]);
								$contact=$row3[8].", ".$row3[9];
								?>
								<tr>
									<td><?php echo $row[1] ?></td>
									<td><?php echo rtrim($order_details, ", ") ?></td>
									<td><?php echo "$".$row[2] ?></td>
								</tr>
								<?php

							}
							?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
    </div>
    <script src="https://code.getmdl.io/1.2.1/material.min.js"></script>
</body>
</html>
