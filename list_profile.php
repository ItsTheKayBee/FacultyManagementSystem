<?php
include 'dbconnect.php';
if(!isset($_SESSION["Emp_Id"]))
	header('Location:logout.php');
function dateformatChanger($orgDate){
	return date("d-m-Y", strtotime($orgDate));
}
$myData = json_decode( base64_decode( $_GET['parameter'] ) );

if($_SESSION["Emp_Id"] == $myData->val)
	header('Location:main.php');
$eid = $_SESSION["Emp_Id"];
$sql = "SELECT * FROM login WHERE Emp_Id=$eid";
$result = $conn->query($sql);
$row = mysqli_fetch_assoc($result);
$p1 = $row["P2"];
$p2 = $row["P5"];

$priv = array();
$id = $myData->val;
$sql = "SELECT * FROM personal_details WHERE Emp3_Id=$id";
$result = $conn->query($sql);
$row = mysqli_fetch_assoc($result);
$name=$row["Name"];
$email=$row["Email"];
$contact=$row["Contact"];
$gender=$row["gender"];
$address=$row["Address"];
$join_pos=$row["Join_Pos"];
$join_date=$row["Join_Date"];
$pro1=$row["Prom_1"];
$pro1_date=$row["Prom_1_Date"];
$dob=$row["DOB"];
if(empty($pro1))
{
	$curpos = $join_pos;
}
else
	$curpos = $pro1;
if($dob != '1950-01-01')
{
	$temp = (int)substr($dob,0,4);
	$temp1 = (int)date("Y");
	$years_exp = $temp1-$temp;
}
else
	$years_exp = null;
if($join_date == '1950-01-01')
{
	$join_date = null;
}
$profilepic='<div class="thumbnail img-responsive"><img src="data:image/jpeg;base64,'.base64_encode($row["Profile_Pic"]).'"/></div>';

if(isset($_POST["submit"]))
{
	$sql = "SELECT * FROM login WHERE Emp_Id=$id";
	$result = $conn->query($sql);
	$row = mysqli_fetch_assoc($result);
	$priv[0] = $row["P1"];
	$priv[1] = $row["P2"];
	$priv[2] = $row["P3"];
	$priv[3] = $row["P4"];
	$priv[4] = $row["P5"];
	if(isset($_POST["priv0"])){
		if($_POST["priv0"] == 'TRUE')
			$priv[0] = 'TRUE';
	}
	else
		$priv[0] = 'FALSE';
	if(isset($_POST["priv1"])){
		if($_POST["priv1"] == 'TRUE')
			$priv[1] = 'TRUE';
	}
	else
		$priv[1] = 'FALSE';
	if(isset($_POST["priv2"])){
		if($_POST["priv2"] == 'TRUE')
			$priv[2] = 'TRUE';
	}
	else
		$priv[2] = 'FALSE';
	if(isset($_POST["priv3"])){
		if($_POST["priv3"] == 'TRUE')
			$priv[3] = 'TRUE';
	}
	else
		$priv[3] = 'FALSE';
	if(isset($_POST["priv4"])){
		if($_POST["priv4"] == 'TRUE')
			$priv[4] = 'TRUE';
	}
	else
		$priv[4] = 'FALSE';
	if($priv[0] == "FALSE" && $priv[1] == "FALSE" && $priv[2] == "FALSE" && $priv[3] == "FALSE" && $priv[4] == "FALSE")
		echo "<script type='text/javascript'>alert('Please Assign Atleast One Privilege');</script>";
	else{
		$sql = "UPDATE login SET P1='$priv[0]',P2='$priv[1]',P3='$priv[2]',P4='$priv[3]',P5='$priv[4]' WHERE Emp_Id=$id";
		$conn->query($sql);
		$myData = array('val'=>$id);
		$arg = base64_encode( json_encode($myData) );
		echo "<script>location.href='list_profile.php?parameter='.$arg.'';</script>";
	}
}

