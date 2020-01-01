<?php include 'EditEditPage_Php.php' ?>
<html>
<html lang="en">
<head>
    <title>Edit : <?php echo $form; ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href='https://fonts.googleapis.com/css?family=NTR' rel='stylesheet'>
    <style>
        .navbar
        {
            background-color : #3C2AE6;
            border : none;
            border-radius : 0px;
        }

        #navleft
        {
            color : white;
            margin-top : 1%;
            font-size : 18px;
        }

        input[type=submit], input[type=submit]:hover
        {
            background-color : #3C2AE6;
        }

        a,a:hover
        {
            color : #3C2AE6;
            text-decoration: none;
        }
        #setbtn
        {
            background-color : #3C2AE6;
            margin-top:9px;
            border : none;
            font-size : 20px;
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
    <script src="hediting4.js"></script>
    <script >
        var a = "<?php echo $coursecategory;?>";
    </script>
</head>

<body onload="edit()">


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

<div class="col-lg-3 col-md-3 col-xs-3 col-sm-3">

</div>



<center>
    <div class="container-fluid col-lg-6 col-md-6 col-xs-6 col-sm-6">
        <!-- COURSES TAUGHT -->
        <div id ="section3" class="well">
            <form method="post" onsubmit="return coursesvalidation()" name="coursestaught">
                <fieldset>
                    <legend>
                        <div class="col-lg-3 col-md-3 col-xs-3 col-sm-3">
                            <?php echo "<a href = 'EditProfile.php?parameter=".$arg."#section3'><font size='4'><span class='glyphicon glyphicon-arrow-left'></span>&nbspGo Back</font></a>";
                            ?>
                        </div>
                        <div class="col-lg-6 col-md-6 col-xs-6 col-sm-6">
                            <h2>Courses Taught</h2>
                        </div>
                    </legend>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Category: </label>
                        <div class="category_div" id ="category_div">
                            <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                                <select name="category" class="required-entry form-control" id ="category_id" onchange="javascript: dynamicdropdown(options[this.selectedIndex].value);" >
                                    <option value="">Select course type</option>
                                    <option value="UG" <?php if($coursecategory == "UG") echo "selected";?> >UG</option>
                                    <option value="PG" <?php if($coursecategory == "PG") echo "selected";?> >PG</option>
                                    <option value="Labcourses" <?php if($coursecategory == "Labcourses") echo "selected";?> >Lab Courses</option>
                                    <option value="AC" <?php if($coursecategory == "AC") echo "selected";?> >Audit Course</option>
                                    <option value="IDC" <?php if($coursecategory == "IDC") echo "selected";?> >IDC</option>
                                </select>


                                <span class="error" id ="coursetype"></span>
                            </div>
                        </div>
                    </div>
                    <br><br>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Courses: </label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                            <div class="sub_category_div" id ="sub_category_div">

                                <script type="text/javascript" language="JavaScript">
                                    document.write('<select name="subcategory" class="form-control" id="subcategory"></select>');
                                </script>
                                <span class="error" id ="course"> </span>
                            </div>
                        </div>
                    </div>
                    <br><br>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Year: </label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                            <select class="form-control" name="courseyear" id ="courseyear_id" >
                                <option value="">* Select Year</option>
                                <?php
                                foreach ($yearArray as $year) {
                                    if($courseyear == $year)
                                        echo '<option value="'.$year.'" selected>'.$year.'</option>';
                                    else
                                        echo '<option value="'.$year.'" >'.$year.'</option>';
                                }
                                ?>
                            </select>
                            <span class="error" id ="courseyear1"></span>
                        </div>
                    </div>
                    <br><br>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Semester: </label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                            <select class="form-control" name="coursesem" id ="coursesem_id">
                                <option value="">* Select semester</option>
                                <option value="SEM I" <?php if($coursesem == "SEM I") echo "selected";?> >SEM I</option>
                                <option value="SEM II" <?php if($coursesem == "SEM II") echo "selected";?> >SEM II</option>
                                <option value="SEM III" <?php if($coursesem == "SEM III") echo "selected";?> >SEM III</option>
                                <option value="SEM IV" <?php if($coursesem == "SEM IV") echo "selected";?> >SEM IV</option>
                                <option value="SEM V" <?php if($coursesem == "SEM V") echo "selected";?> >SEM V</option>
                                <option value="SEM VI" <?php if($coursesem == "SEM VI") echo "selected";?> >SEM VI</option>
                                <option value="SEM VII" <?php if($coursesem == "SEM VII") echo "selected";?> >SEM VII</option>
                                <option value="SEM VIII" <?php if($coursesem == "SEM VIII") echo "selected";?> >SEM VIII</option>
                            </select>
                            <span class="error" id ="coursesem1"></span>
                        </div>
                    </div>
                    <br><br>
                    <div class="form-group">
                        <input type="submit" style="color:white;" class="btn btn-primary btn-md" value="Update" name = "submitcourses">
                    </div>
            </form>
        </div>

        <!-- PROJECTS-GUIDED -->
        <div id ="section4" class="well">
            <form method="POST" name="project" onsubmit="return projguided()" enctype="multipart/form-data">
                <fieldset>
                    <legend>
                        <div class="col-lg-3 col-md-3 col-xs-3 col-sm-3">
                            <?php echo "<a href = 'EditProfile.php?parameter=".$arg."#section4'><font size='4'><span class='glyphicon glyphicon-arrow-left'></span>&nbspGo Back</font></a>";
                            ?>
                        </div>
                        <div class="col-lg-6 col-md-6 col-xs-6 col-sm-6">
                            <h2>Projects Guided</h2>
                        </div>
                    </legend>
                    <div class="form-group">
                        <!-- TITLE OF PROJECT -->
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Project Title: </label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                            <input type="text" class="form-control" name="projtitle" value="<?php echo $title;?>" id ="projtitleid" placeholder="* Project's Title">
                            <span class="error" id ="projname"></span>
                        </div>
                    </div>
                    <br><br><br>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Project Type: </label>
                        <div class="col-md-6 col-sm-9 col-lg-8 col-xs-6">
                            <div class="col-md-7 col-sm-7 col-lg-8 col-xs-8">
                                <label class="radio-inline"><input type="radio" name="projtype"  checked value = "BEPROJECT" <?php if($type == "BE Project") echo 'checked';?> onclick="var input = document.getElementById('name2'); if(this.checked){ input.disabled = true; input.focus();}else{input.disabled=false;}">B.E Project</label>

                                <label class="radio-inline"><input type="radio" name="projtype" value = "Internship" <?php if($type == "Internship") echo 'checked';?> onclick="var input = document.getElementById('name2'); if(this.checked){ input.disabled = true; input.focus();}else{input.disabled=false;}">Internship</label>

                                <label class="radio-inline"><input type="radio" <?php if($type != "BE Project" && $type != "Internship") echo 'checked';?> name="projtype" for="name2" onclick="var input = document.getElementById('name2'); if(this.checked){ input.disabled = false; input.focus();}else{input.disabled=true;}">Other</label>
                            </div>
                            <div class="col-sm-3 col-md-3 col-lg-4 col-xs-3">
                                <input class="form-control" id ="name2" name="name2" <?php if($type != "BE Project" && $type != "Internship") echo 'value ="'.$type.'"'; else echo 'disabled="true"'; ?> type="text"/>
                            </div>
                            <span class="error" id ="projtypeerr"></span>
                        </div>
                    </div>
                    <br><br><br>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Project Description: </label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                            <input type="text" class="form-control" name="projdesc" value="<?php echo $description;?>" id ="projdescid" placeholder="Project's Description">
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
                                foreach ($yearArray as $year1) {
                                    if($year == $year1)
                                        echo '<option value="'.$year1.'" selected>'.$year1.'</option>';
                                    else
                                        echo '<option value="'.$year1.'" >'.$year1.'</option>';
                                }
                                ?>
                            </select>
                            <span class="error" id ="projyearerr"></span>
                        </div>
                    </div>
                    <br><br>
                    <div class="form-group">
                        <label>STUDENT DETAILS : </label>
                        <br>
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
                                    <td><input type="text" class="form-control" name="projstud1name" value="<?php echo $s1name;?>" id ="projstud1nameid">
                                        <span class="error" id ="projstud1name"></span></td></td>
                                    <td><input type="number" max="9999999" class="form-control" name="projstud1roll" value="<?php echo $s1roll;?>" id ="projstud1rollid">
                                        <span class="error" id ="projstud1roll"></span></td>
                                    <td><input type="text" class="form-control" name="projstud1email" value="<?php echo $s1email;?>" id ="projstud1email">
                                        <span class="error" id ="projstud1emailerr"></span></td>
                                </tr>
                                <tr>
                                    <td><center>2.</center></td>
                                    <td><input type="text" class="form-control" name="projstud2name" value="<?php echo $s2name;?>" id ="projstud2nameid">
                                        <span class="error" id ="projstud2name"></span></td></td>
                                    <td><input type="number" max="9999999" class="form-control" name="projstud2roll" value="<?php echo $s2roll;?>" id ="projstud2rollid">
                                        <span class="error" id ="projstud2roll"></span></td>
                                    <td><input type="text" class="form-control" name="projstud2email" value="<?php echo $s2email;?>" id ="projstud2email">
                                        <span class="error" id ="projstud2emailerr"></span></td>
                                </tr>
                                <tr>
                                    <td><center>3.</center></td>
                                    <td><input type="text" class="form-control" name="projstud3name" value="<?php echo $s3name;?>" id ="projstud3nameid">
                                        <span class="error" id ="projstud3name"></span></td></td>
                                    <td><input type="number" max="9999999" class="form-control" name="projstud3roll" value="<?php echo $s3roll;?>" id ="projstud3rollid">
                                        <span class="error" id ="projstud3roll"></span></td>
                                    <td><input type="text" class="form-control" name="projstud3email" value="<?php echo $s3email;?>" id ="projstud3email">
                                        <span class="error" id ="projstud3emailerr"></span></td>
                                </tr>
                                <tr>
                                    <td><center>4.</center></td>
                                    <td><input type="text" class="form-control" name="projstud4name" value="<?php echo $s4name;?>" id ="projstud4nameid">
                                        <span class="error" id ="projstud4name"></span></td></td>
                                    <td><input type="number" max="9999999" class="form-control" name="projstud4roll" value="<?php echo $s4roll;?>" id ="projstud4rollid">
                                        <span class="error" id ="projstud4roll"></span></td>
                                    <td><input type="text" class="form-control" name="projstud4email" value="<?php echo $s4email;?>" id ="projstud4email">
                                        <span class="error" id ="projstud4emailerr"></span></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <!-- SUBMIT -->
                        <input type="submit"  style="color:white;" class="btn btn-primary btn-md" value="Update" name = "submitprojects">
                    </div>
                </fieldset>
            </form>
        </div>

        <!-- PUBLICATIONS-BOOKS -->
        <div id ="section41" class="well">
            <form method="POST"  name="publicationbooks" onsubmit="return validateBook()" enctype="multipart/form-data">
                <fieldset>
                    <legend>
                        <div class="col-lg-3 col-md-3 col-xs-3 col-sm-3">
                            <?php echo "<a href = 'EditProfile.php?parameter=".$arg."#section41'><font size='4'><span class='glyphicon glyphicon-arrow-left'></span>&nbspGo Back</font></a>";
                            ?>
                        </div>
                        <div class="col-lg-6 col-md-6 col-xs-6 col-sm-6">
                            <h2>Publications</h2>
                        </div>
                    </legend>
                    <h3>Books</h3>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Book Name: </label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                            <input type="text" class="form-control" name="bookname" id ="booknameid" value = "<?php echo $bookname; ?>" placeholder="Book's Name">
                            <span class="error" id ="bname"></span>
                        </div>
                    </div>
                    <br><br><br>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Book ISBN Number: </label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                            <input type="text"  class="form-control" name="bookisbn" id ="bookisbnid" value = "<?php echo $isbn; ?>" placeholder="ISBN Number">
                            <span class="error" id ="bookisbn"></span>
                        </div></div>
                    <br><br><br>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Date of Publication: </label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                            <input onfocus="(this.type='date')" onblur="(this.type='text')" <?php if(!empty($err[3])) echo "autofocus"; ?> id ="pubdateid" value = "<?php echo $datepub; ?>" class="form-control" name="pubdate" placeholder="Date of Publication">
                            <span class="error" id ="pubdate"><?php echo $err[3]; ?></span>
                        </div>
                    </div>
                    <br><br><br>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Edition: </label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                            <input type="text" class="form-control" name="bookedition" value = "<?php echo $edition; ?>" placeholder="Book Edition">
                        </div>
                    </div>
                    <br><br><br>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Publisher's Name: </label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                            <input type="text"  class="form-control" name="book_pub_name" id ="book_pub_nameid" value = "<?php echo $pubname; ?>" placeholder="Publisher's Name">
                            <span class="error" id ="book_pub_name"></span>
                            <br>
                        </div>
                    </div>
                    <br><br><br>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Author's Name: </label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                            <input type="text"  class="form-control" name="book_auth_name" id ="book_auth_nameid" value = "<?php echo $author; ?>" placeholder="Author's Name">
                            <span class="error" id ="book_auth_name"></span>
                        </div></div>
                    <br><br><br>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Author's Institute: </label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                            <input type="text" id ="bookauthinst" class="form-control" name="book_auth_inst" value = "<?php echo $authorinst; ?>" placeholder="Author's Institute">
                        </div>
                    </div>
                    <br><br><br>
                    <div class="form-group">
                        Co-Author 1:<br>
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Name: </label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                            <input type="text" id ="bookcoauthname1" class="form-control" name="book_coauth_name1" value = "<?php echo $coa1; ?>" placeholder="Name">
                        </div></div>
                    <br><br><br>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Institute: </label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                            <input type="text" id ="bookcoauthinst1" class="form-control" name="book_coauth_inst1" value = "<?php echo $coa1inst; ?>" placeholder="Institute">
                        </div></div>
                    <br><br><br>
                    <div class="form-group">
                        Co-Author 2:<br>
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Name: </label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                            <input type="text" id ="bookcoauthname2" class="form-control" name="book_coauth_name2" value = "<?php echo $coa2; ?>" placeholder="Name">
                        </div></div>
                    <br><br><br>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Institute: </label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                            <input type="text" id ="bookcoauthinst2" class="form-control" name="book_coauth_inst2" value = "<?php echo $coa2inst; ?>" placeholder="Institute">
                        </div>
                    </div>
                    <br><br><br>
                    <div class="form-group">
                        Co-Author 3:<br>
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Name: </label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                            <input type="text" id ="bookcoauthname3" class="form-control" name="book_coauth_name3" value = "<?php echo $coa3; ?>" placeholder="Name">
                        </div>
                    </div>
                    <br><br><br>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Institute: </label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                            <input type="text" id ="bookcoauthinst3" class="form-control" name="book_coauth_inst3" value = "<?php echo $coa3inst; ?>" placeholder="Institute">
                        </div>
                    </div>
                    <br><br><br>
                    <div class="form-group">
                        <label>Book's Cover Page : </label>
                        <?php
                        if(!empty($cover))
                            echo $pdf1;
                        ?>
                        <input type="file" name="book_image" id ="book_image" accept="application/pdf"/>
                    </div>
                    <br><br><br>
                    <div class="form-group">
                        <input type="submit" style="color:white;" class="btn btn-primary btn-md" value="Update" name = "submitpublicationbooks">
                    </div>
                </fieldset>
            </form>
        </div>


        <!--Form 4.2-->
        <div id = "section42" class="well">
            <form method="post" action="" name="publicationjournal" onsubmit="return validateJour()" enctype="multipart/form-data" >
                <fieldset>
                    <legend>
                        <div class="col-lg-3 col-md-3 col-xs-3 col-sm-3">
                            <?php echo "<a href = 'EditProfile.php?parameter=".$arg."#section42'><font size='4'><span class='glyphicon glyphicon-arrow-left'></span>&nbspGo Back</font></a>";
                            ?>
                        </div>
                        <div class="col-lg-6 col-md-6 col-xs-6 col-sm-6">
                            <h2>Publications</h2>
                        </div>
                    </legend>
                    <h3>Journals</h3>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Paper's Title: </label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                            <input type="text" id ="journaltitleid" class="form-control" name="journal_title" value = "<?php echo $title; ?>" placeholder="Paper's Title">
                            <span class="error" id ="journal_title"></span>
                        </div>
                    </div>
                    <br><br><br>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Journal's Name: </label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                            <input type="text"  class="form-control" name="journal_name" id ="journal_nameid" value = "<?php echo $name; ?>" placeholder="* Journal's Name" >
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
                    <legend>Co-Authors</legend>
                    <?php
                    for($i=1;$i<=$count;$i++)
                    {
                        if($i==1)
                        {
                            echo '<div class="form-group">';
                            echo '<label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Co-Author Name:</label>';
                            echo '<div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">';
                            echo '<input type="text" id ="jourcoauthname1" class="form-control" value = '.$coa1.' name="jour_coauth_name1" placeholder="Co Author 1"><span class="=error" id="jour_coauth_name1"></span>';
                            echo '</div>';
                            echo '<br><br>';
                            echo '<label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Co-Author Affiliation:</label>';
                            echo '<div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">';
                            echo '<input type="text" id ="jourcoauthnameaff1" class="form-control" value = '.$coa1aff.' name="jour_coauth_nameaff1" placeholder="Co Author 1 affiliation"><span class="=error" id="jour_coauth_nameaff1"></span>';
                            echo '</div>';
                            echo '</div>';
                            echo '<br><br>';
                        }
                        if($i==2){
                            echo '<div class="form-group">';
                            echo '<label id="cojour'.$i.'"class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Co-Author Name:</label>';
                            echo '<div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">';
                            echo '<input type="text" id ="jourcoauthname2" class="form-control" value = '.$coa2.' name="name2" placeholder="Co Author 2">';
                            echo '</div>';
                            echo '<br class="br2"><br class="br2">';
                            echo '<label id="cojour2'.$i.'"class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Co-Author Affiliation:</label>';
                            echo '<div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">';
                            echo '<input type="text" id ="jourcoauthnameaff2" class="form-control" value = '.$coa2aff.' name="name2_affiliation" placeholder="Co Author 2 affiliation">';
                            echo '</div>';
                            echo '</div>';
                            echo '<br class="br2"><br class="br2">';
                        }
                        if($i==3){
                            echo '<div class="form-group">';
                            echo '<label id="cojour'.$i.'"class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Co-Author Name:</label>';
                            echo '<div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">';
                            echo '<input type="text" id ="jourcoauthname3" class="form-control" value = '.$coa3.' name="name3" placeholder="Co Author 3">';
                            echo '</div>';
                            echo '<br class="br3"><br class="br3">';
                            echo '<label id="cojour2'.$i.'"class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Co-Author Affiliation:</label>';
                            echo '<div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">';
                            echo '<input type="text" id ="jourcoauthnameaff3" class="form-control" value = '.$coa3aff.' name="name3_affiliation" placeholder="Co Author 3 affiliation">';
                            echo '</div>';
                            echo '</div>';
                            echo '<br class="br3"><br class="br3">';
                        }
                        if($i==4){
                            echo '<div class="form-group">';
                            echo '<label id="cojour'.$i.'"class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Co-Author Name:</label>';
                            echo '<div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">';
                            echo '<input type="text" id ="jourcoauthname4" class="form-control" value = '.$coa4.' name="name4" placeholder="Co Author 4">';
                            echo '</div>';
                            echo '<br class="br4"><br class="br4">';
                            echo '<label id="cojour2'.$i.'"class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Co-Author Affiliation:</label>';
                            echo '<div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">';
                            echo '<input type="text" id ="jourcoauthnameaff4" class="form-control" value = '.$coa4aff.' name="name4_affiliation" placeholder="Co Author 4 affiliation">';
                            echo '</div>';
                            echo '</div>';
                            echo '<br class="br4"><br class="br4">';
                        }
                        if($i==5){
                            echo '<div class="form-group">';
                            echo '<label id="cojour'.$i.'"class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Co-Author Name:</label>';
                            echo '<div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">';
                            echo '<input type="text" id ="jourcoauthname5" class="form-control" value = '.$coa5.' name="name5" placeholder="Co Author 5">';
                            echo '</div>';
                            echo '<br class="br5"><br class="br5">';
                            echo '<label id="cojour2'.$i.'"class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Co-Author Affiliation:</label>';
                            echo '<div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">';
                            echo '<input type="text" id ="jourcoauthnameaff5" class="form-control" value = '.$coa5aff.' name="name5_affiliation" placeholder="Co Author 5 affiliation">';
                            echo '</div>';
                            echo '</div>';
                            echo '<br class="br5"><br class="br5">';
                        }
                        if($i==6){
                            echo '<div class="form-group">';
                            echo '<label id="cojour'.$i.'"class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Co-Author Name:</label>';
                            echo '<div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">';
                            echo '<input type="text" id ="jourcoauthname6" class="form-control" value = '.$coa6.' name="name6" placeholder="Co Author 6">';
                            echo '</div>';
                            echo '<br class="br6"><br class="br6">';
                            echo '<label id="cojour2'.$i.'"class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Co-Author Affiliation:</label>';
                            echo '<div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">';
                            echo '<input type="text" id ="jourcoauthnameaff6" class="form-control" value = '.$coa6aff.' name="name6_affiliation" placeholder="Co Author 6 affiliation">';
                            echo '</div>';
                            echo '</div>';
                            echo '<br class="br6"><br class="br6">';
                        }
                        if($i==7){
                            echo '<div class="form-group">';
                            echo '<label id="cojour'.$i.'"class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Co-Author Name:</label>';
                            echo '<div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">';
                            echo '<input type="text" id ="jourcoauthname7" class="form-control" value = '.$coa7.' name="name7" placeholder="Co Author 7">';
                            echo '</div>';
                            echo '<br class="br7"><br class="br7">';
                            echo '<label id="cojour2'.$i.'"class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Co-Author Affiliation:</label>';
                            echo '<div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">';
                            echo '<input type="text" id ="jourcoauthnameaff7" class="form-control" value = '.$coa7aff.' name="name7_affiliation" placeholder="Co Author 7 affiliation">';
                            echo '</div>';
                            echo '</div>';
                            echo '<br class="br7"><br class="br7">';
                        }
                        if($i==8){
                            echo '<div class="form-group">';
                            echo '<label id="cojour'.$i.'"class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Co-Author Name:</label>';
                            echo '<div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">';
                            echo '<input type="text" id ="jourcoauthname8" class="form-control" value = '.$coa8.' name="name8" placeholder="Co Author 8">';
                            echo '</div>';
                            echo '<br class="br8"><br class="br8">';
                            echo '<label id="cojour2'.$i.'"class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Co-Author Affiliation:</label>';
                            echo '<div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">';
                            echo '<input type="text" id ="jourcoauthnameaff8" class="form-control" value = '.$coa8aff.' name="name8_affiliation" placeholder="Co Author 8 affiliation">';
                            echo '</div>';
                            echo '</div>';
                            echo '<br class="br8"><br class="br8">';
                        }
                        if($i==9){
                            echo '<div class="form-group">';
                            echo '<label id="cojour'.$i.'"class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Co-Author Name:</label>';
                            echo '<div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">';
                            echo '<input type="text" id ="jourcoauthname9" class="form-control" value = '.$coa9.' name="name9" placeholder="Co Author 9">';
                            echo '</div>';
                            echo '<br class="br9"><br class="br9">';
                            echo '<label id="cojour2'.$i.'"class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Co-Author Affiliation:</label>';
                            echo '<div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">';
                            echo '<input type="text" id ="jourcoauthnameaff9" class="form-control" value = '.$coa9aff.' name="name9_affiliation" placeholder="Co Author 9 affiliation">';
                            echo '</div>';
                            echo '</div>';
                            echo '<br class="br9"><br class="br9">';
                        }
                        if($i==10){
                            echo '<div class="form-group">';
                            echo '<label id="cojour'.$i.'"class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Co-Author Name:</label>';
                            echo '<div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">';
                            echo '<input type="text" id ="jourcoauthname10" class="form-control" value = '.$coa10.' name="name10" placeholder="Co Author 10">';
                            echo '</div>';
                            echo '<br class="br10"><br class="br10">';
                            echo '<label id="cojour2'.$i.'"class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Co-Author Affiliation:</label>';
                            echo '<div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">';
                            echo '<input type="text" id ="jourcoauthnameaff10" class="form-control" value = '.$coa10aff.' name="name10_affiliation" placeholder="Co Author 10 affiliation">';
                            echo '</div>';
                            echo '</div>';
                            echo '<br class="br10"><br class="br10">';
                        }
                    }
                    ?>
                    <div class="form-group">
                        <p id ="inputs"></p>
                    </div>
                    <div class="form-group">
                        <input type="button" value="Add Co-Authors" style="color:white;background-color:#3C2AE6;" <?php if($count==10) echo "disabled title='Can add only 10 co authors'"?>
                               class="btn btn-primary btn-md" value="Add co authors" id ="addInput" />
                        <input type="button" style="color:white;background-color:#3C2AE6;"  class="btn" value="Remove"  id="rem" />
                        <br>
                        <span class="error" id ="limitidjour"></span>
                        <br>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Publisher's Name: </label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                            <input type="text" id ="journal_pub_nameid" class="form-control" name="journal_pub_name" value = "<?php echo $pubname; ?> " placeholder="* Publisher's Name">
                            <span class="error" id ="journal_pub_name"></span>
                        </div>
                    </div>
                    <br><br><br>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Digital Object Identifier : </label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                            <input type="text" id ="journal_doiid" class="form-control" name="journal_doi" value = "<?php echo $doi; ?>" placeholder=" Digital Object Identifier">
                            <span class="error" id ="journal_doi"></span>
                        </div>
                    </div>
                    <br><br><br>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Date of Publication: </label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                            <input onfocus="(this.type='date')" value = "<?php echo $date; ?>" <?php if(!empty($err[34])) echo "style='border-color:red;' autofocus"; ?> onblur="(this.type='text')" id ="jour_dateid" class="form-control" name="jour_date" placeholder="* Date of Publication">
                            <span class="error" id ="jour_date"><?php if(!empty($err[34])) echo $err[34]; ?></span>
                        </div></div>
                    <br><br><br>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Impact Factor: </label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                            <input type="number" id ="journal_impactid" min="0" class="form-control" name="journal_impact" value = "<?php echo $impactfactor; ?>" placeholder="Impact Factor">
                            <span class="error" id ="journal_impact"></span>
                        </div>
                    </div>
                    <br><br><br>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Journal's Type: </label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                            <label class="radio-inline"><input type="radio" name="journal_type" <?php if($type == "National") echo "checked";?> value="National">National</label>
                            <label class="radio-inline"><input type="radio" name="journal_type" <?php if($type == "International") echo "checked";?> value="International">International</label>
                        </div>
                    </div>
                    <br><br><br>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Volume</label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                            <input type="text" name="journal_vol" id ="journal_volid" class="form-control" value = "<?php echo $volume; ?>" placeholder="Volume">
                            <span class="error" id ="journal_vol"></span>
                        </div>
                    </div>
                    <br><br><br>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Is it a book chapter?</label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                            <label class="radio-inline"><input type="radio" name="journal_book" <?php if($bookchapter == "YES") echo "checked";?> value="YES">Yes</label>
                            <label class="radio-inline"><input type="radio" name="journal_book" <?php if($bookchapter == "NO") echo "checked";?> value="NO">No</label>
                        </div></div>
                    <br><br><br>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Issue No</label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                            <input type="text" name="journal_issue" class="form-control" id ="journal_issueid" value = "<?php echo $issue; ?>" placeholder="Issue no.">
                            <span class="error" id ="journal_issue"></span>
                        </div></div>
                    <br><br><br>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Peer Reviewed ?</label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                            <label class="radio-inline"><input type="radio" name="journal_peer" <?php if($peerreviewed == "YES") echo "checked";?> value="YES">Yes</label>
                            <label class="radio-inline"><input type="radio" name="journal_peer" <?php if($peerreviewed == "NO") echo "checked";?> value="NO">No</label>
                        </div></div>
                    <br><br><br>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Page Number : </label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                            <input type="text" name="journal_pg" id ="journal_pgid" class="form-control" value = "<?php echo $pageno; ?>" placeholder="Page Number">
                            <span class="error" id ="journal_pg"></span>
                        </div></div>
                    <br><br><br>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">ISSN Number : </label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                            <input type="text" name="journal_issn" class="form-control" id ="journal_issnid" value = "<?php echo $issn; ?>" placeholder="ISSN number">
                            <span class="error" id ="journal_issn"></span>
                        </div></div>
                    <br><br><br>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Paid ? </label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                            <label class="radio-inline"><input type="radio" name="journal_paid" <?php if($paid == "YES") echo "checked";?> value="YES">Yes</label>
                            <label class="radio-inline"><input type="radio" name="journal_paid" <?php if($paid == "NO") echo "checked";?> value="NO">No</label>
                        </div></div>
                    <br><br><br>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Citation Index : </label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                            <input type="text" name="journal_cite" id ="journal_citeid" class="form-control" value = "<?php echo $citation; ?>" placeholder="Citation Index">
                            <span class="error" id ="journal_cite"></span>
                        </div>
                    </div>
                    <br><br><br>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Listed In SJR ?</label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                            <label class="radio-inline"><input type="radio" name="journal_sjr" <?php if($sjr == "YES") echo "checked";?> value="YES">Yes</label>
                            <label class="radio-inline"><input type="radio" name="journal_sjr" <?php if($sjr == "NO") echo "checked";?> value="NO">No</label>
                        </div>
                    </div>
                    <br><br><br>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Paper</label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                            <?php
                            if(!empty($paperpdf))
                                echo $pdf2;
                            ?>
                            <br>
                            <input type="file" name="paper_image" accept="application/pdf" />
                        </div>
                    </div>
                    <br><br><br>
                    <div>
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Certificate: </label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                            <?php
                            if(!empty($certificate))
                                echo $pdf3;
                            ?>
                            <input type="file" name="certificate_image" accept="application/pdf" />
                        </div>
                    </div>
                    <br><br><br>
                    <div class="form-group">
                        <input type="submit" style="color:white;" class="btn btn-primary btn-md" value="Submit" name = "submitjournals">
                    </div>
                </fieldset>
            </form>
        </div>

        <!-- PUBLICATIONS-CONFERENCES -->
        <div id ="section43" class="well">
            <form method="POST" onsubmit="return validateConf()" name="publicationconf" enctype="multipart/form-data">
                <fieldset>
                    <legend>
                        <div class="col-lg-3 col-md-3 col-xs-3 col-sm-3">
                            <?php echo "<a href = 'EditProfile.php?parameter=".$arg."#section43'><font size='4'><span class='glyphicon glyphicon-arrow-left'></span>&nbspGo Back</font></a>";
                            ?>
                        </div>
                        <div class="col-lg-6 col-md-6 col-xs-6 col-sm-6">
                            <h2>Publications</h2>
                        </div>
                    </legend>
                    <h3>Conferences</h3>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Name : </label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                            <input type="text" id ="conf_nameid" class="form-control" name="conf_name" value = "<?php echo $name; ?>" placeholder="* Conference Name">
                            <span class="error" id ="conf_name"></span>
                        </div></div>
                    <br><br><br>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Are you the first Author ?</label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                            <label class="radio-inline"><input type="radio" name="conf_fauth" value = "YES" checked onclick="var input = document.getElementById('conf_fauth'); if(this.checked){ input.disabled = true; input.focus();}else{input.disabled=false;}">YES</label>
                            <label class="radio-inline"><input type="radio" name="conf_fauth" value = "NO" for="conf_fauth" onclick="var input = document.getElementById('conf_fauth'); if(this.checked){ input.disabled = false; input.focus();}else{input.disabled=true;}">NO</label>
                            <input id ="conf_fauth" name="conf_fauth_val" disabled="true" type="text"/><br>
                            <span class="error" id= "conf_fauthor"></span>
                        </div>
                    </div>
                    <br><br><br>
                    <?php
                    for($i=1;$i<=$count;$i++){
                        if($i==1){
                            echo '<div class="form-group">';
                            echo '<label id="coconf'.$i.'"class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Co-Author Name:</label>';
                            echo '<div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">';
                            echo '<input type="text" id ="confcoauthname1" class="form-control" value = '.$coa1.' name="name1" placeholder="Co Author 1"><span class="error" id="name1"></span>';
                            echo '</div>';
                            echo '<br><br>';
                            echo '<label id="coconf2'.$i.'"class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Co-Author Affiliation:</label>';
                            echo '<div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">';
                            echo '<input type="text" id ="confcoauthnameaff1" class="form-control" value = '.$coa1aff.' name="name1_affiliation" placeholder="Co Author 1 affiliation"><span class="error" id="name1_affiliation"></span>';
                            echo '</div>';
                            echo '</div>';
                            echo '<br><br>';
                        }
                        if($i==2){
                            echo '<div class="form-group">';
                            echo '<label id="coconf'.$i.'"class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Co-Author Name:</label>';
                            echo '<div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">';
                            echo '<input type="text" id ="confcoauthname2" class="form-control" value = '.$coa2.' name="name2" placeholder="Co Author 2">';
                            echo '</div>';
                            echo '<br class="br12"><br class="br12">';
                            echo '<label id="coconf2'.$i.'"class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Co-Author Affiliation:</label>';
                            echo '<div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">';
                            echo '<input type="text" id ="confcoauthnameaff2" class="form-control" value = '.$coa2aff.' name="name2_affiliation" placeholder="Co Author 2 affiliation">';
                            echo '</div>';
                            echo '</div>';
                            echo '<br class="br12"><br class="br12">';
                        }
                        if($i==3){
                            echo '<div class="form-group">';
                            echo '<label id="coconf'.$i.'"class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Co-Author Name:</label>';
                            echo '<div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">';
                            echo '<input type="text" id ="confcoauthname3" class="form-control" value = '.$coa3.' name="name3" placeholder="Co Author 3">';
                            echo '</div>';
                            echo '<br class="br13"><br class="br13">';
                            echo '<label id="coconf2'.$i.'"class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Co-Author Affiliation:</label>';
                            echo '<div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">';
                            echo '<input type="text" id ="confcoauthnameaff3" class="form-control" value = '.$coa3aff.' name="name3_affiliation" placeholder="Co Author 3 affiliation">';
                            echo '</div>';
                            echo '</div>';
                            echo '<br class="br13"><br class="br13">';
                        }
                        if($i==4){
                            echo '<div class="form-group">';
                            echo '<label id="coconf'.$i.'"class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Co-Author Name:</label>';
                            echo '<div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">';
                            echo '<input type="text" id ="confcoauthname4" class="form-control" value = '.$coa4.' name="name4" placeholder="Co Author 4">';
                            echo '</div>';
                            echo '<br class="br14"><br class="br14">';
                            echo '<label id="coconf2'.$i.'"class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Co-Author Affiliation:</label>';
                            echo '<div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">';
                            echo '<input type="text" id ="confcoauthnameaff4" class="form-control" value = '.$coa4aff.' name="name4_affiliation" placeholder="Co Author 4 affiliation">';
                            echo '</div>';
                            echo '</div>';
                            echo '<br class="br14"><br class="br14">';
                        }
                        if($i==5){
                            echo '<div class="form-group">';
                            echo '<label id="coconf'.$i.'"class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Co-Author Name:</label>';
                            echo '<div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">';
                            echo '<input type="text" id ="confcoauthname5" class="form-control" value = '.$coa5.' name="name5" placeholder="Co Author 5">';
                            echo '</div>';
                            echo '<br class="br15"><br class="br15">';
                            echo '<label id="coconf2'.$i.'"class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Co-Author Affiliation:</label>';
                            echo '<div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">';
                            echo '<input type="text" id ="confcoauthnameaff5" class="form-control" value = '.$coa5aff.' name="name5_affiliation" placeholder="Co Author 5 affiliation">';
                            echo '</div>';
                            echo '</div>';
                            echo '<br class="br15"><br class="br15">';
                        }
                        if($i==6){
                            echo '<div class="form-group">';
                            echo '<label id="coconf'.$i.'"class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Co-Author Name:</label>';
                            echo '<div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">';
                            echo '<input type="text" id ="confcoauthname6" class="form-control" value = '.$coa6.' name="name6" placeholder="Co Author 6">';
                            echo '</div>';
                            echo '<br class="br16"><br class="br16">';
                            echo '<label id="coconf2'.$i.'"class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Co-Author Affiliation:</label>';
                            echo '<div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">';
                            echo '<input type="text" id ="confcoauthnameaff6" class="form-control" value = '.$coa6aff.' name="name6_affiliation" placeholder="Co Author 6 affiliation">';
                            echo '</div>';
                            echo '</div>';
                            echo '<br class="br16"><br class="br16">';
                        }
                        if($i==7){
                            echo '<div class="form-group">';
                            echo '<label id="coconf'.$i.'"class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Co-Author Name:</label>';
                            echo '<div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">';
                            echo '<input type="text" id ="confcoauthname7" class="form-control" value = '.$coa7.' name="name7" placeholder="Co Author 7">';
                            echo '</div>';
                            echo '<br class="br17"><br class="br17">';
                            echo '<label id="coconf2'.$i.'"class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Co-Author Affiliation:</label>';
                            echo '<div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">';
                            echo '<input type="text" id ="confcoauthnameaff7" class="form-control" value = '.$coa7aff.' name="name7_affiliation" placeholder="Co Author 7 affiliation">';
                            echo '</div>';
                            echo '</div>';
                            echo '<br class="br17"><br class="br17">';
                        }
                        if($i==8){
                            echo '<div class="form-group">';
                            echo '<label id="coconf'.$i.'"class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Co-Author Name:</label>';
                            echo '<div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">';
                            echo '<input type="text" id ="confcoauthname8" class="form-control" value = '.$coa8.' name="name8" placeholder="Co Author 8">';
                            echo '</div>';
                            echo '<br class="br18"><br class="br18">';
                            echo '<label id="coconf2'.$i.'"class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Co-Author Affiliation:</label>';
                            echo '<div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">';
                            echo '<input type="text" id ="confcoauthnameaff8" class="form-control" value = '.$coa8aff.' name="name8_affiliation" placeholder="Co Author 8 affiliation">';
                            echo '</div>';
                            echo '</div>';
                            echo '<br class="br18"><br class="br18">';
                        }
                        if($i==9){
                            echo '<div class="form-group">';
                            echo '<label id="coconf'.$i.'"class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Co-Author Name:</label>';
                            echo '<div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">';
                            echo '<input type="text" id ="confcoauthname9" class="form-control" value = '.$coa9.' name="name9" placeholder="Co Author 9">';
                            echo '</div>';
                            echo '<br class="br19"><br class="br19">';
                            echo '<label id="coconf2'.$i.'"class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Co-Author Affiliation:</label>';
                            echo '<div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">';
                            echo '<input type="text" id ="confcoauthnameaff9" class="form-control" value = '.$coa9aff.' name="name9_affiliation" placeholder="Co Author 9 affiliation">';
                            echo '</div>';
                            echo '</div>';
                            echo '<br class="br19"><br class="br19">';
                        }
                        if($i==10){
                            echo '<div class="form-group">';
                            echo '<label id="coconf'.$i.'"class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Co-Author Name:</label>';
                            echo '<div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">';
                            echo '<input type="text" id ="confcoauthname10" class="form-control" value = '.$coa10.' name="name10" placeholder="Co Author 10">';
                            echo '</div>';
                            echo '<br class="br110"><br class="br110">';
                            echo '<label id="coconf2'.$i.'"class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Co-Author Affiliation:</label>';
                            echo '<div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">';
                            echo '<input type="text" id ="confcoauthnameaff10" class="form-control" value = '.$coa10aff.' name="name10_affiliation" placeholder="Co Author 10 affiliation">';
                            echo '</div>';
                            echo '</div>';
                            echo '<br class="br110"><br class="br110">';
                        }
                    }
                    ?>
                    <div class="form-group">
                        <p id ="inputsconf"></p>
                    </div>
                    <div class="form-group">
                        <input type="button" style="color:white;background-color:#3C2AE6;" class="btn " value="Add Co-Authors" id ="addInputConf" />
                        <input type="button" style="color:white;background-color:#3C2AE6;"  class="btn " value="Remove"  id="remc" />

                        <br>
                        <span class="error" id ="limitidconf"></span><br></div>
                    <br>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Date of Publication: </label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                            <input onfocus="(this.type='date')" value = "<?php echo $date; ?>"onblur="(this.type='text')" <?php if(!empty($err[35])) echo "style='border-color:red;' autofocus"; ?> id ="pubdateid" class="form-control" name="pubdate" placeholder="* Date of Publication">
                            <span class="error" id ="pubdate"><?php echo $err[35]; ?></span>
                        </div></div>
                    <br><br><br>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Type: </label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                            <label class="radio-inline"><input type="radio" name="conf_type" <?php if($type == "National") echo "checked";?> value="National">National</label>
                            <label class="radio-inline"><input type="radio" name="conf_type" <?php if($type == "International") echo "checked";?> value="International">International</label>
                        </div></div>
                    <br><br><br>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">H Index: </label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                            <input type="text" id ="conf_hindexid" class="form-control" name="conf_hindex" value = "<?php echo $hindex; ?>"placeholder=" H index">
                            <span class="error" id ="conf_hindex"></span>
                        </div></div>
                    <br><br><br>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Digital Object Identifier </label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                            <input type="text" id ="conf_doiid" class="form-control" name="conf_doi" value = "<?php echo $doi; ?>"placeholder=" Digital Object Identifier">
                            <span class="error" id ="conf_doi"></span>
                        </div></div>
                    <br><br><br>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Publisher's Name: </label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                            <input type="text" id ="conf_pubnameid" class="form-control" name="conf_pubname" value = "<?php echo $pubname; ?>"placeholder="* Publisher's name">
                            <span class="error" id ="conf_pubname"></span>
                        </div></div>
                    <br><br><br>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Proceeding Name: </label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                            <input type="text" id ="conf_pronameid" class="form-control" name="conf_proname" value = "<?php echo $procname; ?>"placeholder=" Proceding name">
                            <span class="error" id ="conf_proname"></span>
                        </div></div>
                    <br><br><br>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Peer Reviewed ? </label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                            <label class="radio-inline"><input type="radio" name="conf_peer" <?php if($peer == "YES") echo "checked";?> value="YES">YES</label>
                            <label class="radio-inline"><input type="radio" name="conf_peer" <?php if($peer == "NO") echo "checked";?> value="NO">NO</label>
                        </div></div>
                    <br><br><br>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Theme :  </label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                            <input type="text" id ="conf_themeid" class="form-control" name="conf_themename" value = "<?php echo $theme; ?>"placeholder=" Theme of conference">
                            <span class="error" id ="conf_themename"></span>
                        </div></div>
                    <br><br><br>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Paid?  </label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                            <label class="radio-inline"><input type="radio" name="conf_paid" <?php if($paid == "YES") echo "checked";?> value="YES">YES</label>
                            <label class="radio-inline"><input type="radio" name="conf_paid" <?php if($paid == "NO") echo "checked";?> value="NO">NO</label>
                        </div></div>
                    <br><br><br>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Page Number :  </label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                            <input type="text" id ="conf_pgid" class="form-control" name="conf_pg" value = "<?php echo $pageno; ?>"placeholder="Page number">
                            <span class="error" id ="conf_pg"></span>
                        </div></div>
                    <br><br><br>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">ISSN / ISBN Number : </label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                            <input type="text" id ="conf_issnid" class="form-control" name="conf_issn" value = "<?php echo $issn; ?>"placeholder="* ISSN/ISBN Number">
                            <span class="error" id ="conf_issn"></span>
                        </div></div>
                    <br><br><br>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Organiser : </label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                            <input type="text" id ="conf_orgid" class="form-control" name="conf_orgname" value = "<?php echo $organizer; ?>"placeholder="* Organiser">
                            <span class="error" id ="conf_orgname"></span>
                        </div></div>
                    <br><br><br>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Venue :  </label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                            <input type="text" id ="conf_placeid" class="form-control" name="conf_place" value = "<?php echo $place; ?>"placeholder="Venue">
                            <span class="error" id ="conf_place"></span>
                        </div></div>
                    <br><br><br>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Presented ?</label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                            <label class="radio-inline"><input type="radio" name="conf_pres" <?php if($presented == "YES") echo "checked";?> value="YES">YES</label>
                            <label class="radio-inline"><input type="radio" name="conf_pres" <?php if($presented == "NO") echo "checked";?> value="NO">NO</label>
                        </div></div>
                    <br><br><br>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Presentation :</label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                            <label class="radio-inline"><input type="radio" id ="conf_poster" name="conf_poster" <?php  if($poster=="Poster") echo "checked"; ?> >Poster</label>
                            <label class="radio-inline"><input type="radio" id ="conf_poster" name="conf_poster" value = <?php if($poster=="Oral") echo "checked"; ?> >Oral</label>
                            <span class="error" id ="conf_poster"></span>
                        </div>
                    </div>
                    <br><br><br>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Presentation Document:</label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                            <?php
                            if(!empty($posterpdf))
                                echo $pdf7;
                            else
                                echo "<b>Not Inserted!</b>";
                            ?>
                            <input type="file" name="conf_posterpdf" id ="conf_poster" accept="application/pdf" />
                        </div>
                    </div>
                    <br><br><br>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Through Web ?</label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                            <label class="radio-inline"><input type="radio" name="conf_web" <?php if($web == "YES") echo "checked";?> value="YES">YES</label>
                            <label class="radio-inline"><input type="radio" name="conf_web" <?php if($web == "NO") echo "checked";?> value="NO">NO</label>
                        </div></div>
                    <br><br><br>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Citation Index : </label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                            <input type="text" id ="conf_citeid" class="form-control" name="conf_cite" value = "<?php echo $citation; ?>"placeholder="* Citation Index">
                            <span class="error" id ="conf_cite"></span>
                        </div></div>
                    <br><br><br>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Paper : </label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                            <?php
                            if(!empty($paperpdf))
                                echo $pdf4;
                            else
                                echo "<b>Not Inserted!</b>";
                            ?>
                            <input type="file" name="paper_image" accept="application/pdf" />
                        </div>
                    </div>
                    <br><br><br>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Certificate : </label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                            <?php
                            if(!empty($certificate))
                                echo $pdf5;
                            else
                                echo "<b>Not Inserted!</b>";
                            ?>
                            <input type="file" name="certificate_image" accept="application/pdf" />
                        </div>
                    </div>
                    <br><br><br>
                    <div class="form-group">
                        <input type="submit" style="color:white;" class="btn btn-primary btn-md" value="Submit" name = "submitconference">
                    </div>
                </fieldset>
            </form>
        </div>

        <!--FORM 5.1-->
        <div id ="section51" class="well">
            <form method="POST" action="" name="sttpattended" onsubmit="return validateAttended()"  enctype="multipart/form-data">
                <fieldset>
                    <legend>
                        <div class="col-lg-3 col-md-3 col-xs-3 col-sm-3">
                            <?php echo "<a href = 'EditProfile.php?parameter=".$arg."#section51'><font size='4'><span class='glyphicon glyphicon-arrow-left'></span>&nbspGo Back</font></a>";
                            ?>
                        </div>
                        <div class="col-lg-6 col-md-6 col-xs-6 col-sm-6">
                            <h2>STTP</h2>
                        </div>
                    </legend>
                    <h3>Attended</h3>
                    <br>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Event Name: </label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                            <input type="text" class="form-control" id ="attendednameid" placeholder="* Name of the event" value = '<?php echo $title; ?>' name = "attendedname">
                            <span class="error" id ="attendedname"></span>
                        </div></div>
                    <br><br><br>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Event Type</label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                            <select class="form-control" name="eventtype">
                                <option value="">Event type</option>
                                <option value="Seminar" <?php if($eventtype == "Seminar") echo 'selected'; ?> >Seminar</option>
                                <option value="Training" <?php if($eventtype == "Training") echo 'selected'; ?>>Training</option>
                                <option value="Workshop" <?php if($eventtype == "Workshop") echo 'selected'; ?>>Workshop</option>
                                <option value="Other" <?php if($eventtype == "Other") echo 'selected'; ?>>Other</option>
                            </select>
                        </div></div>
                    <br><br><br>
                    Date:
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">From :</label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                            <input placeholder="* From" value = '<?php echo $datefrom; ?>' type="text" onfocus="(this.type='date')" <?php if((!empty($err[4])) || (!empty($err[5]))) echo "style='border-color:red;' autofocus";?> onblur="(this.type='text')" id ="datefromattendedid" class="form-control" name="datefromattended">
                            <span class="error" id ="datefromattended"><?php if(!empty($err[4])) echo $err[4];?></span><br>
                        </div></div>
                    <br><br><br>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">To :</label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                            <input placeholder="* To" value = '<?php echo $dateto; ?>' type="text" onfocus="(this.type='date')" <?php if(!empty($err[5])) echo "style='border-color:red;' autofocus";?> onblur="(this.type='text')" class="form-control" id ="datetoattendedid" name="datetoattended">
                            <span class="error" id ="datetoattended"><?php if(!empty($err[5])) echo $err[5];?></span></div></div>
                    <br>
                    <br><br>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Organised By :</label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                            <input type="text" name="organizedbyattended" value = '<?php echo $organizedby; ?>' class="form-control" placeholder="Organised by">
                        </div>
                    </div>
                    <br><br><br>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Location :</label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                            <input type="text" class="form-control" placeholder="Location" value = '<?php echo $place; ?>' name = "locationattended">
                        </div></div>
                    <br><br><br>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Duration :</label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                            <input  name="durationattended" placeholder="Duration" value = '<?php echo $duration; ?>' class="form-control" type="text" onfocus="(this.type='time')" onblur="(this.type='text')">
                        </div></div>
                    <br><br><br>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Total Participants :</label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                            <input type="number" name="participantsattended" class="form-control" value = '<?php echo $totalparticipation; ?>' placeholder="Total Participants">
                        </div></div>
                    <br><br><br>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Speaker :</label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                            <input type="text" name="speakerattended" class="form-control" value = '<?php echo $speaker; ?>' placeholder="Speaker">
                        </div></div>
                    <br><br><br>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Certificate : </label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                            <?php
                            if(!empty($certificate))
                                echo $pdf6;
                            ?>
                            <input type="file" name="certificateattended" id ="certificateattended" accept="application/pdf" />
                        </div>
                    </div>
                    <br><br><br>
                    <div class="form-group">
                        <input type="submit" style="color:white;" class="btn btn-primary btn-md" value="Update" name = "submitsttpattended">
                    </div>
                </fieldset>
            </form>
        </div>

        <div id ="section52" class="well">
            <form onsubmit="return sttpo()" method="POST" name="sttporganised">
                <fieldset>
                    <legend>
                        <div class="col-lg-3 col-md-3 col-xs-3 col-sm-3">
                            <?php echo "<a href = 'EditProfile.php?parameter=".$arg."#section51'><font size='4'><span class='glyphicon glyphicon-arrow-left'></span>&nbspGo Back</font></a>";
                            ?>
                        </div>
                        <div class="col-lg-6 col-md-6 col-xs-6 col-sm-6">
                            <h2>STTP</h2>
                        </div>
                    </legend>
                    <h3>Organised</h3>
                    <br>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Event Name:</label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                            <input type="text" class="form-control" placeholder="* Name of the event" id ="organizedname_id" value = "<?php echo $name; ?>" name = "organizedname">
                            <span class="error" id ="organizedname"></span>
                        </div></div>
                    <br><br><br>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Event Type :</label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                            <select class="form-control" name="organizedeventtype">
                                <option value="">Event type</option>
                                <option value="Seminar" <?php if($type == "Seminar") echo 'selected'; ?> >Seminar</option>
                                <option value="Training" <?php if($type == "Training") echo 'selected'; ?> >Training</option>
                                <option value="Workshop" <?php if($type == "Workshop") echo 'selected'; ?> >Workshop</option>
                                <option value="Other"  <?php if($type == "Other") echo 'selected'; ?> >Other</option>
                            </select>
                        </div></div>
                    <br><br><br>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">From :</label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                            <input placeholder="* From" value = "<?php echo $datefrom; ?>" type="text" onfocus="(this.type='date')" <?php if((!empty($err[6])) || (!empty($err[7]))) echo "style='border-color:red;' autofocus";?> onblur="(this.type='text')" class="form-control" id ="datefromorganized_id" name="datefromorganized">
                            <span class="error" id ="datefromorganized"><?php if(!empty($err[6])) echo $err[6];?></span></div></div>
                    <br><br><br>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">To :</label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                            <input placeholder="* To" value = "<?php echo $dateto; ?>" type="text" onfocus="(this.type='date')" <?php if(!empty($err[7])) echo "style='border-color:red;' autofocus";?> onblur="(this.type='text')" class="form-control" id ="datetoorganized_id" name="datetoorganized">
                            <span class="error" id ="datetoorganized"><?php if(!empty($err[7])) echo $err[7];?></span>
                        </div></div>
                    <br><br><br>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Role :</label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                            <input type="text" name="roleorganized" class="form-control" value = "<?php echo $role; ?>" placeholder="Role">
                        </div></div>
                    <br><br><br>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Total Participants :</label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                            <input type="number" name="participantsorganized" class="form-control" value = "<?php echo $noparticipants; ?>" placeholder="Total Participants">
                        </div></div>
                    <br><br><br>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Location :</label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                            <input type="text" name="placeorganized" class="form-control" value = "<?php echo $place; ?>" placeholder="Place">

                        </div></div>
                    <br><br><br>
                    <div class="form-group">
                        <input type="submit" style="color:white;" class="btn btn-primary btn-md" value="Update" name = "submitsttporganized">
                    </div>
            </form>

        </div>

        <div id ="section53" class="well">
            <form action="" method="POST" onsubmit="return validateDeli()" name="sttpdelivered">
                <fieldset>
                    <legend>
                        <div class="col-lg-3 col-md-3 col-xs-3 col-sm-3">
                            <?php echo "<a href = 'EditProfile.php?parameter=".$arg."#section51'><font size='4'><span class='glyphicon glyphicon-arrow-left'></span>&nbspGo Back</font></a>";
                            ?>
                        </div>
                        <div class="col-lg-6 col-md-6 col-xs-6 col-sm-6">
                            <h2>STTP</h2>
                        </div>
                    </legend>
                    <h3>Delivered</h3>
                    <br>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Event Name :</label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                            <input type="text" class="form-control" placeholder="* Name of the event" id ="deliverednameid" value = "<?php echo $name; ?>" name = "deliveredname"  >
                            <span class="error" id ="deliveredname"></span>
                        </div></div>
                    <br><br><br>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Event Type :</label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                            <select class="form-control" name="deliveredeventtype">
                                <option value="">Event type</option>
                                <option value="Seminar" <?php if($eventtype == "Seminar") echo 'selected'; ?> >Seminar</option>
                                <option value="Training" <?php if($eventtype == "Training") echo 'selected'; ?> >Training</option>
                                <option value="Workshop" <?php if($eventtype == "Workshop") echo 'selected'; ?> >Workshop</option>
                                <option value="Other" <?php if($eventtype == "Other") echo 'selected'; ?> >Other</option>
                            </select>
                        </div>
                    </div>
                    <br><br><br>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">From :</label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                            <input placeholder="* From"  value = "<?php echo $datefrom; ?>" type="text" onfocus="(this.type='date')" <?php if((!empty($err[8])) || (!empty($err[9]))) echo "style='border-color:red;' autofocus";?> onblur="(this.type='text')" class="form-control" id ="datefromdeliveredid" name="datefromdelivered">
                            <span class="error" id ="datefromdelivered" ><?php if(!empty($err[8])) echo $err[8];?></span></div></div><br><br><br>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">To :</label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                            <input placeholder="* To"  value = "<?php echo $dateto; ?>" type="text" onfocus="(this.type='date')" <?php if(!empty($err[9])) echo "style='border-color:red;' autofocus";?> onblur="(this.type='text')"class="form-control" id ="datetodeliveredid" name="datetodelivered" >
                            <span class="error" id ="datetodelivered" ><?php if(!empty($err[9])) echo $err[9];?></span>
                        </div></div>
                    <br><br><br>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Activity Description :</label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                            <textarea class="form-control" rows="5" placeholder="Activity description" class="form-control" name = "activitydescription"><?php echo $description; ?></textarea>
                        </div></div>
                    <br><br><br><br><br><br>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Location :</label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                            <input type="text" name="placedelivered"  value = "<?php echo $place; ?>" class="form-control" placeholder="Place">
                        </div>
                    </div>
                    <br><br><br>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Duration :</label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                            <input  name="durationdelivered"  value = "<?php echo $duration; ?>" placeholder="Duration" class="form-control" type="text" onfocus="(this.type='time')" onblur="(this.type='text')">
                        </div>
                    </div><br><br><br>
                    <div class="form-group">
                        <input type="submit" style="color:white;" class="btn btn-primary btn-md" value="Update" name = "submitsttpdelivered">
                    </div>
            </form>

        </div>

        <!--FORM 6-->
        <div id ="section6" class="well">
            <form method="POST" onsubmit="return co()" name="co6">
                <fieldset>
                    <legend>
                        <div class="col-lg-3 col-md-3 col-xs-3 col-sm-3">
                            <?php echo "<a href = 'EditProfile.php?parameter=".$arg."#section6'><font size='4'><span class='glyphicon glyphicon-arrow-left'></span>&nbspGo Back</font></a>";
                            ?>
                        </div>
                        <div class="col-lg-6 col-md-6 col-xs-6 col-sm-6">
                            <h2>Co-curricular Activities</h2>
                        </div>
                    </legend>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Activity Name :</label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                            <input type="text" class="form-control" placeholder="* Name of the Activity" name = "cocurrname" value = "<?php echo $name; ?>" id ="cocurrname_id">
                            <span class="error" id ="coname"></span>
                        </div>
                    </div>
                    <br><br><br>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Description:</label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                            <textarea id ="cocurdesc" class="form-control" name="cocurrdescription" value = "<?php echo $description; ?>" cols="50" rows="6" placeholder="Description of Co-Curricular Activity"></textarea>
                            <span class="error" id ="codesc"></span></div>
                    </div>
                    <br><br><br><br><br><br><br><br><br>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Date :</label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                            <input onfocus="(this.type='date')" <?php if(!empty($err[10])) echo "style='border-color:red;' autofocus";?> onblur="(this.type='text')" value = "<?php echo $date; ?>" class="form-control" name="cocurrdate" id ="cocurrdate_id" placeholder="* Date">
                            <span class="error" id ="codate"><?php if(!empty($err[10])) echo $err[43];?></span>
                        </div>
                    </div>
                    <br><br><br>

                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Role :</label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                            <input type="text" id ="cocurrole" class="form-control" value = "<?php echo $role; ?>" name="cocurrrole" placeholder="Role">
                            <span class="error" id ="corole"></span></div></div>
                    <br><br><br>

                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Type :</label>
                        <div class="col-md-6 col-sm-9 col-lg-7 col-xs-6">
                            <label class="radio-inline"><input type="radio" name="cocurrtype" <?php if($type == "KJ Somaiya(InHouse)") echo 'checked';?> onclick="var input = document.getElementById('name22'); if(this.checked){ input.disabled = true; input.focus();}else{input.disabled=false;}">K. J. Somaiya (InHouse)</label>
                            <label class="radio-inline"><input type="radio" name="cocurrtype" for="name2" <?php if($type != "KJ Somaiya(InHouse)") echo 'checked';?> onclick="var input = document.getElementById('name22'); if(this.checked){ input.disabled = false; input.focus();}else{input.disabled=true;}">Other</label>
                            <input class="form-control" id ="name22" name="name22" disabled="true" <?php if($type != "KJ Somaiya(InHouse)") echo 'value="'.$type.'"';?> type="text"/>
                        </div></div>
                    <br><br><br>
                    <div class="form-group">
                        <input type="submit" style="color:white;" class="btn btn-primary btn-md" value="Update" name = "submitcocurricular">
                    </div>
                </fieldset>
            </form>
        </div>

        <!--FORM 7-->
        <div id ="section7" class="well">

            <form method="POST" onsubmit="return extra()" name="ext7">
                <fieldset>
                    <legend>
                        <div class="col-lg-3 col-md-3 col-xs-3 col-sm-3">
                            <?php echo "<a href = 'EditProfile.php?parameter=".$arg."#section7'><font size='4'><span class='glyphicon glyphicon-arrow-left'></span>&nbspGo Back</font></a>";
                            ?>
                        </div>
                        <div class="col-lg-6 col-md-6 col-xs-6 col-sm-6">
                            <h2>Extra Activities</h2>
                        </div>

                    </legend>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Activity Name :</label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                            <input type="text" class="form-control" placeholder="* Name of the Activity" name = "extraname" value = <?php echo $name; ?> id ="extraname1">
                            <span class="error" id ="extname"></span>
                            <br>
                            <br>
                        </div></div>
                    <br><br><br>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Description:</label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                            <textarea id ="extradesc" class="form-control" name="extradescription" cols="50" rows="6" placeholder="Description of Activity"><?php echo $description ;?></textarea>
                            <span class="error" id ="extdesc"></span>
                        </div></div>
                    <br><br><br><br><br><br><br><br><br>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Date :</label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                            <input value = <?php echo $date; ?> onfocus="(this.type='date')" <?php if(!empty($err[11])) echo "style='border-color:red;' autofocus";?> onblur="(this.type='text')" class="form-control" name="extradate" placeholder="* Date" id ="extradate1">
                            <span class="error" id ="extdate"><?php if(!empty($err[11])) echo $err[11];?></span>
                            <br>
                        </div></div>
                    <br><br><br>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Role :</label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                            <input type="text" id ="extrole" class="form-control" value = "<?php echo $role; ?>" name="extrarole" placeholder="Role">
                        </div></div>
                    <br><br><br>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3">Location :</label>
                        <div class="col-md-6 col-sm-9 col-lg-6 col-xs-6">
                            <input type="text" id ="extplace" class="form-control" value = "<?php echo $place; ?>" name="extraplace" placeholder="Location">
                        </div></div>
                    <br><br><br>
                    <div class="form-group">
                        <input type="submit" style="color:white;" class="btn btn-primary btn-md" value="Update" name = "submitextra">
                    </div>
                </fieldset>
            </form>

        </div>

    </div>
</center>


</body>

</html>
