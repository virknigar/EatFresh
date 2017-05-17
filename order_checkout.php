<?php
include "header.php";
if(!empty($_GET["action"])) {
    switch ($_GET["action"]) {
        case "remove":
            if (!empty($_SESSION["cart_item"])) {
                foreach ($_SESSION["cart_item"] as $k => $v) {
                    if ($_GET["food_item"] == $k)
                        unset($_SESSION["cart_item"][$k]);
                    if (empty($_SESSION["cart_item"]))
                        unset($_SESSION["cart_item"]);
                }
            }
            $item_total = 0;
            $count=1;
            foreach ($_SESSION["cart_item"] as $item) {
                $item_total += ($item["price"] * $item["quantity"]);
                $count++;
            }
            $_SESSION['total'] = $item_total;
            $_SESSION['count'] =$count-1;
            header("location: order_checkout.php");
            break;
    }
}
if(isset($_SESSION["cart_item"])){
    $item_total = 0;
    ?>
    <div class="form-group col-md-3"></div>
    <div class="form-group col-md-6">
        <div class="well">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <center><h2>Your Order</h2></center>
            </div>
        </div>
        <div class="well">
            <table class="table table-striped">
                <thead>
                </thead>
                <tbody>
                    <tr>
                        <th><strong>#</strong></th>
                        <th><strong>Food item</strong></th>
                        <th><strong>Price</strong></th>
                        <th><strong>Quantity</strong></th>
                        <th></th>
                    </tr>
                    <?php
                    $count=1;
                    foreach ($_SESSION["cart_item"] as $item){
                    ?>
                        <tr>
                            <td><?php echo $count ?>.</td>
                            <td><?php echo $item["food_item"]; ?></td>
                            <td><?php echo $item["price"]; ?></td>
                            <td><?php echo $item["quantity"]; ?></td>
                            <td><a href="order_checkout.php?action=remove&food_item=<?php echo $item["food_item"]; ?>">Remove</a></td>
                        </tr>
                        <?php
                        $count++;
                        $item_total += ($item["price"]*$item["quantity"]);
                    }
                    ?>
                    <tr>
                        <td colspan="5" align=right><strong>Total:</strong> <?php echo "$".$item_total; ?></td>
                    </tr>
                    
                    <tr>
                        <td><a href="order_online.php" class="btn btn-primary">Make a change</a> </td>
                        <td colspan="5" align="right"><a href="customer_login.php" class="btn btn-primary">Confirm order</a> </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    </div>
    <?php
}
else
{
    ?>
    <div class="form-group col-md-3"></div>
    <div class="form-group col-md-6">

    <div class="alert alert-info">

    <center><h2>Cart is empty</h2></center>
        </div>
        </div>

<?php
}
   ?>