if(isset($_POST["submitcv"]))
{
	$myData = array('id'=>$id);
	$arg = base64_encode( json_encode($myData) );
	header('Location:CV.php?parameter='.$arg.'');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Details : <?php echo $id; ?></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript">

        $(document).ready(function()
        {
            $("#change_privs").hide();
            $("#btn").click(function(e)
            {
                $("#change_privs").toggle(250);

            });
        });

    </script>
    <link href='https://fonts.googleapis.com/css?family=NTR' rel='stylesheet'>
    <style>

        .navbar
        {
            border : none;
            background-color: #1F54AB;
            color:white;
            border-radius : 0px;
            width : 100%;
        }
        ul.nav-pills
        {
            top: 75px;
        }
        #btn
        {
            background: none;
            border:none;
            outline:0;
            color : #337ab7;
        }
        a:hover
        {
            text-decoration: none;
        }
        table
        {
            border : none;
        }
        #cvbtn
        {
            border:none;
            outline:0;
        }

        #navleft
        {
            color : white;
            margin-top : 1%;
            font-size : 18px;
        }
        #setbtn
        {
            background-color : #1F54AB;
            margin-top:9px;
            border : none;
            font-size : 20px;
        }
    </style>
</head>
<body>
<?php
include 'Decision1.php';
?>
<!--NAVBAR-->
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="nav navbar-nav navbar-left" id ="navleft">
            <b>Employee ID : <?php echo $empid; ?></b>
        </div>
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse" id ="myNavbar">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <div class="dropdown">
                        <button id ="setbtn" class="btn btn-primary" data-toggle="dropdown"><span class="glyphicon glyphicon-cog"></span></button>
                        <ul class="dropdown-menu">
                            <li><a href="security.php"><font style="color:black;">Forgot Password</font></a></li>
                            <li class="divider"></li>
                            <li><a href="logout.php"><font style="color:black;">Log out &nbsp <span class="glyphicon glyphicon-log-in"></span></font></a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container-fluid">

    <nav class="col-sm-2 col-lg-2 col-md-2 col-xs-2" id ="myScrollspy">
        <ul class="nav nav-pills nav-stacked">
            <li id ="section0"><a href="profile.php#section0">PROFILE </a></li>
            <hr>
            <li id ="section21"><a href="main.php#section1">Faculty List</a></li>
            <li id ="section22"><a href="main.php#section2">Add faculty</a></li>
            <li id ="section23"><a href="main.php#section3">Report Generation</a></li>
    </nav>
    <div class="col-sm-10 col-lg-10 col-md-10 col-xs-10">
        <div class="col-sm-5 col-lg-3 col-md-4 col-xs-5">
            <div class="form-group ">
                <h3>Faculty Details :</h3>
				<?php echo $profilepic; ?>
                <form action="" method="POST" name="cv"><center><input type="submit" name="submitcv" class="btn btn-primary" id ="cvbtn" <?php if($p2 == "FALSE") echo "disabled='true' title='You Do Not Have This Privilege'";?> value="Generate CV"></center></form>
                <br><br>
                <a href = "main.php#section21" title="Obviously not Simon! :P"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp<font size="5">Go Back</font></a>
            </div>
        </div>
        <div class="col-sm-9 col-lg-9 col-md-9 col-xs-9" style="font-size:17px">
            <br><br>
            <div class="table-responsive">
                <table class="table table-sm table-bordered">
                    <tbody>
                    <tr>
                        <td>Employee Id </td>
                        <td><b><?php echo $id; ?></b></td>
                    </tr>

                    <tr>
                        <td>Name: </td>
                        <td><b><?php if($name == "") echo " - ";else  echo $name;?></b></td>
                    </tr>

                    <tr>
                        <td>Age: </td>
                        <td><b><?php if($years_exp > 0) echo $years_exp; else echo "0"; ?></b></td>
                    </tr>

                    <tr>
                        <td>E-mail address  : </td>
                        <td><b><?php if($email == "") echo " - ";else  echo $email;?></b></td>
                    </tr>

                    <tr>
                        <td>Joining Position: </td>
                        <td><b><?php if($join_pos == "") echo " - ";else  echo $join_pos;?></b></td>
                    </tr>
                    <tr>
                        <td>Joining Date : </td>
                        <td><b><?php if($join_date == null) echo " - ";else  echo dateformatChanger($join_date); ?></b></td>
                    </tr>

                    <tr>
                        <td>Current Position : </td>
                        <td><b><?php if($curpos == "") echo " - ";else  echo $curpos;?></b></td>
                    </tr>

                    </tbody>
                </table>
            </div>
			<?php
			if($p1 == "TRUE"){
				$myData = array('val'=>$id);
				$arg = base64_encode( json_encode($myData) );
				echo '<button id ="btn" class="editbutton"><span class="glyphicon glyphicon-collapse-down"></span>&nbspEdit Privileges</button>';
				echo '<form name="change_privs" id ="change_privs" action="list_profile.php?parameter='.$arg.'" method="POST">';
				echo '<hr>';
				echo '<div class="form-group">';
				echo '<label>Privileges: </label>';
				echo '<br>';
				$sql = "SELECT * FROM login WHERE Emp_Id=$id";
				$result = $conn->query($sql);
				$row = mysqli_fetch_assoc($result);
				$priv[0] = $row["P1"];
				$priv[1] = $row["P2"];
				$priv[2] = $row["P3"];
				$priv[3] = $row["P4"];
				$priv[4] = $row["P5"];

				if(($priv[0]) == 'FALSE')
					echo '<input type="checkbox" class="checkbox-inline" name="priv0" value="TRUE">&nbspProfile</input><br>';
				else
					echo '<input type="checkbox" checked class="checkbox-inline" name="priv0" value="TRUE">&nbspProfile</input><br>';
				if(($priv[1]) == 'FALSE')
					echo '<input type="checkbox" class="checkbox-inline" name="priv1" value="TRUE">&nbspView And Edit Privileges</input><br>';
				else
					echo '<input type="checkbox" checked class="checkbox-inline" name="priv1" value="TRUE">&nbspView And Edit Privileges</input><br>';
				if(($priv[2]) == 'FALSE')
					echo '<input type="checkbox" class="checkbox-inline" name="priv2" value="TRUE">&nbspAdd Faculty</input><br>';
				else
					echo '<input type="checkbox" checked class="checkbox-inline" name="priv2" value="TRUE">&nbspAdd Faculty</input><br>';
				if(($priv[3]) == 'FALSE')
					echo '<input type="checkbox" class="checkbox-inline" name="priv3" value="TRUE">&nbspReport Generation</input><br>';
				else
					echo '<input type="checkbox" checked class="checkbox-inline" name="priv3" value="TRUE">&nbspReport Generation</input><br>';
				if(($priv[4]) == 'FALSE')
					echo "<input type='checkbox' class='checkbox-inline' name='priv4' value='TRUE'>&nbspGenerate Faculty CV's</input><br>";
				else
					echo "<input type='checkbox' checked class='checkbox-inline' name='priv4' value='TRUE'>&nbspGenerate Faculty CV's</input><br>";
				echo '</div>';
				echo '<div class="form-group">';
				echo '<input type="submit" class="btn btn-primary" name="submit" value="Change Privilege" />';
				echo '</div>';
				echo '</form>';
			}
			?>
        </div>
    </div>
</div>
</body>
</html>
