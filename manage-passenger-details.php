<?php include 'dbconnection.php';

session_start();

if(!isset($_SESSION['login_id']))
{
    header("location: index");
}

$pass_query = mysqli_query($con, "SELECT tbl_login.login_id, tbl_login.status, passenger_name, passenger_email,passenger_mobile,passenger_address, tbl_login.status FROM tbl_passenger_registration JOIN tbl_login ON tbl_login.login_id = tbl_passenger_registration.login_id");


?>


<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">     
    <title>Admin - Manage Passengers</title>
     
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
                    <h2 class="breadcrumb-titles">Manage Passengers <small> Ae Auto</small></h2>
                    <ul class="list-page-breadcrumb">
                        <li><a href="dashboard">Home</a>
                        </li>
                        <li class="active-page"> Passengers List</li>
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
                                <h4>Registered Passengers</h4>
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
                                            Name
                                        </th>
                                        <th style="text-align: center;">
                                            Email ID
                                        </th style="text-align: center;">
                                        <th style="text-align: center;">
                                            Mobile Number
                                        </th style="text-align: center;">
                                         <th style="text-align: center;">
                                            Address
                                        </th style="text-align: center;">
                                         
                                        <th style="text-align: center;">
                                            Action
                                        </th>                                      
                                    </tr>
                                    </thead>
                                    
                                    <tbody>

                                    <?php $i=0; while($row_data = mysqli_fetch_assoc($pass_query)) { $i++; ?>
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
                                            <?php echo $row_data['passenger_address']; ?>
                                        </td>
                                       
                                        <td align="center">
                                        <?php if($row_data['status']=='1') { ?>
                                        <a href="javascript:void" class="btn btn-success">APPROVED</a>
                                        <?php } else { ?>

                                        <a onclick="return confirm('Do you want to Approve?');" href="approve_user?user_id=<?php echo $row_data['login_id']; ?>" class="btn btn-success btn-sm m-user-delete">Approve</a> 
                                            / 
                                        <a onclick="return confirm('Do you want to delete?');" href="delete_user?user_id=<?php echo $row_data['login_id']; ?>" class="btn btn-danger btn-sm m-user-delete">Reject</a>  
                                        <?php } ?>                       
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