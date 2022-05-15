<?php session_start(); 

$root=$_SERVER["DOCUMENT_ROOT"];
require($root.'/course+/config/config.php');
require($root.'/course+/config/db.php');
include('/course+/getUserInfo.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Courses</title>
    <!-- MATERIAL CDN -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <!-- STYLESHEET -->
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <div class="top">
        <div class="container nav__container">
            <div class="logo">
                <img src="/course+/imgs/logo.jpg">
            </div>
            <div class="right">
            
   
                <div class="profile">
                    <div class="info">
                    <p>
                            <a href="user-profile.php">
                            <?php if (isset($_SESSION['username'])) { ?>
                            <p>Hey, <b> <?php echo $userinfo['fname']; ?></b>
                            <?php }?>
                            </a>
                        </p>
                        <small class="text-muted">Admin</small>
                    </div>
                    <div class="profile-photo">
                        <img src="/course+/imgs/profile.png">
                    </div>
                </div>
            
        </div>
        </div>
        
    <!---------------------------------- END OF TOP ------------------------------------------->

    </div>
    
    <div class="container">
        <aside>
            
            <div class="top">
                
                <div class="close" id="close-btn">
                    <span class="material-icons-sharp">close</span>
                </div>
            </div>

            <div class="sidebar">
             
                <a href="Admin-Index.php">
                    <span class="material-icons-sharp">dashboard</span>
                    <h3>Dashboard</h3>
                </a>


                <a href="Courses.php" class="active">
                    <span class="material-icons-sharp">school</span>
                    <h3>Courses</h3>
                </a>


                <a href="Users.php">
                    <span class="material-icons-sharp">groups</span>
                    <h3>Users</h3>
                </a>


                <a href="Pages.php">
                    <span class="material-icons-sharp">web</span>
                    <h3>Pages</h3>
                </a>


                <a href="..\..\course+\mainP.php">
                    <span class="material-icons-sharp">logout</span>
                    <h3>Logout</h3>
                </a>
                
            </div>
        </aside>
        <!---------------------------------- END OF ASIDE ------------------------------------------->
        <main>
            <h1>Courses</h1>


            <!--<div class="insights">
                <div class="Computer Programming">
                    <span class="material-icons-sharp">code</span>
                    <div class="middle">
                        <h4>Computer Programming </h4>
                    </div>
                </div>

                <div class="Cyber Security">
                    <span class="material-icons-sharp">gpp_good</span>
                    <div class="middle">
                        <h4>Cyber Security</h4>
                    </div>
                    
                </div>

                <div class="Data Science">
                    <span class="material-icons-sharp">insights</span>
                    <div class="middle">
                        <h4>Data Science</h4>
                    </div>
                   
                </div> 

                <div class="Web Development">
                <span class="material-icons-sharp">htmlphp</span>
                <div class="middle">
                    <h4>Web Development</h4>
                </div>
               
            </div> 
            </div>-->
            <!---------------------------------- END OF INSIGHTS ------------------------------------------->

            <div class="views">
                <h2><span class="material-icons-sharp">settings</span> Courses Management</h2>
                <a href="Admin-add-course.php">
                    <h6><span class="material-icons-sharp">add</span> &nbsp;Add New Courses</h6>
                </a>

                <table>
                    <tr>
                        <th>Course ID</th>
                        <th>Course Name</th>
                        <th>Instructor</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>From</th>
                        <th>To</th>
                        <th>Description</th>
                        <th>Field</th>
                        <th>Action</th>
                    </tr>

                <tbody>
                    <?php
                    if($conn-> connect_error){
                        die("Connection failed: ". $conn-> connect_error);
                    }
                    $sql= "SELECT * FROM courses";
                    $result= $conn-> query($sql);
                    if ($result -> num_rows > 0){
                        while ($row = $result-> fetch_assoc()){?>
                        <?php $id= $row['id'];?>
                        
                            <tr>
                                <td><?php echo $row["id"]; ?></td>
                                <td><?php echo $row["course"]; ?></td>
                                <td> <?php echo $row["instructor"]; ?></td>
                                <td> <?php echo $row["startDate"]; ?></td>
                                <td> <?php echo $row["endDate"]; ?> </td>
                                <td> <?php echo $row["startTime"]; ?></td>
                                <td> <?php echo $row["endTime"]; ?></td>
                                <td> <?php echo $row["description"]; ?></td>
                                <td> <?php echo $row["feild"]; ?></td>


                                <td>
                                    <form action="Admin-delete-course.php" method="POST">
                                        <button type="submit" name="delete" value="<?=$row['id']; ?>"><span class= "material-icons-sharp">delete</span></button>
                                    </form>

                                    <form action="Admin-edit-course.php?id=<?=$row['id']; ?>" method="POST">
                                        <button type="submit" name="delete"><span class= "material-icons-sharp">edit</span></button>
                                    </form>
                                </td>
                            </tr>
                        <?php } ?>
                    <?php } ?>
                     




                    

                </tbody>


            </table>

                

                





    </div>
   
    
</body>


</html>
