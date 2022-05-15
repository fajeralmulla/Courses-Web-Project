<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="application-name" value="Web_Project">
    <meta name="viewport" content="with=device-width, initial-scale=1.0">
  <title>Sign Up</title>
  <link rel="stylesheet" href="/course+/css/sign_up.css">
  <script src="https://kit.fontawesome.com/0243f124e5.js" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
  <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
  <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.js"></script>

  <link rel="preconnect" href="https://fonts.googleapis.com">
 <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
 <!--password icon --->
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />

 <link href="https://fonts.googleapis.com/css2?family=Source+Code+Pro:ital,wght@0,300;0,400;0,600;1,800&display=swap" rel="stylesheet">

 <link rel="stylesheet" href="/course+/css/jquery.passwordRequirements.css" />

  <script src="/course+/js/jquery.passwordRequirements.min.js"></script>

  <script src="/course+/js/jquery.passwordRequirements.js"></script>

  <script type="text/javascript"  src="/course+/js/signup.js"></script>
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
</head>
</html>
