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

<br><br>
<div class="form-group col-md-3"></div>
<div class="form-group col-md-5">
    <div class="well">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <center><h2>Sign up</h2></center>
            </div>
        </div>
        <form action="admin_create.php" method="get">
            <div class="row">
                <div class="form-group col-md-6">
                    <label>First name</label>
                    <input type="text" class="form-control" name="firstname"required>
                </div>
                <div class="form-group col-md-6">
                    <label>Last name</label>
                    <input type="text" class="form-control" name="lastname" required>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-12">
                    <label>Email</label>
                    <input type="email" class="form-control" name="email"required>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label>Password</label>
                    <input type="password" class="form-control" id="password" name="password"required minlength="6">
                </div>
                <div class="form-group col-md-6">
                    <label>Confirm password</label>
                    <input type="password" class="form-control" name="confirm_password" id="confirm_password" minlength="6">
                </div>
                <script>
                    $('#password, #confirm_password').on('keyup', function () {
                        if ($('#password').val() == $('#confirm_password').val()) {
                            $('#message').html('').css('color', 'green');
                        } else
                            $('#message').html('Error: passwords should match').css('color', 'red');
                    });
                </script>
            </div>
            <div class="row">
                <div class="form-group col-md-12">
                    <span id='message'></span>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-12">
                    <label>Security question</label>
                    <select class="form-control"name="security_question">
                        <option>In which city your mother and father meet?</option>
                        <option>What is the middle name of your oldest child?</option>
                        <option>What was your childhood nickname?</option>
                        <option>What was your favorite sport in high school?</option>
                        <option>What was your favorite food as a child?</option>
                        <option>What was the make and model of your first car?</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-12">
                    <label>Answer to security question</label>
                    <input type="text" class="form-control" required name="security_answer">
                </div>
            </div>
            <br>
            <button type="submit"class="btn btn-block btn-primary">Create account</button>
        </form>
        </div>
    </div>


</body>
</html>