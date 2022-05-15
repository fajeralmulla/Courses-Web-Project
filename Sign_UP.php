
<?php 
$root=$_SERVER["DOCUMENT_ROOT"];
include($root.'/course+/inc/headerSignUP.php');
// Create CSRF token each time the user load Sign up page
session_start();
include('AddUser.php'); 
$_SESSION['tokenSignUP'] = bin2hex(random_bytes(35));
?>

<body>
  
    <div class="Welcome">
    <h1> SIGN UP </h1>
    <i class="fa-solid fa-user-plus" id="icon"></i>
    <h3> Welcome to COURSE+</h3>
    <?php if (isset($_SESSION['success'])){?>
  <div id="display-success"><img src="/course+/imgs/correct.png" alt="Success" /> <?php echo $_SESSION['success']; ?></div>
  <?php header('Refresh: 2; URL=/course+/mainPuser.php');?><?php }?>
  <?php if (isset($_SESSION['error'])){?>
            <div id="display-error"><?php echo $_SESSION['error']; ?></div><?php }?>
    </div>
  <div class="container " >
  <form method="post" action="" id="signup-form" >
  <input type="text" id="fname" name="fname" placeholder="First name" value="<?php if (isset($fname)) echo $fname; ?>"autocomplete="off" >
  <lable class="error"><?php if (isset($fname_error)) echo $fname_error; ?></lable>

  <input type="text" id="lname" name="lname" placeholder="Last name" value="<?php if (isset($lname)) echo $lname; ?>" autocomplete="off" >
  <lable class="error"><?php if (isset($lname_error)) echo $lname_error; ?></lable>

   <input type="text" id="userName" name="userName" placeholder="User Name" value="<?php if (isset($username)) echo $username; ?>" autocomplete="off" >
   <lable class="error"><?php if (isset($username_error)) echo $username_error; ?></lable>
   <lable class="error"><?php if (isset($user_exists)) echo $user_exists; ?></lable>

   <input type="email" id="email" name="email" placeholder="Email"  value="<?php if (isset($email)) echo $email; ?>" autocomplete="off">
   <lable class="error"><?php if (isset($email_error)) echo $email_error; ?></lable>
   <lable class="error"><?php if (isset($email_exists)) echo $email_exists; ?></lable>
   <input id="password" name="password" class="pr-password" type="password" value="<?php if (isset($password)) echo $password; ?>"placeholder="password">
   <i class="bi bi-eye-slash" id="togglePassword"></i>
   <lable class="error"><?php if (isset($password_error)) echo $password_error; ?></lable>

  <p><lable id="area">Area of interest :</lable>
    <select  id="interest" name="interest" class="selectpicker">
    <option  value="" >--Please choose an option-- </option>
    <option <?php if (isset($interest) && $interest=="Computer Programming") {?>selected <?php }?>>Computer Programming</option>
    <option <?php if (isset($interest) && $interest=="Cyberseciuty") {?>selected <?php }?> >Cyberseciuty</option>
    <option <?php if (isset($interest) && $interest=="Data Science") {?>selected <?php }?> >Data Science</option>
    <option <?php if (isset($interest) && $interest=="Web Development") {?>selected <?php }?>>Web Development</option>
  </select><br></p>
  <lable class="error"><?php if (isset($interest_error)) echo $interest_error; ?></lable><br>
  <input type="hidden" name="token" value="<?php echo $_SESSION['tokenSignUP'] ?? '' ?>">


  <div id="btn-login">
     <button type="submit" name="sumbit" id="btn" >Sign up </button>
     <button type="button" id="btn" onclick="window.location.href = '/course+/mainP.php';">Cancel</button>
    <p>Already a member ? <a href="/course+/login.php">Log in</a></p></div>
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
