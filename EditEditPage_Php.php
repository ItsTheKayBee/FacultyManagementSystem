<?php
include 'dbconnect.php';
include 'Decision2.php';

if(!isset($_SESSION["Emp_Id"]))
    header('Location:logout.php');
if(!isset($_SESSION["EditId"]))
    header('Location:main.php#section21');

$empid=$_SESSION["EditId"];
$eid = $_SESSION["Emp_Id"];

$continue = 0;

$sql = "SELECT * FROM edit";
$result = $conn->query($sql);
while($row = mysqli_fetch_assoc($result))
{
    if(($eid == $row["Emp1_Id"]) && ($empid == $row["Emp2_Id"])){
        $continue = 1;
        break;
    }
}
$form = "";
if($continue == 0)
    header('Location:main.php#section21');

//echo $empid;
$myData = array('val'=>$empid);
$arg = base64_encode(json_encode($myData));

$image = array(0,0,0,0,0,0,0,0,0,0,0,0,0,0);
$maxdate = (date("Y")-22)."-12-31";
$err=array("","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","");
$sql = "SELECT * FROM personal_details WHERE Emp3_Id=$empid";
$result = $conn->query($sql);
$row = mysqli_fetch_assoc($result);
$dob = $row["DOB"];
$idname = $row["Name"];
$dobyear = (int)substr($dob,0,4);
$curyear=date("Y");
$yearArray = range($dobyear+12, $curyear);

$astyle = "style='color:#3C2AE6;'";

if($val == 1)
{
    $form = "Courses";
    $temp = 0;
    $sql="SELECT * from courses where Emp8_Id=$empid";
    $result=$conn->query($sql);
    while($row = mysqli_fetch_assoc($result))
    {
        if($temp == $id){
            $courseid=$row["Course_Id"];
            $coursecategory=$row["Category"];
            $coursesem=$row["Semester"];
            $courseyear=$row["Year"];
            break;
        }
        else {
            $temp++;
        }
    }
    if(isset($_POST["submitcourses"]))
    {
        $flag2=0;
        $coursecategory1=$_POST["category"];
        $subcategory1=$_POST["subcategory"];
        $coursesem1=$_POST["coursesem"];
        $courseyear1=$_POST["courseyear"];

        $ql="SELECT * from courses";
        $query=mysqli_query($conn,$ql);
        while($row=mysqli_fetch_assoc($query))
        {
            if($coursecategory1=="" || $subcategory1=="" || $coursesem1=="" || $courseyear1=="")
            {
                $err[2]="Fields cannot be Empty";
                $flag2=1;
            }
            else if(($row['Course_Id']==$subcategory1) && ($row['Category']==$coursecategory1) && ($row['Semester']==$coursesem1) && ($row['Year']==$courseyear1) && ($row['Emp8_Id']==$empid))
            {
                $err[1]="Course Already Entered";
                $flag2=1;
            }
        }
        if($flag2==0)
        {
            $sql="UPDATE courses SET Category='$coursecategory1',Course_Id='$subcategory1',Semester='$coursesem1',Year='$courseyear1' WHERE Emp8_Id=$empid AND Category='$coursecategory' AND Course_Id='$courseid' AND Semester='$coursesem' AND Year='$courseyear'";
            if($result=$conn->query($sql))
            {
                header('Location:EditProfile.php?parameter='.$arg.'#section3');
            }else
            {
                echo "<script type='text/javascript'>alert('".mysqli_error($conn)."');</script>";
            }
        }
        else
        {
            if($err[2] != "")
                echo "<script type='text/javascript'>alert('".$err[2]."');</script>";
            else if($err[1] != "")
                echo "<script type='text/javascript'>alert('".$err[1]."');</script>";
        }
    }
}


if($val==2)
{
    $form = "Projects";
    $temp=0;
    $flagproject=0;
    $sql="SELECT * FROM projects WHERE Emp12_Id=$empid";
    $result=$conn->query($sql);
    while($row = mysqli_fetch_assoc($result))
    {
        if($temp == $id){
            $title=$row['Title'];
            $type=$row['Type'];
            $description=$row['Description'];
            $year=$row['Year'];
            $s1name=$row['S1_name'];
            $s2name=$row['S2_name'];
            $s3name=$row['S3_name'];
            $s4name=$row['S4_name'];

            $s1roll=$row['S1_roll'];
            $s2roll=$row['S2_roll'];
            $s3roll=$row['S3_roll'];
            $s4roll=$row['S4_roll'];

            $s1email=$row['S1_email'];
            $s2email=$row['S2_email'];
            $s3email=$row['S3_email'];
            $s4email=$row['S4_email'];
            break;
        }
        else {
            $temp++;
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
            $year = (int)substr($date,0,4);
            if($year > $dobyear)
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
            $sql = "UPDATE projects SET Title='$projectTitle',Type='$projectType', Description='$projectDescription',Year='$projectYear' ,S1_name = '$studentname1', S1_roll='$studentroll1', S1_email='$studentemail1',S2_name = '$studentname2', S2_roll='$studentroll2', S2_email='$studentemail2',S3_name = '$studentname3', S3_roll='$studentroll3',
       S3_email='$studentemail3',S4_name = '$studentname4', S4_roll='$studentroll4', S4_email='$studentemail4'
      WHERE Emp12_Id=$empid AND Title='$title'AND Type='$type' AND Description='$description' AND Year = '$year' AND S1_name ='$s1name' AND S1_roll='$s1roll' AND S1_email='$s1email' AND S2_name='$s2name' AND S2_roll='$s2roll' AND S2_email='$s2email' AND S3_name='$s3name' AND S3_roll='$s3roll'
       AND S3_email='$s3email' AND S4_name='$s4name' AND S4_roll='$s4roll' AND S4_email='$s4email'";
            $result = $conn->query($sql);
            if($result)
                header('Location:EditProfile.php?parameter='.$arg.'#section4');
            else
                echo "<script type='text/javascript'>alert('".mysqli_error($conn)."');</script>";
        }
    }
}

