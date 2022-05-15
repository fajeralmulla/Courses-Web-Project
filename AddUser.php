<!DOCTYPE html>
<html>
<head>
<?php
$root=$_SERVER["DOCUMENT_ROOT"];
require($root.'/course+/config/config.php');
require($root.'/course+/config/db.php');
/*----Sign Up form validation ------ */
unset($_SESSION["success"]);
unset($_SESSION["error"]);

if(isset($_POST['sumbit'])) {
  /* check the token from the post reqtuset */
  
  $token = filter_input(INPUT_POST, 'token', FILTER_SANITIZE_STRING);
  if($token &&$token == $_SESSION['tokenSignUP']){
$fname=mysqli_real_escape_string($conn,$_POST['fname']);
$lname=mysqli_real_escape_string($conn,$_POST['lname']);
$username=mysqli_real_escape_string($conn,$_POST['userName']);
$email=mysqli_real_escape_string($conn,$_POST['email']);
$password=mysqli_real_escape_string($conn,$_POST['password']);
$interest=mysqli_real_escape_string($conn,$_POST['interest']);
$role="user";
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
      $username_error ="username must contain only alphabets ,numbers and underscore" ;
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

/*-----if username or email already exists----*/
  $user_check_query = "SELECT * FROM user WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($conn, $user_check_query);
  $user = mysqli_fetch_assoc($result);

 if ($user) { // if user exists
    if ($user['username'] === $username) {
     $user_exists="Username already exists";
     $counterrors+=1;}
if ($user['email'] === $email) {
     $email_exists="email already exists";
     $counterrors+=1;
    }   }  


  
/* ---- if no errors --*/
if($counterrors==0){
  $hashedpassword=password_hash($password,PASSWORD_DEFAULT);
  $quetyinsert="INSERT INTO user(fname,lname,username,email,password,role,interest) VALUES('$fname','$lname','$username','$email','$hashedpassword','$role','$interest')";
   $re=mysqli_query($conn, $quetyinsert);
  if($re){

  $selectID= "SELECT id FROM user WHERE username='$username'";

  $result=mysqli_query($conn,  $selectID);
  $row=mysqli_fetch_assoc( $result );
  $userid=$row['id'];
  $_SESSION['username'] = $username;
  $_SESSION['id'] = $userid;
  
  // success message
  $_SESSION['success'] = "Your account created successfully !";}

  else{
    echo 'ERROR: '. mysqli_error($conn);
  }


}


//close connection
mysqli_close($conn);

}else{

  $_SESSION['error']="Requset Not Allowed";
}


}



?>
</head>

<html>
