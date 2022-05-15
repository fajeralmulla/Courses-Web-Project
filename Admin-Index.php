<?php session_start();?>
<?php 
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
    <title>Admin Page</title>
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
             
                <a href="Admin-Index.php" class="active">
                    <span class="material-icons-sharp">dashboard</span>
                    <h3>Dashboard</h3>
                </a>


                <a href="Courses.php">
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
            <h1>Dashboard</h1>

            <h2><span class="material-icons-sharp">analytics</span> Analysis</h2>

            <div class="insights">
                <div class="students">
                    <span class="material-icons-sharp">groups</span>
                    <div class="middle">
                        <h4>Total Users: </h4>
                        <h5><?php 
                        $query= "SELECT * FROM user";
                        $query_run= mysqli_query($conn, $query);
                        $count= mysqli_num_rows($query_run);
                        echo $count;
                        ?></h5>                  
                    </div>
              
                </div>
            <!---------------------------------- END OF USERS ------------------------------------------->
                <div class="courses">
                    <span class="material-icons-sharp">school</span>
                    <div class="middle">
                        <h4>Total Courses: </h4>
                        <h5><?php 
                        $query= "SELECT * FROM courses";
                        $query_run= mysqli_query($conn, $query);
                        $count= mysqli_num_rows($query_run);
                        echo $count;
                        ?></h5>                   
                    </div>
                   
                </div> 
            <!---------------------------------- END OF COURSES ------------------------------------------->
            </div>
            <!---------------------------------- END OF INSIGHTS ------------------------------------------->

            <div class="views">
                <h2><span class="material-icons-sharp">school</span> Courses Overview</h2>

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
                    $sql= "SELECT * FROM courses LIMIT 3";
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
            <a href="Courses.php">Show All</a>



    
                <!-------------------------------------END OF COURSES TABLE-------------------------------------->
            
                <h2><span class="material-icons-sharp">group</span> Users Overview</h2>
                <table>
                    <tr>
                        <th>User ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Role</th>
                        <th>Interest</th>
                        <th>Action</th>
                    </tr>

                <tbody>
                    <?php
                    if($conn-> connect_error){
                        die("Connection failed: ". $conn-> connect_error);
                    }
                    $sql= "SELECT * FROM user LIMIT 3";
                    $result= $conn-> query($sql);
                    if ($result -> num_rows > 0){
                        while ($row = $result-> fetch_assoc()){?>

                            <tr>
                                <td><?php echo $row["id"]; ?></td>
                                <td><?php echo $row["fname"]; ?></td>
                                <td> <?php echo $row["lname"]; ?></td>
                                <td> <?php echo $row["username"]; ?></td>
                                <td> <?php echo $row["email"]; ?> </td>
                                <td> <?php echo $row["password"]; ?></td>
                                <td> <?php echo $row["role"]; ?></td>
                                <td> <?php echo $row["interest"]; ?></td>
                                <td>
                                <form action="Admin-delete-user.php" method="POST">
                                        <button type="submit" name="delete" value="<?=$row['id']; ?>"><span class= "material-icons-sharp">delete</span></button>
                                    </form>

                                    <form action="Admin-edit-user.php?id=<?=$row['id'];?>" method="POST">
                                        <button type="submit" name="delete"><span class= "material-icons-sharp">edit</span></button>
                                    </form>
                            </tr>
                        <?php } ?>
                    <?php } ?>
                     




                    

                </tbody>


            </table>
                <a href="Users.php">Show All</a>
            </div>
                <!------------------------------ END OF USERS TABLE ------------------------------------>
            </div>
        </main>
        <!---------------------------------- END OF MAIN ------------------------------------------->

   





    </div>
    
</body>

</html>
