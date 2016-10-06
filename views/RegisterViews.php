<?php require_once ('/xampp/htdocs/controllers/registercontrollers.php')?>
<!DOCTYPE html>
<head>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
</head>
<div class="container">
    <form class="form-horizontal" style="margin-top: 100px ;" method="post">
        <fieldset>
            <div class="form-group">
                <div class="col-xs-6" style="text-align: center;">
                    <strong>Register or </strong>
                    <a href="index.php?page=login">Login</a>
                </div>
            </div>
            <div class="form-group">
                <label for="email" class="control-label col-xs-2">Email</label>
                <div class="col-xs-4">
                    <input type="email" name="email" class="form-control" id="email">
                </div>
            </div>
            <div class="form-group">
                <label for="login" class="control-label col-xs-2">Login</label>
                <div class="col-xs-4">
                    <input type="text" name="login" class="form-control" id="login">
                </div>
            </div>
            <div class="form-group">
                <label for="realname" class="control-label col-xs-2">Real name</label>
                <div class="col-xs-4">
                    <input type="text" name="realname" class="form-control" id="realname">
                </div>
            </div>
            <div class="form-group">
                <label for="password" class="control-label col-xs-2">Password</label>
                <div class="col-xs-4">
                    <input type="password" name="password" class="form-control" id="password">
                </div>
            </div>
            <div class="form-group">
                <label for="password" class="control-label col-xs-2">Confirm password</label>
                <div class="col-xs-4">
                    <input type="password" name="cpassword" class="form-control" id="password">
                </div>
            </div>
            <div class="form-group">
                <label for="dateofbirth" class="control-label col-xs-2">Date of birth</label>
                <div class="col-xs-4">
                    <input type="date" name="dateofbirth" class="form-control" id="dateofbirth"
                           value="1990-01-01" min="1940-01-01" max="2012-01-01">
                </div>
            </div>
            <div class="form-group">
                <label for="country" class="control-label col-xs-2">Select your country</label>
                <div class="col-xs-4">
                    <select name="country" title="country">
                        <?php \ganzaev\controllers\RegisterControllers::getCountry() ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-6" style="text-align: center;">
                    <label><input name="checkbox" type="checkbox" required>Agree with terms and conditions</label>
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-offset-2 col-xs-10">
                    <input type="submit" name="submit" class="btn btn-primary" value="Continue">
                </div>
            </div>
        </fieldset>
    </form>
</div>
