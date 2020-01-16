<?php
include 'dbconnect.php';
if(!isset($_SESSION["Emp_Id"]))
    header('Location:logout.php');
function dateformatReverser($orgDate){
    return date("Y-m-d", strtotime($orgDate));
}
$image = array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);
$empid=$_SESSION["Emp_Id"];
$err=array("","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","");

$sql = "SELECT * FROM login WHERE Emp_Id=$empid";
$result = $conn->query($sql);
$row = mysqli_fetch_assoc($result);
if($row["P1"] == "FALSE")
{
    header('Location:profile.php');
}
$maxdate = (date("Y")-22)."-12-31";
$sql = "SELECT * FROM personal_details WHERE Emp3_Id=$empid";
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

// $pro2=$row["Prom_2"];
// $pro3=$row["Prom_3"];
$pro1_date=$row["Prom_1_Date"];
// $pro2_date=$row["Prom_2_Date"];
// $pro3_date=$row["Prom_3_Date"];
$dob=$row["DOB"];
$profilepic=$row["Profile_Pic"];

if(isset($_POST["submitpersonal"]))
{

    $flag=0;

	$name=trim($_POST["name"]);
	$email=$_POST["email"];
	$contact=$_POST["contact"];
	if(isset($_POST["gender"]))
		$gender=$_POST["gender"];
	else
		$gender="";
	$address=$_POST["address"];
	$address=trim($address);
	$join_pos=trim($_POST["joining_position"]);
	$pro1=trim($_POST["pro1"]);
	// $pro2=trim($_POST["pro2"]);
	// $pro3=trim($_POST["pro3"]);
	$dob=$_POST["date"];
	$dob=dateformatReverser($dob);
	$dobyear = (int)substr($dob,0,4);
	if(($dobyear+22) > (int)date("Y"))
	{
		$err[28]="* Enter Valid Date Of Birth";
		$flag=1;
	}

    if(!empty(($_POST["joining_date"])))
    {
        $join_date=$_POST["joining_date"];
        $join_date=dateformatReverser($join_date);
        $temp = (int)substr($join_date,0,4);
        if( ($dobyear+22) >= $temp)
        {
            $err[27]="* Please Enter A Valid Joining Date ";
            $flag=1;
        }
    }

    if(!empty(($_POST["pro1_date"])))
    {
        $pro1_date=$_POST["pro1_date"];
        if(empty($_POST["joining_date"])){
            $err[27]="* Please Enter Joining Date First";
            $flag=1;
        }
        else
        {
            $ab = date_create($join_date);
            $ba=date_create($pro1_date);
            $diff=date_diff($ab,$ba);
            if($diff->format("%R")=='-'){
                $err[29]="* Please Enter A Valid Promotion Date";
                $flag=1;
            }
        }
    }

	// if(!empty(($_POST["pro2_date"])))
	// {
	// 	$pro2_date=$_POST["pro2_date"];

	// 	if(empty($_POST["joining_date"])){
	// 		$err[27]="* Please Enter Joining Date First";
	// 		$flag=1;
	// 	}
	// 	else if(empty($_POST["pro1_date"]))
	// 	{
	// 		$err[29]="* Please Enter Promotion 1 Date ";
	// 		$flag=1;
	// 	}
	// 	else {
	// 		$ab=date_create($pro1_date);
	// 		$ba=date_create($pro2_date);

	// 		$diff=date_diff($ab,$ba);
	// 		if($diff->format("%R")=='-'){
	// 			$err[30]="* Please Enter A Valid Promotion 2 Date";
	// 			$flag=1;
	// 		}
	// 	}

	// }
	// if(!empty($_POST["pro3_date"]))
	// {
	// 	$pro3_date=$_POST["pro3_date"];

	// 	if(empty($_POST["joining_date"])){
	// 		$err[27]="* Please Enter Joining Date First ";
	// 		$flag=1;
	// 	}
	// 	else if(empty($_POST["pro1_date"]))
	// 	{
	// 		$err[29]="* Please Enter Promotion 1 Date";
	// 		$flag=1;
	// 	}
	// 	else if(empty($_POST["pro2_date"]))
	// 	{
	// 		$err[30]="* Please Enter Promotion 2 Date";
	// 		$flag=1;
	// 	}
	// 	else
	// 	{
	// 		$ab=date_create($pro2_date);
	// 		$ba=date_create($pro3_date);

	// 		$diff=date_diff($ab,$ba);
	// 		if($diff->format("%R")=='-'){

	// 			$err[31]="* Please Enter A Valid Promotion 3 Date";
	// 			$flag=1;
	// 		}
	// 	}
	// }
	$temp = (int)substr($join_date,0,4);
	$temp1 = (int)date("Y");
	$years_exp = $temp1-$temp;
	if(empty($join_date))
	{
		$join_date="1950-01-01";
	}
	if(empty($pro1_date))
	{
		$pro2_date="1950-01-01";
	}

	// if(empty($pro2_date))
	// {
	// 	$pro2_date="1950-01-01";
	// }

	// if(empty($pro3_date))
	// {
	// 	$pro3_date="1950-01-01";
	// }

    $ql="SELECT * from personal_details";
    $query=mysqli_query($conn,$ql);
    while($row=mysqli_fetch_assoc($query))
    {
        if(!($email == ''))
            if(($row['Email']==$email) && ($row['Emp3_Id']!=$empid))
            {
                $err[0]="* Email already exists";
                $flag=1;
            }
        if(!($contact==''))
            if(($row['Contact']==$contact) && ($row['Emp3_Id']!=$empid))
            {
                $err[1]="* Contact already exists";
                $flag=1;
            }

    }
    if($flag!=1)
    {
        $newfields=null;
        $newfieldval=null;
        $new_field_query = "select * from new_fields where table_name='personal_details'";
        $new_result = $conn->query($new_field_query);
        if ($new_result->num_rows > 0) {
            while ($row = $new_result->fetch_assoc()) {
                $field_name = $row['field_name'];
                $label = $row['label'];
                $display = $row['display'];
                if ($display == 1) {
                    $newfieldval=$_POST[$field_name];
                    $newfields=$newfields.','.$field_name.'="'.$newfieldval.'"';
                }
            }
        }
        $dob=dateformatReverser($dob);
        $join_date=dateformatReverser($join_date);
        $pro1_date=dateformatReverser($pro1_date);
        $sql = "UPDATE personal_details SET Name='$name',Email='$email',Contact='$contact',Address='$address',DOB='$dob',Join_Pos='$join_pos',Join_Date='$join_date',Years_Exp=$years_exp,Prom_1='$pro1',Prom_1_Date='$pro1_date',gender='$gender'$newfields WHERE Emp3_Id=$empid";
        if($result=$conn->query($sql))
        {
            header('Location:profile.php#section1');
        }else
        {
            echo "<script type='text/javascript'>alert('".mysqli_error($conn)."');</script>";
        }
    }
}
$sql = "SELECT * FROM academic_details WHERE Emp2_Id=$empid";
$result = $conn->query($sql);
$row1 = mysqli_fetch_assoc($result);
$sscInstitute=$row1["SSC_Institute"];
$sscPercentile=$row1["SSC_Percentile"];
$sscYear=$row1["SSC_Year"];
$sscMarksheet=$row1["SSC_Marksheet"];

$hscInstitute=$row1["HSC_Institute"];
$hscPercentile=$row1["HSC_Percentile"];
$hscYear=$row1["HSC_Year"];
$hscMarksheet=$row1["HSC_Marksheet"];

$bachelorsIn=$row1["Bachelors_In"];
$bachelorsInstitute=$row1["Bachelors_Institute"];
$bachelorsPercentile=$row1["Bachelors_Percentile"];
$bachelorsYear=$row1["Bachelors_Year"];
$btechMarksheet=$row1["Bachelors_Marksheet"];

$mastersIn=$row1["Masters_In"];
$mastersInstitute=$row1["Masters_Institute"];
$mastersPercentile=$row1["Masters_Percentile"];
$mastersYear=$row1["Masters_Year"];
$mtechMarksheet=$row1["Masters_Marksheet"];

