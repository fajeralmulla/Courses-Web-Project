<?php include('inc/header.php'); ?>
<?php require('config/config.php');?>
<?php require('config/db.php');?>
<?php
// SQL query to select data from database
// prepared statement
$sql = $conn->prepare("SELECT * FROM courses ");
$sql->execute();   
$result = $sql->get_result();
$conn->close();
?>

<head>
    <meta name="viewport" content="with=device-width, initial-scale=1.0">
    <title>Courses</title>
    <link rel="stylesheet" href="/COURSE+/css/first_page.css">

</head> 
<body class="course-header">
       <div class="courses-text-box" >
    <h1>COURSES</h1>
    <h5 class:heading>Get free training on Course+ and learn from real-world experts adept at distilling complex concepts into manageable lessons. </h5>


</div>

   <section>

  <div class="row">
              
         <div class="course-col">
         <h3>Computer Programming</h3>
     
    </div>
        <div class="course-col">
         <h3>Cybersecurity</h3>
       
    </div>
        <div class="course-col">
         <h3>Data Science</h3>

    </div>
       <div class="course-col">
         <h3>Web Development</h3>
       
    </div>
</div>
  
 </section> 
    <div>
    <i class="fa-solid fa-code-simple"></i>
    <span class="material-icons-sharp "style="color: #74dcc3; font-size: 70px;">

</span>
</div>
<!-- loop the whole section -->
<section class="cs" id="cs">
<?php   
        // LOOP TILL END OF DATA 
        while($rows=$result->fetch_assoc())
         {
?>
<form action='enrolment.php'  method='POST'>

     
   <h1 class=interest><?php echo $rows['feild']; ?> </h1>     
   <h1 class=coursename ><?php echo $rows['course']; ?></h1>
   <h4>About This Course<br></h4>
   <p><?php echo $rows['description']; ?></p>
   <p></p>
   <h5> <i class="fa fa-id-card "style="color: #74dcc3;" ></i> Instructor: <span class="notbold"><?php echo $rows['instructor']; ?></span> </h5>
   <h5><i class="fa-solid fa-calendar-days" style="color: #74dcc3;"></i> Start Date: <span class="notbold"><?php echo $rows['startDate']; ?></span> End Date: <span class="notbold"> <?php echo $rows['endDate']; ?></span></h5>
   <h5> <i class="fa-solid fa-clock-rotate-left" style="color: #74dcc3;"></i>  Duration:  <span class="notbold"><?php echo $rows['startTime']; ?> - <?php echo $rows['endTime']; ?> </span> </h5>
   <h5> <i class="fa-solid fa-location-dot" style="color:#74dcc3;"></i>  Location: <span class="notbold">Online.</span> </h5>
   <!-- hidden input form to send data  -->
   <input type='hidden'  name='course'     value = ' <?php echo $rows['course']; ?> '>
   <input type='hidden'  name='instructor' value = ' <?php echo $rows['instructor']; ?> '>
   <input type='hidden'  name='startDate'  value = ' <?php echo $rows['startDate']; ?> '>
   <input type='hidden'  name='endDate'    value = ' <?php echo $rows['endDate']; ?> '>
   <input type='hidden'  name='startTime'  value = ' <?php echo $rows['startTime']; ?> '>
   <input type='hidden'  name='endTime'    value = ' <?php echo $rows['endTime']; ?> '>
   <input type='hidden'  name='id'         value = ' <?php echo $rows['id']?> '>
   <a href="courses.php" class="backbtn" id="back"> Back</a>
   <button type="submit" class="backbtn" name="enrol" onclick="window.location.href = 'enrolment.php'">Enrol </button>
</form>
   <hr class=line; style="border: 1px dashed #74dcc3; width: 50%; margin: auto; margin-top: 5%; margin-bottom: 5%;" >

  <?php } ?>
   <hr class=line2; style="border-color: #74dcc3;  border-top: 1px solid; " >
</section>
<section>
    <div>
              
    <footer class="footer">Copyright 2022 <span class="material-icons-sharp" style="font-size: 10px;"> copyright </span><br> made with love</footer>
    
    
    </div>
</section> 

</body>
</html>
