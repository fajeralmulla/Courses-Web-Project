<?php
/*-----login  form validation ------ */
$root=$_SERVER["DOCUMENT_ROOT"];
require($root.'/course+/config/config.php');
require($root.'/course+/config/db.php');
define('URL','/course+/mainPuser.php');
$counterrors='';
unset($_SESSION['username']);

/*-----server side validation ------ */
if (isset($_POST['username']) && isset($_POST['password'])) {


    if ( mysqli_connect_errno() ) {
        // If there is an error with the connection, stop the script and display the error.
        exit('Failed to connect to MySQL: ' . mysqli_connect_error());
    }


    // Prepare our SQL, preparing the SQL statement will prevent SQL injection.
    $stmt = $conn->prepare("SELECT id , password FROM user WHERE username = ?");
        // Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
        $stmt->bind_param("s", $_POST['username']);
        $stmt->execute();
        // Store the result so we can check if the account exists in the database.
        $stmt->store_result();

        if ($stmt->num_rows == 1) {
            $stmt->bind_result($id,$password);
            $stmt->fetch();
            // Account exists, now we verify the token then password.
            $token = filter_input(INPUT_POST, 'token', FILTER_SANITIZE_STRING);
                if($token && $token == $_SESSION['tokenLogin']){
            if (password_verify($_POST['password'], $password)) {
                
                // Verification success! User has logged-in!
                // Create sessions, so we know the user is logged in, they basically act like cookies but remember the data on the server.
                session_regenerate_id();
                $_SESSION['success'] = TRUE;
                $_SESSION['username'] = $_POST['username'];
                $_SESSION['id'] = $id;
                $_SESSION['fname']=$fname;
                // Admin username
                if($_POST['username']=='Ghadi_Rayani'){
                    header('Location: /course+/admin-dashboard/Admin-Index.php');
                }
                else{
                header('Location: '.URL.''); }
            } else {
                // Incorrect password
                $username_error='Incorrect username and/or password!';}



            // else{
            //         $fields_error='Incorrect username or Password';
     
            //     } 
            }else{

                $_SESSION['error']="Requset Not Allowed";
              }
            } else {
                // Incorrect username
                $fields_error='Incorrect username or Password';
    
            }
    
    
            $stmt->close();
        }
    
        ?>
    
