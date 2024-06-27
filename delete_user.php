<?php include 'dbconnection.php';

session_start();

if(!isset($_SESSION['login_id']))
{
    header("location: index");
}


$user_id = $_GET['user_id'];

mysqli_query($con, "DELETE FROM tbl_login WHERE login_id = '$user_id'");
mysqli_query($con, "DELETE FROM tbl_driver_registration WHERE login_id = '$user_id'");

echo "<script>alert('User has been rejected!');</script>";

echo "<script>window.history.back();</script>";





?>