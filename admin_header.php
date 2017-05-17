<?php
session_start();
if(isset($_SESSION['email']))
{}
else
{
    header("location:admin_login.php");
}
?>
<title>Admin panel</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<script src="bootstrap/jquery/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="admin_index.php">eatFresh | Inspiring healthier habits</a>
        </div>
        <ul class="nav navbar-nav">
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Food items
                    <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="admin_add_menu.php">Add food item</a></li>
                    <li><a href="admin_view_menu.php">View item(s)</a></li>
                </ul>
            </li>
            <li><a href="admin_orders_view.php">Orders</a></li>
            <li><a href="admin_contact_inquiries.php">Contact inquiries</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a><strong><?php echo $_SESSION['email'] ?></strong></a></li>
            <li><a href="admin_logout.php">Logout</a> </li>

        </ul>
    </div>
</nav>