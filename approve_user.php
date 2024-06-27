<?php include 'dbconnection.php';

session_start();

if(!isset($_SESSION['login_id']))
{
    header("location: index");
}


$user_id = $_GET['user_id'];

mysqli_query($con, "UPDATE tbl_login SET status = '1' WHERE login_id = '$user_id'");

echo "<script>alert('User has been approved!');</script>";

echo "<script>window.history.back();</script>";





?>