if($val == 3)
{
    $form = "Books";
    $pdf1 = "";
    $temp=0;
    $sql="SELECT * FROM publication_books WHERE Emp1_Id=$empid";
    $result=$conn->query($sql);
    while($row = mysqli_fetch_assoc($result))
    {
        if($temp == $id)
        {
            $bookname = $row["Book_Name"];
            $isbn = $row["ISBN"];
            $datepub = $row["Date_Published"];
            $pubname = $row["Publisher_Name"];
            $coa1 = $row["COA1"];
            $coa1inst = $row["COA1_INST"];
            $coa2 = $row["COA2"];
            $coa2inst = $row["COA2_INST"];
            $coa3 = $row["COA3"];
            $coa3inst = $row["COA3_INST"];
            $edition = $row["Edition"];
            $author = $row["Author"];
            $authorinst = $row["Author_INST"];
            $cover = $row["Cover"];
            break;
        }
        else {
            $temp++;
        }
    }
    $myData1 = array('pub'=>'b','academic'=>'','sttp'=>'','cid'=>$id);
    $arg1 = base64_encode( json_encode($myData1) );
    $pdf1 = "<a ".$astyle." href='showpdf.php?parameter=".$arg1."'><b>View PDF</b></a>";

    $flagbook=0;
    if(isset($_POST["submitpublicationbooks"]))
    {
        $bookName1=$_POST["bookname"];
        $bookisbn1=$_POST["bookisbn"];
        $pubdate1=$_POST["pubdate"];
        $bookEdition1=$_POST["bookedition"];
        $bookPubName1=$_POST["book_pub_name"];
        $bookAuthName1=$_POST["book_auth_name"];
        $bookAuthInst1=$_POST["book_auth_inst"];
        $bookCoauthName11=$_POST["book_coauth_name1"];
        $bookCoauthInst11=$_POST["book_coauth_inst1"];
        $bookCoauthName21=$_POST["book_coauth_name2"];
        $bookCoauthInst21=$_POST["book_coauth_inst2"];
        $bookCoauthName31=$_POST["book_coauth_name3"];
        $bookCoauthInst31=$_POST["book_coauth_inst3"];

        if(!empty($_POST["pubdate"]))
        {
            $pubdate1=$_POST["pubdate"];
            $pubyear1 = (int)substr($pubdate1,0,4);
            if($pubyear1 <= $dobyear)
            {
                $err[3]="* Please Enter A Valid Publication Date ";
                $flagbook=1;
            }
        }

        if(!empty($_FILES["book_image"]["tmp_name"]))
        {
            $bookImage1 = addslashes(file_get_contents($_FILES["book_image"]["tmp_name"]));
            $image[0]=1;
        }
        else
            $image[0]=0;


        if($flagbook==0)
        {
            if($image[0] == 1)
            {
                $sql="UPDATE publication_books SET Book_Name='$bookName1',ISBN='$bookisbn1',Date_Published='$pubdate1',Publisher_Name='$bookPubName1',COA1='$bookCoauthName11',COA1_INST='$bookCoauthInst11',COA2='$bookCoauthName21',COA2_INST='$bookCoauthInst21',COA3='$bookCoauthName31',COA3_INST='$bookCoauthInst31',Edition='$bookEdition1',Author='$bookAuthName1',Author_INST='$bookAuthInst1'
            ,Cover='$bookImage1' WHERE Emp1_Id=$empid and Book_Name='$bookname' and ISBN='$isbn'
            and Date_Published='$datepub' and Publisher_Name='$pubname' and COA1='$coa1' and COA1_INST='$coa1inst' and COA2='$coa2' and COA2_INST='$coa2inst' and COA3='$coa3' and COA3_INST='$coa3inst' and Edition='$edition' and Author='$author' and Author_INST='$authorinst'";
            }
            else
            {
                $sql="UPDATE publication_books SET Book_Name='$bookName1',ISBN='$bookisbn1',Date_Published='$pubdate1',Publisher_Name='$bookPubName1',COA1='$bookCoauthName11',COA1_INST='$bookCoauthInst11',COA2='$bookCoauthName21',COA2_INST='$bookCoauthInst21',COA3='$bookCoauthName31',COA3_INST='$bookCoauthInst31',Edition='$bookEdition1',Author='$bookAuthName1',Author_INST='$bookAuthInst1'
             WHERE Emp1_Id=$empid and Book_Name='$bookname' and ISBN='$isbn'
            and Date_Published='$datepub' and Publisher_Name='$pubname' and COA1='$coa1' and COA1_INST='$coa1inst' and COA2='$coa2' and COA2_INST='$coa2inst' and COA3='$coa3' and COA3_INST='$coa3inst' and Edition='$edition' and Author='$author' and Author_INST='$authorinst'";
            }
            if($result=$conn->query($sql))
            {
                header('Location:EditProfile.php?parameter='.$arg.'#section41');
            }else
            {
                echo "<script type='text/javascript'>alert('".mysqli_error($conn)."');</script>";
            }
        }
    }

}

