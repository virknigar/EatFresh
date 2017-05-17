<?php
session_start();
?>
<title>eatFresh | Inspiring healthier habits</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<script src="bootstrap/jquery/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>

<script>
    $(document).ready(function(){
        $("#myBtn").click(function(){
            $("#myModal").modal();
        });
    });
</script>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="index.php">eatFresh | Inspiring healthier habits</a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="index.php">Menu</a></li>
<!--
            <li><a href="our_story.php">Our story</a> </li>
-->
            <li><a href="locations.php">Locations</a> </li>
            <li><a href="order_online.php">Order online</a></li>
            <li><a href="contact_us.php">Contact</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="admin_login.php">Admin panel</a> </li>
            <li>
                <a href="order_checkout.php"><span class="glyphicon glyphicon-shopping-cart"></span>
                    <?php
                    if(isset($_SESSION['total']))
                        echo $_SESSION['count']."ITEMS-$".$_SESSION['total'];
                    else
                        echo "0ITEMS-$0";
                    ?>
                </a>
            </li>
        </ul>
    </div>
</nav>