$phdIn=$row1["Phd_In"];
$phdInstitute=$row1["Phd_Institute"];
$phdPercentile=$row1["Phd_Percentile"];
$phdYear=$row1["Phd_Year"];
$phdMarksheet=$row1["Phd_Marksheet"];
$curyear=date("Y");
$dob= dateformatReverser($dob);
$dobyear = (int)substr($dob,0,4);
$yearArray = range($dobyear+12, $curyear);
//echo $gender;
if(isset($_POST["submitacademic1"]))
{
    //	$gender=trim($gender);

    //if($gender == "null")
    //{

    //echo "<script type='text/javascript'>alert('$name');</script>";


    //}
    $sscInstitute=$_POST["sscinstitute"];
    $sscPercentile=$_POST["sscmarks"];
    if($sscPercentile==null)
        $sscPercentile=0.0;

    $sscYear=$_POST["sscyear"];
    if(!empty($_FILES["sscimage"]["tmp_name"])){
        $sscMarksheet = addslashes(file_get_contents($_FILES["sscimage"]["tmp_name"]));
        $image[0]=1;
    }
    else if($sscMarksheet != null)
    {
        $image[0]=0;
    }
    else
        $image[0]=0;

    if($image[0]==1){
        $sql = "UPDATE academic_details SET SSC_Marksheet='$sscMarksheet' WHERE Emp2_Id=$empid";
        $conn->query($sql);
    }

    $sql = "UPDATE academic_details SET SSC_Institute = '$sscInstitute',SSC_Percentile = $sscPercentile,SSC_Year = $sscYear WHERE Emp2_Id=$empid";
    if($result=$conn->query($sql))
        header('Location:homepage.php#hscnew');
    else
        echo mysqli_error($conn);
}
if(isset($_POST["submitacademic2"]))
{
    /*	if($name=="" || $name == null)
        {
        echo '<script language="javascript">';
        echo 'alert("Please fill Personal details first")';
        echo '</script>';

    }*/

    $hscInstitute=$_POST["hscinstitute"];
    $hscPercentile=$_POST["hscmarks"];
    if($hscPercentile==null)
        $hscPercentile=0.0;

    $hscYear=$_POST["hscyear"];
    if(!empty($_FILES["hscimage"]["tmp_name"])){
        $hscMarksheet = addslashes(file_get_contents($_FILES["hscimage"]["tmp_name"]));
        $image[1]=1;
    }
    else if($hscMarksheet != null)
    {
        $image[1]=0;
    }
    else
        $image[1]=0;

    if($image[1]==1){
        $sql = "UPDATE academic_details SET HSC_Marksheet='$hscMarksheet' WHERE Emp2_Id=$empid";
        $conn->query($sql);
    }

    $sql = "UPDATE academic_details SET HSC_Institute = '$hscInstitute',HSC_Percentile = $hscPercentile,HSC_Year = $hscYear WHERE Emp2_Id=$empid";
    if($result=$conn->query($sql))
        header('Location:homepage.php#degree');
    else
        echo "<script type='text/javascript'>alert('".mysqli_error($conn)."');</script>";
}

if(isset($_POST["submitacademic3"]))
{
    $btechInstitute=$_POST["btechinstitute"];
    $btechDegree=$_POST["btechdegree"];
    $btechPercentile=$_POST["btechmarks"];
    if($btechPercentile==null)
        $btechPercentile=0.0;


    $btechYear=$_POST["btechyear"];
    if(!empty($_FILES["btechimage"]["tmp_name"])){
        $btechMarksheet = addslashes(file_get_contents($_FILES["btechimage"]["tmp_name"]));
        $image[2]=1;
    }
    else if($btechMarksheet != null)
    {
        $image[2]=0;
    }
    else
        $image[2]=0;

    if($image[2]==1){
        $sql = "UPDATE academic_details SET Bachelors_Marksheet = '$btechMarksheet' WHERE Emp2_Id=$empid";
        $conn->query($sql);
    }

    $sql = "UPDATE academic_details SET Bachelors_In='$btechDegree',Bachelors_Institute = '$btechInstitute',Bachelors_Percentile = $btechPercentile,Bachelors_Year = $btechYear WHERE Emp2_Id=$empid";
    if($result=$conn->query($sql))
        header('Location:homepage.php#masters');
    else
        echo "<script type='text/javascript'>alert('".mysqli_error($conn)."');</script>";
}

if(isset($_POST["submitacademic4"]))
{
    $mtechInstitute=$_POST["mtechinstitute"];
    $mtechDegree=$_POST["mtechdegree"];
    $mtechPercentile=$_POST["mtechmarks"];
    if($mtechPercentile==null)
        $mtechPercentile=0.0;


    $mtechYear=$_POST["mtechyear"];
    if(!empty($_FILES["mtechimage"]["tmp_name"])){
        $mtechMarksheet = addslashes(file_get_contents($_FILES["mtechimage"]["tmp_name"]));
        $image[3]=1;
    }
    else if($mtechMarksheet != null)
    {
        $image[3]=0;
    }
    else
        $image[3]=0;

    if($image[3]==1){
        $sql = "UPDATE academic_details SET Masters_Marksheet = '$mtechMarksheet' WHERE Emp2_Id=$empid";
        $conn->query($sql);
    }

    $sql = "UPDATE academic_details SET Masters_In='$mtechDegree',Masters_Institute = '$mtechInstitute',Masters_Percentile = $mtechPercentile,Masters_Year = $mtechYear WHERE Emp2_Id=$empid";
    if($result=$conn->query($sql))
        header('Location:homepage.php#phd');
    else
        echo "<script type='text/javascript'>alert('".mysqli_error($conn)."');</script>";
}

if(isset($_POST["submitacademic5"]))
{
    $phdDegree=$_POST["phddegree"];
    $phdInstitute=$_POST["phdinstitute"];
    $phdPercentile=$_POST["phdmarks"];
    if($phdPercentile==null)
        $phdPercentile=0.0;

    $phdYear=$_POST["phdyear"];
    if(!empty($_FILES["phdimage"]["tmp_name"])){
        $phdMarksheet = addslashes(file_get_contents($_FILES["phdimage"]["tmp_name"]));
        $image[4]=1;
    }
    else if($phdMarksheet != null)
    {
        $image[4]=0;
    }
    else
        $image[4]=0;

    if($image[4]==1){
        $sql = "UPDATE academic_details SET Phd_Marksheet = '$phdMarksheet' WHERE Emp2_Id=$empid";
        $conn->query($sql);
    }

    $sql = "UPDATE academic_details SET Phd_In='$phdDegree',Phd_Institute = '$phdInstitute',Phd_Percentile = $phdPercentile,Phd_Year = $phdYear WHERE Emp2_Id=$empid";
    if($result=$conn->query($sql))
        header('Location:profile.php#section2');
    else
        echo "<script type='text/javascript'>alert('".mysqli_error($conn)."');</script>";
}

if(isset($_POST["submitcourses"]))
{
    $flag2=0;
    $category=$_POST["category"];
    $subcategory=$_POST["subcategory"];
    $coursesem=$_POST["coursesem"];
    $courseyear=$_POST["courseyear"];

    $ql="SELECT * from courses";
    $query=mysqli_query($conn,$ql);
    while($row=mysqli_fetch_assoc($query))
    {
        if($category=="" || $subcategory=="" || $coursesem=="" || $courseyear=="")
        {

            $err[3]="Fields cannot be Empty";
            $flag2=1;
        }
        else if(($row['Course_Id']==$subcategory) && ($row['Category']==$category) && ($row['Semester']==$coursesem) && ($row['Year']==$courseyear) && ($row['Emp8_Id']==$empid))
        {
            $err[2]="Course Already Entered";
            $flag2=1;
        }
    }
    if($flag2==0)
    {
        $newfields=null;
        $newfieldsval=null;
        $new_field_query = "select * from new_fields where table_name='courses'";
        $new_result = $conn->query($new_field_query);
        if ($new_result->num_rows > 0) {
            while ($row = $new_result->fetch_assoc()) {
                $field_name = $row['field_name'];
                $label = $row['label'];
                $display = $row['display'];
                if ($display == 1) {
                    $newfieldsval=$newfieldsval.",'$_POST[$field_name]'";
                    $newfields=$newfields.",$field_name";
                }
            }
        }
        $sql="INSERT INTO courses(`Emp8_Id`, `Category`, `Course_Id`, `Semester`, `Year`$newfields) VALUES($empid,'$category','$subcategory','$coursesem','$courseyear'$newfieldsval)";
        echo $sql;
        if($result=$conn->query($sql))
        {
            header('Location:profile.php#section3');
        }else
        {
            echo "<script type='text/javascript'>alert('".mysqli_error($conn)."');</script>";
        }
    }
    else
    {
        if($err[3] != "")
            echo "<script type='text/javascript'>alert('".$err[3]."');</script>";
        else if($err[2] != "")
            echo "<script type='text/javascript'>alert('".$err[2]."');</script>";
    }
}

