<?php 
$root=$_SERVER["DOCUMENT_ROOT"];
require($root.'/course+/config/config.php');
require($root.'/course+/config/db.php'); ?>

<?php
if(isset($_POST['delete'])){
    $user_id = $_POST['delete'];
    $query = "DELETE FROM user WHERE id = '$user_id'";
    $query_run = mysqli_query($conn, $query);

    if($query_run){
        $_SESSION['message'] = "User/Admin Deleted Successfully!";
        header('location: Users.php');
        exit(0);
    }
    else{
        $_SESSION['message'] = "Something Went Wrong.. Please Try Again Later.";
        header('location: Users.php');
        exit(0);
    }
}
?>

