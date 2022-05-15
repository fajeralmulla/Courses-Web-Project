
<?php
session_start();

$root=$_SERVER["DOCUMENT_ROOT"];
require($root.'/course+/config/config.php');
require($root.'/course+/config/db.php');


if(isset($_POST['submit'])) {

$course=mysqli_real_escape_string($conn,$_POST['course']);
$instructor=mysqli_real_escape_string($conn,$_POST['instructor']);
$startDate=mysqli_real_escape_string($conn,$_POST['startDate']);
$endDate=mysqli_real_escape_string($conn,$_POST['endDate']);
$startTime=mysqli_real_escape_string($conn,$_POST['startTime']);
$endTime=mysqli_real_escape_string($conn,$_POST['endTime']);
$description=mysqli_real_escape_string($conn,$_POST['description']);
$field=mysqli_real_escape_string($conn,$_POST['feild']);
$counterrors=0;

/* ----Course validation-----*/
if($course==""){
  $course_error ="*Please enter a course name ";
  $counterrors+=1;
}

/* ----Instructor validation-----*/
if($instructor==""){
    $instructor_error ="*Please enter an instructor name ";
    $counterrors+=1;
  }
elseif (!preg_match("/^[a-z.]+$/i",$instructor)) {
    $instructor_error2 ="*Instructor's Name must contain only alphabets, , e.g., John Doe" ;
    $counterrors+=1;
    }


/* ----Start date validation-----*/
if($startDate==""){
  $startD_error ="*Please enter a starting date";
  $counterrors+=1;
}
elseif (!preg_match("/^(20[0-9]{2})-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/", $startDate)){
  $sDate_syntax_error ="*The date must match the syntax: YYYY-MM-DD";
  $counterrors+=1;

}


/* ----End date validation-----*/
if($endDate==""){
  $endD_error ="*Please enter an ending date";
  $counterrors+=1;
}
elseif (!preg_match("/^(20[0-9]{2})-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/", $endDate)){
  $eDate_syntax_error ="*The date must match the syntax: YYYY-MM-DD";
  $counterrors+=1;
}

/* ----Start time validation-----*/
if($startTime==""){
  $sTime_error ="*Please enter a starting time";
  $counterrors+=1;
}
elseif (!preg_match("/(0[0-9]|1[0-9]|2[0-3]):[0-5][0-9](:[0-5][0-9])?/", $startTime)){
  $sTime_syntax_error ="*Please enter time in 24-hour format, i.e., HH:MM:SS or HH:MM";
  $counterrors+=1;
}

/* ----End time validation-----*/
if($endTime==""){
  $eTime_error ="*Please enter an ending time";
  $counterrors+=1;
}
elseif (!preg_match("/(0[0-9]|1[0-9]|2[0-3]):[0-5][0-9](:[0-5][0-9])?/", $endTime)){
  $eTime_syntax_error ="*Please enter time in 24-hour format, i.e., HH:MM:SS or HH:MM";
  $counterrors+=1;
}

/* ----Description validation-----*/
if($description==""){
  $descriptionError ="*Please type some description for the course";
  $counterrors+=1;
}

/* ----Field validation-----*/
if($field==""){
  $field_error="Please choose one of the options";
  $counterrors+=1;
}


/* ---- If inputs contans errors --*/
if($counterrors){
  $_SESSION['error']="Sign-UP failed.";

  }
  
/* ---- If no errors --*/
else{
  $quetyinsert="INSERT INTO courses(course,instructor,startDate,endDate,startTime, endTime, description, feild) VALUES('$course','$instructor','$startDate','$endDate','$startTime', '$endTime', '$description', '$field')";
   $re=mysqli_query($conn, $quetyinsert);
   if($query_run){
    $_SESSION['message']= "Course Added Successfully!";
    header('Location: Admin-add-course.php?id='.$id);
    exit(0);
}
else{
    $_SESSION['message']= "Something Went Wrong... Please Try Again Later";
    header('Location: Admin-add-course.php?id='.$id);
    exit(0);
}



}




//close connection
mysqli_close($conn);


}