if(isset($_POST["submitprojects"]))
{
    $projectTitle = $_POST["projtitle"];
    $projectDescription = $_POST["projdesc"];
    $projectYear = $_POST["projyear"];
    $studentname1 = $_POST["projstud1name"];
    $studentname2 = $_POST["projstud2name"];
    $studentname3 = $_POST["projstud3name"];
    $studentname4 = $_POST["projstud4name"];

    $studentroll1 = $_POST["projstud1roll"];
    $studentroll2 = $_POST["projstud2roll"];
    $studentroll3 = $_POST["projstud3roll"];
    $studentroll4 = $_POST["projstud4roll"];

    $studentemail1 = $_POST["projstud1email"];
    $studentemail2 = $_POST["projstud2email"];
    $studentemail3 = $_POST["projstud3email"];
    $studentemail4 = $_POST["projstud4email"];

    if(!empty($_POST["projectYear"]))
    {
        $flagproject=0;
        $date=$_POST["projectYear"];
        $date=dateformatReverser($date);
        $year = (int)substr($date,0,4);
        if($year <= $dobyear)
        {
            $err[45]="* Please Enter A Valid Date ";
            $flagproject=1;
        }
        else
        {
            $date="1950-01-01";
        }
    }

    if(isset($_POST["name2"]))
        $projectType=$_POST["name2"];
    else if($_POST["projtype"] == "BEPROJECT")
        $projectType="BE Project";
    else if($_POST["projtype"] == "Internship")
        $projectType="Internship";


    if($flagproject == 0)
    {
        $newfields=null;
        $newfieldsval=null;
        $new_field_query = "select * from new_fields where table_name='projects'";
        $new_result = $conn->query($new_field_query);
        if ($new_result->num_rows > 0) {
            while ($row = $new_result->fetch_assoc()) {
                $field_name = $row['field_name'];
                $label = $row['label'];
                $display = $row['display'];
                if ($display == 1) {
                    $newfieldsval=$newfieldsval.",'$_POST[$field_name]'";
                    $newfields=$newfields.",$field_name";
                }
            }
        }
        $sql = "INSERT INTO projects(`Emp12_Id`, `Title`, `Type`, `Description`, `Year`, `S1_name`, `S1_roll`, `S1_email`, `S2_name`, `S2_roll`, `S2_email`, `S3_name`, `S3_roll`, `S3_email`, `S4_name`, `S4_roll`, `S4_email`$newfields) VALUES($empid,'$projectTitle','$projectType','$projectDescription','$projectYear','$studentname1','$studentroll1','$studentemail1','$studentname2','$studentroll2','$studentemail2','$studentname3','$studentroll3','$studentemail3','$studentname4','$studentroll4','$studentemail4'$newfieldsval)";
        $result = $conn->query($sql);
        if($result)
            header('Location:profile.php#section4');
        else
            echo "<script type='text/javascript'>alert('".mysqli_error($conn)."');</script>";
    }
}


$flagbook=0;
if(isset($_POST["submitpublicationbooks"]))
{
    $bookName=$_POST["bookname"];
    $bookisbn=$_POST["bookisbn"];
    $pubdate=$_POST["pubdate"];
    $bookEdition=$_POST["bookedition"];
    $bookPubName=$_POST["book_pub_name"];
    $bookAuthName=$_POST["book_auth_name"];
    $bookAuthInst=$_POST["book_auth_inst"];
    $bookCoauthName1=$_POST["book_coauth_name1"];
    $bookCoauthInst1=$_POST["book_coauth_inst1"];
    $bookCoauthName2=$_POST["book_coauth_name2"];
    $bookCoauthInst2=$_POST["book_coauth_inst2"];
    $bookCoauthName3=$_POST["book_coauth_name3"];
    $bookCoauthInst3=$_POST["book_coauth_inst3"];

    if(!empty($_POST["pubdate"]))
    {
        $pubdate=$_POST["pubdate"];
        $pubdate=dateformatReverser($pubdate);
        $pubyear = (int)substr($pubdate,0,4);
        if($pubyear <= $dobyear)
        {
            $err[33]="* Please Enter A Valid Publication Date ";
            $flagbook=1;
        }
    }

    if(!empty($_FILES["book_image"]["tmp_name"]))
    {
        $bookImage = addslashes(file_get_contents($_FILES["book_image"]["tmp_name"]));
        $image[5]=1;
    }
    else
        $image[5]=0;


    if($flagbook==0)
    {
        $newfields=null;
        $newfieldsval=null;
        $new_field_query = "select * from new_fields where table_name='publication_books'";
        $new_result = $conn->query($new_field_query);
        if ($new_result->num_rows > 0) {
            while ($row = $new_result->fetch_assoc()) {
                $field_name = $row['field_name'];
                $label = $row['label'];
                $display = $row['display'];
                if ($display == 1) {
                    $newfieldsval=$newfieldsval.",'$_POST[$field_name]'";
                    $newfields=$newfields.",$field_name";
                }
            }
        }
        if($image[5] == 1)
        {
            $sql="INSERT INTO publication_books(`Emp1_Id`, `Book_Name`, `ISBN`, `Date_Published`, `Publisher_Name`, `COA1`, `COA1_INST`, `COA2`, `COA2_INST`, `COA3`, `COA3_INST`, `Edition`, `Author`, `Author_INST`, `Cover`$newfields) VALUES($empid,'$bookName','$bookisbn','$pubdate','$bookPubName','$bookCoauthName1','$bookCoauthInst1','$bookCoauthName2','$bookCoauthInst2','$bookCoauthName3','$bookCoauthInst3','$bookEdition','$bookAuthName','$bookAuthInst','$bookImage'$newfieldsval)";
        }
        else
        {
            $sql="INSERT INTO publication_books(`Emp1_Id`, `Book_Name`, `ISBN`, `Date_Published`, `Publisher_Name`, `COA1`, `COA1_INST`, `COA2`, `COA2_INST`, `COA3`, `COA3_INST`, `Edition`, `Author`, `Author_INST`, `Cover`$newfields) VALUES($empid,'$bookName','$bookisbn','$pubdate','$bookPubName','$bookCoauthName1','$bookCoauthInst1','$bookCoauthName2','$bookCoauthInst2','$bookCoauthName3','$bookCoauthInst3','$bookEdition','$bookAuthName','$bookAuthInst',null$newfieldsval)";
        }
        echo $sql;
        if($result=$conn->query($sql))
        {
            header('Location:profile.php#section41');
        }else
        {
            echo mysqli_error($conn);
        }
    }
}

$flagjour=0;

