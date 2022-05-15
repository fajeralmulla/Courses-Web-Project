<?php 
  $document_root = $_SERVER['DOCUMENT_ROOT'];
  include($document_root.'/course+/inc/header.php');
  include('log.php');
  $_SESSION['tokenLogin'] = bin2hex(random_bytes(35));

?>

<!DOCTYPE html>

<html>

<head>

    <title>LOGIN</title>

</head>

<body class="loginbody">
    <div class="Welcome">
        <h1 class="lohin-h1"> LOGIN </h1>
        <i class="fa-solid fa-arrow-right-to-bracket" id="icon"></i>
        <h3 class="login-h3"> Welcome to COURSE+</h3>
        </div>
    <div class="login-container" >

     <form action="" method="post" id="login-form" onsubmit="return validation()">

        <label class="error"><?php if (isset($fields_error)) echo $fields_error; ?></label>

        <input type="text" name="username" id="username" placeholder="User Name" value="<?php if (isset($username)) echo $username; ?>"><br>
        <div id="nameErr">
      </div>
    <?php if(isset($user_error)): ?>
                <p><?php echo $user_error; ?></p>
                <?php endif; ?>
                

        <input id="password" type="password" name="password" placeholder="Password" value="<?php if (isset($password)) echo $password; ?>"><br>
        <div id="passErr">
      </div>
    <?php if(isset($password_error)): ?>
                <p><?php echo $password_error; ?></p>
                <?php endif; ?>
                <?php if(isset($upper_error)): ?>
                <p><?php echo $upper_error; ?></p>
                <?php endif; ?>
        
        <label class="error"><?php if (isset($username_error)) echo $username_error; ?></label>
        <input type="hidden" name="token" value="<?php echo $_SESSION['tokenLogin'] ?? '' ?>">
            <button id="btn" type="submit" class="mainloginbtn">Login</button>
            <!-- <div id="userandpassword-message"> -->
            <?php if(isset($error_message)): ?>
            <p><?php echo $error_message; ?></p>
            <?php endif; ?>
            <button id="btn" type="button" class="mainloginbtn" onclick="window.location.href = 'mainP.php';">Cancel</button>
            <p class="login-p">You Don't Have Account Yet? <a href="/course+/Sign_UP.php">Join Us Now</a></p></div>

    </div>
        </form>
        
        <script>
function validation()
{
    
    var nameErr= "";
    var passErr= ""; 
    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;

    
    
    if(username == "" && password == ""){
        document.getElementById("nameErr").innerHTML = " Please enter your username ";
        document.getElementById("passErr").innerHTML='Please enter your password';   
        return false;  
    } 

    if(username == ""){
        document.getElementById("nameErr").innerHTML ="Please enter your username";
    } 
       
    if(password== ""){
        document.getElementById("passErr").innerHTML='Please enter your password'; 
        return false;
    }


    
    
    let nameformat = /^[A-Za-z0-9_-]{5,}$/;
    if(nameformat.test(username) === false) {
        document.getElementById("passErr").innerHTML=' ';
        document.getElementById("nameErr").innerHTML = 'Please enter a valid name';
        return false;
    } 

    document.getElementById("nameErr").innerHTML = "";
    document.getElementById("passErr").innerHTML = "";
}
</script>
</body>

</html>
