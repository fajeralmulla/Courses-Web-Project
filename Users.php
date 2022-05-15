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
    <title>Users</title>
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


                <a href="Courses.php">
                    <span class="material-icons-sharp">school</span>
                    <h3>Courses</h3>
                </a>


                <a href="Users.php" class="active">
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
            <h1>Users</h1>

            <div class="views">
                <h2><span class="material-icons-sharp">settings</span> Users Management</h2>
                <a href="Admin-add-user.php">
                    <h6><span class="material-icons-sharp">add</span> &nbsp;Add New Users</h6>
                </a>

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
                    $sql= "SELECT * FROM user";
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

                

                





    </div>
    
</body>

</html>
