<?php
include "header.php";
?>
<div class="form-group col-md-3"></div>

<div class="form-group col-md-6">
<div class="well">
    <div class="panel panel-primary">
    <div class="panel-heading">

    <center><h1>Contact us</h1></center>
        </div>
    </div>
    <form action="contact_us_action.php" method="get">
                    <div class="row">
                        <div class="form-group col-md-1"></div>
                        <div class="form-group col-md-5">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control" name="name"required>
                            </div>
                        </div>
                        <div class="form-group col-md-5">
                            <div class="form-group">
                                <label>Subject</label>
                                <select class="form-control"name="subject">
                                    <option>Order inquiry</option>
                                    <option>General inquiry</option>
                                    <option>Job openings</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-1"></div>
                        <div class="form-group col-md-5">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email"required>
                            </div>
                        </div>
                        <div class="form-group col-md-5">
                            <div class="form-group">
                                <label>Contact number</label>
                                <input type="text" class="form-control" name="contact_number" minlength="10" maxlength="10" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-1"></div>
                        <div class="form-group col-md-10">
                            <label>Description</label>
                            <textarea class="form-control" rows="5" name="description" required></textarea>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="form-group col-md-1"></div>
                        <div class="form-group col-md-10">
                            <button type="submit"class="btn btn-block btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
</div>
</div>