if(isset($_POST["submitjournals"]))
{
    $count=0;
    $journalName=$_POST["journal_name"];
    $journalType=$_POST["journal_type"];
    $journalTitle=$_POST["journal_title"];
    $journalImpact=$_POST["journal_impact"];
    $journalPeer=$_POST["journal_peer"];
    if(!empty($_POST["jour_coauth_name1"])){
        $count++;
        $journalCoa1=$_POST["jour_coauth_name1"];
    }
    if(!empty($_POST["name2"])){
        $count++;
        $journalCoa2=$_POST["name2"];}
    else
        $journalCoa2=" ";
    //echo "<script type='text/javascript'>alert('$journalCoa2');</script>";
    if(!empty($_POST["name3"])){
        $count++;
        $journalCoa3=$_POST["name3"];}
    else
        $journalCoa3=" ";
    if(!empty($_POST["name4"])){
        $count++;
        $journalCoa4=$_POST["name4"];}
    else
        $journalCoa4=" ";
    if(!empty($_POST["name5"])){
        $count++;
        $journalCoa5=$_POST["name5"];}
    else
        $journalCoa5=" ";
    if(!empty($_POST["name6"])){
        $count++;
        $journalCoa6=$_POST["name6"];}
    else
        $journalCoa6=" ";
    if(!empty($_POST["name7"])){
        $count++;
        $journalCoa7=$_POST["name7"];}
    else
        $journalCoa7=" ";
    if(!empty($_POST["name8"])){
        $count++;
        $journalCoa8=$_POST["name8"];}
    else
        $journalCoa8=" ";
    if(!empty($_POST["name9"])){
        $count++;
        $journalCoa9=$_POST["name9"];}
    else
        $journalCoa9=" ";
    if(!empty($_POST["name10"])){
        $count++;
        $journalCoa10=$_POST["name10"];}
    else
        $journalCoa10=" ";
    $journalCoa1_Aff=$_POST["jour_coauth_nameaff1"];
    if(!empty($_POST["name2_affiliation"]))
        $journalCoa2_Aff=$_POST["name2_affiliation"];
    else
        $journalCoa2_Aff=" ";
    //echo "<script type='text/javascript'>alert('$journalCoa2_Aff');</script>";
    if(!empty($_POST["name3_affiliation"]))
        $journalCoa3_Aff=$_POST["name3_affiliation"];
    else
        $journalCoa3_Aff=" ";
    if(!empty($_POST["name4_affiliation"]))
        $journalCoa4_Aff=$_POST["name4_affiliation"];
    else
        $journalCoa4_Aff=" ";
    if(!empty($_POST["name5_affiliation"]))
        $journalCoa5_Aff=$_POST["name5_affiliation"];
    else
        $journalCoa5_Aff=" ";
    if(!empty($_POST["name6_affiliation"]))
        $journalCoa6_Aff=$_POST["name6_affiliation"];
    else
        $journalCoa6_Aff=" ";
    if(!empty($_POST["name7_affiliation"]))
        $journalCoa7_Aff=$_POST["name7_affiliation"];
    else
        $journalCoa7_Aff=" ";
    if(!empty($_POST["name8_affiliation"]))
        $journalCoa8_Aff=$_POST["name8_affiliation"];
    else
        $journalCoa8_Aff=" ";
    if(!empty($_POST["name9_affiliation"]))
        $journalCoa9_Aff=$_POST["name9_affiliation"];
    else
        $journalCoa9_Aff=" ";
    if(!empty($_POST["name10_affiliation"]))
        $journalCoa10_Aff=$_POST["name10_affiliation"];
    else
        $journalCoa10_Aff=" ";
    $journalPubName=$_POST["journal_pub_name"];
    $journalDoi=$_POST["doi"];
    $journalVolume=$_POST["journal_vol"];
    $journalIssue=$_POST["journal_issue"];
    $journalChapter=$_POST["journal_book"];
    $journalPageNumber=$_POST["journal_pg"];
    $journalISSN=$_POST["journal_issn"];
    $journalCitationIndex=$_POST["journal_cite"];
    $journalPaid=$_POST["journal_paid"];
    $journalSJR=$_POST["journal_sjr"];
    //$a = $_POST["journal_fauth"];
    //echo "<script type='text/javascript'>alert('$a');</script>";
    if($_POST["journal_fauth"] == "YES")
        $journalAuthName = $name;
    else if($_POST["journal_fauth"] == "NO")
        $journalAuthName = $_POST["journal_fauth_val"];
    //echo "<script type='text/javascript'>alert('$journalAuthName');</script>";
    if(!empty($_FILES["paper_image"]["tmp_name"]))
    {
        $paperImage = addslashes(file_get_contents($_FILES["paper_image"]["tmp_name"]));
        $image[6]=1;
    }
    else
        $image[6]=0;

    if(!empty($_FILES["certificate_image"]["tmp_name"]))
    {
        $certificateImage = addslashes(file_get_contents($_FILES["certificate_image"]["tmp_name"]));
        $image[7]=1;
    }
    else
        $image[7]=0;


    if(!empty($_POST["jour_date"]))
    {
        $jourDate=$_POST["jour_date"];
        $jourDate=dateformatReverser($jourDate);
        $jourYear = (int)substr($jourDate,0,4);
        if($jourYear <= $dobyear)
        {
            $err[34]="* Please Enter A Valid Publication Date ";
            $flagjour=1;
        }
    }

    if($flagjour==0)
    {
        $newfields=null;
        $newfieldsval=null;
        $new_field_query = "select * from new_fields where table_name='publication_journals'";
        $new_result = $conn->query($new_field_query);
        if ($new_result->num_rows > 0) {
            while ($row = $new_result->fetch_assoc()) {
                $field_name = $row['field_name'];
                $label = $row['label'];
                $display = $row['display'];
                if ($display == 1) {
                    $newfieldsval=$newfieldsval.",'$_POST[$field_name]'";
                    $newfields=$newfields.",$field_name";
                }
            }
        }
        if($image[7] == 1 && $image[6]==1)
        {
            $sql="INSERT INTO publication_journals(`Emp4_Id`, `ISSN`, `Type`, `Name`, `Title`, `Author`, `Date`, `Book_Chapter`, `Certificate`, `Peer_Reviewed`, `Paper_PDF`, `Impact_Factor`, `COA_1`, `COA_2`, `COA_3`, `COA_4`, `COA_5`, `COA_6`, `COA_7`, `COA_8`, `COA_9`, `COA_10`, `COA1_AFF`, `COA2_AFF`, `COA3_AFF`, `COA4_AFF`, `COA5_AFF`, `COA6_AFF`, `COA7_AFF`, `COA8_AFF`, `COA9_AFF`, `COA10_AFF`, `Pub_Name`, `DOI`, `Volume`, `PageNo`, `Citation`, `Paid`, `SJR`, `count`, `Issue`$newfields) VALUES($empid,'$journalISSN','$journalType','$journalName','$journalTitle','$journalAuthName','$jourDate','$journalChapter','$certificateImage','$journalPeer','$paperImage','$journalImpact','$journalCoa1','$journalCoa2','$journalCoa3','$journalCoa4','$journalCoa5','$journalCoa6','$journalCoa7','$journalCoa8','$journalCoa9','$journalCoa10','$journalCoa1_Aff','$journalCoa2_Aff','$journalCoa3_Aff','$journalCoa4_Aff','$journalCoa5_Aff','$journalCoa6_Aff','$journalCoa7_Aff','$journalCoa8_Aff','$journalCoa9_Aff','$journalCoa10_Aff','$journalPubName','$journalDoi','$journalVolume','$journalPageNumber','$journalCitationIndex','$journalPaid','$journalSJR',$count,'$journalIssue'$newfieldsval)";
        }
        else if($image[6]==1)
        {
            $sql="INSERT INTO publication_journals(`Emp4_Id`, `ISSN`, `Type`, `Name`, `Title`, `Author`, `Date`, `Book_Chapter`, `Certificate`, `Peer_Reviewed`, `Paper_PDF`, `Impact_Factor`, `COA_1`, `COA_2`, `COA_3`, `COA_4`, `COA_5`, `COA_6`, `COA_7`, `COA_8`, `COA_9`, `COA_10`, `COA1_AFF`, `COA2_AFF`, `COA3_AFF`, `COA4_AFF`, `COA5_AFF`, `COA6_AFF`, `COA7_AFF`, `COA8_AFF`, `COA9_AFF`, `COA10_AFF`, `Pub_Name`, `DOI`, `Volume`, `PageNo`, `Citation`, `Paid`, `SJR`, `count`, `Issue`$newfields) VALUES($empid,'$journalISSN','$journalType','$journalName','$journalTitle','$journalAuthName','$jourDate','$journalChapter',null,'$journalPeer','$paperImage','$journalImpact','$journalCoa1','$journalCoa2','$journalCoa3','$journalCoa4','$journalCoa5','$journalCoa6','$journalCoa7','$journalCoa8','$journalCoa9','$journalCoa10','$journalCoa1_Aff','$journalCoa2_Aff','$journalCoa3_Aff','$journalCoa4_Aff','$journalCoa5_Aff','$journalCoa6_Aff','$journalCoa7_Aff','$journalCoa8_Aff','$journalCoa9_Aff','$journalCoa10_Aff','$journalPubName','$journalDoi','$journalVolume','$journalPageNumber','$journalCitationIndex','$journalPaid','$journalSJR',$count,'$journalIssue'$newfieldsval)";
        }
        else if($image[7]==1)
        {
            $sql="INSERT INTO publication_journals(`Emp4_Id`, `ISSN`, `Type`, `Name`, `Title`, `Author`, `Date`, `Book_Chapter`, `Certificate`, `Peer_Reviewed`, `Paper_PDF`, `Impact_Factor`, `COA_1`, `COA_2`, `COA_3`, `COA_4`, `COA_5`, `COA_6`, `COA_7`, `COA_8`, `COA_9`, `COA_10`, `COA1_AFF`, `COA2_AFF`, `COA3_AFF`, `COA4_AFF`, `COA5_AFF`, `COA6_AFF`, `COA7_AFF`, `COA8_AFF`, `COA9_AFF`, `COA10_AFF`, `Pub_Name`, `DOI`, `Volume`, `PageNo`, `Citation`, `Paid`, `SJR`, `count`, `Issue`$newfields) VALUES($empid,'$journalISSN','$journalType','$journalName','$journalTitle','$journalAuthName','$jourDate','$journalChapter','$certificateImage','$journalPeer',null,'$journalImpact','$journalCoa1','$journalCoa2','$journalCoa3','$journalCoa4','$journalCoa5','$journalCoa6','$journalCoa7','$journalCoa8','$journalCoa9','$journalCoa10','$journalCoa1_Aff','$journalCoa2_Aff','$journalCoa3_Aff','$journalCoa4_Aff','$journalCoa5_Aff','$journalCoa6_Aff','$journalCoa7_Aff','$journalCoa8_Aff','$journalCoa9_Aff','$journalCoa10_Aff','$journalPubName','$journalDoi','$journalVolume','$journalPageNumber','$journalCitationIndex','$journalPaid','$journalSJR',$count,'$journalIssue'$newfieldsval)";
        }
        else
        {
            $sql="INSERT INTO publication_journals(`Emp4_Id`, `ISSN`, `Type`, `Name`, `Title`, `Author`, `Date`, `Book_Chapter`, `Certificate`, `Peer_Reviewed`, `Paper_PDF`, `Impact_Factor`, `COA_1`, `COA_2`, `COA_3`, `COA_4`, `COA_5`, `COA_6`, `COA_7`, `COA_8`, `COA_9`, `COA_10`, `COA1_AFF`, `COA2_AFF`, `COA3_AFF`, `COA4_AFF`, `COA5_AFF`, `COA6_AFF`, `COA7_AFF`, `COA8_AFF`, `COA9_AFF`, `COA10_AFF`, `Pub_Name`, `DOI`, `Volume`, `PageNo`, `Citation`, `Paid`, `SJR`, `count`, `Issue`$newfields) VALUES($empid,'$journalISSN','$journalType','$journalName','$journalTitle','$journalAuthName','$jourDate','$journalChapter',null,'$journalPeer',null,'$journalImpact','$journalCoa1','$journalCoa2','$journalCoa3','$journalCoa4','$journalCoa5','$journalCoa6','$journalCoa7','$journalCoa8','$journalCoa9','$journalCoa10','$journalCoa1_Aff','$journalCoa2_Aff','$journalCoa3_Aff','$journalCoa4_Aff','$journalCoa5_Aff','$journalCoa6_Aff','$journalCoa7_Aff','$journalCoa8_Aff','$journalCoa9_Aff','$journalCoa10_Aff','$journalPubName','$journalDoi','$journalVolume','$journalPageNumber','$journalCitationIndex','$journalPaid','$journalSJR',$count,'$journalIssue'$newfieldsval)";
        }
        if($result=$conn->query($sql))
        {
            header('Location:profile.php#section42');
        }else
        {
            echo "<script type='text/javascript'>alert('".mysqli_error($conn)."');</script>";
        }
    }
}
$flagconf=0;
if(isset($_POST["submitconference"]))
{
    $count=0;
    $confName=$_POST["conf_name"];
    $confType=$_POST["conf_type"];
    $confDate=$_POST["pubdate"];
    $confHindex=$_POST["conf_hindex"];
    $confDoi = $_POST["doi"];
    $confPubname = $_POST["conf_pubname"];
    $confProname = $_POST["conf_proname"];
    $confPeer = $_POST["conf_peer"];
    $confThemename = $_POST["conf_themename"];
    $confPaid = $_POST["conf_paid"];
    $confPageno = $_POST["conf_pg"];
    $confIssn = $_POST["conf_issn"];
    $confOrgname = $_POST["conf_orgname"];
    $confPlace = $_POST["conf_place"];
    $confPresented = $_POST["conf_pres"];
    $confPoster = $_POST["conf_poster"];
    $confCite = $_POST["conf_cite"];
    $confWeb = $_POST["conf_web"];
    if(!empty($_POST["name1"])){
        $count++;
        $confCoa1=$_POST["name1"];
    }
    if(!empty($_POST["name2"])){
        $count++;
        $confCoa2=$_POST["name2"];}
    else
        $confCoa2=" ";
    //echo "<script type='text/javascript'>alert('$confCoa2');</script>";
    if(!empty($_POST["name3"])){
        $count++;
        $confCoa3=$_POST["name3"];}
    else
        $confCoa3=" ";
    if(!empty($_POST["name4"])){
        $count++;
        $confCoa4=$_POST["name4"];}
    else
        $confCoa4=" ";
    if(!empty($_POST["name5"])){
        $count++;
        $confCoa5=$_POST["name5"];}
    else
        $confCoa5=" ";
    if(!empty($_POST["name6"])){
        $count++;
        $confCoa6=$_POST["name6"];}
    else
        $confCoa6=" ";
    if(!empty($_POST["name7"])){
        $count++;
        $confCoa7=$_POST["name7"];}
    else
        $confCoa7=" ";
    if(!empty($_POST["name8"])){
        $count++;
        $confCoa8=$_POST["name8"];}
    else
        $confCoa8=" ";
    if(!empty($_POST["name9"])){
        $count++;
        $confCoa9=$_POST["name9"];}
    else
        $confCoa9=" ";
    if(!empty($_POST["name10"])){
        $count++;
        $confCoa10=$_POST["name10"];}
    else
        $confCoa10=" ";
    $confCoa1_Aff=$_POST["name1_affiliation"];
    if(!empty($_POST["name2_affiliation"]))
        $confCoa2_Aff=$_POST["name2_affiliation"];
    else
        $confCoa2_Aff=" ";
    //echo "<script type='text/javascript'>alert('$confCoa2_Aff');</script>";
    if(!empty($_POST["name3_affiliation"]))
        $confCoa3_Aff=$_POST["name3_affiliation"];
    else
        $confCoa3_Aff=" ";
    if(!empty($_POST["name4_affiliation"]))
        $confCoa4_Aff=$_POST["name4_affiliation"];
    else
        $confCoa4_Aff=" ";
    if(!empty($_POST["name5_affiliation"]))
        $confCoa5_Aff=$_POST["name5_affiliation"];
    else
        $confCoa5_Aff=" ";
    if(!empty($_POST["name6_affiliation"]))
        $confCoa6_Aff=$_POST["name6_affiliation"];
    else
        $confCoa6_Aff=" ";
    if(!empty($_POST["name7_affiliation"]))
        $confCoa7_Aff=$_POST["name7_affiliation"];
    else
        $confCoa7_Aff=" ";
    if(!empty($_POST["name8_affiliation"]))
        $confCoa8_Aff=$_POST["name8_affiliation"];
    else
        $confCoa8_Aff=" ";
    if(!empty($_POST["name9_affiliation"]))
        $confCoa9_Aff=$_POST["name9_affiliation"];
    else
        $confCoa9_Aff=" ";
    if(!empty($_POST["name10_affiliation"]))
        $confCoa10_Aff=$_POST["name10_affiliation"];
    else
        $confCoa10_Aff=" ";
    if($_POST["conf_fauth"] == "YES")
        $confAuthName = $name;
    else if($_POST["conf_fauth"] == "NO")
        $confAuthName = $_POST["conf_fauth_val"];
    if(!empty($_FILES["conf_posterpdf"]["tmp_name"]))
    {
        $confPosterpdf = addslashes(file_get_contents($_FILES["conf_posterpdf"]["tmp_name"]));
        $image[11]=1;
    }
    else
    {
        $image[11]=0;
    }


    if(!empty($_FILES["paper_image"]["tmp_name"]))
    {
        $paperImage = addslashes(file_get_contents($_FILES["paper_image"]["tmp_name"]));
        $image[8]=1;
    }

    else
        $image[8]=0;


    if(!empty($_FILES["certificate_image"]["tmp_name"]))
    {
        $certificateImage = addslashes(file_get_contents($_FILES["certificate_image"]["tmp_name"]));
        $image[9]=1;
    }

    else
        $image[9]=0;

    $ba=date_create($confDate);
    $ab=date_create($dob);

    $diff=date_diff($ab,$ba);
    if($diff->format("%R")=='-'){

        $err[35]="* Please Enter A Valid Conference Date";
        $flagconf=1;
    }

    if($flagconf==0)
    {
        $newfields=null;
        $newfieldsval=null;
        $new_field_query = "select * from new_fields where table_name='publication_conferences'";
        $new_result = $conn->query($new_field_query);
        if ($new_result->num_rows > 0) {
            while ($row = $new_result->fetch_assoc()) {
                $field_name = $row['field_name'];
                $label = $row['label'];
                $display = $row['display'];
                if ($display == 1) {
                    $newfieldsval=$newfieldsval.",'$_POST[$field_name]'";
                    $newfields=$newfields.",$field_name";
                }
            }
        }
        if($image[9] == 1 && $image[8]==1 && $image[11]==1)
        {
            $sql="INSERT INTO publication_conferences(`Emp5_Id`, `ISSN`, `Type`, `Name`, `Place`, `Date`, `Author`, `Certificate`, `Paper_Pdf`, `COA1`, `COA2`, `COA3`, `COA4`, `COA5`, `COA6`, `COA7`, `COA8`, `COA9`, `COA10`, `COA1_AFF`, `COA2_AFF`, `COA3_AFF`, `COA4_AFF`, `COA5_AFF`, `COA6_AFF`, `COA7_AFF`, `COA8_AFF`, `COA9_AFF`, `COA10_AFF`, `H_Index`, `DOI`, `Pub_Name`, `Proc_Name`, `Peer`, `Theme`, `Paid`, `PageNo`, `Organizer`, `Presented`, `Web`, `Poster`, `Citation_Index`, `count`, `presentation_pdf`$newfields) VALUES ($empid,'$confIssn','$confType','$confName','$confPlace','$confDate','$confAuthName','$certificateImage','$paperImage','$confCoa1','$confCoa2','$confCoa3','$confCoa4','$confCoa5','$confCoa6','$confCoa7','$confCoa8','$confCoa9','$confCoa10','$confCoa1_Aff','$confCoa2_Aff','$confCoa3_Aff','$confCoa4_Aff','$confCoa5_Aff','$confCoa6_Aff','$confCoa7_Aff','$confCoa8_Aff','$confCoa9_Aff','$confCoa10_Aff','$confHindex','$confDoi','$confPubname','$confProname','$confPeer','$confThemename','$confPaid','$confPageno','$confIssn','$confOrgname','$confPresented','$confWeb','$confPoster','$confCite',$count,'$confPosterpdf'$newfieldsval)";
        }
        else if($image[8]==1 && $image[9]==1 && $image[11]==0)
        {
            $sql="INSERT INTO publication_conferences(`Emp5_Id`, `ISSN`, `Type`, `Name`, `Place`, `Date`, `Author`, `Certificate`, `Paper_Pdf`, `COA1`, `COA2`, `COA3`, `COA4`, `COA5`, `COA6`, `COA7`, `COA8`, `COA9`, `COA10`, `COA1_AFF`, `COA2_AFF`, `COA3_AFF`, `COA4_AFF`, `COA5_AFF`, `COA6_AFF`, `COA7_AFF`, `COA8_AFF`, `COA9_AFF`, `COA10_AFF`, `H_Index`, `DOI`, `Pub_Name`, `Proc_Name`, `Peer`, `Theme`, `Paid`, `PageNo`, `Organizer`, `Presented`, `Web`, `Poster`, `Citation_Index`, `count`, `presentation_pdf`$newfields) VALUES ($empid,'$confIssn','$confType','$confName','$confPlace','$confDate','$confAuthName','$certificateImage','$paperImage','$confCoa1','$confCoa2','$confCoa3','$confCoa4','$confCoa5','$confCoa6','$confCoa7','$confCoa8','$confCoa9','$confCoa10','$confCoa1_Aff','$confCoa2_Aff','$confCoa3_Aff','$confCoa4_Aff','$confCoa5_Aff','$confCoa6_Aff','$confCoa7_Aff','$confCoa8_Aff','$confCoa9_Aff','$confCoa10_Aff','$confHindex','$confDoi','$confPubname','$confProname','$confPeer','$confThemename','$confPaid','$confPageno','$confOrgname','$confPresented','$confWeb','$confPoster','$confCite',$count,null$newfieldsval)";
        }
        else if($image[9]==1 && $image[11]==1 && $image[8]==0)
        {
            $sql="INSERT INTO publication_conferences(`Emp5_Id`, `ISSN`, `Type`, `Name`, `Place`, `Date`, `Author`, `Certificate`, `Paper_Pdf`, `COA1`, `COA2`, `COA3`, `COA4`, `COA5`, `COA6`, `COA7`, `COA8`, `COA9`, `COA10`, `COA1_AFF`, `COA2_AFF`, `COA3_AFF`, `COA4_AFF`, `COA5_AFF`, `COA6_AFF`, `COA7_AFF`, `COA8_AFF`, `COA9_AFF`, `COA10_AFF`, `H_Index`, `DOI`, `Pub_Name`, `Proc_Name`, `Peer`, `Theme`, `Paid`, `PageNo`, `Organizer`, `Presented`, `Web`, `Poster`, `Citation_Index`, `count`, `presentation_pdf`$newfields) VALUES ($empid,'$confIssn','$confType','$confName','$confPlace','$confDate','$confAuthName','$certificateImage',null,'$confCoa1','$confCoa2','$confCoa3','$confCoa4','$confCoa5','$confCoa6','$confCoa7','$confCoa8','$confCoa9','$confCoa10','$confCoa1_Aff','$confCoa2_Aff','$confCoa3_Aff','$confCoa4_Aff','$confCoa5_Aff','$confCoa6_Aff','$confCoa7_Aff','$confCoa8_Aff','$confCoa9_Aff','$confCoa10_Aff','$confHindex','$confDoi','$confPubname','$confProname','$confPeer','$confThemename','$confPaid','$confPageno','$confOrgname','$confPresented','$confWeb','$confPoster','$confCite',$count,'$confPosterpdf'$newfieldsval)";
        }
        else if($image[8]==1 && $image[11]==1 && $image[9]==0)
        {
            $sql="INSERT INTO publication_conferences(`Emp5_Id`, `ISSN`, `Type`, `Name`, `Place`, `Date`, `Author`, `Certificate`, `Paper_Pdf`, `COA1`, `COA2`, `COA3`, `COA4`, `COA5`, `COA6`, `COA7`, `COA8`, `COA9`, `COA10`, `COA1_AFF`, `COA2_AFF`, `COA3_AFF`, `COA4_AFF`, `COA5_AFF`, `COA6_AFF`, `COA7_AFF`, `COA8_AFF`, `COA9_AFF`, `COA10_AFF`, `H_Index`, `DOI`, `Pub_Name`, `Proc_Name`, `Peer`, `Theme`, `Paid`, `PageNo`, `Organizer`, `Presented`, `Web`, `Poster`, `Citation_Index`, `count`, `presentation_pdf`$newfields) VALUES ($empid,'$confIssn','$confType','$confName','$confPlace','$confDate','$confAuthName',null,'$paperImage','$confCoa1','$confCoa2','$confCoa3','$confCoa4','$confCoa5','$confCoa6','$confCoa7','$confCoa8','$confCoa9','$confCoa10','$confCoa1_Aff','$confCoa2_Aff','$confCoa3_Aff','$confCoa4_Aff','$confCoa5_Aff','$confCoa6_Aff','$confCoa7_Aff','$confCoa8_Aff','$confCoa9_Aff','$confCoa10_Aff','$confHindex','$confDoi','$confPubname','$confProname','$confPeer','$confThemename','$confPaid','$confPageno','$confOrgname','$confPresented','$confWeb','$confPoster','$confCite',$count,'$confPosterpdf'$newfieldsval)";
        }
        else if($image[8]==0 && $image[11]==0 && $image[9]==1)
        {
            $sql="INSERT INTO publication_conferences(`Emp5_Id`, `ISSN`, `Type`, `Name`, `Place`, `Date`, `Author`, `Certificate`, `Paper_Pdf`, `COA1`, `COA2`, `COA3`, `COA4`, `COA5`, `COA6`, `COA7`, `COA8`, `COA9`, `COA10`, `COA1_AFF`, `COA2_AFF`, `COA3_AFF`, `COA4_AFF`, `COA5_AFF`, `COA6_AFF`, `COA7_AFF`, `COA8_AFF`, `COA9_AFF`, `COA10_AFF`, `H_Index`, `DOI`, `Pub_Name`, `Proc_Name`, `Peer`, `Theme`, `Paid`, `PageNo`, `Organizer`, `Presented`, `Web`, `Poster`, `Citation_Index`, `count`, `presentation_pdf`$newfields) VALUES ($empid,'$confIssn','$confType','$confName','$confPlace','$confDate','$confAuthName','$certificateImage',null,'$confCoa1','$confCoa2','$confCoa3','$confCoa4','$confCoa5','$confCoa6','$confCoa7','$confCoa8','$confCoa9','$confCoa10','$confCoa1_Aff','$confCoa2_Aff','$confCoa3_Aff','$confCoa4_Aff','$confCoa5_Aff','$confCoa6_Aff','$confCoa7_Aff','$confCoa8_Aff','$confCoa9_Aff','$confCoa10_Aff','$confHindex','$confDoi','$confPubname','$confProname','$confPeer','$confThemename','$confPaid','$confPageno','$confOrgname','$confPresented','$confWeb','$confPoster','$confCite',$count,null$newfieldsval)";
        }
        else if($image[8]==0 && $image[11]==1 && $image[9]==0)
        {
            $sql="INSERT INTO publication_conferences(`Emp5_Id`, `ISSN`, `Type`, `Name`, `Place`, `Date`, `Author`, `Certificate`, `Paper_Pdf`, `COA1`, `COA2`, `COA3`, `COA4`, `COA5`, `COA6`, `COA7`, `COA8`, `COA9`, `COA10`, `COA1_AFF`, `COA2_AFF`, `COA3_AFF`, `COA4_AFF`, `COA5_AFF`, `COA6_AFF`, `COA7_AFF`, `COA8_AFF`, `COA9_AFF`, `COA10_AFF`, `H_Index`, `DOI`, `Pub_Name`, `Proc_Name`, `Peer`, `Theme`, `Paid`, `PageNo`, `Organizer`, `Presented`, `Web`, `Poster`, `Citation_Index`, `count`, `presentation_pdf`$newfields) VALUES ($empid,'$confIssn','$confType','$confName','$confPlace','$confDate','$confAuthName',null,null,'$confCoa1','$confCoa2','$confCoa3','$confCoa4','$confCoa5','$confCoa6','$confCoa7','$confCoa8','$confCoa9','$confCoa10','$confCoa1_Aff','$confCoa2_Aff','$confCoa3_Aff','$confCoa4_Aff','$confCoa5_Aff','$confCoa6_Aff','$confCoa7_Aff','$confCoa8_Aff','$confCoa9_Aff','$confCoa10_Aff','$confHindex','$confDoi','$confPubname','$confProname','$confPeer','$confThemename','$confPaid','$confPageno','$confOrgname','$confPresented','$confWeb','$confPoster','$confCite',$count,'$confPosterpdf'$newfieldsval)";
        }
        else if($image[8]==1 && $image[11]==0 && $image[9]==0)
        {
            $sql="INSERT INTO publication_conferences(`Emp5_Id`, `ISSN`, `Type`, `Name`, `Place`, `Date`, `Author`, `Certificate`, `Paper_Pdf`, `COA1`, `COA2`, `COA3`, `COA4`, `COA5`, `COA6`, `COA7`, `COA8`, `COA9`, `COA10`, `COA1_AFF`, `COA2_AFF`, `COA3_AFF`, `COA4_AFF`, `COA5_AFF`, `COA6_AFF`, `COA7_AFF`, `COA8_AFF`, `COA9_AFF`, `COA10_AFF`, `H_Index`, `DOI`, `Pub_Name`, `Proc_Name`, `Peer`, `Theme`, `Paid`, `PageNo`, `Organizer`, `Presented`, `Web`, `Poster`, `Citation_Index`, `count`, `presentation_pdf`$newfields) VALUES ($empid,'$confIssn','$confType','$confName','$confPlace','$confDate','$confAuthName',null,'$paperImage','$confCoa1','$confCoa2','$confCoa3','$confCoa4','$confCoa5','$confCoa6','$confCoa7','$confCoa8','$confCoa9','$confCoa10','$confCoa1_Aff','$confCoa2_Aff','$confCoa3_Aff','$confCoa4_Aff','$confCoa5_Aff','$confCoa6_Aff','$confCoa7_Aff','$confCoa8_Aff','$confCoa9_Aff','$confCoa10_Aff','$confHindex','$confDoi','$confPubname','$confProname','$confPeer','$confThemename','$confPaid','$confPageno','$confOrgname','$confPresented','$confWeb','$confPoster','$confCite',$count,null$newfieldsval)";
        }
        else if($image[8]==0 && $image[11]==0 && $image[9]==0)
        {
            $sql="INSERT INTO publication_conferences(`Emp5_Id`, `ISSN`, `Type`, `Name`, `Place`, `Date`, `Author`, `Certificate`, `Paper_Pdf`, `COA1`, `COA2`, `COA3`, `COA4`, `COA5`, `COA6`, `COA7`, `COA8`, `COA9`, `COA10`, `COA1_AFF`, `COA2_AFF`, `COA3_AFF`, `COA4_AFF`, `COA5_AFF`, `COA6_AFF`, `COA7_AFF`, `COA8_AFF`, `COA9_AFF`, `COA10_AFF`, `H_Index`, `DOI`, `Pub_Name`, `Proc_Name`, `Peer`, `Theme`, `Paid`, `PageNo`, `Organizer`, `Presented`, `Web`, `Poster`, `Citation_Index`, `count`, `presentation_pdf`$newfields) VALUES ($empid,'$confIssn','$confType','$confName','$confPlace','$confDate','$confAuthName',null,null,'$confCoa1','$confCoa2','$confCoa3','$confCoa4','$confCoa5','$confCoa6','$confCoa7','$confCoa8','$confCoa9','$confCoa10','$confCoa1_Aff','$confCoa2_Aff','$confCoa3_Aff','$confCoa4_Aff','$confCoa5_Aff','$confCoa6_Aff','$confCoa7_Aff','$confCoa8_Aff','$confCoa9_Aff','$confCoa10_Aff','$confHindex','$confDoi','$confPubname','$confProname','$confPeer','$confThemename','$confPaid','$confPageno','$confOrgname','$confPresented','$confWeb','$confPoster','$confCite',$count,null$newfieldsval)";
        }
        if($result=$conn->query($sql))
        {
            header('Location:profile.php#section43');
        }else
        {
            echo mysqli_error($conn);
        }
    }
}
$flagatten=0;
if(isset($_POST["submitsttpattended"]))
{
    $attendedname = $_POST["attendedname"];
    $eventtype=$_POST["eventtype"];
    $datefromattended=$_POST["datefromattended"];
    $datetoattended=$_POST["datetoattended"];
    $organizedbyattended=$_POST["organisedbyattended"];
    $durationattended=$_POST["durationattended"];
    $participantsattended=$_POST["participantsattended"];
    $speakerattended=$_POST["speakerattended"];
    $locationattended=$_POST["locationattended"];
    $eventtype_new=$_POST['eventtype_new'];

    if($eventtype=="Other" && $eventtype_new!=null){
        $eventtype=$eventtype_new;
    }
    $ba=date_create($datefromattended);
    $ab=date_create($dob);
    $abc = date_create($datetoattended);

    $diff=date_diff($ab,$ba);
    if($diff->format("%R")=='-'){

        $err[37]="* Please Enter A Valid Start Date";
        $flagatten=1;
    }
    $diff=date_diff($ba,$abc);
    if($diff->format("%R") == '-'){
        $err[38]="Please Enter Valid Start And End Date";
        $flagatten=1;
    }

    if(empty($participantsattended))
    {
        $participantsattended =0;
    }

    if(!empty($_FILES["certificateattended"]["tmp_name"]))
    {
        $certificateattended = addslashes(file_get_contents($_FILES["certificateattended"]["tmp_name"]));
        $image[10]=1;
    }
    else
        $image[10]=0;


    if($flagatten==0)
    {
        $newfields=null;
        $newfieldsval=null;
        $new_field_query = "select * from new_fields where table_name='sttp_event_attended'";
        $new_result = $conn->query($new_field_query);
        if ($new_result->num_rows > 0) {
            while ($row = $new_result->fetch_assoc()) {
                $field_name = $row['field_name'];
                $label = $row['label'];
                $display = $row['display'];
                if ($display == 1) {
                    $newfieldsval=$newfieldsval.",'$_POST[$field_name]'";
                    $newfields=$newfields.",$field_name";
                }
            }
        }
        if($image[10] == 1)
        {
            $sql="INSERT INTO sttp_event_attended(`Emp6_Id`, `Date_From`, `Date_To`, `Organized_By`, `Place`, `Duration`, `Total_Participation`, `Speaker`, `Event_Type`, `Certificate`, `Title`$newfields) VALUES ($empid,'$datefromattended','$datetoattended','$organizedbyattended','$locationattended','$durationattended',$participantsattended,'$speakerattended','$eventtype','$certificateattended','$attendedname'$newfieldsval)";
        }
        else
        {
            $sql="INSERT INTO sttp_event_attended(`Emp6_Id`, `Date_From`, `Date_To`, `Organized_By`, `Place`, `Duration`, `Total_Participation`, `Speaker`, `Event_Type`, `Certificate`, `Title`$newfields) VALUES ($empid,'$datefromattended','$datetoattended','$organizedbyattended','$locationattended','$durationattended',$participantsattended,'$speakerattended','$eventtype',null,'$attendedname'$newfieldsval)";
        }
        if($result=$conn->query($sql))
        {
            header('Location:profile.php#section51');
        }else
        {
            echo "<script type='text/javascript'>alert('".mysqli_error($conn)."');</script>";
        }
    }
}
$flagorg=0;
if(isset($_POST["submitsttporganized"]))
{
    $organizedname=$_POST["organizedname"];
    $eventtype=$_POST["organizedeventtype"];
    $datefromorganized=$_POST["datefromorganized"];
    $datetoorganized=$_POST["datetoorganized"];
    $role=$_POST["roleorganized"];
    $participantsorganized=$_POST["participantsorganized"];
    $placeorganized=$_POST["placeorganized"];
    $orgeventtype_new=$_POST['orgeventtype_new'];

    if($eventtype=="Other" && $orgeventtype_new!=null){
        $eventtype=$orgeventtype_new;
    }
    if(empty($participantsorganized))
    {
        $participantsorganized=0;
    }

    $ba=date_create($datefromorganized);
    $ab=date_create($dob);
    $abc = date_create($datetoorganized);

    $diff=date_diff($ab,$ba);
    if($diff->format("%R")=='-'){

        $err[39]="* Please Enter A Valid Start Date";
        $flagorg=1;
    }
    $diff=date_diff($ba,$abc);
    if($diff->format("%R") == '-'){
        $err[40]="Please Enter Valid Start And End Date";
        $flagorg=1;
    }
    if($flagorg==0)
    {
        $newfields=null;
        $newfieldsval=null;
        $new_field_query = "select * from new_fields where table_name='sttp_event_organized'";
        $new_result = $conn->query($new_field_query);
        if ($new_result->num_rows > 0) {
            while ($row = $new_result->fetch_assoc()) {
                $field_name = $row['field_name'];
                $label = $row['label'];
                $display = $row['display'];
                if ($display == 1) {
                    $newfieldsval=$newfieldsval.",'$_POST[$field_name]'";
                    $newfields=$newfields.",$field_name";
                }
            }
        }
        $sql="INSERT INTO sttp_event_organized(`Emp7_Id`, `Type`, `Role`, `Number_Participants`, `Place`, `Date_From`, `Date_To`, `Name`$newfields) VALUES($empid,'$eventtype','$role',$participantsorganized,'$placeorganized','$datefromorganized','$datetoorganized','$organizedname'$newfieldsval)";
        if($result=$conn->query($sql))
        {
            header('Location:profile.php#section52');
        }else
        {
            echo "<script type='text/javascript'>alert('".mysqli_error($conn)."');</script>";
        }
    }

}
$flagdel=0;
if(isset($_POST["submitsttpdelivered"]))
{
    $deliveredname=$_POST["deliveredname"];
    $datefromdelivered=$_POST["datefromdelivered"];
    $eventtype=$_POST["deliveredeventtype"];
    $datetodelivered=$_POST["datetodelivered"];
    $activitydescription=$_POST["activitydescription"];
    $placedelivered=$_POST["placedelivered"];
    $durationdelivered=$_POST["durationdelivered"];
    $deleventtype_new=$_POST['deleventtype_new'];

    if($eventtype=="Other" && $deleventtype_new!=null){
        $eventtype=$deleventtype_new;
    }
    $ba=date_create($datefromdelivered);
    $ab=date_create($dob);
    $abc = date_create($datetodelivered);

    $diff=date_diff($ab,$ba);
    if($diff->format("%R")=='-'){

        $err[41]="* Please Enter A Valid Start Date";
        $flagdel=1;
    }
    $diff=date_diff($ba,$abc);
    if($diff->format("%R") == '-'){
        $err[42]="Please Enter Valid Start And End Date";
        $flagdel=1;
    }

    if($flagdel==0)
    {
        $newfields=null;
        $newfieldsval=null;
        $new_field_query = "select * from new_fields where table_name='sttp_event_delivered'";
        $new_result = $conn->query($new_field_query);
        if ($new_result->num_rows > 0) {
            while ($row = $new_result->fetch_assoc()) {
                $field_name = $row['field_name'];
                $label = $row['label'];
                $display = $row['display'];
                if ($display == 1) {
                    $newfieldsval=$newfieldsval.",'$_POST[$field_name]'";
                    $newfields=$newfields.",$field_name";
                }
            }
        }
        $sql="INSERT INTO sttp_event_delivered(`Emp9_Id`, `Description`, `Place`, `Duration`, `Date_From`, `Date_To`, `Name`, `Event_Type`$newfields) VALUES($empid,'$activitydescription','$placedelivered','$durationdelivered','$datefromdelivered','$datetodelivered','$deliveredname','$eventtype'$newfieldsval)";
        if($result=$conn->query($sql))
        {
            header('Location:profile.php#section53');
        }else
        {
            echo "<script type='text/javascript'>alert('".mysqli_error($conn)."');</script>";
        }
    }
}

