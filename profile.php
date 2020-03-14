<?php
include 'profile_php.php';

function dateformatChanger($orgDate){
	return date("d-m-Y", strtotime($orgDate));
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Profile : <?php echo $empid; ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href='https://fonts.googleapis.com/css?family=NTR' rel='stylesheet'>
    <style>
        body{

            position: relative;
        }
        th, td {
            padding: 25px;
            text-align: : center;
        }
        ul.nav-pills {
            position:fixed;
        }
        .navbar {
            border : none;
            background-color: #1F54AB;
            color:white;
            border-radius : 0px;
            width : 100%;
        }

        .navbar li a
        {
            color: #fff !important;
            position : relative;
        }

        #gly{
            font-size:25px;
        }

        .sabserial{
            width : 150px;
        }

        #tdwid{
            width : 100px;
        }

        @media screen and (max-width:1100px) {
            #section00, #section1, #section2, #section3, #section41, #section42 ,#section43, #section51, #section52, #section53 , #section6 , #section7,#section8 {
                margin-left:100px;
            }
        }
        .btn btn-primary btn-md{
            float:right;
        }
        .modal-dialog{
            width : 375px;
        }
        h1{
            font-size:45px;
        }
        h2{
            font-size:30px;
        }
        ::-webkit-scrollbar{
            width : 7px;
            height : 7px;
        }

        ::-webkit-scrollbar-thumb {
            background: #1F54AB;
            border-radius : 30px;
            width : 10px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #1F54AB;
            border-radius : 30px
        }

        .glyphicon{
            float :  right;
            font-size : 20px;
        }
        #chngpropic
        {
            outline:0;
        }
        #setbtn
        {
            background-color : #1F54AB;
            margin-top:9px;
            border : none;
            font-size : 20px;
            outline : 0;
        }

        #navleft
        {
            color : white;
            margin-top : 1%;
            font-size : 18px;
        }
    </style>
    <script language="javascript" type="text/javascript">
        function dynamicdropdown(listindex)
        {
            document.getElementById("subcategory").length = 0;
            switch (listindex)
            {
                case "UG" :
                    document.getElementById("subcategory").options[0]=new Option("Please select UG course","");
                    document.getElementById("subcategory").options[1]=new Option("UG1","UG1");
                    document.getElementById("subcategory").options[2]=new Option("UG2","UG2");
                    document.getElementById("subcategory").options[3]=new Option("UG3","UG3");
                    document.getElementById("subcategory").options[4]=new Option("UG4","UG4");
                    document.getElementById("subcategory").options[5]=new Option("UG5","UG5");
                    break;

                case "PG" :
                    document.getElementById("subcategory").options[0]=new Option("Please select PG course","");
                    document.getElementById("subcategory").options[1]=new Option("PG1","PG1");
                    document.getElementById("subcategory").options[2]=new Option("PG2","PG2");
                    break;
                case "Labcourses" :
                    document.getElementById("subcategory").options[0]=new Option("Please select lab course","");
                    document.getElementById("subcategory").options[1]=new Option("LB1","LB1");
                    document.getElementById("subcategory").options[2]=new Option("LB2","LB2");
                    document.getElementById("subcategory").options[3]=new Option("LB3","LB3");
                    document.getElementById("subcategory").options[4]=new Option("LB4","LB4");
                    document.getElementById("subcategory").options[5]=new Option("LB5","LB5");
                    break;
                case "AC" :
                    document.getElementById("subcategory").options[0]=new Option("Please select audit course","");
                    document.getElementById("subcategory").options[1]=new Option("AC1","AC1");
                    document.getElementById("subcategory").options[2]=new Option("AC2","AC2");
                    document.getElementById("subcategory").options[3]=new Option("AC3","AC3");
                    break;
                case "IDC" :
                    document.getElementById("subcategory").options[0]=new Option("Please select IDC","");
                    document.getElementById("subcategory").options[1]=new Option("IDC1","IDC1");
                    document.getElementById("subcategory").options[2]=new Option("IDC2","IDC2");
                    document.getElementById("subcategory").options[3]=new Option("IDC3","IDC3");
                    break;
            }
            return true;
        }
    </script>
    <script>
        $(document).Viewy(function () {
            $('img').on('click', function () {
                var image = $(this).attr('src');
                $('#myModal2').on('show.bs.modal', function () {
                    $(".showimage").attr("src", image);
                });
            });
        });
    </script>
</head>
<body data-spy="scroll" data-target="#myScrollspy" data-offset="20">
<?php include 'Decision1.php'; ?>
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="nav navbar-nav navbar-left" id ="navleft">

            <b>Employee ID : <?php echo $empid ;include 'Decision1.php';

				$sql1 = "SELECT * FROM edit WHERE Emp1_Id=$empid";
				$result1 = $conn->query($sql1);

				if($result1)
				{
					$rows = mysqli_num_rows($result1);
					if($rows)
					{
						$i=0;
						echo ' || Assigned Rights of: ';
						while($row1 = mysqli_fetch_assoc($result1))
						{
							$i++;
							$emp2_id = $row1["Emp2_Id"];
							$date = $row1["Date"];
							if($i==$rows)
								echo $emp2_id. ' till ' .dateformatChanger($date);
							else
								echo $emp2_id. ' till ' .dateformatChanger($date).' & ';
						}
					}
				}
				?>
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
                <li><a style="color:white" href="CV.php?parameter=<?php echo $arg; ?>">Generate CV</a></li>
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
<nav class="col-sm-3 col-lg-2 col-md-4 col-xs-3" id ="myScrollspy">
    <ul class="nav nav-pills nav-stacked" style="background-color: #F7F7F7; border-radius :7px; border:0.4px solid light-grey; padding:10px">
        <li><center>PROFILE</center></li>
        <li id ="sectionA"><a href="#section1">Personal Details</a></li>
        <li id ="sectionB"><a href="#section2">Academic Qualifications</a></li>
        <li id ="sectionC"><a href="#section3">Courses Taught</a></li>
        <li id ="sectionH"><a href="#section4">Projects Guided</a></li>
        <li id ="sectionD" class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Publications<span class="caret"></span></a>
            <ul class="dropdown-menu">
                <li id ="sectionD1"><a href="#section41">Books</a></li>
                <li id ="sectionD2"><a href="#section42">Journals</a></li>
                <li id ="sectionD3"><a href="#section43">Conferences</a></li>
            </ul>
        </li>
        <li id ="sectionE" class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#" title="Short Term Training Program">STTP<span class="caret"></span></a>
            <ul class="dropdown-menu">
                <li id ="sectionE1"><a href="#section51">Attended</a></li>
                <li id ="sectionE2"><a href="#section52">Organised</a></li>
                <li id ="sectionE3"><a href="#section53">Delivered</a></li>
            </ul>
        </li>
        <li id ="sectionF"><a href="#section6">Co curricular activities</a></li>
        <li id ="sectionG"><a href="#section7">Extra curricular activities</a></li>
        <li><a href="#awards">Awards and Achievements</a></li>
        <hr>
        <li id ="sectionW"><a href="main.php#section21">Faculty List</a></li>
        <li id ="sectionX"><a href="main.php#section24">Assign Profile Rights</a></li>
        <li class="section25" id="sectionV"><a href="main.php#section25">Add Member</a></li>
		<?php if($_SESSION['admin']==1) echo '<li id ="sectionY"><a href="main.php#section22">Admin Control</a></li>';?>
        <li class="section23" id ="sectionZ"><a href="main.php#section23">Report Generation</a></li>
    </ul>
</nav>
<!-- Modal -->
<div class="modal fade" id ="myModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                Change Profile Photo
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <center>
                    <div class="thumbnail img-responsive" style="height:100%; width:80%;">
						<?php echo '<img  src="data:image/jpeg;base64,'.base64_encode($profilepic).'"/>';?>
                    </div>
                    <br><br>
                    <form method="post" action="" enctype="multipart/form-data">
                        <input type="file" class="proimg" name="image" id ="image" accept="image/x-png,image/jpeg" style="font-size:15px;">
                        <br><br>
                        <input type="submit" name="submitprofile" id ="insert_profile" value="Save Changes"  class="btn btn-primary">
                    </form>
                </center>
            </div>
        </div>
    </div>
