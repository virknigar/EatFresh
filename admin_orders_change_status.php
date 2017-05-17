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
$order_id=$_REQUEST['order_id'];
include "connection.php";
$query2="select * from order_details where order_id=$order_id";
$result2=mysqli_query($conn,$query2);
$order_details="";
while($row2=mysqli_fetch_array($result2)){
    $order_details .= $row2[3]." ".$row2[1].", ";
}
$query3="select * from customer_details where order_id=$order_id";
$result3=mysqli_query($conn,$query3);
$row3=mysqli_fetch_array($result3);

$name=ucfirst($row3[2])." ".ucfirst($row3[3]);

$query4="select status from order_info where order_id=$order_id";
$result4=mysqli_query($conn,$query4);
$row4=mysqli_fetch_array($result4);

?>
<br><br><br><br>
<div class="form-group col-md-4"></div>
<div class="form-group col-md-4">
    <div class="well">
        <center><h3>Change the status</h3></center>
        <br>
        <h5>Order information:</h5>
        <ul>
            <li>Order ID: <?php echo $order_id ?></li>
            <li>Order details: <?php echo rtrim($order_details, ", ") ?></li>
            <li>Customer name: <?php echo $name ?></li>
        </ul>
        <form action="admin_orders_change_status_action.php" method="get">
            <br>
            <select class="form-control"name="status">
                <option selected="selected">
                    <?php echo $row4[0] ?>
                </option>
                <option>Completed</option>
                <option>Not completed</option>
            </select>
            <input type="hidden" name="order_id" value="<?php echo $order_id ?>">
             <br>
            <div class="row"style="padding: 20px">
                <button type="submit"class="btn btn-block btn-primary">Change</button>
            </div>
        </form>
    </div>
</div>

</body>
</html>