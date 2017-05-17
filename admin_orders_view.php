<?php
include "admin_header.php";
include "connection.php";
$query="SELECT * FROM order_info";

$result=mysqli_query($conn,$query);

if(isset($_REQUEST['q'])) {
    if ($_REQUEST['q'] == 1) {
        ?>
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <center>Status has been changed</center>
        </div>
        <?php
    }
}
?>
<!doctype>
<html>
<head>
</head>
<body>


<div class="col-md-12">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <center><h2>List of orders</h2></center>
        </div>
    </div>
    <table class="table table-striped" style="font-size: small">
        <thead>
        <tr>

            <th>Order ID</th>
            <th>Order details</th>
            <th>Order total</th>
            <th>Customer name</th>
            <th>Address</th>
            <th>Contact</th>
            <th>Status</th>
            <th></th>
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
                <td><?php echo $name ?></td>
                <td><?php echo $address ?></td>
                <td><?php echo $contact ?></td>
                <td><?php 
                    if($row[3]=="Not completed"){
                        ?>
                        <font color="red">Not completed</font>
                    <?php
                    }
                    else{
                        ?>
                        <font color="green">Completed</font>
                    <?php
                    }
                        ?>
                <td><button type="button" onclick="location.href='admin_orders_change_status.php?order_id=<?php echo $row[1] ?>'" 
                            class="btn btn-primary btn-xs">Change</button></td>


            </tr>
            <?php

        }
        ?>
        </tbody>
    </table>
</div>

</body>
</html>

