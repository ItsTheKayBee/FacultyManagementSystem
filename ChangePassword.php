<?php
include 'dbconnect.php';
include 'ChangePassword_Php.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="libraries/bootstrap-3.3.7/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="libraries/font-awesome-4.7.0/css/font-awesome.min.css">
    <script src="libraries/jquery.min.js"></script>
    <script src="libraries/bootstrap-3.3.7/dist/js/bootstrap.min.js"></script>
    <script src="libraries/md5-js/md5.js"></script>
    <script src="ChangePassword.js"></script>
    <link rel="stylesheet" href="login.css">
    <style>
        .error{
            color:red;
        }
        body{
            background-color:#f2f2f2;
        }
    </style>
</head>
<body>
<div class="container">
    <form method="post" style="background-color:white;" class="login-wrap login-html login-form sign-up-htm" action="" name="changepwd" onsubmit= "return validate()">
        <div class="text-center">
            <strong><font size="5">Change Password</font></strong>
        </div>
        <br><br>

        <div class="form-group">
            <b>New Password</b> :<br><br> <input type='password' autofocus name='newpwd' id ='newpwd' pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" class='input form-control'>
            <br>
            <span class="error" id ="new"></span>
        </div>
        <div class="form-group">
            <b>Retype Password</b> :<br><br> <input type="password" name="renewpwd" placeholder="" id ="renewpwd" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" class="input form-control" />
            <br>
            <span class="error" id ="renew"></span>
        </div>
        <input type="hidden" id ="storepass" name="storepass">
        <br>
        <center>
            <div class="form-group">
                <input name="submit" class="btn btn-primary" type="submit">
            </div>
        </center>
    </form>
</div>
</body>
</html>