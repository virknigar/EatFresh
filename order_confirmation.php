<?php
include "connection.php";
$query1="select * from customer_details order by order_id desc limit 1";
$result1=mysqli_query($conn,$query1);
$row1=mysqli_fetch_array($result1);

$query2="select * from order_details where order_id=$row1[1]";
$result2=mysqli_query($conn,$query2);

$query3="select order_total from order_info where order_id=$row1[1]";
$result3=mysqli_query($conn,$query3);
$row3=mysqli_fetch_array($result3);

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
			<div class="form-group col-md-3"></div>

				<div class="form-group col-md-6">
					<div class="well">
						<h2>Thanks for your order <?php echo ucfirst($row1[2])." ".ucfirst($row1[3])."!" ?></h2>
						<h4>Order ID: <?php echo $row1[1] ?></h4>
						<h4>Items ordered:</h4>
						<table class="table table-bordered">
							<?php
							while($row2=mysqli_fetch_array($result2)){
							?>
							<tbody>
								<tr>
									<td><?php echo $row2[1]."   ";?><span class="badge"><?php echo $row2[3];?></span></td>
								</tr>
								<?php
								}
								?>
								<tr>
									<td><strong>Total   </strong><span class="badge"><?php echo $row3[0];?></span></td>
								</tr>
								</tbody>
							</table>
						<h4>Phone: <?php echo $row1[8]?></h4>
						<h4>Address: <?php echo $row1[4].", ".ucfirst($row1[5])." ".strtoupper($row1[6]) ?></h4>
						<div class="alert alert-info">
							<strong>
								<h4>Your order will be delivered to your address in 30-40 minutes approx. Please keep <u>$<?php echo $row3[0];?></u> ready.</h4>
							</strong>
						</div>
						<a href="order_online.php">Place another order</a>
					</div>
				</div>
		</div>
    </div>
    <script src="https://code.getmdl.io/1.2.1/material.min.js"></script>
</body>
</html>












