<?php include('inc/header.php');
 include('getUserInfo.php'); ?>
<head>
<title>Course+</title>
</head>
<body class="home-header">
<div class="profile">
                    <div class="info">

                        <a href="/course+/user-profile.php">
                            <?php if(isset($_SESSION['success'])){
                                 ?>
                            <p>Hello, <b> <?php echo $userinfo['fname']; ?></b>
                            <?php }?>
                            </a>
                        </p>
                    </div>
                </div>

        <div class="text-box">
            <h1>Welcome to Course+</h1>
            <p>
                Start your free courses now
            </p>
            <a href="/course+/courses.php" class="signup-btn">View Courses</a>
        </div>



</body>


</html>
