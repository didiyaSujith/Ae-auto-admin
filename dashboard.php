<?php include 'dbconnection.php';

session_start();

if(!isset($_SESSION['login_id']))
{
    header("location: index");
}

$dri_query = mysqli_query($con, "SELECT COUNT(*) AS driver_count FROM tbl_driver_registration");

$user_data = mysqli_fetch_assoc($dri_query);

$pass_query = mysqli_query($con, "SELECT COUNT(*) AS passenger_count FROM tbl_passenger_registration");

$pass_data = mysqli_fetch_assoc($pass_query);



?>


<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">     
    <title>Admin - Dashboard</title>
     
     <?php include 'includes/header_css.php'; ?>
</head>
<body>
<div class="page-container list-menu-view">
<!--Leftbar Start Here -->

<?php include 'includes/leftbar.php'; ?>

<div class="page-content">
<!--Topbar Start Here -->
<?php include 'includes/top_bar.php'; ?>

<div class="main-container">
<div class="container-fluid">
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-md-7">
            <div class="page-breadcrumb-wrap">

                <div class="page-breadcrumb-info">
                    <h2 class="breadcrumb-titles">Dashboard <small>Ae Auto</small></h2>
                    <ul class="list-page-breadcrumb">
                        <li><a href="dashboard">Home</a>
                        </li>
                        <li class="active-page"> Dashboard</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-5">
        </div>
    </div>
</div>
    <div class="row">
        <div class="col-md-3 col-sm-6">
            <div class="iconic-w-wrap number-rotate">
                <span class="stat-w-title">Total Registered Drivers</span>
                <a href="#" class="ico-cirlce-widget w_bg_cyan">
                    <span><i class="fa fa-user"></i></span>
                </a>
                <div class="w-meta-info">
                    <span class="w-meta-value number-animate" data-value="330" data-animation-duration="1500"><?php echo $user_data['driver_count']; ?></span>
                    <span class="w-meta-title"> </span>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6">
            <div class="iconic-w-wrap number-rotate">
                <span class="stat-w-title">Total Registered Passengers</span>
                <a href="#" class="ico-cirlce-widget w_bg_cyan">
                    <span><i class="fa fa-user"></i></span>
                </a>
                <div class="w-meta-info">
                    <span class="w-meta-value number-animate" data-value="330" data-animation-duration="1500"><?php echo $pass_data['passenger_count']; ?></span>
                    <span class="w-meta-title">  </span>
                        
                </div>
            </div>
        </div>

         

    </div>
 


</div>
</div>
<!--Footer Start Here -->
<footer class="footer-container">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 col-sm-6">
                <div class="footer-left">
                   
                </div>
            </div>
            <div class="col-md-6 col-sm-6">
                <div class="footer-right">
                     <span>&copy; 2020 <a href="javascript:void(0);">Ae Auto</a></span>
                </div>
            </div>
        </div>
    </div>
</footer>
</div>
</div>
  
<?php include 'includes/scripts.php'; ?>

 

</body>
</html>