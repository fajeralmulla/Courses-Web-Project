<?php
include('getUserInfo.php');
include('inc\header.php');

 ?>
<?php
/* UPDATE CODE IN PHP */ 
unset($_SESSION["statusUpdate"]);
unset($_SESSION["statusError"]);
if (isset($_SESSION['username'])){

    if (isset($_POST['update'])){
        /* check the token from the post reqtuset */

 
        $token = filter_input(INPUT_POST, 'token', FILTER_SANITIZE_STRING);
        if($token &&$token == $_SESSION['tokenUpdate']){ 
        $username= $_SESSION['username'];
        $user_check_query = "SELECT * FROM user WHERE username='$username' ";
        $result = mysqli_query($conn, $user_check_query);
        $userinfo = mysqli_fetch_assoc($result);
        $email= $userinfo['email'];
        $fname= mysqli_real_escape_string($conn,$_POST['fname']);
        $lname=  mysqli_real_escape_string($conn,$_POST['lname']);
        $currentPassword= mysqli_real_escape_string($connect,$_POST['pass']);
        $newPassword= mysqli_real_escape_string($conn,$_POST['npass']);
        $confirmPassword= mysqli_real_escape_string($conn,$_POST['cnpass']);
        $counterrors=0;
/*-----server side validation---*/

/* ----First name validation-----*/
if($fname==""){
  $fname_error ="Please enter a First name ";
  $counterrors+=1;
}elseif(!preg_match( "/^[A-Za-z]+$/",$fname)) {
  $fname_error ="First Name must contain only alphabets" ;
  $counterrors+=1;

  }

/* ----Last name validation-----*/
if($lname==""){
    $lname_error ="Please enter a Last name ";
    $counterrors+=1;}
elseif (!preg_match("/^[A-Za-z]+$/",$lname)) {
    $lname_error ="Last Name must contain only alphabets" ;
    $counterrors+=1;
    }
/* ----Passwords validation-----*/


/*  Countermeasure*/
if($currentPassword==""){
    $currentPassword_error ="Please enter a current password";
    $counterrors+=1;}
elseif (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{10,}$/",$currentPassword)) {
    $currentPassword_error ="Password must contain Minimum ten characters, at least one uppercase letter, one lowercase letter, one number and one special character" ;
    $counterrors+=1;
    } 
    
if($newPassword==""){
    $password_error="Please enter a new password";
    $counterrors+=1;
}elseif(!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{10,}$/",$newPassword)){
    $password_error = "Password must contain Minimum ten characters, at least one uppercase letter, one lowercase letter, one number and one special character";
    $counterrors+=1;
}
if($confirmPassword==""){
    $password_errorCon="Please confrim the password";
    $counterrors+=1;
}
/* ----check if the current password  matchs-----*/
if($newPassword != $confirmPassword){
    $password_errorCon= "Passwords Do Not Match!";
    $counterrors+=1;
}

/* ---- if no errors-----*/
if($counterrors==0){
/* ----take the current password from the database -----*/
$selectPassword= "SELECT password FROM user WHERE username='$username'";
$result=mysqli_query($conn,  $selectPassword);
$row=mysqli_fetch_assoc( $result );
$userpassword=$row['password'];
/* without Countermeasure 
    $hashedNewPassword= password_hash($newPassword,PASSWORD_DEFAULT);
    $updatequery= "UPDATE user SET fname='$fname', lname ='$lname', password= '$hashedNewPassword' WHERE username= '$username'";
    $result2= mysqli_query($conn, $updatequery);
        
        if($result2){
            $_SESSION["statusUpdate"]= "Data Updated!";
                }
            else{
            $_SESSION["statusError"]="Something Went Wrong, Please Try Again.";
                } 
*/




 /*  Countermeasure*/
 if(password_verify($currentPassword,$userpassword)){

                $hashedNewPassword= password_hash($newPassword,PASSWORD_DEFAULT);
                $updatequery= "UPDATE user SET fname='$fname', lname ='$lname', password= '$hashedNewPassword' WHERE username= '$username'";
                $result2= mysqli_query($conn, $updatequery);
        
                if($result2){
                    $_SESSION["statusUpdate"]= "Data Updated!";
                }
                else{
                    $_SESSION["statusError"]="Something Went Wrong, Please Try Again.";
                }
            }
        else{
            $currentPassword_error="The current password is not found in the database .";}
        
            
       
    
//close connection   
mysqli_close($conn);
  
    

}

}
else{
    // if the token from the post requset don't match the token at the session
    $_SESSION["statusError"]="Request not allowed.";
}
}}

