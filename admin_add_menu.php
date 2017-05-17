<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>eatFresh | Inspiring healthier habits</title>
</head>
<body>
<?php
include "admin_header.php";
?>
<div class="container">
    <div class="col-md-3">
    </div>
    <div class="col-md-6">
        <div class="well">
            <div class="row">
                <div class="form-group">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h2><center>Add food item</center></h2>
                        </div>
                    </div>
                </div>
            </div>
            <form action="admin_add_menu_action.php" method="get">
                <div class="row">
                    <div class="form-group col-md-12">
                        <label>Food item</label>
                        <input type="text" name="food_item" class="form-control" required>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <label>Food type</label>
                        <input type="text" name="food_type" placeholder="For example: Mexican, Indian, Chinese" class="form-control" required>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <label>Calories</label>
                        <input type="text" name="calories" class="form-control" required>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <label>Price</label>
                        <input type="text" name="price" placeholder="in CAD"class="form-control" required>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <label>Description</label>
                        <textarea class="form-control" rows="3" name="description" required></textarea>
                    </div>
                </div>
                <div class="row">
                    <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>