<?php
include "admin_header.php";
include "connection.php";
$query="select * from menu";
$result=mysqli_query($conn,$query);

if(isset($_REQUEST['q'])) {
    if ($_REQUEST['q'] == 1) {
        ?>
        <div class="alert alert-info">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <center>Food item deleted</center>
        </div>
        <?php
    }
    if ($_REQUEST['q'] == 2) {
        ?>
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <center>Food item added</center>
        </div>
        <?php
    }
    if ($_REQUEST['q'] == 3) {
        ?>
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <center>Food item updated</center>
        </div>
        <?php
    }
    if ($_REQUEST['q'] == 4) {
        ?>
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <center>Food item already exists!</center>
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

<div class="col-md-1"></div>
<div class="col-md-10">
    <div class="panel panel-primary">
            <div class="panel-heading">
                <center><h2>List of food items</h2></center>
            </div>
        </div>
    <table class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Food item</th>
                <th>Food type</th>
                <th>Calories</th>
                <th>Price</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $count=1;
            while($row=mysqli_fetch_array($result))
            {
                ?>
                <tr>
                    <td><?php echo $count."." ?></td>
                    <td><?php echo $row[1] ?></td>
                    <td><?php echo $row[2] ?></td>
                    <td><?php echo $row[3] ?></td>
                    <td><?php echo $row[5] ?></td>
                    <td><?php echo $row[4] ?></td>
                    <td>
                        <button onclick="location.href='admin_edit_menu.php?food_item=<?php echo $row[1] ?>'"class="btn btn-primary btn-md">Edit</button>
                        <button onclick="location.href='admin_delete_fooditem.php?food_item=<?php echo $row[1] ?>'"class="btn btn-primary btn-md">Delete</button>
                    </td>
                </tr>
                <?php
                $count++;
            }
            ?>
            </tbody>
        </table>
</div>

</body>
</html>