if($val == 4)
{
    $form = "Journals";
    $pdf2 = "";
    $pdf3 = "";
    $temp=0;
    $sql="SELECT * FROM publication_journals WHERE Emp4_Id=$empid";
    $result=$conn->query($sql);
    while($row = mysqli_fetch_assoc($result))
    {
        if($temp == $id)
        {
            $type = $row["Type"];
            $name = $row["Name"];
            $title = $row["Title"];
            $author = $row["Author"];
            $date = $row["Date"];
            $bookchapter = $row["Book_Chapter"];
            $certificate = $row["Certificate"];
            $peerreviewed = $row["Peer_Reviewed"];
            $paperpdf = $row["Paper_PDF"];
            $impactfactor = $row["Impact_Factor"];
            $coa1 = $row["COA_1"];
            $coa2 = $row["COA_2"];
            $coa3 = $row["COA_3"];
            $coa4 = $row["COA_4"];
            $coa5 = $row["COA_5"];
            $coa6 = $row["COA_6"];
            $coa7 = $row["COA_7"];
            $coa8 = $row["COA_8"];
            $coa9 = $row["COA_9"];
            $coa10 = $row["COA_10"];
            if($row["COA1_AFF"] != " ")
                $coa1aff = $row["COA1_AFF"];
            else
                $coa1aff = " - ";
            if($row["COA2_AFF"] != " ")
                $coa2aff = $row["COA2_AFF"];
            else
                $coa2aff = " - ";
            if($row["COA3_AFF"] != " ")
                $coa3aff = $row["COA3_AFF"];
            else
                $coa3aff = " - ";
            if($row["COA4_AFF"] != " ")
                $coa4aff = $row["COA4_AFF"];
            else
                $coa4aff = " - ";
            if($row["COA5_AFF"] != " ")
                $coa5aff = $row["COA5_AFF"];
            else
                $coa5aff = " - ";
            if($row["COA6_AFF"] != " ")
                $coa6aff = $row["COA6_AFF"];
            else
                $coa6aff = " - ";
            if($row["COA7_AFF"] != " ")
                $coa7aff = $row["COA7_AFF"];
            else
                $coa7aff = " - ";
            if($row["COA8_AFF"] != " ")
                $coa8aff = $row["COA8_AFF"];
            else
                $coa8aff = " - ";
            if($row["COA10_AFF"] != " ")
                $coa10aff = $row["COA10_AFF"];
            else
                $coa10aff = " - ";
            if($row["COA9_AFF"] != " ")
                $coa9aff = $row["COA9_AFF"];
            else
                $coa9aff = " - ";
            $pubname = $row["Pub_Name"];
            $doi = $row["DOI"];
            $volume = $row["Volume"];
            $pageno = $row["PageNo"];
            $citation = $row["Citation"];
            $issn = $row["ISSN"];
            $paid = $row["Paid"];
            $sjr = $row["SJR"];
            $count = $row["count"];
            $issue = $row["Issue"];
            setcookie("count", $count, time() + (86400 * 30), "/");
            break;
        }
        else {
            $temp++;
        }
    }

    $myData1 = array('pub'=>'jpaper','academic'=>'','sttp'=>'','cid'=>$id);
    $arg1 = base64_encode( json_encode($myData1) );
    $pdf2 = "<a ".$astyle." href='showpdf.php?parameter=".$arg1."'><b>View PDF</b></a>";

    $myData2 = array('pub'=>'jcerti','academic'=>'','sttp'=>'','cid'=>$id);
    $arg2 = base64_encode( json_encode($myData2) );
    $pdf3 = "<a ".$astyle." href='showpdf.php?parameter=".$arg2."'><b>View PDF</b></a>";

    $flagjour=0;

    if(isset($_POST["submitjournals"]))
    {
        $count1=0;
        $journalName=$_POST["journal_name"];
        $journalType=$_POST["journal_type"];
        $journalTitle=$_POST["journal_title"];
        $journalImpact=$_POST["journal_impact"];
        $journalPeer=$_POST["journal_peer"];
        if($_POST["jour_coauth_name1"] != null){
            $count1++;
            $journalCoa1=$_POST["jour_coauth_name1"];
        }
        else {
            $journalCoa1 = " ";
        }
        if(!empty($_POST["name2"])){
            $count1++;
            $journalCoa2=$_POST["name2"];}
        else
            $journalCoa2=" ";
        if(!empty($_POST["name3"])){
            $count1++;
            $journalCoa3=$_POST["name3"];}
        else
            $journalCoa3=" ";
        if(!empty($_POST["name4"])){
            $count1++;
            $journalCoa4=$_POST["name4"];}
        else
            $journalCoa4=" ";
        if(!empty($_POST["name5"])){
            $count1++;
            $journalCoa5=$_POST["name5"];}
        else
            $journalCoa5=" ";
        if(!empty($_POST["name6"])){
            $count1++;
            $journalCoa6=$_POST["name6"];}
        else
            $journalCoa6=" ";
        if(!empty($_POST["name7"])){
            $count1++;
            $journalCoa7=$_POST["name7"];}
        else
            $journalCoa7=" ";
        if(!empty($_POST["name8"])){
            $count1++;
            $journalCoa8=$_POST["name8"];}
        else
            $journalCoa8=" ";
        if(!empty($_POST["name9"])){
            $count1++;
            $journalCoa9=$_POST["name9"];}
        else
            $journalCoa9=" ";
        if(!empty($_POST["name10"])){
            $count1++;
            $journalCoa10=$_POST["name10"];}
        else
            $journalCoa10=" ";
        if(!empty($_POST["jour_coauth_nameaff1"]))
            $journalCoa1_Aff=$_POST["jour_coauth_nameaff1"];
        else {
            $journalCoa1_Aff = " ";
        }
        if(!empty($_POST["name2_affiliation"]))
            $journalCoa2_Aff=$_POST["name2_affiliation"];
        else
            $journalCoa2_Aff=" ";
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
        $journalDoi = $_POST["journal_doi"];
        $journalVolume=$_POST["journal_vol"];
        $journalIssue=$_POST["journal_issue"];
        $journalChapter=$_POST["journal_book"];
        $journalPageNumber=$_POST["journal_pg"];
        $journalISSN=$_POST["journal_issn"];
        $journalCitationIndex=$_POST["journal_cite"];
        $journalPaid=$_POST["journal_paid"];
        $journalSJR=$_POST["journal_sjr"];
        //$a = $_POST["journal_fauth"];
        if($_POST["journal_fauth"] == "YES")
            $journalAuthName = $idname;
        else
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
            $jourYear = (int)substr($jourDate,0,4);
            if($jourYear <= $dobyear)
            {
                $err[34]="* Please Enter A Valid Publication Date ";
                $flagjour=1;
            }
        }

        if($flagjour==0)
        {
            if($image[7] == 1 && $image[6]==1)
            {
                $sql="UPDATE publication_journals SET Type ='$journalType', Name ='$journalName', Title ='$journalTitle', Author ='$journalAuthName', Date ='$jourDate', Book_Chapter ='$journalChapter', Certificate ='$certificateImage', Peer_Reviewed ='$journalPeer', Paper_PDF ='$paperImage', Impact_Factor ='$journalImpact', COA_1 ='$journalCoa1', COA_2 ='$journalCoa2', COA_3 ='$journalCoa3', COA_4 ='$journalCoa4', COA_5 ='$journalCoa5', COA_6 ='$journalCoa6', COA_7 ='$journalCoa7', COA_8 ='$journalCoa8', COA_9 ='$journalCoa9', COA_10 ='$journalCoa10', COA1_AFF ='$journalCoa1_Aff', COA2_AFF ='$journalCoa2_Aff', COA3_AFF ='$journalCoa3_Aff', COA4_AFF ='$journalCoa4_Aff', COA5_AFF ='$journalCoa5_Aff', COA6_AFF ='$journalCoa6_Aff', COA7_AFF ='$journalCoa7_Aff', COA8_AFF ='$journalCoa8_Aff', COA9_AFF ='$journalCoa9_Aff', COA10_AFF ='$journalCoa10_Aff', Pub_Name ='$journalPubName',DOI='$journalDoi',Volume ='$journalVolume', PageNo ='$journalPageNumber', Citation ='$journalCitationIndex', ISSN ='$journalISSN', Paid ='$journalPaid', SJR ='$journalSJR', count = $count1, Issue ='$journalIssue' WHERE Emp4_Id='$empid' AND Type ='$type' AND Name='$name' AND Author='$author' AND Date='$date' AND ISSN='$issn' AND Pub_Name='$pubname' AND DOI='$doi'";
            }
            else if($image[7]==1)
            {
                $sql="UPDATE publication_journals SET Type ='$journalType', Name ='$journalName', Title ='$journalTitle', Author ='$journalAuthName', Date ='$jourDate', Book_Chapter ='$journalChapter', Certificate ='$certificateImage', Peer_Reviewed ='$journalPeer',Impact_Factor ='$journalImpact', COA_1 ='$journalCoa1', COA_2 ='$journalCoa2', COA_3 ='$journalCoa3', COA_4 ='$journalCoa4', COA_5 ='$journalCoa5', COA_6 ='$journalCoa6', COA_7 ='$journalCoa7', COA_8 ='$journalCoa8', COA_9 ='$journalCoa9', COA_10 ='$journalCoa10', COA1_AFF ='$journalCoa1_Aff', COA2_AFF ='$journalCoa2_Aff', COA3_AFF ='$journalCoa3_Aff', COA4_AFF ='$journalCoa4_Aff', COA5_AFF ='$journalCoa5_Aff', COA6_AFF ='$journalCoa6_Aff', COA7_AFF ='$journalCoa7_Aff', COA8_AFF ='$journalCoa8_Aff', COA9_AFF ='$journalCoa9_Aff', COA10_AFF ='$journalCoa10_Aff', Pub_Name ='$journalPubName',DOI='$journalDoi', Volume ='$journalVolume', PageNo ='$journalPageNumber', Citation ='$journalCitationIndex', ISSN ='$journalISSN', Paid ='$journalPaid', SJR ='$journalSJR', count = $count1, Issue ='$journalIssue' WHERE Emp4_Id='$empid' AND Type ='$type' AND Name='$name' AND Author='$author' AND Date='$date' AND ISSN='$issn' AND Pub_Name='$pubname' AND DOI='$doi' ";
            }
            else if($image[6]==1)
            {
                $sql="UPDATE publication_journals SET Type ='$journalType', Name ='$journalName', Title ='$journalTitle', Author ='$journalAuthName', Date ='$jourDate', Book_Chapter ='$journalChapter',Peer_Reviewed ='$journalPeer', Paper_PDF ='$paperImage', Impact_Factor ='$journalImpact', COA_1 ='$journalCoa1', COA_2 ='$journalCoa2', COA_3 ='$journalCoa3', COA_4 ='$journalCoa4', COA_5 ='$journalCoa5', COA_6 ='$journalCoa6', COA_7 ='$journalCoa7', COA_8 ='$journalCoa8', COA_9 ='$journalCoa9', COA_10 ='$journalCoa10', COA1_AFF ='$journalCoa1_Aff', COA2_AFF ='$journalCoa2_Aff', COA3_AFF ='$journalCoa3_Aff', COA4_AFF ='$journalCoa4_Aff', COA5_AFF ='$journalCoa5_Aff', COA6_AFF ='$journalCoa6_Aff', COA7_AFF ='$journalCoa7_Aff', COA8_AFF ='$journalCoa8_Aff', COA9_AFF ='$journalCoa9_Aff', COA10_AFF ='$journalCoa10_Aff', Pub_Name ='$journalPubName',DOI='$journalDoi', Volume ='$journalVolume', PageNo ='$journalPageNumber', Citation ='$journalCitationIndex', ISSN ='$journalISSN', Paid ='$journalPaid', SJR ='$journalSJR', count = $count1, Issue ='$journalIssue' WHERE Emp4_Id='$empid' AND Type ='$type' AND Name='$name' AND Author='$author' AND Date='$date' AND ISSN='$issn' AND Pub_Name='$pubname' AND DOI='$doi'";
            }
            else
            {
                $sql="UPDATE publication_journals SET Type ='$journalType', Name ='$journalName', Title ='$journalTitle', Author ='$journalAuthName', Date ='$jourDate', Book_Chapter ='$journalChapter',Peer_Reviewed ='$journalPeer',Impact_Factor ='$journalImpact', COA_1 ='$journalCoa1', COA_2 ='$journalCoa2', COA_3 ='$journalCoa3', COA_4 ='$journalCoa4', COA_5 ='$journalCoa5', COA_6 ='$journalCoa6', COA_7 ='$journalCoa7', COA_8 ='$journalCoa8', COA_9 ='$journalCoa9', COA_10 ='$journalCoa10', COA1_AFF ='$journalCoa1_Aff', COA2_AFF ='$journalCoa2_Aff', COA3_AFF ='$journalCoa3_Aff', COA4_AFF ='$journalCoa4_Aff', COA5_AFF ='$journalCoa5_Aff', COA6_AFF ='$journalCoa6_Aff', COA7_AFF ='$journalCoa7_Aff', COA8_AFF ='$journalCoa8_Aff', COA9_AFF ='$journalCoa9_Aff', COA10_AFF ='$journalCoa10_Aff', Pub_Name ='$journalPubName',DOI='$journalDoi', Volume ='$journalVolume', PageNo ='$journalPageNumber', Citation ='$journalCitationIndex', ISSN ='$journalISSN', Paid ='$journalPaid', SJR ='$journalSJR', count = $count1, Issue ='$journalIssue' WHERE Emp4_Id='$empid' AND Type ='$type' AND Name='$name' AND Author='$author' AND Date='$date' AND ISSN='$issn' AND Pub_Name='$pubname' AND DOI='$doi' ";
            }

            if($result=$conn->query($sql))
            {
                $myData = array('val'=>$empid);
                $arg = base64_encode(json_encode($myData));
                header('Location:EditProfile.php?parameter='.$arg.'#section42');
            }else
            {
                echo mysqli_error($conn);
            }
        }
    }
}
if($val == 5)
{
    $form = "Conferences";
    $pdf4 = "";
    $pdf5 = "";
    $pdf7 = "";
    $temp=0;
    $sql="SELECT * FROM publication_conferences WHERE Emp5_Id=$empid";
    $result=$conn->query($sql);
    while($row = mysqli_fetch_assoc($result))
    {
        if($temp == $id)
        {
            $type = $row["Type"];
            $name = $row["Name"];
            $place = $row["Place"];
            $date = $row["Date"];
            $author = $row["Author"];
            $certificate = $row["Certificate"];
            $paperpdf = $row["Paper_Pdf"];
            $hindex = $row["H_Index"];
            $doi = $row["DOI"];
            $pubname = $row["Pub_Name"];
            $procname = $row["Proc_Name"];
            $peer = $row["Peer"];
            $theme = $row["Theme"];
            $pageno = $row["PageNo"];
            $paid = $row["Paid"];
            $issn = $row["ISSN"];
            $organizer = $row["Organizer"];
            $presented = $row["Presented"];
            $web = $row["Web"];
            $poster = $row["Poster"];
            $posterpdf = $row["presentation_pdf"];
            $citation = $row["Citation_Index"];
            $count = $row["count"];
            $coa1 = $row["COA1"];
            $coa2 = $row["COA2"];
            $coa3 = $row["COA3"];
            $coa4 = $row["COA4"];
            $coa5 = $row["COA5"];
            $coa6 = $row["COA6"];
            $coa7 = $row["COA7"];
            $coa8 = $row["COA8"];
            $coa9 = $row["COA9"];
            $coa10 = $row["COA10"];
            if($row["COA1_AFF"] != " ")
                $coa1aff = $row["COA1_AFF"];
            else
                $coa1aff = " - ";
            if($row["COA2_AFF"] != " ")
                $coa2aff = $row["COA2_AFF"];
            else
                $coa2aff = " - ";
            if($row["COA3_AFF"] != " ")
                $coa3aff = $row["COA3_AFF"];
            else
                $coa3aff = " - ";
            if($row["COA4_AFF"] != " ")
                $coa4aff = $row["COA4_AFF"];
            else
                $coa4aff = " - ";
            if($row["COA5_AFF"] != " ")
                $coa5aff = $row["COA5_AFF"];
            else
                $coa5aff = " - ";
            if($row["COA6_AFF"] != " ")
                $coa6aff = $row["COA6_AFF"];
            else
                $coa6aff = " - ";
            if($row["COA7_AFF"] != " ")
                $coa7aff = $row["COA7_AFF"];
            else
                $coa7aff = " - ";
            if($row["COA8_AFF"] != " ")
                $coa8aff = $row["COA8_AFF"];
            else
                $coa8aff = " - ";
            if($row["COA10_AFF"] != " ")
                $coa10aff = $row["COA10_AFF"];
            else
                $coa10aff = " - ";
            if($row["COA9_AFF"] != " ")
                $coa9aff = $row["COA9_AFF"];
            else
                $coa9aff = " - ";

            setcookie("count", $count, time() + (86400 * 30), "/");
            break;
        }
        else {
            $temp++;
        }
    }

    $myData1 = array('pub'=>'cpaper','academic'=>'','sttp'=>'','cid'=>$id);
    $arg1 = base64_encode( json_encode($myData1) );
    $pdf4 = "<a ".$astyle." href='showpdf.php?parameter=".$arg1."'><b>View PDF</b></a>";

    $myData2 = array('pub'=>'ccerti','academic'=>'','sttp'=>'','cid'=>$id);
    $arg2 = base64_encode( json_encode($myData2) );
    $pdf5 = "<a ".$astyle." href='showpdf.php?parameter=".$arg2."'><b>View PDF</b></a>";

    $myData3 = array('pub'=>'cposter','academic'=>'','sttp'=>'','cid'=>$id);
    $arg3 = base64_encode( json_encode($myData3) );
    $pdf7 = "<a ".$astyle." href='showpdf.php?parameter=".$arg3."'><b>View PDF</b></a>";

    $flagconf=0;
    if(isset($_POST["submitconference"]))
    {
        $count1=0;
        $confName=$_POST["conf_name"];
        $confType=$_POST["conf_type"];
        $confDate=$_POST["pubdate"];
        $confHindex=$_POST["conf_hindex"];
        $confDoi = $_POST["conf_doi"];
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
        if($_POST["name1"] != null)
        {
            $count1++;
            $confCoa1=$_POST["name1"];
        }
        else
            $confCoa1 = " ";
        if(!empty($_POST["name2"])){
            $count1++;
            $confCoa2=$_POST["name2"];}
        else
            $confCoa2=" ";
        if(!empty($_POST["name3"])){
            $count1++;
            $confCoa3=$_POST["name3"];}
        else
            $confCoa3=" ";
        if(!empty($_POST["name4"])){
            $count1++;
            $confCoa4=$_POST["name4"];}
        else
            $confCoa4=" ";
        if(!empty($_POST["name5"])){
            $count1++;
            $confCoa5=$_POST["name5"];}
        else
            $confCoa5=" ";
        if(!empty($_POST["name6"])){
            $count1++;
            $confCoa6=$_POST["name6"];}
        else
            $confCoa6=" ";
        if(!empty($_POST["name7"])){
            $count1++;
            $confCoa7=$_POST["name7"];}
        else
            $confCoa7=" ";
        if(!empty($_POST["name8"])){
            $count1++;
            $confCoa8=$_POST["name8"];}
        else
            $confCoa8=" ";
        if(!empty($_POST["name9"])){
            $count1++;
            $confCoa9=$_POST["name9"];}
        else
            $confCoa9=" ";
        if(!empty($_POST["name10"])){
            $count1++;
            $confCoa10=$_POST["name10"];}
        else
            $confCoa10=" ";
        if(!empty($_POST["name1_affiliation"]))
            $confCoa1_Aff=$_POST["name1_affiliation"];
        else {
            $confCoa1_Aff = " ";
        }
        if(!empty($_POST["name2_affiliation"]))
            $confCoa2_Aff=$_POST["name2_affiliation"];
        else
            $confCoa2_Aff=" ";
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

        if(!empty($_FILES["conf_posterpdf"]["tmp_name"]))
        {
            $confPosterpdf = addslashes(file_get_contents($_FILES["conf_posterpdf"]["tmp_name"]));
            $image[11]=1;
        }
        else
            $image[11]=0;

        $ba=date_create($confDate);
        $ab=date_create($dob);

        $diff=date_diff($ab,$ba);
        if($diff->format("%R")=='-')
        {
            $err[35]="* Please Enter A Valid Conference Date";
            $flagconf=1;
        }

        if($flagconf==0)
        {
            if($image[9] == 1 && $image[8]==1 && $image[11]==1)
            {
                $sql="UPDATE publication_conferences SET Type='$confType',Name='$confName',Place='$confPlace',Date='$confDate',Author='$confAuthName',Certificate='$certificateImage',Paper_Pdf='$paperImage',COA1='$confCoa1',COA2='$confCoa2',COA3='$confCoa3',COA4='$confCoa4',COA5='$confCoa5',COA6='$confCoa6',COA7='$confCoa7',COA8='$confCoa8',COA9='$confCoa9',COA10='$confCoa10',COA1_AFF='$confCoa1_Aff',COA2_AFF='$confCoa2_Aff',COA3_AFF='$confCoa3_Aff',COA4_AFF='$confCoa4_Aff',COA5_AFF='$confCoa5_Aff',COA6_AFF='$confCoa6_Aff',COA7_AFF='$confCoa7_Aff',COA8_AFF='$confCoa8_Aff',COA9_AFF='$confCoa9_Aff',COA10_AFF='$confCoa10_Aff',H_Index='$confHindex',DOI='$confDoi',Pub_Name='$confPubname',Proc_Name='$confProname',Peer='$confPeer',Theme='$confThemename',Paid='$confPaid',PageNo='$confPageno',ISSN='$confIssn',Organizer='$confOrgname',Presented='$confPresented',Web='$confWeb',Poster='$confPoster',Citation_Index='$confCite',count=$count1,presentation_pdf='$confPosterpdf' WHERE Name = '$name' AND Place = '$place' AND Date = '$date' AND Author = '$author' AND H_Index = '$hindex' AND DOI = '$doi' AND Organizer = '$organizer' AND Pub_Name = '$pubname' AND ISSN = '$issn'";
            }
            else if($image[8]==1 && $image[9]==1 && $image[11]==0)
            {

                $sql="UPDATE publication_conferences SET Type='$confType',Name='$confName',Place='$confPlace',Date='$confDate',Author='$confAuthName',Certificate='$certificateImage',Paper_Pdf='$paperImage',COA1='$confCoa1',COA2='$confCoa2',COA3='$confCoa3',COA4='$confCoa4',COA5='$confCoa5',COA6='$confCoa6',COA7='$confCoa7',COA8='$confCoa8',COA9='$confCoa9',COA10='$confCoa10',COA1_AFF='$confCoa1_Aff',COA2_AFF='$confCoa2_Aff',COA3_AFF='$confCoa3_Aff',COA4_AFF='$confCoa4_Aff',COA5_AFF='$confCoa5_Aff',COA6_AFF='$confCoa6_Aff',COA7_AFF='$confCoa7_Aff',COA8_AFF='$confCoa8_Aff',COA9_AFF='$confCoa9_Aff',COA10_AFF='$confCoa10_Aff',H_Index='$confHindex',DOI='$confDoi',Pub_Name='$confPubname',Proc_Name='$confProname',Peer='$confPeer',Theme='$confThemename',Paid='$confPaid',PageNo='$confPageno',ISSN='$confIssn',Organizer='$confOrgname',Presented='$confPresented',Web='$confWeb',Poster='$confPoster',Citation_Index='$confCite',count=$count1 WHERE Name = '$name' AND Place = '$place' AND Date = '$date' AND Author = '$author' AND H_Index = '$hindex' AND DOI = '$doi' AND Organizer = '$organizer' AND Pub_Name = '$pubname' AND ISSN = '$issn'";
            }
            else if($image[9]==1 && $image[11]==1 && $image[8]==0)
            {
                $sql="UPDATE publication_conferences SET Type='$confType',Name='$confName',Place='$confPlace',Date='$confDate',Author='$confAuthName',Certificate='$certificateImage',COA1='$confCoa1',COA2='$confCoa2',COA3='$confCoa3',COA4='$confCoa4',COA5='$confCoa5',COA6='$confCoa6',COA7='$confCoa7',COA8='$confCoa8',COA9='$confCoa9',COA10='$confCoa10',COA1_AFF='$confCoa1_Aff',COA2_AFF='$confCoa2_Aff',COA3_AFF='$confCoa3_Aff',COA4_AFF='$confCoa4_Aff',COA5_AFF='$confCoa5_Aff',COA6_AFF='$confCoa6_Aff',COA7_AFF='$confCoa7_Aff',COA8_AFF='$confCoa8_Aff',COA9_AFF='$confCoa9_Aff',COA10_AFF='$confCoa10_Aff',H_Index='$confHindex',DOI='$confDoi',Pub_Name='$confPubname',Proc_Name='$confProname',Peer='$confPeer',Theme='$confThemename',Paid='$confPaid',PageNo='$confPageno',ISSN='$confIssn',Organizer='$confOrgname',Presented='$confPresented',Web='$confWeb',Poster='$confPoster',Citation_Index='$confCite',count=$count1,presentation_pdf='$confPosterpdf' WHERE Name = '$name' AND Place = '$place' AND Date = '$date' AND Author = '$author' AND H_Index = '$hindex' AND DOI = '$doi' AND Organizer = '$organizer' AND Pub_Name = '$pubname' AND ISSN = '$issn'";
            }
            else if($image[8]==1 && $image[11]==1 && $image[9]==0)
            {
                $sql="UPDATE publication_conferences SET Type='$confType',Name='$confName',Place='$confPlace',Date='$confDate',Author='$confAuthName',Paper_Pdf='$paperImage',COA1='$confCoa1',COA2='$confCoa2',COA3='$confCoa3',COA4='$confCoa4',COA5='$confCoa5',COA6='$confCoa6',COA7='$confCoa7',COA8='$confCoa8',COA9='$confCoa9',COA10='$confCoa10',COA1_AFF='$confCoa1_Aff',COA2_AFF='$confCoa2_Aff',COA3_AFF='$confCoa3_Aff',COA4_AFF='$confCoa4_Aff',COA5_AFF='$confCoa5_Aff',COA6_AFF='$confCoa6_Aff',COA7_AFF='$confCoa7_Aff',COA8_AFF='$confCoa8_Aff',COA9_AFF='$confCoa9_Aff',COA10_AFF='$confCoa10_Aff',H_Index='$confHindex',DOI='$confDoi',Pub_Name='$confPubname',Proc_Name='$confProname',Peer='$confPeer',Theme='$confThemename',Paid='$confPaid',PageNo='$confPageno',ISSN='$confIssn',Organizer='$confOrgname',Presented='$confPresented',Web='$confWeb',Poster='$confPoster',Citation_Index='$confCite',count=$count1,presentation_pdf='$confPosterpdf' WHERE Name = '$name' AND Place = '$place' AND Date = '$date' AND Author = '$author' AND H_Index = '$hindex' AND DOI = '$doi' AND Organizer = '$organizer' AND Pub_Name = '$pubname' AND ISSN = '$issn'";
            }
            else if($image[8]==0 && $image[11]==0 && $image[9]==1)
            {
                $sql="UPDATE publication_conferences SET Type='$confType',Name='$confName',Place='$confPlace',Date='$confDate',Author='$confAuthName',Certificate='$certificateImage',COA1='$confCoa1',COA2='$confCoa2',COA3='$confCoa3',COA4='$confCoa4',COA5='$confCoa5',COA6='$confCoa6',COA7='$confCoa7',COA8='$confCoa8',COA9='$confCoa9',COA10='$confCoa10',COA1_AFF='$confCoa1_Aff',COA2_AFF='$confCoa2_Aff',COA3_AFF='$confCoa3_Aff',COA4_AFF='$confCoa4_Aff',COA5_AFF='$confCoa5_Aff',COA6_AFF='$confCoa6_Aff',COA7_AFF='$confCoa7_Aff',COA8_AFF='$confCoa8_Aff',COA9_AFF='$confCoa9_Aff',COA10_AFF='$confCoa10_Aff',H_Index='$confHindex',DOI='$confDoi',Pub_Name='$confPubname',Proc_Name='$confProname',Peer='$confPeer',Theme='$confThemename',Paid='$confPaid',PageNo='$confPageno',ISSN='$confIssn',Organizer='$confOrgname',Presented='$confPresented',Web='$confWeb',Poster='$confPoster',Citation_Index='$confCite',count=$count1 WHERE Name = '$name' AND Place = '$place' AND Date = '$date' AND Author = '$author' AND H_Index = '$hindex' AND DOI = '$doi' AND Organizer = '$organizer' AND Pub_Name = '$pubname' AND ISSN = '$issn'";
            }
            else if($image[8]==0 && $image[11]==1 && $image[9]==0)
            {
                $sql="UPDATE publication_conferences SET Type='$confType',Name='$confName',Place='$confPlace',Date='$confDate',Author='$confAuthName',COA1='$confCoa1',COA2='$confCoa2',COA3='$confCoa3',COA4='$confCoa4',COA5='$confCoa5',COA6='$confCoa6',COA7='$confCoa7',COA8='$confCoa8',COA9='$confCoa9',COA10='$confCoa10',COA1_AFF='$confCoa1_Aff',COA2_AFF='$confCoa2_Aff',COA3_AFF='$confCoa3_Aff',COA4_AFF='$confCoa4_Aff',COA5_AFF='$confCoa5_Aff',COA6_AFF='$confCoa6_Aff',COA7_AFF='$confCoa7_Aff',COA8_AFF='$confCoa8_Aff',COA9_AFF='$confCoa9_Aff',COA10_AFF='$confCoa10_Aff',H_Index='$confHindex',DOI='$confDoi',Pub_Name='$confPubname',Proc_Name='$confProname',Peer='$confPeer',Theme='$confThemename',Paid='$confPaid',PageNo='$confPageno',ISSN='$confIssn',Organizer='$confOrgname',Presented='$confPresented',Web='$confWeb',Poster='$confPoster',Citation_Index='$confCite',count=$count1,presentation_pdf='$confPosterpdf' WHERE Name = '$name' AND Place = '$place' AND Date = '$date' AND Author = '$author' AND H_Index = '$hindex' AND DOI = '$doi' AND Organizer = '$organizer' AND Pub_Name = '$pubname' AND ISSN = '$issn'";
            }
            else if($image[8]==1 && $image[11]==0 && $image[9]==0)
            {
                $sql="UPDATE publication_conferences SET Type='$confType',Name='$confName',Place='$confPlace',Date='$confDate',Author='$confAuthName',Paper_Pdf='$paperImage',COA1='$confCoa1',COA2='$confCoa2',COA3='$confCoa3',COA4='$confCoa4',COA5='$confCoa5',COA6='$confCoa6',COA7='$confCoa7',COA8='$confCoa8',COA9='$confCoa9',COA10='$confCoa10',COA1_AFF='$confCoa1_Aff',COA2_AFF='$confCoa2_Aff',COA3_AFF='$confCoa3_Aff',COA4_AFF='$confCoa4_Aff',COA5_AFF='$confCoa5_Aff',COA6_AFF='$confCoa6_Aff',COA7_AFF='$confCoa7_Aff',COA8_AFF='$confCoa8_Aff',COA9_AFF='$confCoa9_Aff',COA10_AFF='$confCoa10_Aff',H_Index='$confHindex',DOI='$confDoi',Pub_Name='$confPubname',Proc_Name='$confProname',Peer='$confPeer',Theme='$confThemename',Paid='$confPaid',PageNo='$confPageno',ISSN='$confIssn',Organizer='$confOrgname',Presented='$confPresented',Web='$confWeb',Poster='$confPoster',Citation_Index='$confCite',count=$count1 WHERE Name = '$name' AND Place = '$place' AND Date = '$date' AND Author = '$author' AND H_Index = '$hindex' AND DOI = '$doi' AND Organizer = '$organizer' AND Pub_Name = '$pubname' AND ISSN = '$issn'";
            }
            else if($image[8]==0 && $image[11]==0 && $image[9]==0)
            {
                $sql="UPDATE publication_conferences SET Type='$confType',Name='$confName',Place='$confPlace',Date='$confDate',Author='$confAuthName',COA1='$confCoa1',COA2='$confCoa2',COA3='$confCoa3',COA4='$confCoa4',COA5='$confCoa5',COA6='$confCoa6',COA7='$confCoa7',COA8='$confCoa8',COA9='$confCoa9',COA10='$confCoa10',COA1_AFF='$confCoa1_Aff',COA2_AFF='$confCoa2_Aff',COA3_AFF='$confCoa3_Aff',COA4_AFF='$confCoa4_Aff',COA5_AFF='$confCoa5_Aff',COA6_AFF='$confCoa6_Aff',COA7_AFF='$confCoa7_Aff',COA8_AFF='$confCoa8_Aff',COA9_AFF='$confCoa9_Aff',COA10_AFF='$confCoa10_Aff',H_Index='$confHindex',DOI='$confDoi',Pub_Name='$confPubname',Proc_Name='$confProname',Peer='$confPeer',Theme='$confThemename',Paid='$confPaid',PageNo='$confPageno',ISSN='$confIssn',Organizer='$confOrgname',Presented='$confPresented',Web='$confWeb',Poster='$confPoster',Citation_Index='$confCite',count=$count1 WHERE Name = '$name' AND Place = '$place' AND Date = '$date' AND Author = '$author' AND H_Index = '$hindex' AND DOI = '$doi' AND Organizer = '$organizer' AND Pub_Name = '$pubname' AND ISSN = '$issn'";
            }

            if($result=$conn->query($sql))
            {
                header('Location:EditProfile.php?parameter='.$arg.'#section43');
            }else
            {
                echo "<script type='text/javascript'>alert('".mysqli_error($conn)."');</script>";
            }
        }
    }
}