?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Courses</title>
    <!-- MATERIAL CDN -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <!-- STYLESHEET -->
    <link rel="stylesheet" href="../../course+/css/update.css">
</head>

<html>


<body>

<!--- UPDATE FORM IN HTML --->

<!DOCTYPE html>
<html>
<link rel="stylesheet" href="../../course+/css/update.css">

    <head>
        <title>PHP UPDATE DATA</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>

    <body>
        <div class="center">
            <h1>Add Courses</h1>

            <form method="post" action="" id="signup-form" >
                <div class="txt-field">
                <label><b>Course</b></label>
                <input type="text" id="course" name="course" placeholder="Course name" autocomplete="off">
                <label class="error"><?php if (isset($course_error)) echo $course_error; ?></label>
                <span></span>
                </div>

                <div class="txt-field">
                <label><b>Instructor</b></label>
                <input type="text" id="instructor" name="instructor" placeholder="Instructor Name, e.g., John Doe" autocomplete="off" >
                <label class="error"><?php if (isset($instructor_error)) echo $instructor_error; ?></label>
                <label class="error"><?php if (isset($instructor_error2)) echo $instructor_error2; ?></label>
                <span></span>
                </div>

                <div class="txt-field">
                <label><b>Course's Start Date</b></label>  
                <input type="text" id="startDate" name="startDate" placeholder="Start Date" autocomplete="off" >
                <label class="error"><?php if (isset($startD_error)) echo $startD_error; ?></label>
                <label class="error"><?php if (isset($sDate_syntax_error)) echo $sDate_syntax_error; ?></label>
                <span></span>
                </div>

                <div class="txt-field">
                <label><b>Course's End Date </b></label>
                <input type="text" id="endDate" name="endDate" placeholder="End Date" autocomplete="off">
                <label class="error"><?php if (isset($endD_error)) echo $endD_error; ?></label>
                <label class="error"><?php if (isset($eDate_syntax_error)) echo $eDate_syntax_error; ?></label>
                <span></span>
                </div>

                
                <div class="txt-field">
                <label><b>Course Starts:</b></label><br>
                <label>From</label>
                <input type="text" name="startTime" class="startTime" placeholder="Start Time" autocomplete="off">
                <label class="error"><?php if (isset($sTime_error)) echo $sTime_error; ?></label>
                <label class="error"><?php if (isset($sTime_syntax_error)) echo $sTime_syntax_error; ?></label>
                <span></span>
                </div>

                <div class="txt-field">
                <label>To</label>
                <input type="text" name="endTime" class="endTime" placeholder="End Time" autocomplete="off">
                <label class="error"><?php if (isset($eTime_error)) echo $eTime_error; ?></label>
                <label class="error"><?php if (isset($eTime_syntax_error)) echo $eTime_syntax_error; ?></label>
                <span></span>
                </div>

                <div class="txt-field">
                <label>Course Description</label>
                <input><textarea name="description" cols="40" rows="5" placeholder="Description" autocomplete="off"></textarea>
                <label class="error"><?php if (isset($descriptionError)) echo $descriptionError; ?></label>
                <span></span>
                </div>

                <div class="txt-field">
                <label><b>Field:</b></label>
                <select name="feild" class= "selectpicker">
                   <option value="" >--Please choose an option-- </option>
                   <option value="Computer Programming">Computer Programming</option>
                   <option value="Cybersecurity">Cyberseciuty</option>
                   <option value="Data Science">Data Science</option>
                   <option value="Web Development">Web Development</option>
                </select>
                <label class="error"><?php if (isset($field_error)) echo $field_error; ?></label><br>
                </select><br>
                <span></span>
                </div>

                <div class="submit">
                <input type= "submit" name="submit" value="Add Course">
                </div>
                <div class="button">
                <button type="button" name="button" onclick="window.location.href = 'Admin-Index.php';">Cancel</button>
                </div>
        </form>
        </div>
         
     
    </body>





</html>
