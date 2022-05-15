
<?php
session_start();

$root=$_SERVER["DOCUMENT_ROOT"];
require($root.'/course+/config/config.php');
require($root.'/course+/config/db.php');
if(isset($_POST['update_course'])){
    $id= $_POST['id'];
    $course= $_POST['course'];
    $instructor= $_POST['instructor'];
    $startDate= $_POST['startDate'];
    $endDate= $_POST['endDate'];
    $startTime= $_POST['startTime'];
    $endTime= $_POST['endTime'];
    $description= $_POST['description'];
    $field= $_POST['feild'];
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

/* ----End time validation-----*/
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


/* ---- if inputs contans errors --*/
if($counterrors){
  $_SESSION['error']="Update failed.";

  }
  
/* ---- if no errors --*/
else{
    $query= "UPDATE courses SET course= '$course', instructor= '$instructor', startDate= '$startDate', endDate='$endDate',
       startTime='$startTime', endTime='$endTime', description='$description', feild='$field' WHERE id= '$id'";
    $query_run= mysqli_query($conn, $query);
    
    if($query_run){
        $_SESSION['message']= "Course Updated Successfully!";
        header('Location: Admin-edit-course.php?id='.$id);
        exit(0);
    }
    else{
        $_SESSION['message']= "Something Went Wrong... Please Try Again Later";
        header('Location: Admin-edit-course.php?id='.$id);
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
            <h1>Edit Courses</h1>
            <?php 
            if(isset($_GET['id'])){
                $id= $_GET['id'];
                $course_edit= "SELECT * FROM courses WHERE id= '$id' LIMIT 1";
                $course_run= mysqli_query($conn, $course_edit);

                if(mysqli_num_rows($course_run) > 0){
                    $row= mysqli_fetch_array($course_run);
                    ?>
                    


                    
            <form method="POST" action="#">
                <div class="txt-field">
                <input type="hidden" name="id" value="<?= $row['id'] ?>">
                <span></span>
                </div>

                <div class="txt-field">
                <label><b>Course</b></label>
                <input type="text" id="course" name="course" value="<?= $row['course'] ?>" autocomplete="off">
                <span></span>
                </div>

                <div class="txt-field">
                <label><b>Instructor</b></label>
                <input type="text" id="instructor" name="instructor" value="<?= $row['instructor'] ?>"  autocomplete="off" >
                <span></span>
                </div>

                <div class="txt-field">
                <label><b>Course's Start Date</b></label>  
                <input type="text" id="startDate" name="startDate" value="<?= $row['startDate'] ?>"  autocomplete="off" >
           
                <span></span>
                </div>

                <div class="txt-field">
                <label><b>Course's End Date </b></label>
                <input type="text" id="endDate" name="endDate" value="<?= $row['endDate'] ?>"  autocomplete="off">
      
                <span></span>
                </div>

                
                <div class="txt-field">
                <label><b>Course Starts:</b></label><br>
                <label>From</label>
                <input type="text" name="startTime" class="startTime" value="<?= $row['startTime'] ?>"  autocomplete="off">

                <span></span>
                </div>

                <div class="txt-field">
                <label>To</label>
                <input type="text" name="endTime" class="endTime" value="<?= $row['endTime'] ?>"  autocomplete="off">

                <span></span>
                </div>

                <div class="txt-field">
                <label><b>Course Description</b></label>
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
                <input type= "submit" name="update_course" value="Update Course">
                </div>
                <div class="button">
                <button type="button" name="button" onclick="window.location.href = 'Admin-Index.php';">Cancel</button>
                </div>
        </form>
        <?php
                    
                }
                else{
                    ?> 
                    <h4>No Record Found!</h4>
                    <?php
                }
            }

            ?>
           
        

             
        </div>
         
     
    </body>





</html>
