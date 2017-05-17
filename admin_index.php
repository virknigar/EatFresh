<?php
/*
 * This page displays admin dashboard. It has been implemented using Material Design Lite.
 * Admin can get overview of the orders, contact inquiries and all the variable aspects
 * related to the eatFresh website. The side navbar shows the list of options such as adding
 * food item, viewing food items that are already in the db, list of orders and also contact
 * inquiries. There is separate section for updates and locations of the resraurant.
 */
session_start();
if(isset($_SESSION['email']))
{}
else
{
    header("location:admin_login.php");
}
include "connection.php";
$query="SELECT COUNT(id) FROM order_info where status='Not completed'";
$res=mysqli_query($conn,$query);
$row=mysqli_fetch_array($res);
$new_orders=$row[0];

$query2="SELECT count(id) from contact_us";
$res2=mysqli_query($conn,$query2);
$row2=mysqli_fetch_array($res2);
$contact_inquiries_total=$row2[0];

$query3="SELECT COUNT(food_item) FROM `menu`";
$res3=mysqli_query($conn,$query3);
$row3=mysqli_fetch_array($res3);
$food_items_total=$row3[0];

$query4="SELECT COUNT(id) FROM order_info where status='Completed'";
$res4=mysqli_query($conn,$query4);
$row4=mysqli_fetch_array($res4);
$completed_orders=$row4[0];

$query5="SELECT COUNT(id) FROM `customer_details` WHERE city='new york'";
$res5=mysqli_query($conn,$query5);
$row5=mysqli_fetch_array($res5);
$ny_orders=$row5[0];

$query6="SELECT COUNT(id) FROM `customer_details` WHERE city='new jersey'";
$res6=mysqli_query($conn,$query6);
$row6=mysqli_fetch_array($res6);
$nj_orders=$row6[0];

$query7="SELECT COUNT(id) FROM `customer_details` WHERE city='norwalk'";
$res7=mysqli_query($conn,$query7);
$row7=mysqli_fetch_array($res7);
$norwalk_orders=$row7[0];

$query8="SELECT COUNT(id) FROM `customer_details` WHERE city='bridgeport'";
$res8=mysqli_query($conn,$query8);
$row8=mysqli_fetch_array($res8);
$bridgeport_orders=$row8[0];

//~ $query9="SELECT COUNT(id) FROM `customer_details` WHERE city='Leamington'";
//~ $res9=mysqli_query($conn,$query9);
//~ $row9=mysqli_fetch_array($res9);
//~ $leamington_orders=$row9[0];

