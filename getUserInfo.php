
<?php
 if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
$root=$_SERVER["DOCUMENT_ROOT"];
require($root.'/course+/config/config.php');
require($root.'/course+/config/db.php');
 $user=$_SESSION['username'];
 $user_check_query = "SELECT * FROM user WHERE username='$user' ";
 $result = mysqli_query($conn, $user_check_query);
 $userinfo = mysqli_fetch_assoc($result);

  ?>