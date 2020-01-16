<?php
include 'dbconnect.php';
if(isset($_SESSION["forgotpasswordeid"]))
	header('Location:logout.php');
$empErr = "";
if(ISSET($_POST["recover-submit"]))
{
	$empid = $_POST["empid"];
	$checkuser = "SELECT * FROM login WHERE Emp_Id = $empid";
	$checkuser_result = $conn->query($checkuser);
	if(!$checkuser_result || mysqli_num_rows($checkuser_result)==0)
		$empErr= "* No Such User Exists!";
	else
	{
		$_SESSION["forgotpasswordeid"] = $empid;
		header("Location:security.php");
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Forgot Password</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="login.css">
    <style>
        .error
        {
            color:red;
            font-weight : bold;
        }
        body
        {
            background-color : #f2f2f2;
        }
    </style>
    <script>
        function validateForm()
        {
            var x = document.forms["forgot-form"]["fgtempid"].value;
            document.getElementById("fgterror").innerHTML = "";
            document.getElementById("fgtempid").style="";
            if(x==""||x==null)
            {
                document.getElementById("fgterror").innerHTML = "* Please Enter A Employee ID.";
                document.getElementById("fgtempid").style="border:2px solid red";
                return false;
            }
        }
    </script>
</head>
<body>
<div class="container">
    <form style="background-color:white;" id ="forgot-form" autocomplete="off" method="post" class="login-wrap login-html login-form sign-up-htm" name="forgotpwd-form" onsubmit="return validateForm()">
        <center>
            <h3><i class="fa fa-lock fa-4x"></i></h3>
            <h2 class="text-center">Forgot Password ?</h2>
            <br><br>
            <div class="form-group">
				<?php
				if(!empty($empErr)){
					echo "<input id='fgtempid' style='border:2px solid red;' name='empid' autofocus placeholder='Enter your Employee ID' class='form-control' type='text'>";
					echo "<br>";
					echo "<span class='error' id='fgterror'>$empErr</span>";
				}
				else
				{
					echo "<input id='fgtempid' name='empid' autofocus placeholder='Enter your Employee ID' class='form-control' type='text'>";
					echo "<br>";
					echo "<span class='error' id='fgterror'></span>";
				}
				?>
            </div>
            <br>
            <div class="form-group">
                <input name="recover-submit" class="btn btn-primary" value="Reset Password" type="submit">
            </div>
        </center>
    </form>
</div>
</body>
</html>