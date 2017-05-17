<?php
include "admin_header.php";
include "connection.php";
$query="SELECT * FROM `contact_us` order by id DESC";

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
            <center><h2>List of inquiries</h2></center>
        </div>
    </div>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>#</th>
            <th>Subject</th>
            <th>Received on</th>
            <th>Name</th>
            <th>Email</th>
            <th>Contact number</th>
            <th>Description</th>
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
                <td><?php echo $row[2] ?></td>
                <td><?php echo $row[6] ?></td>
                <td><?php echo $row[1] ?></td>
                <td>
                    <a href="mailto:<?php echo $row[3] ?>" target="_top"><?php echo $row[3] ?></a>
                </td>
                <td><?php echo $row[4] ?></td>
                <td><?php echo $row[5] ?></td>
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

