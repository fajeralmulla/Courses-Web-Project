
<?php

$root=$_SERVER["DOCUMENT_ROOT"];
require($root.'/course+/config/config.php');
require($root.'/course+/config/db.php');

if(isset($_POST['submit'])) {

$fname=mysqli_real_escape_string($conn,$_POST['fname']);
$lname=mysqli_real_escape_string($conn,$_POST['lname']);
$username=mysqli_real_escape_string($conn,$_POST['userName']);
$email=mysqli_real_escape_string($conn,$_POST['email']);
$password=mysqli_real_escape_string($conn,$_POST['password']);
$interest=mysqli_real_escape_string($conn,$_POST['interest']);
$role= "User";
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
/* ----username validation-----*/
if($username==""){
      $username_error ="Please enter a username ";
      $counterrors+=1;}
elseif (!preg_match("/^[A-Za-z0-9 _]*[A-Za-z0-9 _]*$/",$username)) {
      $username_error ="Username must contain only alphabets, numbers and underscore" ;
      $counterrors+=1;
    
      }
/* ----email validation-----*/
if($email==""){
  $email_error ="Please enter a email";
  $counterrors+=1;}
elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
  $email_error = "Please enter a valid email address.";
  $counterrors+=1;
  }
/* ----Password validation-----*/
  if($password==""){
    $password_error ="Please enter a password";
    $counterrors+=1;}
elseif(!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{10,}$/",$password))  {
  $password_error = "Password must contain Minimum ten characters, at least one uppercase letter, one lowercase letter, one number and one special character";
  $counterrors+=1;
}
/* ----intreset validation-----*/
if($interest==""){
  $interest_error="Please choose one of the options";
  $counterrors+=1;
}


/*-----if user already exists----*/
  $user_check_query = "SELECT * FROM user WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($conn, $user_check_query);
  $user = mysqli_fetch_assoc($result);

 if ($user) { // if user exists
    if ($user['username'] === $username) {
     $user_exists="Username already exists";
     $counterrors+=1;
  }
if ($user['email'] === $email) {
     $email_exists="email already exists";
     $counterrors+=1;
    }   }  

  

/* ---- if inputs contans errors --*/
if($counterrors){
  $_SESSION['error']="Adding User failed.";

  }
  
/* ---- if no errors --*/
else{
  $hashedpassword=password_hash($password,PASSWORD_DEFAULT);
  $quetyinsert="INSERT INTO user(fname,lname,username,email,password,role,interest) VALUES('$fname','$lname','$username','$email','$hashedpassword','$role','$interest')";
   $re=mysqli_query($conn, $quetyinsert);
   if($query_run){
    $_SESSION['message']= "User Added Successfully!";
    header('Location: Admin-add-user.php?id='.$id);
    exit(0);
}
else{
    $_SESSION['message']= "Something Went Wrong... Please Try Again Later";
    header('Location: Admin-add-user.php?id='.$id);
    exit(0);
}



}




//close connection
mysqli_close($conn);


}


?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Admin Dashboard using HTML, CSS, and JavaScript</title>
    <!-- MATERIAL CDN -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <!-- STYLESHEET -->
    <link rel="stylesheet" href="../../course+/css/update.css">
</head>

<html>


<body>

<!--- UPDATE FORM IN HTML --->

<!DOCTYPE html>
<html>
<link rel="stylesheet" href="../../course+/css/update.css">

    <head>
        <title>PHP UPDATE DATA</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>

    <body>
        <div class="center">
            <h1>Add Users</h1>

            <form method="post" action="" id="signup-form" >
                <div class="txt-field">
                <label><b>First Name:</b></label>
                <input type="text" name="fname" placeholder="Enter First Name" autocomplete="off">
                <label class="error"><?php if (isset($fname_error)) echo $fname_error; ?></label>
                <span></span>
                </div>

                <div class="txt-field">
                <label><b>Last Name:</b></label>
                <input type="text" name="lname" placeholder="Enter Last Name" autocomplete="off" >
                <label class="error"><?php if (isset($lname_error)) echo $lname_error; ?></label>
                <span></span>
                </div>

                <div class="txt-field">
                <label><b>Username:</b></label>  
                <input type="text" name="userName" placeholder="Enter Username" autocomplete="off" >
                <label class="error"><?php if (isset($username_error)) echo $username_error; ?></label>
                <label class="error"><?php if (isset($user_exists)) echo $user_exists; ?></label>
                <span></span>
                </div>

                <div class="txt-field">
                <label><b>Email:</b></label>
                <input type="email" name="email" placeholder="Enter Email"autocomplete="off">
                <label class="error"><?php if (isset($email_error)) echo $email_error; ?></label>
                <label class="error"><?php if (isset($email_exists)) echo $email_exists; ?></label>
                <span></span>
                </div>

                <div class="txt-field">
                <label><b>Role:</b></label>
                <input type="text" name="role" value="<?php echo $role; ?>" readonly>
                <span></span>
                </div>

                
                <div class="txt-field">
                <label><b>Password:</b></label>
                <input type="password" name="password" placeholder="Enter Password">
                <i class="bi bi-eye-slash" id="togglePassword"></i>
                <label class="error"><?php if (isset($password_error)) echo $password_error; ?></label>            
                <span></span>
                </div>

                <p><label id="area"><b>Area of interest:</b></label>
                <select  id="interest" name="interest" class="selectpicker">
                <option  value="" >--Please choose an option-- </option>
                <option value="Computer Programming">Computer Programming</option>
                <option value="Cybersecurity">Cyberseciuty</option>
                <option value="Data science" >Data Science</option>
                <option value="Web Development">Web Development</option>
                </select><br></p>
                <label class="error"><?php if (isset($interest_error)) echo $interest_error; ?></label><br>


                <div class="submit">
                <input type= "submit" name="submit" value="Add User">
                </div>
                <div class="button">
                <button type="button" name="button" onclick="window.location.href = 'Admin-Index.php';">Cancel</button>
                </div>
        </form>
        </div>
         <!---password show icon toggle -->
         <script>
            const togglePassword = document.querySelector("#togglePassword");
            const password = document.querySelector("#password");
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
