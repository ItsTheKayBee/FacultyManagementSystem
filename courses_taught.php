<?php
$conn = mysqli_connect("localhost", "root", "", "faculty") or die("Connection failed" . mysqli_connect_error());
$q = $_REQUEST['q'];
$arr = explode(",", $q);
$sql = "select * from courses_list where course_type='" . $arr[0] . "' order by course_id";
$result = $conn->query($sql);
if ($arr[0] === 'AC') {
    $arr[0] = "Audit";
} else if ($q === 'Labcourses') {
    $arr[0] = "Lab";
}
echo "<option value=''>Please select " . $arr[0] . " course</option>";
while ($row = $result->fetch_assoc()) {
    if ($result->num_rows > 0) {
        $course = $row['course_name'];
        if ($arr[1] == '') {
            echo "<option value='" . $course . "'>" . $course . "</option>";
        } else {
            if ($course == $arr[1]) {
                echo "<option value='" . $course . "' selected>" . $course . "</option>";
            } else {
                echo "<option value='" . $course . "'>" . $course . "</option>";
            }
        }
    }
}
