<?php 
$root=$_SERVER["DOCUMENT_ROOT"];
require($root.'/course+/config/config.php');
require($root.'/course+/config/db.php'); ?>

<?php if(isset($_SESSION['message'])){
    ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Hey!</strong> <?= $_SESSION['message']; ?>
            <button type="button" data-bs-dismiss="alert", aria-label="Close"></button>
        </div>
    <?php
    unset($_SESSION['message']);
}
?>

<?php
if(isset($_POST['delete'])){
    $user_id = $_POST['delete'];
    $query = "DELETE FROM courses WHERE id = '$user_id'";
    $query_run = mysqli_query($conn, $query);

    if($query_run){
        $_SESSION['message'] = "User/Admin Deleted Successfully!";
        header('location: Courses.php');
        exit(0);
    }
    else{
        $_SESSION['message'] = "Something Went Wrong.. Please Try Again Later.";
        header('location: Courses.php');
        exit(0);
    }
}
?>