//~ $query10="SELECT COUNT(id) FROM `customer_details` WHERE city='Cambridge'";
//~ $res10=mysqli_query($conn,$query10);
//~ $row10=mysqli_fetch_array($res10);
//~ $cambridge_orders=$row10[0];
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
                <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon" id="hdrbtn">
                    <i class="material-icons">more_vert</i>
                </button>
                <ul class="mdl-menu mdl-js-menu mdl-js-ripple-effect mdl-menu--bottom-right" for="hdrbtn">
                    <li class="mdl-menu__item"><a href="index.php" target="_blank">Go to website</a></li>
                </ul>
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
                <a class="mdl-navigation__link" href="admin_add_menu.php">Add food item</a>
                <a class="mdl-navigation__link" href="admin_view_menu.php">View food items</a>
                <a class="mdl-navigation__link" href="admin_orders_view.php">Orders</a>
                <a class="mdl-navigation__link" href="admin_contact_inquiries.php">Contact inquiries</a>
                <a class="mdl-navigation__link" href="admin_logout.php">Logout</a>
            </nav>
        </div>
        <main class="mdl-layout__content mdl-color--grey-100">
            <div class="mdl-grid demo-content">
                <div class="demo-charts mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--3-col mdl-grid">
                    <img src="pictures/bag.png">
                    <a href="admin_orders_view.php"> <center><h4><?php echo $new_orders ?><br><font size="3", color="gray">New orders</font></h4></center>
                    </a>
                </div>
                <div class="demo-charts mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--3-col mdl-grid">
                    <img src="pictures/orders_complete.png">
                    <a href="admin_view_menu.php"> <center><h4><?php echo $completed_orders ?><br><font size="3", color="gray">Orders completed</font></h4></center>
                    </a>
                </div>
                <div class="demo-charts mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--3-col mdl-grid">
                    <img src="pictures/fooditems_logo.jpg">
                    <a href="admin_view_menu.php"> <center><h4><?php echo $food_items_total ?><br><font size="3", color="gray">Food items</font></h4></center>
                    </a>
                </div>
                <div class="demo-charts mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--3-col mdl-grid">
                    <img src="pictures/contact_logo.png">
                    <a href="admin_contact_inquiries.php"> <center><h4><?php echo $contact_inquiries_total ?><br><font size="3", color="gray">Contact inquiries</font></h4></center>
                    </a>
                </div>
                <div class="demo-graphs mdl-shadow--2dp mdl-color--white mdl-cell mdl-cell--8-col">
                    <br>
                    <span class="mdl-layout-title" style="margin-left: 25px">Food items offered</span>
                    <ul class="demo-list-three mdl-list">
                        <?php
                        $query11="SELECT * FROM `menu` LIMIT 0,5";
                        $res11=mysqli_query($conn,$query11);
                        while($row11=mysqli_fetch_array($res11)){
                        ?>
                            <li class="mdl-list__item mdl-list__item--three-line">
                                <span class="mdl-list__item-primary-content">
                                    <i class="material-icons mdl-list__item-avatar">keyboard_arrow_right</i>
                                    <span><?php echo $row11[1]?></span>
                                    <span class="mdl-list__item-text-body">
                                        <?php echo $row11[4]?>
                                    </span>
                                </span>
                            </li>
                        <?php
                        }
                        ?>
                    </ul>
                    <div class="mdl-card__actions mdl-card--border">
                        <a href="admin_view_menu.php" class="mdl-button mdl-js-button mdl-js-ripple-effect">Read More</a>
                    </div>
                </div>
                <div class="demo-cards mdl-cell mdl-cell--4-col mdl-cell--8-col-tablet mdl-grid mdl-grid--no-spacing">
                    <div class="demo-options mdl-card mdl-color--blue-300 mdl-shadow--2dp mdl-cell mdl-cell--4-col mdl-cell--3-col-tablet mdl-cell--12-col-desktop">
                        <div class="mdl-card__supporting-text mdl-color-text--blue-grey-50">
                            <h2 class="mdl-card__title-text">Updates</h2>
                            <br><br>
                            <marquee direction="up" scrollamount="1">
                                <li>You have <b><?php echo $ny_orders?> orders</b> from <b>New York</b></li>
                                <li>You have <b><?php echo $nj_orders?> orders</b> from <b>New Jersey</b></li>
                                <li>You have <b><?php echo $norwalk_orders?> orders</b> from <b>Norwalk</b></li>
                                <li>You have <b><?php echo $bridgeport_orders?> orders</b> from <b>Bridgeport</b></li>
<!--
                                <li>You have <b><?php echo $chatham_orders?> orders</b> from <b>Chatham</b></li>
                                <li>You have <b><?php echo $leamington_orders?> orders</b> from <b>Leamington</b></li>
-->
                            </marquee>
                        </div>
                    </div>
                    <div class="demo-separator mdl-cell--1-col"></div>
                    <div class="demo-updates mdl-card mdl-shadow--2dp mdl-cell mdl-cell--4-col mdl-cell--4-col-tablet mdl-cell--12-col-desktop">
                        <div class="mdl-card__title mdl-card--expand mdl-color--blue-600">
                            <h2 class="mdl-card__title-text">Locations</h2>
                        </div>
                        <div class="mdl-card__supporting-text mdl-color-text--grey-600">
<!--
                            <marquee scrollamount="2">Brampton, Windsor, London, Cambridge, Chatham, Leamington</marquee>
-->
                            <marquee scrollamount="2">New York, New Jersey, Norwalk, Bridgeport</marquee>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <script src="https://code.getmdl.io/1.2.1/material.min.js"></script>
</body>
</html>
