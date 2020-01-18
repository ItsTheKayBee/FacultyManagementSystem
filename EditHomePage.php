<?php
include 'EditHomePage_Php.php';
function dateformatChanger($orgDate){
	return date("d-m-Y", strtotime($orgDate));
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home : <?php echo $empid; ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
        body
        {
            position: relative;
        }
        .nav-pills>li.active>a, .nav-pills>li.active>a:focus, .nav-pills>li.active>a:hover, .nav-pills>li.active>ul>li.active>a, .nav-pills>li.active>ul>li.active>a:focus, .nav-pills>li.active>ul>li.active>a:hover
        {
            background-color: #3C2AE6;
        }

        ul.nav-pills
        {
            position : fixed;
        }

        #navleft
        {
            color : white;
            margin-top : 1%;
            font-size : 18px;
        }

        .navbar
        {
            border : none;
            background-color: #3C2AE6;
            color:white;
            border-radius : 0px;
            width : 100%;
        }
        @media screen and (max-width: 810px)
        {
            #section1, #section2, #section3, #section41, #section42 ,#section43, #section51, #section52, #section53 , #section6 , #section7
            {
                margin-left:120px;
            }
        }
        .form-control{
            max-width: 450px;
            min-width:200px;
            border-radius : 0px;
        }

        .error
        {
            color  :red;
        }

        #setbtn
        {
            background-color : #3C2AE6;
            margin-top:9px;
            border : none;
            font-size : 20px;
        }

        a{ color : #3C2AE6; }

        input[type=submit]
        {
            background-color : #3C2AE6;
        }
        ::-webkit-scrollbar
        {
            width : 7px;
            height : 10px;
        }
        ::-webkit-scrollbar-thumb
        {
            background: #3C2AE6;
            border-radius : 30px;
            width : 10px;
        }
        ::-webkit-scrollbar-thumb:hover
        {
            background: #3C2AE6;
            border-radius : 30px
        }
    </style>
    <script src="homepage.js"></script>
</head>
<body data-spy="scroll" data-target="#myScrollspy" data-offset="20">
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
<nav class="col-sm-3 col-lg-3 col-md-4 col-xs-3" id ="myScrollspy">
    <ul class="nav nav-pills nav-stacked" style="background-color: #F7F7F7; border-radius :7px; border:0.4px solid light-grey; padding:10px">
        <li class="dropdown" id ="section0"><a href="EditProfile.php?parameter=<?php echo $arg; ?>"><center>PROFILE</center></a></li>
        <hr>
        <li><a href="#section1">Personal Details</a></li>
        <li><a href="#section2">Academic Qualifications</a></li>
        <li><a href="#section3">Courses Taught</a></li>
        <li><a href="#section4">B.Tech/Internship Project Guidance</a></li>
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Publications <span class="caret"></span></a>
            <ul class="dropdown-menu">
                <li><a href="#section41">Books</a></li>
                <li><a href="#section42">Journals</a></li>
                <li><a href="#section43">Conferences</a></li>
            </ul>
        </li>
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#" title="Short Term Training Program">STTP<span class="caret"></span></a>
            <ul class="dropdown-menu">
                <li><a href="#section51">Attended</a></li>
                <li><a href="#section52">Organised</a></li>
                <li><a href="#section53">Delivered</a></li>
            </ul>
        </li>
        <li><a href="#section6">Co curricular activities</a></li>
        <li><a href="#section7">Extra curricular activities</a></li>
        <li><a href="#awards">Awards and Achievements</a></li>
    </ul>
</nav>
<center>
    <div class="container-fluid">
        <!--FORM 1-->
        <div class="col-sm-9 col-lg-9 col-md-8 col-xs-9">
            <div id ="section1" >

                <form  method="POST" name="personal" onsubmit="return validatePersonal()"  enctype="multipart/form-data">
                    <div class="col-sm-10 col-lg-10 col-md-10 col-xs-10  well">
                        <fieldset>
                            <legend><h1>Personal details</h1></legend>
                            <div class="form-group">
                                <label class="col-sm-3 col-md-3 col-lg-3 col-xs-0">Name : </label>
                                <div class="col-md-9 col-sm-9 col-lg-6 col-xs-11">
                                    <input type="text" class="form-control" name = "name" id ="n" <?php if($name=='') echo "placeholder='* Name'"; else echo "value='$name'"; ?>>
                                    <span class="error" id ="name"></span>
                                </div>
                            </div>
                            <br><br><br>
                            <div class="form-group">
                                <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Gender : </label>
                                <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                                    <input  type="radio" value="Male" name = "gender" id ="g" <?php if($gender=='Male') echo 'checked'; ?>>Male &nbsp
                                    <input  type="radio" value="Female" name = "gender"  <?php if($gender=='Female') echo 'checked'; ?>>Female &nbsp
                                    <input  type="radio" value="Other" name = "gender" <?php if($gender=='Other') echo 'checked'; ?>>Other<br>
                                    <span class="error" id ="gender"></span>
                                </div>
                            </div>
                            <br><br><br>
                            <div class="form-group">
                                <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">E-mail : </label>
                                <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                                    <input  type="text" <?php if(!empty($err[0]))echo "style='border-color:red;' autofocus";?> placeholder="* Email" class="form-control" id ="e" name = "email"<?php if($email=='') echo "placeholder='* Email'"; else echo "value='$email'"; ?>>
                                    <span class="error" id ="email"><?php echo $err[0]; ?></span> &nbsp &nbsp <br><br>
                                </div>
                            </div>
                            <br><br><br>
                            <div class="form-group">
                                <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Contact No : </label>
                                <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                                    <input  type="phone" class="form-control" <?php if(!empty($err[1])) echo "style='border-color:red;' autofocus"; ?> id ="c" name = "contact" <?php if($contact=='') echo "placeholder='* Contact'"; else echo "value='$contact'"; ?>>
                                    <span class="error" id ="contact"><?php echo $err[1]; ?></span>
                                </div>
                            </div>
                            <br><br><br>
                            <div class="form-group">
                                <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Date Of Birth : </label>
                                <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                                    <input id ="d" <?php if(!empty($err[28])) echo "style='border-color:red;' autofocus"; ?> min="1950-01-01" max="<?php echo $maxdate; ?>" <?php if($dob == '1950-01-01') echo "placeholder='* Date Of Birth'"; else echo "value = '".dateformatChanger($dob)."'";?> class="form-control" type="text" name="date" onfocus="(this.type='date')" onblur="(this.type='text')" id="DOB">
                                    <span class="error" id ="date"><?php echo $err[28]; ?></span>
                                </div>
                            </div>
                            <br><br><br>
                            <div class="form-group">
                                <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Address : </label>
                                <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                                    <textarea id ="a" class="form-control" rows="5" name = "address" <?php if($address=='') echo "placeholder='* Address'";?>><?php if(!($address=='')) echo $address;  ?></textarea>
                                    <span class="error" id ="address"></span>
                                </div>
                            </div>
                            <br><br><br><br><br><br><br>
                            <div class="form-group">
                                <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Joining Position : </label>
                                <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                                    <input id ="pass" type="text" class="form-control" <?php if(!($join_pos == '')) echo "value='$join_pos'";else echo 'placeholder="Joining Position"';?> name = "joining_position"> &nbsp &nbsp
                                </div>
                            </div>
                            <br><br><br>
                            <div class="form-group">
                                <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Joining Date : </label>
                                <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                                    <input <?php if(!empty($err[27])) echo "style='border-color:red;' autofocus";if($join_date == '1950-01-01') echo "placeholder='Date Of Joining'"; else echo "value ='".dateformatChanger($join_date)."'";?> class="form-control" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" name="joining_date">
                                    <span class="error"><?php echo $err[27]; ?></span>
                                </div>
                            </div>
                            <br><br><br>
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
							$new_field = $tab_row[$field_name];
							echo "<div class=\"form-group\">
                                <label class=\"col-sm-3 col-md-3 col-lg-3 col-xs-3\">" . $label . " : </label>
                                <div class=\"col-md-6 col-sm-9 col-lg-6 col-xs-6\">"; ?>
                            <input class="form-control"
								<?php
								if ($new_field == '')
									echo 'name="' . $field_name . '" placeholder="Enter ' . $label . '"';
								else
									echo 'name="' . $field_name . '" value="' . $new_field . '"';
								?>
                            >
                    </div>
            </div>
            <br><br><br>
			<?php
			}
			}
			}
			}
			?>
            <legend>Promotions</legend>
            <div class="form-group">
                <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Promotion  : </label>
                <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                    <select class="form-control" name="pro1" id="pass">
                        <option value="">* Please Select a Position</option>
                        <option value="Head Of Department" <?php if($pro1=="Head Of Department") echo "selected" ?> >Head Of Department</option>
                        <option value="Associate Professor" <?php if($pro1=="Associate Professor") echo "selected" ?> >Associate Professor</option>
                        <option value="Lab Assistant" <?php if($pro1=="Lab Assistant") echo "selected" ?> >Lab Assistant</option>
                        <option value="Visiting Faculty" <?php if($pro1=="Visiting Faculty") echo "selected" ?> >Visiting Faculty</option>
                    </select>
                    <span class="error"><?php echo $err[32]; ?> </span>  &nbsp &nbsp
                </div>
            </div>
            <br><br><br>
            <div class="form-group">
                <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Date of Promotion: </label>
                <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                    <input <?php if(!empty($err[29])) echo "autofocus style='border:2px solid red;'"; ?> <?php if($pro1_date == '1950-01-01') echo "placeholder='Date Of Promotion'";
					else echo "value = ".dateformatChanger($pro1_date);?> class="form-control"  onfocus="(this.type='date')" onblur="(this.type='date')" name="pro1_date">
                    <span class="error"><?php echo $err[29]; ?> </span>
                </div>
            </div>
            <br><br><br>
            <div class="form-group">
                <input type="submit" style="color:white;" class="btn btn-primary btn-md" value="Submit" name = "submitpersonal">
            </div>
            </fieldset>
            </form>
        </div>
    </div>
    <!--FORM 2-->
    <div class="col-sm-10 col-lg-10 col-md-10 col-xs-10 well">
        <div id ="section2">
            <!--SSC-->
            <legend><h2>Academic Details</h2></legend>
            <form  method="POST"  onsubmit="return ac1()" name="a1"  enctype="multipart/form-data">
                <fieldset>
                    <h3>SSC</h3>
                    <br>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">SSC Institute: </label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                            <input type="text" class="form-control"  name="sscinstitute" id ="sscinstitute_id" <?php if($sscInstitute=='') echo "placeholder='* Institute Name'"; else echo "value='$sscInstitute'"; ?>>
                            <span class="error" id ="ins1"></span>
                        </div>
                    </div>
                    <br><br><br>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">SSC Percentage: </label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                            <input type="number" class="form-control" name="sscmarks" id ="sscmarks_id" min="0" max="100" step="0.01" <?php if($sscPercentile==0) echo "placeholder='* Percentile'"; else echo "value=$sscPercentile"; ?> >
                            <span class="error" id ="sscmarks1"></span>
                        </div>
                    </div>
                    <br><br><br>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">SSC Year of Passing: </label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                            <select name="sscyear" class="form-control">
								<?php
								if($gender=='null')
								{
									echo "<option selected value=$curyear>".$curyear."</option>";
								}
								else
								{
									echo '<option value="">* Please Select Year of Passing</option>';
									foreach ($yearArray as $year)
									{
										$selected = ($year == $sscYear && $sscYear!=1950) ? 'selected' : '';
										echo '<option '.$selected.' value="'.$year.'">'.$year.'</option>';
									}
								}
								?>
                            </select>
                            <span class="error" id ="sscyear"></span>
                        </div>
                    </div>
                    <br><br><br>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">SSC Marksheet: </label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
							<?php
							if($sscMarksheet==null)
								echo "<input type='file' name='sscimage' id ='sscimage' accept='application/pdf' />";
							else
							{
								echo "<h4>Marksheet Already Inserted&nbsp<span style=color:#34E410; class='glyphicon glyphicon-ok'></span></h4><br><br>";
								echo "<input type='file' name='sscimage' id='sscimage' accept='application/pdf' />";
							}
							?>
                        </div>
                    </div>
                    <br><br><br><br><br><br>
                    <div class="form-group">
                        <input type="submit" style="color:white;" class="btn btn-primary btn-md" <?php if($gender=='null') echo "disabled title='Please fill Personal details first'"?> value="Submit" name = "submitacademic1">
                    </div>
            </form>
            <hr style="height:0.4px;background-color:lightgray">
            <div id ="hscnew">
                <!--HSC-->
                <form  method="POST"  onsubmit="return ac2()" name="a2"  enctype="multipart/form-data">
                    <h3>HSC</h3>
                    <br>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">HSC Institute: </label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                            <input type="text" name="hscinstitute" id ="hscinstitute_id" class="form-control"  <?php if($hscInstitute=='') echo "placeholder='* Institute Name'"; else echo "value='$hscInstitute'"; ?>>
                            <span class="error" id ="ins2"><?php echo $err[35];?></span>
                        </div>
                    </div>
                    <br><br><br>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">HSC Percentage: </label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                            <input type="number"   class="form-control" name="hscmarks" id ="hscmarks_id"  min="0" max="100" step="0.01"  <?php if($hscPercentile==0) echo "placeholder='* Percentile'"; else echo "value=$hscPercentile"; ?> >
                            <span class="error" id ="hscmarks1"></span>
                        </div>
                    </div>
                    <br><br><br>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">HSC Year of Passing: </label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                            <select name="hscyear" class="form-control">
								<?php
								if($gender=='null')
								{
									echo "<option selected value=$curyear>".$curyear."</option>";
								}
								else
								{
									echo '<option value="">* Please Select Year of Passing</option>';
									foreach ($yearArray as $year)
									{
										$selected = ($year == $hscYear && $hscYear!=1950) ? 'selected' : '';
										echo '<option '.$selected.' value="'.$year.'">'.$year.'</option>';
									}
								}
								?>
                            </select>
                            <span class="error" id ="hscyear"></span>
                        </div>
                    </div>
                    <br><br><br>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">HSC Marksheet: </label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
							<?php if($hscMarksheet==null) echo "<input type='file' name='hscimage' id ='hscimage' accept='application/pdf' />"; else {echo "<h4>Marksheet Already Inserted&nbsp<span style=color:#34E410;'' class='glyphicon glyphicon-ok'></span></h4><br><br>"; echo "<input type='file' name='hscimage' id='hscimage' accept='application/pdf' />";} ?>
                        </div>
                    </div>
                    <br><br><br><br><br><br>
                    <div class="form-group">
                        <input type="submit" style="color:white;" class="btn btn-primary btn-md" value="Submit" <?php if($gender=='null') echo "disabled title='Please fill Personal details first'"?>  name = "submitacademic2">
                    </div>

                </form>
            </div>
            <hr style="height:0.5px;background-color:lightgray">
            <!--BTECH-->
            <div id ="degree">

                <form  method="POST"  onsubmit="return ac3()" name="a3"  enctype="multipart/form-data">
                    <h3>Bachelor's</h3>
                    <br>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">B-Tech Institute: </label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                            <input type="text" name="btechinstitute" id ="btechinstitute_id" class="form-control"  <?php if($bachelorsInstitute=='') echo "placeholder='* Institute Name'"; else echo"value='$bachelorsInstitute'"; ?>>
                            <span class="error" id ="ins3"><?php echo $err[36];?></span>
                        </div>
                    </div>
                    <br><br><br>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">B-Tech CGPI: </label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                            <input type="number"  name="btechmarks" id ="btechmarks_id" class="form-control" min="0" max="10" step="0.01" <?php if($bachelorsPercentile==0) echo "placeholder='* CGPA'"; else echo "value=$bachelorsPercentile"; ?>>
                            <span class="error" id ="btechmarks1"></span>
                        </div>
                    </div>
                    <br><br><br>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">B-Tech Year of Passing: </label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                            <select name="btechyear" class="form-control">
								<?php
								if($gender=='null')
								{
									echo "<option selected value=$curyear>".$curyear."</option>";
								}
								else
								{
									echo '<option value="">* Please Select Year of Passing</option>';
									foreach ($yearArray as $year)
									{
										$selected = ($year == $bachelorsYear && $bachelorsYear!=1950) ? 'selected' : '';
										echo '<option '.$selected.' value="'.$year.'">'.$year.'</option>';
									}
								}
								?>
                            </select>
                        </div>
                    </div>
                    <br><br><br>
                    <div class="form-group">
                        <label for="sel1" class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Degree:</label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                            <select id ="sel1" class="form-control" name="btechdegree" >
                                <option value='' <?php if($bachelorsIn == '') echo "selected"; ?> >Degree</option>
                                <option value='Information Technology' <?php if($bachelorsIn == 'Information Technology') echo"selected"; ?> >Information Technology Engineering</option>
                                <option value='Computer Science Engineering' <?php if($bachelorsIn == 'Computer Science Engineering') echo"selected"; ?> > Computer Science Engineering </option>
                                <option value='Electronics and Telecommunication Engineering' <?php if($bachelorsIn == 'Electronics and Telecommunication Engineering') echo"selected"; ?> > Electronics and Telecommunication Engineering </option>
                                <option value='Electronics' <?php if($bachelorsIn == 'Electronics') echo"selected"; ?> > Electronics </option>

                            </select>
                        </div>
                        <br>
                    </div>
                    <span class="error" id ="btechdegree"></span>
                    <br><br><br>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">B-Tech Marksheet: </label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
							<?php if($btechMarksheet==null) echo "<input type='file' name='btechimage' id ='btechimage' accept='application/pdf' />"; else {echo "<h4>Marksheet Already Inserted&nbsp<span style=color:#34E410;'' class='glyphicon glyphicon-ok'></span></h4><br><br>"; echo "<input type='file' name='btechimage' id ='btechimage' accept='application/pdf' />"; }?>
                        </div>
                    </div>
                    <br><br><br><br><br><br>
                    <div class="form-group">
                        <input type="submit" <?php if($gender=='null') echo "disabled title='Please fill Personal details first'"?>  style="color:white;" class="btn btn-primary btn-md" value="Submit" name = "submitacademic3">
                    </div>
                </form>
            </div>
            <hr style="height:0.3px;background-color:lightgray">
            <!--MTECH-->
            <div id ="masters">
                <form  method="POST"  onsubmit="return ac4()" name="a4"  enctype="multipart/form-data">
                    <h3>Master's</h3>
                    <br>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">M-Tech Institute: </label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                            <input type="text" name="mtechinstitute" id ="mtechinstitute_id"  class="form-control" <?php if($mastersInstitute=='') echo "placeholder='* Institute Name'"; else echo "value='$mastersInstitute'"; ?>>
                            <span class="error" id ="ins4"></span>
                        </div>
                    </div>
                    <br><br><br>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">M-Tech CGPI: </label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                            <input type="number" name="mtechmarks" id ="mtechmarks_id"  class="form-control" min="0" max="10" step="0.01"  <?php if($mastersPercentile==0) echo "placeholder='* CGPA'"; else echo "value=$mastersPercentile"; ?>>
                            <span class="error" id ="mtechmarks1"></span>
                        </div>
                    </div>
                    <br><br><br>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">M-Tech Year of Passing: </label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                            <select name="mtechyear" class="form-control">
								<?php
								if($gender=='null')
								{
									echo "<option selected value=$curyear>".$curyear."</option>";
								}
								else
								{
									echo '<option value="">* Please Select Year of Passing</option>';
									foreach ($yearArray as $year)
									{
										$selected = ($year == $mastersYear && $mastersYear!=1950) ? 'selected' : '';
										echo '<option '.$selected.' value="'.$year.'">'.$year.'</option>';
									}
								}
								?>
                            </select>
                        </div>
                    </div>
                    <br><br><br>
                    <div class="form-group">
                        <label for="sel2" class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Degree:</label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                            <select id ="sel2" name="mtechdegree" class="form-control" >
                                <option value='' <?php if($mastersIn == '') echo "selected"; ?> >Degree</option>
                                <option value='Computer Science Engineering' <?php if($mastersIn == 'Computer Science Engineering') echo"selected"; ?> > Computer Science Engineering</option>
                                <option value='Computer Engineering' <?php if($mastersIn == 'Computer Engineering') echo"selected"; ?> >Computer Engineering </option>
                                <option value= 'Embedded System & Computer Engineering' <?php if($mastersIn == 'Embedded System & Computer Engineering') echo"selected"; ?> > Embedded System & Computing Engineering </option>
                                <option value= 'Electronics' <?php if($mastersIn == 'Electronics') echo"selected"; ?> > Electronics </option>

                            </select>
                        </div>
                    </div>
                    <br>
                    <span class="error" id ="mtechdegree"></span>
                    <br><br>

                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">M-Tech Marksheet: </label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
							<?php if($mtechMarksheet==null) echo "<input type='file' name='mtechimage' id ='mtechimage' accept='application/pdf' />"; else {echo "<h4>Marksheet Already Inserted&nbsp<span style=color:#34E410;'' class='glyphicon glyphicon-ok'></span></h4><br><br>";  echo "<input type='file' name='mtechimage' id='mtechimage' accept='application/pdf' />";} ?>
                        </div>
                    </div>
                    <br><br><br><br><br><br>
                    <div class="form-group">
                        <input type="submit" <?php if($gender=='null') echo "disabled title='Please fill Personal details first'"?>  style="color:white;" class="btn btn-primary btn-md" value="Submit" name = "submitacademic4">
                    </div>
                </form>
            </div>
            <hr style="height:0.3px;background-color:lightgray">
            <!--PHD-->
            <div id ="phd">
                <form  method="POST"  onsubmit="return ac5()" name="a5"  enctype="multipart/form-data">
                    <h3>PHD</h3>
                    <br>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">PHD Institute: </label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                            <input type="text" class="form-control"  name="phdinstitute" id ="phdinstitute_id"  <?php if($phdInstitute=='') echo "placeholder='* Institute Name'"; else echo "value='$phdInstitute'"; ?>>
                            <span class="error" id ="ins5"></span>
                        </div>
                    </div>
                    <br><br><br>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">PHD CGPI: </label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                            <input type="number" name="phdmarks" id ="phdmarks_id"  class="form-control"   min="0" max="10" step="0.01" <?php if($phdPercentile==0) echo "placeholder='* CGPA'"; else echo "value=$phdPercentile"; ?>>
                            <span class="error" id ="phdmarks1"></span>
                        </div>
                    </div>
                    <br><br><br>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">PHD Year of Passing: </label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                            <select name="phdyear" class="form-control">
								<?php
								if($gender=='null')
								{
									echo "<option selected value=$curyear>".$curyear."</option>";
								}
								else
								{
									echo '<option value="">* Please Select Year of Passing</option>';
									foreach ($yearArray as $year)
									{
										$selected = ($year == $phdYear && $phdYear!=1950) ? 'selected' : '';
										echo '<option '.$selected.' value="'.$year.'">'.$year.'</option>';
									}
								}
								?>
                            </select>
                        </div>
                    </div>
                    <br><br><br>
                    <div class="form-group">
                        <label for="sel3" class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Degree:</label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                            <select id ="sel3" name="phddegree" class="form-control" >
                                <option value='' <?php if($phdIn =='') echo "selected"; ?>>Degree</option>
                                <option value='Electronics' <?php if($phdIn == 'Electronics') echo "selected"; ?> > Electronics </option>
                                <option> Some name 2 </option>
                                <option> Some name 3 </option>
                                <option> Some name 4 </option>
                                <option> Some name 5 </option>
                            </select>
                        </div>
                    </div>
                    <br>
                    <span class="error" id ="phddegree"></span>
                    <br><br>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">PHD Marksheet: </label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
							<?php if($phdMarksheet==null) echo "<input type='file' name='phdimage' id ='phdimage' accept='application/pdf' />"; else {echo "<h4>Marksheet Already Inserted&nbsp<span style=color:#34E410;'' class='glyphicon glyphicon-ok'></span></h4><br><br>"; echo "<input type='file' name='phdimage' id='phdimage' accept='application/pdf' />"; }?>
                        </div>
                    </div>
                    <br><br><br><br><br><br>
                    <div class="form-group">
                        <input type="submit" <?php if($gender=='null') echo "disabled title='Please fill Personal details first'"?>  style="color:white;" class="btn btn-primary btn-md" value="Submit" name = "submitacademic5">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--FORM 3-->
    <div class="col-sm-10 col-lg-10 col-md-10 col-xs-10 well">
        <div id ="section3" enctype="multipart/form-data">
            <form method="post" onsubmit="return coursesvalidation()" name="coursestaught">
                <fieldset>
                    <legend><h2>Courses Taught</h2></legend>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Category: </label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                            <div class="category_div" id ="category_div">
								<?php $sql = "SELECT * FROM course_type order by course_type_id ASC";
								$res = $conn->query($sql);
								echo "<select name='category' class='required-entry form-control' id='category_id' onchange='dynamicdropdown(options[this.selectedIndex].value);'><option value=''>* Select Course Type</option>";
								while ($row = $res->fetch_assoc()) {
									if ($res->num_rows > 0) {
										$course_type = $row['course_type_name'];
										$course_value=$course_type;
										if($course_value=="Lab Course"){
											$course_value="Labcourses";
										}
										if($course_value=="Audit Course"){
											$course_value="AC";
										}
										echo "<option value='" . $course_value . "'>" . $course_type . "</option>";
									}
								}
								echo "</select>";?>
                                <span class="error" id ="coursetype"></span>
                            </div>
                        </div>
                    </div>
                    <br><br><br>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Courses: </label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                            <div class="sub_category_div" id ="sub_category_div">
                                <script type="text/javascript" language="JavaScript">
                                    document.write('<select name="subcategory" class="form-control" id="subcategory"><option value="">* Please select course type</option></select>');
                                </script>
                                <span class="error" id ="course"> </span>
                            </div>
                        </div>
                    </div>
                    <br><br><br>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Year: </label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                            <select class="form-control" name="courseyear" id ="courseyear_id" >
                                <option value="">* Select Year</option>
								<?php
								foreach ($yearArray as $year)
								{
									echo '<option value="'.$year.'">'.$year.'</option>';
								}
								?>
                            </select>
                            <span class="error" id ="courseyear1"></span>
                        </div>
                    </div>
                    <br><br><br>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Semester: </label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                            <select class="form-control" name="coursesem" id ="coursesem_id">
                                <option value="">* Select semester</option>
                                <option value="SEM I">SEM I</option>
                                <option value="SEM II">SEM II</option>
                                <option value="SEM III">SEM III</option>
                                <option value="SEM IV">SEM IV</option>
                                <option value="SEM V">SEM V</option>
                                <option value="SEM VI">SEM VI</option>
                                <option value="SEM VII">SEM VII</option>
                                <option value="SEM VIII">SEM VIII</option>
                            </select>
                            <span class="error" id ="coursesem1"></span>
                        </div>
                    </div>
                    <br><br><br>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Attachment : </label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                            <input type="file" name="changeName_certificate_image" id="changeName_certificate_image" accept="application/pdf" />
                        </div>
                    </div>
                    <br><br>
					<?php
					$new_field_query="select * from new_fields where table_name='courses'";
					$result=$conn->query($new_field_query);
					if($result->num_rows>0){
					while($row=$result->fetch_assoc()) {
					$field_name = $row['field_name'];
					$label = $row['label'];
					$display = $row['display'];
					if($display==1) {
					echo "<div class=\"form-group\">
                                                    <label class=\"col-sm-3 col-md-3 col-lg-3 col-xs-3\">" . $label . " : </label>
                                                    <div class=\"col-md-6 col-sm-9 col-lg-6 col-xs-6\">";?>
                    <input class="form-control"
						<?php
						echo 'name="'.$field_name.'" placeholder="Enter '.$label.'"';
						?>
                    >
                    <span class=\"error\"><?php echo $err[27]; ?></span>
        </div>
    </div> <br><br><br>
	<?php
	}
	}
	}
	?>
    <div class="form-group">
        <input type="submit"  type="submit" <?php if($gender=='null') echo "disabled title='Please fill Personal details first'"?>  style="color:white;" class="btn btn-primary btn-md" value="Submit" name = "submitcourses">
    </div>
    </form>
    </div>
    </div>

    <!-- FORM 4 -->
    <div class="col-sm-10 col-lg-10 col-md-10 col-xs-10 well">
        <div id ="section4">
            <form method="POST" name="project" onsubmit="return projguided()" enctype="multipart/form-data">
                <legend><h2>Projects Guided</h2></legend>
                <div class="form-group">
                    <!-- TITLE OF PROJECT -->
                    <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Project Title: </label>
                    <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                        <input type="text" class="form-control" name="projtitle" id ="projtitleid" placeholder="* Project's Title">
                        <span class="error" id ="projname"></span>
                    </div>
                </div>
                <br><br><br>
                <div class="form-group">
                    <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Project Type: </label>
                    <div class="col-md-6 col-sm-9 col-lg-8 col-xs-6">
                        <div class="col-md-7 col-sm-7 col-lg-7 col-xs-8">
                            <label class="radio-inline"><input type="radio" name="projtype"  checked value = "BEPROJECT" onclick="var input = document.getElementById('name2'); if(this.checked){ input.disabled = true; input.focus();}else{input.disabled=false;}">B.E Project</label>
                            <label class="radio-inline"><input type="radio" name="projtype" value = "Internship" onclick="var input = document.getElementById('name2'); if(this.checked){ input.disabled = true; input.focus();}else{input.disabled=false;}">Internship</label>
                            <label class="radio-inline"><input type="radio" name="projtype" for="name2" onclick="var input = document.getElementById('name2'); if(this.checked){ input.disabled = false; input.focus();}else{input.disabled=true;}">Other</label>
                        </div>
                        <div class="col-sm-3 col-md-3 col-lg-3 col-xs-3">
                            <input id ="name2" name="name2" disabled="true" type="text" class="form-control"/>
                        </div>
                        <span class="error" id ="projtypeerr"></span>
                    </div>
                </div>
                <br><br><br>
                <div class="form-group">
                    <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Project Description: </label>
                    <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                        <input type="text" class="form-control" name="projdesc" id ="projdescid" placeholder="Project's Description">
                        <span class="error" id ="projdescerr"></span>
                    </div>
                </div>
                <br><br><br>
                <div class="form-group">
                    <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Project Year: </label>
                    <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                        <select class="form-control" name="projyear" id ="projyearid" >
                            <option value="">* Select Year</option>
							<?php
							foreach ($yearArray as $year)
							{
								echo '<option value="'.$year.'">'.$year.'</option>';
							}
							?>
                        </select>
                        <span class="error" id ="projyearerr"></span>
                    </div>
                </div>
                <br><br><br>
                <div class="form-group">
                    <label>ALL STUDENTS DETAILS : <br></label>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th><center>Sr. No</center></th>
                                <th><center>Name</center></th>
                                <th><center>Roll Number</center></th>
                                <th><center>E-mail Address</center></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td><center>1.</center></td>
                                <td><input type="text" class="form-control" name="projstud1name" id ="projstud1nameid">
                                    <span class="error" id ="projstud1name"></span></td></td>
                                <td><input type="number" max="9999999" class="form-control" name="projstud1roll" id ="projstud1rollid">
                                    <span class="error" id ="projstud1roll"></span></td>
                                <td><input type="text" class="form-control" name="projstud1email" id ="projstud1email">
                                    <span class="error" id ="projstud1emailerr"></span></td>
                            </tr>
                            <tr>
                                <td><center>2.</center></td>
                                <td><input type="text" class="form-control" name="projstud2name" id ="projstud2nameid">
                                    <span class="error" id ="projstud2name"></span></td></td>
                                <td><input type="number" max="9999999" class="form-control" name="projstud2roll" id ="projstud2rollid">
                                    <span class="error" id ="projstud2roll"></span></td>
                                <td><input type="text" class="form-control" name="projstud2email" id ="projstud2email">
                                    <span class="error" id ="projstud2emailerr"></span></td>
                            </tr>
                            <tr>
                                <td><center>3.</center></td>
                                <td><input type="text" class="form-control" name="projstud3name" id ="projstud3nameid">
                                    <span class="error" id ="projstud3name"></span></td></td>
                                <td><input type="number" max="9999999" class="form-control" name="projstud3roll" id ="projstud3rollid">
                                    <span class="error" id ="projstud3roll"></span></td>
                                <td><input type="text" class="form-control" name="projstud3email" id ="projstud3email">
                                    <span class="error" id ="projstud3emailerr"></span></td>
                            </tr>
                            <tr>
                                <td><center>4.</center></td>
                                <td><input type="text" class="form-control" name="projstud4name" id ="projstud4nameid">
                                    <span class="error" id ="projstud4name"></span></td></td>
                                <td><input type="number" max="9999999" class="form-control" name="projstud4roll" id ="projstud4rollid">
                                    <span class="error" id ="projstud4roll"></span></td>
                                <td><input type="text" class="form-control" name="projstud4email" id ="projstud4email">
                                    <span class="error" id ="projstud4emailerr"></span></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <br><br><br>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Attachment : </label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                            <input type="file" name="changeName_certificate_image" id="changeName_certificate_image" accept="application/pdf" />
                        </div>
                    </div>
                    <br><br>
				<?php
				$new_field_query="select * from new_fields where table_name='projects'";
				$result=$conn->query($new_field_query);
				if($result->num_rows>0){
				while($row=$result->fetch_assoc()) {
				$field_name = $row['field_name'];
				$label = $row['label'];
				$display = $row['display'];
				if($display==1) {
				echo "<div class=\"form-group\">
                                                    <label class=\"col-sm-3 col-md-3 col-lg-3 col-xs-3\">" . $label . " : </label>
                                                    <div class=\"col-md-6 col-sm-9 col-lg-6 col-xs-6\">";?>
                <input class="form-control"
					<?php
					echo 'name="'.$field_name.'" placeholder="Enter '.$label.'"';
					?>
                >
                <span class=\"error\"><?php echo $err[27]; ?></span>
        </div>
    </div> <br><br><br>
	<?php
	}
	}
	}
	?>
    <div class="form-group">
        <!-- SUBMIT -->
        <input type="submit" <?php if($gender=='null') echo "disabled title='Please fill Personal details first'"?> style="color:white;" class="btn btn-primary btn-md" value="Submit" name = "submitprojects">
    </div>
    </form>
    </div>
    </div>

    <!--FORM 4.1-->
    <div class="col-sm-10 col-lg-10 col-md-10 col-xs-10 well">
        <div id ="section41">
            <form method="POST"  name="publicationbooks" onsubmit="return validateBook()" enctype="multipart/form-data">

                <legend><h2>Publications</h2></legend>
                <h3>Books</h3>
                <div class="form-group">
                    <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Book Name: </label>
                    <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                        <input type="text" class="form-control" name="bookname" id ="booknameid" placeholder="* Book's Name">
                        <span class="error" id ="bname"></span>
                    </div>
                </div>
                <br><br><br>
                <div class="form-group">
                    <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Book ISBN Number: </label>
                    <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                        <input type="text"  class="form-control" name="bookisbn" id ="bookisbnid" placeholder="* ISBN Number">
                        <span class="error" id ="bookisbn"></span>
                    </div>
                </div>
                <br><br><br>
                <div class="form-group">
                    <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Date of Publication: </label>
                    <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                        <input onfocus="(this.type='date')" onblur="(this.type='text')" <?php if(!empty($err[33])) echo "style='border-color:red;' autofocus"; ?> id ="pubdateid" class="form-control" name="pubdate" placeholder="* Date of Publication">
                        <span class="error" id ="pubdate"><?php echo $err[33]; ?></span>
                    </div>
                    <br><br><br>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Edition: </label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                            <input type="text" class="form-control" name="bookedition"  placeholder="Book Edition">
                        </div>
                    </div>
                    <br><br><br>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Publisher's Name: </label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                            <input type="text"  class="form-control" name="book_pub_name" id ="book_pub_nameid"  placeholder="* Publisher's Name">
                            <span class="error" id ="book_pub_name"></span>
                        </div>
                    </div>
                    <br><br><br>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Author's Name: </label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                            <input type="text"class="form-control" name="book_auth_name" id ="book_auth_nameid" placeholder="* Author's Name">
                            <span class="error" id ="book_auth_name"></span>
                        </div>
                    </div>
                    <br><br><br>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Author's Institute: </label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                            <input type="text" id ="bookauthinst" class="form-control" name="book_auth_inst" placeholder="Author's Institute">
                        </div>
                    </div>
                    <br><br><br>
                    <legend>Co-Authors</legend>
                    <br>
                    <div class="form-group">
                        Co-Author 1:<br>
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Name: </label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                            <input type="text" id ="bookcoauthname1" class="form-control" name="book_coauth_name1" placeholder="Name">
                        </div>
                    </div>
                    <br><br><br>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Institute: </label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                            <input type="text"id ="bookcoauthinst1" class="form-control" name="book_coauth_inst1" placeholder="Institute">
                        </div>
                    </div>
                    <br><br><br>
                    <div class="form-group">
                        Co-Author 2:<br>
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Name: </label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                            <input type="text" id ="bookcoauthname2" class="form-control" name="book_coauth_name2" placeholder="Name">
                        </div>
                    </div>
                    <br><br><br>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Institute: </label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                            <input type="text"id ="bookcoauthinst2" class="form-control" name="book_coauth_inst2" placeholder="Institute">
                        </div>
                    </div>
                    <br><br><br>
                    <div class="form-group">
                        Co-Author 3:<br>
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Name: </label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                            <input type="text" id ="bookcoauthname3" class="form-control" name="book_coauth_name3" placeholder="Name">
                        </div>
                    </div>
                    <br><br><br>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Institute: </label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                            <input type="text"id ="bookcoauthinst3" class="form-control" name="book_coauth_inst3" placeholder="Institute">
                        </div>
                    </div>
                    <br><br>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Book's Cover Page : </label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                            <input type="file" name="book_image" id ="book_image" accept="application/pdf"/>
                        </div>
                    </div>
                    <br><br>
					<?php
					$new_field_query="select * from new_fields where table_name='publication_books'";
					$result=$conn->query($new_field_query);
					if($result->num_rows>0){
					while($row=$result->fetch_assoc()) {
					$field_name = $row['field_name'];
					$label = $row['label'];
					$display = $row['display'];
					if($display==1) {
					echo "<div class=\"form-group\">
                                                    <label class=\"col-sm-3 col-md-3 col-lg-3 col-xs-3\">" . $label . " : </label>
                                                    <div class=\"col-md-6 col-sm-9 col-lg-6 col-xs-6\">";?>
                    <input class="form-control"
						<?php
						echo 'name="'.$field_name.'" placeholder="Enter '.$label.'"';
						?>
                    >
                    <span class=\"error\"><?php echo $err[27]; ?></span>
                </div>
        </div> <br><br><br>
		<?php
		}
		}
		}
		?>
        <div class="form-group">
            <input type="submit" <?php if($gender=='null') echo "disabled title='Please fill Personal details first'"?> style="color:white;" class="btn btn-primary btn-md" value="Submit" name = "submitpublicationbooks">
        </div>
        </form>
    </div>
    </div>
    </div>

    <!--FORM 4.2-->
    <div class="col-sm-10 col-lg-10 col-md-10 col-xs-10 well">
        <div id = "section42">
            <form method="post" action="" name="publicationjournal" onsubmit="return validateJour()" enctype="multipart/form-data" >
                <legend><h2>Publications</h2></legend>
                <h3>Journals</h3>
                <br>
                <div class="form-group">
                    <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Paper's Title: </label>
                    <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                        <input type="text" id ="journaltitleid" class="form-control" name="journal_title" placeholder="* Paper's Title">
                        <span class="error" id ="journal_title"></span>
                    </div>
                </div>
                <br><br><br>
                <div class="form-group">
                    <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Journal's Name: </label>
                    <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                        <input type="text"  class="form-control" name="journal_name" id ="journal_nameid" placeholder="* Journal's Name" >
                        <span class="error" id ="journal_name"></span>
                    </div>
                </div>
                <br><br><br>
                <div class="form-group">
                    <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Are you the first author ?</label>
                    <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                        <label class="radio-inline"><input type="radio" value="YES" name="journal_fauth" checked onclick="var input = document.getElementById('journal_fauth'); if(this.checked){ input.disabled = true; input.focus();}else{input.disabled=false;}">YES</label>
                        <label class="radio-inline"><input type="radio" value="NO" name="journal_fauth" for="journal_fauth"  onclick="var input = document.getElementById('journal_fauth'); if(this.checked){ input.disabled = false; input.focus();}else{input.disabled=true;}">NO</label>
                        <input id ="journal_fauth" name="journal_fauth_val" disabled="true" type="text"/><br>
                        <span id ="jour_fauth" class="error"></span>
                    </div>
                </div>
                <br><br><br>
                <!-- DYNAMIC CO-AUTHORS -->
                <legend>Co-Authors</legend>
                <div class="form-group">
                    <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3"> Co-Author Name : </label>
                    <input type="text" id ="jourcoauthname1" class="form-control" name="jour_coauth_name1" placeholder="* Co Author 1">
                    <span class="=error" id ="jour_coauth_name1" style="color:red;"></span>
                    <br>
                    <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3"> Co-Author Affiliation : </label>
                    <input type="text" id ="jourcoauthnameaff1" class="form-control" name="jour_coauth_nameaff1" placeholder="* Co Author 1 affiliation">
                    <span class="=error" id ="jour_coauth_nameaff1" style="color:red;"></span>
                </div>
                <div class="form-group">
                    <div id ="inputs">
                    </div>
                </div>
                <div class="form-group">
                    <input type="button" style="color:white;background-color: #3C2AE6;" class="btn" value="Add co authors" id ="addInput"/>
                    <span class="error" id ="limitidjour"></span>
                    <br>
                </div>
                <legend></legend>
                <br><br><br>
                <div class="form-group">
                    <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Publisher's Name: </label>
                    <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                        <input type="text" id ="journal_pub_nameid" class="form-control" name="journal_pub_name" placeholder="* Publisher's Name">
                        <span class="error" id ="journal_pub_name"></span>
                    </div>
                </div>
                <br><br><br>
                <div class="form-group">
                    <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Date of Publication: </label>
                    <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                        <input onfocus="(this.type='date')" <?php if(!empty($err[34])) echo "style='border-color:red;' autofocus"; ?> onblur="(this.type='text')" id ="jour_dateid" class="form-control" name="jour_date" placeholder="* Date of Publication">
                        <span class="error" id ="jour_date"><?php if(!empty($err[34])) echo $err[34]; ?></span>
                    </div>
                </div>
                <br><br><br>
                <div class="form-group">
                    <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Impact Factor: </label>
                    <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                        <input type="number" id ="journal_impactid" min="0" class="form-control" name="journal_impact" placeholder="* Impact Factor">
                        <span class="error" id ="journal_impact"></span>
                    </div>
                </div>
                <br><br><br>
                <div class="form-group">
                    <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Journal's Type: </label>
                    <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                        <label class="radio-inline"><input type="radio" name="journal_type" value="National" checked>National</label>
                        <label class="radio-inline"><input type="radio"name="journal_type" value="International">International</label>
                    </div>
                </div>
                <br><br><br>
                <div class="form-group">
                    <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Digital Object Identifier : </label>
                    <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                        <input type="text" id ="doi" class="form-control" name="doi" placeholder="Digital Object Identifier">
                        <span class="error" id ="journal_doi"></span>
                    </div>
                </div>
                <br><br><br>
                <div class="form-group">
                    <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Volume</label>
                    <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                        <input type="text" name="journal_vol" id ="journal_volid" class="form-control" placeholder="* Volume">
                        <span class="error" id ="journal_vol"></span>
                    </div>
                    <br><br><br>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Is it a book chapter?</label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                            <label class="radio-inline"><input type="radio" name="journal_book" value="YES">Yes</label>
                            <label class="radio-inline"><input type="radio" name="journal_book" value="NO" checked>No</label>
                        </div>
                    </div>
                    <br><br><br>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Issue No</label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                            <input type="text" name="journal_issue" class="form-control" id ="journal_issueid" placeholder="* Issue no.">
                            <span class="error" id ="journal_issue"></span>
                        </div>
                    </div>
                    <br><br><br>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Peer Reviewed ?</label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                            <label class="radio-inline"><input type="radio" name="journal_peer" value="YES">Yes</label>
                            <label class="radio-inline"><input type="radio" name="journal_peer" value="NO" checked>No</label>
                        </div>
                    </div>
                    <br><br><br>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Page Number : </label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                            <input type="text" name="journal_pg" id ="journal_pgid" class="form-control"  placeholder="* Page Number">
                            <span class="error" id ="journal_pg"></span>
                        </div>
                    </div>
                    <br><br><br>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">ISSN Number : </label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                            <input type="text" name="journal_issn" class="form-control" id ="journal_issnid" placeholder="* ISSN number">
                            <span class="error" id ="journal_issn"></span>
                        </div>
                    </div>
                    <br><br><br>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Paid ? </label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                            <label class="radio-inline"><input type="radio" name="journal_paid" value="YES">Yes</label>
                            <label class="radio-inline"><input type="radio" name="journal_paid" value="NO" checked>No</label>
                        </div>
                    </div>
                    <br><br><br>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Citation Index : </label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                            <input type="text" name="journal_cite" id ="journal_citeid" class="form-control"  placeholder="* Citation Index">
                            <span class="error" id ="journal_cite"></span>
                        </div>
                    </div>
                    <br><br><br>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Listed In SJR ?</label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                            <label class="radio-inline"><input type="radio" name="journal_sjr" value="YES">Yes</label>
                            <label class="radio-inline"><input type="radio" name="journal_sjr" value="NO" checked>No</label>
                        </div>
                    </div>
                    <br><br><br>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Paper : </label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                            <input type="file" name="paper_image" accept="application/pdf" />
                        </div>
                    </div>
                    <br><br><br>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Certificate : </label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                            <input type="file" name="certificate_image" accept="application/pdf" />
                        </div>
                    </div>
                    <br><br><br>
					<?php
					$new_field_query="select * from new_fields where table_name='publication_journals'";
					$result=$conn->query($new_field_query);
					if($result->num_rows>0){
					while($row=$result->fetch_assoc()) {
					$field_name = $row['field_name'];
					$label = $row['label'];
					$display = $row['display'];
					if($display==1) {
					echo "<div class=\"form-group\">
                                                    <label class=\"col-sm-3 col-md-3 col-lg-3 col-xs-3\">" . $label . " : </label>
                                                    <div class=\"col-md-6 col-sm-9 col-lg-6 col-xs-6\">";?>
                    <input class="form-control"
						<?php
						echo 'name="'.$field_name.'" placeholder="Enter '.$label.'"';
						?>
                    >
                    <span class=\"error\"><?php echo $err[27]; ?></span>
                </div>
        </div> <br><br><br>
		<?php
		}
		}
		}
		?>
        <div class="form-group">
            <input type="submit" <?php if($gender=='null') echo "disabled title='Please fill Personal details first'"?> style="color:white;" class="btn btn-primary btn-md" value="Submit" name = "submitjournals">
        </div>
        </form>
    </div>
    </div>
    </div>

    <!--FORM 4.3-->
    <div class="col-sm-10 col-lg-10 col-md-10 col-xs-10 well">
        <div id ="section43">
            <form method="POST" onsubmit="return validateConf()" name="publicationconf" enctype="multipart/form-data" action="">
                <legend><h2>Publications</h2></legend>
                <h3>Conferences</h3>
                <br>
                <div class="form-group">
                    <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Name : </label>
                    <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                        <input type="text" id ="conf_nameid" class="form-control" name="conf_name"  placeholder="* Conference Name">
                        <span class="error" id ="conf_name"></span>
                    </div>
                </div>
                <br><br><br>
                <div class="form-group">
                    <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Are you the first Author ?</label>
                    <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                        <label class="radio-inline"><input type="radio" name="conf_fauth" value = "YES" checked onclick="var input = document.getElementById('conf_fauth'); if(this.checked){ input.disabled = true; input.focus();}else{input.disabled=false;}">YES</label>
                        <label class="radio-inline"><input type="radio" name="conf_fauth" value = "NO" for="conf_fauth" onclick="var input = document.getElementById('conf_fauth'); if(this.checked){ input.disabled = false; input.focus();}else{input.disabled=true;}">NO</label>
                        <input id ="conf_fauth" name="conf_fauth_val" disabled="true" type="text"/><br>
                        <span class="error" id = "conf_fauthor"></span>
                    </div>
                </div>
                <br><br><br>
                <!-- DYNAMIC CO-AUTHORS -->
                <legend>Co-Authors</legend>
                <div class="form-group">
                    <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3"> Co-Author Name : </label>
                    <input type="text" id ="confcoauthname1" class="form-control" name="name1" placeholder="* Co Author 1">
                    <span class="error" id ="name1" style="color:red;"></span>
                    <br>
                    <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3"> Co-Author Affiliation : </label>
                    <input type="text" id ="confcoauthnameaff1" class="form-control" name="name1_affiliation" placeholder="Co Author 1 affiliation">
                    <span class="error" id ="name1_affiliation" style="color:red;"></span>
                </div>
                <div class="form-group">
                    <div id ="inputsconf">

                    </div>
                </div>
                <div class="form-group">
                    <input type="button" style="color:white;" class="btn btn-primary btn-md" value="Add co authors" id ="addInputConf"/>
                    <span class="error" id ="limitidconf"></span>
                    <br>
                </div>
                <legend></legend>
                <div class="form-group">
                    <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Date of Publication: </label>
                    <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                        <input onfocus="(this.type='date')" onblur="(this.type='text')" <?php if(!empty($err[33])) echo "style='border-color:red;' autofocus"; ?> id ="confpubdateid" class="form-control" name="pubdate" placeholder="* Date of Publication">
                        <span class="error" id ="pubdate"><?php echo $err[33]; ?></span>
                    </div>
                </div>
                <br><br><br>
                <div class="form-group">
                    <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Type : </label>
                    <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                        <label class="radio-inline"><input type="radio" name="conf_type" checked value="National">National</label>
                        <label class="radio-inline"><input type="radio" name="conf_type" value="International">International</label>
                    </div>
                </div>
                <br><br><br>
                <div class="form-group">
                    <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">H-Index : </label>
                    <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                        <input type="text" id ="conf_hindexid" class="form-control" name="conf_hindex" placeholder="* H index">
                        <span class="error" id ="conf_hindex"></span>
                    </div>
                </div>
                <br><br><br>
                <div class="form-group">
                    <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Digital Object Identifier : </label>
                    <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                        <input type="text" id ="doi" class="form-control" name="doi" placeholder="Digital Object Identifier">
                        <span class="error" id ="conf_doi"></span>
                    </div>
                </div>
                <br><br><br>
                <div class="form-group">
                    <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Publisher's Name: </label>
                    <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                        <input type="text" id ="conf_pubnameid" class="form-control" name="conf_pubname" placeholder="* Publisher's name">
                        <span class="error" id ="conf_pubname"></span>
                    </div>
                </div>
                <br><br><br>
                <div class="form-group">
                    <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Proceeding Name: </label>
                    <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                        <input type="text" id ="conf_pronameid" class="form-control" name="conf_proname" placeholder="* Proceding name">
                        <span class="error" id ="conf_proname"></span>
                    </div>
                </div>
                <br><br><br>
                <div class="form-group">
                    <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Peer Reviewed ? </label>
                    <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                        <label class="radio-inline"><input type="radio" name="conf_peer" value="YES">YES</label>
                        <label class="radio-inline"><input type="radio" name="conf_peer" value="NO" checked>NO</label>
                    </div>
                </div>
                <br><br><br>
                <div class="form-group">
                    <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Theme :  </label>
                    <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                        <input type="text" id ="conf_themeid" class="form-control" name="conf_themename" placeholder="* Theme of conference">
                        <span class="error" id ="conf_themename"></span>
                    </div>
                    <br><br><br>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Paid ? </label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                            <label class="radio-inline"><input type="radio" name="conf_paid" value="YES">YES</label>
                            <label class="radio-inline"><input type="radio" name="conf_paid" value="NO" checked>NO</label>
                        </div>
                    </div>
                    <br><br><br>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Page Number :  </label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                            <input type="text" id ="conf_pgid" class="form-control" name="conf_pg" placeholder="* Page number">
                            <span class="error" id ="conf_pg"></span>
                        </div>
                    </div>
                    <br><br><br>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">ISSN / ISBN Number : </label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                            <input type="text" id ="conf_issnid" class="form-control" name="conf_issn" placeholder="* ISSN/ISBN Number">
                            <span class="error" id ="conf_issn"></span>
                        </div>
                    </div>
                    <br><br><br>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Organiser : </label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                            <input type="text" id ="conf_orgid" class="form-control" name="conf_orgname" placeholder="* Organiser">
                            <span class="error" id ="conf_orgname"></span>
                        </div>
                    </div>
                    <br><br><br>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Venue :  </label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                            <input type="text" id ="conf_placeid" class="form-control" name="conf_place" placeholder="* Venue">
                            <span class="error" id ="conf_place"></span>
                        </div>
                    </div>
                    <br><br><br>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Presented ?</label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                            <label class="radio-inline"><input type="radio" name="conf_pres" value="YES">YES</label>
                            <label class="radio-inline"><input type="radio" name="conf_pres" value="NO" checked>NO</label>
                        </div>
                    </div>
                    <br><br><br>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Poster / Oral :</label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                            <label class="radio-inline"><input type="radio" name="conf_poster" checked value="Poster">Poster</label>
                            <label class="radio-inline"><input type="radio" name="conf_poster" value="Oral">Oral</label>
                            <span class="error" id ="conf_poster"></span>
                        </div><br><br>
                        <input type="file" name="conf_posterpdf" id ="conf_poster" accept="application/pdf" />
                    </div>
                    <br><br><br>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Through Web ?</label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                            <label class="radio-inline"><input type="radio" name="conf_web" value="YES">YES</label>
                            <label class="radio-inline"><input type="radio" name="conf_web" value="NO" checked>NO</label>
                        </div>
                    </div>
                    <br><br><br>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Citation Index : </label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                            <input type="text" id ="conf_citeid" class="form-control" name="conf_cite" placeholder="* Citation Index">
                            <span class="error" id ="conf_cite"></span>
                        </div>
                    </div>
                    <br><br><br>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Paper : </label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                            <input type="file"name="paper_image"id ="paper_image" accept="application/pdf" />
                        </div>
                    </div>
                    <br><br><br>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Certificate : </label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                            <input type="file" name="certificate_image" id ="certificate_image" accept="application/pdf" />
                        </div>
                    </div>
                    <br><br><br>
					<?php
					$new_field_query="select * from new_fields where table_name='publication_conferences'";
					$result=$conn->query($new_field_query);
					if($result->num_rows>0){
					while($row=$result->fetch_assoc()) {
					$field_name = $row['field_name'];
					$label = $row['label'];
					$display = $row['display'];
					if($display==1) {
					echo "<div class=\"form-group\">
                                                    <label class=\"col-sm-3 col-md-3 col-lg-3 col-xs-3\">" . $label . " : </label>
                                                    <div class=\"col-md-6 col-sm-9 col-lg-6 col-xs-6\">";?>
                    <input class="form-control"
						<?php
						echo 'name="'.$field_name.'" placeholder="Enter '.$label.'"';
						?>
                    >
                    <span class=\"error\"><?php echo $err[27]; ?></span>
                </div>
        </div> <br><br><br>
		<?php
		}
		}
		}
		?>
        <div class="form-group">
            <input type="submit" <?php if($gender=='null') echo "disabled title='Please fill Personal details first'"?> style="color:white;" class="btn btn-primary btn-md" value="Submit" name = "submitconference">
        </div>
        </form>
    </div>
    </div>
    </div>
    <div class="col-sm-10 col-lg-10 col-md-10 col-xs-10 well">
        <div id ="section51">
            <form method="POST" action="" name="sttpattended" onsubmit="return validateAttended()"  enctype="multipart/form-data">
                <legend><h2>STTP</h2></legend>
                <h3>Attended</h3>
                <br>
                <div class="form-group">
                    <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Event Name: </label>
                    <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                        <input type="text" class="form-control" id ="attendednameid" placeholder="* Name of the event" name = "attendedname">
                        <span class="error" id ="attendedname"></span>
                    </div>
                </div>
                <br><br><br>
                <div class="form-group">
                    <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Event Type</label>
                    <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                        <select class="form-control" name="eventtype" id="eventtype" onchange="var input=document.getElementById('eventtype_new');if($('#eventtype :selected').text()=='Other'){input.disabled = false; input.focus();}else{input.disabled=true;}">
                            <option value="">* Event type</option>
                            <option value="Seminar">Seminar</option>
                            <option value="Training">Training</option>
                            <option value="Workshop">Workshop</option>
                            <option value="Other">Other</option>
                        </select><br>
                        <input id ="eventtype_new" name="eventtype_new" placeholder="Enter Event Type" disabled type="text"/>
                        <span class="error" id ="eventtype_err"></span><br>
                    </div>
                </div>
                <br><br><br><br>
                Date :
                <div class="form-group">
                    <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">From :</label>
                    <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                        <input placeholder="* From"  type="text" onfocus="(this.type='date')" <?php if((!empty($err[37])) || (!empty($err[38]))) echo "style='border-color:red;' autofocus";?> onblur="(this.type='date')" id ="datefromattendedid" class="form-control" name="datefromattended">
                        <span class="error" id ="datefromattended"><?php if(!empty($err[37])) echo $err[37];?></span>
                    </div>
                </div>
                <br><br><br>
                <div class="form-group">
                    <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">To :</label>
                    <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                        <input placeholder="* To"  type="text" onfocus="(this.type='date')" <?php if(!empty($err[38])) echo "style='border-color:red;' autofocus";?> onblur="(this.type='date')" class="form-control" id ="datetoattendedid" name="datetoattended">
                        <span class="error" id ="datetoattended"><?php if(!empty($err[38])) echo $err[38];?></span>
                    </div>
                </div>
                <br><br><br>
                <div class="form-group">
                    <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Organised By :</label>
                    <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                        <input type="text" name="organisedbyattended" class="form-control" placeholder="Organised by">
                    </div>
                </div>
                <br><br><br>
                <div class="form-group">
                    <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Location :</label>
                    <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                        <input type="text" class="form-control" placeholder="Location" name = "locationattended">
                    </div>
                </div>
                <br><br><br>
                <div class="form-group">
                    <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Duration :</label>
                    <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                        <input  name="durationattended" placeholder="Duration" class="form-control" type="text" onfocus="(this.type='time')" onblur="(this.type='text')">
                    </div>
                </div>
                <br><br><br>
                <div class="form-group">
                    <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Total Participants :</label>
                    <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                        <input type="number" name="participantsattended" class="form-control" placeholder="Total Participants">
                    </div>
                </div>
                <br><br><br>
                <div class="form-group">
                    <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Speaker :</label>
                    <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                        <input type="text" name="speakerattended" class="form-control" placeholder="Speaker">
                    </div>
                </div>
                <br><br><br>
                <div class="form-group">
                    <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Certificate : </label>
                    <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                        <input type="file" name="certificateattended" id ="certificateattended" accept="application/pdf" />
                    </div>
                </div>
                <br><br><br>
				<?php
				$new_field_query="select * from new_fields where table_name='sttp_event_attended'";
				$result=$conn->query($new_field_query);
				if($result->num_rows>0){
				while($row=$result->fetch_assoc()) {
				$field_name = $row['field_name'];
				$label = $row['label'];
				$display = $row['display'];
				if($display==1) {
				echo "<div class=\"form-group\">
                                                    <label class=\"col-sm-3 col-md-3 col-lg-3 col-xs-3\">" . $label . " : </label>
                                                    <div class=\"col-md-6 col-sm-9 col-lg-6 col-xs-6\">";?>
                <input class="form-control"
					<?php
					echo 'name="'.$field_name.'" placeholder="Enter '.$label.'"';
					?>
                >
                <span class=\"error\"><?php echo $err[27]; ?></span>
        </div>
    </div><br><br><br>
	<?php
	}
	}
	}
	?>
    <div class="form-group">
        <input type="submit" <?php if($gender=='null') echo "disabled title='Please fill Personal details first'"?> style="color:white;" class="btn btn-primary btn-md" value="Submit" name = "submitsttpattended">
    </div>
    </form>
    </div>
    </div>
    <!--FORM 5.2-->
    <div class="col-sm-10 col-lg-10 col-md-10 col-xs-10 well">
        <div id ="section52">
            <form onsubmit="return sttpo()" method="POST" name="sttporganised" enctype="multipart/form-data">
                <legend><h2>STTP</h2></legend>
                <h3>Organised</h3>
                <br>
                <div class="form-group">
                    <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Event Name:</label>
                    <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                        <input type="text" class="form-control" placeholder="* Name of the event" id ="organizedname_id" name="organizedname">
                        <span class="error" id ="organizedname"></span>
                    </div>
                </div>
                <br><br><br>
                <div class="form-group">
                    <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Event Type :</label>
                    <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                        <select class="form-control" name="organizedeventtype" id="orgeventtype" onchange="var input=document.getElementById('orgeventtype_new');if($('#orgeventtype :selected').text()=='Other'){input.disabled = false; input.focus();}else{input.disabled=true;}">
                            <option value="">* Event type</option>
                            <option value="Seminar">Seminar</option>
                            <option value="Training">Training</option>
                            <option value="Workshop">Workshop</option>
                            <option value="Other">Other</option>
                        </select><br>
                        <input id ="orgeventtype_new" name="orgeventtype_new" placeholder="Enter Event Type" disabled type="text"/>
                        <span class="error" id ="orgeventtype_err"></span><br>
                    </div>
                </div>
                <br><br><br><br>
                Date :
                <div class="form-group">
                    <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">From :</label>
                    <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                        <input placeholder="* From"  type="text" onfocus="(this.type='date')" <?php if((!empty($err[39])) || (!empty($err[40]))) echo "style='border-color:red;' autofocus";?> onblur="(this.type='date')" class="form-control" id ="datefromorganized_id" name="datefromorganized">
                        <span class="error" id ="datefromorganized"><?php if(!empty($err[39])) echo $err[39];?></span><br>
                    </div>
                </div>
                <br><br><br>
                <div class="form-group">
                    <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">To :</label>
                    <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                        <input placeholder="* To"  type="text" onfocus="(this.type='date')" <?php if(!empty($err[40])) echo "style='border-color:red;' autofocus";?> onblur="(this.type='date')" class="form-control" id ="datetoorganized_id" name="datetoorganized">
                        <span class="error" id ="datetoorganized"><?php if(!empty($err[40])) echo $err[40];?></span>
                    </div>
                </div>
                <br><br><br>
                <div class="form-group">
                    <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Role :</label>
                    <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                        <input type="text" name="roleorganized" class="form-control" placeholder="Role">
                    </div>
                </div>
                <br><br><br>
                <div class="form-group">
                    <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Total Participants :</label>
                    <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                        <input type="number" name="participantsorganized" class="form-control" placeholder="Total Participants">
                    </div>
                </div>
                <br><br><br>
                <div class="form-group">
                    <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Location :</label>
                    <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                        <input type="text" name="placeorganized" class="form-control" placeholder="Place">
                    </div>
                </div>
                <br><br><br>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Attachment : </label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                            <input type="file" name="changeName_certificate_image" id="changeName_certificate_image" accept="application/pdf" />
                        </div>
                    </div>
                    <br><br>
				<?php
				$new_field_query="select * from new_fields where table_name='sttp_event_organized'";
				$result=$conn->query($new_field_query);
				if($result->num_rows>0){
				while($row=$result->fetch_assoc()) {
				$field_name = $row['field_name'];
				$label = $row['label'];
				$display = $row['display'];
				if($display==1) {
				echo "<div class=\"form-group\">
                                                    <label class=\"col-sm-3 col-md-3 col-lg-3 col-xs-3\">" . $label . " : </label>
                                                    <div class=\"col-md-6 col-sm-9 col-lg-6 col-xs-6\">";?>
                <input class="form-control"
					<?php
					echo 'name="'.$field_name.'" placeholder="Enter '.$label.'"';
					?>
                >
                <span class=\"error\"><?php echo $err[27]; ?></span>
        </div>
    </div> <br><br><br>
	<?php
	}
	}
	}
	?>
    <div class="form-group">
        <input type="submit" <?php if($gender=='null') echo "disabled title='Please fill Personal details first'"?> style="color:white;" class="btn btn-primary btn-md" value="Submit" name = "submitsttporganized">
    </div>
    </form>
    </div>
    </div>

    <!--FORM 5.3-->
    <div class="col-sm-10 col-lg-10 col-md-10 col-xs-10 well">
        <div id ="section53">
            <form action="" method="POST" onsubmit="return validateDeli()" name="sttpdelivered" enctype="multipart/form-data">
                <legend><h2>STTP</h2></legend>
                <h3>Delivered</h3>
                <br>
                <div class="form-group">
                    <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Event Name :</label>
                    <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                        <input type="text" class="form-control" placeholder="* Name of the event" id ="deliverednameid" name="deliveredname">
                        <span class="error" id ="deliveredname"></span>
                    </div>
                </div>
                <br><br><br>
                <div class="form-group">
                    <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Event Type :</label>
                    <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                        <select class="form-control" name="deliveredeventtype" id="deliveredeventtype" onchange="var input=document.getElementById('deleventtype_new');if($('#deliveredeventtype :selected').text()==='Other'){input.disabled = false; input.focus();}else{input.disabled=true;}">
                            <option value="">* Event type</option>
                            <option value="Seminar">Seminar</option>
                            <option value="Training">Training</option>
                            <option value="Workshop">Workshop</option>
                            <option value="Other">Other</option>
                        </select><br>
                        <input id ="deleventtype_new" name="deleventtype_new" placeholder="Enter Event Type" disabled type="text"/>
                        <span class="error" id ="deleventtype_err"></span><br>
                    </div>
                </div>
                <br><br><br><br>
                Date :
                <div class="form-group">
                    <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">From :</label>
                    <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                        <input placeholder="* From"  type="text" onfocus="(this.type='date')" <?php if((!empty($err[41])) || (!empty($err[42]))) echo "style='border-color:red;' autofocus";?> onblur="(this.type='date')" class="form-control" id ="datefromdeliveredid" name="datefromdelivered">
                        <span class="error" id ="datefromdelivered" ><?php if(!empty($err[41])) echo $err[41];?></span>
                    </div>
                </div>
                <br><br><br>
                <div class="form-group">
                    <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">To :</label>
                    <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                        <input placeholder="* To"  type="text" onfocus="(this.type='date')" <?php if(!empty($err[42])) echo "style='border-color:red;' autofocus";?> onblur="(this.type='date')"class="form-control" id ="datetodeliveredid" name="datetodelivered" >
                        <span class="error" id ="datetodelivered" ><?php if(!empty($err[42])) echo $err[42];?></span>
                    </div>
                    <br><br><br>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Activity Description :</label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                            <textarea class="form-control" rows="5" placeholder="Activity description" class="form-control" name = "activitydescription"></textarea>
                        </div>
                    </div>
                    <br><br><br><br><br><br><br>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Location :</label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                            <input type="text" name="placedelivered" class="form-control" placeholder="Place">
                        </div>
                    </div>
                    <br><br><br>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Duration :</label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                            <input  name="durationdelivered" placeholder="Duration" class="form-control" type="text" onfocus="(this.type='time')" onblur="(this.type='text')">
                        </div>
                    </div>
                    <br><br><br>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Attachment : </label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                            <input type="file" name="changeName_certificate_image" id="changeName_certificate_image" accept="application/pdf" />
                        </div>
                    </div>
                    <br><br>
					<?php
					$new_field_query="select * from new_fields where table_name='sttp_event_delivered'";
					$result=$conn->query($new_field_query);
					if($result->num_rows>0){
					while($row=$result->fetch_assoc()) {
					$field_name = $row['field_name'];
					$label = $row['label'];
					$display = $row['display'];
					if($display==1) {
					echo "<div class=\"form-group\">
                                                    <label class=\"col-sm-3 col-md-3 col-lg-3 col-xs-3\">" . $label . " : </label>
                                                    <div class=\"col-md-6 col-sm-9 col-lg-6 col-xs-6\">";?>
                    <input class="form-control"
						<?php
						echo 'name="'.$field_name.'" placeholder="Enter '.$label.'"';
						?>
                    >
                    <span class=\"error\"><?php echo $err[27]; ?></span>
                </div>
        </div> <br><br><br>
		<?php
		}
		}
		}
		?>
        <div class="form-group">
            <input type="submit" <?php if($gender=='null') echo "disabled title='Please fill Personal details first'"?> style="color:white;" class="btn btn-primary btn-md" value="Submit" name = "submitsttpdelivered">
        </div>
        </form>
    </div>
    </div>
    </div>

    <!--FORM 6-->
    <div class="col-sm-10 col-lg-10 col-md-10 col-xs-10 well">
        <div id ="section6">
            <form method="POST" onsubmit="return co()" name="co6" enctype="multipart/form-data">
                <fieldset>
                    <legend><h2>Co-curricular Activities</h2></legend>
                    <br>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Activity Name :</label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                            <input type="text" class="form-control" placeholder="* Name of the Activity" name = "cocurrname" id ="cocurrname_id">
                            <span class="error" id ="coname"></span>
                        </div>
                    </div>
                    <br><br><br>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Description:</label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                            <textarea id ="cocurdesc" class="form-control" name="cocurrdescription" cols="50" rows="6" placeholder="Description of Co-Curricular Activity"></textarea>
                            <span class="error" id ="codesc"></span>
                        </div>
                    </div>
                    <br><br><br><br><br><br><br><br>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Date :</label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                            <input onfocus="(this.type='date')" <?php if(!empty($err[43])) echo "style='border-color:red;' autofocus";?> onblur="(this.type='text')" class="form-control" name="cocurrdate" id ="cocurrdate_id" placeholder="* Date">
                            <span class="error" id ="codate"><?php if(!empty($err[43])) echo $err[43];?></span>
                        </div>
                    </div>
                    <br><br><br>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Role :</label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                            <input type="text" id ="cocurrole" class="form-control" name="cocurrrole" placeholder="Role">
                            <span class="error" id ="corole"></span>
                        </div>
                    </div>
                    <br><br><br>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Type :</label>
                        <div class="col-md-6 col-sm-9 col-lg-7 col-xs-6">
                            <div class="col-md-6 col-sm-9 col-lg-7 col-xs-6">
                                <label class="radio-inline"><input type="radio" name="cocurrtype" checked onclick="var input = document.getElementById('name22'); if(this.checked){ input.disabled = true; input.focus();}else{input.disabled=false;}">K. J. Somaiya (InHouse)</label>

                                <label class="radio-inline"><input type="radio" name="cocurrtype" for="name2" onclick="var input = document.getElementById('name22'); if(this.checked){ input.disabled = false; input.focus();}else{input.disabled=true;}">Other</label>
                            </div>
                            <div class="col-md-6 col-sm-9 col-lg-3 col-xs-6">
                                <input class="form-control" id ="name22" name="name22" disabled="true" type="text"/>
                            </div>
                        </div>
                    </div>
                    <br><br><br>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Certificate : </label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                            <input type="file" name="changeName_certificate_image" id="changeName_certificate_image" accept="application/pdf" />
                        </div>
                    </div>
                    <br><br>
					<?php
					$new_field_query="select * from new_fields where table_name='co_curricular'";
					$result=$conn->query($new_field_query);
					if($result->num_rows>0){
					while($row=$result->fetch_assoc()) {
					$field_name = $row['field_name'];
					$label = $row['label'];
					$display = $row['display'];
					if($display==1) {
					echo "<div class=\"form-group\">
                                                    <label class=\"col-sm-3 col-md-3 col-lg-3 col-xs-3\">" . $label . " : </label>
                                                    <div class=\"col-md-6 col-sm-9 col-lg-6 col-xs-6\">";?>
                    <input class="form-control"
						<?php
						echo 'name="'.$field_name.'" placeholder="Enter '.$label.'"';
						?>
                    >
                    <span class=\"error\"><?php echo $err[27]; ?></span>
        </div>
    </div> <br><br><br>
	<?php
	}
	}
	}
	?>
    <div class="form-group">
        <input type="submit" <?php if($gender=='null') echo "disabled title='Please fill Personal details first'"?> style="color:white;" class="btn btn-primary btn-md" value="Submit" name = "submitcocurricular">
    </div>
    </fieldset>
    </form>
    </div>
    </div>

    <!--FORM 7-->
    <div class="col-sm-10 col-lg-10 col-md-10 col-xs-10 well">
        <div id ="section7">
            <form method="POST" onsubmit="return extra()" name="ext7" enctype="multipart/form-data">
                <fieldset>
                    <legend><h2>Extra Activities</h2></legend>
                    <br>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Activity Name :</label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                            <input type="text" class="form-control" placeholder="* Name of the Activity" name = "extraname" id ="extraname1">
                            <span class="error" id ="extname"></span>
                        </div>
                    </div>
                    <br><br><br><br>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Description:</label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                            <textarea id ="extradesc" class="form-control" name="extradescription" cols="50" rows="6" placeholder="Description of Activity"></textarea>
                            <span class="error" id ="extdesc"></span>
                        </div>
                    </div>
                    <br><br><br><br><br><br><br><br><br>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Date :</label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                            <input onfocus="(this.type='date')" <?php if(!empty($err[44])) echo "style='border-color:red;' autofocus";?> onblur="(this.type='text')" class="form-control" name="extradate" placeholder="* Date" id="extradate1">
                            <span class="error" id ="extdate"><?php if(!empty($err[44])) echo $err[44];?></span>
                        </div>
                    </div>
                    <br><br><br><br>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Role :</label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                            <input type="text" id ="extrole" class="form-control" name="extrarole" placeholder="Role">
                        </div>
                    </div>
                    <br><br><br><br>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Location :</label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                            <input type="text" id ="extplace" class="form-control" name="extraplace" placeholder="Location">
                        </div>
                    </div>
                    <br><br><br> 
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Certificate : </label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                            <input type="file" name="changeName_certificate_image" id="changeName_certificate_image" accept="application/pdf" />
                        </div>
                    </div>
                    <br><br>

                    <?php
					$new_field_query="select * from new_fields where table_name='extra'";
					$result=$conn->query($new_field_query);
					if($result->num_rows>0){
					while($row=$result->fetch_assoc()) {
					$field_name = $row['field_name'];
					$label = $row['label'];
					$display = $row['display'];
					if($display==1) {
					echo "<div class=\"form-group\">
                                                    <label class=\"col-sm-3 col-md-3 col-lg-3 col-xs-3\">" . $label . " : </label>
                                                    <div class=\"col-md-6 col-sm-9 col-lg-6 col-xs-6\">";?>
                    <input class="form-control"
						<?php
						echo 'name="'.$field_name.'" placeholder="Enter '.$label.'"';
						?>
                    >
                    <span class=\"error\"><?php echo $err[27]; ?></span>
        </div>
    </div> <br><br>
	<?php
	}
	}
	}
	?><br>
    <div class="form-group">
        <input type="submit" <?php if($gender=='null') echo "disabled title='Please fill Personal details first'"?> style="color:white;" class="btn btn-primary btn-md" value="Submit" name = "submitextra">
    </div>
    </fieldset>
    </form>
    </div>
    </div>
    <div class="col-sm-10 col-lg-10 col-md-10 col-xs-10 well">
        <div id ="awards">
            <form method="POST" action="" onsubmit="return awards()" name="awards_form" enctype="multipart/form-data">
                <fieldset>
                    <legend><h2>Awards and Achievements</h2></legend>
                    <br>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Title :</label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                            <input type="text" class="form-control" placeholder="* Title of the Award/Achievement" name = "award_name" id ="award_name">
                            <span class="error" id ="awdname"></span>
                        </div>
                    </div>
                    <br><br><br>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Honour Date :</label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                            <input onfocus="(this.type='date')" <?php if(!empty($err[44])) echo "style='border-color:red;' autofocus";?> onblur="(this.type='date')" class="form-control" name="award_date" placeholder="* Honour Date" id="award_date">
                            <span class="error" id ="awddate"><?php if(!empty($err[44])) echo $err[44];?></span>
                        </div>
                    </div>
                    <br><br><br>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Issuer :</label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                            <input type="text" id ="award_issuer" class="form-control" name="award_issuer" placeholder="* Issuer">
                            <span class="error" id ="awdissuer"><?php if(!empty($err[44])) echo $err[44];?></span>
                        </div>
                    </div>
                    <br><br><br>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Description:</label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                            <textarea id ="award_desc" class="form-control" name="award_description" cols="50" rows="6" placeholder="Description"></textarea>
                            <span class="error" id ="awddesc"></span>
                        </div>
                    </div>
                    <br><br><br><br><br><br><br><br>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Certificate : </label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                            <input type="file" name="award_certificate_image" id="award_certificate_image" accept="application/pdf" />
                        </div>
                    </div>
                    <br><br>
					<?php
					$new_field_query="select * from new_fields where table_name='awards'";
					$result=$conn->query($new_field_query);
					if($result->num_rows>0){
					while ($row = $result->fetch_assoc()) {
					$field_name = $row['field_name'];
					$label = $row['label'];
					$display = $row['display'];
					if ($display == 1) {
					echo "<div class=\"form-group\">
                                                    <label class=\"col-sm-3 col-md-3 col-lg-3 col-xs-3\">" . $label . " : </label>
                                                    <div class=\"col-md-6 col-sm-9 col-lg-6 col-xs-6\">"; ?>
                    <input class="form-control"
						<?php
						echo 'name="' . $field_name . '" placeholder="Enter ' . $label . '"';
						?>
                    >
                    <span class=\"error\"><?php echo $err[27]; ?></span>
        </div>
    </div>
    <br><br><br>
	<?php
	}
	}
	}
	?>
    <div class="form-group">
        <input type="submit" style="color:white;" class="btn btn-primary btn-md" value="Submit" name="submit_award">
    </div>
    </fieldset>
    </form>
    </div>
    </div>
</center>
</body>
</html>