<?php
$conn = mysqli_connect("localhost","root","","faculty") or die("Connection failed".mysqli_connect_error());
$q=$_REQUEST['q'];
$sql="select * from courses_list where course_type='".$q."' order by course_id";
$result=$conn->query($sql);
if($q==='AC'){
    $q="Audit";
}else if($q==='Labcourses'){
    $q="Lab";
}
echo "<option value=''>Please select ".$q." course</option>";
while($row=$result->fetch_assoc()){
    if($result->num_rows>0){
        $course=$row['course_name'];
        echo "<option value='".$course."'>".$course."</option>";
    }
}
