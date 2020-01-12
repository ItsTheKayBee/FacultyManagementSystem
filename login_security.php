<?php
include 'dbconnect.php';
if(!isset($_SESSION["Emp_Id"]))
  header('Location:logout.php');


$empid=$_SESSION["Emp_Id"];
if(isset($_POST["submit"]))
{
	$question = $_POST["sec_ques"];
	$answer = $_POST["storepass"];
	$sql = "UPDATE login SET Security_Question='$question',Security_Answer='$answer' WHERE Emp_Id=$empid";
	if($conn->query($sql)){
			$sql1 = "SELECT * FROM login WHERE Emp_Id=$empid";
			$result1 = $conn->query($sql1);
			$row1 = mysqli_fetch_assoc($result1);
			if($row1["Password"] == "069ab86b69e20bc514a8eccda1b205bd")
			{
				header('Location:ChangePassword.php');
			}
			else
			{
			if($row1["P1"] == "FALSE")
			{
					header('Location:profile.php');
			}
			else

					header('Location:homepage.php');
	}
}
	else
		echo mysqli_error($conn);
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="http://www.myersdaily.org/joseph/javascript/md5.js"></script>
  <script>
		function validateForm()
		{
			var x = document.forms["myForm"]["secques"].value;
			var y = document.forms["myForm"]["sec_ans"].value;
			document.getElementById("ques").innerHTML = "";
			document.getElementById("ans").innerHTML = "";
			document.getElementById("sec_ans").style="";
			document.getElementById("secques").style="";
			if (x=="" && y=="")
			{
				document.getElementById("ques").innerHTML = "* Please Select A Question";
				document.getElementById("secques").style="border:2px solid red";
				document.getElementById("ans").innerHTML = "* Please Enter An Answer";
				document.getElementById("sec_ans").style="border:2px solid red";
				return false;
			}
			if(x == "")
			{
				document.getElementById("ques").innerHTML = "* Please Select A Question";
				document.getElementById("secques").style ="border:2px solid red";
				return false;
			}
			if (y == "")
			{
				document.getElementById("ans").innerHTML = "* Please Enter An Answer";
				document.getElementById("sec_ans").style="border:2px solid red";
				return false;
			}

      var hash = md5(y);
  		document.getElementById("storepass").value = hash;
  		return true;
		}
    </script>
	<link rel="stylesheet" href="login_css.css">
	<style>
  body{
    background-color:#f2f2f2;
  }
		.boxtext{
			float  :left;
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
			color : blue;
		}
	</style>
	<title>Login Form</title>
</head>
<body>

	<div class="container">
		<form style="background-color:white;" method="post"  class="form-horizontal login-wrap login-html login-form sign-in-htm" action="" name="myForm" onsubmit="return validateForm()">
			<div class="form-group">
			<div class="boxtext">
				<strong><font size="5">Security Question</font></strong>
			</div>
			</div>
			<br>
			<div class="form-group">
				<b>Select your Question</b> :<br><br>
				<select class="form-control" name="sec_ques" id ="secques">
					<option name="sec_ques" value="">Select Question</option>
					<option name="sec_ques" value="What is the name of your first school?" >What is the name of your first school?</option>
					<option name="sec_ques" value="What is your mothers maiden name?" >What is your mother's maiden name?</option>
					<option name="sec_ques" value="What is your favorite song?" >What is your favorite song?</option>
          <option name="sec_ques" value="Where is your hometown?" >Where is your hometown?</option>
          <option name="sec_ques" value="What was the make and model of your first car?" >What was the model of your first car?</option>
				</select>
				<span id ="ques" style="color:red;"></span>
			</div>
			<br>
			<div class="form-group">
				<input type="password" id ="sec_ans" name="sec_ans" class="form-control">
        <span id ="ans" style="color:red;"></span>
			</div>
      <input type="hidden" id ="storepass" name="storepass">
			<div class="form-group">
				<center>
					<input type="submit" style="color:white;" class="btn btn-primary btn-md" value="Save" name = "submit">
				</center>
			</div>
		</form>
	</div>
</body>
</html>
