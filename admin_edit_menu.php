<!doctype>
<html>
<head>
</head>
<body>
<?php
include "header.php";
include "connection.php";
$food_item=$_REQUEST['food_item'];
//echo $company_name;
$query="select * from menu where food_item='$food_item'";
$result=mysqli_query($conn,$query);
$row=mysqli_fetch_array($result);
?>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
            </div>
            <div class="col-md-6">
                <div class="well">
                    <div class="row">
                        <div class="form-group">
                            <div class="panel panel-primary">
                                <div class="panel-heading"><h2><center>Edit food item information</center></h2></div>
                            </div>
                        </div>
                    </div>
                    <form action="admin_edit_menu_action.php" method="get">
                        <div class="row">
                            <div class="form-group col-md-12">
                                <table class="table table-condensed">
                                    <thead></thead>
                                    <tbody>
                                    <tr>
                                        <td>Food item</td>
                                        <td></td>
                                        <td><input type="text"class="form-control"name="food_item" value="<?php echo $food_item ?>" readonly></td>
                                    </tr>
                                    <tr>
                                        <td>Food type</td>
                                        <td></td>
                                        <td><input type="text"class="form-control"name="food_type" value="<?php echo $row[2] ?>"></td>
                                    </tr>
                                    <tr>
                                        <td>Calories</td>
                                        <td></td>
                                        <td><input type="text"class="form-control"name="calories" value="<?php echo $row[3] ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Price</td>
                                        <td></td>
                                        <td><input type="text"class="form-control"name="price" value="<?php echo $row[5] ?>"></td>
                                    </tr>
                                    <tr>
                                        <td>Description</td>
                                        <td></td>
                                        <td><textarea class="form-control" rows="3" name="description"><?php echo $row[4] ?></textarea></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-md">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>



