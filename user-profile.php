<?php include('inc\header.php'); ?>
<?php include('getUserInfo.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $userinfo['fname'];  ?> Profile page</title>
    <!-- MATERIAL CDN -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <!-- STYLESHEET -->
    <link rel="stylesheet" href="/course+/css/user-profile.css">

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
                        <small class="text-muted"><?php echo $userinfo['role']; ?></small>
                        <div class="nav-links">
            <i class="fa fa-times-circle-o"></i>
             <ul>
         
             <li><a href="/course+/mainPuser.php">HOME</a></li>
             <li><a href="/course+/courses.php">COURSE</a></li>
             <li><a href="/course+/enrolment.php">ENROLL</a></li>
             <li><a href="/course+/user-profile.php">PROFILE</a>
             </ul>
            </div>
                    </div>
                    <div class="profile-photo">
                        <img src="/course+/imgs/profile.png">
                    </div>
                </div>
            
            </div>
        </div>
        
    <!---------------------------------- END OF TOP ------------------------------------------->

    </div>
    
    <div class="profileinfo">
     
        <main>
            <h1><?php echo $userinfo['role']; ?></h1>
            <h2><span class="material-icons-sharp">badge</span> Profile</h2>
            <div class="admin-profile">
            </div>
            
                    <div>
                        <h6>ID:  <?php echo $userinfo['id']; ?></h6>
                        <h6>Role: <?php echo $userinfo['role']; ?></h6>
                        <h6>Name: <?php echo $userinfo['fname'].' '.$userinfo['lname'];  ?> </h6>
                        <h6>Username: <?php echo $userinfo['username']; ?>  </h6>
                        <h6>Interest: <?php echo $userinfo['interest']; ?></h6>
                        <a href="/course+/user-profile-edit.php">
                            <br>
                           <h5><a href="user-profile-edit.php">Edit Profile</a></h5>                        
                        <h5><button onclick="window.location.href = '/course+/logout.php';"> Logout</button></h>

                        
                    </div>
     
                
                


    
        </main>
        <!---------------------------------- END OF MAIN ------------------------------------------->

   





    </div>
    <script src="/course+/admin-dashboard/index.js"></script>
    
</body>

</html>