if($val == 6)
{
    $form = "STTP Attended";
    $pdf6 = "";
    $temp = 0;
    $sql="SELECT * FROM sttp_event_attended WHERE Emp6_Id=$empid";
    $result=$conn->query($sql);
    while($row = mysqli_fetch_assoc($result))
    {
        if($temp == $id)
        {
            $datefrom = $row['Date_From'];
            $dateto = $row['Date_To'];
            $organizedby = $row['Organized_By'];
            $place = $row['Place'];
            $duration = $row['Duration'];
            $totalparticipation = $row['Total_Participation'];
            $speaker = $row['Speaker'];
            $eventtype = $row['Event_Type'];
            $certificate = $row['Certificate'];
            $title = $row['Title'];
            break;
        }
        else {
            $temp++;
        }
    }

    $myData1 = array('pub'=>'','academic'=>'','sttp'=>'1','cid'=>$id);
    $arg1 = base64_encode( json_encode($myData1) );
    $pdf6 = "<a ".$astyle." href='showpdf.php?parameter=".$arg1."'><b>View PDF</b></a>";

    $flagatten=0;
    if(isset($_POST["submitsttpattended"]))
    {
        $attendedname1 = $_POST["attendedname"];
        $eventtype1=$_POST["eventtype"];
        $datefromattended1=$_POST["datefromattended"];
        $datetoattended1=$_POST["datetoattended"];
        $organizedbyattended1=$_POST["organizedbyattended"];
        $durationattended1=$_POST["durationattended"];
        $participantsattended1=$_POST["participantsattended"];
        $speakerattended1=$_POST["speakerattended"];
        $locationattended1=$_POST["locationattended"];

        $ba=date_create($datefromattended1);
        $ab=date_create($dob);
        $abc = date_create($datetoattended1);

        $diff=date_diff($ab,$ba);
        if($diff->format("%R")=='-'){

            $err[4]="* Please Enter A Valid Start Date";
            $flagatten=1;
        }
        $diff=date_diff($ba,$abc);
        if($diff->format("%R") == '-'){
            $err[5]="Please Enter Valid Start And End Date";
            $flagatten=1;
        }

        if(empty($participantsattended1))
        {
            $participantsattended1=0;
        }

        if(!empty($_FILES["certificateattended"]["tmp_name"]))
        {
            $certificateattended1 = addslashes(file_get_contents($_FILES["certificateattended"]["tmp_name"]));
            $image[2]=1;
        }
        else
            $image[2]=0;


        if($flagatten==0)
        {
            if($image[2] == 1)
            {
                $sql="UPDATE sttp_event_attended SET Date_From='$datefromattended1',Date_To='$datetoattended1',Organized_By='$organizedbyattended1',Place='$locationattended1',Duration='$durationattended1',Total_Participation=$participantsattended1,Speaker='$speakerattended1',Event_Type='$eventtype1',Certificate='$certificateattended1',Title='$attendedname1'
        WHERE Emp6_Id = '$empid' and Date_From = '$datefrom' and Date_To = '$dateto' and Organized_By = '$organizedby' and Place = '$place' and Duration = '$duration' and Total_Participation = '$totalparticipation' and Speaker = '$speaker' and Event_Type = '$eventtype' and Title = '$title'";
            }
            else
            {
                $sql="UPDATE sttp_event_attended SET Date_From='$datefromattended1',Date_To='$datetoattended1',Organized_By='$organizedbyattended1',Place='$locationattended1',Duration='$durationattended1',Total_Participation=$participantsattended1,Speaker='$speakerattended1',Event_Type='$eventtype1',Title='$attendedname1'
      WHERE Emp6_Id = '$empid' and Date_From = '$datefrom' and Date_To = '$dateto' and Organized_By = '$organizedby' and Place = '$place' and Duration = '$duration' and Total_Participation = '$totalparticipation' and Speaker = '$speaker' and Event_Type = '$eventtype' and Title = '$title'";
            }
            if($result=$conn->query($sql))
            {
                header('Location:EditProfile.php?parameter='.$arg.'#section51');
            }else
            {
                echo "<script type='text/javascript'>alert('".mysqli_error($conn)."');</script>";
            }
        }
    }
}