if(isset($_POST["submitcocurricular"]))
{
    $cocurrname=$_POST["cocurrname"];
    $cocurrdescription=$_POST["cocurrdescription"];
    $cocurrdate=$_POST["cocurrdate"];
    $cocurrrole=$_POST["cocurrrole"];
    if(isset($_POST["name22"]))
        $cocurrtype=$_POST["name22"];
    else
        $cocurrtype="KJ Somaiya(InHouse)";
    $ba=date_create($cocurrdate);
    $ab=date_create($dob);

    $diff=date_diff($ab,$ba);
    if($diff->format("%R")=='-'){

        $err[43]="* Please Enter A Valid Date";
    }
    else{
        $newfields=null;
        $newfieldsval=null;
        $new_field_query = "select * from new_fields where table_name='co_curricular'";
        $new_result = $conn->query($new_field_query);
        if ($new_result->num_rows > 0) {
            while ($row = $new_result->fetch_assoc()) {
                $field_name = $row['field_name'];
                $label = $row['label'];
                $display = $row['display'];
                if ($display == 1) {
                    $newfieldsval=$newfieldsval.",'$_POST[$field_name]'";
                    $newfields=$newfields.",$field_name";
                }
            }
        }
        $sql="INSERT INTO co_curricular(`Emp10_Id`, `Description`, `Date`, `Role`, `Name`, `Type`$newfields) VALUES ($empid,'$cocurrdescription','$cocurrdate','$cocurrrole','$cocurrname','$cocurrtype'$newfieldsval)";
        if($result=$conn->query($sql))
        {
            header('Location:profile.php#section6');
        }else
        {
            echo "<script type='text/javascript'>alert('".mysqli_error($conn)."');</script>";
        }
    }
}

