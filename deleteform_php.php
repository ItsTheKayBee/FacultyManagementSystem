<?php
include 'dbconnect.php';
include 'Decision2.php';
if(!isset($_SESSION["Emp_Id"]))
  header('Location:logout.php');

  $empid=$_SESSION["Emp_Id"];

  $sql = "SELECT * FROM login WHERE Emp_Id=$empid";
    $result = $conn->query($sql);
    $row = mysqli_fetch_assoc($result);
    if($row["P1"] == "FALSE")
    {
      header('Location:profile.php');
    }
     $form = "";

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

    if(isset($_POST["return"]))
    {
      header('Location:profile.php#section3');
    }

    if(isset($_POST["delete"]))
    {
      $sql="DELETE FROM courses WHERE Emp8_Id=$empid AND Category='$coursecategory' AND Course_Id='$courseid' AND Semester='$coursesem' AND Year='$courseyear'";
      $result = $conn->query($sql);
      if($result)
        header('Location:profile.php#section3');
      else {
        echo "<script type='text/javascript'>alert('".mysqli_error($conn)."');</script>";
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

    if(isset($_POST["return"]))
    {
      header('Location:profile.php#section4');
    }

    if(isset($_POST["delete"]))
    {
      $sql = "DELETE FROM projects
      WHERE Emp12_Id=$empid AND Title='$title'AND Type='$type' AND Description='$description' AND Year = '$year' AND S1_name ='$s1name' AND S1_roll='$s1roll' AND S1_email='$s1email' AND S2_name='$s2name' AND S2_roll='$s2roll' AND S2_email='$s2email' AND S3_name='$s3name' AND S3_roll='$s3roll'
       AND S3_email='$s3email' AND S4_name='$s4name' AND S4_roll='$s4roll' AND S4_email='$s4email'";
      $result = $conn->query($sql);
      if($result)
        header('Location:profile.php#section4');
      else {
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
    $pdf1 = "<a href='showpdf.php?parameter=".$arg1."'>View PDF</a>";

    if(isset($_POST["return"]))
    {
      header('Location:profile.php#section41');
    }

    if(isset($_POST["delete"]))
    {
      $sql="DELETE FROM publication_books WHERE Emp1_Id=$empid and Book_Name='$bookname' and ISBN='$isbn'
      and Date_Published='$datepub' and Publisher_Name='$pubname' and COA1='$coa1' and COA1_INST='$coa1inst' and COA2='$coa2' and COA2_INST='$coa2inst' and COA3='$coa3' and COA3_INST='$coa3inst' and Edition='$edition' and Author='$author' and Author_INST='$authorinst'";
      $result = $conn->query($sql);
      if($result)
        header('Location:profile.php#section41');
      else {
        echo "<script type='text/javascript'>alert('".mysqli_error($conn)."');</script>";
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
        $coa1aff = $row["COA1_AFF"];
        $coa2aff = $row["COA2_AFF"];
        $coa3aff = $row["COA3_AFF"];
        $coa4aff = $row["COA4_AFF"];
        $coa5aff = $row["COA5_AFF"];
        $coa6aff = $row["COA6_AFF"];
        $coa7aff = $row["COA7_AFF"];
        $coa8aff = $row["COA8_AFF"];
        $coa10aff = $row["COA10_AFF"];
        $coa9aff = $row["COA9_AFF"];
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
        break;
      }
      else {
        $temp++;
      }
    }

    $myData1 = array('pub'=>'jpaper','academic'=>'','sttp'=>'','cid'=>$id);
    $arg1 = base64_encode( json_encode($myData1) );
    $pdf2 = "<a href='showpdf.php?parameter=".$arg1."'>View PDF</a>";

    $myData2 = array('pub'=>'jcerti','academic'=>'','sttp'=>'','cid'=>$id);
    $arg2 = base64_encode( json_encode($myData2) );
    $pdf3 = "<a href='showpdf.php?parameter=".$arg2."'>View PDF</a>";

    if(isset($_POST["return"]))
    {
      header('Location:profile.php#section42');
    }

    if(isset($_POST["delete"]))
    {
      $sql="DELETE FROM publication_journals WHERE Emp4_Id='$empid' AND Type ='$type' and Name='$name' and Author='$author' and Date='$date' and ISSN='$issn' and Pub_Name='$pubname' AND DOI='$doi'";
      $result = $conn->query($sql);
      if($result)
        header('Location:profile.php#section42');
      else {
        echo "<script type='text/javascript'>alert('".mysqli_error($conn)."');</script>";
      }
    }

  }

  if($val == 5)
  {
    $form = "Conferences";
    $pdf4 = "";
    $pdf5 = "";
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
        $coa1aff = $row["COA1_AFF"];
        $coa2aff = $row["COA2_AFF"];
        $coa3aff = $row["COA3_AFF"];
        $coa4aff = $row["COA4_AFF"];
        $coa5aff = $row["COA5_AFF"];
        $coa6aff = $row["COA6_AFF"];
        $coa7aff = $row["COA7_AFF"];
        $coa8aff = $row["COA8_AFF"];
        $coa10aff = $row["COA10_AFF"];
        $coa9aff = $row["COA9_AFF"];
        break;
      }
      else {
        $temp++;
      }
    }

    $myData1 = array('pub'=>'cpaper','academic'=>'','sttp'=>'','cid'=>$id);
    $arg1 = base64_encode( json_encode($myData1) );
    $pdf4 = "<a href='showpdf.php?parameter=".$arg1."'>View PDF</a>";

    $myData2 = array('pub'=>'ccerti','academic'=>'','sttp'=>'','cid'=>$id);
    $arg2 = base64_encode( json_encode($myData2) );
    $pdf5 = "<a href='showpdf.php?parameter=".$arg2."'>View PDF</a>";

    $myData3 = array('pub'=>'cposter','academic'=>'','sttp'=>'','cid'=>$id);
    $arg3 = base64_encode( json_encode($myData3) );
    $pdf7 = "<a href='showpdf.php?parameter=".$arg3."'>View PDF</a>";


    if(isset($_POST["return"]))
    {
      header('Location:profile.php#section43');
    }

    if(isset($_POST["delete"]))
    {
      	$sql="DELETE FROM publication_conferences WHERE Name = '$name' AND Place = '$place' AND Date = '$date' AND Author = '$author' AND H_Index = '$hindex' AND DOI = '$doi' AND Organizer = '$organizer' AND Pub_Name = '$pubname' AND ISSN = '$issn'";
      $result = $conn->query($sql);
      if($result)
        header('Location:profile.php#section43');
      else {
        echo "<script type='text/javascript'>alert('".mysqli_error($conn)."');</script>";
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
    $pdf6 = "<a href='showpdf.php?parameter=".$arg1."'>View PDF</a>";

    if(isset($_POST["return"]))
    {
      header('Location:profile.php#section51');
    }

    if(isset($_POST["delete"]))
    {
      $sql="DELETE FROM sttp_event_attended
      WHERE Emp6_Id = '$empid' and Date_From = '$datefrom' and Date_To = '$dateto' and Organized_By = '$organizedby' and Place = '$place' and Duration = '$duration' and Total_Participation = '$totalparticipation' and Speaker = '$speaker' and Event_Type = '$eventtype' and Title = '$title'";
      $result = $conn->query($sql);
      if($result)
        header('Location:profile.php#section51');
      else {
        echo "<script type='text/javascript'>alert('".mysqli_error($conn)."');</script>";
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

    if(isset($_POST["return"]))
    {
      header('Location:profile.php#section52');
    }

    if(isset($_POST["delete"]))
    {
      $sql="DELETE FROM sttp_event_organized WHERE Emp7_Id='$empid' and Type=
      '$type' and Role='$role' and Number_Participants='$noparticipants' and Date_From='$datefrom' and Date_To='$dateto' and Name='$name'";
      $result = $conn->query($sql);
      if($result)
        header('Location:profile.php#section52');
      else {
        echo "<script type='text/javascript'>alert('".mysqli_error($conn)."');</script>";
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

      if(isset($_POST["return"]))
      {
        header('Location:profile.php#section53');
      }

      if(isset($_POST["delete"]))
      {
        $sql="DELETE FROM sttp_event_delivered WHERE
        Emp9_Id='$empid' and Description='$description' and Place='$place' and Duration='$duration' and Date_From='$datefrom' and Date_To='$dateto' and Name='$name' and Event_Type='$eventtype'";
        $result = $conn->query($sql);
        if($result)
          header('Location:profile.php#section53');
        else {
          echo "<script type='text/javascript'>alert('".mysqli_error($conn)."');</script>";
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

    if(isset($_POST["return"]))
    {
      header('Location:profile.php#section6');
    }

    if(isset($_POST["delete"]))
    {
      $sql="DELETE FROM co_curricular WHERE
      Emp10_Id='$empid' and Description='$description' and Date='$date' and Role='$role' and Name='$name' and Type='$type'";
      $result = $conn->query($sql);
      if($result)
        header('Location:profile.php#section6');
      else {
        echo "<script type='text/javascript'>alert('".mysqli_error($conn)."');</script>";
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

    if(isset($_POST["return"]))
    {
      header('Location:profile.php#section7');
    }

    if(isset($_POST["delete"]))
    {
      $sql="DELETE FROM extra WHERE Emp11_Id='$empid'
      and Description='$description' and Role='$role' and Place='$place' and Date='$date' and Name='$name'";
      $result = $conn->query($sql);
      if($result)
        header('Location:profile.php#section7');
      else {
        echo "<script type='text/javascript'>alert('".mysqli_error($conn)."');</script>";
      }
    }
  }

?>