if($val == 7)
{
    $form = "STTP Organised";
    $temp =0;
    $sql="SELECT * FROM sttp_event_organized WHERE Emp7_Id=$empid";
    $result=$conn->query($sql);
    while($row = mysqli_fetch_assoc($result))
    {
        if($temp == $id)
        {
            $type = $row["Type"];
            $role = $row["Role"];
            $noparticipants = $row["Number_Participants"];
            $place = $row["Place"];
            $datefrom = $row["Date_From"];
            $dateto = $row["Date_To"];
            $name = $row["Name"];
            break;
        }
        else {
            $temp++;
        }
    }

    $flagorg=0;
    if(isset($_POST["submitsttporganized"]))
    {
        $organizedname=$_POST["organizedname"];
        $eventtype=$_POST["organizedeventtype"];
        $datefromorganized=$_POST["datefromorganized"];
        $datetoorganized=$_POST["datetoorganized"];
        $role1=$_POST["roleorganized"];
        $participantsorganized=$_POST["participantsorganized"];
        $placeorganized=$_POST["placeorganized"];

        if(empty($participantsorganized))
        {
            $participantsorganized=0;
        }

        $ba=date_create($datefromorganized);
        $ab=date_create($dob);
        $abc = date_create($datetoorganized);

        $diff=date_diff($ab,$ba);
        if($diff->format("%R")=='-'){
            $err[6]="* Please Enter A Valid Start Date";
            $flagorg=1;
        }
        $diff=date_diff($ba,$abc);
        if($diff->format("%R") == '-'){
            $err[7]="Please Enter Valid Start And End Date";
            $flagorg=1;
        }
        if($flagorg==0)
        {
            $sql="UPDATE sttp_event_organized SET Type='$eventtype',Role='$role1',Number_Participants='$participantsorganized',Place='$placeorganized',Date_From='$datefromorganized',Date_To='$datetoorganized',Name='$organizedname' WHERE Emp7_Id='$empid' and Type=
      '$type' and Role='$role' and Number_Participants='$noparticipants' and Date_From='$datefrom' and Date_To='$dateto' and Name='$name'";
            if($result=$conn->query($sql))
            {
                header('Location:EditProfile.php?parameter='.$arg.'#section52');
            }else
            {
                echo "<script type='text/javascript'>alert('".mysqli_error($conn)."');</script>";
            }
        }

    }
}
if($val == 8)
{
    $form = "STTP Delivered";
    $temp = 0;
    $sql="SELECT * FROM sttp_event_delivered WHERE Emp9_Id=$empid";
    $result=$conn->query($sql);
    while($row = mysqli_fetch_assoc($result))
    {
        if($temp == $id)
        {
            $description = $row["Description"];
            $place = $row["Place"];
            $duration = $row["Duration"];
            $datefrom = $row["Date_From"];
            $dateto = $row["Date_To"];
            $name = $row["Name"];
            $eventtype = $row["Event_Type"];
            break;
        }
        else {
            $temp++;
        }
    }

    $flagdel=0;
    if(isset($_POST["submitsttpdelivered"]))
    {
        $deliveredname=$_POST["deliveredname"];
        $datefromdelivered=$_POST["datefromdelivered"];
        $eventtype1=$_POST["deliveredeventtype"];
        $datetodelivered=$_POST["datetodelivered"];
        $activitydescription=$_POST["activitydescription"];
        $placedelivered=$_POST["placedelivered"];
        $durationdelivered=$_POST["durationdelivered"];

        $ba=date_create($datefromdelivered);
        $ab=date_create($dob);
        $abc = date_create($datetodelivered);

        $diff=date_diff($ab,$ba);
        if($diff->format("%R")=='-'){

            $err[8]="* Please Enter A Valid Start Date";
            $flagdel=1;
        }
        $diff=date_diff($ba,$abc);
        if($diff->format("%R") == '-'){
            $err[9]="Please Enter Valid Start And End Date";
            $flagdel=1;
        }

        if($flagdel==0)
        {
            $sql="UPDATE sttp_event_delivered SET Description='$activitydescription',Place='$placedelivered',Duration='$durationdelivered',Date_From='$datefromdelivered',Date_To='$datetodelivered',Name='$deliveredname',Event_Type='$eventtype1' WHERE
        Emp9_Id='$empid' and Description='$description' and Place='$place' and Duration='$duration' and Date_From='$datefrom' and Date_To='$dateto' and Name='$name' and Event_Type='$eventtype'";
            if($result=$conn->query($sql))
            {
                header('Location:EditProfile.php?parameter='.$arg.'#section53');
            }else
            {
                echo "<script type='text/javascript'>alert('".mysqli_error($conn)."');</script>";
            }
        }
    }
}