if(isset($_POST["submitextra"]))
{
    $extraname=$_POST["extraname"];
    $extradesc=$_POST["extradescription"];
    $extradate=$_POST["extradate"];
    $extrarole=$_POST["extrarole"];
    $extraplace=$_POST["extraplace"];
    $ba=date_create($extradate);
    $ab=date_create($dob);


    $diff=date_diff($ab,$ba);
     if (!empty($_FILES["extra_certificate_image"]["tmp_name"])) {
        $extra_certificate_image = addslashes(file_get_contents($_FILES["extra_certificate_image"]["tmp_name"]));
        $image[14] = 1;
    } else
        $image[14] = 0;


    if($diff->format("%R")=='-'){

        $err[44]="* Please Enter A Valid Date";
    }
    else{
        $newfields=null;
        $newfieldsval=null;
        $new_field_query = "select * from new_fields where table_name='extra'";
        $new_result = $conn->query($new_field_query);
        if ($new_result->num_rows > 0) {
            while ($row = $new_result->fetch_assoc()) {
                $field_name = $row['field_name'];
                $label = $row['label'];
                $display = $row['display'];
                if ($display == 1) {
                    $newfieldsval=$newfieldsval.",'$_POST[$field_name]'";
                    $newfields=$newfields.",$field_name";
                }
            }
        }
        if ($image[14] == 1) {
            $sql="INSERT INTO extra(`Emp11_Id`, `Description`, `Role`, `Place`, `Date`, `Name`,`Certificate`$newfields) VALUES($empid,'$extradesc','$extrarole','$extraplace','$extradate','$extraname','$extra_certificate_image'$newfieldsval)";

        } else {
            echo "in the problem";
            $sql="INSERT INTO extra(`Emp11_Id`, `Description`, `Role`, `Place`, `Date`, `Name`,`Certificate`$newfields) VALUES($empid,'$extradesc','$extrarole','$extraplace','$extradate','$extraname',NULL$newfieldsval)";
        }


        if($result=$conn->query($sql))
        {
            header('Location:profile.php#section7');
        }else
        {
            echo "<script type='text/javascript'>alert('".mysqli_error($conn)."');</script>";
        }
    }
}