</div>
<!-- TABlE PICTURES MODAL -->
<div id ="myModal2" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <img class="showimage img-responsive" src="" />
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="col-sm-9 col-lg-10 col-md-8 col-xs-9">
        <div  id ="section1">
            <div class="col-sm-12 col-lg-12 col-md-12 col-xs-12">
                <div class="col-sm-8 col-lg-8 col-md-8 col-xs-8">
                    <h1>Personal details  <a href="homepage.php#section1"><span class="glyphicon glyphicon-edit"></span></a></h1>
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                            <tr>
                                <td>Name: </td><td><?php if(!($name == '')) echo "<b>$name</b>"; else echo "<b>-<b>";?></td>
                            </tr>

                            <tr>
                                <td>Gender: </td><td><?php if(!($gender == 'null')) echo "<b>$gender</b>"; else echo "<b>-<b>";?></td>
                            </tr>

                            <tr>
                                <td>Email: </td><td><?php if(!($email == '')) echo "<b>$email</b>"; else echo "<b>-<b>";?></td>
                            </tr>

                            <tr>
                                <td>Contact no: </td><td><?php if(!($contact == '')) echo "<b>$contact</b>"; else echo "<b>-<b>";?></td>
                            </tr>

                            <tr>
                                <td>Date of Birth: </td><td><?php if(!($dob == '1950-01-01'))
										echo "<b>".dateformatChanger($dob)."</b>"; else echo "<b>-<b>";?></td>
                            </tr>

                            <tr>
                                <td>Address: </td><td><?php if(!($address == '')) echo "<b>$address</b>"; else echo "<b>-<b>";?></td>
                            </tr>

                            <tr>
                                <td>Joining Position: </td><td><?php if(!($join_pos == '')) echo "<b>".$join_pos."</b>"; else echo "<b>-<b>";?><br></td>
                            </tr>

                            <tr>
                                <td>Joining Date: </td><td><?php if(!($join_date == '1950-01-01')) echo "<b>".dateformatChanger($join_date)."</b>"; else echo "<b>-<b>";?></td>
                            </tr>
							<?php
							$new_field_query="select * from new_fields where table_name='personal_details'";
							$result=$conn->query($new_field_query);
							if($result->num_rows>0){
								while($row=$result->fetch_assoc()) {
									$field_name = $row['field_name'];
									$label = $row['label'];
									$display = $row['display'];
									if($display==1) {
										$table_sql = "select $field_name from personal_details where emp3_id=$empid";
										$tab_res = $conn->query($table_sql);
										if ($tab_res->num_rows > 0) {
											$tab_row = $tab_res->fetch_assoc();
											$new_field=$tab_row[$field_name];
											if($new_field!=null) {
												echo "<tr>
                                                    <td>" . $label . ":</td><td><b>" . $new_field . "</b></td>
                                                </tr>";
											}else{
												echo "<tr>
                                                    <td>" . $label . ":</td><td><b>-</b></td>
                                                </tr>";
											}
										}
									}
								}
							}
							?>
                            <tr><td></td><td></td></tr>
                            </tbody>
                        </table>
                        <h2>Promotions</h2>
                        <table class="table">
                            <tbody>
                            <tr>
                                <td>Promotion : </td><td><?php if(!($pro1 == '')) echo "<b>$pro1</b>"; else echo "<b>-<b>";?></td>
                            </tr>
                            <tr>
                                <td>With Effective From: </td><td><?php if(!($pro1_date == '1950-01-01')) echo "<b>".dateformatChanger($pro1_date)."</b>"; else echo "<b>-<b>";?></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-sm-4 col-lg-4 col-md-4 col-xs-4">
                    <div class="profile-img" id ="section00" >
                        <a href="#" id ="chngpropic" class="btn btn-sm editimgbtn" style="float:right;" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-edit"></span></a>
                        <center>
                            <div class="thumbnail img-responsive" style="height:100%; width:80%;">
								<?php echo '<img class="proimg" src="data:image/jpeg;base64,'.base64_encode($profilepic).'"/>';?>
                            </div>
                            <br>
                        </center>
                    </div>
                </div>
            </div>
        </div>
        &nbsp
        <div id = "section2">
            <legend><h1>Academic Details<a href="homepage.php#section2"><span class="glyphicon glyphicon-edit"></span></a></h1></legend>
			<?php
			if(!empty($sscInstitute) || !empty($hscInstitute) || !empty($bachelorsInstitute) || !empty($mastersInstitute) || !empty($phdInstitute))
			{
				echo "<div class='table-responsive '>";
				echo "<table class='table table-bordered'cellpadding='10'>";
				echo "<tr>";
				echo "<th>Sr No</th>";
				echo "<th>Edit</th>";
				echo "<th>Qualification</th>";
				echo "<th>Institute</th>";
				echo "<th>Percentile/CGPA</th>";
				echo "<th>Year Of Passing</th>";
				echo "<th>Marksheet</th>";
				echo "</tr>";
				$count=1;
				if(!empty($sscInstitute)){
					echo "<tr><td>$count</td><td><a href='homepage.php#section2'><span class='glyphicon glyphicon-edit'></span></a></td>";
					echo "<td>SSC</td><td>";
					echo "$sscInstitute";
					echo "</td><td>";
					echo "$sscPercentile";
					echo "</td><td>";
					echo "$sscYear";
					echo "</td><td><center>".$ssc."</center></td></tr>";
					$count++;
				}

				if(!empty($hscInstitute)){
					echo "<tr><td>$count</td><td><a href='homepage.php#hscnew'><span class='glyphicon glyphicon-edit'></span></a></td>";
					echo "<td>HSC</td><td>";
					echo "$hscInstitute";
					echo "</td><td>";
					echo "$hscPercentile";
					echo "</td><td>";
					echo "$hscYear";
					echo "</td><td><center>".$hsc."</center></td></tr>";
					$count++;
				}
				if(!empty($bachelorsInstitute)){
					echo "<tr><td>$count</td><td><a href='homepage.php#degree'><span class='glyphicon glyphicon-edit'></span></a></td>";
					echo "<td>Bachelors In $bachelorsIn</td><td>";
					echo "$bachelorsInstitute";
					echo "</td><td>";
					echo "$bachelorsPercentile";
					echo "</td><td>";
					echo "$bachelorsYear";
					echo "</td><td><center>".$bach."</center></td></tr>";
					$count++;
				}
				if(!empty($mastersInstitute)){
					echo "<tr><td>$count</td><td><a href='homepage.php#masters'><span class='glyphicon glyphicon-edit'></span></a></td>";
					echo "<td>Masters In $mastersIn</td><td>";
					echo "$mastersInstitute";
					echo "</td><td>";
					echo "$mastersPercentile";
					echo "</td><td>";
					echo "$mastersYear";
					echo "</td><td><center>".$mast."</center></td></tr>";
					$count++;
				}
				if(!empty($phdInstitute)){
					echo "<tr><td>$count</td><td><a href='homepage.php#phd'><span class='glyphicon glyphicon-edit'></span></a></td>";
					echo "<td>Phd In $phdIn</td><td>";
					echo "$phdInstitute";
					echo "</td><td>";
					echo "$phdPercentile";
					echo "</td><td>";
					echo "$phdYear";
					echo "</td><td><center>".$phdi."</center></td></tr>";
					$count++;
				}
				echo "</table>";
				echo "</div>";
			}
			else
				echo "<h4>Details Not Filled</h4>";
			?>
        </div>
        <div id ="section3">
            <legend><h1>Courses Taught<a href="homepage.php#section3"><span id ="gly" class="glyphicon glyphicon-plus-sign"></span></a></h1></legend>
			<?php
			if($temp>0)
			{
				echo "<div class='table-responsive'>";
				echo "<table class='table table-bordered'>";
				echo "<tr>";
				echo "<th>Sr.No.</th>";
				echo "<th colspan='2'><center>Options</center></th>";
				echo "<th>Course Category</th>";
				echo "<th>Course Id</th>";
				echo "<th>Year</th>";
				echo "<th>Semester</th>";
				$new_field_query = "select * from new_fields where table_name='courses'";
				$result = $conn->query($new_field_query);
				if ($result->num_rows > 0) {
					while ($row = $result->fetch_assoc()) {
						$field_name = $row['field_name'];
						$label = $row['label'];
						$display = $row['display'];
						if ($display == 1) {
							echo "<th>".$label."</th>";
						}
					}
				}
				echo "</tr>";
				for($i=0;$i<$temp;$i++){
					$myData = array('val'=>1, 'id'=>$i);
					$GLOBALS['course_id']=$course_taught_id[$i];
					$arg = base64_encode( json_encode($myData) );
					echo "<tr><td>".($i+1)."</td><td><a href='editpage.php?parameter=".$arg."'><span class='glyphicon glyphicon-edit'>&nbsp</span></a><td><a href='deleteform.php?parameter=".$arg."'><span class='glyphicon glyphicon-trash'></span></a></td></td>";
					if($coursecategory[$i] != "") echo "<td>".$coursecategory[$i]."</td>"; else echo "-";
					if($courseid[$i] != "") echo "<td>".$courseid[$i]."</td>"; else echo "-";
					if($courseyear[$i] != "") echo "<td>".$courseyear[$i]."</td>"; else echo "-";
					if($coursesem[$i] != "") echo "<td>".$coursesem[$i]."</td>"; else echo "-";
					$new_field_query = "select * from new_fields where table_name='courses'";
					$result = $conn->query($new_field_query);
					if ($result->num_rows > 0) {
						while ($row = $result->fetch_assoc()) {
							$field_name = $row['field_name'];
							$label = $row['label'];
							$display = $row['display'];
							if ($display == 1) {
								$table_sql = "select $field_name from courses where emp8_id=$empid and course_taught_id='".$GLOBALS['course_id']."'";
								$tab_res = $conn->query($table_sql);
								if ($tab_res->num_rows > 0) {
									$tab_row = $tab_res->fetch_assoc();
									$new_field = $tab_row[$field_name];
									if($new_field!=null)
										echo "<td>".$new_field."</td>";
									else
										echo "<td>-</td>";
								}
							}
						}
					}
					echo "</tr>";
				}
				echo "</table>";
				echo "</div>";
			}
			else
				echo "<h4>No Courses Registered</h4>";
			?>

        </div>

        <div id = "section4">
            <legend><h1>Projects Guided  <a href="homepage.php#section4"><span id ="gly" class="glyphicon glyphicon-plus-sign"></span></a></h1></legend>

			<?php
			$sql="SELECT * FROM projects WHERE Emp12_Id=$empid";
			$result=$conn->query($sql);
			if(mysqli_num_rows($result) > 0)
			{
				echo "<div class='table-responsive '>";
				$projects=1;
				echo "<table class='table table-bordered'>";
				echo "<tr>";
				echo "<th>Sr.No.</th>";
				echo "<th colspan='2'>Options</th>";
				echo "<th>Title</th>";
				echo "<th>Description</th>";
				echo "<th>Type</th>";
				echo "<th>Year</th>";
				echo "<th>Student Details</th>";
				$new_field_query = "select * from new_fields where table_name='projects'";
				$new_result = $conn->query($new_field_query);
				if ($new_result->num_rows > 0) {
					while ($row = $new_result->fetch_assoc()) {
						$field_name = $row['field_name'];
						$label = $row['label'];
						$display = $row['display'];
						if ($display == 1) {
							echo "<th>".$label."</th>";
						}
					}
				}
				echo "</tr>";
				while($row=mysqli_fetch_assoc($result))
				{
					$j=1;
					$GLOBALS['proj_title']=$row['Title'];
					$myData = array('val'=>2, 'id'=>($projects-1));
					$arg = base64_encode( json_encode($myData) );
					echo '<tr><td>'.$projects.'</td><td><a href="editpage.php?parameter='.$arg.'"><span class="glyphicon glyphicon-edit">&nbsp</span></a><td><a href="deleteform.php?parameter='.$arg.'"><span class="glyphicon glyphicon-trash"></span></a></td></td>';
					if($row["Title"] == "") echo "<td>-</td>"; else echo '<td>'.$row["Title"].'</td>';
					if($row["Description"] == null) echo "<td>-</td>"; else echo '<td>'.$row["Description"].'</td>';
					if($row["Type"] == "") echo "<td>-</td>"; else echo '<td>'.$row["Type"].'</td>';
					if($row["Year"] == "null") echo "<td>-</td>"; else echo '<td>'.$row["Year"].'</td>';
					if(!((trim($row["S1_name"])=="")&&(trim($row["S1_roll"])=="")&&(trim($row["S1_email"])=="")&&(trim($row["S2_name"])=="")&&(trim($row["S2_roll"])=="")&&(trim($row["S2_email"])=="")
						&&(trim($row["S3_name"])=="")&&(trim($row["S3_roll"])=="")&&(trim($row["S3_email"])=="")&&(trim($row["S4_name"])=="")&&(trim($row["S4_roll"])=="")&&(trim($row["S4_email"])=="")))
					{
						echo "<td>";
						echo "<div class='table-responsive'>";
						echo "<table class='table table-bordered'>";
						echo "<tr>";
						echo "<th>Sr.No.</th>";
						echo "<th>Name</th>";
						echo "<th>Roll Number</th>";
						echo "<th>Email</th>";
						echo "</tr>";
						if((trim($row["S1_name"])!="")||(trim($row["S1_roll"])!="")||(trim($row["S1_email"])!="")){
							echo '<tr><td>1</td>';
							if($row["S1_name"] != "") echo '<td>'.$row["S1_name"].'</td>';else echo "<td>-</td>";
							if($row["S1_roll"] != "") echo '<td>'.$row["S1_roll"].'</td>';else echo "<td>-</td>";
							if($row["S1_email"] != "") echo '<td>'.$row["S1_email"].'</td></tr>';else echo "<td>-</td>";
						}
						if((trim($row["S2_name"])!="")||(trim($row["S2_roll"])!="")||(trim($row["S2_email"])!=""))
						{
							echo '<tr><td>1</td>';
							if($row["S2_name"] != "") echo '<td>'.$row["S2_name"].'</td>';else echo "<td>-</td>";
							if($row["S2_roll"] != "") echo '<td>'.$row["S2_roll"].'</td>';else echo "<td>-</td>";
							if($row["S2_email"] != "") echo '<td>'.$row["S2_email"].'</td></tr>';else echo "<td>-</td>";
						}
						if((trim($row["S3_name"])!="")||(trim($row["S3_roll"])!="")||(trim($row["S3_email"])!=""))
						{
							echo '<tr><td>1</td>';
							if($row["S3_name"] != "") echo '<td>'.$row["S3_name"].'</td>';else echo "<td>-</td>";
							if($row["S3_roll"] != "") echo '<td>'.$row["S3_roll"].'</td>';else echo "<td>-</td>";
							if($row["S3_email"] != "") echo '<td>'.$row["S3_email"].'</td></tr>';else echo "<td>-</td>";
						}
						if((trim($row["S4_name"])!="")||(trim($row["S4_roll"])!="")||(trim($row["S4_email"])!=""))
						{
							echo '<tr><td>1</td>';
							if($row["S4_name"] != "") echo '<td>'.$row["S4_name"].'</td>';else echo "<td>-</td>";
							if($row["S4_roll"] != "") echo '<td>'.$row["S4_roll"].'</td>';else echo "<td>-</td>";
							if($row["S4_email"] != "") echo '<td>'.$row["S4_email"].'</td></tr>';else echo "<td>-</td>";
						}
						echo "</table>";
						echo '</div>';
						echo "</td>";
					}
					else {
						echo "<td><center>Details Not Filled</center></td>";
					}
					$new_field_query = "select * from new_fields where table_name='projects'";
					$newresult = $conn->query($new_field_query);
					if ($newresult->num_rows > 0) {
						while ($row = $newresult->fetch_assoc()) {
							$field_name = $row['field_name'];
							$label = $row['label'];
							$display = $row['display'];
							if ($display == 1) {
								$table_sql = "select $field_name from projects where emp12_id=$empid and title='".$GLOBALS['proj_title']."'";
								$tab_res = $conn->query($table_sql);
								if ($tab_res->num_rows > 0) {
									$tab_row = $tab_res->fetch_assoc();
									$new_field = $tab_row[$field_name];
									if($new_field!=null)
										echo "<td>".$new_field."</td>";
									else
										echo "<td>-</td>";
								}
							}
						}
					}
					echo "</tr>";
					$projects++;
				}
				echo "</table>";
				echo "</div>";
			}

			?>
        </div>

        <div id ="section41">

            <legend><h1>Publications</span></h1></legend>
            <legend><h2>Books  <a href="homepage.php#section41"><span id ="gly" class="glyphicon glyphicon-plus-sign"></span></a></h2></legend>
			<?php
			$sql="SELECT * FROM publication_books WHERE Emp1_Id=$empid";
			$result=$conn->query($sql);
			if(mysqli_num_rows($result) > 0)
			{
				echo "<div class='table-responsive '>";
				$pubbooks=1;
				echo "<table class='table table-bordered'>";
				echo "<tr>";
				echo "<th>Sr.No.</th>";
				echo "<th colspan='2'>Options</th>";
				echo "<th>Book Name</th>";
				echo "<th>ISBN</th>";
				echo "<th>Published By</th>";
				echo "<th>Date Published</th>";
				echo "<th>Author</th>";
				echo "<th>Author Institute</th>";
				echo "<th>Co Authors</th>";
				echo "<th>Edition</th>";
				echo "<th>Cover Picture</th>";
				$new_field_query = "select * from new_fields where table_name='publication_books'";
				$new_result = $conn->query($new_field_query);
				if ($new_result->num_rows > 0) {
					while ($row = $new_result->fetch_assoc()) {
						$field_name = $row['field_name'];
						$label = $row['label'];
						$display = $row['display'];
						if ($display == 1) {
							echo "<th>".$label."</th>";
						}
					}
				}
				echo "</tr>";
				while($row=mysqli_fetch_assoc($result))
				{
					if($row["Cover"] == null)
						$coverbook="PDF Not Inserted";
					else
					{
						$myData1 = array('pub'=>'b','academic'=>'','sttp'=>'','awd'=>'','cid'=>($pubbooks-1));
						$arg1 = base64_encode( json_encode($myData1) );
						$coverbook='<a href="showpdf.php?parameter='.$arg1.'">View</a>';
					}
					$myData = array('val'=>3,'id'=>($pubbooks-1));
					$arg = base64_encode( json_encode($myData) );
					$GLOBALS['isbn']=$row['ISBN'];
					echo '<tr><td>'.$pubbooks.'</td><td><a href="editpage.php?parameter='.$arg.'"><span class="glyphicon glyphicon-edit">&nbsp</span></a></td><td><a href="deleteform.php?parameter='.$arg.'"><span class="glyphicon glyphicon-trash"></span></a></td>';
					if($row["Book_Name"] != "") echo '<td>'.$row["Book_Name"].'</td>';else echo "<td>-</td>";
					if($row["ISBN"] != "") echo '<td>'.$row["ISBN"].'</td>';else echo "<td>-</td>";
					if($row["Publisher_Name"] != "") echo '<td>'.$row["Publisher_Name"].'</td>';else echo "<td>-</td>";
					if($row["Date_Published"] != "") echo '<td>'.dateformatChanger($row["Date_Published"]).'</td>';else echo "<td>-</td>";
					if($row["Author"] != "") echo '<td>'.$row["Author"].'</td>';else echo "<td>-</td>";
					if($row["Author_INST"] != "") echo '<td>'.$row["Author_INST"].'</td>';else echo "<td>-</td>";
					echo '<td>';
					if( ($row["COA1"] == "") && ($row["COA2"] == "") && ($row["COA3"] == "") )
						echo "Data Not Available";
					else {
						echo "<div class='table-responsive '>";
						echo '<table class="table table-bordered">';

						echo '<tr>';
						echo '<th>Sr no.</th>';
						echo '<th>Name</th>';
						echo '<th>Institute</th>';
						echo '</tr>';
						if($row["COA1"] != ""){
							echo '<tr><td>1</td><td>'.$row["COA1"].'</td>';
							if($row["COA1_INST"] ==  '')
								echo "<td> - </td>";
							else
								echo "<td>".$row["COA1_INST"]."</td>";
							echo '</tr>';
						}
						if($row["COA2"] != ""){
							echo '<tr><td>2</td><td>'.$row["COA2"].'</td>';
							if($row["COA2_INST"] ==  '')
								echo "<td> - </td>";
							else
								echo "<td>".$row["COA2_INST"]."</td>";
							echo '</tr>';
						}
						if($row["COA3"] != ""){
							echo '<tr><td>3</td><td>'.$row["COA3"].'</td>';
							if($row["COA3_INST"] ==  '')
								echo "<td> - </td>";
							else
								echo "<td>".$row["COA3_INST"]."</td>";
							echo '</tr>';
						}
						echo '</table>';
						echo '</div>';
					}
					echo '</td>';
					if($row["Edition"] != "") echo '<td>'.$row["Edition"].'</td>';else echo "<td>-</td>";
					echo '<td><center>'.$coverbook.'</center></td>';
					$new_field_query = "select * from new_fields where table_name='publication_books'";
					$newresult = $conn->query($new_field_query);
					if ($newresult->num_rows > 0) {
						while ($row = $newresult->fetch_assoc()) {
							$field_name = $row['field_name'];
							$label = $row['label'];
							$display = $row['display'];
							if ($display == 1) {
								$table_sql = "select $field_name from publication_books where emp1_id=$empid and isbn='".$GLOBALS['isbn']."'";
								$tab_res = $conn->query($table_sql);
								if ($tab_res->num_rows > 0) {
									$tab_row = $tab_res->fetch_assoc();
									$new_field = $tab_row[$field_name];
									if($new_field!=null)
										echo "<td>".$new_field."</td>";
									else
										echo "<td>-</td>";
								}
							}
						}
					}
					echo '</tr>';

					$pubbooks++;
				}

				echo "</table>";
				echo "</div>";
			}
			else
				echo "<h4>No Books Published</h4>";
			?>

        </div>

        <div id ="section42">

            <legend><h2>Journals <a href="homepage.php#section42"><span id ="gly" class="glyphicon glyphicon-plus-sign"></span></a></h2></legend>
			<?php
			$sql="SELECT * FROM publication_journals WHERE Emp4_Id=$empid";
			$result=$conn->query($sql);
			if(mysqli_num_rows($result) > 0)
			{
				echo "<div class='table-responsive'>";
				$pubjour=1;
				echo "<table class='table table-bordered' border='1px' width='100%'>";
				echo "<tr>";
				echo "<th>Sr.No.</th>";
				echo "<th colspan='2'>Option</th>";
				echo "<th>Journal Name</th>";
				echo "<th>Author</th>";
				echo "<th>Title</th>";
				echo "<th>Date</th>";
				echo "<th>Type</th>";
				echo "<th>Co Authors</th>";
				echo "<th>Book Chapter</th>";
				echo "<th>Peer Reviewed</th>";
				echo "<th>Impact Factor</th>";
				echo "<th>Publisher Name</th>";
				echo "<th>Digital Object Identifier</th>";
				echo "<th>Volume</th>";
				echo "<th>Page Number</th>";
				echo "<th>Issue</th>";
				echo "<th>Citation Index</th>";
				echo "<th>ISSN</th>";
				echo "<th>Paid</th>";
				echo "<th>SJR</th>";
				echo "<th>Paper PDF</th>";
				echo "<th>Certificate</th>";
				$new_field_query = "select * from new_fields where table_name='publication_journals'";
				$new_result = $conn->query($new_field_query);
				if ($new_result->num_rows > 0) {
					while ($row = $new_result->fetch_assoc()) {
						$field_name = $row['field_name'];
						$label = $row['label'];
						$display = $row['display'];
						if ($display == 1) {
							echo "<th>".$label."</th>";
						}
					}
				}
				echo "</tr>";
				while($row=mysqli_fetch_assoc($result))
				{
					$c = $row["count"];
					if($row["Certificate"] == null)
						$jourcert="PDF Not Inserted";
					else
					{
						$myData1 = array('pub'=>'jcerti','academic'=>'','sttp'=>'','awd'=>'','cid'=>($pubjour-1));
						$arg1 = base64_encode( json_encode($myData1) );
						$jourcert='<a href="showpdf.php?parameter='.$arg1.'">View</a>';
					}
					if($row["Paper_PDF"] == null)
						$jourpdf="PDF Not Inserted";
					else
					{
						$myData1 = array('pub'=>'jpaper','academic'=>'','sttp'=>'','awd'=>'','cid'=>($pubjour-1));
						$arg1 = base64_encode( json_encode($myData1) );
						$jourpdf='<a href="showpdf.php?parameter='.$arg1.'">View</a>';
					}
					$myData = array('val'=>4, 'id'=>($pubjour-1));
					$arg = base64_encode( json_encode($myData) );
					echo '<tr><td>'.$pubjour.'</td><td><a href="editpage.php?parameter='.$arg.'"><span class="glyphicon glyphicon-edit">&nbsp</span></a></td><td><a href="deleteform.php?parameter='.$arg.'"><span class="glyphicon glyphicon-trash"></span></a></td>';
					if($row["Name"] != "") echo '<td>'.$row["Name"].'</td>';else echo "<td>-</td>";
					if($row["Author"] != "") echo '<td>'.$row["Author"].'</td>';else echo "<td>-</td>";
					if($row["Title"] != "") echo '<td>'.$row["Title"].'</td>';else echo "<td>-</td>";
					if($row["Date"] != "") echo '<td>'.dateformatChanger($row["Date"]).'</td>';else echo "<td>-</td>";
					if($row["Type"] != "") echo '<td>'.$row["Type"].'</td>';else echo "<td>-</td>";
					echo '<td>';
					if($c == 0)
						echo "<center>Data Not Inserted</center>";
					else{
						echo "<div class='table-responsive'>";
						echo "<table class='table table-bordered' border='1px' width='100%'>";
						echo "<tr>";
						echo "<th class='sabserial'>Sr.No.</th>";
						echo "<th>Name</th>";
						echo "<th>Affiliation</th>";
						echo "</tr>";
						for($i=1;$i<=$c;$i++){
							if($i==1){
								echo '<tr><td>1</td>';
								if($row["COA_1"] != "") echo '<td>'.$row["COA_1"].'</td>';else echo "<td>-</td>";
								if($row["COA1_AFF"] != " ") echo '<td>'.$row["COA1_AFF"].'</td>';else echo "<td>-</td>";
								echo '</tr>';
							}
							if($i==2){
								echo '<tr><td>2</td>';
								if($row["COA_2"] != "") echo '<td>'.$row["COA_2"].'</td>';else echo "<td>-</td>";
								if($row["COA2_AFF"] != " ") echo '<td>'.$row["COA2_AFF"].'</td>';else echo "<td>-</td>";
								echo '</tr>';
							}
							if($i==3){
								echo '<tr><td>3</td>';
								if($row["COA_3"] != "") echo '<td>'.$row["COA_3"].'</td>';else echo "<td>-</td>";
								if($row["COA3_AFF"] != " ") echo '<td>'.$row["COA3_AFF"].'</td>';else echo "<td>-</td>";
								echo '</tr>';
							}
							if($i==4){
								echo '<tr><td>4</td>';
								if($row["COA_4"] != "") echo '<td>'.$row["COA_4"].'</td>';else echo "<td>-</td>";
								if($row["COA4_AFF"] != " ") echo '<td>'.$row["COA4_AFF"].'</td>';else echo "<td>-</td>";
								echo '</tr>';
							}
							if($i==5){
								echo '<tr><td>5</td>';
								if($row["COA_5"] != "") echo '<td>'.$row["COA_5"].'</td>';else echo "<td>-</td>";
								if($row["COA5_AFF"] != " ") echo '<td>'.$row["COA5_AFF"].'</td>';else echo "<td>-</td>";
								echo '</tr>';
							}
							if($i==6){
								echo '<tr><td>6</td>';
								if($row["COA_6"] != "") echo '<td>'.$row["COA_6"].'</td>';else echo "<td>-</td>";
								if($row["COA6_AFF"] != " ") echo '<td>'.$row["COA6_AFF"].'</td>';else echo "<td>-</td>";
								echo '</tr>';
							}
							if($i==7){
								echo '<tr><td>7</td>';
								if($row["COA_7"] != "") echo '<td>'.$row["COA_7"].'</td>';else echo "<td>-</td>";
								if($row["COA7_AFF"] != " ") echo '<td>'.$row["COA7_AFF"].'</td>';else echo "<td>-</td>";
								echo '</tr>';
							}
							if($i==8){
								echo '<tr><td>8</td>';
								if($row["COA_8"] != "") echo '<td>'.$row["COA_8"].'</td>';else echo "<td>-</td>";
								if($row["COA8_AFF"] != " ") echo '<td>'.$row["COA8_AFF"].'</td>';else echo "<td>-</td>";
								echo '</tr>';
							}
							if($i==9){
								echo '<tr><td>9</td>';
								if($row["COA_9"] != "") echo '<td>'.$row["COA_9"].'</td>';else echo "<td>-</td>";
								if($row["COA9_AFF"] != " ") echo '<td>'.$row["COA9_AFF"].'</td>';else echo "<td>-</td>";
								echo '</tr>';
							}
							if($i==10){
								echo '<tr><td>10</td>';
								if($row["COA_10"] != "") echo '<td>'.$row["COA_10"].'</td>';else echo "<td>-</td>";
								if($row["COA10_AFF"] != " ") echo '<td>'.$row["COA10_AFF"].'</td>';else echo "<td>-</td>";
								echo '</tr>';
							}
						}
						echo "</table>";
						echo "</div>";
					}
					echo '</td>';
					$GLOBALS['issn']=$row['ISSN'];
					if($row["Book_Chapter"] != "") echo '<td>'.$row["Book_Chapter"].'</td>';else echo "<td>-</td>";
					if($row["Peer_Reviewed"] != "") echo '<td>'.$row["Peer_Reviewed"].'</td>';else echo "<td>-</td>";
					if($row["Impact_Factor"] != 0) echo '<td>'.$row["Impact_Factor"].'</td>';else echo "<td>-</td>";
					if($row["Pub_Name"] != "") echo '<td>'.$row["Pub_Name"].'</td>';else echo "<td>-</td>";
					if($row["DOI"] != "") echo '<td>'.$row["DOI"].'</td>';else echo "<td>-</td>";
					if($row["Volume"] != "") echo '<td>'.$row["Volume"].'</td>';else echo "<td>-</td>";
					if($row["PageNo"] != "") echo '<td>'.$row["PageNo"].'</td>';else echo "<td>-</td>";
					if($row["Issue"] != "") echo '<td>'.$row["Issue"].'</td>';else echo "<td>-</td>";
					if($row["Citation"] != 0) echo '<td>'.$row["Citation"].'</td>';else echo "<td>-</td>";
					if($row["ISSN"] != "") echo '<td>'.$row["ISSN"].'</td>';else echo "<td>-</td>";
					if($row["Paid"] != "") echo '<td>'.$row["Paid"].'</td>';else echo "<td>-</td>";
					if($row["SJR"] != "") echo '<td>'.$row["SJR"].'</td>';else echo "<td>-</td>";
					echo '<td><center>'.$jourpdf.'</center></td>';
					echo '<td><center>'.$jourcert.'</center></td>';
					$new_field_query = "select * from new_fields where table_name='publication_journals'";
					$newresult = $conn->query($new_field_query);
					if ($newresult->num_rows > 0) {
						while ($row = $newresult->fetch_assoc()) {
							$field_name = $row['field_name'];
							$label = $row['label'];
							$display = $row['display'];
							if ($display == 1) {
								$table_sql = "select $field_name from publication_journals where emp4_id=$empid and issn='".$GLOBALS['issn']."'";
								$tab_res = $conn->query($table_sql);
								if ($tab_res->num_rows > 0) {
									$tab_row = $tab_res->fetch_assoc();
									$new_field = $tab_row[$field_name];
									if($new_field!=null)
										echo "<td>".$new_field."</td>";
									else
										echo "<td>-</td>";
								}
							}
						}
					}
					$pubjour++;
				}
				echo "</table>";
				echo "</div>";
			}
			else
				echo "<h4>No Journals Published</h4>";
			?>

        </div>

        <div id ="section43">
            <legend><h2>Conferences  <a href="homepage.php#section43"><span id ="gly" class="glyphicon glyphicon-plus-sign"></span></a></h2></legend>
			<?php
			$sql="SELECT * FROM publication_conferences WHERE Emp5_Id=$empid";
			$result=$conn->query($sql);
			if(mysqli_num_rows($result) > 0)
			{
				echo "<div class='table-responsive'>";
				$pubconf=1;
				echo "<table class='table table-bordered' border='1px' width='100%'>";
				echo "<tr>";
				echo "<th>Sr.No.</th>";
				echo "<th colspan='2'>Options</th>";
				echo "<th>Conferences Name</th>";
				echo "<th>Location</th>";
				echo "<th>Type</th>";
				echo "<th>Date</th>";
				echo "<th>Author</th>";
				echo "<th>Co Authors</th>";
				echo "<th>H Index</th>";
				echo "<th>Digital Object Identifier</th>";
				echo "<th>Publication Name</th>";
				echo "<th>Proceding Name</th>";
				echo "<th>Peer Reviewed</th>";
				echo "<th>Theme</th>";
				echo "<th>Paid</th>";
				echo "<th>Page Number</th>";
				echo "<th>ISSN</th>";
				echo "<th>Organizer</th>";
				echo "<th>Presented</th>";
				echo "<th>Presentation</th>";
				echo "<th>Presentation Document</th>";
				echo "<th>Web</th>";
				echo "<th>Citation</th>";
				echo "<th>Paper PDF</th>";
				echo "<th>Certificate</th>";
				$new_field_query = "select * from new_fields where table_name='publication_conferences'";
				$new_result = $conn->query($new_field_query);
				if ($new_result->num_rows > 0) {
					while ($row = $new_result->fetch_assoc()) {
						$field_name = $row['field_name'];
						$label = $row['label'];
						$display = $row['display'];
						if ($display == 1) {
							echo "<th>".$label."</th>";
						}
					}
				}
				echo "</tr>";
				while($row=mysqli_fetch_assoc($result))
				{
					$c = $row["count"];

					if($row["presentation_pdf"] == null)
						$confposterpdf = "PDF not inserted";
					else
					{
						$myData1 = array('pub'=>'cposter','academic'=>'','sttp'=>'','awd'=>'','cid'=>($pubconf-1));
						$arg1 = base64_encode( json_encode($myData1) );
						$confposterpdf='<a href="showpdf.php?parameter='.$arg1.'">View</a>';
					}

					if($row["Certificate"] == null)
						$confcert="PDF Not Inserted";
					else
					{
						$myData1 = array('pub'=>'ccerti','academic'=>'','sttp'=>'','awd'=>'','cid'=>($pubconf-1));
						$arg1 = base64_encode( json_encode($myData1) );
						$confcert='<a href="showpdf.php?parameter='.$arg1.'">View</a>';
					}
					if($row["Paper_Pdf"] == null)
						$confpdf="PDF Not Inserted";
					else
					{
						$myData1 = array('pub'=>'cpaper','academic'=>'','sttp'=>'','awd'=>'','cid'=>($pubconf-1));
						$arg1 = base64_encode( json_encode($myData1) );
						$confpdf='<a href="showpdf.php?parameter='.$arg1.'">View</a>';
					}
					$myData = array('val'=>5, 'id'=>($pubconf-1));
					$arg = base64_encode( json_encode($myData) );
					echo '<tr><td>'.$pubconf.'</td><td><a href="editpage.php?parameter='.$arg.'"><span class="glyphicon glyphicon-edit">&nbsp</span></a></td><td><a href="deleteform.php?parameter='.$arg.'"><span class="glyphicon glyphicon-trash"></span></a></td>';
					if($row["Name"] != "") echo '<td>'.$row["Name"].'</td>';else echo "<td>-</td>";
					if($row["Place"] != "") echo '<td>'.$row["Place"].'</td>';else echo "<td>-</td>";
					if($row["Type"] != "") echo '<td>'.$row["Type"].'</td>';else echo "<td>-</td>";
					if($row["Date"] != "") echo '<td>'.dateformatChanger($row["Date"]).'</td>';else echo "<td>-</td>";
					if($row["Author"] != "") echo '<td>'.$row["Author"].'</td>';else echo "<td>-</td>";
					echo '<td>';

					if($c == 0)
						echo "<center>Data Not Inserted</center>";
					else{
						echo "<div class='table-responsive'>";
						echo "<table class='table table-bordered' border='1px' width='100%'>";
						echo "<tr>";
						echo "<th class='sabserial'>Sr.No.</th>";
						echo "<th>Name</th>";
						echo "<th>Affiliation</th>";
						echo "</tr>";
						for($i=1;$i<=$c;$i++){
							if($i==1){
								echo '<tr>';
								echo '<td>1</td>';
								if($row["COA1"] != "") echo '<td>'.$row["COA1"].'</td>';else echo "<td>-</td>";
								if($row["COA1_AFF"] != " ") echo '<td>'.$row["COA1_AFF"].'</td>';else echo "<td>-</td>";
								echo '</tr>';
							}
							if($i==2){
								echo '<tr>';
								echo '<td>2</td>';
								if($row["COA2"] != "") echo '<td>'.$row["COA2"].'</td>';else echo "<td>-</td>";
								if($row["COA2_AFF"] != " ") echo '<td>'.$row["COA2_AFF"].'</td>';else echo "<td>-</td>";
								echo '</tr>';
							}
							if($i==3){
								echo '<tr>';
								echo '<td>3</td>';
								if($row["COA3"] != "") echo '<td>'.$row["COA3"].'</td>';else echo "<td>-</td>";
								if($row["COA3_AFF"] != " ") echo '<td>'.$row["COA3_AFF"].'</td>';else echo "<td>-</td>";
								echo '</tr>';
							}
							if($i==4){
								echo '<tr>';
								echo '<td>4</td>';
								if($row["COA4"] != "") echo '<td>'.$row["COA4"].'</td>';else echo "<td>-</td>";
								if($row["COA4_AFF"] != " ") echo '<td>'.$row["COA4_AFF"].'</td>';else echo "<td>-</td>";
								echo '</tr>';
							}
							if($i==5){
								echo '<tr>';
								echo '<td>5</td>';
								if($row["COA5"] != "") echo '<td>'.$row["COA5"].'</td>';else echo "<td>-</td>";
								if($row["COA5_AFF"] != " ") echo '<td>'.$row["COA5_AFF"].'</td>';else echo "<td>-</td>";
								echo '</tr>';
							}
							if($i==6){
								echo '<tr>';
								echo '<td>6</td>';
								if($row["COA6"] != "") echo '<td>'.$row["COA6"].'</td>';else echo "<td>-</td>";
								if($row["COA6_AFF"] != " ") echo '<td>'.$row["COA6_AFF"].'</td>';else echo "<td>-</td>";
								echo '</tr>';
							}
							if($i==7){
								echo '<tr>';
								echo '<td>7</td>';
								if($row["COA7"] != "") echo '<td>'.$row["COA7"].'</td>';else echo "<td>-</td>";
								if($row["COA7_AFF"] != " ") echo '<td>'.$row["COA7_AFF"].'</td>';else echo "<td>-</td>";
								echo '</tr>';
							}
							if($i==8){
								echo '<tr>';
								echo '<td>8</td>';
								if($row["COA8"] != "") echo '<td>'.$row["COA8"].'</td>';else echo "<td>-</td>";
								if($row["COA8_AFF"] != " ") echo '<td>'.$row["COA8_AFF"].'</td>';else echo "<td>-</td>";
								echo '</tr>';
							}
							if($i==9){
								echo '<tr>';
								echo '<td>9</td>';
								if($row["COA9"] != "") echo '<td>'.$row["COA9"].'</td>';else echo "<td>-</td>";
								if($row["COA9_AFF"] != " ") echo '<td>'.$row["COA9_AFF"].'</td>';else echo "<td>-</td>";
								echo '</tr>';
							}
							if($i==10){
								echo '<tr>';
								echo '<td>10</td>';
								if($row["COA10"] != "") echo '<td>'.$row["COA10"].'</td>';else echo "<td>-</td>";
								if($row["COA10_AFF"] != " ") echo '<td>'.$row["COA10_AFF"].'</td>';else echo "<td>-</td>";
								echo '</tr>';
							}
						}
						echo "</table>";
						echo "</div>";
					}

					echo '</td>';
					$GLOBALS['issn']=$row['ISSN'];
					if($row["H_Index"] != 0) echo '<td>'.$row["H_Index"].'</td>';else echo "<td>-</td>";
					if($row["DOI"] != "") echo '<td>'.$row["DOI"].'</td>';else echo "<td>-</td>";
					if($row["Pub_Name"] != "") echo '<td>'.$row["Pub_Name"].'</td>';else echo "<td>-</td>";
					if($row["Proc_Name"] != "") echo '<td>'.$row["Proc_Name"].'</td>';else echo "<td>-</td>";
					if($row["Peer"] != "") echo '<td>'.$row["Peer"].'</td>';else echo "<td>-</td>";
					if($row["Theme"] != "") echo '<td>'.$row["Theme"].'</td>';else echo "<td>-</td>";
					if($row["Paid"] != "") echo '<td>'.$row["Paid"].'</td>';else echo "<td>-</td>";
					if($row["PageNo"] != "") echo '<td>'.$row["PageNo"].'</td>';else echo "<td>-</td>";
					if($row["ISSN"] != "") echo'<td>'.$row["ISSN"].'</td>';else echo "<td>-</td>";
					if($row["Organizer"] != "") echo '<td>'.$row["Organizer"].'</td>';else echo "<td>-</td>";
					if($row["Presented"] != "") echo '<td>'.$row["Presented"].'</td>';else echo "<td>-</td>";
					if($row["Poster"] != "") echo '<td>'.$row["Poster"].'</td>';else echo "<td>-</td>";
					echo "<td><center>".$confposterpdf."</center></td>";
					if($row["Web"] != "") echo '<td>'.$row["Web"].'</td>';else echo "<td>-</td>";
					if($row["Citation_Index"] != "") echo '<td>'.$row["Citation_Index"].'</td>';else echo "<td>-</td>";
					echo '<td><center>'.$confpdf.'</center></td><td><center>'.$confcert.'</center></td>';
					$new_field_query = "select * from new_fields where table_name='publication_conferences'";
					$newresult = $conn->query($new_field_query);
					if ($newresult->num_rows > 0) {
						while ($row = $newresult->fetch_assoc()) {
							$field_name = $row['field_name'];
							$label = $row['label'];
							$display = $row['display'];
							if ($display == 1) {
								$table_sql = "select $field_name from publication_conferences where emp5_id=$empid and issn='".$GLOBALS['issn']."'";
								$tab_res = $conn->query($table_sql);
								if ($tab_res->num_rows > 0) {
									$tab_row = $tab_res->fetch_assoc();
									$new_field = $tab_row[$field_name];
									if($new_field!=null)
										echo "<td>".$new_field."</td>";
									else
										echo "<td>-</td>";
								}
							}
						}
					}
					$pubconf++;
				}
				echo "</table>";
				echo "</div>";
			}
			else{
				echo "<h4>No Conferences Registered</h4>";
			}
			?>
        </div>
        <div id ="section51">
            <legend><h1>STTP</h1></legend>
            <legend><h2>STTP attended  <a href="homepage.php#section51"><span id ="gly" class="glyphicon glyphicon-plus-sign"></span></a></h2></legend>
			<?php
			$sql="SELECT * FROM sttp_event_attended WHERE Emp6_Id=$empid";
			$result=$conn->query($sql);
			if($result->num_rows > 0)
			{
				echo "<div class='table-responsive'>";
				$sttpattended=1;
				echo "<table class='table table-bordered' border='1px' >";
				echo "<tr>";
				echo "<th>Sr.No.</th>";
				echo "<th colspan='2'>Options</th>";
				echo "<th>Title</th>";
				echo "<th>Speaker</th>";
				echo "<th>Organized By</th>";
				echo "<th>Event Type</th>";
				echo "<th>Location</th>";
				echo "<th>Duration</th>";
				echo "<th>Date From</th>";
				echo "<th>Date To</th>";
				echo "<th>Total Participation</th>";
				echo "<th>Certificate</th>";
				$new_field_query = "select * from new_fields where table_name='sttp_event_attended'";
				$new_result = $conn->query($new_field_query);
				if ($new_result->num_rows > 0) {
					while ($row = $new_result->fetch_assoc()) {
						$field_name = $row['field_name'];
						$label = $row['label'];
						$display = $row['display'];
						if ($display == 1) {
							echo "<th>".$label."</th>";
						}
					}
				}
				echo "</tr>";
				while($row=mysqli_fetch_assoc($result))
				{
					if($row["Certificate"] == null)
						$sttpcert="PDF Not Inserted";
					else
					{
						$myData1 = array('pub'=>'','academic'=>'','sttp'=>'sttpa','awd'=>'','cid'=>($sttpattended-1));
						$arg1 = base64_encode( json_encode($myData1) );
						$sttpcert='<a href="showpdf.php?parameter='.$arg1.'">View</a>';
					}
					$myData = array('val'=>6, 'id'=>($sttpattended-1));
					$arg = base64_encode( json_encode($myData) );
					$GLOBALS['sttp_id']=$row['sttp_id'];
					echo '<tr><td>'.$sttpattended.'</td><td><a href="editpage.php?parameter='.$arg.'"><span class="glyphicon glyphicon-edit">&nbsp</span></a></td><td><a href="deleteform.php?parameter='.$arg.'"><span class="glyphicon glyphicon-trash"></span></a></td>';
					if($row["Title"] != "") echo '<td>'.$row["Title"].'</td>';else echo "<td>-</td>";
					if($row["Speaker"] != "") echo '<td>'.$row["Speaker"].'</td>';else echo "<td>-</td>";
					if($row["Organized_By"] != "") echo '<td>'.$row["Organized_By"].'</td>';else echo "<td>-</td>";
					if($row["Event_Type"] != "") echo '<td>'.$row["Event_Type"].'</td>';else echo "<td>-</td>";
					if($row["Place"] != "") echo '<td>'.$row["Place"].'</td>';else echo "<td>-</td>";
					if($row["Duration"] != "") echo '<td>'.$row["Duration"].' hrs</td>';else echo "<td>-</td>";
					if($row["Date_From"] != "") echo '<td>'.dateformatChanger($row["Date_From"]).'</td>';else echo "<td>-</td>";
					if($row["Date_To"] != "") echo '<td>'.dateformatChanger($row["Date_To"]).'</td>';else echo "<td>-</td>";
					if($row["Total_Participation"] != 0) echo '<td>'.$row["Total_Participation"].'</td>';else echo "<td>-</td>";
					echo '<td><center>'.$sttpcert.'</center></td>';
					$new_field_query = "select * from new_fields where table_name='sttp_event_attended'";
					$newresult = $conn->query($new_field_query);
					if ($newresult->num_rows > 0) {
						while ($row = $newresult->fetch_assoc()) {
							$field_name = $row['field_name'];
							$label = $row['label'];
							$display = $row['display'];
							if ($display == 1) {
								$table_sql = "select $field_name from sttp_event_attended where emp6_id=$empid and sttp_id='".$GLOBALS['sttp_id']."'";
								$tab_res = $conn->query($table_sql);
								if ($tab_res->num_rows > 0) {
									$tab_row = $tab_res->fetch_assoc();
									$new_field = $tab_row[$field_name];
									if($new_field!=null)
										echo "<td>".$new_field."</td>";
									else
										echo "<td>-</td>";
								}
							}
						}
					}
					echo '</tr>';
					$sttpattended++;
				}
				echo "</table>";
				echo "</div>";
			}
			else{
				echo "<h4>No STTP Events Attended</h4>";
			}
			?>

        </div>

        <div id ="section52">

            <legend><h2>STTP organised  <a href="homepage.php#section52"><span id ="gly" class="glyphicon glyphicon-plus-sign"></span></a></h2></legend>
			<?php
			$sql="SELECT * FROM sttp_event_organized WHERE Emp7_Id=$empid";
			$result=$conn->query($sql);
			if(mysqli_num_rows($result) > 0)
			{
				echo "<div class='table-responsive'>";
				$sttporganized=1;
				echo "<table class='table table-bordered' border='1px' width='100%'>";
				echo "<tr>";
				echo "<th>Sr.No.</th>";
				echo "<th colspan='2'>Options</th>";
				echo "<th>Event Name</th>";
				echo "<th>Event Type</th>";
				echo "<th>Role</th>";
				echo "<th>Location</th>";
				echo "<th>Date From</th>";
				echo "<th>Date To</th>";
				echo "<th>Total Participation</th>";
				echo "<th>Certificate</th>";
				$new_field_query = "select * from new_fields where table_name='sttp_event_organized'";
				$new_result = $conn->query($new_field_query);
				if ($new_result->num_rows > 0) {
					while ($row = $new_result->fetch_assoc()) {
						$field_name = $row['field_name'];
						$label = $row['label'];
						$display = $row['display'];
						if ($display == 1) {
							echo "<th>".$label."</th>";
						}
					}
				}
				echo "</tr>";
				while($row=mysqli_fetch_assoc($result))
				{
					if($row["Certificate"] == null)
						$sttpocert="PDF Not Inserted";
					else
					{
						$myData1 = array('pub'=>'','academic'=>'','sttp'=>'sttpo','cocurr'=>'','extr'=>'','awd'=>'','cid'=>($sttporganized-1));
						$arg_sttpo = base64_encode( json_encode($myData1) );
						$sttpocert='<a href="showpdf.php?parameter='.$arg_sttpo.'">View</a>';
					}
					$myData = array('val'=>7, 'id'=>($sttporganized-1));
					$arg = base64_encode( json_encode($myData) );
					$GLOBALS['sttp_id']=$row['sttp_id'];
					echo '<tr><td>'.$sttporganized.'</td><td><a href="editpage.php?parameter='.$arg.'"><span class="glyphicon glyphicon-edit">&nbsp</span></a></td><td><a href="deleteform.php?parameter='.$arg.'"><span class="glyphicon glyphicon-trash"></span></a></td>';
					if($row["Name"] != "") echo '<td>'.$row["Name"].'</td>';else echo "<td>-</td>";
					if($row["Type"] != "") echo '<td>'.$row["Type"].'</td>';else echo "<td>-</td>";
					if($row["Role"] != "") echo '<td>'.$row["Role"].'</td>';else echo "<td>-</td>";
					if($row["Place"] != "") echo '<td>'.$row["Place"].'</td>';else echo "<td>-</td>";
					if($row["Date_From"] != "") echo '<td>'.dateformatChanger($row["Date_From"]).'</td>';else echo "<td>-</td>";
					if($row["Date_To"] != "") echo '<td>'.dateformatChanger($row["Date_To"]).'</td>';else echo "<td>-</td>";
					if($row["Number_Participants"] != 0) echo '<td>'.$row["Number_Participants"].'</td>';else echo "<td>-</td>";
					echo '<td><center>'.$sttpocert.'</center></td>';
					$new_field_query = "select * from new_fields where table_name='sttp_event_organized'";
					$newresult = $conn->query($new_field_query);
					if ($newresult->num_rows > 0) {
						while ($row = $newresult->fetch_assoc()) {
							$field_name = $row['field_name'];
							$label = $row['label'];
							$display = $row['display'];
							if ($display == 1) {
								$table_sql = "select $field_name from sttp_event_organized where emp7_id=$empid and sttp_id='".$GLOBALS['sttp_id']."'";
								$tab_res = $conn->query($table_sql);
								if ($tab_res->num_rows > 0) {
									$tab_row = $tab_res->fetch_assoc();
									$new_field = $tab_row[$field_name];
									if($new_field!=null)
										echo "<td>".$new_field."</td>";
									else
										echo "<td>-</td>";
								}
							}
						}
					}
					$sttporganized++;
				}
				echo "</table>";
				echo "</div>";
			}
			else{
				echo "<h4>No STTP Events Organized</h4>";
			}
			?>
        </div>
        <div id ="section53">
            <legend><h2>STTP delivered  <a href="homepage.php#section53"><span id ="gly" class="glyphicon glyphicon-plus-sign"></span></a></h2></legend>
			<?php
			$sql="SELECT * FROM sttp_event_delivered WHERE Emp9_Id=$empid";
			$result=$conn->query($sql);
			if(mysqli_num_rows($result) > 0)
			{
				echo "<div class='table-responsive'>";
				$sttpdelivered=1;
				echo "<table class='table table-bordered' border='1px' width='100%'>";
				echo "<tr>";
				echo "<th>Sr.No.</th>";
				echo "<th colspan='2'>Options</th>";
				echo "<th>Event Name</th>";
				echo "<th>Event Description</th>";
				echo "<th>Event Type</th>";
				echo "<th>Duration</th>";
				echo "<th>Location</th>";
				echo "<th>Date From</th>";
				echo "<th>Date To</th>";
				echo "<th>Certificate</th>";
				$new_field_query = "select * from new_fields where table_name='sttp_event_delivered'";
				$new_result = $conn->query($new_field_query);
				if ($new_result->num_rows > 0) {
					while ($row = $new_result->fetch_assoc()) {
						$field_name = $row['field_name'];
						$label = $row['label'];
						$display = $row['display'];
						if ($display == 1) {
							echo "<th>".$label."</th>";
						}
					}
				}
				echo "</tr>";
				while($row=mysqli_fetch_assoc($result))
				{
					if($row["Certificate"] == null)
						$sttpdcert="PDF Not Inserted";
					else
					{
						$myData1 = array('pub'=>'','academic'=>'','sttp'=>'sttpd','cocurr'=>'','extr'=>'','awd'=>'','cid'=>($sttpdelivered-1));
						$sttpd_arg = base64_encode( json_encode($myData1) );
						$sttpdcert='<a href="showpdf.php?parameter='.$sttpd_arg.'">View</a>';
					}
					$myData = array('val'=>8, 'id'=>($sttpdelivered-1));
					$arg = base64_encode( json_encode($myData) );
					$GLOBALS['sttp_id']=$row['sttp_id'];
					echo '<tr><td>'.$sttpdelivered.'</td><td><a href="editpage.php?parameter='.$arg.'"><span class="glyphicon glyphicon-edit">&nbsp</span></a></td><td><a href="deleteform.php?parameter='.$arg.'"><span class="glyphicon glyphicon-trash"></span></a></td>';
					if($row["Name"] != "") echo '<td>'.$row["Name"].'</td>';else echo "<td>-</td>";
					if($row["Description"] != "") echo '<td>'.$row["Description"].'</td>';else echo "<td>-</td>";
					if($row["Event_Type"] != "") echo '<td>'.$row["Event_Type"].'</td>';else echo "<td>-</td>";
					if($row["Duration"] != "") echo '<td>'.$row["Duration"].' hrs</td>';else echo "<td>-</td>";
					if($row["Place"] != "") echo '<td>'.$row["Place"].'</td>';else echo "<td>-</td>";
					if($row["Date_From"] != "") echo '<td>'.dateformatChanger($row["Date_From"]).'</td>';else echo "<td>-</td>";
					if($row["Date_To"] != "") echo '<td>'.dateformatChanger($row["Date_To"]).'</td >';else echo "<td>-</td>";
					echo '<td><center>'.$sttpdcert.'</center></td>';
					$new_field_query = "select * from new_fields where table_name='sttp_event_delivered'";
					$newresult = $conn->query($new_field_query);
					if ($newresult->num_rows > 0) {
						while ($row = $newresult->fetch_assoc()) {
							$field_name = $row['field_name'];
							$label = $row['label'];
							$display = $row['display'];
							if ($display == 1) {
								$table_sql = "select $field_name from sttp_event_delivered where emp9_id=$empid and sttp_id='" . $GLOBALS['sttp_id'] . "'";
								$tab_res = $conn->query($table_sql);
								if ($tab_res->num_rows > 0) {
									$tab_row = $tab_res->fetch_assoc();
									$new_field = $tab_row[$field_name];
									if ($new_field != null)
										echo "<td>" . $new_field . "</td>";
									else
										echo "<td>-</td>";
								}
							}
						}
					}
					$sttpdelivered++;
				}
				echo "</table>";
				echo "</div>";
			}
			else{
				echo "<h4>No STTP Events Delivered</h4>";
			}
			?>
        </div>
        <div id ="section6">
            <legend><h1>Co-curricular Activities  <a href="homepage.php#section6"><span id ="gly" class="glyphicon glyphicon-plus-sign"></span></a></h1></legend>
			<?php
			$sql="SELECT * FROM co_curricular WHERE Emp10_Id=$empid";
			$result=$conn->query($sql);
			if(mysqli_num_rows($result) > 0)
			{
				echo "<div class='table-responsive'>";
				$cocurr=1;
				echo "<table class='table table-bordered' border='1px' width='100%'>";
				echo "<tr>";
				echo "<th>Sr.No.</th>";
				echo "<th colspan='2'>Options</th>";
				echo "<th>Activity Name</th>";
				echo "<th>Activity Description</th>";
				echo "<th>Activity Type</th>";
				echo "<th>Role</th>";
				echo "<th>Date</th>";
				echo "<th>Certificate</th>";
				$new_field_query = "select * from new_fields where table_name='co_curricular'";
				$new_result = $conn->query($new_field_query);
				if ($new_result->num_rows > 0) {
					while ($row = $new_result->fetch_assoc()) {
						$field_name = $row['field_name'];
						$label = $row['label'];
						$display = $row['display'];
						if ($display == 1) {
							echo "<th>".$label."</th>";
						}
					}
				}
				echo "</tr>";
				while($row=mysqli_fetch_assoc($result))
				{
					if($row["Certificate"] == null)
						$cocurrcert="PDF Not Inserted";
					else
					{
						$myData1 = array('pub'=>'','academic'=>'','sttp'=>'','cocurr'=>'1','extr'=>'','awd'=>'','cid'=>($cocurr-1));
						$arg_cocurr = base64_encode( json_encode($myData1) );
						$cocurrcert='<a href="showpdf.php?parameter='.$arg_cocurr.'">View</a>';
					}
					$myData = array('val'=>9, 'id'=>($cocurr-1));
					$arg = base64_encode( json_encode($myData) );
					$GLOBALS['curricular_id']=$row['curricular_id'];
					echo '<tr><td>'.$cocurr.'</td><td><a href="editpage.php?parameter='.$arg.'"><span class="glyphicon glyphicon-edit">&nbsp</span></a></td><td><a href="deleteform.php?parameter='.$arg.'"><span class="glyphicon glyphicon-trash"></span></a></td>';
					if($row["Name"] != "") echo '<td>'.$row["Name"].'</td>';else echo "<td>-</td>";
					if($row["Description"] != "") echo '<td>'.$row["Description"].'</td>';else echo "<td>-</td>";
					if($row["Type"] != "") echo '<td>'.$row["Type"].'</td>';else echo "<td>-</td>";
					if($row["Role"] != "") echo '<td>'.$row["Role"].'</td>';else echo "<td>-</td>";
					if($row["Date"] != "") echo '<td>'.dateformatChanger($row["Date"]).'</td>';else echo "<td>-</td>";
					echo '<td><center>'.$cocurrcert.'</center></td>';
					$new_field_query = "select * from new_fields where table_name='co_curricular'";
					$newresult = $conn->query($new_field_query);
					if ($newresult->num_rows > 0) {
						while ($row = $newresult->fetch_assoc()) {
							$field_name = $row['field_name'];
							$label = $row['label'];
							$display = $row['display'];
							if ($display == 1) {
								$table_sql = "select $field_name from co_curricular where emp10_id=$empid and curricular_id='" . $GLOBALS['curricular_id'] . "'";
								$tab_res = $conn->query($table_sql);
								if ($tab_res->num_rows > 0) {
									$tab_row = $tab_res->fetch_assoc();
									$new_field = $tab_row[$field_name];
									if ($new_field != null)
										echo "<td>" . $new_field . "</td>";
									else
										echo "<td>-</td>";
								}
							}
						}
					}
					$cocurr++;
				}
				echo "</table>";
				echo "</div>";
			}
			else{
				echo "<h4>No Co-Curricular Activities Registered</h4>";
			}
			?>
        </div>
        <div id ="section7">
            <legend><h1>Extra Activities  <a href="homepage.php#section7"><span id ="gly" class="glyphicon glyphicon-plus-sign"></span></a></h1></legend>
			<?php
			$sql="SELECT * FROM extra WHERE Emp11_Id=$empid";
			$result=$conn->query($sql);
			if(mysqli_num_rows($result) > 0)
			{
				echo "<div class='table-responsive'>";
				$extra=1;
				echo "<table class='table table-bordered' border='1px' width='100%'>";
				echo "<tr>";
				echo "<th>Sr.No.</th>";
				echo "<th colspan='2'>Options</th>";
				echo "<th>Activity Name</th>";
				echo "<th id='tdwid'>Activity Description</th>";
				echo "<th>Location</th>";
				echo "<th>Role</th>";
				echo "<th>Date</th>";
				echo "<th>Certificate</th>";
				$new_field_query = "select * from new_fields where table_name='extra'";
				$new_result = $conn->query($new_field_query);
				if ($new_result->num_rows > 0) {
					while ($row = $new_result->fetch_assoc()) {
						$field_name = $row['field_name'];
						$label = $row['label'];
						$display = $row['display'];
						if ($display == 1) {
							echo "<th>".$label."</th>";
						}
					}
				}
				echo "</tr>";
				while($row=mysqli_fetch_assoc($result))
				{
					if($row["Certificate"] == null)
						$extracert="PDF Not Inserted";
					else
					{
						$myData2 = array('pub'=>'','academic'=>'','sttp'=>'','cocurr'=>'','extr'=>'1','awd'=>'','cid'=>($extra-1));
						$arg_extra = base64_encode( json_encode($myData2) );
						$extracert='<a href="showpdf.php?parameter='.$arg_extra.'">View</a>';
					}
					$myData = array('val'=>10, 'id'=>($extra-1));
					$arg = base64_encode( json_encode($myData) );
					$GLOBALS['extra_id'] =$row['extra_id'];
					echo '<tr><td>'.$extra.'</td><td><a href="editpage.php?parameter='.$arg.'"><span class="glyphicon glyphicon-edit">&nbsp</span></a></td><td><a href="deleteform.php?parameter='.$arg.'"><span class="glyphicon glyphicon-trash"></span></a></td>';
					if($row["Name"] != "") echo '<td>'.$row["Name"].'</td>';else echo "<td>-</td>";
					if($row["Description"] != "") echo '<td>'.$row["Description"].'</td>';else echo "<td>-</td>";
					if($row["Place"] != "") echo '<td>'.$row["Place"].'</td>';else echo "<td>-</td>";
					if($row["Role"] != "") echo '<td>'.$row["Role"].'</td>';else echo "<td>-</td>";
					if($row["Date"] != "") echo '<td>'.dateformatChanger($row["Date"]).'</td>';else echo "<td>-</td>";
					echo '<td><center>'.$extracert.'</center></td>';
					$new_field_query = "select * from new_fields where table_name='extra'";
					$newresult = $conn->query($new_field_query);
					if ($newresult->num_rows > 0) {
						while ($row = $newresult->fetch_assoc()) {
							$field_name = $row['field_name'];
							$label = $row['label'];
							$display = $row['display'];
							if ($display == 1) {
								$table_sql = "select $field_name from extra where emp11_id=$empid and extra_id='" . $GLOBALS['extra_id'] . "'";
								$tab_res = $conn->query($table_sql);
								if ($tab_res->num_rows > 0) {
									$tab_row = $tab_res->fetch_assoc();
									$new_field = $tab_row[$field_name];
									if ($new_field != null)
										echo "<td>" . $new_field . "</td>";
									else
										echo "<td>-</td>";
								}
							}
						}
					}
					$extra++;
				}
				echo "</table>";
				echo "</div>";
			}
			else{
				echo "<h4>No Extra Activities Registered</h4>";
			}
			?>
        </div>
        <div id ="awards">
            <legend><h1>Awards and Achievements  <a href="homepage.php#awards"><span id ="gly" class="glyphicon glyphicon-plus-sign"></span></a></h1></legend>
			<?php
			$sql="SELECT * FROM awards WHERE emp_id=".$empid;
			$result=$conn->query($sql);
			if(mysqli_num_rows($result) > 0)
			{
				echo "<div class='table-responsive'>";
				$award=1;
				echo "<table class='table table-bordered' border='1px' width='100%'>";
				echo "<tr>";
				echo "<th>Sr.No.</th>";
				echo "<th colspan='2'>Options</th>";
				echo "<th>Award Title</th>";
				echo "<th id='awddesc'>Description</th>";
				echo "<th>Issuer</th>";
				echo "<th>Honour Date</th>";
				echo "<th>Certificate</th>";
				$new_field_query = "select * from new_fields where table_name='awards'";
				$new_result = $conn->query($new_field_query);
				if ($new_result->num_rows > 0) {
					while ($row = $new_result->fetch_assoc()) {
						$field_name = $row['field_name'];
						$label = $row['label'];
						$display = $row['display'];
						if ($display == 1) {
							echo "<th>".$label."</th>";
						}
					}
				}
				echo "</tr>";
				while($row=mysqli_fetch_assoc($result))
				{
					if($row["certificate"] == null)
						$awdcert="PDF Not Inserted";
					else
					{
						$myData1 = array('pub'=>'','academic'=>'','sttp'=>'','cocurr'=>'','extr'=>'','awd'=>'1','cid'=>($award-1));
						$arg_awd = base64_encode( json_encode($myData1) );
						$awdcert='<a href="showpdf.php?parameter='.$arg_awd.'">View</a>';
					}
					$myData = array('val'=>11, 'id'=>($award-1));
					$arg = base64_encode( json_encode($myData) );
					$GLOBALS['award_id']=$row['award_id'];
					echo '<tr><td>'.$award.'</td><td><a href="editpage.php?parameter='.$arg.'"><span class="glyphicon glyphicon-edit">&nbsp</span></a></td><td><a href="deleteform.php?parameter='.$arg.'"><span class="glyphicon glyphicon-trash"></span></a></td>';
					if($row["award_title"] != "") echo '<td>'.$row["award_title"].'</td>';else echo "<td>-</td>";
					if($row["award_desc"] != "") echo '<td>'.$row["award_desc"].'</td>';else echo "<td>-</td>";
					if($row["award_issuer"] != "") echo '<td>'.$row["award_issuer"].'</td>';else echo "<td>-</td>";
					if($row["award_date"] != "") echo '<td>'.dateformatChanger($row["award_date"]).'</td>';else echo "<td>-</td>";
					echo '<td><center>'.$awdcert.'</center></td>';
					$new_field_query = "select * from new_fields where table_name='awards'";
					$newresult = $conn->query($new_field_query);
					if ($newresult->num_rows > 0) {
						while ($row = $newresult->fetch_assoc()) {
							$field_name = $row['field_name'];
							$label = $row['label'];
							$display = $row['display'];
							if ($display == 1) {
								$table_sql = "select $field_name from awards where emp_id=$empid and award_id='" . $GLOBALS['award_id'] . "'";
								$tab_res = $conn->query($table_sql);
								if ($tab_res->num_rows > 0) {
									$tab_row = $tab_res->fetch_assoc();
									$new_field = $tab_row[$field_name];
									if ($new_field != null)
										echo "<td>" . $new_field . "</td>";
									else
										echo "<td>-</td>";
								}
							}
						}
					}
					echo "</td>";
					$award++;
				}
				echo "</table>";
				echo "</div>";
			}
			else{
				echo "<h4>No Awards or Achievements Registered</h4>";
			}
			?>
        </div><br><br>
    </div>
    <br><br>
</div>
<?php
$sql = "SELECT * FROM edit WHERE Emp1_Id=".$empid;
$result = $conn->query($sql);
if($result->num_rows>0) {
	while ($row = mysqli_fetch_assoc($result)) {
		$first_visit = $row['first_visit'];
		if ($first_visit) {
			echo "<script type='text/javascript'>
                $(document).ready(function(){
                $('#ass_rights').modal('show');
                });
                </script>";
			$sql = "update edit set first_visit=0 WHERE Emp1_Id=".$empid;
			$conn->query($sql);
		}
	}
}

?>
<div class="modal fade" id ="ass_rights" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Editing Rights</h4>
            </div>
            <div class="modal-body">
				<?php
				$sql = "SELECT * FROM edit WHERE Emp1_Id=".$empid;
				$result = $conn->query($sql);
				echo "<ul>";
				while($row = mysqli_fetch_assoc($result))
				{
					echo "<li><b>Id : ".$row["Emp2_Id"]."</b> has given you form editing permission till <b>".dateformatChanger($row["Date"])."</b>.</li>";
				}
				echo "</ul>";
				?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
</body>
</html>
