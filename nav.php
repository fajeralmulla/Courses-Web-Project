<!DOCTYPE html>
<?php if (session_status() === PHP_SESSION_NONE) {
    session_start();
}?>
<html>
    <head> <link rel="stylesheet" href="/course+/css/first_page.css"></head>
<body>
<section class="header">
     <nav>
       <a herf="mainP.php"><img src="/course+/imgs/logo3.ico"></a>
           <div class="nav-links">
             <ul>
            <?php if(!isset($_SESSION['username'])){?>
             <li><a href="/course+/mainP.php">HOME</a></li>
             <li><a href="/course+/courses.php">COURSE</a></li>
             <li><a href="/course+/login.php">LOGIN</a></li>
             <?php } else {?>
             <li><a href="/course+/mainPuser.php">HOME</a></li>
             <li><a href="/course+/courses.php">COURSE</a></li>
             <li><a href="/course+/enrolment.php">ENROLL</a></li>
             <li><a href="/course+/user-profile.php">PROFILE</a>


            </li> <?php }?>
             </ul>
            </div>
    </nav>
    </section>
            </body>
            </html>
