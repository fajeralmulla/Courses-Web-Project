<!DOCTYPE html>
<html lang="en">
<head>
     <?php 
$root=$_SERVER["DOCUMENT_ROOT"];
require($root.'/course+/config/config.php');
require($root.'/course+/config/db.php');
include('/course+/getUserInfo.php');


?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Admin Dashboard using HTML, CSS, and JavaScript</title>
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
            <h1>Admin</h1>
           

            <h2><span class="material-icons-sharp">badge</span> Profile</h2>
            <div class="admin-profile">
                <img src="./Media/profile.png">
            </div>

                <div class="students">
                    <div class="middle">
                        <h6>ID: <?php echo $userinfo['id']; ?> </h6>
                        <h6>Role: <?php echo $userinfo['role']; ?> </h6>
                        <h6>Name: <?php echo $userinfo['fname'].' '.$userinfo['lname'];  ?> </h6>
                        <h6>Username: <?php echo $userinfo['username']; ?> </h6>
                        
                    </div>
     
                </div>
                
            <!---------------------------------- END OF ADMIN ------------------------------------------->

            <!---------------------------------- END OF INSIGHTS ------------------------------------------->

    
        </main>
        <!---------------------------------- END OF MAIN ------------------------------------------->

   





    </div>
    <script src="/course+/admin-dashboard/index.js"></script>
    
</body>

</html>
