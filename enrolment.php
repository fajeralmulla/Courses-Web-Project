<!DOCTYPE html>
<?php include('inc/header.php'); ?>
<?php require('config/config.php');?>
<?php require('config/db.php');?>
<head>
    <meta name="viewport" content="with=device-width, initial-scale=1.0">
    <title>enrolment</title>
    <link rel="stylesheet" href="/course+/css/first_page.css">

</head> 

<body class="enrolment-header">


    <section class="title-enrol">
       <div  >
    <h1>Courses Enrolment</h1>


</div>
<hr class=line2; style="border-color: #74dcc3;  border-top: 1px solid; " >
   </section>
    
    
    <section id="cart" class="enrol-table">
    
        <table width="100%">
        <thead> 
           <tr>
            
            <td><h5>Course</h5></td>
            <td><h5>Instructor</h5></td>
            <td><h5>Start Date</h5></td>
            <td><h5>End Date</h5></td>
            <td><h5>Start Time</h5></td>
            <td><h5>End Time</h5></td>
            <td><h5>Remove</h5></td>
            
            </tr> 
            
            
            </thead>
        <tbody>
        <?php
				
                $username = $_SESSION['username']; // get username
                   
                    if(isset($_POST['enrol'])){ 
                        $id=$_POST['id'];
                        $coursename = $_POST['course']; // get course name from the form 
                        
                         // prepared statement to prevent SQL Injection
                         $checksql=$conn->prepare("SELECT cname FROM enrolment WHERE cname=? AND uname=?"); 
                         // bind parameters
                         $checksql->bind_param('ss',$coursename,$username);   
                         $checksql->execute();      
                         $checkresult=$checksql->get_result();
                         $numberOfRows = mysqli_num_rows($checkresult);

                         //insert to enrolment table
                        
                       
                         // check doubled courses 
                         if($numberOfRows != 0)
                         {echo "<p><a href='courses.php'>Back</a><br/>Course Already Added by  $username</p>" ;
                         }
                         else{
                            $esql =$conn->prepare("INSERT INTO enrolment (uname, cname,CID) VALUES (?,?,?)"); 
                            $esql->bind_param('ssi',$username,$coursename,$id);
                            $eresult =$esql->execute();
                         }
                         unset($_POST['enrol']);
                        
                    }
                        // take course name from enrolment table
                        $selectcourse= $conn->prepare("SELECT CID FROM enrolment WHERE uname=?"); 
                        $selectcourse->bind_param('s',$username); 
                        $selectcourse->execute();
                        $sresult=$selectcourse->get_result();
                         //print the course name from enrolment table & details based on course id
                       while($rows=$sresult->fetch_assoc())
                        {
                        foreach($rows as $value) {

                 	?>
                      <?php       // based on course name from enrolment table
                        $details=$conn->prepare("SELECT * FROM courses WHERE id=?"); 
                        $details->bind_param('i',$value); 
                        $details->execute();
                        $dresult=$details->get_result();
                        //print the course details from courses table
                       while($rows1=$dresult->fetch_assoc())
                        {
                         ?>
            <tr>
         
            <td><p><?php echo $rows1['course'];  ?></p></td>
            <td><p><?php echo $rows1['instructor'];?></p></td>
            <td><p><?php echo $rows1['startDate']; ?></p></td>
            <td><p><?php echo $rows1['endDate']; ?></p></td>
            <td><p><?php echo $rows1['startTime']; ?></p> </td>
            <td><p><?php echo $rows1['endTime']; ?></p> </td>
            <form action='enrolment.php' method='POST'>
            <td><button type='submit' name='delete' value='<?= $value ?>' ><i class="fa fa-trash"></i></button></td>
                            </form>
            </tr>  
            <?php 
            // delete course 
             if(isset($_POST['delete'])){
                $id=$_POST['delete'];
                $removesql = "DELETE FROM enrolment WHERE  CID='$id'";
                $rresult= $conn->query($removesql);
                //unset($_POST['delete']);
        
            }}}} 
            ?>
         
            
            </tbody>
        
        </table>
        
        
        
    </section>
    



</body>
</html>
