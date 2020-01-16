<?php
include 'dbconnect.php';

if((!isset($_SESSION["forgotpasswordeid"])) && (!isset($_SESSION["Emp_Id"])))
	header('Location:logout.php');

if(isset($_SESSION["Security_Answer"]))
	header('Location:logout.php');

if(isset($_SESSION["Emp_Id"]))
	$empid = $_SESSION["Emp_Id"];
else
	$empid=$_SESSION["forgotpasswordeid"];
$err=array("","");
$sql= "SELECT Security_Question from login WHERE Emp_Id = $empid";
$sqlresult=$conn->query($sql);
$row=mysqli_fetch_array($sqlresult);
$question=$row["Security_Question"];
$ansErr="";
if(isset($_POST["submit"]))
{
	$sec_ans = $_POST["storepass"];
	$sql= "SELECT Security_Answer from login WHERE Emp_Id = $empid";
	$sqlresult= mysqli_query($conn,$sql);
	$row=mysqli_fetch_array($sqlresult);
	if($sec_ans!=$row["Security_Answer"])
	{
		$ansErr="* Answer does not match";
	}
	else
	{
		$_SESSION["Security_Answer"] = 1;
		header('Location:ChangePassword.php');
	}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Security Question</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="http://www.myersdaily.org/joseph/javascript/md5.js"></script>
    <link rel="stylesheet" href="login.css">
    <style>
        .error{
            color:red;
        }
        body
        {
            background-color : #f2f2f2;
        }
    </style>
    <script>
        function validate() {

            var y = document.forms["myForm"]["sec_ans"].value;
            document.getElementById("ans").innerHTML = "";
            document.getElementById("sec_ans").style="";
            if (y == "" || y==null) {
                document.getElementById("ans").innerHTML = "* Please Enter this field";
                document.getElementById("sec_ans").style="border:2px solid red";
                return false;
            }
            var hash = md5(y);
            document.getElementById("storepass").value = hash;
            return true;
        }
    </script>
</head>
<body>
<div class="container">
    <form method="post" style="background-color:white;" class="login-wrap login-html login-form sign-up-htm" action="" name="myForm" onsubmit= "return validate()">
        <div class="text-center">
            <strong><font size="5">Verify Yourself</font></strong>
        </div>
        <br><br>
        <div class="form-group">

            <b>Security Question</b> : <?php echo $question; ?><br><br>
            <span class="error" id ="question"></span>
        </div>
        <div class="form-group">
			<?php
			if(!empty($ansErr)){
				echo "<input name='sec_ans' style='border:2px solid red;' placeholder='Your Answer' autofocus id='sec_ans' class='input form-control' type='password'>";
				echo "</div><span class='error' id='ans'>".$ansErr."</span>";
			}
			else
			{
				echo "<input name='sec_ans' placeholder='Your Answer' autofocus id='sec_ans' class='input form-control'  type='password'>";
				echo "</div><span class='error' id='ans'></span>";
			}
			?>
            <input type="hidden" id ="storepass" name="storepass">
            <br><br>
            <center>
                <div class="form-group">
                    <input name="submit" class="btn btn-primary" type="submit">
                </div>
            </center>
        </div>
    </form>
</div>
</body>
</html>