if($val == 9)
{
    $form = "Co-Curricular";
    $temp=0;
    $sql="SELECT * FROM co_curricular WHERE Emp10_Id=$empid";
    $result=$conn->query($sql);
    while($row = mysqli_fetch_assoc($result))
    {
        if($temp == $id)
        {
            $description = $row["Description"];
            $date = $row["Date"];
            $role = $row["Role"];
            $name = $row["Name"];
            $type = $row["Type"];
            break;
        }
        else {
            $temp++;
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

            $err[10]="* Please Enter A Valid Date";
        }
        else{
            $sql="UPDATE co_curricular SET Description='$cocurrdescription',Date='$cocurrdate',Role='$cocurrrole',Name='$cocurrname',Type='$cocurrtype' WHERE
      Emp10_Id='$empid' and Description='$description' and Date='$date' and Role='$role' and Name='$name' and Type='$type'";
            if($result=$conn->query($sql))
            {
                header('Location:EditProfile.php?parameter='.$arg.'#section6');
            }else
            {
                echo "<script type='text/javascript'>alert('".mysqli_error($conn)."');</script>";
            }
        }
    }
}

if($val == 10)
{
    $form = "Extra";
    $temp=0;
    $sql="SELECT * FROM extra WHERE Emp11_Id=$empid";
    $result=$conn->query($sql);
    while($row = mysqli_fetch_assoc($result))
    {
        if($temp == $id)
        {
            $description = $row["Description"];
            $role = $row["Role"];
            $name = $row["Name"];
            $place =  $row["Place"];
            $date = $row["Date"];
            break;
        }
        else {
            $temp++;
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
        if($diff->format("%R")=='-'){

            $err[11]="* Please Enter A Valid Date";
        }
        else{
            $sql="UPDATE extra SET Description='$extradesc',Role='$extrarole',Place='$extraplace',Date='$extradate',Name='$extraname' WHERE Emp11_Id='$empid'
      and Description='$description' and Role='$role' and Place='$place' and Date='$date' and Name='$name'";
            if($result=$conn->query($sql))
            {
                header('Location:EditProfile.php?parameter='.$arg.'#section7');
            }else
            {
                echo "<script type='text/javascript'>alert('".mysqli_error($conn)."');</script>";
            }
        }
    }
}
?>
