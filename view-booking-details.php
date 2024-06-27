<?php include 'dbconnection.php';

session_start();

if(!isset($_SESSION['login_id']))
{
    header("location: index");
}

$booking_query = mysqli_query($con, "SELECT passenger_name, passenger_email,passenger_mobile, from_location, to_location, trip_date_time, trip_completed_time FROM tbl_booking JOIN tbl_passenger_registration ON tbl_passenger_registration.login_id = tbl_booking.passenger_login_id JOIN tbl_driver_registration ON tbl_driver_registration.login_id = tbl_booking.driver_login_id WHERE booking_status = '2' ORDER BY booking_id ASC");

?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">     
    <title>Admin - View Bookings</title>
     
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
                    <h2 class="breadcrumb-titles">Manage Bookings <small> Ae Auto</small></h2>
                    <ul class="list-page-breadcrumb">
                        <li><a href="dashboard">Home</a>
                        </li>
                        <li class="active-page"> Bookings List</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-5">
        </div>
    </div>
</div>
    <div class="row">
        
        <div class="col-md-12">

            <div class="box-widget widget-module">
                            <div class="widget-head clearfix">
                                <span class="h-icon"><i class="fa fa-th"></i></span>
                                <h4>Booking List</h4>
                            </div>
                            <div class="widget-container">
                                <div class=" widget-block">
                                    <table class="table dt-table">
                                    <thead>
                                    <tr>
                                        <th style="text-align: center;">
                                            Sl No
                                        </th>
                                        <th style="text-align: center;">
                                            Passenger Name
                                        </th>
                                        <th style="text-align: center;">
                                            Email ID
                                        </th style="text-align: center;">
                                        <th style="text-align: center;">
                                            Mobile Number
                                        </th style="text-align: center;">
                                        
                                        <th style="text-align: center;">
                                            Journey Info
                                        </th style="text-align: center;">
                                        <th style="text-align: center;">
                                            Started / Ended
                                        </th style="text-align: center;">
                                         
                                                                             
                                    </tr>
                                    </thead>
                                    
                                    <tbody>

                                    <?php $i=0; while($row_data = mysqli_fetch_assoc($booking_query)) { $i++; ?>
                                    <tr>
                                        <td align="center">
                                        <?php echo $i; ?>  
                                        </td>
                                        <td align="center">
                                            <?php echo $row_data['passenger_name']; ?>
                                        </td>
                                        <td align="center">
                                            <?php echo $row_data['passenger_email']; ?>
                                        </td>
                                        <td align="center">
                                           <?php echo $row_data['passenger_mobile']; ?>
                                        </td>
                                       
                                        <td align="center">
                                            <?php echo $row_data['from_location']." / ".$row_data['to_location']; ?>
                                        </td>     
                                        <td align="center">
                                            <?php echo $row_data['trip_date_time']." / ".$row_data['trip_completed_time']; ?>
                                        </td>                                       
                                                                                 
                                    </tr>
                                    <?php } ?>
                                     
                                </tbody>
                            </table>
                        </div>
             
        </div>

         

    </div>
 


</div>
</div></div>
</div></div></div>
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
                     <span>&copy; 2020 <a href="javascript:void(0);">Air Pollution Detection</a></span>
                </div>
            </div>
        </div>
    </div>
</footer>
</div>
</div>
  
<?php include 'includes/scripts.php'; ?>

<!-- <script type="text/javascript">
    
    jQuery(document).on('click', '.m-user-delete', function(){
         
            var elem = jQuery(this).next('#msgspan')

            elem.toggle('slow');
        });
</script> -->

 

</body>
</html>