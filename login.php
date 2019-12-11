<?php
include 'dbconnect.php';
if(isset($_SESSION["Emp_Id"]))
  session_destroy();


$err=array("","");
if(isset($_POST["submit"]))
{
	$empid = $_POST["empid"];
	$pass = $_POST["storepass"];


	$sql="SELECT * FROM login WHERE Emp_Id = $empid";
	if($result = $conn->query($sql))
	{
		$row = mysqli_fetch_assoc($result);
		if($row == NULL){
			$err[0] = "* Please Enter A Valid Employee Id";
    }
		$pass1 = $row["Password"];
		if($pass == $pass1)
		{
			$_SESSION["Emp_Id"]=$empid;
			$sql1 = "SELECT * FROM login WHERE Emp_Id = $empid";
			$result=$conn->query($sql1);
			$row=mysqli_fetch_assoc($result);
			if($row["Security_Question"]=='')
			header('Location:login_security.php');
		else
			header('Location:profile.php');
		}
		else
    {
      $err[0] = "";
			$err[1]="* Please Enter The Valid Password";
    }
	}
	else
  {
		$err[0]="* Please Enter A Valid Employee Id";
  }
}
?>
<!DOCTYPE html>
<html>
<head>
	<script>
		function validateForm()
		{
			var x = document.forms["myForm"]["empid"].value;
			var y = document.forms["myForm"]["pass"].value;
			document.getElementById("emp").innerHTML = "";
			document.getElementById("passw").innerHTML = "";
			document.getElementById("user").style="";
			document.getElementById("pass").style="";
			var flag = 0;
			if(x == "" && y == "")
			{
				alert("Please Fill Employee ID & Password.");
				return false;
			}
			else if (x == "")
			{
				document.getElementById("emp").innerHTML = "* Please Enter An Employee Id";
				document.getElementById("user").style="border:2px solid red";
				flag = 1;
			}
			else if (!(/^\d{6}$/.test(x)))
			{
				document.getElementById("emp").innerHTML = "* Please Enter A Valid Employee Id";
				document.getElementById("user").style="border:2px solid red";
				flag = 1;
			}
			else if (y == "")
			{
				document.getElementById("passw").innerHTML = "* Please Enter A Password";
				document.getElementById("pass").style="border:2px solid red";
				flag = 1;
			}
			if(flag==1)
				return false;

			if(flag==0)
			{
				var hash = md5(y);
				document.getElementById("storepass").value = hash;
				return true;
			}
		}
	</script>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="http://www.myersdaily.org/joseph/javascript/md5.js"></script>

	<link rel="stylesheet" href="login_css.css">
	<style>
  body{
    background-color:#f2f2f2;
  }
		.boxtext{
			float  :center;
		}

		.askrole{
			float : right;
		}

		.error{
			color : #fa0808;
			font-weight : bold;
		}

		a:hover{
			text-decoration : none;
			color : #1F54AB;
		}
	</style>
	<title>Login</title>
</head>
<body >
	<div class="container">
		<h1  id="login-h1" class="boxtext" ><strong>FACULTY MANAGEMENT SYSTEM</strong></h1>
		<form style="background-color:white;" method="post"  class="form-horizontal login-wrap login-html login-form sign-in-htm" action="" name="myForm" onsubmit="return validateForm()">
      <div class="form-group">
			<div class="boxtext" align="center">
				<strong><font size="5">Authentication Details</font></strong>
			</div>
			</div>
			<br>
			<br>
			<div class="group">
			<div class="form-group">
        <?php
        if(!empty($err[0])){
				echo '<input id ="user" type="text" style="border:2px solid red;" class="input form-control" autofocus placeholder="Employee Id" name = "empid"><br>';
				echo '<span class="error" id ="emp">'.$err[0].'</span>';
        }
        else {
          echo '<input id ="user" type="text" class="input form-control" placeholder="Employee Id" autofocus name = "empid"><br>';
  				echo '<span class="error" id ="emp"></span>';
        }
        ?>
			</div>
			</div>
			<div class="group">
			<div class="form-group">
        <?php
        if(!empty($err[1])){
				echo '<input id ="pass" type="password" style="border:2px solid red;" class="input form-control" data-type="password" placeholder="Password" name = "pass"><br>';
				echo '<span class="error" id ="passw">'.$err[1].'</span>';
      }
      else {
        echo '<input id ="pass" type="password" class="input form-control" data-type="password"  placeholder="Password" name = "pass"><br>';
				echo '<span class="error" id ="passw"></span>';
      }
        ?>
			</div>
			</div>
			<input type="hidden" id ="storepass" name="storepass">
			<div class="form-group">
				<center>
					<input type="submit" style="color:white;" class="btn btn-primary btn-md" value="Sign In" name = "submit">
				</center>
			</div>
			<div class="form-group">
				<center>
				<br><br>
					Forgot password? <a href="forgotpassword.php"><b style="color : #1F54AB;">Click Here</b></a>
				</center>
			</div>
		</form>
	</div>
</body>
</html>