?>
<!--- UPDATE FORM IN HTML --->
<?php // Create  one time  anti-CRSF token
$_SESSION['tokenUpdate'] = bin2hex(random_bytes(35));?>
<!DOCTYPE html>
<html>
<link rel="stylesheet" href="/course+/css/update.css">

    <head>
        <title>PHP UPDATE DATA</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
         <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
        <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">    
        <script src="/course+/js/jquery.passwordRequirements.min.js"type= "text/javascript"></script>
        <script src="/course+/js/jquery.passwordRequirements.js"type= "text/javascript"></script>
        <script type="text/javascript"  src="/course+/js/user-profile-edit.js"></script>
    </head>

    <body>
        <div class="center">
            <h1>Profile Update</h1>
            <?php if (isset($_SESSION['statusUpdate'])){?>
            <div id="display-success"><img src="/course+/imgs/correct.png" alt="Success" /> <?php echo $_SESSION['statusUpdate']; ?></div>
            <?php header('Refresh: 2; url=/course+/mainPuser.php');?><?php }?>
            <?php if (isset($_SESSION['statusError'])){?>
            <div id="display-error"><?php echo $_SESSION['statusError']; ?></div><?php }?>
            <form action="#" method="post" id="update-form">
                <div class="txt-field">
                <label>Username</label>
                <input type="text" disabled="disabled" name="username" value= <?php echo $_SESSION['username']; ?>><br>
                <span></span>
                </div>

                <div class="txt-field">
                <label>Email</label>
                <input type="text" disabled="disabled" name="email" value= <?php echo $userinfo['email']; ?>><br>



                <span></span>
                </div>

                <div class="txt-field">
                    <label>Enter First Name</label>
                    <input type= "text" name="fname" value= "<?php echo $userinfo['fname']; ?>"><br>
                    <label class="error"><?php if (isset($fname_error)) echo $fname_error; ?></label>
                    <span></span>
                </div>

                <div class="txt-field">
                    <label>Enter Last Name</label>
                    <input type= "text" name="lname" value="<?php echo $userinfo['lname']; ?>"><br>
                    <label class="error"><?php if (isset($lname_error)) echo $lname_error; ?></label>
                    <span></span>
                </div>
                <!--Countermeasure -->
                
                <div class="txt-field">
                    <label>Enter Current Password</label>
                    <input type="password" id="pass" class="input-box" name="pass"  >
                    <label class="error"><?php if (isset($currentPassword_error)) echo $currentPassword_error; ?></label>
                    <span></span>
                </div>
                

                <div class="txt-field">
                    <label>Enter New Password</label>
                    <input type= "password" id="npass" name="npass" class="npass"><i class="bi bi-eye-slash" id="togglePassword"></i><br>
                    <label class="error"><?php if (isset($password_error)) echo $password_error; ?></label>
                    <span></span>
                </div>

                <div class="txt-field">
                    <label>Confirm New Password</label>
                    <input type= "password" name="cnpass"><br>
                    <label class="error"><?php if (isset($password_errorCon)) echo $password_errorCon; ?></label>
                    <input type="hidden" name="token" value="<?php echo $_SESSION['tokenUpdate'] ?? '' ?>">
                    <span></span>
                </div> 
                <div class="btn">
                <input type= "submit" name="update" value="Save Changes">
                <button type="button" name="button" onclick="window.location.href = '/course+/mainPuser.php';">Cancel</button>
                </div>

        </form>
        </div>
        <script>
        const togglePassword = document.querySelector("#togglePassword");
        const password = document.querySelector("#npass");
        togglePassword.addEventListener("click", function () {
            // toggle the type attribute
            const type = password.getAttribute("type") === "password" ? "text" : "password";
            password.setAttribute("type", type);
            // toggle the icon
            this.classList.toggle("bi-eye");
        });




    </script>
    </body>





</html>