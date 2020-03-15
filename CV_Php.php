<?php
include 'dbconnect.php';
function dateformatChanger($orgDate)
{
    return date("d-m-Y", strtotime($orgDate));
}

if (!isset($_SESSION["Emp_Id"]))
    header('Location:logout.php');
else {
    $myData = json_decode(base64_decode($_GET['parameter']));
    $empid = $myData->id;
    $nocourse = 0;
    /*PERSONAL DETAILS*/
    $sql = "SELECT * FROM personal_details WHERE Emp3_Id=$empid";
    $result = $conn->query($sql);
    $row = mysqli_fetch_assoc($result);
    $name = $row["Name"];
    $email = $row["Email"];
    $contact = $row["Contact"];
    $gender = $row["gender"];
    $address = $row["Address"];
    $join_pos = $row["Join_Pos"];
    $join_date = $row["Join_Date"];
    $pro1 = $row["Prom_1"];
    $pro1_date = $row["Prom_1_Date"];
    $dob = $row["DOB"];
    $profilepic = $row["Profile_Pic"];

    // ACADEMIC DETAILS
    $sql = "SELECT * FROM academic_details WHERE Emp2_Id=$empid";
    $result = $conn->query($sql);
    $row1 = mysqli_fetch_assoc($result);
    $sscInstitute = $row1["SSC_Institute"];
    $sscPercentile = $row1["SSC_Percentile"];
    $sscYear = $row1["SSC_Year"];
    $sscMarksheet = $row1["SSC_Marksheet"];

    $hscInstitute = $row1["HSC_Institute"];
    $hscPercentile = $row1["HSC_Percentile"];
    $hscYear = $row1["HSC_Year"];
    $hscMarksheet = $row1["HSC_Marksheet"];

    $bachelorsIn = $row1["Bachelors_In"];
    $bachelorsInstitute = $row1["Bachelors_Institute"];
    $bachelorsPercentile = $row1["Bachelors_Percentile"];
    $bachelorsYear = $row1["Bachelors_Year"];
    $bachelorsMarksheet = $row1["Bachelors_Marksheet"];

    $mastersIn = $row1["Masters_In"];
    $mastersInstitute = $row1["Masters_Institute"];
    $mastersPercentile = $row1["Masters_Percentile"];
    $mastersYear = $row1["Masters_Year"];
    $mastersMarksheet = $row1["Masters_Marksheet"];

    $phdIn = $row1["Phd_In"];
    $phdInstitute = $row1["Phd_Institute"];
    $phdPercentile = $row1["Phd_Percentile"];
    $phdYear = $row1["Phd_Year"];
    $phdMarksheet = $row1["Phd_Marksheet"];

    // COURSES TAUGHT
    $courseid = array();
    $coursecategory = array();
    $coursesem = array();
    $courseyear = array();

    $sql = "SELECT * from courses where Emp8_Id=$empid";
    $result = $conn->query($sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $courseid[$nocourse] = $row["Course_Id"];
        $coursecategory[$nocourse] = $row["Category"];
        $coursesem[$nocourse] = $row["Semester"];
        $courseyear[$nocourse] = $row["Year"];
        $nocourse++;
    }
}
?>