$flagawd=0;
if(isset($_POST["submit_award"])) {
    $award_name = $_POST['award_name'];
    $award_date = $_POST['award_date'];
    $award_issuer = $_POST['award_issuer'];
    $award_description = $_POST['award_description'];

    $ba = date_create($award_date);
    $ab = date_create($dob);
    $diff = date_diff($ab, $ba);
    if ($diff->format("%R") == '-') {
        $err[41] = "* Please Enter A Valid Start Date";
        $flagawd = 1;
    }

    if (!empty($_FILES["award_certificate_image"]["tmp_name"])) {
        $award_certificate_image = addslashes(file_get_contents($_FILES["award_certificate_image"]["tmp_name"]));
        $image[13] = 1;
    } else
        $image[13] = 0;

    if ($flagawd == 0) {
        $newfields=null;
        $newfieldsval=null;
        $new_field_query = "select * from new_fields where table_name='awards'";
        $new_result = $conn->query($new_field_query);
        if ($new_result->num_rows > 0) {
            while ($row = $new_result->fetch_assoc()) {
                $field_name = $row['field_name'];
                $label = $row['label'];
                $display = $row['display'];
                if ($display == 1) {
                    $newfieldsval=$newfieldsval.",'$_POST[$field_name]'";
                    $newfields=$newfields.",$field_name";
                }
            }
        }
        if ($image[13] == 1) {
            $award_query = "INSERT INTO awards(emp_id,award_title,award_date,award_issuer,award_desc,certificate$newfields) VALUES ($empid,'$award_name','$award_date','$award_issuer','$award_description','$award_certificate_image'$newfieldsval)";
        } else {
            $award_query = "INSERT INTO awards(emp_id,award_title,award_date,award_issuer,award_desc,certificate$newfields) VALUES ($empid,'$award_name','$award_date','$award_issuer','$award_description',NULL$newfieldsval)";
        }
        if ($conn->query($award_query) == true) {
            header('Location:profile.php#awards');
        } else {
            echo "<script type='text/javascript'>alert('" . mysqli_error($conn) . "');</script>";
        }
    }
}
?>
